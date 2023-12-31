<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\City;
use App\Models\Tenant\Country;
use App\Models\Tenant\InsuranceCompany;
use App\Models\Tenant\State;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class InsuranceCompaniesController extends Controller
{

    public $varification = new  Helper();
    public function index()
    {
        return view('tenant.insurance-companies.index');
    }
    public function show($id)
    {
        $id = decrypt($id);

        $users = User::with('insurance_companies')->findOrFail($id);

        return view('tenant.insurance-companies.show', compact(
            'users'
        ));
    }
    public function create()
    {
        $countries  = Country::select('name', 'id')->get();
        $states  = State::select('name', 'id')->get();
        $cities  = City::select('name', 'id')->get();

        return view('tenant.insurance-companies.create', compact(
            'countries',
            'states',
            'cities'
        ));
    }
    public function store(Request $request)
    {

        $validator = validator()->make($request->toArray(), [

            'name' => 'required',
            'email' => ['required', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'phone' => 'required',
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => 'required',
            'country_id' => 'required',
            'state_id' => 'sometimes',
            'city_id' => 'sometimes',
            'postal_code' => 'sometimes',
            'address' => 'sometimes',

        ])->validated();


        try {
            $user = User::create([
                'full_name' => $validator['name'],
                'username' => $validator['username'],
                'email' => $validator['email'],
                'password' => Hash::make($validator['password']),
                'phone_number' => $validator['phone'],
                'role' => Helper::TENANT_INSURANCE_COMPANY,
                'postal_code' => $validator['postal_code'],
            ]);

            InsuranceCompany::create([
                'user_id' => $user->id,
                'country_id' => $validator['country_id'],
                'state_id' => $validator['state_id'],
                'city_id' => $validator['city_id'],
                'additional_phonenumbers' => $validator['additional_phonenumbers'],
            ]);

            return redirect()->route('tenant.insurance-companies.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $countries  = Country::select('name', 'id')->get();
        $states  = State::select('name', 'id')->get();
        $cities  = City::select('name', 'id')->get();
        $users = User::with('insurance_companies')->findOrFail($id);

        return view('tenant.insurance-companies.create', compact(
            'countries',
            'states',
            'cities',
            'users',
        ));
    }
    public function update(Request $request, $id)
    {

        $id = decrypt($id);
        $validator = validator()->make($request->toArray(), [

            'name' => 'required',
            'email' => ['required', 'unique:users,email,' . $id],
            'username' => ['required', 'unique:users,username,' . $id],
            'phone' => 'required',
            'country_id' => 'required',
            'state_id' => 'sometimes',
            'city_id' => 'sometimes',
            'postal_code' => 'sometimes',
            'address' => 'sometimes',

        ])->validated();

        if ($request->has('password')) {
            $password = validator()->make($request->toArray(), [
                'password' => ['required', 'min:8', 'confirmed'],
                'password_confirmation' => 'required',
            ])->validated();
            array_merge($validator, $password);
        }

        try {
            $user = User::findOrFail($id)->update([
                'full_name' => $validator['name'],
                'username' => $validator['username'],
                'email' => $validator['email'],
                'phone_number' => $validator['phone'],
                'role' => Helper::TENANT_INSURANCE_COMPANY,
                'postal_code' => $validator['postal_code'],
            ]);

            if ($request->has('password')) {
                $user = User::findOrFail($id)->update([
                    'password' => Hash::make($validator['password']),
                ]);
            }

            InsuranceCompany::where('user_id', $user->id)->update([
                'user_id' => $user->id,
                'country_id' => $validator['country_id'],
                'state_id' => $validator['state_id'],
                'city_id' => $validator['city_id'],
                'additional_phonenumbers' => $validator['additional_phonenumbers'],
            ]);

            return redirect()->route('tenant.insurance-companies.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            User::with('insurance_companies')->findOrFail($id)->delete();
            return redirect()->route('tenant.insurance-companies.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

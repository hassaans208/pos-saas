<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\City;
use App\Models\Tenant\Country;
use App\Models\Tenant\StaffUser;
use App\Models\Tenant\State;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class StaffUserController extends Controller
{

    public $varification = new  Helper();
    public function index()
    {
        return view('tenant.staff-users.index');
    }
    public function show($id)
    {
        $id = decrypt($id);

        $users = User::with('staff_users')->findOrFail($id);

        return view('tenant.staff-users.show', compact(
            'users'
        ));
    }
    public function create()
    {
        $countries  = Country::select('name', 'id')->get();
        $states  = State::select('name', 'id')->get();
        $cities  = City::select('name', 'id')->get();

        return view('tenant.staff-users.create', compact(
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
            'job_titles_id' => 'sometimes',

        ])->validated();


        try {
            $user = User::create([
                'full_name' => $validator['name'],
                'username' => $validator['username'],
                'email' => $validator['email'],
                'password' => Hash::make($validator['password']),
                'phone_number' => $validator['phone'],
                'role' => Helper::TENANT_STAFF,
                'postal_code' => $validator['postal_code'],
            ]);

            StaffUser::create([
                'user_id' => $user->id,
                'country_id' => $validator['country_id'],
                'state_id' => $validator['state_id'],
                'city_id' => $validator['city_id'],
            ]);

            return redirect()->route('tenant.staff-users.index')->with('success', 'Success');
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
        $users = User::with('staff_users')->findOrFail($id);

        return view('tenant.staff-users.create', compact(
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
            'job_titles_id' => 'sometimes',

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
                'role' => Helper::TENANT_STAFF,
                'postal_code' => $validator['postal_code'],
            ]);

            if ($request->has('password')) {
                $user = User::findOrFail($id)->update([
                    'password' => Hash::make($validator['password']),
                ]);
            }

            StaffUser::where('user_id', $user->id)->update([
                'user_id' => $user->id,
                'country_id' => $validator['country_id'],
                'state_id' => $validator['state_id'],
                'city_id' => $validator['city_id'],
            ]);

            return redirect()->route('tenant.staff-users.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            User::with('staff_users')->findOrFail($id)->delete();
            return redirect()->route('tenant.staff-users.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

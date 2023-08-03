<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\City;
use App\Models\Tenant\Country;
use App\Models\Tenant\Vendor;
use App\Models\Tenant\State;
use App\Models\Tenant\ThirdPartyAgency;
use Illuminate\Support\Facades\Request;

class ThirdPartyAgencyController extends Controller
{

    public $varification = new  Helper();
    public function index()
    {
        return view('tenant.third-party-agencies.index');
    }
    public function show($id)
    {
        $id = decrypt($id);

        $users = ThirdPartyAgency::findOrFail($id);

        return view('tenant.third-party-agencies.show', compact(
            'users'
        ));
    }
    public function create()
    {
        $countries  = Country::select('name', 'id')->get();
        $states  = State::select('name', 'id')->get();
        $cities  = City::select('name', 'id')->get();

        return view('tenant.third-party-agencies.create', compact(
            'countries',
            'states',
            'cities'
        ));
    }
    public function store(Request $request)
    {

        $validator = validator()->make($request->toArray(), [

            'name' => 'required',
            'email' => ['required'],
            'phone' => ['required'],
            'workshop_name' => 'required',
            'workshop_address' => ['required'],


        ])->validated();


        try {
            ThirdPartyAgency::create([
                'name' => $validator['name'],
                'email' => $validator['email'],
                'phone' => $validator['phone'],
                'workshop_name' => $validator['workshop_name'],
                'workshop_address' => $validator['workshop_address'],
            ]);


            return redirect()->route('tenant.third-party-agencies.index')->with('success', 'Success');
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
        $users = ThirdPartyAgency::findOrFail($id);

        return view('tenant.third-party-agencies.create', compact(
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
            'email' => ['required'],
            'phone' => ['required'],
            'workshop_name' => 'required',
            'workshop_address' => ['required'],


        ])->validated();

        try {
            ThirdPartyAgency::create([
                'name' => $validator['name'],
                'email' => $validator['email'],
                'phone' => $validator['phone'],
                'workshop_name' => $validator['workshop_name'],
                'workshop_address' => $validator['workshop_address'],
            ]);

            return redirect()->route('tenant.third-party-agencies.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            ThirdPartyAgency::findOrFail($id)->delete();
            return redirect()->route('tenant.third-party-agencies.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

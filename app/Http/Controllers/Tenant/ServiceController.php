<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Service;
use App\Models\Tenant\City;
use App\Models\Tenant\Country;
use App\Models\Tenant\Customer;
use App\Models\Tenant\State;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class ServiceController extends Controller
{

    public $varification = new  Helper();
    public function index()
    {
        return view('tenant.services.index');
    }
    public function show($id)
    {
        $id = decrypt($id);

        $service = Service::findOrFail($id);

        return view('tenant.services.show', compact(
            'service'
        ));
    }
    public function create()
    {

        return view('tenant.services.create');
    }
    public function store(Request $request)
    {

        $validator = validator()->make($request->toArray(), [

            'name' => 'required',

        ])->validated();


        try {
            Service::create($validator);


            return redirect()->route('tenant.services.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $service = Service::with('services')->findOrFail($id);

        return view('tenant.services.create', compact(
            'service',
        ));
    }
    public function update(Request $request, $id)
    {

        $id = decrypt($id);
        $validator = validator()->make($request->toArray(), [

            'name' => ['required', 'umique:services,name'],

        ])->validated();


        try {
            Service::findOrFail($id)->update($validator);


            return redirect()->route('tenant.services.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            Service::findOrFail($id)->delete();
            return redirect()->route('tenant.services.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

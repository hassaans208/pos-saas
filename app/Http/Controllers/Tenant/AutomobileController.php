<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Automobile;
use App\Models\Tenant\City;
use App\Models\Tenant\Country;
use App\Models\Tenant\Customer;
use App\Models\Tenant\State;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class AutomobileController extends Controller
{

    public $varification = new  Helper();
    public function index()
    {
        return view('tenant.automobiles.index');
    }
    public function show($id)
    {
        $id = decrypt($id);

        $users = Automobile::with('customers')->findOrFail($id);

        return view('tenant.automobiles.show', compact(
            'users'
        ));
    }
    public function create()
    {

        return view('tenant.automobiles.create');
    }
    public function store(Request $request)
    {

        $validator = validator()->make($request->toArray(), [

            'customer_id' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'sometimes',
            'chasis_no' => 'sometimes',
            'color' => 'sometimes',
            'car_number' => 'sometimes',

        ])->validated();


        try {
            Automobile::create([
                'customer_id' => $validator['customer_id'],
                'make' => $validator['make'],
                'model' => $validator['model'],
                'year' => $validator['year'],
                'chasis_no' => $validator['chasis_no'],
                'color' => $validator['color'],
                'car_number' => $validator['car_number'],
            ]);


            return redirect()->route('tenant.automobiles.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $automobile = Automobile::with('automobiles')->findOrFail($id);

        return view('tenant.automobiles.create', compact(
            'automobile',
        ));
    }
    public function update(Request $request, $id)
    {

        $id = decrypt($id);
        $validator = validator()->make($request->toArray(), [

            'customer_id' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'sometimes',
            'chasis_no' => 'sometimes',
            'color' => 'sometimes',
            'car_number' => 'sometimes',

        ])->validated();


        try {
            Automobile::findOrFail($id)->update([
                'customer_id' => $validator['customer_id'],
                'make' => $validator['make'],
                'model' => $validator['model'],
                'year' => $validator['year'],
                'chasis_no' => $validator['chasis_no'],
                'color' => $validator['color'],
                'car_number' => $validator['car_number'],
            ]);

            return redirect()->route('tenant.automobiles.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            Automobile::with('customers')->findOrFail($id)->delete();
            return redirect()->route('tenant.automobiles.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

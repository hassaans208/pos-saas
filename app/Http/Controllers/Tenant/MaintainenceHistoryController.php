<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Country;
use App\Models\Tenant\Customer;
use App\Models\Tenant\MaintenanceHistory;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Str;

class MaintainenceHistoryController extends Controller
{

    public $varification = new  Helper();
    public function index()
    {
        return view('tenant.appointments.index');
    }
    public function show($id)
    {
        $id = decrypt($id);

        $appointment = MaintenanceHistory::findOrFail($id);

        return view('tenant.appointments.show', compact(
            'appointment'
        ));
    }
    public function create()
    {
        return view('tenant.appointments.create');
    }
    public function store(Request $request)
    {

        $validator = validator()->make($request->toArray(), [
            'service_date' => 'required',
            'notify_date' => 'required',
            'automobile_id' => 'sometimes',
            'maintanence_type_id' => 'required',
            'service_id' => 'required',
            'user_id' => 'required',
        ])->validated();


        try {

            MaintenanceHistory::create($validator);
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $service = MaintenanceHistory::with('appointments')->findOrFail($id);

        return view('tenant.appointments.create', compact(
            'service',
        ));
    }
    public function update(Request $request, $id)
    {

        $id = decrypt($id);

        $validator = validator()->make($request->toArray(), [
            'service_date' => 'required',
            'notify_date' => 'required',
            'automobile_id' => 'sometimes',
            'maintanence_type_id' => 'required',
            'service_id' => 'required',
            'user_id' => 'required',
        ])->validated();



        try {
            MaintenanceHistory::findOrFail($id)->update($validator);
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            MaintenanceHistory::findOrFail($id)->delete();
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

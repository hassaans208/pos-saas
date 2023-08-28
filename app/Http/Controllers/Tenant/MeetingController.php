<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Appointment;
use App\Models\Tenant\Country;
use App\Models\Tenant\Customer;
use App\Models\Tenant\State;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class MeetingController extends Controller
{

    public $varification = new  Helper();
    public function index()
    {
        return view('tenant.appointments.index');
    }
    public function show($id)
    {
        $id = decrypt($id);

        $appointment = Appointment::findOrFail($id);

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
            'user_id' => 'required',
            'customer_id' => 'required',
            'automobile_id' => 'sometimes',
            'service_id' => 'required',
            'appointment_date' => 'required',
        ])->validated();


        try {

            Appointment::create($validator);
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $service = Appointment::with('appointments')->findOrFail($id);

        return view('tenant.appointments.create', compact(
            'service',
        ));
    }
    public function update(Request $request, $id)
    {

        $id = decrypt($id);

        $validator = validator()->make($request->toArray(), [
            'user_id' => 'required',
            'customer_id' => 'required',
            'automobile_id' => 'sometimes',
            'service_id' => 'required',
            'appointment_date' => 'required',
        ])->validated();

        try {
            Appointment::findOrFail($id)->update($validator);
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            Appointment::findOrFail($id)->delete();
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

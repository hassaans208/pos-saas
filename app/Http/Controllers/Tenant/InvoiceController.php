<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Country;
use App\Models\Tenant\Customer;
use App\Models\Tenant\Invoice;
use App\Models\Tenant\State;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{

    public $varification = new  Helper();
    public function index()
    {
        return view('tenant.appointments.index');
    }
    public function show($id)
    {
        $id = decrypt($id);

        $appointment = Invoice::findOrFail($id);

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
            'services' => 'required',
            'amount' => 'required',
            'paid' => 'required',
            'payment_method' => 'required',
            'invoice_type' => 'required',
            'intervals' => 'required',
            'paid_on' => 'required',
        ])->validated();


        try {
            $uuid = Str::uuid();
            $validator['transaction_id'] = $uuid;
            Invoice::create($validator);
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $service = Invoice::with('appointments')->findOrFail($id);

        return view('tenant.appointments.create', compact(
            'service',
        ));
    }
    public function update(Request $request, $id)
    {

        $id = decrypt($id);

        $validator = validator()->make($request->toArray(), [
            'user_id' => 'prohibited',
            'customer_id' => 'prohibited',
            'automobile_id' => 'prohibited',
            'services' => 'required',
            'amount' => 'required',
            'paid' => 'sometimes',
            'payment_method' => 'required',
            'invoice_type' => 'required',
            'intervals' => 'required',
            'paid_on' => 'required',
            'account_number' => 'sometimes',
            'advance_payment' => 'sometimes',
        ])->validated();


        try {
            Invoice::findOrFail($id)->update($validator);
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            Invoice::findOrFail($id)->delete();
            return redirect()->route('tenant.appointments.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

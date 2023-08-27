<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\City;
use App\Models\Tenant\Country;
use App\Models\Tenant\Customer;
use App\Models\Tenant\State;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class ClientHistoryController extends Controller
{

    public $varification;

    public function __construct($varification = new Helper())
    {
        $this->varification = $varification;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // dd('some');
        // return $this->varification->executeValid($request, function () {
        $breadcrumb = [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
            ],
            [
                'name' => 'Clients',
                'route' => 'tenant.automobiles.index',
            ],
            [
                'name' => 'Client History',
                'route' => 'tenant.automobiles.index',
            ],
        ];
        $customers = User::with('customer')->where('role', Helper::TENANT_CUSTOMER)->paginate(Helper::PAGINATION);

        $table = [
            'title' => 'Clients',
            'collection' => $customers,
            'head' => ['Full Name', 'User Name', 'Email', 'Phone', 'Insurance Company', 'Car Count', 'Last Surveyor', 'Work History', 'Action'],
            'row' => ['car_number', 'color', 'chasis_no', 'year', 'model', 'relation' => ['customer', 'name']],
            'edit' => true,
            'create' => true,
            'delete' => true,
            'delete_route' => '',
            'edit_route' => '',
            'create_route' => 'tenant.clients.create',
            'action' => true,
            'print' => true,
            'excel' => true,
            'pdf' => true,
            'docx' => true,
            'reload' => true,
            'options' => [['label' => 'Accident', 'value' => 'accident'], ['label' => 'Damage', 'value' => 'damage']],
        ];

        return view('tenant.client-history.index', compact('breadcrumb', 'table'));
        // });
        // return $dataTable->render('central.admin.tenants.index');
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

        $breadcrumb = [
            [
                'name' => 'Dashboard',
                'route' => 'tenant.dashboard',
            ],
            [
                'name' => 'Clients',
                'route' => 'tenant.automobiles.index',
            ],
            [
                'name' => 'Create a New Client',
                'route' => 'tenant.clients.create',
            ],
        ];

        return view('tenant.client-history.create', compact('breadcrumb'));
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
                'role' => Helper::TENANT_CUSTOMER,
                'postal_code' => $validator['postal_code'],
            ]);

            Customer::create([
                'user_id' => $user->id,
                'country_id' => $validator['country_id'],
                'state_id' => $validator['state_id'],
                'city_id' => $validator['city_id'],
            ]);

            return redirect()->route('tenant.customers.index')->with('success', 'Success');
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
        $users = User::with('customers')->findOrFail($id);

        return view('tenant.customers.create', compact(
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
                'role' => Helper::TENANT_CUSTOMER,
                'postal_code' => $validator['postal_code'],
            ]);

            if ($request->has('password')) {
                $user = User::findOrFail($id)->update([
                    'password' => Hash::make($validator['password']),
                ]);
            }

            Customer::where('user_id', $user->id)->update([
                'user_id' => $user->id,
                'country_id' => $validator['country_id'],
                'state_id' => $validator['state_id'],
                'city_id' => $validator['city_id'],
            ]);

            return redirect()->route('tenant.customers.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);

        try {
            User::with('customers')->findOrFail($id)->delete();
            return redirect()->route('tenant.customers.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

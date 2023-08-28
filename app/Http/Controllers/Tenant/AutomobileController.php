<?php

namespace App\Http\Controllers\Tenant;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Automobile;
use App\Models\Tenant\City;
use App\Models\Tenant\Country;
use App\Models\Tenant\Customer;
use App\Models\Tenant\State;
use App\Models\Tenant\Tenant;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class AutomobileController extends Controller
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
                'route' => 'tenant.dashboard',
            ],
            [
                'name' => 'Automobile',
                'route' => 'tenant.automobiles.index',
            ],
        ];
        $automobiles = Automobile::with('user')->paginate(Helper::PAGINATION);

        $table = [
            'title' => 'Automobiles',
            'collection' => $automobiles,
            'head' => ['Car Number', 'Color', 'Chasis Number', 'Year', 'Model', 'Customer Name', 'Action'],
            'row' => ['car_number', 'color', 'chasis_no', 'year', 'model', 'relation' => ['customer', 'name']],
            'edit' => true,
            'create' => true,
            'delete' => true,
            'delete_route' => '',
            'edit_route' => '',
            'create_route' => 'tenant.automobiles.create',
            'action' => true,
            'print' => true,
            'excel' => true,
            'pdf' => true,
            'docx' => true,
            'reload' => true,
            'options' => [['label' => 'Accident', 'value' => 'accident'], ['label' => 'Damage', 'value' => 'damage']],
        ];

        return view('tenant.automobile.index', compact('breadcrumb', 'table'));
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
                'route' => 'dashboard',
            ],
            [
                'name' => 'Automobiles',
                'route' => 'tenant.automobiles.index',
            ],
            [
                'name' => 'Create a New Automobile',
                'route' => 'tenant.automobiles.create',
            ],
        ];

        return view('tenant.automobile.create', compact('breadcrumb'));
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

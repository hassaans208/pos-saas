<?php

namespace App\Http\Controllers\Central;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
// use App\Models\Tenant;
use App\Models\Tenant;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public $varification;
    public $params = ['id'];
    public function __construct($varification = new Helper())
    {
        $this->varification = $varification;
    }

    public function index(Request $request)
    {
        $data = [
            'name' => 'Hassaan',
            'email' => 'Hassaan',
            'password' => 'Hassaan',
        ];
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'prohibited',
        ];
        // dd($request->ip());
        // $tenant1 = Tenant::create(['id' => 'mirza-autos', 'ip_address'=> $request->ip()]);
        // $tenant1->domains()->create(['domain' => 'mirza-autos.localhost']);
        // $sanitizer = new Sanitizer;
        // Execute the sanitizer.
        // $sanitizer->sanitize($rules, $data);
        // dd($request->whereIn($this->params));
        // foreach ($request as $key => $req) {
        //     if ($key == 'attribute')
        //         dd($req);
        //     if ($key == 'query')
        //         dd($req);
        // }
        // return $this->varification->executeValid($request, function () {
            return view('central.admin.dashboard');
        // });
    }

    public function create_tenant($tenant_name)
    {
        // dd(Tenant::get());
        $tenant = Tenant::create([
            'id' => $tenant_name,
            // 'data' => "{'plan':'free', 'configuration':'random'}",
        ]);
        $tenant->domains()->create(['domain' => $tenant_name . '.enigmaedgeinnovation.tech']);

        return response()->json($tenant);
    }
}

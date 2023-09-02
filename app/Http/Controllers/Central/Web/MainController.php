<?php

namespace App\Http\Controllers\Central\Web;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
// use App\Models\Tenant;
use App\Models\Tenant;
use Illuminate\Http\Request;
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
        return view('central.web.home.index');
    }
    public function about(Request $request)
    {
        return view('central.web.about');
    }
    public function contact(Request $request)
    {
        return view('central.web.contact');
    }
    public function solutions(Request $request)
    {
        return view('central.web.solutions');
    }
    public function pricing(Request $request)
    {
        return view('central.web.pricing');
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

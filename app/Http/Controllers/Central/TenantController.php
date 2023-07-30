<?php

namespace App\Http\Controllers\Central;

use App\DataTables\TenantsDataTable;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TenantController extends Controller
{
    public  $varification;
    public function __construct($varification = new Helper())
    {
        $this->varification = $varification;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
 
        return $this->varification->executeValid($request, function () {

            $breadcrumb = [
                [
                    'name'=> 'Dashboard',
                    'route' => 'dashboard'
                ],
                [
                    'name'=> 'Tenants',
                    'route' => 'tenants.index'
                ],
            ];
            $tenants = Tenant::with('user')->get();
    
            $table = [
                'title' => 'Tenants',
                'collection' => $tenants,
                'head' => ['ID', 'Status', 'Action'],
                'row' => ['id', 'status'],
                'edit' => true,
                'create' => true,
                'delete'=> true,
                'delete_route'=> '',
                'edit_route'=> '',
                'create_route'=> 'tenants.create',
                'action'=> true,
                'print'=> true,
                'excel'=> true,
                'pdf'=> true,
                'docx'=> true,
                'reload'=> true,
            ]; 
            
            return view('central.admin.tenants.index', compact('breadcrumb', 'table'));
        });
        // return $dataTable->render('central.admin.tenants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            [
                'name'=> 'Dashboard',
                'route' => 'dashboard'
            ],
            [
                'name'=> 'Tenants',
                'route' => 'tenants.index'
            ],
            [
                'name'=> 'Create Tenant',
                'route' => 'tenants.create'
            ],
        ];
        return view('central.admin.tenants.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

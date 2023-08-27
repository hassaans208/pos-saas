<?php

namespace App\Http\Controllers\Central;

use App\DataTables\TenantsDataTable;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Tenant\CompanyDetail;
use App\Models\Tenant\User as TenantUser;
use App\Models\Tenant\UserHasUUID as TenantUserHasUUID;
use App\Models\User;
use App\Models\UserHasUUID;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class TenantController extends Controller
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
        return $this->varification->executeValid($request, function () {
            $breadcrumb = [
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard',
                ],
                [
                    'name' => 'Tenants',
                    'route' => 'tenants.index',
                ],
            ];
            $tenants = Tenant::with('user')->paginate(Helper::PAGINATION);
            // dd($tenants, $tenants->previousPageUrl());
            // dd(explode( '=', $tenants->nextPageUrl()));

            $table = [
                'title' => 'Tenants',
                'collection' => $tenants,
                'head' => ['ID', 'Status', 'Action'],
                'row' => ['id', 'status'],
                'edit' => true,
                'create' => true,
                'delete' => true,
                'delete_route' => '',
                'edit_route' => '',
                'create_route' => 'tenants.create',
                'action' => true,
                'print' => true,
                'excel' => true,
                'pdf' => true,
                'docx' => true,
                'reload' => true,
                'options' => [['label' => 'Active', 'value' => 'active'], ['label' => 'In active', 'value' => 'in-active']],
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
        // dd([]);
        $breadcrumb = [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
            ],
            [
                'name' => 'Tenants',
                'route' => 'tenants.index',
            ],
            [
                'name' => 'Create Tenant',
                'route' => 'tenants.create',
            ],
        ];
        return view('central.admin.tenants.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedRequest = validator()
            ->make($request->toArray(), [
                'full_name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'sometimes',
                'phone_number' => 'sometimes',
                'postal_code' => 'sometimes',
                'role' => 'required',
                'tenant_id' => 'required|unique:users,tenant_id',
            ])
            ->validate();

        $validatedRequest = $this->varification->verifyRequest($validatedRequest, $request);
        // dd($validatedRequest);
        if (!$validatedRequest) {
            return response()->json(['Warning' => 'Invalid Hit!']);
        }

        return $this->varification->executeValid($validatedRequest, function () use ($validatedRequest) {
            // DB::beginTransaction();
            $uuid = Str::random(20);

            $users = User::create([
                'name' => $validatedRequest['full_name'],
                'email' => $validatedRequest['email'],
                'std_id' => Hash::make($uuid),
                'tenant_id' => $validatedRequest['tenant_id'],
                'password' => Hash::make($validatedRequest['password']),
            ]);

            UserHasUUID::create(['user_id' => $users->id, 'orginal_std_id' => encrypt($uuid)]);

            $tenant = Tenant::create([
                'id' => $validatedRequest['tenant_id'],
            ]);

            $tenant->domains()->create(['domain' => $validatedRequest['tenant_id'] . Helper::ACTIVE_HOST]);

            // DB::commit();
            return redirect()
                ->route('tenants.index')
                ->with('success', 'Tenant Created Successfully!');
        });
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

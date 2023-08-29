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
use Exception;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
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
        // $validatedRequest = validator()
        //     ->make($request->toArray(), [
        //         'full_name' => 'required',
        //         'email' => 'required|unique:users,email',
        //         'password' => 'required|confirmed',
        //         'password_confirmation' => 'sometimes',
        //         'phone_number' => 'sometimes',
        //         'postal_code' => 'sometimes',
        //         'role' => 'required',
        //         'tenant_id' => 'required|unique:users,tenant_id',
        //     ])
        //     ->validate();

        // // if (!$validatedRequest) {
        // //     return response()->json(['Warning' => 'Invalid Hit!']);
        // // }
        $validatedRequest = $request->toArray();
        DB::beginTransaction();
        try {
            $uuid = Str::random(20);

            $users = new User();
            $users->name = $validatedRequest['full_name'];
            $users->email = $validatedRequest['email'];
            $users->std_id = Hash::make($uuid);
            $users->tenant_id = $validatedRequest['tenant_id'];
            $users->password = Hash::make($validatedRequest['password']);
            $users->save();
            // $uuid = new UserHasUUID();
            // $uuid->user_id = $users->id;
            // $uuid->orginal_std_id = encrypt($uuid);
            // $uuid->save();
            // SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column 'orginal_std_id' at row 1 (Connection: mysql, SQL: insert into `user_has_u_u_i_d_s` (`user_id`, `orginal_std_id`, `updated_at`, `created_at`) values (19, eyJpdiI6IldRNVBpYmxnMnhJblZsYVp4UWo3OEE9PSIsInZhbHVlIjoiakpQdVhxa3lRK0o0REF1V2ZPN0xqRlBGL1l2MHZnUVVKUm5UUWIyZHUwWWZDVDZSV1NmYVRNSTcwRUlVQS9YYUFSdFEwOVJkOUNpQWs2UTBKaGxlL1I4ajcwRCswNlRWSkNoM1AzZyswUUkwWGNmTWQ1c0p0cFhmNXdCdGFJNStSOWx6R28walBOWU0vaWJyNk5HSiszb25rYzk2azZ4S28zaDVjZHhXbW1tTjdid0lEcjQrclg2WCtnSTZXN2ZGUFlOWFQ5cGw2K0JWMHlCeDgzK1FMR2VQRTU4N3hMM3ByMG5PZjFaWC93dTVneWVweHpTZTNrU0xaa05Zdlhrb2QybDJPemM1YUI0ZTdGa3YzaUU4VERPMWRka0lza1dUejdKcHNYbnNpSVRDZGEzYlRGRkNUOWtnRFlWQXk1MVdJd0xraDNGZSt4d1RGV2ltMXZwR1J3UzZpOTA1Sm41R2taTjNUVkovNkZmTUhRM3dPVkh4ZHFrMS93azFURS9HZFBVMjZzMWEvYkpOZWIveDRhZFZPelJxWFlkUzFhQTROZjZ4SExOY2FJd0FMa1hyaWFxNUlyV3hPcE5kdjlUYzA2TTVtOUV4MEpVODJjUDc4N2dYQmhDZVRGUi9xRCtxalF0SFlnOTYwVTlFOXpzdnFrTTN2aGlzZEVzdlhmaTZSMWhpUGVpdkNXVDJZSkg2SDJyV0c2em1HaGo1QXVIRjNpWEVNZ0VYMTBCSFA2d3doWkRIalhQK2lnUEt2dFNkeFlLa3h3SEZwMHI0bFNyWGV6V25rZGZ1YS92UXo0Y1NiRnBxU1lJRmk0OTNlVFFQL2hJb1Fkcjd3dUZYQnlrUi9ZNEkxVTZrcE5Nb2U5ZkpkbEhTZFZPazJEOUJ5TWQzSW1HQVdMdkozWUZSdGpyQk1meFdwZ2pSdnU5ZHFSR2V6L1dsR1dJMWxDRjgrNi9qdk1Dc2NnUjIycnpjYXhmdHJaa0MwbTRUVENoZ2NsU2NpRHR0MVN4ZlVqbkd0enlRRDdWN1JIMEJaamhRaDl3eXRXYjNPWUt4Vzd2K3BaeElUdnN0aXg4Kzh0N09veFozMVVWK1RVd2M0blNST2FlbVJGdXFMZnU5V0VHc2xsbjJFZWJ0bndXWDdnalYvR1I0MzhJWFJZckkxWnBON1Nza3RiSXFlOXlCZ3JMYk1lSHZzVDNiMUhwdi8vekY2N1g3Yk5qTTVxWDZtbVV2aU0xNi8xcG5SczlxZG00ZW9VSWx1eEhsaWhtZzNqSjBRRy9WSjZsenUzU2taVDVlZVdham1iamxNdVBsdnRTWkpkckJ2VEdWOXZ5NHA2SUNLZkVaUTFWcmtnRFBWV0JQdE5lMlVTeDZjVThlSy9LZ2Myc1ZoR0kxcjEzUDEzY3lFTnVJQU1mdHBjN1cycXhmRmJyS3g4VjhFUDdOR2NrK3hsWTVMRWsxV0t5VGNRVEorRkdIRjBqOWdRMllOYStQb0lEVVZYUXNNRjFBTDdCeWYweStBZjJ2NGFqVjhpNjN5NXFXaGhBRTkza2p4THA1VWVwNHJNc2FqdkhzTHNiM0YwdWpvSGJPYjQ4YXlOOD0iLCJtYWMiOiI2ZDQxYzBiNjQyZjA2ZDQwZmNjZWVkMWI3Mjk5ZGVlYmQzNzc0MWIxMjYzMDBiZDQ2NThlMmU4ZTQ2MmFmYjZjIiwidGFnIjoiIn0=, 2023-08-29 13:41:35, 2023-08-29 13:41:35))

            $tenant = Tenant::create([
                'id' => $validatedRequest['tenant_id'],
            ]);

            $tenant->domains()->create(['domain' => $validatedRequest['tenant_id'] . Helper::getHost($request)]);
            // DB::commit();


            // dd(DB::transactionLevel());
            return redirect()
                ->route('tenants.index')
                ->with('success', 'Tenant Created Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
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

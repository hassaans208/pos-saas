<?php

namespace App\Helper;

use App\Models\UserHasUUID;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Helper
{
    const ACTIVE_HOST_LOCAL = '.localhost';
    const ACTIVE_HOST_PRODUCTION = '.enigmaedgeinnovation.tech';
    const PAGINATION = 10;
    const CENTRAL_ADMIN = 1;
    const CENTRAL_COMPANY = 2;
    const TENANT_ADMIN = 'admin';
    const TENANT_MANAGER = 'manager';
    const TENANT_STAFF = 'staff';
    const TENANT_INSURANCE_COMPANY = 'insurance_company';
    const TENANT_SURVEYOR = 'surveyor';
    const TENANT_CUSTOMER = 'customer';
    const TENANT_VENDOR = 'vendor';






    public function verifyRequest(array $validRequest, Request $request): array|bool
    {
        $validator = null;
        foreach ($validRequest as $key => $value) {
            data_forget($request, $key);
        }
        if ($request->has('_token')) {
            data_forget($request, '_token');
        }
        if ($request->has('_method')) {
            data_forget($request, '_method');
        }
        foreach ($request->toArray() as $key => $value) {
            $validator = validator()->make($request->toArray(), [
                $key => 'prohibited',
            ]);
        }
        // dd($validator->fails());
        if ($validator && $validator->fails()) {
            return response()->json(['Warning' => 'Invalid Hit!']);
        } else {
            return $validRequest;
        }
    }

    public function verifyUserId($callback)
    {
        $uuid = UserHasUUID::where('user_id', auth()->user()->id)->first();

        if (Hash::check(decrypt($uuid->orginal_std_id), auth()->user()->std_id)) {
            return $callback();
        } else {
            return response()->json(['Warning' => 'Invalid Hit!']);
        }
    }

    public function executeValid(Request|null|array $request = null, $action)
    {
        return $this->verifyUserId(function () use ($request, $action) {
            try {
                return $action($request);
            } catch (Exception $e) {
                // DB::rollBack();
                Log::info($e);
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage() . ': contact the administrator');
            }
        });
    }

    public static function getHost(Request $request): string
    {
        return $request->secure() ? self::ACTIVE_HOST_PRODUCTION : self::ACTIVE_HOST_LOCAL;
    }
}

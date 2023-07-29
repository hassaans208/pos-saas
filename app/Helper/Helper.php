<?php

namespace App\Helper;

use App\Models\UserHasUUID;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Request;

class Helper
{
    const CENTRAL_ADMIN  = 1;
    const CENTRAL_COMPANY  = 2;

    public function verifyRequest($callback)
    {
        $uuid = UserHasUUID::where('user_id', auth()->user()->id)->first();
        // dd($uuid);
        if (Hash::check($uuid->orginal_std_id, auth()->user()->std_id)) {
            return $callback();
        } else {
            return response()->json(['Warning' => 'Invalid Hit!']);
        }
    }

    public function executeValid(Request | null $request = null, $action)
    {
        return $this->verifyRequest(function () use ($request, $action) {
            try {
                return $action($request);
            } catch (Exception $e) {
                Log::info($e->getMessage(), $e->getTrace(), $e->getFile(), $e->getLine());
                return redirect()->back()->with('error', 'Error while performing action please contact the administrator');
            }
        });
    }
}

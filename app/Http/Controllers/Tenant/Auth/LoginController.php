<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->route('admin.dashboard');
            } else if ($user->role_id == 2) {
                return redirect()->route('manager.dashboard');
            } else if ($user->role_id == 3) {
                return redirect()->route('staff-user.dashboard');
            } else if ($user->role_id == 4) {
                return redirect()->route('property-owner.dashboard');
            }
        }
        if (tenant('id') !== null) {
            return view('tenant.auth.login');
        } else {
            return view('central.auth.login');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();
            if ($user->status == 'in-active') {
                Auth::logout();
                return back()->with("error", "Account Blocked. Please contact to the webmaster.");
            }
            return redirect()->route('tenant.dashboard');
            if ($user->role_id == 1) {
            } else if ($user->role_id == 2) {
                return redirect()->route('real-estate-manager.dashboard');
            } else if ($user->role_id == 3) {
                return redirect()->route('staff-user.dashboard');
            }
        } else {
            return back()->with("error", "Wrong Email or Password");
        }
    }
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}

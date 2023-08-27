<?php

namespace App\Http\Controllers\Tenant\Theme;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function change_theme(Request $request)
    {
        $theme = Theme::firstOrNew(['user_id' => auth()->user()->std_id]);
        $theme->theme = $theme->theme == 'light' ? 'dark' : 'light';
        $theme->save();

        return response()->json(['status' => 200, 'mode' => $theme->theme]);
    }
}

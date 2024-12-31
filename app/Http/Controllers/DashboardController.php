<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('key') == env('DASHBOARD_KEY')) {
            return view('dashboard');
        }

        return abort(403);
    }
}

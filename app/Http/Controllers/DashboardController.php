<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('key') == env('DASHBOARD_KEY')) {
            $data['form'] = Form::orderBy('created_at', 'desc')->get();

            return view('dashboard')->with($data);
        }

        return abort(403);
    }
}

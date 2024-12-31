<?php

namespace App\Http\Controllers;

use App\Exports\FormExport;
use App\Models\Form;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportData(Request $request)
    {
        if ($request->query('key') == env('DASHBOARD_KEY')) {
            return Excel::download(new FormExport, 'data-pendaftar-glora' . Carbon::now()->format('d-m-Y') . '.xlsx');
        }

        return abort(403);
    }
}

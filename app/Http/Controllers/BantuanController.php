<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('key') == env('BANTUAN_KEY')) {
            return view('bantuan.index');
        }

        return redirect()->route('form.daftar');
    }
}

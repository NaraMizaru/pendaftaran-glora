<?php

namespace App\Http\Controllers;

use App\Exports\DukunganExport;
use App\Models\Dukungan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class BantuanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('key') == env('BANTUAN_KEY')) {
            $data['dukungan'] = Dukungan::orderBy('created_at', 'asc')->get();

            return view('bantuan.index')->with($data);
        }

        return redirect()->route('form.daftar');
    }

    public function store(Request $request)
    {
        if ($request->query('key') == env('BANTUAN_KEY')) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'dukungan' => 'required',
                'angkatan' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $dukungan = new Dukungan();
            $dukungan->nama = $request->nama;
            $dukungan->dukungan = $request->dukungan;
            $dukungan->angkatan = $request->angkatan;
            $dukungan->save();

            return redirect()->back()->with('success', 'Terima kasih atas dukungan Anda!');
        }

        return redirect()->route('form.daftar');
    }

    public function exportData(Request $request)
    {
        if ($request->query('key') == env('BANTUAN_KEY')) {
            return Excel::download(new DukunganExport(), 'data-dukungan-glora-' . Carbon::now()->format('d-m-Y') . '.xlsx');
        }
    }
}

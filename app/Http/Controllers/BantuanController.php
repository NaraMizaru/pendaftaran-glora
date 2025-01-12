<?php

namespace App\Http\Controllers;

use App\Models\Dukungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BantuanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('key') == env('BANTUAN_KEY')) {
            $data['dukungan'] = Dukungan::orderBy('created_at', 'desc')->get();

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
                return redirect()->route('dukungan.index')->withErrors($validator->errors())->withInput($request->all());
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
}

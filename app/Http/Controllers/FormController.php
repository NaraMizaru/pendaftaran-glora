<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function index()
    {
        return view('form.index');
    }

    public function daftar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_sekolah' => 'required',
            'pp' => 'required',
            'tandu' => 'required',
            'karikatur' => 'required',
            'du' => 'required',
            'konselor' => 'required',
            'kabaret' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }

        $listHarga = [
            'pertolonganPertama' => 45000,
            'tandu' => 45000,
            'karikatur' => 45000,
            'dapurUmum' => 50000,
            'prsKonselor' => 50000,
            'prsKabaret' => 50000
        ];

        $totalHargaPP = $listHarga['pertolonganPertama'] * $request->pp;
        $totalHargaTandu = $listHarga['tandu'] * $request->tandu;
        $totalHargaKarikatur = $listHarga['karikatur'] * $request->karikatur;
        $totalHargaDU = $listHarga['dapurUmum'] * $request->du;
        $totalHargaKonselor = $listHarga['prsKonselor'] * $request->konselor;
        $totalHargaKabaret = $listHarga['prsKabaret'] * $request->kabaret;

        $totalHarga = $totalHargaPP + $totalHargaTandu + $totalHargaKarikatur + $totalHargaDU + $totalHargaKonselor + $totalHargaKabaret;

        $form = new Form();
        $form->nama_sekolah = $request->nama_sekolah;
        $form->pp = $request->pp;
        $form->tandu = $request->tandu;
        $form->karikatur = $request->karikatur;
        $form->du = $request->du;
        $form->konselor = $request->konselor;
        $form->kabaret = $request->kabaret;
        $form->total_harga = $totalHarga;

        if ($request->hasFile('bukti_pembayaran')) {
            $form->bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
        }
        $form->save();

        return redirect()->route('form.success')->with('success', 'Formulir berhasil disimpan');
    }

    public function success()
    {
        return view('form.after-register');
    }
}

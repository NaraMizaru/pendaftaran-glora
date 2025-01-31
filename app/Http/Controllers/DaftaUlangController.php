<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DaftarUlang;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DaftaUlangController extends Controller
{
    public function index()
    {
        $daftarUlangs = DaftarUlang::with(['sekolah', 'category'])->get();

        $groupedData = [];
        foreach ($daftarUlangs as $daftarUlang) {
            $sekolah = $daftarUlang->sekolah->nama;
            $kategori = $daftarUlang->category->nama_kategori;
            $nomorUrut = $daftarUlang->nomor_urut;

            // Pastikan setiap sekolah sudah memiliki kategori yang benar
            if (!isset($groupedData[$sekolah])) {
                $groupedData[$sekolah] = [
                    'PP Putra Putri' => [],
                    'Tandu Putra Putri' => [],
                    'Karikatur' => [],
                    'Dapur Umum' => [],
                    'Konselor' => [],
                    'Kabaret' => [],
                ];
            }

            // Gabungkan kategori yang relevan
            if ($kategori == 'PP Putra Putri') {
                $groupedData[$sekolah]['PP Putra Putri'][] = $nomorUrut;
            } elseif ($kategori == 'Kabaret') {
                $groupedData[$sekolah]['Kabaret'][] = $nomorUrut;
            } elseif ($kategori == 'Tandu Putra Putri') {
                $groupedData[$sekolah]['Tandu Putra Putri'][] = $nomorUrut;
            } elseif ($kategori == 'Konselor') {
                $groupedData[$sekolah]['Konselor'][] = $nomorUrut;
            } elseif ($kategori == 'Dapur Umum') {
                $groupedData[$sekolah]['Dapur Umum'][] = $nomorUrut;
            } elseif ($kategori == 'Karikatur') {
                $groupedData[$sekolah]['Karikatur'][] = $nomorUrut;
            }
        }

        return view('daftar-ulang.index', compact('groupedData'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_sekolah' => 'required|string',
            'type' => 'required|in:Madya,Wira',
            'categories' => 'required|array',
        ]);

        // Simpan data sekolah
        $sekolah = Sekolah::create(['nama' => $request->nama_sekolah]);

        // Mapping kategori
        $categoryMapping = [
            'pp_putra' => 'PP Putra Putri',
            'pp_putri' => 'PP Putra Putri',
            'tandu_putra' => 'Tandu Putra Putri',
            'tandu_putri' => 'Tandu Putra Putri',
            'karikatur' => 'Karikatur',
            'du' => 'Dapur Umum',
            'konselor' => 'Konselor',
            'kabaret' => 'Kabaret',
        ];

        $daftarUlangs = [];

        // Loop untuk setiap kategori yang didaftarkan
        foreach ($request->categories as $categoryKey => $jumlahTeam) {
            if ($jumlahTeam > 0) {
                $namaKategori = $categoryMapping[$categoryKey] ?? null;

                if ($namaKategori) {
                    $category = Category::where('nama_kategori', $namaKategori)->first();

                    if ($category) {
                        $kuota = $request->type === 'Wira' ? $category->kuota_wira : $category->kuota_madya;

                        // Generate nomor urut secara acak
                        for ($i = 1; $i <= $jumlahTeam; $i++) {
                            do {
                                $nomorUrut = rand(1, $kuota);
                                $isNomorUrutUsed = DaftarUlang::where('category_id', $category->id)
                                    ->where('nomor_urut', $nomorUrut)
                                    ->exists();
                            } while ($isNomorUrutUsed);

                            // Simpan data pendaftaran ulang
                            $daftarUlang = DaftarUlang::create([
                                'sekolah_id' => $sekolah->id,
                                'category_id' => $category->id,
                                'type' => $request->type,
                                'gender' => str_contains($namaKategori, 'Putra') ? 'Putra' : (str_contains($namaKategori, 'Putri') ? 'Putri' : null),
                                'nomor_urut' => $nomorUrut,
                            ]);

                            $daftarUlangs[] = $daftarUlang;
                        }
                    }
                }
            }
        }

        // Redirect kembali dengan pesan sukses dan kirim data daftar ulang yang baru
        return redirect()->route('daftar-ulang.index')->with('success', 'Pendaftaran berhasil!')->with('daftarUlangs', $daftarUlangs);
    }
}

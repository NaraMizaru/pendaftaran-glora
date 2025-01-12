<?php

namespace App\Exports;

use App\Models\Dukungan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DukunganExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Dukungan::select('nama', 'dukungan', 'angkatan')->get();

        $data = $data->map(function ($item, $index) {
            return [
                'No' => $index + 1,
                'Nama' => $item->nama,
                'Dukungan' => $item->dukungan,
                'Angkatan' => $item->angkatan,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Dukungan',
            'Angkatan',
        ];
    }
}

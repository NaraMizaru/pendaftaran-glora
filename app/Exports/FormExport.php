<?php

namespace App\Exports;

use App\Models\Form;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Form::select('nama_sekolah', 'pp', 'tandu', 'karikatur', 'du', 'konselor', 'kabaret')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Sekolah',
            'PP',
            'Tandu',
            'Karikatur',
            'DU',
            'Konselor',
            'Kabaret',
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\typeMineral;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TypeMineralExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return typeMineral::whereNull('tm_userDelete')
        ->select('tm_no', 'tm_name')
        ->get();
    }

    public function headings(): array
    {
        return [
            'รหัสชนิดแร่',
            'ชื่อชนิดแร่',
        ];
    }
}

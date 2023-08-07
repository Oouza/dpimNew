<?php

namespace App\Exports;

use App\Models\TypeJob;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TypeJobExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return typeJob::whereNull('tj_userDelete')
            ->select('tj_no', 'tj_name')
            ->get();
    }

    public function headings(): array
    {
        return [
            'รหัสประเภทงาน',
            'ชื่อประเภทงาน',
        ];
    }
}

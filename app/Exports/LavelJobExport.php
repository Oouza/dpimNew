<?php

namespace App\Exports;

use App\Models\lavelJob;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LavelJobExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return lavelJob::whereNull('lj_userDelete')
            ->select('lj_no', 'lj_name')
            ->get();
    }

    public function headings(): array
    {
        return [
            'รหัสระดับงาน',
            'ชื่อระดับงาน',
        ];
    }
}

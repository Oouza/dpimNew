<?php

namespace App\Exports;

use App\Models\typeCourse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TypeCourseExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return typeCourse::whereNull('tc_userDelete')
        ->select('tc_no', 'tc_name')
        ->get();
    }

    public function headings(): array
    {
        return [
            'รหัสประเภทหลักสูตร',
            'ชื่อประเภทหลักสูตร',
        ];
    }
}

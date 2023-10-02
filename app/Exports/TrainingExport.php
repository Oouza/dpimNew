<?php

namespace App\Exports;

use App\Models\training;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return training::join('users','users.id','trainings.FKtn_userId')
        ->join('employees','employees.FKe_userid','trainings.FKtn_userId')    
        // ->join('courses','courses.cou_id','trainings.FKtn_courseId')
        ->join('courses','courses.cou_id','trainings.FKtn_courseId')
        ->where('tn_status',1)->whereNull('tn_userDelete')
        ->select('e_title','e_fname','e_lname','email','cou_name','tn_dateTrain','tn_endCredit')
        ->get();
    }

    public function headings(): array
    {
        return [
            'คำนำหน้า',
            'ชื่อ',
            'นามสกุล',
            'อีเมล',
            'หลักสูตรอบรม',
            'วันที่อบรม',
            'วันสิ้นสุดใบรับรอง',
        ];
    }
}

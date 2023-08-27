<?php

namespace App\Exports;

use App\Models\departmentSub;
use App\Models\ceohr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class DepartmentSubExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        return departmentSub::join('departments','departments.d_id','department_subs.FKds_department')
        ->where('FKds_company',$hr->FKch_company)->whereNull('d_delete')
        ->select('ds_name','d_name')
        ->get();
    }

    public function headings(): array
    {
        return [
            'ชื่อแผนกย่อย',
            'ชื่อแผนก'
        ];
    }
}

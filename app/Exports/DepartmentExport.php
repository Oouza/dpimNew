<?php

namespace App\Exports;

use App\Models\departments;
use App\Models\ceohr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class DepartmentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        return departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')
        ->select('d_name')
        ->get();
    }

    public function headings(): array
    {
        return [
            'ชื่อแผนก'
        ];
    }
}

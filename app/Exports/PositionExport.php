<?php

namespace App\Exports;

use App\Models\position;
use App\Models\ceohr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class PositionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        return position::where('FKp_company',$hr->FKch_company)->whereNull('p_delete')
        ->select('p_name')
        ->get();
    }

    public function headings(): array
    {
        return [
            'ชื่อตำแหน่ง'
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\skills;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class SkilsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return skills::all();

        $capacities = skills::join('capacities','capacities.cc_id','skills.FKs_capacity')->whereNull('cc_userDelete')->get();

        $data = $capacities->map(function ($capacity) {
            return [
                's_no'      => $capacity->s_no,
                's_name'    => $capacity->s_name,
                's_detail'  => html_entity_decode(strip_tags($capacity->s_detail)),
                'FKs_capacity'  => $capacity->cc_name,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'รหัสทักษะ',
            'ชื่อทักษะ',
            'รายละเอียดทักษะ',
            'สมรรถนะ',
        ];
    }
}

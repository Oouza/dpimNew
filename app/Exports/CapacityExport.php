<?php

namespace App\Exports;

use App\Models\capacity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class CapacityExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $capacities = capacity::whereNull('cc_userDelete')->get();

        $data = $capacities->map(function ($capacity) {
            return [
                'cc_no' => $capacity->cc_no,
                'cc_name' => $capacity->cc_name,
                'cc_detail' => html_entity_decode(strip_tags($capacity->cc_detail)),
            ];
        });

        return $data;
    }
    public function headings(): array
    {
        return [
            'รหัสสมรรถนะ',
            'ชื่อสมรรถนะ',
            'รายละเอียดสมรรถนะ',
        ];
    }
}

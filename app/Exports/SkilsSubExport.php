<?php

namespace App\Exports;

use App\Models\skillsSubs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class SkilsSubExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $skillsSubs = skillsSubs::join('skills','skills.s_id','skills_subs.FKss_skills')
        ->join('capacities','capacities.cc_id','skills.FKs_capacity')->whereNull('ss_userDelete')->get();

        $data = $skillsSubs->map(function ($ss) {
            return [
                'ss_no' => $ss->ss_no,
                'ss_name' => $ss->ss_name,
                'ss_detail' => html_entity_decode(strip_tags($ss->ss_detail)),
                'ss_standardOne' => html_entity_decode(strip_tags($ss->ss_standardOne)),
                'ss_standardTwo' => html_entity_decode(strip_tags($ss->ss_standardTwo)),
                'ss_standardThree' => html_entity_decode(strip_tags($ss->ss_standardThree)),
                's_name' => $ss->s_name,
                'ss_name' => $ss->ss_name,
            ];
        });

        return $data;
    }
    public function headings(): array
    {
        return [
            'รหัสทักษะย่อย',
            'ชื่อทักษะย่อย',
            'รายละเอียดทักษะย่อย',
            'เกณฑ์ระดับที่ 1',
            'เกณฑ์ระดับที่ 2',
            'เกณฑ์ระดับที่ 3',
            'ทักษะ',
        ];
    }
}

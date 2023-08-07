<?php

namespace App\Exports;

use App\Models\employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeopleExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return employee::join('users', 'users.id', 'employees.FKe_userid')
        ->join('provinces as province_now', 'province_now.id', 'employees.FKe_province_now')
        ->join('provinces as province_past', 'province_past.id', 'employees.FKe_province_past')
        ->join('amphures as amphur_now', 'amphur_now.id', 'employees.FKe_amphur_now')
        ->join('amphures as amphur_past', 'amphur_past.id', 'employees.FKe_amphur_past')
        ->join('districts as tambon_now', 'tambon_now.id', 'employees.FKe_tambon_now')
        ->join('districts as tambon_past', 'tambon_past.id', 'employees.FKe_tambon_past')
        ->where('status', 8)
        ->whereNull('e_userDelete')
        ->select('e_title', 'e_fname', 'e_lname', 'email', 'e_phone', 'e_birth',
        'addressNO_now', 'province_now.name_th as province_now_name', 'amphur_now.name_th as amphur_now_name',
        'tambon_now.name_th as tambon_now_name', 'postcode_now',
        'addressNO_past', 'province_past.name_th as province_past_name',
        'amphur_past.name_th as amphur_past_name', 'tambon_past.name_th as tambon_past_name', 'postcode_past', 'e_gender')
        ->get();
    }

    public function headings(): array
    {
        return [
            'คำนำหน้า',
            'ชื่อ',
            'นามสกลุ',
            'อีเมล',
            'เบอร์โทร',
            'วันเดือนปีเกิด',
            'ที่อยู่ปัจจุบัน',
            'จังหวัด',
            'เขต/อำเภอ',
            'แขวง/ตำบล',
            'รหัสไปรษณีย์',
            'ที่อยู่ตามทะเบียนบ้าน',
            'จังหวัด',
            'เขต/อำเภอ',
            'แขวง/ตำบล',
            'รหัสไปรษณีย์',
            'เพศ',
        ];
    }
}

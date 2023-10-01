<?php

namespace App\Exports;

use App\Models\ceohr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ceohr::join('users', 'users.id', 'ceohrs.FKch_userid')
        ->join('companies', 'companies.c_id', 'ceohrs.FKch_company')
        ->join('type_minerals', 'type_minerals.tm_id', 'companies.FKc_typemineral')
        ->join('provinces', 'provinces.id', 'companies.FKc_provinces')
        ->join('amphures', 'amphures.id', 'companies.FKc_amphur')
        ->join('districts', 'districts.id', 'companies.FKc_tumbon')
        ->where('status', 4)
        ->whereNull('ch_userDelete')
        ->select('c_nameCompany','c_licenseNo','c_startDate','c_endDate','tm_name','c_typeMineralSub'
        ,'c_typeCompany','c_phone','c_addressNo','provinces.name_th as provinces_name','amphures.name_th as amphures_name'
        ,'districts.name_th as districts_name','c_postCode','ch_title','ch_fname','ch_lname','email','ch_phone'
        ,'ch_position')
        ->get();
    }

    public function headings(): array
    {
        return [
            'ชื่อสถานประกอบการ',
            'เลขที่ใบอนุญาต',
            'วันที่ได้ใบอนุญาต',
            'วันสิ้นสุดใบอนุญาต',
            'ชนิดแร่หลัก',
            'ชนิดแร่รอง',
            'ประเภทสถานประกอบการ',
            'เบอร์ติดต่อสถานประกอบการ',
            'ที่ตั้งสถานประกอบการ',
            'จังหวัด',
            'เขต/อำเภอ',
            'แขวง/ตำบล',
            'รหัสไปรษณีย์',
            'คำนำหน้า',
            'ชื่อ',
            'นามสกลุ',
            'อีเมล',
            'เบอร์โทรส่วนตัว',
            'ตำแหน่ง',
        ];
    }
}

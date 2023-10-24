<?php

namespace App\Exports;

use App\Models\employee;
use App\Models\ceohr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();

        return employee::join('users', 'users.id', 'employees.FKe_userid')
        ->leftjoin('provinces as province_now', 'province_now.id', 'employees.FKe_province_now')
        ->leftjoin('provinces as province_past', 'province_past.id', 'employees.FKe_province_past')
        ->leftjoin('amphures as amphur_now', 'amphur_now.id', 'employees.FKe_amphur_now')
        ->leftjoin('amphures as amphur_past', 'amphur_past.id', 'employees.FKe_amphur_past')
        ->leftjoin('districts as tambon_now', 'tambon_now.id', 'employees.FKe_tambon_now')
        ->leftjoin('districts as tambon_past', 'tambon_past.id', 'employees.FKe_tambon_past')
        ->leftjoin('departments','departments.d_id','employees.FKe_department')
        ->leftjoin('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
        ->leftjoin('setting_positions','setting_positions.sp_id','employees.FKe_position')
        ->leftjoin('positions','positions.p_id','setting_positions.FKgsp_position')
        ->leftjoin('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->where('status', 8)
        ->where('FKe_company', $hr->FKch_company)
        ->where('e_status', 1)
        ->whereNull('e_userDelete')
        ->select('e_title', 'e_fname', 'e_lname', 'email', 'e_phone', 'e_gender', 'e_birth', 'd_name', 'ds_name', 'p_name', 'gj_name',
        'addressNO_now', 'province_now.name_th as province_now_name', 'amphur_now.name_th as amphur_now_name',
        'tambon_now.name_th as tambon_now_name', 'postcode_now',
        'addressNO_past', 'province_past.name_th as province_past_name',
        'amphur_past.name_th as amphur_past_name', 'tambon_past.name_th as tambon_past_name', 'postcode_past')
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
            'เพศ',
            'วันเดือนปีเกิด',
            'แผนก',
            'แผนกย่อย',
            'ตำแหน่ง',
            'กลุ่มตำแหน่ง',
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
        ];
    }
}

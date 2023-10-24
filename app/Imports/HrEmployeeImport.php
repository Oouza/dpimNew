<?php

namespace App\Imports;

use App\Models\employee;
use App\Models\User;
use App\Models\departments;
use App\Models\departmentSub;
use App\Models\settingPosition;
use App\Models\ceohr;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HrEmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $hr = ceohr::join('companies','companies.c_id','ceohrs.FKch_company')->where('FKch_userid',Auth::user()->id)->first();
        $name = $row['title'].' '.$row['first_name'].' '.$row['last_name'];
        $checkEmail = DB::table('users')->where('email',$row['email'])->first();

        $chUser =  DB::table('users')->join('employees','employees.FKe_userid','users.id')
            ->where('e_title',$row['title'])->where('e_fname',$row['first_name'])
            ->where('e_lname',$row['last_name'])->where('e_phone',$row['phone'])->first();

        $date_b = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['birth_day'])->format('Y-m-d');
        if((empty($checkEmail)) && (empty($chUser))){
            $User           = new User;
            $User->name     = $name;
            $User->email    = $row['email'];
            $User->password = Hash::make($row['password']);
            $User->status   = 8;
            $User->save();
            
            $last = DB::table('users')->latest('id')->first();
            $userId = $last->id;

            $provinceName = $row['provinces_now'];
            $provincesNow = DB::table('provinces')->where('name_th', 'LIKE', '%'.$provinceName.'%')->first();
            $provindeNowId = $provincesNow->id;
            $amphuresNow = $row['amphures_now'];
            $amphuresNow = DB::table('amphures')->where('name_th', 'LIKE', '%'.$amphuresNow.'%')->first();
            $amphuresNowId = $amphuresNow->id;
            $tumbonNow = $row['tumbon_now'];
            $tumbonNow = DB::table('districts')->where('name_th', 'LIKE', '%'.$tumbonNow.'%')->first();
            $tumbonNowId = $tumbonNow->id;

            $provincesPast = $row['provinces_birth'];
            $provincesPast = DB::table('provinces')->where('name_th', 'LIKE', '%'.$provincesPast.'%')->first();
            $provindePastId = $provincesPast->id;
            $amphuresPast = $row['amphures_birth'];
            $amphuresPast = DB::table('amphures')->where('name_th', 'LIKE', '%'.$amphuresPast.'%')->first();
            $amphuresPastId = $amphuresPast->id;
            $tumbonPast = $row['tumbon_birth'];
            $tumbonPast = DB::table('districts')->where('name_th', 'LIKE', '%'.$tumbonPast.'%')->first();
            $tumbonPastId = $tumbonPast->id;

            $department = $row['main_department'];
            $department = departments::where('FKd_company',$hr->FKch_company)->where('d_name', 'LIKE', '%'.$department.'%')->first();
            $deSub = $row['sub_department'];
            $deSub = departmentSub::where('FKds_company',$hr->FKch_company)->where('ds_name', 'LIKE', '%'.$deSub.'%')->first();
            $position = $row['position'];
            $position = settingPosition::leftjoin('positions', 'positions.p_id', 'setting_positions.FKgsp_position')
                ->leftjoin('groupjobs', 'groupjobs.gj_id', 'setting_positions.FKgsp_groupJob')
                ->leftjoin('lavel_jobs', 'lavel_jobs.lj_id', 'setting_positions.FKgsp_lavel')
                ->where('FKgsp_company',$hr->FKch_company)->where('p_name', 'LIKE', '%'.$position.'%')
                ->first();
                
            $employee = new employee;
            $employee->e_title              = $row['title'];
            $employee->e_fname              = $row['first_name'];
            $employee->e_lname              = $row['last_name'];
            $employee->e_phone              = $row['phone'];
            $employee->e_birth              = $date_b;
            $employee->e_gender             = $row['gender'];
            $employee->e_status             = 1;
            $employee->FKe_company          = $hr->FKch_company;
            $employee->e_nameCompany        = $hr->c_nameCompany;
            $employee->e_employeeNo         = $row['coed_employee'];
            $employee->FKe_department       = $department->d_id;
            $employee->e_nameDepartment     = $department->d_name;
            $employee->FKe_departmentSub    = $deSub->ds_id;
            $employee->e_nameDepartmentSub  = $deSub->ds_name;
            $employee->FKe_position         = $position->sp_id;
            $employee->e_namePosition       = $position->p_name;
            $employee->FKe_lavel            = $position->lj_id;
            $employee->e_nameLavel          = $position->lj_name;
            $employee->FKe_group            = $position->gj_id;
            $employee->e_nameGroup          = $position->gj_name;
            $employee->addressNO_now        = $row['address_now'];
            $employee->FKe_province_now     = $provindeNowId;
            $employee->FKe_amphur_now       = $amphuresNowId;
            $employee->FKe_tambon_now       = $tumbonNowId;
            $employee->postcode_now         = $row['postcodey_now'];
            $employee->addressNO_past       = $row['address_birth'];
            $employee->FKe_province_past    = $provindePastId;
            $employee->FKe_amphur_past      = $amphuresPastId;
            $employee->FKe_tambon_past      = $tumbonPastId;
            $employee->postcode_past        = $row['postcodey_birth'];
            $employee->FKe_userid           = $userId;
            $employee->e_userCreate         = Auth::user()->name;
            $employee->e_userUpdate         = Auth::user()->name;
            $employee->save();

        }else{
            if(!empty($checkEmail)){
                $mes = 'อีเมล '.$row['email'].' ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมล';
                $yourURL= url('company/user');
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }elseif(!empty($chUser)){
                // return back()->with('success',$name.' ลงทะเบียนแล้ว',compact(('request')));
                $mes = $name.' ลงทะเบียนแล้ว';
                $yourURL= url('company/user');
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }
        }
    }
}

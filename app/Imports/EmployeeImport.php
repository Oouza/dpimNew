<?php

namespace App\Imports;

use App\Models\employee;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $name = $row['title'].' '.$row['first_name'].' '.$row['last_name'];
        $checkEmail = DB::table('users')->where('email',$row['email'])->first();
        // return new User ([
        //     'name'      => $name,
        //     'email'     => $row['email'],
        //     'password'  => Hash::make($row['password']),
        //     'status'    => 8,
        // ]);
        $date_b = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['birth_day'])->format('Y-m-d');
        // dd(Auth::user()->name);
        if(!empty($checkEmail)){
            $User           = new User;
            $User->name     = $name;
            $User->email    = $row['email'];
            $User->password = Hash::make($row['password']);
            $User->status   = 8;
            $User->save();
            
            // $lname = $row['last_name'];

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
            // dd($amphuresNowId);
            $employee = new employee;
            $employee->e_title              = $row['title'];
            $employee->e_fname              = $row['first_name'];
            $employee->e_lname              = $row['last_name'];
            $employee->e_phone              = $row['phone'];
            $employee->e_birth              = $date_b;
            $employee->e_gender             = $row['gender'];
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
            $mes = 'อีเมล '.$row['email'].' ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมล';
            $yourURL= url('backend/people');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
    }
}

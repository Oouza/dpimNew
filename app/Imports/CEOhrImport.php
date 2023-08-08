<?php

namespace App\Imports;

use App\Models\ceohr;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class CEOhrImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $checkEmail = DB::table('users')->where('email',$row['email'])->first();
        $chCompany = DB::table('companies')->where('c_nameCompany',$row['company_name'])->where('c_licenseNo',$row['company_license_no'])->first();
        // dd($chCompany);
        $name = $row['title_people'].' '.$row['fname_people'].' '.$row['lname_people'];
        $date_start = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['license_no_start'])->format('Y-m-d');
        $date_end = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['license_no_end'])->format('Y-m-d');

        if(empty($checkEmail)){
            if(!empty($chCompany->FKc_manager) && !empty($chCompany->FKc_hr)){
                $mes = 'สถานประกอบการ '.$row['company_name'].' มี ผู้บริหาร  และ HR แล้ว';
                $yourURL= url('backend/company');
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
                        
            }elseif(!empty($chCompany->FKc_manager) && $row['position']=='ผู้บริหาร'){
                return back()->with('success','สถานประกอบการ '.$row['company_name'].' มี ผู้บริหาร แล้ว',compact(('request')));
                $mes = 'สถานประกอบการ '.$row['company_name'].' มี ผู้บริหาร แล้ว';
                $yourURL= url('backend/company');
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }elseif(!empty($chCompany->FKc_hr) && $row['position']=='HR'){
                $mes = 'สถานประกอบการ '.$row['company_name'].' มี HR แล้ว';
                $yourURL= url('backend/company');
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }else{
                $provinceName = $row['provines_company'];
                $provinces = DB::table('provinces')->where('name_th', 'LIKE', '%'.$provinceName.'%')->first();
                $provindeNowId = $provinces->id;
                $amphu = $row['amphur_company'];
                $amphu = DB::table('amphures')->where('name_th', 'LIKE', '%'.$amphu.'%')->first();
                $amphuId = $amphu->id;
                $tumbon = $row['tumbon_company'];
                $tumbon = DB::table('districts')->where('name_th', 'LIKE', '%'.$tumbon.'%')->first();
                $tumbonId = $tumbon->id;

                $User = new User;
                $User->name     = $name;
                $User->email    = $row['email'];
                $User->password = Hash::make($row['password']);
                $User->status   = 4;
                $User->save();

                $lastUser = DB::table('users')->latest('id')->first();
                
                // dd($chCompany);

                $chMineral = DB::table('type_minerals')->where('tm_name',$row['mineral_main'])->first();

                if(empty($chCompany)){
                    $Company            = new Company;
                    $Company->c_nameCompany         = $row['company_name'];
                    $Company->c_licenseNo           = $row['company_license_no'];
                    $Company->c_startDate           = $date_start;
                    $Company->c_endDate             = $date_end;
                    $Company->FKc_typemineral       = $chMineral->tm_id;
                    $Company->c_nameTypeMineral     = $row['mineral_main'];
                    $Company->c_typeMineralSub      = $row['mineral_sub'];
                    $Company->c_typeCompany         = $row['company_type'];
                    $Company->c_phone               = $row['phone_compamy'];
                    $Company->c_addressNo           = $row['address_company'];
                    $Company->FKc_provinces         = $provindeNowId;
                    $Company->FKc_amphur            = $amphuId;
                    $Company->FKc_tumbon            = $tumbonId;
                    $Company->c_postCode	        = $row['postcode_company'];
                    $Company->c_userCreate          = Auth::user()->name;
                    $Company->c_userUpdate          = Auth::user()->name;
                    $Company->save();
    
                    $lastCompany = DB::table('companies')->latest('c_id')->first();

                    $ceohr                  = new ceohr;
                    $ceohr->ch_title        = $row['title_people'];
                    $ceohr->ch_fname        = $row['fname_people'];
                    $ceohr->ch_lname        = $row['lname_people'];
                    $ceohr->ch_phone        = $row['phone_people'];
                    $ceohr->ch_position     = $row['position'];
                    $ceohr->FKch_userid     = $lastUser->id;
                    $ceohr->FKch_company    = $lastCompany->c_id;
                    $ceohr->ch_userCreate   = Auth::user()->name;
                    $ceohr->ch_userUpdate   = Auth::user()->name;
                    $ceohr->save();

                    $lastCEOhr= DB::table('ceohrs')->latest('ch_id')->first();

                    if($row['position'] == 'ผู้บริหาร'){
                        $upCompany = Company::find($lastCompany->c_id)->update([
                            'FKc_manager'   => $lastCEOhr->ch_id,
                        ]);
                    }else{
                        $upCompany = Company::find($lastCompany->c_id)->update([
                            'FKc_hr'   => $lastCEOhr->ch_id,
                        ]);
                    }
                    $upUser = User::find($lastUser->id)->update([
                        'FK_company'   => $lastCompany->c_id,
                    ]);
                }else{                
                    $ceohr                  = new ceohr;
                    $ceohr->ch_title        = $row['title_people'];
                    $ceohr->ch_fname        = $row['fname_people'];
                    $ceohr->ch_lname        = $row['lname_people'];
                    $ceohr->ch_phone        = $row['phone_people'];
                    $ceohr->ch_position     = $row['position'];
                    $ceohr->FKch_userid     = $lastUser->id;
                    $ceohr->FKch_company    = $chCompany->c_id;
                    $ceohr->ch_userCreate   = Auth::user()->name;
                    $ceohr->ch_userUpdate   = Auth::user()->name;
                    $ceohr->save();

                    $lastCEOhr= DB::table('ceohrs')->latest('ch_id')->first();

                    if($row['position'] == 'ผู้บริหาร'){
                        $upCompany = Company::find($chCompany->c_id)->update([
                            'FKc_manager'   => $lastCEOhr->ch_id,
                        ]);
                    }else{
                        $upCompany = Company::find($chCompany->c_id)->update([
                            'FKc_hr'   => $lastCEOhr->ch_id,
                        ]);
                    }
                    $upUser = User::find($lastUser->id)->update([
                        'FK_company'   => $chCompany->c_id,
                    ]);
                }
            }
        }else{
            // return back()->with('success', 'อีเมล ' . $row['email'] . ' ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมล');
            // return back()->with('success','อีเมล '.$row['email'].' ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมล',compact(('request')));
            $mes = 'อีเมล '.$row['email'].' ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมล';
            $yourURL= url('backend/company');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
    }
}

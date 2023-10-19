<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\employee;
use App\Models\User;
use App\Models\settingPosition;
use App\Models\departments;
use App\Models\departmentSub;
use App\Models\groupjob;
use App\Models\course;
use App\Models\courseSkills;
use App\Models\typeCourse;
use App\Models\skills;
use App\Models\skillsSubs;
use App\Models\ceohr;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HrEmployeeImport;
use App\Exports\EmployeeExport;
use Mail;
use App\Mail\TestMail;
use App\Mail\SendCus;

class HrEmployeeController extends Controller
{    
    function user(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $employee = employee::leftjoin('departments','departments.d_id','employees.FKe_department')
            ->leftjoin('setting_positions','setting_positions.sp_id','employees.FKe_position')
            ->leftjoin('positions','positions.p_id','setting_positions.FKgsp_position')
            ->leftjoin('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
            ->where('e_status',1)->where('FKe_company',$hr->FKch_company)->get();
        return view('frontend.company.person.user',compact('employee'));
    }
    
    function userForm(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $departments = departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')->get();
        $setPosition = settingPosition::join('positions','positions.p_id','setting_positions.FKgsp_position')
            ->where('FKgsp_company',$hr->FKch_company)->whereNull('sp_delete')->get();
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        return view('frontend.company.person.user-add',compact('departments','setPosition','provinces'));
    }

    function userAdd(Request $request){
        $name = $request->title.' '.$request->fname.' '.$request->lname;

        // dd(Auth::user()->name);
        $email = $request->input('e_email');
        $chemail = DB::table('users')->where('email',$email)->first();

        $chUser =  DB::table('users')->join('employees','employees.FKe_userid','users.id')
            ->where('e_title',$request->title)->where('e_fname',$request->fname)
            ->where('e_lname',$request->lname)->where('e_phone',$request->phone)->first();

        // dd($chUser);

        if(!empty($chemail)){
            $data = $email;
            return back()->with('success',$email.' อีเมลนี้ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมลใหม่',compact(('request')));
        }elseif(!empty($chUser)){
            return back()->with('success',$name.' ลงทะเบียนแล้ว',compact(('request')));
        }else{
            $hr = ceohr::join('companies','companies.c_id','ceohrs.FKch_company')->where('FKch_userid',Auth::user()->id)->first();

            $department = departments::find($request->department);
            $deSub = departmentSub::find($request->departmentSub);
            $position = settingPosition::leftjoin('positions', 'positions.p_id', 'setting_positions.FKgsp_position')
                ->leftjoin('groupjobs', 'groupjobs.gj_id', 'setting_positions.FKgsp_groupJob')
                ->leftjoin('lavel_jobs', 'lavel_jobs.lj_id', 'setting_positions.FKgsp_lavel')
                ->where('setting_positions.sp_id', $request->position)
                ->first();
            // dd($position->p_id, $position->p_name, $position->gj_id, $position->gj_name, $position->lj_id, $position->lj_name);

            $User           = new User;
            $User->name     = $name;
            $User->email    = $email;
            $User->password = Hash::make($request->input('pass'));
            $User->status   = 8;
            $User->save();
            
            $last = DB::table('users')->latest('id')->first();

            $employee = new employee;
            $employee->e_title              = $request->title;
            $employee->e_fname              = $request->fname;
            $employee->e_lname              = $request->lname;
            $employee->e_phone              = $request->phone;
            $employee->e_birth              = $request->birthday;
            $employee->e_gender             = $request->gender;
            $employee->e_status             = 1;
            $employee->FKe_company          = $hr->FKch_company;
            $employee->e_nameCompany        = $hr->c_nameCompany;
            $employee->e_employeeNo         = $request->employee_no;
            $employee->FKe_department       = $request->department;
            $employee->e_nameDepartment     = $department->d_name;
            $employee->FKe_departmentSub    = $request->departmentSub;
            $employee->e_nameDepartmentSub  = $deSub->ds_name;
            $employee->FKe_position         = $request->position;
            $employee->e_namePosition       = $position->p_name;
            $employee->FKe_lavel            = $position->lj_id;
            $employee->e_nameLavel          = $position->lj_name;
            $employee->FKe_group            = $position->gj_id;
            $employee->e_nameGroup          = $position->gj_name;
            $employee->addressNO_now        = $request->address_now;
            $employee->FKe_province_now     = $request->povices_now;
            $employee->FKe_amphur_now       = $request->aumphur_now;
            $employee->FKe_tambon_now       = $request->tumbon_now;
            $employee->postcode_now         = $request->postcode_now;
            $employee->addressNO_past       = $request->address_past;
            $employee->FKe_province_past    = $request->povices_past;
            $employee->FKe_amphur_past      = $request->aumphur_past;
            $employee->FKe_tambon_past      = $request->tumbon_past;
            $employee->postcode_past        = $request->postcode_past;
            $employee->FKe_userid           = $last->id;
            $employee->e_userCreate         = Auth::user()->name;
            $employee->e_userUpdate         = Auth::user()->name;
            $employee->save();

            $mes = 'Success';
            $yourURL= url('company/user');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
    }

    function userEdit($id){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $departments = departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')->get();
        $deSub = departmentSub::where('FKds_company',$hr->FKch_company)->get();
        $setPosition = settingPosition::join('positions','positions.p_id','setting_positions.FKgsp_position')
            ->where('FKgsp_company',$hr->FKch_company)->whereNull('sp_delete')->get();
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $employee = employee::join('users','users.id','employees.FKe_userid')
            ->leftjoin('departments','departments.d_id','employees.FKe_department')
            ->leftjoin('positions','positions.p_id','employees.FKe_position')
            ->leftjoin('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
            ->find($id);
            // dd($employee);

        return view('frontend.company.person.user-edit',compact('departments','deSub','setPosition','provinces','amphures','districts','employee'));
    }

    function userUpdate(Request $request, $id){
        $name = $request->title.' '.$request->fname.' '.$request->lname;

        $user =  DB::table('users')->join('employees','employees.FKe_userid','users.id')->where('e_id',$id)->first();
        $emailUser = $user->email;
        // dd($name);
        $email = $request->input('e_email');
        // dd($emailUser, $email);

        $chemail = DB::table('users')->where('email',$email)->first();

        $chUser =  DB::table('users')->join('employees','employees.FKe_userid','users.id')
            ->where('e_title',$request->title)->where('e_fname',$request->fname)
            ->where('e_lname',$request->lname)->where('e_phone',$request->phone)->first();
        // dd($chUser->e_id);
        if(!empty($chemail)){ $emailOther = $chemail->email; }else{ $emailOther=''; }

        if((!empty($chemail)) && ($user->id != $chemail->id)){

            return back()->with('success',$email.' อีเมลนี้ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมลใหม่',compact(('request')));

        }elseif((!empty($chUser)) && ($chUser->e_id != $id)){

            return back()->with('success',$name.' ลงทะเบียนแล้ว',compact(('request')));

        }else if((empty($chemail)) || ((!empty($chemail)) && ($email != $emailUser))){ 
            $update = User::find($user->id)->update([
                'email' =>  $email,
                'name'  =>  $name,
            ]);
        }
        // dd('asd');

        if(!empty($request->pass)){
            $update = User::find($user->id)->update([
                'password'         =>  Hash::make($request->input('pass')),
            ]);
        }

        $hr = ceohr::join('companies','companies.c_id','ceohrs.FKch_company')->where('FKch_userid',Auth::user()->id)->first();

            $department = departments::find($request->department);
            $deSub = departmentSub::find($request->departmentSub);
            $position = settingPosition::leftjoin('positions', 'positions.p_id', 'setting_positions.FKgsp_position')
                ->leftjoin('groupjobs', 'groupjobs.gj_id', 'setting_positions.FKgsp_groupJob')
                ->leftjoin('lavel_jobs', 'lavel_jobs.lj_id', 'setting_positions.FKgsp_lavel')
                ->where('setting_positions.sp_id', $request->position)
                ->first();
        $updateUser = User::find($user->id)->update([
            'name'         =>  $name,
        ]);
        $update = employee::where('e_id',$id)->update([
            'e_title'               => $request->title,
            'e_fname'               => $request->fname,
            'e_lname'               => $request->lname,
            'e_phone'               => $request->phone,
            'e_birth'               => $request->birthday,
            'e_gender'              => $request->gender,
            'e_status'              => 1,
            'FKe_company'           => $hr->FKch_company,
            'e_nameCompany'         => $hr->c_nameCompany,
            'e_employeeNo'          => $request->employee_no,
            'FKe_department'        => $request->department,
            'e_nameDepartment'      => $department->d_name,
            'FKe_departmentSub'     => $request->departmentSub,
            'e_nameDepartmentSub'   => $deSub->ds_name,
            'FKe_position'          => $request->position,
            'e_namePosition'        => $position->p_name,
            'FKe_lavel'             => $position->lj_id,
            'e_nameLavel'           => $position->lj_name,
            'FKe_group'             => $position->gj_id,
            'e_nameGroup'           => $position->gj_name,
            'addressNO_now'         => $request->address_now,
            'FKe_province_now'      => $request->povices_now,
            'FKe_amphur_now'        => $request->aumphur_now,
            'FKe_tambon_now'        => $request->tumbon_now,
            'postcode_now'          => $request->postcode_now,
            'addressNO_past'        => $request->address_past,
            'FKe_province_past'     => $request->povices_past,
            'FKe_amphur_past'       => $request->aumphur_past,
            'FKe_tambon_past'       => $request->tumbon_past,
            'postcode_past'         => $request->postcode_past,
            'e_userUpdate'          => Auth::user()->name,
        ]);

        $mes = 'Update Success';
        $yourURL= url('company/user');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function userDelete($id){
        $update = employee::where('e_id',$id)->update([
            'e_status'              => 2,
            'FKe_company'           => null,
            'e_nameCompany'         => null,
            'e_employeeNo'          => null,
            'FKe_department'        => null,
            'e_nameDepartment'      => null,
            'FKe_departmentSub'     => null,
            'e_nameDepartmentSub'   => null,
            'FKe_position'          => null,
            'e_namePosition'        => null,
            'e_userUpdate'          => Auth::user()->name,
        ]);

        $mes = 'Update Success';
        $yourURL= url('company/user');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function userFile(){
        return view('frontend.company.person.user-file');
    }

    function userImport(Request $request){
        Excel::import(new HrEmployeeImport, $request->employee_file);
        $mes = 'Success';
        $yourURL= url('company/user');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function userExport(){
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }

    

    function cfUser(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $employee = employee::leftjoin('departments','departments.d_id','employees.FKe_department')
            ->leftjoin('setting_positions','setting_positions.sp_id','employees.FKe_position')
            ->leftjoin('positions','positions.p_id','setting_positions.FKgsp_position')
            ->leftjoin('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
            ->where('e_status',2)->where('FKe_company',$hr->FKch_company)->get();
        return view('frontend.company.person.cfUser',compact('employee'));
    }
    
    function cfUserDetail($id){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $departments = departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')->get();
        $deSub = departmentSub::where('FKds_company',$hr->FKch_company)->get();
        $setPosition = settingPosition::join('positions','positions.p_id','setting_positions.FKgsp_position')
            ->where('FKgsp_company',$hr->FKch_company)->whereNull('sp_delete')->get();
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $employee = employee::join('users','users.id','employees.FKe_userid')
            ->leftjoin('departments','departments.d_id','employees.FKe_department')
            ->leftjoin('positions','positions.p_id','employees.FKe_position')
            ->leftjoin('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
            ->find($id);

        return view('frontend.company.person.cfUser-detail',compact('departments','deSub','setPosition','provinces','amphures','districts','employee'));
    }

    function userCfConfirm(Request $request, $id){
        $name = $request->title.' '.$request->fname.' '.$request->lname;

        $user =  DB::table('users')->join('employees','employees.FKe_userid','users.id')->where('FKe_userid',$id)->first();
        $emailUser = $user->email;
        // dd($name);
        $email = $request->input('e_email');
        // dd($emailUser, $email);

        $chemail = DB::table('users')->where('email',$email)->first();

        $chUser =  DB::table('users')->join('employees','employees.FKe_userid','users.id')
            ->where('e_title',$request->title)->where('e_fname',$request->fname)
            ->where('e_lname',$request->lname)->where('e_phone',$request->phone)->first();
        // dd($chUser->e_id);
        if(!empty($chemail)){ $emailOther = $chemail->email; }else{ $emailOther=''; }

        if((!empty($chemail)) && ($id != $chemail->id)){

            return back()->with('success',$email.' อีเมลนี้ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมลใหม่',compact(('request')));

        }elseif((!empty($chUser)) && ($chUser->FKe_userid != $id)){

            return back()->with('success',$name.' ลงทะเบียนแล้ว',compact(('request')));

        }else if((empty($chemail)) || ((!empty($chemail)) && ($email != $emailUser))){ 
            $update = User::find($id)->update([
                'email' =>  $email,
                'name'  =>  $name,
            ]);
        }
        // dd('asd');

        if(!empty($request->pass)){
            $update = User::find($id)->update([
                'password'         =>  Hash::make($request->input('pass')),
            ]);
        }

        $hr = ceohr::join('companies','companies.c_id','ceohrs.FKch_company')->where('FKch_userid',Auth::user()->id)->first();

            $department = departments::find($request->department);
            $deSub = departmentSub::find($request->departmentSub);
            $position = settingPosition::leftjoin('positions', 'positions.p_id', 'setting_positions.FKgsp_position')
                ->leftjoin('groupjobs', 'groupjobs.gj_id', 'setting_positions.FKgsp_groupJob')
                ->leftjoin('lavel_jobs', 'lavel_jobs.lj_id', 'setting_positions.FKgsp_lavel')
                ->where('setting_positions.sp_id', $request->position)
                ->first();
        $updateUser = User::find($id)->update([
            'name'         =>  $name,
        ]);
        $update = employee::where('FKe_userid',$id)->update([
            'e_title'               => $request->title,
            'e_fname'               => $request->fname,
            'e_lname'               => $request->lname,
            'e_phone'               => $request->phone,
            'e_birth'               => $request->birthday,
            'e_gender'              => $request->gender,
            'FKe_company'           => $hr->FKch_company,
            'e_nameCompany'         => $hr->c_nameCompany,
            'e_employeeNo'          => $request->employee_no,
            'FKe_department'        => $request->department,
            'e_nameDepartment'      => $department->d_name,
            'FKe_departmentSub'     => $request->departmentSub,
            'e_nameDepartmentSub'   => $deSub->ds_name,
            'FKe_position'          => $request->position,
            'e_namePosition'        => $position->p_name,
            'FKe_lavel'             => $position->lj_id,
            'e_nameLavel'           => $position->lj_name,
            'FKe_group'             => $position->gj_id,
            'e_nameGroup'           => $position->gj_name,
            'addressNO_now'         => $request->address_now,
            'FKe_province_now'      => $request->povices_now,
            'FKe_amphur_now'        => $request->aumphur_now,
            'FKe_tambon_now'        => $request->tumbon_now,
            'postcode_now'          => $request->postcode_now,
            'addressNO_past'        => $request->address_past,
            'FKe_province_past'     => $request->povices_past,
            'FKe_amphur_past'       => $request->aumphur_past,
            'FKe_tambon_past'       => $request->tumbon_past,
            'postcode_past'         => $request->postcode_past,
            'e_userUpdate'          => Auth::user()->name,
        ]);

        $update = User::where('id',$id)->update([
            'name'         =>  $name,
        ]);

        if($request->button_employee == '1'){
            

            $update = employee::where('FKe_userid',$id)->update([
                'e_status'              => 1,
                'e_note' =>  null,
            ]);
            $typeButton = 'ยืนยันการเป็นบุคลากรสำเร็จ สามารถเข้าใช้บริการได้';
        }elseif($request->button_employee == '2'){
            $update = employee::where('FKe_userid',$id)->update([
                'e_status'              => 2,
                'e_userUpdate' =>  Auth::user()->name,
                'e_note'       =>  $request->employee_detail,
            ]);
            $typeButton = 'กรุณาแก้ไขข้อมูลการเป็นบุคลากร และส่งกลับเพื่อยืนยันการเป็นบุคลากรใหม่อีกครั้ง';
        }else{
            $update = employee::where('FKe_userid',$id)->update([
                'e_status'              => 2,
                'FKe_company'           => null,
                'e_nameCompany'         => null,
                'e_employeeNo'          => null,
                'FKe_department'        => null,
                'e_nameDepartment'      => null,
                'FKe_departmentSub'     => null,
                'e_nameDepartmentSub'   => null,
                'FKe_position'          => null,
                'e_namePosition'        => null,
                'e_userUpdate'          => Auth::user()->name,
            ]);
            $typeButton = 'ยืนยันการเป็นบุคลากรถูกยกเลิก กรุณาติดต่อเจ้าหน้าที่';
        }

        $textmail = [
            "text"      =>$typeButton,
        ];
        Mail::to($email)->send(new TestMail($textmail));

        $mes = 'Success';
        $yourURL= url('company/cfUser');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        return view('backend.adnim.setting',compact('user'));
    }

    function cfUserEdit(){
        return view('frontend.company.person.cfUser-edit');
    }
}

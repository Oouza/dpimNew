<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;
use App\Exports\PeopleExport;

class AdminEmployeeController extends Controller
{
    function people(){
        // $employee = employee::whereNull('e_userDelete')->get();
        $user = User::join('employees','employees.FKe_userid','users.id')->where('status',8)->whereNull('e_userDelete')->get();
        return view('backend.managePeople.people',compact('user'));
    }

    function peopleForm(){
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        return view('backend.managePeople.people-add',compact('provinces'));
    }

    function peopleAdd(Request $request){
        $name = $request->title.' '.$request->fname.' '.$request->lname;

        // dd(Auth::user()->name);
        $email = $request->input('e_email');
        $chemail = DB::table('users')->where('email',$email)->first();

        if(!empty($chemail)){
            $data = $email;
            return back()->with('success',$email.' อีเมลนี้ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมลใหม่',compact(('request')));
        }else{
            $User = new User;
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
            $yourURL= url('backend/people');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
        // return view('backend.managePeople.people-add');
    }

    function peopleEdit($id){
        $user = User::join('employees','employees.FKe_userid','users.id')->find($id);
        // dd($user);
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        return view('backend.managePeople.people-edit',compact('user','provinces','amphures','districts'));
    }

    function peopleUpdate(Request $request, $id){
        $name = $request->title.' '.$request->fname.' '.$request->lname;
        // dd($name);
        $email = $request->input('e_email');

        $chemail = DB::table('users')->where('email',$email)
        ->first();
        if(!empty($chemail)){
            $emailOld = $chemail->email;
        }else{
            $emailOld='';
        }

        if(!empty($chemail) && $email != $emailOld){
            $data = $email;
            return back()->with('success',$email.' อีเมลนี้ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมลใหม่',compact(('request')));
        }else if(empty($chemail) && $email != $emailOld){
            $update = User::find($id)->update([
                'email'         =>  $email,
                'name'         =>  $name,
            ]);
        }

        if(!empty($request->admin_pass)){
            $update = User::find($id)->update([
                'password'         =>  Hash::make($request->input('pass')),
            ]);
        }

        $update = employee::where('FKe_userid',$id)->update([
            'e_title'           => $request->title,
            'e_fname'           => $request->fname,
            'e_lname'           => $request->lname,
            'e_phone'           => $request->phone,
            'e_birth'           => $request->birthday,
            'e_gender'          => $request->gender,
            'addressNO_now'     => $request->address_now,
            'FKe_province_now'  => $request->povices_now,
            'FKe_amphur_now'    => $request->aumphur_now,
            'FKe_tambon_now'    => $request->tumbon_now,
            'postcode_now'      => $request->postcode_now,
            'addressNO_past'    => $request->address_past,
            'FKe_province_past' => $request->povices_past,
            'FKe_amphur_past'   => $request->aumphur_past,
            'FKe_tambon_past'   => $request->tumbon_past,
            'postcode_past'     => $request->postcode_past,
            'e_userUpdate'      => Auth::user()->name,
        ]);

        $mes = 'Update Success';
        $yourURL= url('backend/people');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        return view('backend.adnim.setting',compact('user'));
    }

    function peopleDel($id){
        $update = User::where('id',$id)->update([
            'status' => 9
        ]);

        $mes = 'Update Success';
        $yourURL= url('backend/people');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        return view('backend.adnim.setting',compact('user'));
    }

    function peopleDetail($id){
        $user = User::join('employees','employees.FKe_userid','users.id')->find($id);
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        return view('backend.managePeople.people-detail',compact('user','provinces','amphures','districts'));
    }

    function peopleFile(){
        return view('backend.managePeople.people-file');
    }

    function peopleUp(Request $request){
        // dd($request->file_people);
        // if(!empty($request->file_typeJob)){
        //     dd(1);
        // }else{
        //     dd(2);
        // }
        // return view('backend.job.typeJob.typeJob-file');
        Excel::import(new EmployeeImport, $request->file_people);
        $mes = 'Success';
        $yourURL= url('backend/people');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        // return view('backend.job.typeJob.typeJob');
    }

    function peopleExport() 
    {
        return Excel::download(new PeopleExport, 'people.xlsx');
    }

    function peopleCf(){
        return view('backend.managePeople.peopleCf');
    }

    function peopleCfDetail(){
        return view('backend.managePeople.peopleCfDetail');
    }

    function peopleManageskills(){
        return view('backend.manageSkills.peopleManageSkills');
    }
    
    function peopleManageskillsForm(){
        return view('backend.manageSkills.peopleManageSkills-add');
    }

    function peopleManageskillsEdit(){
        return view('backend.manageSkills.peopleManageSkills-edit');
    }

    function peopleManageskillsdetail(){
        return view('backend.manageSkills.peopleManageSkills-deatil');
    }

    function peopleManageskillsFile(){
        return view('backend.manageSkills.peopleManageSkills-file');
    }

    function peopleCfSkills(){
        return view('backend.manageSkills.peopleCfSkills');
    }

    function peopleCfSkillsDetail(){
        return view('backend.manageSkills.peopleCfSkills-detail');
    }

    function peopleDownload() 
    {
        // $countries = typeJob::select('tj_no','tj_name')->get();
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}

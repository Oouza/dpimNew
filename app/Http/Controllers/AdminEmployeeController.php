<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\employee;
use App\Models\course;
use App\Models\groupjob;
use App\Models\capacity;
use App\Models\courseSkills;
use App\Models\training;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;
use App\Imports\TrainingImport;
use App\Exports\PeopleExport;
use App\Exports\TrainingExport;
use Mail;
use App\Mail\TestMail;
use App\Mail\SendCus;

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
        $user = User::join('employees','employees.FKe_userid','users.id')->where('status',7)->whereNull('e_userDelete')->get();
        return view('backend.managePeople.peopleCf',compact('user'));
    }

    function peopleCfDetail($id){
        $user = User::join('employees','employees.FKe_userid','users.id')->find($id);
        // dd($user);
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        return view('backend.managePeople.peopleCfDetail',compact('user','provinces','amphures','districts'));
    }

    function peopleCfConfirm(Request $request, $id){
        // dd($request);
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

        $updateUser = User::where('id',$id)->update([
            'name'         =>  $name,
        ]);

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

        if($request->button_employee == '1'){
            $update = User::where('id',$id)->update([
                'status'       =>  8,
                'name'         =>  $name,
            ]);

            $update = employee::where('FKe_userid',$id)->update([
                'e_note' =>  '',
            ]);
            $typeButton = 'การลงทะบียนสำเร็จ สามารถเข้าใช้บริการได้';
        }elseif($request->button_employee == '2'){
            $updateUser = User::where('id',$id)->update([
                'name'      =>  $name,
                'status'    =>  9,
            ]);
            $update = employee::where('FKe_userid',$id)->update([
                'e_userUpdate' =>  Auth::user()->name,
                'e_note'       =>  $request->employ_note,
            ]);
            $typeButton = 'กรุณาแก้ไขข้อมูลการลงทะบียน และส่งกลับเพื่อยืนยันการลงทะเบียนใหม่อีกครั้ง';
        }else{
            $updateUser = User::where('id',$id)->update([
                'name'      =>  $name,
                'status'    =>  12,
            ]);
            
            $update = employee::where('FKe_userid',$id)->update([
                'e_userDelete' =>  Auth::user()->name,
            ]);
            $typeButton = 'การลงทะบียนถูกยกเลิก กรุณาติดต่อเจ้าหน้าที่';
        }
        $textmail = [
            "text"      =>$typeButton,
        ];
        Mail::to($email)->send(new TestMail($textmail));

        $mes = 'Success';
        $yourURL= url('backend/peopleCf');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        return view('backend.adnim.setting',compact('user'));
    }

    function peopleManageskills(){
        $course = course::whereNull('cou_userDelete')->get();
        $groupJob = groupjob::whereNull('gj_userDelete')->get();
        $training = training::join('users','users.id','trainings.FKtn_userId')
            ->join('employees','employees.FKe_userid','trainings.FKtn_userId')    
            ->join('courses','courses.cou_id','trainings.FKtn_courseId')
            ->where('tn_status',1)->whereNull('tn_userDelete')->get();
        return view('backend.manageSkills.peopleManageSkills',compact('course','groupJob','training'));
    }
    
    function peopleManageskillsForm(){
        $employee = User::join('employees','employees.FKe_userid','users.id')->where('status',8)->get();
        $course = course::whereNull('cou_userDelete')->get();
        return view('backend.manageSkills.peopleManageSkills-add',compact('course','employee'));
    }

    function peopleManageskillsAdd(Request $request){
        $employee = employee::where('FKe_userid', $request->people)->first();
        $course = course::find($request->course);
        $nameEmployee = $employee->e_title.' '.$employee->e_fname.' '.$employee->e_lname;
        // dd($course->cou_name);

        $path = 'upload/img';
        $image = '';
        if (!empty($request->file('credit'))) {
            $img = $request->file('credit');
            $img_name = 'credit' . time() . '.' . $img->getClientOriginalExtension();
            $save_path = $img->move(public_path($path), $img_name);
            $image = $img_name;
        }

        $training = new training;
        $training->FKtn_userId      = $request->people;
        $training->name_user        = $nameEmployee;
        $training->FKtn_courseId    = $request->course;
        $training->name_course      = $course->cou_name;
        $training->tn_dateTrain     = $request->dateTrain;
        $training->tn_endCredit     = $request->dateEnd;
        $training->tn_Credit        = $image;
        $training->tn_status        = 1;
        $training->FKtn_userCreate  = 0;
        $training->tn_userCreate    = Auth::user()->name;
        $training->tn_userUpdate    = Auth::user()->name;
        $training->save();

        $mes = 'Success';
        $yourURL= url('backend/people/manageskills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function searchPeople(Request $request){
        // dd($request->people);
        $employee = employee::leftJoin('groupjobs', 'groupjobs.gj_id', '=', 'employees.FKe_group')
            ->where('employees.FKe_userid', $request->people)
            ->first();
        // $response['groupJob'] = $employee->gj_name;
        if($employee->gj_name == ''){
            $gjName = null;
        }else{
            $gjName = $employee->gj_name;
        }
        $response = $gjName;
        return json_encode($response);      
    }

    function searchTrain(Request $request){
        // dd($request->people);
        $course = course::join('type_course','type_course.tc_id','courses.FKcou_typeCourse')->find($request->course);
        $cs = courseSkills::join('skills_subs','skills_subs.ss_id','course_skills.FKcs_skills')->where('FKcs_course',$request->course)->get();

        $response['Organizer'] = $course->cou_organizer;
        $response['time'] = $course->cou_period;
        $response['type'] = $course->tc_name;

        $skillsArray = $cs->pluck('ss_name')->toArray();
        $response['skills'] = '';
        foreach ($skillsArray as $key => $skill) {
            $response['skills'] .= ($key + 1) . '. ' . $skill;
        }
        return json_encode($response);      
    }

    function peopleManageskillsEdit($id){
        $tn = training::join('users','users.id','trainings.FKtn_userId')
            ->join('employees','employees.FKe_userid','trainings.FKtn_userId')
            ->leftJoin('groupjobs', 'groupjobs.gj_id', '=', 'employees.FKe_group')   
            ->join('courses','courses.cou_id','trainings.FKtn_courseId')
            ->join('type_course','type_course.tc_id','courses.FKcou_typeCourse')->find($id);
        $employee = User::join('employees','employees.FKe_userid','users.id')->where('status',8)->get();
        $course = course::whereNull('cou_userDelete')->get();
        $cs = courseSkills::join('skills_subs','skills_subs.ss_id','course_skills.FKcs_skills')->where('FKcs_course',$tn->FKtn_courseId)->get();
        $skillsArray = $cs->pluck('ss_name')->toArray();
        $couSkills = '';
        foreach ($skillsArray as $key => $skill) {
            $couSkills .= ($key + 1) . '. ' . $skill;
        }
        return view('backend.manageSkills.peopleManageSkills-edit',compact('tn','course','employee','couSkills'));
    }

    function peopleManageskillsUpdate(Request $request, $id){
        // dd($request);
        $employee = employee::where('FKe_userid', $request->people)->first();
        $course = course::find($request->course);
        $nameEmployee = $employee->e_title.' '.$employee->e_fname.' '.$employee->e_lname;

        $update = training::find($id)->update([
            'FKtn_userId'       => $request->people,
            'name_user'         => $nameEmployee,
            'FKtn_courseId'     => $request->course,
            'name_course'       => $course->cou_name,
            'tn_dateTrain'      => $request->dateTrain,
            'tn_endCredit'      => $request->dateEnd,
            'tn_status'         => 1,
            'FKtn_userCreate'   => 0,
            'tn_userUpdate'     => Auth::user()->name,
        ]);

        if (!empty($request->file('credit'))) {
    
            $path2 = 'public/upload/img/'.$request->credit;

            if (file_exists($path2)) {
                @unlink($path2);
            }
            $path = 'upload/img/';
            $img = $request->file('credit');
            $img_name = 'credit' . time() . '.' . $img->getClientOriginalExtension();
            $save_path = $img->move(public_path($path), $img_name);
            $data2['tn_Credit']=$img_name;
            
            DB::table('trainings')->where('tn_id',$id)->update($data2);    
        }

        $mes = 'Success';
        $yourURL= url('backend/people/manageskills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function peopleManageskillsDelete($id){
        $update = training::find($id)->update([
            'tn_userDelete'     => Auth::user()->name,
        ]);
    }

    function peopleManageskillsdetail($id){
        $training = training::join('users','users.id','trainings.FKtn_userId')
            ->join('employees','employees.FKe_userid','trainings.FKtn_userId')   
            ->leftjoin('groupjobs','groupjobs.gj_id','employees.FKe_group') 
            ->join('courses','courses.cou_id','trainings.FKtn_courseId')
            ->join('type_course','type_course.tc_id','courses.FKcou_typeCourse')
            ->where('tn_id',$id)->first();
        // dd($id, $training);
        $cs = courseSkills::join('skills_subs','skills_subs.ss_id','course_skills.FKcs_skills')->where('FKcs_course',$training->FKtn_courseId)->get();
        $skillsArray = $cs->pluck('ss_name')->toArray();
        $couSkills = '';
        foreach ($skillsArray as $key => $skill) {
            $couSkills .= ($key + 1) . '. ' . $skill;
        }
        return view('backend.manageSkills.peopleManageSkills-deatil',compact('training','couSkills'));
    }

    function peopleManageskillsFile(){
        return view('backend.manageSkills.peopleManageSkills-file');
    }

    function peopleManageskillsImport(Request $request){
        Excel::import(new TrainingImport, $request->history_coures);
        $mes = 'Success';
        $yourURL= url('backend/people/manageskills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function peopleManageskillsExport(){
        return Excel::download(new TrainingExport, 'Training.xlsx');
    }

    function peopleManageskillsResult(Request $request){
        $s_coures = $request->coures;
        $s_gj = $request->GJ;
        $course = course::whereNull('cou_userDelete')->get();
        $groupJob = groupjob::whereNull('gj_userDelete')->get();
        $training = training::join('users','users.id','trainings.FKtn_userId')
            ->join('employees','employees.FKe_userid','trainings.FKtn_userId')    
            ->join('courses','courses.cou_id','trainings.FKtn_courseId')
            ->when(!empty($s_coures), function ($query) use ($s_coures) { $query->where('FKtn_courseId', $s_coures); })
            ->when(!empty($s_gj), function ($query) use ($s_gj) { $query->where('FKe_group', $s_gj); })
            ->where('tn_status',1)->whereNull('tn_userDelete')->get();
        return view('backend.manageSkills.peopleManageSkills',compact('course','groupJob','training','s_coures','s_gj'));
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

    function resultPeople($id){
        if($id == "ว่างงาน"){
            $user = User::join('employees','employees.FKe_userid','users.id')
            ->where('e_status',2)->orWhere('e_status',Null)->where('status',8)->whereNull('e_userDelete')->get();
            return view('backend.managePeople.people',compact('user','id'));
        }else{
            $user = User::join('employees','employees.FKe_userid','users.id')
            ->leftjoin('companies','companies.c_id','employees.FKe_company')
            ->where('c_typeCompany',$id)->where('status',8)->whereNull('e_userDelete')->get();
            return view('backend.managePeople.people',compact('user','id'));
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\capacity;
use App\Models\skills;
use App\Models\skillsSubs;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CapacityExport;
use App\Exports\SkilsExport;
use App\Exports\SkilsSubExport;

class BackendController extends Controller
{

    function index(){
        return view('backend.graph.graph-job');
    }

    function adminUser(){
        return view('layouts.login');
    }

    function forgotPassword(){
        return view('backend.forgotPassword');
    }

    function regiter(){
        return view('backend.regiter');
    }

    function capacity(){
        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.capacity.capacity',compact('capacity'));
    }

    function capacityForm(){
        return view('backend.capacity.capacity-add');
    }

    function capacityAdd(Request $request){
        // dd($request);
        $capacity                   = new capacity;
        $capacity->cc_no            = $request->capa_no;
        $capacity->cc_name          = $request->capa_name;
        $capacity->cc_detail        = $request->capa_detail;
        $capacity->FKcc_Create      = 0;
        $capacity->cc_userCreate    = Auth::user()->name;
        $capacity->cc_userUpdate    = Auth::user()->name;
        $capacity->save();

        $mes = 'Success';
        $yourURL= url('backend/capacity');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        // return view('backend.capacity.capacity-add');
    }

    function capacityEdit($id){
        $capacity = capacity::find($id);
        return view('backend.capacity.capacity-edit',compact('capacity'));
    }

    function capacityUpdate(Request $request,$id){
        // dd($request);

        $update = capacity::find($id)->update([
            'cc_no'         =>  $request->cc_no,
            'cc_name'       =>  $request->cc_name,
            'cc_detail'     =>  $request->cc_detail,
            'cc_userUpdate' =>  Auth::user()->name
        ]);
        
        $mes = 'Success';
        $yourURL= url('backend/capacity');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function capacityDelete($id){
        // dd($request);

        $update = capacity::find($id)->update([
            'cc_userDelete' =>  Auth::user()->name
        ]);
        
        $mes = 'Success';
        $yourURL= url('backend/capacity');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function exportCapacity() 
    {
        // $countries = typeJob::select('tj_no','tj_name')->get();
        return Excel::download(new CapacityExport, 'capacity.xlsx');
    }

    function skills(){
        $skills = skills::join('capacities','capacities.cc_id','skills.FKs_capacity')->where('FKs_Create',0)->whereNull('s_userDelete')->get();
        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.skills.skills',compact('skills','capacity'));
    }

    function skillsForm(){
        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.skills.skills-add',compact('capacity'));
    }

    function skillsAdd(Request $request){
        // dd($request);

        $skills                  = new skills;
        $skills->s_no            = $request->skills_id;
        $skills->s_name          = $request->skills_name;
        $skills->s_detail        = $request->skills_detail;
        $skills->FKs_capacity    = $request->capacity;
        $skills->FKs_Create      = 0;
        $skills->s_userCreate    = Auth::user()->name;
        $skills->s_userUpdate    = Auth::user()->name;
        $skills->save();

        $mes = 'Success';
        $yourURL= url('backend/skills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function skillsEdit($id){
        $skills = skills::find($id);
        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.skills.skills-edit',compact('skills','capacity'));
    }

    function skillsUpdate(Request $request,$id){
        // dd($request);

        $update = skills::find($id)->update([
            's_no'         =>  $request->skills_id,
            's_name'       =>  $request->skills_name,
            's_detail'     =>  $request->skills_detail,
            'FKs_capacity' =>  $request->capacity,
            's_userUpdate' =>  Auth::user()->name
        ]);
        
        $mes = 'Success';
        $yourURL= url('backend/skills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function skillsDelete($id){
        $update = skills::find($id)->update([
            's_userDelete' =>  Auth::user()->name
        ]);
        
        $mes = 'Success';
        $yourURL= url('backend/skills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function skillsExport() 
    {
        return Excel::download(new SkilsExport, 'skills.xlsx');
    }

    function skillsSub(){
        $skillsSubs = skillsSubs::join('capacities','capacities.cc_id','skills_subs.FKss_capacity')
        ->join('skills','skills.s_id','skills_subs.FKss_skills')
        ->where('FKss_Create',0)->whereNull('ss_userDelete')->get();
        $skills = skills::where('FKs_Create',0)->whereNull('s_userDelete')->get();
        return view('backend.skills.sub.skillsSub',compact('skills','skillsSubs'));
    }

    function skillsSubForm(){
        $skills = skills::where('FKs_Create',0)->whereNull('s_userDelete')->get();
        return view('backend.skills.sub.skillsSub-add',compact('skills'));
    }

    function skillsSubAdd(Request $request){
        // dd($request);

        $skills = skills::where('s_id',$request->skills)->first();

        $skillsSubs                   = new skillsSubs;
        $skillsSubs->ss_no            = $request->ss_no;
        $skillsSubs->ss_name          = $request->ss_name;
        $skillsSubs->ss_detail        = $request->ss_detail;
        $skillsSubs->ss_standardOne   = $request->lavel1;
        $skillsSubs->ss_standardTwo   = $request->lavel2;
        $skillsSubs->ss_standardThree = $request->lavel3;
        $skillsSubs->FKss_skills      = $request->skills;
        $skillsSubs->FKss_capacity    = $skills->FKs_capacity;
        $skillsSubs->FKss_Create      = 0;
        $skillsSubs->ss_userCreate    = Auth::user()->name;
        $skillsSubs->ss_userUpdate    = Auth::user()->name;
        $skillsSubs->save();

        $mes = 'Success';
        $yourURL= url('backend/skillsSub');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function skillsSubEdit($id){
        $ss = skillsSubs::find($id);
        $skills = skills::where('FKs_Create',0)->whereNull('s_userDelete')->get();
        return view('backend.skills.sub.skillsSub-edit',compact('ss','skills'));
    }

    function skillsSubUpdate(Request $request, $id){
        // dd($request);

        $skills = skills::where('s_id',$request->skills)->first();

        $update = skillsSubs::find($id)->update([
            'ss_no'             =>  $request->ss_no,
            'ss_name'           =>  $request->ss_name,
            'ss_detail'         =>  $request->ss_detail,
            'ss_standardOne'    =>  $request->lavel1,
            'ss_standardTwo'    =>  $request->lavel2,
            'ss_standardThree'  =>  $request->lavel3,
            'FKss_skills'       =>  $request->skills,
            'FKss_capacity'     =>  $skills->FKs_capacity,
            'ss_userUpdate'     =>  Auth::user()->name
        ]);

        $mes = 'Success';
        $yourURL= url('backend/skillsSub');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function skillsSubDelete($id){
        // dd($request);

        $update = skillsSubs::find($id)->update([
            'ss_userDelete'     =>  Auth::user()->name
        ]);

        $mes = 'Success';
        $yourURL= url('backend/skillsSub');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function skillsSubExport() 
    {
        return Excel::download(new SkilsSubExport, 'skillsSub.xlsx');
    }

    function graphCapacity(){
        return view('backend.graph.graph-capacity');
    }

    function graphSillks(){
        return view('backend.graph.graph-sillks');
    }

    function graphCourse(){
        return view('backend.graph.graph-course');
    }
    
    function graphHour(){
        return view('backend.graph.graph-hour');
    }

    function admin(){
        // $user = user::where('status',2)->get();
        // return view('backend.adnim.adnim',compact('user'));
        return view('backend.adnim.adnim');
    }

    function adminForm(){
        return view('backend.adnim.adnim-add');
    }

    function adminAdd(Request $request){
        // dd($request);
        $email = $request->input('admin_email');

        $chemail = DB::table('users')->where('email',$email)->first();

        if(!empty($chemail)){
            $data = $email;
            return back()->with('success',$email.' อีเมลนี้ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมลใหม่',compact(('request')));
        }else{
            $User = new User;
            $User->name     = $request->admin_name;
            $User->email    = $request->admin_email;
            $User->password = Hash::make($request->input('admin_password'));
            $User->status   = 2;
            $User->save();

            $mes = 'Success';
            $yourURL= url('backend/Admin');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
        return view('backend.adnim.adnim-add');
    }

    function adminEdit(){
        // $user = User::find($id);
        // return view('backend.adnim.admin-edit',compact('user','id'));
        return view('backend.adnim.admin-edit');
    }

    function adminUpdate(Request $request, $id){
        // dd($request);
        $email = $request->input('admin_email');

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
                'email'         =>  $request->admin_email,
            ]);
        }

        if(!empty($request->admin_pass)){
            $update = User::find($id)->update([
                'password'         =>  Hash::make($request->input('admin_pass')),
            ]);
        }

        $update = User::find($id)->update([
            'name'         =>  $request->admin_name,
        ]);

        $mes = 'Update Success';
        $yourURL= url('backend/Admin');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function adminDelete($id){
        $update = User::find($id)->delete();

        $mes = 'Delete Success';
        $yourURL= url('backend/Admin');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function adminStting(){
        // $user = User::find(Auth::user()->id);
        // return view('backend.adnim.setting',compact('user'));
        return view('backend.adnim.setting');
    }

    function adminSttingUpdate(Request $request, $id){
        $email = $request->input('admin_email');

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
                'email'         =>  $request->admin_email,
            ]);
        }

        if(!empty($request->admin_pass)){
            $update = User::find($id)->update([
                'password'         =>  Hash::make($request->input('admin_pass')),
            ]);
        }

        $update = User::find($id)->update([
            'name'         =>  $request->admin_name,
        ]);

        $mes = 'Update Success';
        $yourURL= url('backend/setting');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        return view('backend.adnim.setting',compact('user'));
    }

    function testEditJob(){
        return view('backend.testEdit.job.testEditJob');
    }

    function testEditJobForm(){
        return view('backend.testEdit.job.testEditJob-add');
    }

    function testEditJobFormClean(){
        return view('backend.testEdit.job.testEditJob-clean');
    }

    function testEditJobEdit(){
        return view('backend.testEdit.job.testEditJob-edit');
    }

    function testEditCapacity(){
        return view('backend.testEdit.capacity.testEditCapacity');
    }

    function testEditCapacityForm(){
        return view('backend.testEdit.capacity.testEditCapacity-add');
    }

    function testEditCapacityClean(){
        return view('backend.testEdit.capacity.testEditCapacity-clean');
    }

    function testEditCapacityEdti(){
        return view('backend.testEdit.capacity.testEditCapacity-edit');
    }

    function testEditSkills(){
        return view('backend.testEdit.skills.testEditSkills');
    }

    function testEditSkillsForm(){
        return view('backend.testEdit.skills.testEditSkills-add');
    }

    function testEditSkillsClean(){
        return view('backend.testEdit.skills.testEditSkills-clean');
    }

    function testEditSkillsEdit(){
        return view('backend.testEdit.skills.testEditSkills-edit');
    }

    function testEditSkillsSub(){
        return view('backend.testEdit.skillsSub.testEditSkillsSub');
    }

    function testEditSkillsSubForm(){
        return view('backend.testEdit.skillsSub.testEditSkillsSub-add');
    }

    function testEditSkillsSubClean(){
        return view('backend.testEdit.skillsSub.testEditSkillsSub-clean');
    }

    function testEditSkillsSubEdit(){
        return view('backend.testEdit.skillsSub.testEditSkillsSub-edit');
    }

    function searchProvice(Request $request)
    {
        $amphur = DB::table('amphures')->where('province_id',$request->input('provice'))
        ->orderByRaw("CONVERT(name_th USING tis620) asc")
        // ->orderBy('district.name_th', 'asc')
        ->get();
        $html = '<option value="">- กรุณาเลือกเขต/อำเภอ -</option>';
        if(!empty($amphur)){
            foreach($amphur as $_data){
                $html .= '<option value="'.$_data->id.'">'.$_data->name_th.'</option>';
               
            }
        }
        $data["html"] = $html;
        return json_encode($data);
    }

    function searchAmphure(Request $request)
    {
        $district = DB::table('districts')->where('amphure_id',$request->input('amphure'))
        ->orderByRaw("CONVERT(name_th USING tis620) asc")
        // ->orderBy('subdistrict.name_th', 'asc')
        ->get();
        $html = '<option value="">- กรุณาเลือกแขวง/ตำบล -</option>';
        if(!empty($district)){
            foreach($district as $_data){
                $html .= '<option value="'.$_data->id.'">'.$_data->name_th.'</option>';
               
            }
        }
        $data["html"] = $html;
        return json_encode($data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        return view('backend.capacity.capacity');
    }

    function capacityForm(){
        return view('backend.capacity.capacity-add');
    }

    function capacityEdit(){
        return view('backend.capacity.capacity-edit');
    }

    function skills(){
        return view('backend.skills.skills');
    }

    function skillsForm(){
        return view('backend.skills.skills-add');
    }

    function skillsEdit(){
        return view('backend.skills.skills-edit');
    }

    function skillsSub(){
        return view('backend.skills.sub.skillsSub');
    }

    function skillsSubForm(){
        return view('backend.skills.sub.skillsSub-add');
    }

    function skillsSubEdit(){
        return view('backend.skills.sub.skillsSub-edit');
    }

    function course(){
        return view('backend.course.course');
    }

    function courseForm(){
        return view('backend.course.course-add');
    }

    function courseEdit(){
        return view('backend.course.course-edit');
    }

    function courseFormFile(){
        return view('backend.course.course-file');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ceohr;
use App\Models\training;

class HrConfirmController extends Controller
{
    function cfSkills(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $tn = training::join('users','users.id','trainings.FKtn_userId')
        ->join('employees','employees.FKe_userid','trainings.FKtn_userId')
        ->join('positions','positions.p_id','employees.FKe_position')
        ->leftJoin('groupjobs', 'groupjobs.gj_id', '=', 'employees.FKe_group')   
        ->leftJoin('courses','courses.cou_id','trainings.FKtn_courseId')
        ->leftJoin('type_course','type_course.tc_id','courses.FKcou_typeCourse')->where('tn_status',2)->where('FKe_company',$hr->FKch_company)->get();

        return view('frontend.company.manageSkills.cfSkills',compact('tn'));
    }

    function cfSkillsDetail($id){
        $tn = training::join('users','users.id','trainings.FKtn_userId')
        ->join('employees','employees.FKe_userid','trainings.FKtn_userId')
        ->leftJoin('departments','departments.d_id','employees.FKe_department')
        ->leftJoin('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
        ->leftJoin('positions','positions.p_id','employees.FKe_position')
        ->leftJoin('capacities','capacities.cc_id','trainings.FKtn_capacity')
        ->leftJoin('skills','skills.s_id','trainings.FKtn_skills')
        ->leftJoin('skills_subs','skills_subs.ss_id','trainings.FKtn_skillsSub')
        ->leftJoin('groupjobs', 'groupjobs.gj_id', '=', 'employees.FKe_group')   
        ->leftJoin('courses','courses.cou_id','trainings.FKtn_courseId')
        ->leftJoin('type_course','type_course.tc_id','courses.FKcou_typeCourse')->find($id);
        return view('frontend.company.manageSkills.cfSkills-detail',compact('tn'));
    }

    function cfSkillsConfirm(Request $request, $id){
        // dd($id, $request);

        if($request->buttonName == 1){
            // cf training
            $update = training::find($id)->update([
                'tn_status' => 1,
                'tn_note'   => null,
            ]);
        }else{
            // not cf training
            $update = training::find($id)->update([
                'tn_status' => 3,
                'tn_note'   => $request->noteConfirm,
            ]);
        }

        $mes = 'Success';
        $yourURL= url('company/cf/skills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\employee;
use App\Models\User;
use App\Models\departmentSub;
use App\Models\skills;
use App\Models\skillsSubs;
use App\Models\ceohr;
use App\Models\groupjob;
use App\Models\gjSkillsSub;
use App\Models\gjskills;

class HrPlanController extends Controller
{
    
    function manageSkills(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $employee = employee::join('departments','departments.d_id','employees.FKe_department')
        ->join('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
        ->join('setting_positions','setting_positions.sp_id','employees.FKe_position')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->where('FKe_company',$hr->FKch_company)->whereNull('e_userDelete')->get();
        return view('frontend.company.manageSkills.manageSkills',compact('employee'));
    }

    function manageSkillsDetail($id){
        $employee = employee::join('departments','departments.d_id','employees.FKe_department')
        ->join('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
        ->join('setting_positions','setting_positions.sp_id','employees.FKe_position')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->find($id);

        // $gj = groupjob::join('lavel_jobs','lavel_jobs.lj_id','groupjobs.FKgj_lavel')
        // ->join('type_job','type_job.tj_id','groupjobs.FKgj_typeJob')->find($id);

        $gjSub = gjSkillsSub::leftjoin('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
            ->leftjoin('gjskills','gjskills.gjs_id','gj_skills_subs.FKgjss_gjskills')
            ->leftjoin('skills','skills.s_id','gjskills.FKgjs_skills')
            ->leftjoin('gjcapacities','gjcapacities.gjc_id','gj_skills_subs.FKgjss_gjcapacity')            
            ->leftjoin('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')            
            ->where('FKgjss_groupjob',$employee->FKe_group)
            ->where(function ($query) use ($employee) {
                $query->where('FKgjss_userCreate', 0)
                    ->orWhere('FKgjss_userCreate', $employee->FKe_company);
            })
            ->whereNull('gjss_userDelete')->get();

            // $skills = gjSkillsSub::join('skills_subs', 'skills_subs.ss_id', 'gj_skills_subs.FKgjss_skillsSub')
            //     ->join('gjskills', 'gjskills.gjs_id', 'gj_skills_subs.FKgjss_gjskills')
            //     ->join('skills', 'skills.s_id', 'gjskills.FKgjs_skills')
            //     ->where('FKgjss_groupjob', $employee->FKe_group)
            //     ->where(function ($query) use ($employee) {
            //         $query->where('FKgjss_userCreate', 0)
            //             ->orWhere('FKgjss_userCreate', $employee->FKe_company);
            //     })
            //     ->whereNull('gjss_userDelete')
            //     ->groupBy('gj_skills_subs.FKgjss_gjskills','gjskills.gjs_id') // แก้ไขเป็นฟิลด์ที่ต้องการจัดกลุ่ม
            //     ->select('skills.s_name') // เลือกฟิลด์ที่ต้องการแสดง
            //     ->get();


            $skills = gjskills::join('skills', 'skills.s_id', 'gjskills.FKgjs_skills')
                ->join('gj_skills_subs', 'gj_skills_subs.FKgjss_gjskills', 'gjskills.gjs_id')
                ->where('FKgjs_groupjob', $employee->FKe_group)
                ->where(function ($query) use ($employee) {
                    $query->where('FKgjs_userCreate', 0)
                        ->orWhere('FKgjs_userCreate', $employee->FKe_company);
                })
                ->whereNull('gjs_userDelete')
                ->whereNull('gjss_userDelete')
                ->select("*", DB::raw("count(*) as s_id")) 
                ->groupBy('s_id')
                ->get();


            
            dd($skills);
            
        return view('frontend.company.manageSkills.manageSkills-detail',compact('employee','gjSub','skills'));
    }
}

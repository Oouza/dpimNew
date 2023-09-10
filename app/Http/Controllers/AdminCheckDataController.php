<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\settingPosition;
use App\Models\groupjob;
use App\Models\capacity;
use App\Models\skills;
use App\Models\skillsSubs;

class AdminCheckDataController extends Controller
{
    function testEditJob(){
        $settingPosition = settingPosition::join('positions','positions.p_id','setting_positions.FKgsp_position')
            ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
            ->join('companies','companies.c_id','setting_positions.FKgsp_company')
            ->whereNull('FKgroupjobAdmin')->whereNull('sp_delete')->get();
        return view('backend.testEdit.job.testEditJob',compact('settingPosition'));
    }

    function testEditJobForm(){
        $settingPosition = settingPosition::join('positions','positions.p_id','setting_positions.FKgsp_position')
            ->join('companies','companies.c_id','setting_positions.FKgsp_company')->whereNull('FKgroupjobAdmin')->whereNull('sp_delete')->get();
        $groupjob = groupjob::whereNull('gj_userDelete')->get();
        return view('backend.testEdit.job.testEditJob-add',compact('settingPosition','groupjob'));
    }

    function testEditJobAdd(Request $request){
        // dd($request);

        $upSpOne = settingPosition::find($request->position_one)->update([
            'FKgroupjobAdmin'   => $request->job,
        ]);

        if($request->positionAdd!=''){
            for($i = 0; $i < count($request->positionAdd); $i++) {
                $indexedArray = array_values($request->positionAdd); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                $value = $indexedArray[$i];
                $upSp = settingPosition::find($value)->update([
                    'FKgroupjobAdmin'   => $request->job,
                ]);
            }
        }

        $mes = 'Success';
        $yourURL= url('backend/testEdit/job');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");

    }

    function testEditJobFormClean(){
        $settingPosition = settingPosition::join('positions', 'positions.p_id', '=', 'setting_positions.FKgsp_position')
            ->join('groupjobs as gj1', 'gj1.gj_id', '=', 'setting_positions.FKgsp_groupJob')
            ->join('groupjobs as gj2', 'gj2.gj_id', '=', 'setting_positions.FKgroupjobAdmin')
            ->join('companies', 'companies.c_id', '=', 'setting_positions.FKgsp_company')
            ->whereNotNull('gj2.gj_id')
            ->whereNull('sp_delete')
            ->select('sp_id','p_name','c_nameCompany','gj1.gj_name as gj1_gj_name','gj2.gj_name as gj2_gj_name','setting_positions.updated_at')
            ->get();
        // dd($settingPosition);
        $groupjob = groupjob::whereNull('gj_userDelete')->get();
        return view('backend.testEdit.job.testEditJob-clean',compact('settingPosition','groupjob'));
    }

    function testEditJobEdit($id){
        $sp = settingPosition::join('positions', 'positions.p_id', '=', 'setting_positions.FKgsp_position')
        ->join('groupjobs as gj1', 'gj1.gj_id', '=', 'setting_positions.FKgsp_groupJob')
        ->join('groupjobs as gj2', 'gj2.gj_id', '=', 'setting_positions.FKgroupjobAdmin')
        ->join('companies', 'companies.c_id', '=', 'setting_positions.FKgsp_company')
        ->whereNotNull('gj2.gj_id')
        ->whereNull('sp_delete')
        ->select('sp_id','p_name','c_nameCompany','gj1.gj_name as gj1_gj_name','gj2.gj_name as gj2_gj_name','setting_positions.updated_at')
        ->find($id);
        $groupjob = groupjob::whereNull('gj_userDelete')->get();
        return view('backend.testEdit.job.testEditJob-edit',compact('sp','groupjob'));
    }

    function testEditJobUpdate(Request $request, $id){
        // dd($request, $id);

        $upSpTwo = settingPosition::find($id)->update([
            'FKgroupjobAdmin'   => $request->position_one,
        ]);

        $mes = 'Success';
        $yourURL= url('backend/testEdit/job/clean');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function resultGJCom($id){
        $search = $id;

        $settingPosition = settingPosition::join('positions', 'positions.p_id', '=', 'setting_positions.FKgsp_position')
            ->join('groupjobs as gj1', 'gj1.gj_id', '=', 'setting_positions.FKgsp_groupJob')
            ->join('groupjobs as gj2', 'gj2.gj_id', '=', 'setting_positions.FKgroupjobAdmin')
            ->join('companies', 'companies.c_id', '=', 'setting_positions.FKgsp_company')
            ->where('FKgroupjobAdmin',$search)
            ->whereNull('sp_delete')
            ->select('sp_id','p_name','c_nameCompany','gj1.gj_name as gj1_gj_name','gj2.gj_name as gj2_gj_name','setting_positions.updated_at')
            ->get();
        $groupjob = groupjob::whereNull('gj_userDelete')->get();
        return view('backend.testEdit.job.testEditJob-clean',compact('settingPosition','groupjob','search'));
    }

    function testEditCapacity(){
        $capacity = capacity::join('companies','companies.c_id','capacities.FKcc_Create')
            ->where('FKcc_Create','!=','0')->whereNull('FKgroupAdmin')->whereNull('cc_userDelete')->get();
        
        return view('backend.testEdit.capacity.testEditCapacity',compact('capacity'));
    }

    function testEditCapacityForm(){
        $capacity = capacity::join('companies','companies.c_id','capacities.FKcc_Create')
            ->where('FKcc_Create','!=','0')->whereNull('FKgroupAdmin')->whereNull('cc_userDelete')->get();

        $capacityAdmin = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.testEdit.capacity.testEditCapacity-add',compact('capacity','capacityAdmin'));
    }

    function testEditCapacityAdd(Request $request){
        // dd($request);

        $upSpOne = capacity::find($request->capacity_new)->update([
            'FKgroupAdmin'   => $request->capacity,
        ]);

        if($request->capacityAdd!=''){
            for($i = 0; $i < count($request->capacityAdd); $i++) {
                $indexedArray = array_values($request->capacityAdd); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                $value = $indexedArray[$i];
                $upSp = capacity::find($value)->update([
                    'FKgroupAdmin'   => $request->capacity,
                ]);
            }
        }

        $mes = 'Success';
        $yourURL= url('backend/testEdit/capacity');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");

    }

    function testEditCapacityClean(){
        $capacity = capacity::join('companies','companies.c_id','capacities.FKcc_Create')
            ->where('FKcc_Create','!=','0')->whereNotNull('FKgroupAdmin')->whereNull('cc_userDelete')->get();
            
        $capacityAdmin = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.testEdit.capacity.testEditCapacity-clean',compact('capacity','capacityAdmin'));
    }

    function testEditCapacityEdti($id){
        $capacity = capacity::join('companies','companies.c_id','capacities.FKcc_Create')
            ->join('capacities as Capa','Capa.c_id','capacities.FKgroupAdmin')
            ->select('cc_id','c_name','c_nameCompany','Capa.cc_name as CapaName','gj2.gj_name as gj2_gj_name','capacities.updated_at')
            ->where('FKcc_Create','!=','0')->whereNotNull('FKgroupAdmin')->whereNull('cc_userDelete')->find($id);
        // $settingPosition = settingPosition::join('positions', 'positions.p_id', '=', 'setting_positions.FKgsp_position')
        //     ->join('groupjobs as gj1', 'gj1.gj_id', '=', 'setting_positions.FKgsp_groupJob')
        //     ->join('groupjobs as gj2', 'gj2.gj_id', '=', 'setting_positions.FKgroupjobAdmin')
        //     ->join('companies', 'companies.c_id', '=', 'setting_positions.FKgsp_company')
        //     ->where('FKgroupjobAdmin',$search)
        //     ->whereNull('sp_delete')
        //     ->select('sp_id','p_name','c_nameCompany','gj1.gj_name as gj1_gj_name','gj2.gj_name as gj2_gj_name','setting_positions.updated_at')
        //     ->get();

        $capacityAdmin = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.testEdit.capacity.testEditCapacity-edit',compact('capacity','capacityAdmin'));
    }

    function testEditCapacityUpdate($id){
        return view('backend.testEdit.capacity.testEditCapacity-edit');
    }

    function testEditSkills(){
        $skills = skills::join('companies','companies.c_id','skills.FKs_Create')
        ->join('capacities','capacities.cc_id','skills.FKs_capacity')
        ->where('FKs_Create','!=','0')->whereNull('FKcapacityAdmin')->whereNull('s_userDelete')->get();
        return view('backend.testEdit.skills.testEditSkills',compact('skills'));
    }

    function testEditSkillsForm(){
        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();

        $skills = skills::join('companies','companies.c_id','skills.FKs_Create')->where('FKs_Create','!=','0')->whereNull('FKcapacityAdmin')->whereNull('s_userDelete')->get();
        return view('backend.testEdit.skills.testEditSkills-add',compact('capacity','skills'));
    }

    function testEditSkillsAdd(Request $request){

        $upSkillsOne = skills::find($request->skills_one)->update([
            'FKcapacityAdmin'   => $request->capacity,
        ]);

        // $upSkillsTwo = skills::find($request->skills_two)->update([
        //     'FKcapacityAdmin'   => $request->capacity,
        // ]);

        if($request->skillsAdd!=''){
            for($i = 0; $i < count($request->skillsAdd); $i++) {
                $indexedArray = array_values($request->skillsAdd); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                $value = $indexedArray[$i];
                $upSp = skills::find($value)->update([
                    'FKcapacityAdmin'   => $request->capacity,
                ]);
            }
        }

        $mes = 'Success';
        $yourURL= url('backend/testEdit/skills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");

    }

    function testEditSkillsClean(){
        $skills = skills::join('companies','companies.c_id','skills.FKs_Create')
            ->join('capacities as cOld','cOld.cc_id','skills.FKs_capacity')
            ->join('capacities as cNew','cNew.cc_id','skills.FKcapacityAdmin')
            ->where('FKs_Create','!=','0')->whereNotNull('FKcapacityAdmin')->whereNull('s_userDelete')
            ->select('s_id','s_no','s_name','cOld.cc_name as CapaOld','cNew.cc_name as CapaNew','c_nameCompany','skills.updated_at')->get();
        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.testEdit.skills.testEditSkills-clean',compact('skills','capacity'));
    }

    function testEditSkillsEdit($id){
        $skills = skills::join('companies','companies.c_id','skills.FKs_Create')
            ->join('capacities','capacities.cc_id','skills.FKs_capacity')
            ->find($id);

        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.testEdit.skills.testEditSkills-edit',compact('skills','capacity'));
    }

    function testEditSkillsUpdate(Request $request, $id){
        $skills = skills::find($id)->update([
            'FKcapacityAdmin'   => $request->skills_new,
        ]);

        $mes = 'Success';
        $yourURL= url('backend/testEdit/skills/clean');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function resultSkillsCom($id){
        $search = $id;
        $skills = skills::join('companies','companies.c_id','skills.FKs_Create')
            ->join('capacities as cOld','cOld.cc_id','skills.FKs_capacity')
            ->join('capacities as cNew','cNew.cc_id','skills.FKcapacityAdmin')->where('FKcapacityAdmin',$search)
            ->where('FKs_Create','!=','0')->whereNotNull('FKcapacityAdmin')->whereNull('s_userDelete')
            ->select('s_id','s_no','s_name','cOld.cc_name as CapaOld','cNew.cc_name as CapaNew','c_nameCompany','skills.updated_at')->get();
        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.testEdit.skills.testEditSkills-clean',compact('skills','capacity','search'));
    }

    function testEditSkillsSub(){
        $skillsSubs = skillsSubs::join('companies','companies.c_id','skills_subs.FKss_Create')
            ->join('skills','skills.s_id','skills_subs.FKss_skills')
            ->join('capacities','capacities.cc_id','skills_subs.FKss_capacity')
            ->where('FKss_Create','!=','0')->whereNull('FKskillsAdmin')->whereNull('ss_userDelete')->get();
        return view('backend.testEdit.skillsSub.testEditSkillsSub',compact('skillsSubs'));
    }

    function testEditSkillsSubForm(){
        $skillsSubs = skillsSubs::where('FKss_Create','!=','0')->whereNull('FKskillsAdmin')->whereNull('ss_userDelete')->get();

        $skills = skills::where('FKs_Create',0)->whereNull('s_userDelete')->get();
        return view('backend.testEdit.skillsSub.testEditSkillsSub-add',compact('skillsSubs','skills'));
    }

    function testEditSkillsSubAdd(Request $request){
        $upSkillsSubsOne = skillsSubs::find($request->skillsSub_one)->update([
            'FKskillsAdmin'   => $request->skills,
        ]);

        // $upSkillsSubsTwo = skillsSubs::find($request->skillsSub_two)->update([
        //     'FKskillsAdmin'   => $request->skills,
        // ]);

        if($request->skillsSubAdd!=''){
            for($i = 0; $i < count($request->skillsSubAdd); $i++) {
                $indexedArray = array_values($request->skillsSubAdd); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                $value = $indexedArray[$i];
                $upSp = skillsSubs::find($value)->update([
                    'FKskillsAdmin'   => $request->skills,
                ]);
            }
        }

        $mes = 'Success';
        $yourURL= url('backend/testEdit/skillsSub');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function testEditSkillsSubClean(){
        $skillsSubs = skillsSubs::join('companies','companies.c_id','skills_subs.FKss_Create')
            ->join('skills as sOld','sOld.s_id','skills_subs.FKss_skills')
            ->join('skills as sNew','sNew.s_id','skills_subs.FKskillsAdmin')
            ->whereNull('ss_userDelete')
            ->select('ss_id','ss_name','ss_no','sNew.s_name as skillsNew','sOld.s_name as skillsOld','c_nameCompany','skills_subs.updated_at')->get();
        
        $skills = skills::where('FKs_Create',0)->whereNull('s_userDelete')->get();

        return view('backend.testEdit.skillsSub.testEditSkillsSub-clean',compact('skillsSubs','skills'));
    }

    function testEditSkillsSubEdit($id){
        $ss = skillsSubs::join('companies','companies.c_id','skills_subs.FKss_Create')
            ->join('skills','skills.s_id','skills_subs.FKss_skills')->find($id);

        $skills = skills::where('FKs_Create',0)->whereNull('s_userDelete')->get();
        return view('backend.testEdit.skillsSub.testEditSkillsSub-edit',compact('ss','skills'));
    }

    function testEditSkillsSubUpdate(Request $request, $id){
        $skillsSubs = skillsSubs::find($id)->update([
            'FKskillsAdmin'   => $request->skills_new,
        ]);

        $mes = 'Success';
        $yourURL= url('backend/testEdit/skillsSub/clean');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function resultSkillsSubCom($id){
        $skillsSubs = skillsSubs::join('companies','companies.c_id','skills_subs.FKss_Create')
            ->join('skills as sOld','sOld.s_id','skills_subs.FKss_skills')
            ->join('skills as sNew','sNew.s_id','skills_subs.FKskillsAdmin')
            ->where('FKskillsAdmin',$id)->whereNull('ss_userDelete')
            ->select('ss_id','ss_name','ss_no','sNew.s_name as skillsNew','sOld.s_name as skillsOld','c_nameCompany','skills_subs.updated_at')->get();
        
        $skills = skills::where('FKs_Create',0)->whereNull('s_userDelete')->get();

        return view('backend.testEdit.skillsSub.testEditSkillsSub-clean',compact('skillsSubs','skills','id'));
    }
}

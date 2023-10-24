<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\employee;
use App\Models\User;
use App\Models\departmentSub;
use App\Models\capacity;
use App\Models\skills;
use App\Models\skillsSubs;
use App\Models\ceohr;
use App\Models\groupjob;
use App\Models\gjSkillsSub;
use App\Models\gjskills;
use App\Models\goals;
use App\Models\plan;
use App\Models\course;
use App\Models\typeCourse;
use App\Models\courseSkills;

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
        $year = \Carbon\Carbon::now()->year;
        // dd($year);
        $employee = employee::join('departments','departments.d_id','employees.FKe_department')
        ->join('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
        ->join('setting_positions','setting_positions.sp_id','employees.FKe_position')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->find($id);

        $e_gj = $employee->FKe_group;
        $e_company = $employee->FKe_company;

        $gjSub = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
            ->join('gjskills','gjskills.gjs_id','gj_skills_subs.FKgjss_gjskills')
            ->join('skills','skills.s_id','gjskills.FKgjs_skills')
            ->join('gjcapacities','gjcapacities.gjc_id','gj_skills_subs.FKgjss_gjcapacity')            
            ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')            
            ->where('FKgjss_groupjob',$e_gj)
            // ->where('FKgjss_userCreate',0)
            ->where(function ($query) use ($e_company) {
                $query->where('FKgjss_userCreate', 0)
                    ->orWhere('FKgjss_userCreate', $e_company);
            })
            ->whereNull('gjss_userDelete')->get();

        $goals = goals::where('FKgoals_employee',$id)->where('goals_year',$year)->whereNull('goals_userDelete')->get();

        return view('frontend.company.manageSkills.manageSkills-detail',compact('employee','gjSub','id','goals','year'));
    }
    
    function resultManageSkillsDetail(Request $request){
        // dd($request);

        $year = $request->year;
        $id = $request->idUser;
        // dd($id);
        $employee = employee::join('departments','departments.d_id','employees.FKe_department')
        ->join('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
        ->join('setting_positions','setting_positions.sp_id','employees.FKe_position')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->find($id);

        $e_gj = $employee->FKe_group;
        $e_company = $employee->FKe_company;

        $gjSub = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
            ->join('gjskills','gjskills.gjs_id','gj_skills_subs.FKgjss_gjskills')
            ->join('skills','skills.s_id','gjskills.FKgjs_skills')
            ->join('gjcapacities','gjcapacities.gjc_id','gj_skills_subs.FKgjss_gjcapacity')            
            ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')            
            ->where('FKgjss_groupjob',$e_gj)
            // ->where('FKgjss_userCreate',0)
            ->where(function ($query) use ($e_company) {
                $query->where('FKgjss_userCreate', 0)
                    ->orWhere('FKgjss_userCreate', $e_company);
            })
            ->whereNull('gjss_userDelete')->get();

        $goals = goals::where('FKgoals_employee',$id)->where('goals_year','2024')->whereNull('goals_userDelete')->get();
        // dd($goals);

        return view('frontend.company.manageSkills.manageSkills-detail',compact('employee','gjSub','id','goals','year'));
    }

    function manageSkillsAdd(Request $request, $id){
        // dd($request);
        $employee = employee::find($id);
        $name = $employee->e_title.' '.$employee->e_fname.' '.$employee->e_lname;
        // dd($name);
        
        if($request->goals!=''){
            for($i = 0; $i < count($request->goals); $i++) {
                $idArray = array_values($request->goalsId);
                $valueId = $idArray[$i];

                $goalsArray = array_values($request->goals);
                $valueGoals = $goalsArray[$i];
                $ss = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')->find($valueGoals);

                $update = goals::find($valueId)->update([
                    'FKgoals_employee'      => $id,
                    'goals_nameemployee'    => $name,
                    'FKgoals_skillsSub'     => $valueGoals,
                    'goals_nameskillsSub'   => $ss->ss_name,
                    'goals_year'            => $request->year,
                    'goals_status'          => 1,
                ]);
            }
        }

        if($request->job_type!=''){
            for($i = 0; $i < count($request->job_type); $i++) {
                $indexedArray = array_values($request->job_type);
                $value = $indexedArray[$i];
                $ss = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')->find($value);

                $goals = new goals;
                $goals->FKgoals_employee    = $id;
                $goals->goals_nameemployee  = $name;
                $goals->FKgoals_skillsSub   = $value;
                $goals->goals_nameskillsSub = $ss->ss_name;
                $goals->goals_year          = $request->year;
                $goals->goals_status        = 1;
                $goals->save();
            }

            // $mes = 'Success';
            // $yourURL= url('company/manage/skills');
            // echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }else{
            $mes = 'กรุณาเพิ่มเป้าหมายการพัฒนาบุคลากร';
            $yourURL= url('company/manage/skills/detail/'.$id);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }

        $mes = 'Success';
        $yourURL= url('company/manage/skills/detail/'.$id);
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        
    }

    function manageSkillsDelete($id){
        $update = goals::find($id)->update([
            'goals_userDelete'  => Auth::user()->name,
        ]);

        $mes = 'Success';
        $yourURL= url('company/manage/skills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function planSkills(){
        $plan = plan::join('employees','employees.FKe_userid','plans.FKplans_employee')
            ->join('groupjobs','groupjobs.gj_id','employees.FKe_group')
            ->join('courses','courses.cou_id','plans.FKplans_course')
            ->whereNull('plans_userDelete')->get();
        return view('frontend.company.plan.planSkills',compact('plan'));
    }

    function planSkillsForm(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $com_id = $hr->FKch_company;
        $employee = employee::join('departments','departments.d_id','employees.FKe_department')
            ->join('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
            ->join('setting_positions','setting_positions.sp_id','employees.FKe_position')
            ->join('positions','positions.p_id','setting_positions.FKgsp_position')
            ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
            ->where('FKe_company',$com_id)->whereNull('e_userDelete')->get();
        $course = course::whereNull('cou_userDelete')->get();
        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        $capacity = capacity::where(function ($query) use ($com_id) {
            $query->where('FKcc_Create', 0)
                ->orWhere('FKcc_Create', $com_id);
            })->whereNull('cc_userDelete')->get();
        $skills = skills::join('skills_subs', 'skills_subs.FKss_skills', 'skills.s_id')
            ->where(function ($query) use ($com_id) {
                $query->where('FKs_Create', 0)
                    ->orWhere('FKs_Create', $com_id);
            })
            ->whereNull('s_userDelete')
            ->groupBy('skills.s_id', 'skills.s_no') // Added s_no in the group by clause
            ->select('skills.s_id', 'skills.s_no', DB::raw('MAX(skills.s_name) as s_name'))
            ->get();
        $skillsSubs = skillsSubs::where(function ($query) use ($com_id) {
            $query->where('FKss_Create', 0)
                ->orWhere('FKss_Create', $com_id);
            })->whereNull('ss_userDelete')->get();
        return view('frontend.company.plan.planSkills-add',compact('employee','course','capacity','typeCourse','skills','skillsSubs','com_id'));
    }

    function planSkillsAdd(Request $request){
        // dd($request);

        if($request->select_id == 0){
            // course new
            $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();

            $typeCourse = typeCourse::find($request->type_course_now);
            $ss = skillsSubs::where('ss_id',$request->skills1)->first();

            $courseNum = course::all();
            $number = count($courseNum)+1;
            $no = str_pad($number, 3, "0", STR_PAD_LEFT);

            $course = new course;
            $course->cou_no             = $no;
            $course->cou_name	        = $request->nameCouserNew;
            $course->cou_organizer      = $request->organizerNew;
            // $course->cou_startTime	    = $request->start;
            // $course->cou_endTime	    = $request->end;
            $course->FKcou_typeCourse	= $request->type_course_now;
            $course->cou_nametypeCourse = $typeCourse->tc_name;
            $course->cou_period	        = $request->timeNew;
            // $course->cou_frequency      = $request->frequency;
            // $course->cou_detail	        = $request->detail;
            // $course->cou_note	        = $request->course_note;
            $course->FKcou_userCreate   = $hr->FKch_company;
            $course->cou_userCreate	    = Auth::user()->name;
            $course->cou_userUpdate     = Auth::user()->name;
            // $course->save();

            $last = DB::table('courses')->latest('cou_id')->first();

            $courseId = $last->cou_id;
            $courseName = $request->nameCouserNew;
            
            $courseSkills = new courseSkills;
            $courseSkills->FKcs_skills	    = $request->skills1;
            $courseSkills->cs_nameskills	= $ss->ss_name;
            $courseSkills->FKcs_course	    = $last->cou_id;
            $courseSkills->cs_namecourse	= $last->cou_name;
            $courseSkills->FKcs_userCreate  = $hr->FKch_company;
            $courseSkills->cou_userCreate	= Auth::user()->name;
            $courseSkills->cou_userUpdate   = Auth::user()->name;
            $courseSkills->save();
            
            if($request->course_skills!=''){
                for($i = 0; $i < count($request->course_skills); $i++) {
                    $indexedArray = array_values($request->course_skills); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                    $value = $indexedArray[$i];
                    $sSub = skillsSubs::find($value);
    
                    $courseSkills = new courseSkills;
                    $courseSkills->FKcs_skills	    = $value;
                    $courseSkills->cs_nameskills	= $sSub->ss_name;
                    $courseSkills->FKcs_course	    = $last->cou_id;
                    $courseSkills->cs_namecourse	= $last->cou_name;
                    $courseSkills->FKcs_userCreate  = $hr->FKch_company;
                    $courseSkills->cou_userCreate	= Auth::user()->name;
                    $courseSkills->cou_userUpdate   = Auth::user()->name;
                    $courseSkills->save();
                }
            }

        }else{
            $courseId = $request->course_name;
            $course = course::find($request->course_name);
            $courseName = $course->cou_name;
        }

        $capacity = capacity::find($request->capacity);
        $skills = skills::find($request->upSkills);
        $skillsSubs = skillsSubs::find($request->skillsSub);
        $people = User::find($request->people);

        // dd($capacity->cc_id, $capacity->cc_name, $skills->s_id, $skills->s_name, $skillsSubs->ss_id, $skillsSubs->ss_name, $people->id, $people->name);

        $plan                       = new plan;
        $plan->FKplans_employee	    = $request->people;
        $plan->plans_nameemployee   = $people->name;
        $plan->FKplans_course       = $courseId;
        $plan->plans_namecourse     = $courseName;
        $plan->FKplans_capacity     = $request->capacity;
        $plan->plans_namecapacity   = $capacity->cc_name;
        $plan->FKplans_skills       = $request->upSkills;
        $plan->plans_nameskills     = $skills->s_name;
        $plan->FKplans_skillssub    = $request->skillsSub;
        $plan->plans_nameskillssub  = $skillsSubs->ss_name;
        $plan->plans_datestart      = $request->dateStart;
        $plan->plans_dateend        = $request->dateEnd;
        $plan->plans_moneycouser    = $request->moneyCouser;
        $plan->plans_moneyother     = $request->moneyOther;
        $plan->plans_status         = 2;
        $plan->save();

        $mes = 'Success';
        $yourURL= url('company/plan/skills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function planSkillsEdit($id){
        $plan = plan::join('employees','employees.FKe_userid','plans.FKplans_employee')
            ->join('groupjobs','groupjobs.gj_id','employees.FKe_group')
            ->join('courses','courses.cou_id','plans.FKplans_course')
            ->leftjoin('type_course','type_course.tc_id','courses.FKcou_typeCourse')
            ->join('departments','departments.d_id','employees.FKe_department')
            ->join('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
            ->join('setting_positions','setting_positions.sp_id','employees.FKe_position')
            ->join('positions','positions.p_id','setting_positions.FKgsp_position')
            ->find($id);

        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $com_id = $hr->FKch_company;
        $employee = employee::join('departments','departments.d_id','employees.FKe_department')
            ->join('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
            ->join('setting_positions','setting_positions.sp_id','employees.FKe_position')
            ->join('positions','positions.p_id','setting_positions.FKgsp_position')
            ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
            ->where('FKe_company',$com_id)->whereNull('e_userDelete')->get();
        
        $course = course::whereNull('cou_userDelete')->get();
        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        $courseSkills = courseSkills::join('skills_subs','skills_subs.ss_id','course_skills.FKcs_skills')
            ->where('FKcs_course',$plan->FKplans_course)
            ->whereNull('cou_userDelete')->get();

        $capacity = capacity::where(function ($query) use ($com_id) {
            $query->where('FKcc_Create', 0)
                ->orWhere('FKcc_Create', $com_id);
            })->whereNull('cc_userDelete')->get();

        $sWant = skills::where(function ($query) use ($com_id) {
            $query->where('FKs_Create', 0)
                ->orWhere('FKs_Create', $com_id);
            })->whereNull('s_userDelete')->get();

        $ssWant = skillsSubs::where(function ($query) use ($com_id) {
            $query->where('FKss_Create', 0)
                ->orWhere('FKss_Create', $com_id);
            })->whereNull('ss_userDelete')->get();

        $skills = skills::join('skills_subs', 'skills_subs.FKss_skills', 'skills.s_id')
            ->where(function ($query) use ($com_id) {
                $query->where('FKs_Create', 0)
                    ->orWhere('FKs_Create', $com_id);
            })
            ->whereNull('s_userDelete')
            ->groupBy('skills.s_id', 'skills.s_no') // Added s_no in the group by clause
            ->select('skills.s_id', 'skills.s_no', DB::raw('MAX(skills.s_name) as s_name'))
            ->get();
        $skillsSubs = skillsSubs::where(function ($query) use ($com_id) {
            $query->where('FKss_Create', 0)
                ->orWhere('FKss_Create', $com_id);
            })->whereNull('ss_userDelete')->get();

        return view('frontend.company.plan.planSkills-edit',compact('plan','employee','course','capacity','sWant','ssWant','typeCourse','skills','skillsSubs','com_id','courseSkills'));
    }

    function planSkillsUpdate(Request $request, $id){
        dd($request);
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        if($request->select_id == 0){
            // course old
            $typeCourse = typeCourse::find($request->type_course_now);
            if(empty($request->couserNewId)){
                // dd($request);
                // add course
                $ss = skillsSubs::where('ss_id',$request->skills1)->first();

                $courseNum = course::all();
                $number = count($courseNum)+1;
                $no = str_pad($number, 3, "0", STR_PAD_LEFT);

                $course = new course;
                $course->cou_no             = $no;
                $course->cou_name	        = $request->nameCouserNew;
                $course->cou_organizer      = $request->organizerNew;
                $course->FKcou_typeCourse	= $request->type_course_now;
                $course->cou_nametypeCourse = $typeCourse->tc_name;
                $course->cou_period	        = $request->timeNew;
                $course->FKcou_userCreate   = $hr->FKch_company;
                $course->cou_userCreate	    = Auth::user()->name;
                $course->cou_userUpdate     = Auth::user()->name;
                $course->save();

                $last = DB::table('courses')->latest('cou_id')->first();

                $courseId = $last->cou_id;
                $courseName = $request->nameCouserNew;
                
                $courseSkills = new courseSkills;
                $courseSkills->FKcs_skills	    = $request->skills1;
                $courseSkills->cs_nameskills	= $ss->ss_name;
                $courseSkills->FKcs_course	    = $last->cou_id;
                $courseSkills->cs_namecourse	= $last->cou_name;
                $courseSkills->FKcs_userCreate  = $hr->FKch_company;
                $courseSkills->cou_userCreate	= Auth::user()->name;
                $courseSkills->cou_userUpdate   = Auth::user()->name;
                $courseSkills->save();
                
                if($request->course_skills!=''){
                    for($i = 0; $i < count($request->course_skills); $i++) {
                        $indexedArray = array_values($request->course_skills); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                        $value = $indexedArray[$i];
                        $sSub = skillsSubs::find($value);
        
                        $courseSkills = new courseSkills;
                        $courseSkills->FKcs_skills	    = $value;
                        $courseSkills->cs_nameskills	= $sSub->ss_name;
                        $courseSkills->FKcs_course	    = $last->cou_id;
                        $courseSkills->cs_namecourse	= $last->cou_name;
                        $courseSkills->FKcs_userCreate  = $hr->FKch_company;
                        $courseSkills->cou_userCreate	= Auth::user()->name;
                        $courseSkills->cou_userUpdate   = Auth::user()->name;
                        $courseSkills->save();
                    }
                }
            }
            else{
                // update course
                // dd($course->cou_id, $course->cou_name, $request->nameCouserNew);
                $update = course::find($request->couserNewId)->update([
                    'cou_name'              =>  $request->nameCouserNew,
                    'cou_organizer'         =>  $request->organizerNew,
                    'FKcou_typeCourse'      =>  $request->type_course_now,
                    'cou_nametypeCourse'    =>  $typeCourse->tc_name,
                    'cou_period'            =>  $request->timeNew,
                    'cou_userUpdate'        =>  Auth::user()->name,
                ]);
        
                if (!empty($request->csId)) {
                    $conIdArray = array_values($request->csId);
                    $skillsArray = array_values($request->skills);
                
                    $arrayLength = count($conIdArray);
                    for ($i = 0; $i < $arrayLength; $i++) {
                        if (isset($conIdArray[$i]) && isset($skillsArray[$i])) {
                            $conId = $conIdArray[$i];
                            $skills = $skillsArray[$i];
                
                            $sSub = skillsSubs::find($skills);
                
                            $update = courseSkills::where('cs_id', $conId)->update([
                                'FKcs_skills' => $skills,
                                'cs_nameskills' => $sSub->ss_name,
                                'FKcs_course' => $request->couserNewId,
                                'cs_namecourse' => $request->nameCouserNew,
                                'cou_userUpdate' => Auth::user()->name,
                            ]);
                        }
                    }
                }
        
                if($request->course_skills!=''){
                    for($i = 0; $i < count($request->course_skills); $i++) {
                        $indexedArray = array_values($request->course_skills); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                        $value = $indexedArray[$i];
                        $sSub = skillsSubs::find($value);
        
                        $courseSkills = new courseSkills;
                        $courseSkills->FKcs_skills	    = $value;
                        $courseSkills->cs_nameskills	= $sSub->ss_name;
                        $courseSkills->FKcs_course	    = $id;
                        $courseSkills->cs_namecourse	= $request->nameCouserNew;
                        $courseSkills->FKcs_userCreate  = 0;
                        $courseSkills->cou_userCreate	= Auth::user()->name;
                        $courseSkills->cou_userUpdate   = Auth::user()->name;
                        $courseSkills->save();
                    }
                }

                $courseId = $request->couserNewId;
                $course = course::find($request->couserNewId);
                $courseName = $course->cou_name;

            }

        }else{
            $courseId = $request->course_name;
            $course = course::find($request->course_name);
            $courseName = $course->cou_name;
        }

        $capacity = capacity::find($request->capacity);
        $skills = skills::find($request->upSkills);
        $skillsSubs = skillsSubs::find($request->skillsSub);
        $people = User::find($request->people);

        $update = plan::find($id)->update([
           'FKplans_employee'  => $request->people,
           'plans_nameemployee'  => $people->name,
           'FKplans_course'  => $courseId,
           'plans_namecourse'  => $courseName,
           'FKplans_capacity'  => $request->capacity,
           'plans_namecapacity'  => $capacity->cc_name,
           'FKplans_skills'  => $request->upSkills,
           'plans_nameskills'  => $skills->s_name,
           'FKplans_skillssub'  => $request->skillsSub,
           'plans_nameskillssub'  => $skillsSubs->ss_name,
           'plans_datestart'  => $request->dateStart,
           'plans_dateend'  => $request->dateEnd,
           'plans_moneycouser'  => $request->moneyCouser,
           'plans_moneyother'  => $request->moneyOther,
        ]);

        $mes = 'Success';
        $yourURL= url('company/plan/skills');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");

    }

    function courseSkillsDel($id){
        // dd($id);
        $update = courseSkills::find($id)->update([
            'cou_userDelete'  => Auth::user()->name,
        ]);
    }

    function searchEmployee(Request $request){
        // dd($request->people);
        $employee = employee::leftJoin('groupjobs', 'groupjobs.gj_id', '=', 'employees.FKe_group')
            ->leftJoin('positions', 'positions.p_id', '=', 'employees.FKe_position')
            ->leftJoin('departments', 'departments.d_id', '=', 'employees.FKe_department')
            ->leftJoin('department_subs', 'department_subs.ds_id', '=', 'employees.FKe_departmentSub')
            ->where('employees.FKe_userid', $request->people)
            ->first();
        // $response['groupJob'] = $employee->gj_name;
        if($employee->gj_name == ''){
            $gjName = null;
        }else{
            $gjName = $employee->gj_name;
        }
        $response['gjName'] = $gjName;
        $response['position'] = $employee->p_name;
        $response['departments'] = $employee->d_name;
        $response['department_subs'] = $employee->ds_name;
        return json_encode($response);      
    }

    function skillsWant(Request $request){
        $com_id = $request->company;
        $skills = skills::where('FKs_capacity', $request->capacity)
            ->where(function ($query) use ($com_id) {
                $query->where('FKs_Create', 0)
                    ->orWhere('FKs_Create', $com_id);
            })->whereNull('s_userDelete')->get();
        $html = '<option value="">- กรุณาเลือกทักษะ -</option>';
        if(!empty($skills)){
            foreach($skills as $_data){
                $html .= '<option value="'.$_data->s_id.'">'.$_data->s_no.' '.$_data->s_name.'</option>';
               
            }
        }
        $response["html"] = $html;
        return json_encode($response);
    }

    function skillsSubWant(Request $request){
        $com_id = $request->company;
        $skillsSubs = skillsSubs::where('FKss_skills', $request->upSkills)
            ->where(function ($query) use ($com_id) {
                $query->where('FKss_Create', 0)
                    ->orWhere('FKss_Create', $com_id);
            })->whereNull('ss_userDelete')->get();
        $html = '<option value="">- กรุณาเลือกทักษะย่อย -</option>';
        if(!empty($skillsSubs)){
            foreach($skillsSubs as $_data){
                $html .= '<option value="'.$_data->ss_id.'">'.$_data->ss_no.' '.$_data->ss_name.'</option>';
               
            }
        }
        $response["html"] = $html;
        return json_encode($response);
    }
    
    function searchCoursePlan(Request $request){
        $course = course::join('type_course','type_course.tc_id','courses.FKcou_typeCourse')->find($request->course);
        $cs = courseSkills::join('skills_subs','skills_subs.ss_id','course_skills.FKcs_skills')->where('FKcs_course',$request->course)->get();
        
        // $response = $course->ss_detail;
        $response["organizer"] = $course->cou_organizer;
        $response["period"] = $course->cou_period.' ชั่วโมง';
        $response["typeCourse"]  = $course->tc_name;
        $response["standardThree"]  = $course->ss_standardThree;
        return json_encode($response);
    }
}

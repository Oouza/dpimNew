<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\employee;
use App\Models\User;
use App\Models\departmentSub;
use App\Models\groupjob;
use App\Models\course;
use App\Models\CourseModel;
use App\Models\courseSkills;
use App\Models\typeCourse;
use App\Models\skills;
use App\Models\skillsSubs;
use App\Models\capacity;
use App\Models\ceohr;
use App\Models\Company;
use App\Models\hr;
use App\Models\settingPosition;
use App\Models\lavelJob;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    function loginUser(){
        return view('frontend.person.loginUser');
    }

    function forgotPasswordUser(){
        return view('frontend.person.forgotpassword');
    }

    function regiterUser(){
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        return view('frontend.person.regiterUser',compact('provinces'));
    }

    function employAdd(Request $request){
        // dd(Auth::user()->name);
        $name = $request->e_title.' '.$request->e_fname.' '.$request->e_lname;

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
            $User->status   = 7;
            $User->save();
            
            $last = DB::table('users')->latest('id')->first();

            $employee = new employee;
            $employee->e_title              = $request->e_title;
            $employee->e_fname              = $request->e_fname;
            $employee->e_lname              = $request->e_lname;
            $employee->e_phone              = $request->e_phone;
            $employee->e_birth              = $request->birth;
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
            $employee->e_userCreate         = $name;
            $employee->e_userUpdate         = $name;
            $employee->save();

            $mes = 'Success';
            $yourURL= url('successUser');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
        // return view('frontend.person.regiterUser');
    }
    
    function successUser(){
        return view('frontend.person.successUser');
    }

    function indexUser(){
        return view('frontend.person.indexUser');
    }

    // function userStudy(){
    //     return view('frontend.userStudy');
    // }

    function userStudyForm()
    {
        
        $date = date('Y-m-d');
        $courses = CourseModel::where('cou_startTime', '<=', $date)->where('cou_endTime', '>=', $date)->where('FKcou_userCreate', 0)->orderBy('cou_id', 'DESC')->get();
        $typecourses = typeCourse::get();
        $skills_subs = skillsSubs::get();
        $capacity = capacity::get();
        $data = array(
            'courses' => $courses,
            'typecourses' => $typecourses,
            'skills_subs' => $skills_subs,
            'capacity' => $capacity,
        );
        return view('frontend.person.study.userStudy-add', $data);
    }

    function userStudyEdit(){
        return view('frontend.person.study.userStudy-edit');
    }

    function userHistory(){
        $user = User::join('employees','employees.FKe_userid','users.id')->find(\Auth::user()->id);
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $company = DB::table('companies')->orderBy("c_id", 'ASC')->get();
        $department = DB::table('departments')->orderBy("d_id", 'ASC')->get();
        $departmentsub = DB::table('department_subs')->orderBy("ds_id", 'ASC')->get();
        $setting_positions = DB::table('setting_positions')->orderBy("sp_id", 'ASC')->get();
        $level_jobs = DB::table('lavel_jobs')->orderBy("lj_id", 'ASC')->get();
        $group = DB::table('groupjobs')->orderBy("gj_name", 'ASC')->get();
        return view('frontend.person.userHistory',compact('user','provinces','amphures','districts','company','department','departmentsub','setting_positions','level_jobs','group'));
    }

    function userTraining(){
        return view('frontend.person.trainCourse.userTraining');
    }

    function userTrainingDetail(){
        return view('frontend.person.trainCourse.userTraining-detail');
    }

    function userStudy(){
        return view('frontend.person.study.userStudy');
    }

    function userPlan(){
        return view('frontend.person.plan.plan');
    }

    function userPlanForm(){
        return view('frontend.person.plan.plan-add');
    }

    function userPlanEdit(){
        return view('frontend.person.plan.plan-edit');
    }

    function userCourse(){
        return view('frontend.person.trainCourse.course');
    }






    
    
    function indexCompany(){
        return view('frontend.company.job.indexCompany');
    }

    // function companyJobForm(){
    //     return view('frontend.company.job.job-add');
    // }

    // function companyJobEdit(){
    //     return view('frontend.company.job.job-edit');
    // }

    // function companyJobDetail(){
    //     return view('frontend.company.job.job-detail');
    // }

    // function companyJobCapa(){
    //     return view('frontend.company.job.capacity.capacity');
    // }

    // function companyJobCapaForm(){
    //     return view('frontend.company.job.capacity.capacity-add');
    // }

    // function companyJobCapaEdit(){
    //     return view('frontend.company.job.capacity.capacity-edit');
    // }

    // function companyJobSkills(){
    //     return view('frontend.company.job.skills.skills');
    // }

    // function companyJobSkillsForm(){
    //     return view('frontend.company.job.skills.skills-add');
    // }

    // function companyJobSkillsEdit(){
    //     return view('frontend.company.job.skills.skills-edit');
    // }
    // function companyCapacity(){
    //     return view('frontend.company.capacity.capacity');
    // }

    // function companyCapacityForm(){
    //     return view('frontend.company.capacity.capacity-add');
    // }

    // function companyCapacityEdit(){
    //     return view('frontend.company.capacity.capacity-edit');
    // }

    // function companySkills(){
    //     return view('frontend.company.skills.skills');
    // }

    // function companySkillsForm(){
    //     return view('frontend.company.skills.skills-add');
    // }

    // function companySkillsEdit(){
    //     return view('frontend.company.skills.skills-edit');
    // }

    // function companySkillsSub(){
    //     return view('frontend.company.skillsSub.skillsSub');
    // }

    // function companySkillsSubForm(){
    //     return view('frontend.company.skillsSub.skillsSub-add');
    // }

    // function companySkillsSubEdit(){
    //     return view('frontend.company.skillsSub.skillsSub-edit');
    // }
    
    function manageSkillsForm(){
        return view('frontend.company.manageSkills.manageSkills-add');
    }

    function manageSkillsEdit(){
        return view('frontend.company.manageSkills.manageSkills-edit');
    }  

    function cfPlanSkills(){
        return view('frontend.company.plan.cfPlanSkills');
    }

    function cfPlanSkillsDetail(){
        return view('frontend.company.plan.cfPlanSkills-detail');
    }

    function setting(){
        // Auth::user()->id
        $hr = ceohr::join('companies','companies.c_id','ceohrs.FKch_company')
            ->join('users','users.id','ceohrs.FKch_userid')->where('FKch_userid',Auth::user()->id)->first();
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $minerals = DB::table('type_minerals')->whereNull('tm_userDelete')->get();
        return view('frontend.company.userHistory',compact('hr','provinces','amphures','districts','minerals'));
    }

    function settingUpdate(Request $request, $id){
        // dd($id);
        $name = $request->title.' '.$request->fname.' '.$request->lname;

        $chemail = DB::table('users')->where('email',$request->email)->first();

        if((!empty($chemail)) && ($chemail->id != $id)){
            return back()->with('success',$request->email.' อีเมลนี้ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมลใหม่',compact(('request')));
        }else{
            // return back()->with('success',$request->email.' OK ',compact(('request')));
        }

        // update users
        $update = User::find($id)->update([
            'email' =>  $request->email,
            'name'  =>  $name,
        ]);

        // update users
        if(!empty($request->pass)){
            $update = User::find($user->id)->update([
                'password'         =>  Hash::make($request->input('pass')),
            ]);
        }

        $user = User::join('ceohrs','ceohrs.FKch_userid','users.id')
        ->join('companies','companies.c_id','ceohrs.FKch_company')
        ->where('users.id',$id)->first();
        // dd($user->FKch_company);

        // update companies
        $update = Company::where('c_id',$user->FKch_company)->update([
            'c_addressNo'       =>  $request->address_no,
            'FKc_provinces'     =>  $request->povices_now,
            'FKc_amphur'        =>  $request->aumphur_now,
            'FKc_tumbon'        =>  $request->tumbon_now,
            'c_postCode'        =>  $request->postcode,
            'c_userUpdate'      =>  Auth::user()->name,
        ]);

        // update ceohr
        $update = ceohr::where('FKch_userid',$id)->update([
            'ch_title'      =>  $request->title,
            'ch_fname'      =>  $request->fname,
            'ch_lname'      =>  $request->lname,
            'ch_phone'      =>  $request->phone,
            'ch_userUpdate' =>  Auth::user()->name,
        ]);
        if (!empty($request->file('credti'))) {
    
            //ลบรูปเก่าเพื่ออัพโหลดรูปใหม่แทน
            $path2 = 'public/upload/img/'.$request->credti;

            if (file_exists($path2)) {
                //dd($path2.$data->image_profile);
                @unlink($path2);
            }
            $path = 'upload/img/';
            $img = $request->file('credti');
            $img_name = 'credti' . time() . '.' . $img->getClientOriginalExtension();
            $save_path = $img->move(public_path($path), $img_name);
            // dd($img_name);
            $data2['ch_credit']=$img_name;
            
            DB::table('ceohrs')->where('FKch_userid',$id)->update($data2);    
        }

        $mes = 'Update Success';
        $yourURL= url('company/edit');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        return view('backend.adnim.setting',compact('user'));
    }

    function companyGraphJob(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $employee = employee::leftjoin('positions','positions.p_id','employees.FKe_department')
            ->where('e_status',1)->where('FKe_company',$hr->FKch_company)->get();
        $groupjob = groupjob::whereNull('gj_userDelete')->get();
        return view('frontend.company.graph.graph-job',compact('employee','groupjob'));
    }

    function companyGraphCapacity(){
        return view('frontend.company.graph.graph-capacity');
    }

    function companyGraphSillks(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $employee = employee::leftjoin('departments','departments.d_id','employees.FKe_position')
            ->where('e_status',1)->where('FKe_company',$hr->FKch_company)->get();
        $capacity = capacity::
            where(function ($query) use ($hr) {
                $query->where('FKcc_Create', 0)
                    ->orWhere('FKcc_Create', $hr->FKch_company);
            })
            ->whereNull('cc_userDelete')->get();
        $groupjob = groupjob::whereNull('gj_userDelete')->get();
        return view('frontend.company.graph.graph-sillks',compact('employee','capacity','groupjob'));
    }

    function companyScoreJob(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $employee = employee::leftjoin('departments','departments.d_id','employees.FKe_department')
            ->leftjoin('setting_positions','setting_positions.sp_id','employees.FKe_position')
            ->leftjoin('positions','positions.p_id','setting_positions.FKgsp_position')
            ->leftjoin('department_subs','department_subs.ds_id','employees.FKe_departmentSub')
            ->where('e_status',1)->where('FKe_company',$hr->FKch_company)->get();
        $setPosition = settingPosition::leftjoin('positions', 'positions.p_id', 'setting_positions.FKgsp_position')
            ->leftjoin('groupjobs', 'groupjobs.gj_id', 'setting_positions.FKgsp_groupJob')
            ->leftjoin('lavel_jobs', 'lavel_jobs.lj_id', 'setting_positions.FKgsp_lavel')
            // ->whereNull('sp_delete')->get();
            ->where('FKgsp_company',$hr->FKch_company)->whereNull('sp_delete')->get();
        $lavel = lavelJob::whereNull('lj_userDelete')->get();
        // dd($setPosition);
        return view('frontend.company.graph.score-job',compact('employee','setPosition','lavel'));
    }

    function companyScoreSillks(){
        return view('frontend.company.graph.score-sillks');
    }

    function searchCourse(){
        $course = course::join('type_course','type_course.tc_id','courses.FKcou_typeCourse')->whereNull('cou_userDelete')->get();
        $courseSkills = courseSkills::leftjoin('skills_subs','skills_subs.ss_id','course_skills.FKcs_skills')->whereNull('cou_userDelete')->get();
        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        $skills = skills::join('capacities','capacities.cc_id','skills.FKs_capacity')->where('FKs_Create',0)->whereNull('s_userDelete')->get();
        $skillsSubs = skillsSubs::where('FKss_Create',0)->whereNull('ss_userDelete')->get();
        $pp = DB::table('courses')->select('cou_organizer')->whereNull('cou_userDelete')->groupBy('cou_organizer')->get();
        $time = DB::table('courses')->select('cou_period')->whereNull('cou_userDelete')->groupBy('cou_period')->get();
        return view('frontend.company.search-course',compact('course','courseSkills','typeCourse','skills','skillsSubs','pp','time'));
    }

    function resultHrCourse(Request $request){
        $Sskills = $request->skills;
        $type = $request->course;
        $people = $request->people;
        $Stime = $request->time;
        
        $course = course::join('type_course', 'type_course.tc_id', 'courses.FKcou_typeCourse')
            ->leftjoin('course_skills', 'course_skills.FKcs_course', 'courses.cou_id')
            ->when(!empty($Sskills), function ($query) use ($Sskills) { $query->where('FKcs_skills', $Sskills); })
            ->when(!empty($type), function ($query) use ($type) { $query->where('FKcou_typeCourse', $type); })
            ->when(!empty($people), function ($query) use ($people) { $query->where('cou_organizer', $people); })
            ->when(!empty($Stime), function ($query) use ($Stime) { $query->where('cou_period', $Stime); })
            ->whereNull('course_skills.cou_userDelete')
            ->whereNull('courses.cou_userDelete')
            ->select(
                'course_skills.FKcs_course',
                'courses.cou_id',
                // 'courses.cou_detail',
                'type_course.tc_id', // เพิ่มคอลัมน์ที่ต้องการจาก type_course
                DB::raw('MAX(courses.cou_no) as cou_no'),
                DB::raw('MAX(courses.cou_name) as cou_name'),
                DB::raw('MAX(courses.cou_organizer) as cou_organizer'),
                DB::raw('MAX(courses.cou_period) as cou_period'),
                DB::raw('MAX(courses.cou_frequency) as cou_frequency'),
                DB::raw('MAX(courses.cou_detail) as cou_detail'),
                DB::raw('MAX(type_course.tc_name) as tc_name'),
            )
            ->groupBy(
                'course_skills.FKcs_course',
                'courses.cou_id',
                'type_course.tc_id', // เพิ่มคอลัมน์ที่ต้องการจาก type_course
            )
            ->get();
        $courseSkills = courseSkills::leftjoin('skills_subs','skills_subs.ss_id','course_skills.FKcs_skills')->whereNull('cou_userDelete')->get();

        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        $skills = skills::join('capacities','capacities.cc_id','skills.FKs_capacity')->where('FKs_Create',0)->whereNull('s_userDelete')->get();
        $skillsSubs = skillsSubs::where('FKss_Create',0)->whereNull('ss_userDelete')->get();
        // $pp = course::groupBy('cou_organizer')->get();
        $pp = DB::table('courses')->select('cou_organizer')->whereNull('cou_userDelete')->groupBy('cou_organizer')->get();
        $time = DB::table('courses')->select('cou_period')->whereNull('cou_userDelete')->groupBy('cou_period')->get();
        // dd(count($pp));
        // return view('frontend.company.search-course',compact('course','typeCourse','skills','skillsSubs','pp','time','Sskills','type','people','Stime','courseSkills'));
        return view('frontend.company.search-course',compact('course','courseSkills','typeCourse','skills','skillsSubs','pp','time','Sskills','type','people','Stime','courseSkills'));

    }

    function searchDepartment(Request $request){
        $ds = departmentSub::where('FKds_department',$request->input('department'))->get();
        $html = '<option value="">- กรุณาเลือกแผนกย่อย -</option>';
        if(!empty($ds)){
            foreach($ds as $_data){
                $html .= '<option value="'.$_data->ds_id.'">'.$_data->ds_name.'</option>';
               
            }
        }
        $data["html"] = $html;
        return json_encode($data);
    }

    function searchGroupJob(Request $request){
        $job = groupjob::join('type_job','type_job.tj_id','groupjobs.FKgj_typeJob')
        ->join('lavel_jobs','lavel_jobs.lj_id','groupjobs.FKgj_lavel')->where('gj_id',$request->job)->first();
        $response["detail"] = $job->gj_detail;
        $response["type"]   = $job->tj_name;
        $response["lavel"]  = $job->lj_name;
        return json_encode($response);      
    }
}
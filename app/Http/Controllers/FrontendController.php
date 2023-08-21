<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    function loginUser(){
        return view('frontend.person.loginUser');
    }

    function forgotPasswordUser(){
        return view('frontend.person.forgotPassword');
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

    function userStudyForm(){
        return view('frontend.person.study.userStudy-add');
    }

    function userStudyEdit(){
        return view('frontend.person.study.userStudy-edit');
    }

    function userHistory(){
        $user = User::join('employees','employees.FKe_userid','users.id')->find(\Auth::user()->id);
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        return view('frontend.person.userHistory',compact('user','provinces','amphures','districts'));
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

    function companyJobForm(){
        return view('frontend.company.job.job-add');
    }

    function companyJobEdit(){
        return view('frontend.company.job.job-edit');
    }

    function companyJobDetail(){
        return view('frontend.company.job.job-detail');
    }

    function companyJobCapa(){
        return view('frontend.company.job.capacity.capacity');
    }

    function companyJobCapaForm(){
        return view('frontend.company.job.capacity.capacity-add');
    }

    function companyJobCapaEdit(){
        return view('frontend.company.job.capacity.capacity-edit');
    }

    function companyJobSkills(){
        return view('frontend.company.job.skills.skills');
    }

    function companyJobSkillsForm(){
        return view('frontend.company.job.skills.skills-add');
    }

    function companyJobSkillsEdit(){
        return view('frontend.company.job.skills.skills-edit');
    }
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

    function user(){
        return view('frontend.company.person.user');
    }

    function userForm(){
        return view('frontend.company.person.user-add');
    }

    function userEdit(){
        return view('frontend.company.person.user-edit');
    }

    function userFile(){
        return view('frontend.company.person.user-file');
    }

    function cfUser(){
        return view('frontend.company.person.cfUser');
    }
    
    function cfUserDetail(){
        return view('frontend.company.person.cfUser-detail');
    }

    function cfUserEdit(){
        return view('frontend.company.person.cfUser-edit');
    }

    function manageSkills(){
        return view('frontend.company.manageSkills.manageSkills');
    }
    
    function manageSkillsForm(){
        return view('frontend.company.manageSkills.manageSkills-add');
    }

    function manageSkillsEdit(){
        return view('frontend.company.manageSkills.manageSkills-edit');
    }

    function manageSkillsDetail(){
        return view('frontend.company.manageSkills.manageSkills-detail');
    }

    function planSkills(){
        return view('frontend.company.plan.planSkills');
    }

    function planSkillsForm(){
        return view('frontend.company.plan.planSkills-add');
    }

    function planSkillsEdit(){
        return view('frontend.company.plan.planSkills-edit');
    }

    function cfSkills(){
        return view('frontend.company.manageSkills.cfSkills');
    }

    function cfSkillsDetail(){
        return view('frontend.company.manageSkills.cfSkills-detail');
    }

    function cfPlanSkills(){
        return view('frontend.company.plan.cfPlanSkills');
    }

    function cfPlanSkillsDetail(){
        return view('frontend.company.plan.cfPlanSkills-detail');
    }

    function setting(){
        return view('frontend.company.userHistory');
    }

    function companyGraphJob(){
        return view('frontend.company.graph.graph-job');
    }

    function companyGraphCapacity(){
        return view('frontend.company.graph.graph-capacity');
    }

    function companyGraphSillks(){
        return view('frontend.company.graph.graph-sillks');
    }

    function companyScoreJob(){
        return view('frontend.company.graph.score-job');
    }

    function companyScoreSillks(){
        return view('frontend.company.graph.score-sillks');
    }

    function searchCourse(){
        return view('frontend.company.search-course');
    }
}

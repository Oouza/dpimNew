<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    function loginCompany(){
        return view('frontend.manager.loginCompany');
    }

    function regiterCompany(){
        return view('frontend.manager.regiterCompany');
    }

    function success(){
        return view('frontend.manager.register-success');
    }

    function setting(){
        return view('frontend.manager.companySetting');
    }
    
    function indexManager(){
        return view('frontend.manager.scoreboard.indexManager');
    }

    function managerScoreSkillks(){
        return view('frontend.manager.scoreboard.score-sillks');
    }

    function managerGraphJob(){
        return view('frontend.manager.scoreboard.graph-job');
    }

    function managerGraphSkills(){
        return view('frontend.manager.scoreboard.graph-skills');
    }

    function managerEmployee(){
        return view('frontend.manager.employee.employee');
    }

    function managerEmployeeDetail(){
        return view('frontend.manager.employee.employee-detail');
    }

    // function managerEmployeeForm(){
    //     return view('frontend.manager.employee.employee-add');
    // }

    // function managerEmployeeEdit(){
    //     return view('frontend.manager.employee.employee-edit');
    // }

    function managerEmployeeCf(){
        return view('frontend.manager.employee.confirm.cfEmployee');
    }

    function managerEmployeeCfDetail(){
        return view('frontend.manager.employee.confirm.cfEmployee-detail');
    }

    function managerMangeSkills(){
        return view('frontend.manager.manageSkills.manageSkills');
    }

    function managerMangeSkillsDetail(){
        return view('frontend.manager.manageSkills.manageSkills-detail');
    }

    function managerPlanSkills(){
        return view('frontend.manager.manageSkills.planSkills');
    }

    function managerPlanSkillsDetail(){
        return view('frontend.manager.manageSkills.planSkills-datail');
    }

    function managerSearchCourse(){
        return view('frontend.manager.searchCourse');
    }
}

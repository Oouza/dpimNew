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
use App\Models\courseSkills;
use App\Models\typeCourse;
use App\Models\skills;
use App\Models\skillsSubs;
use App\Models\ceohr;
use Illuminate\Support\Facades\Hash;

class HrEmployeeController extends Controller
{    
    function user(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $employee = employee::join('departments','departments.d_id','employees.FKe_department')->where('FKe_company',$hr->FKch_company)->get();
        return view('frontend.company.person.user',compact('employee'));
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
}

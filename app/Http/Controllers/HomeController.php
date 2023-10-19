<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ceohr;
use App\Models\settingPosition;
use App\Models\employee;
use App\Models\lavelJob;
use App\Models\groupjob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //     return view('home');
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();

        if(\Auth::user()->status == '1' || \Auth::user()->status == '2' ){  // แอดมินน
            $user = User::join('employees','employees.FKe_userid','users.id')
            ->leftjoin('companies','companies.c_id','employees.FKe_company')->where('status',8)
            // ->groupBy('c_typeCompany')->select('companies.c_typeCompany')
            ->get();

            $lj = lavelJob::whereNull('lj_userDelete')->get();
            $groupjob = groupjob::whereNull('gj_userDelete')->get();
            
            return view('backend.graph.graph-job',compact('user','lj','groupjob'));
        }
        else if(\Auth::user()->status == '8' ){  // บุคลากร
            $user = User::join('employees','employees.FKe_userid','users.id')->find(\Auth::user()->id);
            return view('frontend.person.indexUser',compact('user'));
        }
        else if(\Auth::user()->status == '7' || \Auth::user()->status == '9'){  // บุคลากร
            $user = User::join('employees','employees.FKe_userid','users.id')->find(\Auth::user()->id);
            $company = DB::table('companies')->orderBy("c_id", 'ASC')->get();
            $department = DB::table('departments')->orderBy("d_id", 'ASC')->get();
            $departmentsub = DB::table('department_subs')->orderBy("ds_id", 'ASC')->get();
            $setting_positions = DB::table('setting_positions')->orderBy("sp_id", 'ASC')->get();
            $level_jobs = DB::table('lavel_jobs')->orderBy("lj_id", 'ASC')->get();
            $group = DB::table('groupjobs')->orderBy("gj_name", 'ASC')->get();
            return view('frontend.person.userHistory',compact('user','provinces','amphures','districts','company','department','departmentsub','setting_positions','level_jobs','group'));
        }else if(\Auth::user()->status == '3' ||\Auth::user()->status == '5'){  // HR+Manager
            $id = \Auth::user()->id;
            $hr = User::join('ceohrs','ceohrs.FKch_userid','users.id')
            ->join('companies','companies.c_id','ceohrs.FKch_company')
            ->where('users.id',$id)->first();
            
            $minerals = DB::table('type_minerals')->whereNull('tm_userDelete')->get();
            // dd($hr->ch_note);

            if($hr->ch_position=='HR'){
                return view('frontend.company.userHistory',compact('hr','minerals','provinces','amphures','districts'));
            }else if($hr->ch_position=='ผู้บริหาร'){
                return view('frontend.manager.companySetting',compact('hr','minerals','provinces','amphures','districts'));
            }
        }else if(\Auth::user()->status == '4'){  // HR+Manager
            $user = User::join('ceohrs','ceohrs.FKch_userid','users.id')
            ->join('companies','companies.c_id','ceohrs.FKch_company')
            ->join('provinces','provinces.id','companies.FKc_provinces')
            ->where('users.id',\Auth::user()->id)->first();
            // dd($user->ch_position);

            if($user->ch_position=='HR'){

                $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
                $gj = settingPosition::join('departments','departments.d_id','setting_positions.FKgsp_department')
                ->join('department_subs','department_subs.ds_id','setting_positions.FKgsp_departmentSub')
                ->join('positions','positions.p_id','setting_positions.FKgsp_position')
                ->join('lavel_jobs','lavel_jobs.lj_id','setting_positions.FKgsp_lavel')
                ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
                ->where('FKgsp_company',$hr->FKch_company)->whereNull('sp_delete')->get();
                return view('frontend.company.job.indexCompany',compact('user','gj'));

            }else if($user->ch_position=='ผู้บริหาร'){
                return view('frontend.manager.scoreboard.indexManager',compact('user'));
            }
        }else{
            \Auth::logout();
            return redirect('/')->with('message', 'การลงทะเบียนของคุณถูกยกเลิก กรุณาติดต่อเจ้าหน้าที่');
        }
        
    }
}

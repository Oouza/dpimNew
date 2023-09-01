<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\departments;
use App\Models\departmentSub;
use App\Models\position;
use App\Models\ceohr;
use App\Models\groupjob;
use App\Models\lavelJob;
use App\Models\typeJob;
use App\Models\settingPosition;
use App\Models\gjcapacity;
use App\Models\gjskills;
use App\Models\gjSkillsSub;
use App\Models\capacity;
use App\Models\skills;
use App\Models\skillsSubs;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DepartmentExport;
use App\Exports\DepartmentSubExport;
use App\Exports\PositionExport;

class HrJobController extends Controller
{
    function department(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $dp = departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')->get();
        return view('frontend.company.department.department',compact('dp'));
    }

    function departmentForm(){
        return view('frontend.company.department.department-add');
    }

    function departmentAdd(Request $request){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        // dd($hr->FKch_company);
        $departments = new departments;
        $departments->d_name        = $request->department_name;
        $departments->FKd_company   = $hr->FKch_company;
        $departments->save();

        $mes = 'Success';
        $yourURL= url('company/department');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function departmentEdit($id){
        $dp = departments::find($id);
        return view('frontend.company.department.department-edit',compact('dp'));
    }

    function departmentUpdate(Request $request, $id){
        $update = departments::find($id)->update([
            'd_name'      => $request->d_name,
        ]);

        $mes = 'Success';
        $yourURL= url('company/department');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function departmentDelete($id){
        $update = departments::find($id)->update([
            'd_delete'      => Auth::user()->name,
        ]);

        $mes = 'Success';
        $yourURL= url('company/department');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function exportDepartment() 
    {
        // $countries = typeJob::select('tj_no','tj_name')->get();
        return Excel::download(new DepartmentExport, 'department.xlsx');
    }

    function departmentSub(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $dps = departmentSub::join('departments','departments.d_id','department_subs.FKds_department')
        ->where('FKds_company',$hr->FKch_company)->whereNull('ds_delete')->get();
        return view('frontend.company.departmentSub.departmentSub',compact('dps'));
    }

    function departmentSubForm(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $dp = departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')->get();
        // dd($dp);
        return view('frontend.company.departmentSub.departmentSub-add',compact('dp'));
    }

    function departmentSubAdd(Request $request){
        // dd($request);
        // $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $dp = departments::find($request->department_name);
        // dd($dp);
        $departmentSub = new departmentSub;
        $departmentSub->ds_name             = $request->sub;
        $departmentSub->FKds_department     = $request->department_name;
        $departmentSub->ds_namedepartment   = $dp->d_name;
        $departmentSub->FKds_company        = $dp->FKd_company;
        $departmentSub->save();

        $mes = 'Success';
        $yourURL= url('company/departmentSub');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function departmentSubEdit($id){
        $dpSub = departmentSub::find($id);
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $dp = departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')->get();
        return view('frontend.company.departmentSub.departmentSub-edit',compact('dpSub','dp'));
    }

    function departmentSubUpdate(Request $request, $id){
        $dp = departments::find($request->mainId);

        $update = departmentSub::find($id)->update([
            'ds_name'      => $request->subName,
            'FKds_department'      => $request->mainId,
            'ds_namedepartment'      => $dp->d_name,
        ]);

        $mes = 'Success';
        $yourURL= url('company/departmentSub');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function departmentSubDelete($id){
        $update = departmentSub::find($id)->update([
            'ds_delete'      => Auth::user()->name,
        ]);

        $mes = 'Success';
        $yourURL= url('company/departmentSub');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function exportDepartmentSub(){
        // $countries = typeJob::select('tj_no','tj_name')->get();
        return Excel::download(new DepartmentSubExport, 'departmentSub.xlsx');
    }
    
    function position(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $position = position::where('FKp_company',$hr->FKch_company)->whereNull('p_delete')->orderBy('updated_at','desc')->get();
        return view('frontend.company.position.position',compact('position'));
    }    

    function positionForm(){
        return view('frontend.company.position.position-add');
    }

    function positionAdd(Request $request){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        // dd($hr->FKch_company);
        $position = new position;
        $position->p_name        = $request->po_name;
        $position->FKp_company   = $hr->FKch_company;
        $position->save();

        $mes = 'Success';
        $yourURL= url('company/position');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function positionEdit($id){
        $po = position::find($id);
        return view('frontend.company.position.position-edit',compact('po'));
    }

    function positionUpdate(Request $request, $id){
        $update = position::find($id)->update([
            'p_name'      => $request->poName,
        ]);

        $mes = 'Success';
        $yourURL= url('company/position');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function positionDelete($id){
        $update = position::find($id)->update([
            'p_delete'      => Auth::user()->name,
        ]);

        $mes = 'Success';
        $yourURL= url('company/position');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function exportPosition(){
        return Excel::download(new PositionExport, 'position.xlsx');
    }

    function companyJobForm(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $position = position::where('FKp_company',$hr->FKch_company)->whereNull('p_delete')->get();
        $dp = departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')->get();
        $gj = groupjob::whereNull('gj_userDelete')->get();
        $tj = typeJob::whereNull('tj_userDelete')->get();
        $lj = lavelJob::whereNull('lj_userDelete')->get();
        // dd($dp);
        return view('frontend.company.job.job-add',compact('position','dp','gj','tj','lj'));
    }

    function companyJobAdd(Request $request){
        // dd($reqsuest);
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $dp = departments::find($request->department);
        $dpSub = departmentSub::find($request->departmentSub);
        $pt = position::find($request->position);
        $gj = groupjob::find($request->job);
        $lj = lavelJob::find($gj->FKgj_lavel);
        $tj = typeJob::find($gj->FKgj_typeJob);

        $settingPosition = new settingPosition;
        $settingPosition->FKgsp_department      = $request->department;
        $settingPosition->sp_namedepartment     = $dp->d_name;
        $settingPosition->FKgsp_departmentSub   = $request->departmentSub;
        $settingPosition->sp_namedepartmentSub  = $dpSub->ds_name;
        $settingPosition->FKgsp_position        = $request->position;
        $settingPosition->sp_nameposition	    = $pt->p_name;
        $settingPosition->FKgsp_groupJob        = $request->job;
        $settingPosition->sp_namegroupJob       = $gj->gj_name;
        $settingPosition->sp_detail             = $gj->gj_detail;
        $settingPosition->FKgsp_typeJob         = $gj->FKgj_typeJob;
        $settingPosition->sp_nametypeJob        = $tj->tj_name;
        $settingPosition->FKgsp_lavel           = $gj->FKgj_lavel;
        $settingPosition->sp_namelavel          = $lj->lj_name;
        $settingPosition->FKgsp_company         = $hr->FKch_company;
        $settingPosition->save();

        $mes = 'Success';
        $yourURL= url('/home');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function companyJobEdit($id){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $sp = settingPosition::join('departments','departments.d_id','setting_positions.FKgsp_department')
        ->join('department_subs','department_subs.ds_id','setting_positions.FKgsp_departmentSub')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->join('lavel_jobs','lavel_jobs.lj_id','setting_positions.FKgsp_lavel')
        ->join('type_job','type_job.tj_id','setting_positions.FKgsp_typeJob')
        ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')->find($id);
        $dp = departments::where('FKd_company',$hr->FKch_company)->whereNull('d_delete')->get();
        $dpSub = departmentSub::where('FKds_company',$hr->FKch_company)->whereNull('ds_delete')->get();
        $gj = groupjob::whereNull('gj_userDelete')->get();
        // $tj = typeJob::whereNull('tj_userDelete')->get();
        // $lj = lavelJob::whereNull('lj_userDelete')->get();
        $position = position::where('FKp_company',$hr->FKch_company)->whereNull('p_delete')->get();
        // $gj = settingPosition::join('departments','departments.d_id','setting_positions.FKgsp_department')
        // ->join('department_subs','department_subs.ds_id','setting_positions.FKgsp_departmentSub')
        // ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        // ->join('lavel_jobs','lavel_jobs.lj_id','setting_positions.FKgsp_lavel')
        // ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        // ->where('FKgsp_company',$hr->FKch_company)->whereNull('sp_delete')->get();
        return view('frontend.company.job.job-edit',compact('sp','position','dp','dpSub','gj',));
    }

    function companyJobDetail($id){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $sp = settingPosition::join('departments','departments.d_id','setting_positions.FKgsp_department')
        ->join('department_subs','department_subs.ds_id','setting_positions.FKgsp_departmentSub')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->join('lavel_jobs','lavel_jobs.lj_id','setting_positions.FKgsp_lavel')
        ->join('type_job','type_job.tj_id','setting_positions.FKgsp_typeJob')
        ->join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')->find($id);

        $gjCapa = gjcapacity::join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')
            ->leftjoin('gjskills','gjskills.FKgjs_gjcapacity','gjcapacities.gjc_id')    
            ->leftjoin('skills','skills.s_id','gjskills.FKgjs_skills')    
            ->leftjoin('gj_skills_subs','gj_skills_subs.FKgjss_gjskills','gjskills.gjs_id')    
            ->leftjoin('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub') 
            ->where(function ($query) use ($hr) {
                $query->where('FKgjc_userCreate', 0)
                    ->orWhere('FKgjc_userCreate', $hr->FKch_company);
            })
        ->whereNull('gjc_userDelete')->whereNull('gjs_userDelete')->whereNull('gjss_userDelete')
        ->where('FKgjc_groupjob',$sp->FKgsp_groupJob)->orderBy('gjc_id','asc')
        ->orderBy('gjs_id','asc')
        ->orderBy('gjss_id','asc')->get();

        $gjSub = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
            ->rightjoin('gjskills','gjskills.gjs_id','gj_skills_subs.FKgjss_gjskills')
            ->join('skills','skills.s_id','gjskills.FKgjs_skills')
            ->rightjoin('gjcapacities','gjcapacities.gjc_id','gj_skills_subs.FKgjss_gjcapacity')            
            ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')            
            ->where('FKgjss_groupjob',$sp->gj_id)
            // ->where('FKgjss_userCreate',0)
            ->where(function ($query) use ($hr) {
                $query->where('FKgjss_userCreate', 0)
                    ->orWhere('FKgjss_userCreate', $hr->FKch_company);
            })
            ->whereNull('gjss_userDelete')->get();

        $gj = gjskills::join('skills','skills.s_id','gjskills.FKgjs_skills')
            ->join('gjcapacities','gjcapacities.gjc_id','gjskills.FKgjs_gjcapacity')
            ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->get();
        return view('frontend.company.job.job-detail',compact('sp','gjSub','gjCapa','gj','gjCapa'));
    }

    function companyJobUpdate(Request $request, $id){
        // dd($request);

        $dp = departments::find($request->department);
        $dpSub = departmentSub::find($request->departmentSub);
        $pt = position::find($request->position);
        // $gj = groupjob::find($request->job);
        // $lj = lavelJob::find($gj->FKgj_lavel);
        // $tj = typeJob::find($gj->FKgj_typeJob);

        $update = settingPosition::find($id)->update([
            'FKgsp_department'      => $request->department,
            'sp_namedepartment'     => $dp->d_name,
            'FKgsp_departmentSub'   => $request->departmentSub,
            'sp_namedepartmentSub'  => $dpSub->ds_name,
            'FKgsp_position'        => $request->position,
            'sp_nameposition'       => $pt->p_name,
            // 'FKgsp_groupJob'        => $request->job,
            // 'sp_namegroupJob'       => $gj->gj_name,
            // 'sp_detail'             => $gj->gj_detail,
            // 'FKgsp_typeJob'         => $gj->FKgj_typeJob,
            // 'sp_nametypeJob'        => $tj->tj_name,
            // 'FKgsp_lavel'           => $gj->FKgj_lavel,
            // 'sp_namelavel'          => $lj->lj_name,
        ]);

        $mes = 'Success';
        $yourURL= url('/home');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function companyJobDelete($id){
        $update = settingPosition::find($id)->update([
            'sp_delete'      => Auth::user()->name,
        ]);
    }

    function companyJobCapa($id){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $gj = settingPosition::join('positions','positions.p_id','setting_positions.FKgsp_position')->find($id);
        $gjc = gjcapacity::join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')
        ->where('FKgjc_groupjob',$gj->FKgsp_groupJob)
        ->where(function ($query) use ($hr) {
                $query->where('FKgjc_userCreate', 0)
                    ->orWhere('FKgjc_userCreate', $hr->FKch_company);
            })
        ->whereNull('gjc_userDelete')
        ->get();
        return view('frontend.company.job.capacity.capacity',compact('gjc','gj'));
    }

    function companyJobCapaForm($id){
        // dd($id);
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $gj = settingPosition::join('positions','positions.p_id','setting_positions.FKgsp_position')->find($id);

        $capacity = capacity::
        where(function ($query) use ($hr) {
            $query->where('FKcc_Create', 0)
                ->orWhere('FKcc_Create', $hr->FKch_company);
        })
        ->whereNull('cc_userDelete')
        ->get();
        // ->where('FKcc_Create',0)->orWhere('FKcc_Create',$hr->FKch_company)

        $ct = capacity::all();
        return view('frontend.company.job.capacity.capacity-add',compact('capacity','gj','ct'));
    }

    function companyJobCapaAdd(Request $request, $id){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $ct = capacity::all();
        $number = count($ct)+1;
        $no = str_pad($number, 3, "0", STR_PAD_LEFT);
        $sp = settingPosition::join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')->find($id);

        // dd($request);

        if($request->capacity == 0){
            $capacity                   = new capacity;
            $capacity->cc_no            = $no;
            $capacity->cc_name          = $request->name;
            $capacity->cc_detail        = $request->capacity_detail;
            $capacity->FKcc_Create      = $hr->FKch_company;
            $capacity->cc_userCreate    = Auth::user()->name;
            $capacity->cc_userUpdate    = Auth::user()->name;
            $capacity->save();

            $last = DB::table('capacities')->latest('cc_id')->first();

            $gjcapacity = new gjcapacity;
            $gjcapacity->FKgjc_capacity   = $last->cc_id;
            $gjcapacity->gjc_namecapacity = $last->cc_name;
            $gjcapacity->gjc_important    = $request->important;
            $gjcapacity->FKgjc_groupjob   = $sp->FKgsp_groupJob;
            $gjcapacity->gjc_namegroupjob = $sp->gj_name;
            $gjcapacity->FKgjc_userCreate = $hr->FKch_company;
            $gjcapacity->gjc_userCreate   = Auth::user()->name;
            $gjcapacity->gjc_userUpdate   = Auth::user()->name;
            $gjcapacity->save();

            $mes = 'Success';
            $yourURL= url('company/job/capacity/'.$id);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }else{
            $cc = capacity::find($request->capacity);

            $gjcapacity = new gjcapacity;
            $gjcapacity->FKgjc_capacity   = $request->capacity;
            $gjcapacity->gjc_namecapacity = $cc->cc_name;
            $gjcapacity->gjc_important    = $request->important;
            $gjcapacity->FKgjc_groupjob   = $sp->FKgsp_groupJob;
            $gjcapacity->gjc_namegroupjob = $sp->gj_name;
            $gjcapacity->FKgjc_userCreate = $hr->FKch_company;
            $gjcapacity->gjc_userCreate   = Auth::user()->name;
            $gjcapacity->gjc_userUpdate   = Auth::user()->name;
            $gjcapacity->save();

            $mes = 'Success';
            $yourURL= url('company/job/capacity/'.$id);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
    }

    function companyJobCapaEdit($id, $spId){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $ct = capacity::all();
        $sp = settingPosition::find($spId);
        $gjc = gjcapacity::join('groupjobs','groupjobs.gj_id','gjcapacities.FKgjc_groupjob')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->find($id);
        $capacity = capacity::
        where(function ($query) use ($hr) {
            $query->where('FKcc_Create', 0)
                ->orWhere('FKcc_Create', $hr->FKch_company);
        })
        ->whereNull('cc_userDelete')
        ->get();
        return view('frontend.company.job.capacity.capacity-edit',compact('gjc','capacity','sp','id','spId','ct'));
    }

    function companyJobCapaUpdate(Request $request, $id, $spId){
        // dd($request);
        if($request->capacity_select == 0){
            $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
            $ct = capacity::all();
            $number = count($ct)+1;
            $no = str_pad($number, 3, "0", STR_PAD_LEFT);
            // dd('Add Capacity');
            $capacity                   = new capacity;
            $capacity->cc_no            = $no;
            $capacity->cc_name          = $request->name;
            $capacity->cc_detail        = $request->capacity_detail;
            $capacity->FKcc_Create      = $hr->FKch_company;
            $capacity->cc_userCreate    = Auth::user()->name;
            $capacity->cc_userUpdate    = Auth::user()->name;
            $capacity->save();

            $last = DB::table('capacities')->latest('cc_id')->first();

            $update = gjcapacity::find($id)->update([
                'FKgjc_capacity'      => $last->cc_id,
                'gjc_namecapacity'    => $request->name,
                'gjc_important'       => $request->important,
                'gjc_userUpdate'      => Auth::user()->name,
            ]);
            $mes = 'Success';
            $yourURL= url('company/job/capacity/'.$spId);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
        else{
            $ct = capacity::find($request->capacity_select);

            if($ct->FKcc_Create == 0){
                // dd('update capacity from admin');
                $update = gjcapacity::find($id)->update([
                    'FKgjc_capacity'      => $request->capacity_select,
                    'gjc_namecapacity'    => $ct->cc_name,
                    'gjc_important'       => $request->important,
                    'gjc_userUpdate'      => Auth::user()->name,
                ]);
                $mes = 'Success';
                $yourURL= url('company/job/capacity/'.$spId);
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }else{
                // dd('update capacity from company');
                $update = capacity::find($request->capacity_select)->update([
                    'cc_name'       =>  $request->capacity_name,
                    'cc_detail'     =>  $request->HRcapacity_detail,
                    'cc_userUpdate' =>  Auth::user()->name
                ]);

                $update = gjcapacity::find($id)->update([
                    'FKgjc_capacity'      => $request->capacity_select,
                    'gjc_namecapacity'    => $ct->capacity_name,
                    'gjc_important'       => $request->important,
                    'gjc_userUpdate'      => Auth::user()->name,
                ]);
                $mes = 'Success';
                $yourURL= url('company/job/capacity/'.$spId);
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }
        }
    }

    function companyJobCapaDel($id){
        $gjc = gjcapacity::find($id);

        $update = gjcapacity::find($id)->update([
            'gjc_userDelete'      => Auth::user()->name,
        ]);

        $mes = 'Success';
        $yourURL= url('company/job/capacity/'.$gjc->FKgjc_groupjob);
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function companyJobSkills($id, $spId){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $sp = settingPosition::join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->find($spId);
        $gjc = gjcapacity::join('groupjobs','groupjobs.gj_id','gjcapacities.FKgjc_groupjob')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->where('gjcapacities.gjc_id',$id)->first();
        // $gj = gjcapacity::find($id);
        // dd($gj);
        
        $gjskills = gjskills::join('skills','skills.s_id','gjskills.FKgjs_skills')
        ->where('FKgjs_gjcapacity',$id)
        // ->where('FKgjs_userCreate',0)
        ->where(function ($query) use ($hr) {
            $query->where('FKgjs_userCreate', 0)
                ->orWhere('FKgjs_userCreate', $hr->FKch_company);
        })
        ->whereNull('gjs_userDelete')
        ->get();

        $gjSkillsSub = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
        ->where('FKgjss_gjcapacity',$id)
        ->where(function ($query) use ($hr) {
            $query->where('FKgjss_userCreate', 0)
                ->orWhere('FKgjss_userCreate', $hr->FKch_company);
        })
        ->whereNull('gjss_userDelete')
        ->get();  
        return view('frontend.company.job.skills.skills',compact('sp','gjc','gjskills','gjSkillsSub'));
    }

    function companyJobSkillsForm($id, $spId){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $sp = settingPosition::join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->find($spId);

        $gjc = gjcapacity::join('groupjobs','groupjobs.gj_id','gjcapacities.FKgjc_groupjob')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->where('gjcapacities.gjc_id',$id)->first();

        $skills = skills::
        where(function ($query) use ($hr) {
            $query->where('FKs_Create', 0)
                ->orWhere('FKs_Create', $hr->FKch_company);
        })
        ->where('FKs_capacity',$gjc->FKgjc_capacity)->whereNull('s_userDelete')->get();
        
        $skillsTotal = skills::all();
        return view('frontend.company.job.skills.skills-add',compact('sp','gjc','skills','skillsTotal'));
    }

    function companyJobSkillsAdd(Request $request, $gjcId, $spId){
        // dd($request);
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $skillsTotal = skills::all();
        $number = count($skillsTotal)+1;
        $no = str_pad($number, 3, "0", STR_PAD_LEFT);
        $gjc = gjcapacity::find($gjcId);
        if($request->skills == 0){

            $skills                  = new skills;
            $skills->s_no            = $no;
            $skills->s_name          = $request->skills_name;
            $skills->s_detail        = $request->ss_detail;
            $skills->FKs_capacity    = $gjc->FKgjc_capacity;
            $skills->FKs_Create      = $hr->FKch_company;
            $skills->s_userCreate    = Auth::user()->name;
            $skills->s_userUpdate    = Auth::user()->name;
            $skills->save();

            $last = DB::table('skills')->latest('s_id')->first();

            $gjskills = new gjskills;
            $gjskills->FKgjs_skills     = $last->s_id;
            $gjskills->gjs_nameskills	= $request->skills_name;
            $gjskills->FKgjs_gjcapacity = $gjcId;
            $gjskills->FKgjs_groupjob   = $gjc->FKgjc_groupjob;
            $gjskills->FKgjs_userCreate = $hr->FKch_company;
            $gjskills->gjs_userCreate   = Auth::user()->name;
            $gjskills->gjs_userUpdate   = Auth::user()->name;
            $gjskills->save();

            $mes = 'Success';
            $yourURL= url('company/job/skills/'.$gjcId.'/'.$spId);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
        else{
            $ss = skills::find($request->skills);
            
            $gjskills = new gjskills;
            $gjskills->FKgjs_skills     = $request->skills;
            $gjskills->gjs_nameskills	= $ss->s_name;
            $gjskills->FKgjs_gjcapacity = $gjcId;
            $gjskills->FKgjs_groupjob   = $gjc->FKgjc_groupjob;
            $gjskills->FKgjs_userCreate = $hr->FKch_company;
            $gjskills->gjs_userCreate   = Auth::user()->name;
            $gjskills->gjs_userUpdate   = Auth::user()->name;
            $gjskills->save();

            $mes = 'Success';
            $yourURL= url('company/job/skills/'.$gjcId.'/'.$spId);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
    }

    function companyJobSkillsEdit($id, $spId){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();

        $sp = settingPosition::join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->find($spId);

        $gjs = gjskills::join('gjcapacities','gjcapacities.gjc_id','gjskills.FKgjs_gjcapacity')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')
        ->join('skills','skills.s_id','gjskills.FKgjs_skills')->find($id);

        $skills = skills::
        where(function ($query) use ($hr) {
            $query->where('FKs_Create', 0)
                ->orWhere('FKs_Create', $hr->FKch_company);
        })
        ->where('FKs_capacity',$gjs->FKgjc_capacity)->whereNull('s_userDelete')->get();
        
        $skillsTotal = skills::all();

        return view('frontend.company.job.skills.skills-edit',compact('skills','skillsTotal','gjs','sp'));
    }

    function companyJobSkillsUpdate(Request $request, $gjsId, $spId){
        $gjSkills = gjskills::join('gjcapacities','gjcapacities.gjc_id','gjskills.FKgjs_gjcapacity')->find($gjsId);
        // dd($request);
        if($request->skills == 0){
            $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
            $ct = skills::all();
            $number = count($ct)+1;
            $no = str_pad($number, 3, "0", STR_PAD_LEFT);
            // dd('Add Capacity');
            $skills                  = new skills;
            $skills->s_no            = $no;
            $skills->s_name          = $request->sName;
            $skills->s_detail        = $request->ssNew_detail;
            $skills->FKs_capacity    = $gjSkills->FKgjc_capacity;
            $skills->FKs_Create      = $hr->FKch_company;
            $skills->s_userCreate    = Auth::user()->name;
            $skills->s_userUpdate    = Auth::user()->name;
            $skills->save();

            $last = DB::table('skills')->latest('s_id')->first();

            $update = gjskills::find($gjsId)->update([
                'FKgjs_skills'      => $last->s_id,
                'gjs_nameskills'    => $request->sName,
                'gjs_userUpdate'      => Auth::user()->name,
            ]);
            $mes = 'Success';
            $yourURL= url('company/job/skills/'.$gjSkills->gjc_id.'/'.$spId);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
        else{
            $skills = skills::find($request->skills);

            if($skills->FKs_Create == 0){
                // dd('update capacity from admin');
                $update = gjskills::find($gjsId)->update([
                    'FKgjs_skills'      => $request->skills,
                    'gjs_nameskills'    => $skills->s_name,
                    'gjs_userUpdate'      => Auth::user()->name,
                ]);
                $mes = 'Success';
                $yourURL= url('company/job/skills/'.$gjSkills->gjc_id.'/'.$spId);
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }else{
                // dd('update capacity from company');
                $update = skills::find($request->skills)->update([
                    's_name'       =>  $request->skills_name,
                    's_detail'     =>  $request->ss_detail,
                    's_userUpdate' =>  Auth::user()->name
                ]);

                $update = gjskills::find($gjsId)->update([
                    'FKgjs_skills'      => $request->skills,
                    'gjs_nameskills'    => $request->skills_name,
                    'gjs_userUpdate'    => Auth::user()->name,
                ]);
                $mes = 'Success';
                $yourURL= url('company/job/skills/'.$gjSkills->gjc_id.'/'.$spId);
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }
        }
    }

    function jobSkillsDelete($id){
        $update = gjskills::find($id)->update([
            'gjs_userDelete'    => Auth::user()->name,
        ]);
    }

    function companyJobSkillsSub($GJS, $spId){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $sp = settingPosition::join('groupjobs','groupjobs.gj_id','setting_positions.FKgsp_groupJob')
        ->join('positions','positions.p_id','setting_positions.FKgsp_position')
        ->find($spId);

        $gjs = gjskills::join('gjcapacities','gjcapacities.gjc_id','gjskills.FKgjs_gjcapacity')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')
        ->join('skills','skills.s_id','gjskills.FKgjs_skills')->find($GJS);

        $skillsSubGJ = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
        ->where('FKgjss_gjskills',$GJS)
        // ->where('FKgjss_userCreate',0)
        ->where(function ($query) use ($hr) {
            $query->where('FKgjss_userCreate', 0)
                ->orWhere('FKgjss_userCreate', $hr->FKch_company);
        })
        ->whereNull('gjss_userDelete')
        ->get();

        // $skillsSubGJ = gjSkillsSub::where('gjSkillsSub',$GJS)->get();

        return view('frontend.company.job.skillsSub.skillsSub',compact('sp', 'gjs', 'skillsSubGJ'));
    }

    function companyJobSkillsSubForm($gjsId, $spId) {
        $hr = ceohr::where('FKch_userid', Auth::user()->id)->first();
        
        $gjs = gjskills::join('gjcapacities', 'gjcapacities.gjc_id', 'gjskills.FKgjs_gjcapacity')
            ->join('capacities', 'capacities.cc_id', 'gjcapacities.FKgjc_capacity')
            ->join('skills', 'skills.s_id', 'gjskills.FKgjs_skills')
            ->find($gjsId);
        
        $sp = settingPosition::join('groupjobs', 'groupjobs.gj_id', 'setting_positions.FKgsp_groupJob')
            ->join('positions', 'positions.p_id', 'setting_positions.FKgsp_position')
            ->find($spId);
        
        $skillsSubstotal = skillsSubs::all();
        
        $skillsSub = skillsSubs::where('FKss_skills', $gjs->FKgjs_skills)
            ->where(function ($query) use ($hr) {
                $query->where('FKss_Create', 0)
                    ->orWhere('FKss_Create', $hr->FKch_company);
            })
            ->whereNull('ss_userDelete')
            ->get();
        
        return view('frontend.company.job.skillsSub.skillsSub-add', compact('sp', 'gjs', 'skillsSub', 'skillsSubstotal'));
    }

    function companyJobSkillsSubAdd(Request $request, $gjsId, $spId){
        // dd($request);
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();

        $ssTotal = skillsSubs::all();
        $number = count($ssTotal)+1;
        $no = str_pad($number, 3, "0", STR_PAD_LEFT);

        $gjs = gjskills::join('gjcapacities','gjcapacities.gjc_id','gjskills.FKgjs_gjcapacity')->find($gjsId);

        if($request->skills == 0){

            $skillsSubs                   = new skillsSubs;
            $skillsSubs->ss_no            = $no;
            $skillsSubs->ss_name          = $request->skills_name;
            $skillsSubs->ss_detail        = $request->ss_detail;
            $skillsSubs->ss_standardOne   = $request->lavel1;
            $skillsSubs->ss_standardTwo   = $request->lavel2;
            $skillsSubs->ss_standardThree = $request->lavel3;
            $skillsSubs->FKss_skills      = $gjs->FKgjs_skills;
            $skillsSubs->FKss_capacity    = $gjs->FKgjc_capacity;
            $skillsSubs->FKss_Create      = $hr->FKch_company;
            $skillsSubs->ss_userCreate    = Auth::user()->name;
            $skillsSubs->ss_userUpdate    = Auth::user()->name;
            $skillsSubs->save();

            $last = DB::table('skills_subs')->latest('ss_id')->first();

            $gjSkillsSub = new gjSkillsSub;
            $gjSkillsSub->FKgjss_skillsSub   = $last->ss_id;
            $gjSkillsSub->gjss_nameskillsSub = $request->skills_name;
            $gjSkillsSub->FKgjss_gjskills    = $gjsId;
            $gjSkillsSub->FKgjss_gjcapacity  = $gjs->FKgjs_gjcapacity;
            $gjSkillsSub->FKgjss_groupjob    = $gjs->FKgjs_groupjob;
            $gjSkillsSub->FKgjss_userCreate  = $hr->FKch_company;
            $gjSkillsSub->gjss_userCreate    = Auth::user()->name;
            $gjSkillsSub->gjss_userUpdate    = Auth::user()->name;
            $gjSkillsSub->save();

            $mes = 'Success';
            $yourURL= url('company/job/skillsSub/'.$gjsId.'/'.$spId);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
        else{
            $ss = skillsSubs::find($request->skills);
            
            $gjSkillsSub = new gjSkillsSub;
            $gjSkillsSub->FKgjss_skillsSub   = $request->skills;
            $gjSkillsSub->gjss_nameskillsSub = $ss->ss_name;
            $gjSkillsSub->FKgjss_gjskills    = $gjsId;
            $gjSkillsSub->FKgjss_gjcapacity  = $gjs->FKgjs_gjcapacity;
            $gjSkillsSub->FKgjss_groupjob    = $gjs->FKgjs_groupjob;
            $gjSkillsSub->FKgjss_userCreate  = $hr->FKch_company;
            $gjSkillsSub->gjss_userCreate    = Auth::user()->name;
            $gjSkillsSub->gjss_userUpdate    = Auth::user()->name;
            $gjSkillsSub->save();

            $mes = 'Success';
            $yourURL= url('company/job/skillsSub/'.$gjsId.'/'.$spId);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
    }

    function companyJobSkillsSubEdit($gjssId, $spId) {
        $hr = ceohr::where('FKch_userid', Auth::user()->id)->first();
        
        $gjss = gjSkillsSub::join('gjskills', 'gjskills.gjs_id', 'gj_skills_subs.FKgjss_gjskills')
            // ->join('capacities', 'capacities.cc_id', 'gjcapacities.FKgjc_capacity')
            ->join('skills', 'skills.s_id', 'gjskills.FKgjs_skills')
            ->join('skills_subs', 'skills_subs.ss_id', 'gj_skills_subs.FKgjss_skillsSub')
            ->find($gjssId);
        
        $sp = settingPosition::join('groupjobs', 'groupjobs.gj_id', 'setting_positions.FKgsp_groupJob')
            ->join('positions', 'positions.p_id', 'setting_positions.FKgsp_position')
            ->find($spId);
        
        $skillsSubstotal = skillsSubs::all();
        
        $skillsSub = skillsSubs::where('FKss_skills', $gjss->FKgjs_skills)
            ->where(function ($query) use ($hr) {
                $query->where('FKss_Create', 0)
                    ->orWhere('FKss_Create', $hr->FKch_company);
            })
            ->whereNull('ss_userDelete')
            ->get();
        
        return view('frontend.company.job.skillsSub.skillsSub-edit', compact('sp', 'gjss', 'skillsSub', 'skillsSubstotal'));
    }

    function companyJobSkillsSubUpdate(Request $request, $gjssId, $spId){
        $gjss = gjSkillsSub::join('gjskills','gjskills.gjs_id','gj_skills_subs.FKgjss_gjskills')
        ->join('gjcapacities','gjcapacities.gjc_id','gjskills.FKgjs_gjcapacity')->find($gjssId);
        // dd($request);
        if($request->skills == 0){
            $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
            $sst = skillsSubs::all();
            $number = count($sst)+1;
            $no = str_pad($number, 3, "0", STR_PAD_LEFT);
            // dd('Add Capacity');
            $skillsSubs                   = new skillsSubs;
            $skillsSubs->ss_no            = $no;
            $skillsSubs->ss_name          = $request->sName;
            $skillsSubs->ss_detail        = $request->ssNew_detail;
            $skillsSubs->ss_standardOne   = $request->lavel1;
            $skillsSubs->ss_standardTwo   = $request->lavel2;
            $skillsSubs->ss_standardThree = $request->lavel3;
            $skillsSubs->FKss_skills      = $gjss->FKgjs_skills;
            $skillsSubs->FKss_capacity    = $gjss->FKgjc_capacity;
            $skillsSubs->FKss_Create      = $hr->FKch_company;
            $skillsSubs->ss_userCreate    = Auth::user()->name;
            $skillsSubs->ss_userUpdate    = Auth::user()->name;
            $skillsSubs->save();

            $last = DB::table('skills_subs')->latest('ss_id')->first();

            $update = gjSkillsSub::find($gjssId)->update([
                'FKgjss_skillsSub'      => $last->ss_id,
                'gjss_nameskillsSub'    => $request->sName,
                'gjss_userUpdate'       => Auth::user()->name,
            ]);
            $mes = 'Success';
            $yourURL= url('company/job/skillsSub/'.$gjss->gjs_id.'/'.$spId);
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
        else{
            $skillsSub = skillsSubs::find($request->skills);

            if($skillsSub->FKss_Create == 0){
                // dd('update capacity from admin');
                $update = gjSkillsSub::find($gjssId)->update([
                    'FKgjss_skillsSub'      => $request->skills,
                    'gjss_nameskillsSub'    => $skillsSub->s_name,
                    'gjss_userUpdate'       => Auth::user()->name,
                ]);
                $mes = 'Success';
                $yourURL= url('company/job/skillsSub/'.$gjss->gjs_id.'/'.$spId);
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }else{
                // dd('update capacity from company');
                $update = skillsSubs::find($request->skills)->update([
                    'ss_name'           =>  $request->skillsOld_name,
                    'ss_detail'         =>  $request->editor,
                    'ss_standardOne'    =>  $request->lavelOld1,
                    'ss_standardTwo'    =>  $request->lavelOld2,
                    'ss_standardThree'  =>  $request->lavelOld3,
                    'ss_userUpdate'     =>  Auth::user()->name,
                ]);

                $update = gjSkillsSub::find($gjssId)->update([
                    'FKgjss_skillsSub'      => $request->skills,
                    'gjss_nameskillsSub'    => $request->skillsOld_name,
                    'gjss_userUpdate'       => Auth::user()->name,
                ]);

                $mes = 'Success';
                $yourURL= url('company/job/skillsSub/'.$gjss->gjs_id.'/'.$spId);
                echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
            }
        }
    }

    function hrJobSkillsSubDel($id){
        $update = gjSkillsSub::find($id)->update([
            'gjss_userDelete'      => Auth::user()->name,
        ]);
    }

    function searchHrCapacity(Request $request){
        $capacity = capacity::find($request->capacity);
        $response["detail"]  = $capacity->cc_detail;
        $response["no"]  = $capacity->cc_no;
        $response["name"]  = $capacity->cc_name;
        $response["user"]  = $capacity->FKcc_Create;
        return json_encode($response);      
    }

    function searchHrSkills(Request $request){
        $skills = skills::find($request->skills);
        
        $response = $skills->s_detail;
        return json_encode($response);      
    }

    function searchHrSkillsDetail(Request $request){
        $skills = skills::find($request->skills);
        $response["detail"]  = $skills->s_detail;
        $response["no"]  = $skills->s_no;
        $response["name"]  = $skills->s_name;
        $response["user"]  = $skills->FKs_Create;
        // $response = $skills->s_detail;
        return json_encode($response);    
    }

    function searchHrSkillsSub(Request $request){
        $skillsSubs = skillsSubs::find($request->skills);
        
        // $response = $skillsSubs->ss_detail;
        $response["detail"] = $skillsSubs->ss_detail;
        $response["standardOne"] = $skillsSubs->ss_standardOne;
        $response["standardTwo"]  = $skillsSubs->ss_standardTwo;
        $response["standardThree"]  = $skillsSubs->ss_standardThree;
        return json_encode($response);      
    }

    function searchHrSkillsSubDetail(Request $request){
        $skills = skillsSubs::find($request->skills);
        $response["detail"]  = $skills->ss_detail;
        $response["no"]  = $skills->ss_no;
        $response["name"]  = $skills->ss_name;
        $response["user"]  = $skills->FKss_Create;
        $response["lavel1"]  = $skills->ss_standardOne;
        $response["lavel2"]  = $skills->ss_standardTwo;
        $response["lavel3"]  = $skills->ss_standardThree;
        // $response = $skills->s_detail;
        return json_encode($response);    
    }
}

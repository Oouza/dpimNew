<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\departments;
use App\Models\departmentSub;
use App\Models\position;
use App\Models\ceohr;
use Illuminate\Support\Facades\Hash;

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
    
    function position(){
        $hr = ceohr::where('FKch_userid',Auth::user()->id)->first();
        $position = position::where('FKp_company',$hr->FKch_company)->whereNull('p_delete')->get();
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
}

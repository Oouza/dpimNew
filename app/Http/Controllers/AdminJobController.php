<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Models\typeJob;
use App\Models\lavelJob;
use App\Models\User;
use App\Exports\TypeJobExport;
use App\Exports\LavelJobExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\typeJobImport;

class AdminJobController extends Controller
{
    // function index(){
    //     return view('backend.job.index');
    // }

    function job(){
        return view('backend.job.job');
    }

    function jobForm(){
        return view('backend.job.job-add');
    }

    function jobAdd(Request $request){
        dd($request);
        return view('backend.job.job-add');
    }

    function jobEdit(){
        return view('backend.job.job-edit');
    }

    function jobUpdate(Request $request){
        dd($request);
        return view('backend.job.job-edit');
    }

    function jobDetail(){
        return view('backend.job.job-detail');
    }

    function jobCapacity(){
        return view('backend.job.capacity.jobCapa');
    }

    function jobCapacityForm(){
        return view('backend.job.capacity.jobCapa-add');
    }

    function jobCapacityAdd(Request $requesr){
        dd($requesr);
        return view('backend.job.capacity.jobCapa-add');
    }

    function jobCapacityEdit(){
        return view('backend.job.capacity.jobCapa-edit');
    }

    function jobCapacityUpdate(Request $requesr){
        dd($requesr);
        return view('backend.job.capacity.jobCapa-add');
    }

    function jobskills(){
        return view('backend.job.skills.jobSkills');
    }

    function jobskillsForm(){
        return view('backend.job.skills.jobSkills-add');
    }

    function jobskillsEdit(){
        return view('backend.job.skills.jobSkills-edit');
    }

    function typeJob(){
        $typeJob = typeJob::whereNull('tj_userDelete')->get();
        return view('backend.job.typeJob.typeJob',compact('typeJob'));
    }

    function typeJobForm(){
        return view('backend.job.typeJob.typeJob-add');
    }
    
    function typeJobAdd(Request $request){
        // $name = Auth::user()->name;
        // $name = Auth::user()->name;
        // dd($request);

        $typeJob = new typeJob;
        $typeJob->tj_no = $request->jobTypeId;
        $typeJob->tj_name = $request->jobTypeName;
        $typeJob->tj_userCreate = Auth::user()->name;
        $typeJob->tj_userUpdate = Auth::user()->name;
        $typeJob->save();

        $mes = 'Success';
        $yourURL= url('backend/typeJob');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function typeJobEdit($id){
        $typeJob = typeJob::find($id);
        return view('backend.job.typeJob.typeJob-edit',compact('id','typeJob'));
    }

    function typeJobUpdate(Request $request, $id){
        // dd($request);

        $update = typeJob::find($id)->update([
            'tj_no'         =>  $request->jobTypeId,
            'tj_name'       =>  $request->jobTypeName,
            'tj_userUpdate' =>  Auth::user()->name
        ]);
        // $typeJob = new typeJob;
        // $typeJob->tj_no = $request->jobTypeId;
        // $typeJob->tj_name = $request->jobTypeName;
        // $typeJob->tj_userCreate = Auth::user()->name;
        // $typeJob->tj_userUpdate = Auth::user()->name;
        // $typeJob->save();

        $mes = 'Success';
        $yourURL= url('backend/typeJob');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function typeJobDel($id){
        // dd($id);
        $update = typeJob::find($id)->update([
            'tj_userDelete' =>  Auth::user()->name
        ]);
    }

    function typeJobFile(){
        return view('backend.job.typeJob.typeJob-file');
    }

    function typeJobUp(Request $request){
        // if(!empty($request->file_typeJob)){
        //     dd(1);
        // }else{
        //     dd(2);
        // }
        // return view('backend.job.typeJob.typeJob-file');
        Excel::import(new typeJobImport, $request->file_typeJob);
        $mes = 'Success';
        $yourURL= url('backend/typeJob');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function exportTypeJob() 
    {
        // $countries = typeJob::select('tj_no','tj_name')->get();
        return Excel::download(new TypeJobExport, 'typeJob.xlsx');
    }

    function lavelJob(){
        $lavelJob = lavelJob::whereNull('lj_userDelete')->get();
        return view('backend.job.lavel.lavelJob',compact('lavelJob'));
    }

    function lavelJobForm(){
        return view('backend.job.lavel.lavelJob-add');
    }
    
    function lavelJobAdd(Request $request){
        // dd($request);

        $lavelJob = new lavelJob;
        $lavelJob->lj_no = $request->lavelId;
        $lavelJob->lj_name = $request->lavelName;
        $lavelJob->lj_userCreate = Auth::user()->name;
        $lavelJob->lj_userUpdate = Auth::user()->name;
        $lavelJob->save();

        $mes = 'Success';
        $yourURL= url('backend/lavelJob');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function lavelJobEdit($id){
        $lavelJob = lavelJob::find($id);
        return view('backend.job.lavel.lavelJob-edit',compact('lavelJob','id'));
    }

    function lavelJobUpdate(Request $request, $id){
        // dd($request, $id);
        $update = lavelJob::find($id)->update([
            'lj_no'         =>  $request->lavelId,
            'lj_name'       =>  $request->lavelName,
            'lj_userUpdate' =>  Auth::user()->name
        ]);

        $mes = 'Update Success';
        $yourURL= url('backend/lavelJob');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function lavelJobDel($id){
        // dd($request, $id);
        $update = lavelJob::find($id)->update([
            'lj_userDelete' =>  Auth::user()->name
        ]);

        $mes = 'Delete Success';
        $yourURL= url('backend/lavelJob');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function lavelJobExport() 
    {
        return Excel::download(new LavelJobExport, 'lavelJob.xlsx');
    }

}

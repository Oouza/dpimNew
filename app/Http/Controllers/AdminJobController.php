<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Models\typeJob;
use App\Models\lavelJob;
use App\Models\User;
use App\Models\capacity;
use App\Models\skills;
use App\Models\skillsSubs;
use App\Models\groupjob;
use App\Models\gjcapacity;
use App\Models\gjskills;
use App\Models\gjSkillsSub;
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
        $groupjob = groupjob::where('FKgj_userCreate',0)->whereNull('gj_userDelete')->get();
        return view('backend.job.job',compact('groupjob'));
    }

    function jobForm(){
        $typeJob = typeJob::whereNull('tj_userDelete')->get();
        $lavelJob = lavelJob::whereNull('lj_userDelete')->get();
        return view('backend.job.job-add',compact('typeJob','lavelJob'));
    }

    function jobAdd(Request $request){
        // dd($request);

        $typeJob = typeJob::where('tj_id',$request->job_type)->first();
        $lavelJob = lavelJob::where('lj_id',$request->job_lavel)->first();

        // dd($typeJob->tj_name, $lavelJob->lj_name);

        $groupjob = new groupjob;
        $groupjob->gj_no            = $request->job_no;
        $groupjob->gj_name          = $request->job_name;
        $groupjob->gj_detail        = $request->job_detail;
        $groupjob->FKgj_typeJob     = $request->job_type;
        $groupjob->gj_nametypeJob   = $typeJob->tj_name;
        $groupjob->FKgj_lavel       = $request->job_lavel;
        $groupjob->gj_namelavel     = $lavelJob->lj_name;
        $groupjob->FKgj_userCreate  = 0;
        $groupjob->gj_userCreate    = Auth::user()->name;
        $groupjob->gj_userUpdate    = Auth::user()->name;
        $groupjob->save();

        $mes = 'Success';
        $yourURL= url('backend/job');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function jobEdit($id){
        $gj = groupjob::find($id);
        $typeJob = typeJob::whereNull('tj_userDelete')->get();
        $lavelJob = lavelJob::whereNull('lj_userDelete')->get();
        return view('backend.job.job-edit',compact('gj', 'typeJob', 'lavelJob'));
    }

    function jobUpdate(Request $request, $id){
        $typeJob = typeJob::where('tj_id',$request->job_type)->first();
        $lavelJob = lavelJob::where('lj_id',$request->job_lavel)->first();

        // dd($typeJob->tj_name, $lavelJob->lj_name);

        $update = groupjob::find($id)->update([
            'gj_name'           => $request->job_name,
            'gj_no'             => $request->job_id,
            'gj_detail'         => $request->job_detail,
            'FKgj_typeJob'      => $request->job_type,
            'gj_nametypeJob'    => $typeJob->tj_name,
            'FKgj_lavel'        => $request->job_lavel,
            'gj_namelavel'      => $lavelJob->lj_name,
            'gj_userUpdate'     => Auth::user()->name,
        ]);

        $mes = 'Success';
        $yourURL= url('backend/job');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function jobDelete($id){
        // dd($request, $id);
        $update = groupjob::find($id)->update([
            'gj_userDelete' =>  Auth::user()->name
        ]);

        $mes = 'Delete Success';
        $yourURL= url('backend/job');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function jobDetail($id){
        $gj = groupjob::join('lavel_jobs','lavel_jobs.lj_id','groupjobs.FKgj_lavel')
        ->join('type_job','type_job.tj_id','groupjobs.FKgj_typeJob')->find($id);
        // dd($gj);

        $gjc = gjcapacity::join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->where('FKgjc_groupjob',$id)
        ->whereNull('gjc_userDelete')->get();

        $gjs = gjskills::join('skills','skills.s_id','gjskills.FKgjs_skills')
        ->where('FKgjs_groupjob',$id)->whereNull('gjs_userDelete')->get();

        $gjSub = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
        ->where('FKgjss_groupjob',$id)->whereNull('gjss_userDelete')->get();

        // $gjt = gjcapacity::
        // join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')
        // ->join('gjskills','gjskills.FKgjs_gjcapacity','gjcapacities.gjc_id')
        // ->join('skills','skills.s_id','gjskills.FKgjs_skills')
        // ->join('gj_skills_subs','gj_skills_subs.FKgjss_gjcapacity','gjcapacities.gjc_id')
        // ->join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
        // ->where('FKgjc_groupjob',$id)
        // ->whereNull('gjc_userDelete')->groupBy('gjcapacities.gjc_id', 'gj_skills_subs.FKgjss_gjcapacity')->get();
        // dd($gjt);

        return view('backend.job.job-detail',compact('gj','gjc','gjs','gjSub'));
        // use App\Models\capacity;
        // use App\Models\skills;
        // use App\Models\skillsSubs;
        // use App\Models\groupjob;
        // use App\Models\gjcapacity;
        // use App\Models\gjskills;
        // use App\Models\gjSkillsSub;
    }

    function jobCapacity($id){
        $gj = groupjob::find($id);
        $capacity = gjcapacity::where('FKgjc_groupjob',$id)->where('FKgjc_userCreate',0)->whereNull('gjc_userDelete')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->get();        
        return view('backend.job.capacity.jobCapa',compact('gj','capacity'));
    }

    function jobCapacityForm($id){
        $gj = groupjob::find($id);
        // $capacity = Capacity::leftJoin('gjcapacities', 'gjcapacities.FKgjc_capacity', '=', 'capacities.cc_id')
        // ->whereNull('gjcapacities.FKgjc_capacity')
        // ->where('gjcapacities.FKgjc_groupjob', $id)
        // ->where('FKcc_Create', 0)
        // ->whereNull('cc_userDelete')
        // ->whereNotExists(function ($query) {
        //     $query->select(DB::raw(1))
        //         ->from('gjcapacities')
        //         ->whereColumn('gjcapacities.FKgjc_capacity', 'capacities.cc_id');
        // })
        // ->get();
        $capacity = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.job.capacity.jobCapa-add',compact('capacity','id','gj'));
    }

    function jobCapacityAdd(Request $request, $id){
        // dd($request, $id);
        $capacity = capacity::find($request->capacity);
        $gj = groupjob::find($id);
        // dd($gj->gj_name);

        $gjcapacity = new gjcapacity;
        $gjcapacity->FKgjc_capacity   = $request->capacity;
        $gjcapacity->gjc_namecapacity = $capacity->cc_name;
        $gjcapacity->gjc_important    = $request->important;
        $gjcapacity->FKgjc_groupjob   = $id;
        $gjcapacity->gjc_namegroupjob = $gj->gj_name;
        $gjcapacity->FKgjc_userCreate = 0;
        $gjcapacity->gjc_userCreate   = Auth::user()->name;
        $gjcapacity->gjc_userUpdate   = Auth::user()->name;
        $gjcapacity->save();

        $mes = 'Success';
        $yourURL= url('backend/job/capacity/'.$id);
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function jobCapacityEdit($id){
        $gjc = gjcapacity::join('groupjobs','groupjobs.gj_id','gjcapacities.FKgjc_groupjob')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->find($id);
        $cc = capacity::where('FKcc_Create',0)->whereNull('cc_userDelete')->get();
        return view('backend.job.capacity.jobCapa-edit',compact('gjc','cc'));
    }

    function jobCapacityUpdate(Request $request, $id){
        $capacity = capacity::find($request->capacity);
        $gjc = gjcapacity::find($id);
        $update = gjcapacity::find($id)->update([
            'FKgjc_capacity'      => $request->capacity,
            'gjc_namecapacity'    => $capacity->cc_name,
            'gjc_important'       => $request->important,
            'gjc_userUpdate'      => Auth::user()->name,
        ]);
        // dd($gjc->FKgjc_groupjob);

        $mes = 'Success';
        $yourURL= url('backend/job/capacity/'.$gjc->FKgjc_groupjob);
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function jobCapacityDelete($id){
        $gjc = gjcapacity::find($id);
        $update = gjcapacity::find($id)->update([
            'gjc_userDelete'      => Auth::user()->name,
        ]);

        $mes = 'Success';
        $yourURL= url('backend/job/capacity/'.$gjc->FKgjc_groupjob);
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function jobskills($id){
        $gj = gjcapacity::join('groupjobs','groupjobs.gj_id','gjcapacities.FKgjc_groupjob')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->where('gjcapacities.gjc_id',$id)->first();
        // $gj = gjcapacity::find($id);
        // dd($gj);
        
        $gjskills = gjskills::join('skills','skills.s_id','gjskills.FKgjs_skills')
        ->where('FKgjs_gjcapacity',$id)->where('FKgjs_userCreate',0)->whereNull('gjs_userDelete')
        ->get();

        $gjSkillsSub = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
        ->where('FKgjss_gjcapacity',$id)->where('FKgjss_userCreate',0)->whereNull('gjss_userDelete')
        ->get();  
        return view('backend.job.skills.jobSkills',compact('gj','gjskills','gjSkillsSub'));
    }

    function jobskillsForm($id){
        $gjc = gjcapacity::join('groupjobs','groupjobs.gj_id','gjcapacities.FKgjc_groupjob')
        ->join('capacities','capacities.cc_id','gjcapacities.FKgjc_capacity')->find($id);
        // dd($gjc->gjc_id);
        $skills = skills::where('FKs_Create',0)->where('FKs_capacity',$gjc->FKgjc_capacity)->whereNull('s_userDelete')->get();
        return view('backend.job.skills.jobSkills-add',compact('skills','gjc'));
    }

    function jobSkillsAdd(Request $request,$id){
        // dd($request);
        $gjc = gjcapacity::find($id);
        $skills = skills::find($request->skills);
        $skillsSub = skillsSubs::find($request->skillsSub_one);
        
        // dd($skills->s_name, $skillsSub->ss_name);

        $gjskills = new gjskills;
        $gjskills->FKgjs_skills     = $request->skills;
        $gjskills->gjs_nameskills	= $skills->s_name;
        $gjskills->FKgjs_gjcapacity = $id;
        $gjskills->FKgjs_groupjob   = $gjc->FKgjc_groupjob;
        $gjskills->FKgjs_userCreate = 0;
        $gjskills->gjs_userCreate   = Auth::user()->name;
        $gjskills->gjs_userUpdate   = Auth::user()->name;
        $gjskills->save();

        $last = DB::table('gjskills')->latest('gjs_id')->first();

        $gjSkillsSub = new gjSkillsSub;
        $gjSkillsSub->FKgjss_skillsSub     = $request->skillsSub_one;
        $gjSkillsSub->gjss_nameskillsSub	= $skillsSub->ss_name;
        $gjSkillsSub->FKgjss_gjskills = $last->gjs_id;
        $gjSkillsSub->FKgjss_gjcapacity = $id;
        $gjSkillsSub->FKgjss_groupjob   = $gjc->FKgjc_groupjob;
        $gjSkillsSub->FKgjss_userCreate = 0;
        $gjSkillsSub->gjss_userCreate   = Auth::user()->name;
        $gjSkillsSub->gjss_userUpdate   = Auth::user()->name;
        $gjSkillsSub->save();
        
        if($request->skillsSub!=''){
            for($i = 0; $i < count($request->skillsSub); $i++) {
                $indexedArray = array_values($request->skillsSub); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                $value = $indexedArray[$i];
                $ss = skillsSubs::find($value);

                $gjSkillsSub = new gjSkillsSub;
                $gjSkillsSub->FKgjss_skillsSub     = $value;
                $gjSkillsSub->gjss_nameskillsSub	= $ss->ss_name;
                $gjSkillsSub->FKgjss_gjskills = $last->gjs_id;
                $gjSkillsSub->FKgjss_gjcapacity = $id;
                $gjSkillsSub->FKgjss_groupjob   = $gjc->FKgjc_groupjob;
                $gjSkillsSub->FKgjss_userCreate = 0;
                $gjSkillsSub->gjss_userCreate   = Auth::user()->name;
                $gjSkillsSub->gjss_userUpdate   = Auth::user()->name;
                $gjSkillsSub->save();
            }
        }

        $mes = 'Success';
        $yourURL= url('backend/job/skills/'.$id);
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function jobskillsEdit($id){
        $gjs = gjskills::join('gjcapacities','gjcapacities.gjc_id','gjskills.FKgjs_gjcapacity')
        ->join('skills','skills.s_id','gjskills.FKgjs_skills')->find($id);

        // dd($gjs->FKgjc_capacity);

        $gjSub = gjSkillsSub::join('skills_subs','skills_subs.ss_id','gj_skills_subs.FKgjss_skillsSub')
        ->where('FKgjss_gjskills',$id)->whereNull('gjss_userDelete')->get();  
        $skills = skills::where('FKs_capacity',$gjs->FKgjc_capacity)->where('FKs_Create',0)->whereNull('s_userDelete')->get();
        $skillsSubs = skillsSubs::where('FKss_skills',$gjs->FKgjs_skills)->where('FKss_Create',0)->whereNull('ss_userDelete')->get();
        
        return view('backend.job.skills.jobSkills-edit',compact('gjs','gjSub','skills','skillsSubs'));
    }

    function jobSkillsDelete($id){
        $update = gjskills::find($id)->update([
            'gjs_userDelete'    => Auth::user()->name,
        ]);
    }

    function jobSkillsSubUpdate(Request $request, $id){
        // dd($request,$id);
        $gjs = gjskills::find($id);
        // dd($gjs,$id);

        if(!empty($request->id_glss)){
            for($i = 1; $i <= count($request->id_glss); $i++) {
                $ss = skillsSubs::find($request->ssdtb[$i]);
                // dd($ss);
                $update = gjSkillsSub::where('gjss_id',$request->id_glss)->update([
                    'FKgjss_skillsSub'      => $request->ssdtb[$i],
                    'gjss_nameskillsSub'    => $ss->ss_name,
                    'gjss_userUpdate'       => Auth::user()->name,
                ]);
            }
        }

        if($request->skillsSub!=''){
            for($i = 0; $i < count($request->skillsSub); $i++) {
                $indexedArray = array_values($request->skillsSub); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                $value = $indexedArray[$i];
                $ss = skillsSubs::find($value);

                $gjSkillsSub = new gjSkillsSub;
                $gjSkillsSub->FKgjss_skillsSub      = $value;
                $gjSkillsSub->gjss_nameskillsSub    = $ss->ss_name;
                $gjSkillsSub->FKgjss_gjskills       = $id;
                $gjSkillsSub->FKgjss_gjcapacity     = $gjs->FKgjs_gjcapacity;
                $gjSkillsSub->FKgjss_groupjob       = $gjs->FKgjs_groupjob;
                $gjSkillsSub->FKgjss_userCreate     = 0;
                $gjSkillsSub->gjss_userCreate       = Auth::user()->name;
                $gjSkillsSub->gjss_userUpdate       = Auth::user()->name;
                $gjSkillsSub->save();
            }
        }

        $mes = 'Success';
        $yourURL= url('backend/job/skills/'.$gjs->FKgjs_gjcapacity);
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        
    }

    function jobSkillsSubDelete($id){
        $update = gjSkillsSub::find($id)->update([
            'gjss_userDelete'      => Auth::user()->name,
        ]);
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

    function searchCapacity(Request $request){
        // $capacityId = $request->capacity;
        $capacity = capacity::find($request->capacity);
        // $response = {!! asset($capacity->cc_detail)?$capacity->cc_detail :''!!};
        // $test = {!! asset($rs->gj_detail )?$rs->gj_detail :''!!};
        $response = $capacity->cc_detail;
        return json_encode($response);      
    }

    function searchSkills(Request $request){
        $skills = skills::find($request->skills);
        $killsSub = skillsSubs::where('FKss_Create',0)->where('FKss_skills',$request->skills)->whereNull('ss_userDelete')->get();

        $html = '<option value="">- กรุณาเลือกทักษะย่อย -</option>';
        if(!empty($killsSub)){
            foreach($killsSub as $_data){
                $html .= '<option value="'.$_data->ss_id.'">'.$_data->ss_no.' '.$_data->ss_name.'</option>';
               
            }
        }
        $response["detail"] = $skills->s_detail;
        $response["html"] = $html;
        return json_encode($response);      
    }

    function searchskillsSub(Request $request){
        // $capacityId = $request->capacity;
        $skillsSub = skillsSubs::find($request->skillsSub);
        // $response = {!! asset($capacity->cc_detail)?$capacity->cc_detail :''!!};
        // $test = {!! asset($rs->gj_detail )?$rs->gj_detail :''!!};
        $response = $skillsSub->ss_detail;
        return json_encode($response);      
    }

    function detailSkillsSub(Request $request){
        $skillsSub = skillsSubs::find($request->id);
        // $iditem = $request->input('id');

        // $itemid = DB::table('item')->where('item_id',$iditem)
        // ->join('promotion', 'item.promotion_id', '=' , 'promotion.promotion_id')
        // ->first();

        if(!empty($itemid)){
            $object = new \stdClass();
            $object->item_name =    $itemid->item_name;
            $object->promotion_price =  $itemid->promotion_price;
            $object->price_name =       $itemid->price_name;
            $object->buytype =       $itemid->buytype;
            $object->promotion_qty =       $itemid->promotion_qty;
            // $object->name =         "$object->f_name $object->l_name";
        }
        return json_encode($object);
    }

}

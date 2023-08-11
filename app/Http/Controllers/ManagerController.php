<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\typeMineral;
use App\Models\Company;
use App\Models\ceohr;
use App\Models\User;

class ManagerController extends Controller
{
    function loginCompany(){
        return view('frontend.manager.loginCompany');
    }

    function regiterCompany(){
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $mineral = typeMineral::whereNull('tm_userDelete')->get();
        return view('frontend.manager.regiterCompany',compact('provinces','mineral'));
    }

    function companyAdd(Request $request){
        $name = $request->title.' '.$request->people_fname.' '.$request->people_lname;
        $nameCompany = $request->name_company;
        $nocomapany = $request->no_company;

        $chCompany = DB::table('companies')->where('c_nameCompany',$nameCompany)->where('c_licenseNo',$nocomapany)->first();

        if(!empty($chCompany->FKc_manager) && !empty($chCompany->FKc_hr)){
            return back()->with('success','สถานประกอบการ '.$nameCompany.' มี ผู้บริหาร  และ HR แล้ว',compact(('request')));        
        }elseif(!empty($chCompany->FKc_manager) && $request->position=='ผู้บริหาร'){
            return back()->with('success','สถานประกอบการ '.$nameCompany.' มี ผู้บริหาร แล้ว',compact(('request')));        
        }elseif(!empty($chCompany->FKc_hr) && $request->position=='HR'){
            return back()->with('success','สถานประกอบการ '.$nameCompany.' มี HR แล้ว',compact(('request')));        
        }
        // dd($name);

        $emailNew = $request->input('people_email');
        $chemail = DB::table('users')->where('email',$emailNew)->first();

        $path = 'upload/img';
        $image = '';
        if (!empty($request->file('credti'))) {
            $img = $request->file('credti');
            $img_name = 'credti' . time() . '.' . $img->getClientOriginalExtension();
            $save_path = $img->move(public_path($path), $img_name);
            $image = $img_name;
        }

        if(!empty($chemail)){
            return back()->with('success',$emailNew.' อีเมลนี้ลงทะเบียนแล้ว กรุณาเปลี่ยนอีเมลใหม่',compact(('request')));
        }else{
            $User = new User;
            $User->name     = $name;
            $User->email    = $emailNew;
            $User->password = Hash::make($request->input('pass'));
            $User->status   = 3;
            $User->save();

            $lastUser = DB::table('users')->latest('id')->first();
            
            // dd($chCompany);

            $chMineral = DB::table('type_minerals')->where('tm_id',$request->mineral)->first();

            if(empty($chCompany)){
                $Company            = new Company;
                $Company->c_nameCompany         = $request->name_company;
                $Company->c_licenseNo           = $request->no_company;
                $Company->c_startDate           = $request->date_start;
                $Company->c_endDate             = $request->date_end;
                $Company->FKc_typemineral       = $request->mineral;
                $Company->c_nameTypeMineral     = $chMineral->tm_name;
                $Company->c_typeMineralSub      = $request->mineralSub;
                $Company->c_typeCompany         = $request->type_company;
                $Company->c_phone               = $request->phone_company;
                $Company->c_addressNo           = $request->address_no;
                $Company->FKc_provinces         = $request->povices_now;
                $Company->FKc_amphur            = $request->aumphur_now;
                $Company->FKc_tumbon            = $request->tumbon_now;
                $Company->c_postCode	        = $request->postcode;
                $Company->c_userCreate          = $name;
                $Company->c_userUpdate          = $name;
                $Company->save();
 
                $lastCompany = DB::table('companies')->latest('c_id')->first();

                $ceohr                  = new ceohr;
                $ceohr->ch_title        = $request->title;
                $ceohr->ch_fname        = $request->people_fname;
                $ceohr->ch_lname        = $request->people_lname;
                $ceohr->ch_phone        = $request->people_phone;
                $ceohr->ch_position     = $request->position;
                $ceohr->ch_credit       = $image;
                $ceohr->FKch_userid     = $lastUser->id;
                $ceohr->FKch_company    = $lastCompany->c_id;
                $ceohr->ch_userCreate   = $name;
                $ceohr->ch_userUpdate   = $name;
                $ceohr->save();

                $lastCEOhr= DB::table('ceohrs')->latest('ch_id')->first();

                if($request->position == 'ผู้บริหาร'){
                    $upCompany = Company::find($lastCompany->c_id)->update([
                        'FKc_manager'   => $lastCEOhr->ch_id,
                    ]);
                }else{
                    $upCompany = Company::find($lastCompany->c_id)->update([
                        'FKc_hr'   => $lastCEOhr->ch_id,
                    ]);
                }
                $upUser = User::find($lastUser->id)->update([
                    'FK_company'   => $lastCompany->c_id,
                ]);
            }else{                
                $ceohr                  = new ceohr;
                $ceohr->ch_title        = $request->title;
                $ceohr->ch_fname        = $request->people_fname;
                $ceohr->ch_lname        = $request->people_lname;
                $ceohr->ch_phone        = $request->people_phone;
                $ceohr->ch_position     = $request->position;
                $ceohr->ch_credit       = $image;
                $ceohr->FKch_userid     = $lastUser->id;
                $ceohr->FKch_company    = $chCompany->c_id;
                $ceohr->ch_userCreate   = $name;
                $ceohr->ch_userUpdate   = $name;
                $ceohr->save();

                $lastCEOhr= DB::table('ceohrs')->latest('ch_id')->first();

                if($request->position == 'ผู้บริหาร'){
                    $upCompany = Company::find($chCompany->c_id)->update([
                        'FKc_manager'   => $lastCEOhr->ch_id,
                    ]);
                }else{
                    $upCompany = Company::find($chCompany->c_id)->update([
                        'FKc_hr'   => $lastCEOhr->ch_id,
                    ]);
                }
                $upUser = User::find($lastUser->id)->update([
                    'FK_company'   => $chCompany->c_id,
                ]);
            }
        }
            $mes = 'Success';
            $yourURL= url('success');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        // return view('frontend.company.job.indexCompany');
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

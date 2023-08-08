<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Company;
use App\Models\ceohr;
use App\Models\typeMineral;
use App\Exports\TypeMineralExport;
use App\Imports\TypeMineralImport;
use App\Imports\CEOhrImport;

class AdminCompanyController extends Controller
{
    function company(){
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $mineral = typeMineral::whereNull('tm_userDelete')->get();
        $user = User::join('ceohrs','ceohrs.FKch_userid','users.id')
        ->join('companies','companies.c_id','ceohrs.FKch_company')
        ->join('provinces','provinces.id','companies.FKc_provinces')
        ->where('status',4)
        ->whereNull('ch_userDelete')->get();
        // $user = User::join('ceohr', 'ceohr.FKch_userid', 'users.id')
        //     ->join('companies', 'companies.c_id', 'ceohr.FKch_company')
        //     ->where('status', 8)
        //     ->whereNull('e_userDelete')
        //     ->get();
        return view('backend.company.company',compact('provinces','mineral','user'));
    }

    function companyForm(){
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $mineral = typeMineral::whereNull('tm_userDelete')->get();
        return view('backend.company.company-add',compact('provinces','mineral'));
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
            $User->status   = 4;
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
                $Company->c_userCreate          = Auth::user()->name;
                $Company->c_userUpdate          = Auth::user()->name;
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
                $ceohr->ch_userCreate   = Auth::user()->name;
                $ceohr->ch_userUpdate   = Auth::user()->name;
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
                $ceohr->ch_userCreate   = Auth::user()->name;
                $ceohr->ch_userUpdate   = Auth::user()->name;
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
        $yourURL= url('backend/company');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function companyEdit($id){
        $user = User::join('ceohrs','ceohrs.FKch_userid','users.id')
        ->join('companies','companies.c_id','ceohrs.FKch_company')
        ->join('provinces','provinces.id','companies.FKc_provinces')
        ->where('users.id',$id)->first();
        $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
        $mineral = typeMineral::whereNull('tm_userDelete')->get();
        // dd($user);
        return view('backend.company.company-edit',compact('user','provinces','amphures','districts','mineral'));
    }

    function companyDetail(){
        return view('backend.company.company-detail');
    }

    function companyFile(){
        return view('backend.company.company-file');
    }

    function companyCf(){
        return view('backend.company.companyCf');
    }

    function companyCfDetail(){
        return view('backend.company.companyCf-detail');
    }

    function companyImport(Request $request){
        Excel::import(new CEOhrImport, $request->file_ceoHr);
        $mes = 'Success';
        $yourURL= url('backend/company');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function mineral(){
        $typeMineral = typeMineral::whereNull('tm_userDelete')->get();
        return view('backend.mineral.mineral',compact('typeMineral'));
    }

    function mineralForm(){
        return view('backend.mineral.mineral-add');
    }

    function mineralAdd(Request $request){
        // dd($request);
        
        $typeMineral                 = new typeMineral;
        $typeMineral->tm_no          = $request->mineralTypeId;
        $typeMineral->tm_name        = $request->mineralTypeName;
        $typeMineral->tm_userCreate  = Auth::user()->name;
        $typeMineral->tm_userUpdate  = Auth::user()->name;
        $typeMineral->save();

        $mes = 'Success';
        $yourURL= url('backend/mineral');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function mineralEdit($id){
        $typeMineral = typeMineral::find($id);
        return view('backend.mineral.mineral-edit',compact('typeMineral'));
    }

    function mineralUpdate(Request $request, $id){
        // dd($request);

        $update = typeMineral::find($id)->update([
            'tm_no'         =>  $request->mineralTypeId,
            'tm_name'       =>  $request->mineralTypeName,
            'tm_userUpdate' =>  Auth::user()->name
        ]);

        $mes = 'Update Success';
        $yourURL= url('backend/mineral');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function mineralDel($id){
        // dd($request);

        $update = typeMineral::find($id)->update([
            'tm_userDelete' =>  Auth::user()->name
        ]);

        $mes = 'Delete Success';
        $yourURL= url('backend/mineral');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function exportMineral() 
    {
        return Excel::download(new TypeMineralExport, 'TypeMineral.xlsx');
    }

    function mineralFile(){
        return view('backend.mineral.mineral-file');
    }

    function mineralImport(Request $request){
        // Excel::import(new EmployeeImport, $request->file_people);
        Excel::import(new TypeMineralImport, $request->file_typeMineral);
        $mes = 'Success';
        $yourURL= url('backend/mineral');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }
}

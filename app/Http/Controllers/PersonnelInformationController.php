<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\departments;
use App\Models\departmentSub;
use App\Models\settingPosition;
use App\Models\UserModel;
use App\Models\employee;
use App\Models\lavelJob;
use App\Models\groupjob;
use App\Models\EducationalRecordModel;
use App\Models\WorkHistoryModel;

class PersonnelInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function gettypecompany(Request $request, $id)
    {
        $company = Company::where('FKc_typemineral', $id)->get()->pluck("c_nameCompany","c_id");
        return response()->json($company);
    }

    public function getcompany(Request $request, $id)
    {
        $department = departments::where('FKd_company', $id)->get()->pluck("d_name","d_id");
        return response()->json($department);
    }

    public function getdepartment(Request $request, $id)
    {
        $departmentsub = departmentSub::where('FKds_department', $id)->get()->pluck("ds_name","ds_id");
        return response()->json($departmentsub);
    }

    public function getdepartmentsub(Request $request, $id)
    {
        $setting_positions = settingPosition::where('FKgsp_departmentSub', $id)->get()->pluck("sp_nameposition","sp_id");
        return response()->json($setting_positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            if($request->password_1 == $request->password_2 && $request->password_1 != ""){
                $varible = Hash::make($request->password_1);
                $name = $request->title.' '.$request->fname.' '.$request->lname;
                $e_credit = $request->file('credit');
                $company = Company::where('c_id', $request->company_name)->first();
                $department = departments::where('d_id', $request->department)->first();
                $departmentsub = departmentSub::where('ds_id', $request->departmentSub)->first();
                $setting_positions = settingPosition::where('sp_id', $request->position)->first();
                $level_jobs = lavelJob::where('lj_id', $request->lavel_job)->first();
                $group = groupjob::where('gj_id', $request->job)->first();
                if($varible){
                    if(Auth::user()->status == 8){
                        if($e_credit != ''){
                            $image_gen = date('YmdHis').'.'.$e_credit->getClientOriginalExtension();
                            $e_credit->move(public_path() . '/upload/personnel', $image_gen);
                            $image1 = employee::where('FKe_userid', $id)->first()->e_credit;
                            $path_img = public_path('upload/personnel/'. $image1);
                            if($image1 != ''){
                                if (file_exists($path_img) != '') {
                                    unlink($path_img);              
                                }   
                            }
                            UserModel::find($id)->update([
                                'name' => $name,
                                'email' => $request->email,
                                'password' => $varible,
                                'FK_company' => $request->company_name,
                                'updated_at' => Carbon::now(),
                            ]);

                            employee::where('FKe_userid', $id)->update([
                                'e_title' => $request->title,
                                'e_fname' => $request->fname,
                                'e_lname' => $request->lname,
                                'e_phone' => $request->phone,
                                'e_birth' => $request->birth,
                                'e_gender' => $request->gender,
                                'e_status' => $request->work_status,
                                'FKe_company' => $request->company_name,
                                'e_nameCompany' => $company->c_nameCompany,
                                'e_employeeNo' => $request->employeeNo,
                                'FKe_department' => $request->department,
                                'e_nameDepartment' => $department->d_name,
                                'FKe_departmentSub' => $request->departmentSub,
                                'e_nameDepartmentSub' => $departmentsub->ds_name,
                                'FKe_position' => $request->position,
                                'e_namePosition' => $setting_positions->sp_nameposition,
                                'FKe_lavel' => $request->lavel_job,
                                'e_nameLavel' => $level_jobs->lj_name,
                                'FKe_group' => $request->job,
                                'e_nameGroup' => $group->gj_name,
                                'e_credit' => $image_gen,
                                'addressNO_now' => $request->addressNO_now,
                                'FKe_province_now' => $request->povices_now,
                                'FKe_amphur_now' => $request->aumphur_now,
                                'FKe_tambon_now' => $request->tumbon_now,
                                'postcode_now' => $request->postcode_now,
                                'addressNO_past' => $request->addressNO_past,
                                'FKe_province_past' => $request->povices_past,
                                'FKe_amphur_past' => $request->aumphur_past,
                                'FKe_tambon_past' => $request->tumbon_past,
                                'postcode_past' => $request->postcode_past,
                                'e_userUpdate' => Auth::user()->name,
                                'updated_at' => Carbon::now(),
                            ]);

                            $employee = employee::where('FKe_userid', $id)->first();
                            $ids = $request->ids;  
                            $er_id = EducationalRecordModel::whereIn('er_id', $ids)->get();   
                            $data = $request->all(); 
                            foreach($er_id as $ID => $value){
                                $data_1 = EducationalRecordModel::where('er_id', $value->er_id)->first();
                                $data_1->er_datefrom = $data["from_years"][$ID];
                                $data_1->er_dateto = $data["to_years"][$ID];
                                $data_1->er_qualification = $data["qualifications"][$ID];
                                $data_1->er_Nameinstitution = $data["institution_names"][$ID];
                                if(isset($request->input('qualification_credits')[$ID])){
                                    $q_credit = $request->input('qualification_credits')[$ID];
                                    $file_name = date('YmdHis').$_FILES['qualification_credits']['name'][$ID];
                                    $picture = $file_name;
                                    $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                    $data_1->er_credit = $picture;
                                    $image2 = EducationalRecordModel::where('er_id', $value->er_id)->first()->er_credit;
                                    $path_img2 = public_path('upload/app-personnel/'. $image2);
                                    if($image2 != ''){
                                        if (file_exists($path_img2) != '') {
                                            unlink($path_img2);              
                                        }   
                                    }
                                }
                                $data_1->er_note = $data["education_notes"][$ID];
                                $data_1->er_userUpdate = Auth::user()->name;
                                $data_1->updated_at = Carbon::now();
                                $data_1->save();
                            }
                        
                            $from_year = $request->from_year;
                            if($from_year != null){
                                foreach($request->from_year as $key => $erID){
                                    $data = new EducationalRecordModel();
                                    $data->FKer_employeeid = $employee->e_id;
                                    $data->FKer_userid = $id;
                                    if(isset($request->from_year[$key])){
                                        $data->er_datefrom = $request->from_year[$key];
                                    }
                                    if(isset($request->to_year[$key])){
                                        $data->er_dateto = $request->to_year[$key];
                                    }
                                    if(isset($request->qualification[$key])){
                                        $data->er_qualification = $request->qualification[$key];
                                    }
                                    if(isset($request->institution_name[$key])){
                                        $data->er_Nameinstitution = $request->institution_name[$key];
                                    }
                                    if(isset($request->qualification_credit[$key])){
                                        $q_credit = $request->qualification_credit[$key];
                                        $file_name = date('YmdHis').$_FILES['qualification_credit']['name'][$key];
                                        $picture = $file_name;
                                        $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                        $data->er_credit = $picture;
                                    }
                                    if(isset($request->education_note[$key])){
                                        $data->er_note = $request->education_note[$key];
                                    }
                                    $data->er_userCreate = Auth::user()->name;
                                    $data->created_at = Carbon::now();
                                    $data->save();    
                                } 
                            }else{}

                            $id2s = $request->id2s;  
                            $wh_id = WorkHistoryModel::whereIn('wh_id', $id2s)->get();   
                            $data_2 = $request->all(); 
                            foreach($wh_id as $ID2 => $value2){
                                $data_3 = WorkHistoryModel::where('wh_id', $value2->wh_id)->first();
                                $data_3->wh_datefrom = $data_2["fromwork_years"][$ID2];
                                $data_3->wh_dateto = $data_2["towork_years"][$ID2];
                                $data_3->wh_agencies = $data_2["namedepartments"][$ID2];
                                $data_3->wh_position = $data_2["namepositions"][$ID2];
                                if(isset($request->input('work_credits')[$ID2])){
                                    $w_credit = $request->input('work_credits')[$ID2];
                                    $file_name2 = date('YmdHis').$_FILES['work_credits']['name'][$ID2];
                                    $picture2 = $file_name2;
                                    $w_credit->move(public_path() . '/upload/personnel/', $picture2);
                                    $data_3->wh_credit = $picture2;
                                    $image3 = WorkHistoryModel::where('wh_id', $value2->wh_id)->first()->wh_credit;
                                    $path_img3 = public_path('upload/app-personnel/'. $image3);
                                    if($image3 != ''){
                                        if (file_exists($path_img3) != '') {
                                            unlink($path_img3);              
                                        }   
                                    }
                                }
                                $data_3->wh_note = $data_2["job_details"][$ID2];
                                $data_3->wh_userUpdate = Auth::user()->name;
                                $data_3->updated_at = Carbon::now();
                                $data_3->save(); 
                            }

                            $fromwork_year = $request->fromwork_year;
                            if($fromwork_year != null){
                                foreach($request->fromwork_year as $key => $whID){
                                    $data = new WorkHistoryModel();
                                    $data->FKwh_employeeid = $employee->e_id;
                                    $data->FKwh_userid = $id;
                                    if(isset($request->fromwork_year[$key])){
                                        $data->wh_datefrom = $request->fromwork_year[$key];
                                    }
                                    if(isset($request->towork_year[$key])){
                                        $data->wh_dateto = $request->towork_year[$key];
                                    }
                                    if(isset($request->namedepartment[$key])){
                                        $data->wh_agencies = $request->namedepartment[$key];
                                    }
                                    if(isset($request->nameposition[$key])){
                                        $data->wh_position = $request->nameposition[$key];
                                    }
                                    if(isset($request->work_credit[$key])){
                                        $q_credit = $request->work_credit[$key];
                                        $file_name = date('YmdHis').$_FILES['work_credit']['name'][$key];
                                        $picture = $file_name;
                                        $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                        $data->wh_credit = $picture;
                                    }
                                    if(isset($request->job_detail[$key])){
                                        $data->wh_note = $request->job_detail[$key];
                                    }
                                    $data->wh_userCreate = Auth::user()->name;
                                    $data->created_at = Carbon::now();
                                    $data->save();    
                                }
                            }else{}

                        }else{
                            UserModel::find($id)->update([
                                'name' => $name,
                                'email' => $request->email,
                                'password' => $varible,
                                'FK_company' => $request->company_name,
                                'updated_at' => Carbon::now(),
                            ]);

                            employee::where('FKe_userid', $id)->update([
                                'e_title' => $request->title,
                                'e_fname' => $request->fname,
                                'e_lname' => $request->lname,
                                'e_phone' => $request->phone,
                                'e_birth' => $request->birth,
                                'e_gender' => $request->gender,
                                'e_status' => $request->work_status,
                                'FKe_company' => $request->company_name,
                                'e_nameCompany' => $company->c_nameCompany,
                                'e_employeeNo' => $request->employeeNo,
                                'FKe_department' => $request->department,
                                'e_nameDepartment' => $department->d_name,
                                'FKe_departmentSub' => $request->departmentSub,
                                'e_nameDepartmentSub' => $departmentsub->ds_name,
                                'FKe_position' => $request->position,
                                'e_namePosition' => $setting_positions->sp_nameposition,
                                'FKe_lavel' => $request->lavel_job,
                                'e_nameLavel' => $level_jobs->lj_name,
                                'FKe_group' => $request->job,
                                'e_nameGroup' => $group->gj_name,
                                'addressNO_now' => $request->addressNO_now,
                                'FKe_province_now' => $request->povices_now,
                                'FKe_amphur_now' => $request->aumphur_now,
                                'FKe_tambon_now' => $request->tumbon_now,
                                'postcode_now' => $request->postcode_now,
                                'addressNO_past' => $request->addressNO_past,
                                'FKe_province_past' => $request->povices_past,
                                'FKe_amphur_past' => $request->aumphur_past,
                                'FKe_tambon_past' => $request->tumbon_past,
                                'postcode_past' => $request->postcode_past,
                                'e_userUpdate' => Auth::user()->name,
                                'updated_at' => Carbon::now(),
                            ]);
    
                            $employee = employee::where('FKe_userid', $id)->first();
                            $ids = $request->ids;  
                            $er_id = EducationalRecordModel::whereIn('er_id', $ids)->get();   
                            $data = $request->all(); 
                            foreach($er_id as $ID => $value){
                                $data_1 = EducationalRecordModel::where('er_id', $value->er_id)->first();
                                $data_1->er_datefrom = $data["from_years"][$ID];
                                $data_1->er_dateto = $data["to_years"][$ID];
                                $data_1->er_qualification = $data["qualifications"][$ID];
                                $data_1->er_Nameinstitution = $data["institution_names"][$ID];
                                if(isset($request->input('qualification_credits')[$ID])){
                                    $q_credit = $request->input('qualification_credits')[$ID];
                                    $file_name = date('YmdHis').$_FILES['qualification_credits']['name'][$ID];
                                    $picture = $file_name;
                                    $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                    $data_1->er_credit = $picture;
                                    $image2 = EducationalRecordModel::where('er_id', $value->er_id)->first()->er_credit;
                                    $path_img2 = public_path('upload/app-personnel/'. $image2);
                                    if($image2 != ''){
                                        if (file_exists($path_img2) != '') {
                                            unlink($path_img2);              
                                        }   
                                    }
                                }
                                $data_1->er_note = $data["education_notes"][$ID];
                                $data_1->er_userUpdate = Auth::user()->name;
                                $data_1->updated_at = Carbon::now();
                                $data_1->save(); 
                            }
                        
                            $from_year = $request->from_year;
                            if($from_year != null){
                                foreach($request->from_year as $key => $erID){
                                    $data = new EducationalRecordModel();
                                    $data->FKer_employeeid = $employee->e_id;
                                    $data->FKer_userid = $id;
                                    if(isset($request->from_year[$key])){
                                        $data->er_datefrom = $request->from_year[$key];
                                    }
                                    if(isset($request->to_year[$key])){
                                        $data->er_dateto = $request->to_year[$key];
                                    }
                                    if(isset($request->qualification[$key])){
                                        $data->er_qualification = $request->qualification[$key];
                                    }
                                    if(isset($request->institution_name[$key])){
                                        $data->er_Nameinstitution = $request->institution_name[$key];
                                    }
                                    if(isset($request->qualification_credit[$key])){
                                        $q_credit = $request->qualification_credit[$key];
                                        $file_name = date('YmdHis').$_FILES['qualification_credit']['name'][$key];
                                        $picture = $file_name;
                                        $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                        $data->er_credit = $picture;
                                    }
                                    if(isset($request->education_note[$key])){
                                        $data->er_note = $request->education_note[$key];
                                    }
                                    $data->er_userCreate = Auth::user()->name;
                                    $data->created_at = Carbon::now();
                                    $data->save();    
                                }
                            }else{}

                            $id2s = $request->id2s;  
                            $wh_id = WorkHistoryModel::whereIn('wh_id', $id2s)->get();   
                            $data_2 = $request->all(); 
                            foreach($wh_id as $ID2 => $value2){
                                $data_3 = WorkHistoryModel::where('wh_id', $value2->wh_id)->first();
                                $data_3->wh_datefrom = $data_2["fromwork_years"][$ID2];
                                $data_3->wh_dateto = $data_2["towork_years"][$ID2];
                                $data_3->wh_agencies = $data_2["namedepartments"][$ID2];
                                $data_3->wh_position = $data_2["namepositions"][$ID2];
                                if(isset($request->input('work_credits')[$ID2])){
                                    $w_credit = $request->input('work_credits')[$ID2];
                                    $file_name2 = date('YmdHis').$_FILES['work_credits']['name'][$ID2];
                                    $picture2 = $file_name2;
                                    $w_credit->move(public_path() . '/upload/personnel/', $picture2);
                                    $data_3->wh_credit = $picture2;
                                    $image3 = WorkHistoryModel::where('wh_id', $value2->wh_id)->first()->wh_credit;
                                    $path_img3 = public_path('upload/app-personnel/'. $image3);
                                    if($image3 != ''){
                                        if (file_exists($path_img3) != '') {
                                            unlink($path_img3);              
                                        }   
                                    }
                                }
                                $data_3->wh_note = $data_2["job_details"][$ID2];
                                $data_3->wh_userUpdate = Auth::user()->name;
                                $data_3->updated_at = Carbon::now();
                                $data_3->save(); 
                            }

                            $fromwork_year = $request->fromwork_year;
                            if($fromwork_year != null){
                                foreach($request->fromwork_year as $key => $whID){
                                    $data = new WorkHistoryModel();
                                    $data->FKwh_employeeid = $employee->e_id;
                                    $data->FKwh_userid = $id;
                                    if(isset($request->fromwork_year[$key])){
                                        $data->wh_datefrom = $request->fromwork_year[$key];
                                    }
                                    if(isset($request->towork_year[$key])){
                                        $data->wh_dateto = $request->towork_year[$key];
                                    }
                                    if(isset($request->namedepartment[$key])){
                                        $data->wh_agencies = $request->namedepartment[$key];
                                    }
                                    if(isset($request->nameposition[$key])){
                                        $data->wh_position = $request->nameposition[$key];
                                    }
                                    if(isset($request->work_credit[$key])){
                                        $q_credit = $request->work_credit[$key];
                                        $file_name = date('YmdHis').$_FILES['work_credit']['name'][$key];
                                        $picture = $file_name;
                                        $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                        $data->wh_credit = $picture;
                                    }
                                    if(isset($request->job_detail[$key])){
                                        $data->wh_note = $request->job_detail[$key];
                                    }
                                    $data->wh_userCreate = Auth::user()->name;
                                    $data->created_at = Carbon::now();
                                    $data->save();    
                                }
                            }else{}
                        }
                    }else{
                        UserModel::find($id)->update([
                            'name' => $name,
                            'email' => $request->email,
                            'password' => $varible,
                            'updated_at' => Carbon::now(),
                        ]);

                        employee::where('FKe_userid', $id)->update([
                            'e_title' => $request->title,
                            'e_fname' => $request->fname,
                            'e_lname' => $request->lname,
                            'e_phone' => $request->phone,
                            'e_birth' => $request->birth,
                            'e_gender' => $request->gender,
                            'addressNO_now' => $request->addressNO_now,
                            'FKe_province_now' => $request->povices_now,
                            'FKe_amphur_now' => $request->aumphur_now,
                            'FKe_tambon_now' => $request->tumbon_now,
                            'postcode_now' => $request->postcode_now,
                            'addressNO_past' => $request->addressNO_past,
                            'FKe_province_past' => $request->povices_past,
                            'FKe_amphur_past' => $request->aumphur_past,
                            'FKe_tambon_past' => $request->tumbon_past,
                            'postcode_past' => $request->postcode_past,
                            'e_userUpdate' => Auth::user()->name,
                            'updated_at' => Carbon::now(),
                        ]);
    
                        $employee = employee::where('FKe_userid', $id)->first();
                        $ids = $request->ids;  
                        $er_id = EducationalRecordModel::whereIn('er_id', $ids)->get();   
                        $data = $request->all(); 
                        foreach($er_id as $ID => $value){
                            $data_1 = EducationalRecordModel::where('er_id', $value->er_id)->first();
                            $data_1->er_datefrom = $data["from_years"][$ID];
                            $data_1->er_dateto = $data["to_years"][$ID];
                            $data_1->er_qualification = $data["qualifications"][$ID];
                            $data_1->er_Nameinstitution = $data["institution_names"][$ID];
                            if(isset($request->input('qualification_credits')[$ID])){
                                $q_credit = $request->input('qualification_credits')[$ID];
                                $file_name = date('YmdHis').$_FILES['qualification_credits']['name'][$ID];
                                $picture = $file_name;
                                $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                $data_1->er_credit = $picture;
                                $image2 = EducationalRecordModel::where('er_id', $value->er_id)->first()->er_credit;
                                $path_img2 = public_path('upload/app-personnel/'. $image2);
                                if($image2 != ''){
                                    if (file_exists($path_img2) != '') {
                                        unlink($path_img2);              
                                    }   
                                }
                            }
                            $data_1->er_note = $data["education_notes"][$ID];
                            $data_1->er_userUpdate = Auth::user()->name;
                            $data_1->updated_at = Carbon::now();
                            $data_1->save(); 
                        }
                        
                        $from_year = $request->from_year;
                        if($from_year != null){
                            foreach($request->from_year as $key => $erID){
                                $data = new EducationalRecordModel();
                                $data->FKer_employeeid = $employee->e_id;
                                $data->FKer_userid = $id;
                                if(isset($request->from_year[$key])){
                                    $data->er_datefrom = $request->from_year[$key];
                                }
                                if(isset($request->to_year[$key])){
                                    $data->er_dateto = $request->to_year[$key];
                                }
                                if(isset($request->qualification[$key])){
                                    $data->er_qualification = $request->qualification[$key];
                                }
                                if(isset($request->institution_name[$key])){
                                    $data->er_Nameinstitution = $request->institution_name[$key];
                                }
                                if(isset($request->qualification_credit[$key])){
                                    $q_credit = $request->qualification_credit[$key];
                                    $file_name = date('YmdHis').$_FILES['qualification_credit']['name'][$key];
                                    $picture = $file_name;
                                    $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                    $data->er_credit = $picture;
                                }
                                if(isset($request->education_note[$key])){
                                    $data->er_note = $request->education_note[$key];
                                }
                                $data->er_userCreate = Auth::user()->name;
                                $data->created_at = Carbon::now();
                                $data->save();    
                            }
                        }else{}

                        $id2s = $request->id2s;  
                        $wh_id = WorkHistoryModel::whereIn('wh_id', $id2s)->get();   
                        $data_2 = $request->all(); 
                        foreach($wh_id as $ID2 => $value2){
                            $data_3 = WorkHistoryModel::where('wh_id', $value2->wh_id)->first();
                            $data_3->wh_datefrom = $data_2["fromwork_years"][$ID2];
                            $data_3->wh_dateto = $data_2["towork_years"][$ID2];
                            $data_3->wh_agencies = $data_2["namedepartments"][$ID2];
                            $data_3->wh_position = $data_2["namepositions"][$ID2];
                            if(isset($request->input('work_credits')[$ID2])){
                                $w_credit = $request->input('work_credits')[$ID2];
                                $file_name2 = date('YmdHis').$_FILES['work_credits']['name'][$ID2];
                                $picture2 = $file_name2;
                                $w_credit->move(public_path() . '/upload/personnel/', $picture2);
                                $data_3->wh_credit = $picture2;
                                $image3 = WorkHistoryModel::where('wh_id', $value2->wh_id)->first()->wh_credit;
                                $path_img3 = public_path('upload/app-personnel/'. $image3);
                                if($image3 != ''){
                                    if (file_exists($path_img3) != '') {
                                        unlink($path_img3);              
                                    }   
                                }
                            }
                            $data_3->wh_note = $data_2["job_details"][$ID2];
                            $data_3->wh_userUpdate = Auth::user()->name;
                            $data_3->updated_at = Carbon::now();
                            $data_3->save(); 
                        }

                        $fromwork_year = $request->fromwork_year;
                        if($fromwork_year != null){
                            foreach($request->fromwork_year as $key => $whID){
                                $data = new WorkHistoryModel();
                                $data->FKwh_employeeid = $employee->e_id;
                                $data->FKwh_userid = $id;
                                 if(isset($request->fromwork_year[$key])){
                                    $data->wh_datefrom = $request->fromwork_year[$key];
                                }
                                if(isset($request->towork_year[$key])){
                                    $data->wh_dateto = $request->towork_year[$key];
                                }
                                if(isset($request->namedepartment[$key])){
                                    $data->wh_agencies = $request->namedepartment[$key];
                                }
                                if(isset($request->nameposition[$key])){
                                    $data->wh_position = $request->nameposition[$key];
                                }
                                if(isset($request->work_credit[$key])){
                                    $q_credit = $request->work_credit[$key];
                                    $file_name = date('YmdHis').$_FILES['work_credit']['name'][$key];
                                    $picture = $file_name;
                                    $q_credit->move(public_path() . '/upload/personnel/', $picture);
                                    $data->wh_credit = $picture;
                                }
                                if(isset($request->job_detail[$key])){
                                    $data->wh_note = $request->job_detail[$key];
                                }
                                $data->wh_userCreate = Auth::user()->name;
                                $data->created_at = Carbon::now();
                                $data->save();    
                            }
                        }else{}
                    }
                    return redirect()->to('/home');
                }else{
                    return redirect()->to('/home');
                }  
            }

        } catch (\Throwable $th) {
            dd($th->getMessage());
            // return redirect()->to('/home');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

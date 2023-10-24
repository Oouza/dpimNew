<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterCompany')
<?php
$activePage = "users";
$active = "cfUser";
$datenow = date('Y');
$date = $datenow+543;
$date_old = $date-60;
?>
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')
</head>
<body>

@section('styles_link')
   
@endsection

@section('styles')


@endsection

@section('content')
  <!-- BEGIN: Content -->
  <div class="content">
            <div class="flex items-center mt-8">
               
            </div>
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box py-10 sm:py-20 mt-5">
               
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">รายละเอียดบุคลากร</div>
                   
                </div>
                <form action="{{url('company/user/confirm/'.$employee->FKe_userid)}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('ดำเนินการต่อ ??')">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>
                            <center>
                                @if(session("success"))
                                    <b class="text-danger">{{session('success')}}</b>
                                @endif
                            </center>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำนำหน้า </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="title" type="text" id="title" Placeholder="คำนำหน้า" value="{{$employee->e_title}}"required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="fname" type="text" id="fname" value="{{$employee->e_fname}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="lname" type="text" id="lname" value="{{$employee->e_lname}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขพนักงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="employee_no" type="text" id="employee_no" value="{{$employee->e_employeeNo}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="department" id="department" class="form-control select2" onchange="selectDepartment()" required>
                                        @foreach($departments as $rs)
                                        <option value="{{$rs->d_id}}" @if($employee->FKe_department == $rs->d_id) selected @endif>{{$rs->d_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="departmentSub" id="departmentSub" class="form-control select2" required>
                                        @foreach($deSub as $rs)
                                        <option value="{{$rs->ds_id}}" @if($employee->FKe_departmentSub == $rs->ds_id) selected @endif>{{$rs->ds_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="position" id="position" class="form-control select2" required>
                                        @foreach($setPosition as $rs)
                                        <option value="{{$rs->sp_id}}" @if($employee->FKe_position == $rs->sp_id) selected @endif>{{$rs->p_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> อีเมล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="e_email" type="text" id="e_email" value="{{$employee->email}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="phone" type="text" id="phone" value="{{$employee->e_phone}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันเกิด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="birthday" type="date" id="birthday" @if(!empty($employee->e_birth)) value="{{$employee->e_birth}}" @endif>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ที่อยู่ที่ติดต่อได้ </lable></b>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ที่อยู่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="address_now" type="text" id="address_now" @if(!empty($employee->addressNO_now)) value="{{$employee->addressNO_now}}" @else Placeholder="ที่อยู่" @endif>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="povices_now" id="povices_now" class="form-control select2" onchange="provinceNow()">
                                        <option value="" hidden>- กรุณาเลือกจังหวัด -</option>
                                        @foreach($provinces as $rs)
                                        <option value="{{$rs->id}}" @if((!empty($employee->FKe_province_now)) && ($employee->FKe_province_now == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เขต/อำเภอ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="aumphur_now" id="aumphur_now" class="form-control select2" onchange="amphureNow()">
                                        <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option>
                                        @foreach($amphures as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($employee->FKe_amphur_now) && ($employee->FKe_amphur_now == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="tumbon_now" id="tumbon_now" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
                                        @foreach($districts as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($employee->FKe_tambon_now) && ($employee->FKe_tambon_now == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษรีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="postcode_now" type="text" id="postcode_now" @if(!empty($employee->postcode_now)) value="{{$employee->postcode_now}}" @else Placeholder="รหัสไปรษณีย์" @endif>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ที่อยู่ตามทะเบียนบ้าน </lable></b>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ที่อยู่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="address_past" type="text" id="address_past" @if(!empty($employee->addressNO_past)) value="{{$employee->addressNO_past}}" @else Placeholder="ที่อยู่" @endif>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="povices_past" id="povices_past" class="form-control select2" onchange="provincepast()">
                                        <option value="" hidden>- กรุณาเลือกจังหวัด -</option>
                                        @foreach($provinces as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($employee->FKe_province_past) && ($employee->FKe_province_past == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เขต/อำเภอ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="aumphur_past" id="aumphur_past" class="form-control select2" onchange="amphurepast()">
                                        <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option>
                                        @foreach($amphures as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($employee->FKe_amphur_past) && ($employee->FKe_amphur_past == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="tumbon_past" id="tumbon_past" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
                                        @foreach($districts as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($employee->FKe_tambon_past) && ($employee->FKe_tambon_past == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษรีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="postcode_past" type="text" id="postcode_past" @if(!empty($employee->postcode_past)) value="{{$employee->postcode_past}}" @else Placeholder="รหัสไปรษณีย์" @endif>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เพศ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="gender" id="gender" type="radio" value="ชาย" @if(!empty($employee->e_gender) && ($employee->e_gender == 'ชาย')) checked @endif> ชาย
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="gender" id="gender" type="radio" value="หญิง" @if(!empty($employee->e_gender) && ($employee->e_gender == 'หญิง')) checked @endif> หญิง
                                </div>
                            </div>

                            @if(!empty($employee->e_credit))
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หลักฐานบุคลากร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <img src="{{ asset('dist/images/test.jpg') }}"> -->
                                    <img src="{{asset('public/upload/img').'/'.$employee->e_credit}}">
                                </div>
                            </div>
                            @endif

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แก้ไขการลงทะเบียน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="employee_detail" name="employee_detail" rows="10">{{$employee->e_note}}</textarea>
                                </div>
                                <!-- <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="news_detail" id="news_detail" class="form-control box-form-ct" cols="30" rows="10"></textarea>
                                </div> -->
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('company/cfUser')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <button type="submit" class="btn btn-success w-24 ml-2">ยืนยันการลงทะเบียน</button> -->
                                <button type="submit" value="1" name="button_employee" class="btn btn-success w-50">ยืนยันลงการทะเบียน</button>
                                <button type="submit" value="2" name="button_employee" class="btn btn-primary w-50">แก้ไขลงการทะเบียน</button>
                                <button type="submit" value="3" name="button_employee" class="btn btn-danger w-50">ยกเลิกลงการทะเบียน</button>

                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    ClassicEditor
    .create( document.querySelector( '#employee_detail' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection





</body>
</html>
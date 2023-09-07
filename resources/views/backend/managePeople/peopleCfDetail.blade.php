<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "people";
$active = "peopleCF";
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
                <form action="{{ url('backend/peopleCf/CF/'.$user->id) }}" method="post" enctype="multipart/form-data">
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
                                    <input class="form-control box-form-ct" name="title" type="text" id="formFile" Placeholder="คำนำหน้า" required value="{{$user->e_title}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="fname" type="text" id="formFile" Placeholder="ชื่อ" required value="{{$user->e_fname}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="lname" type="text" id="formFile" Placeholder="นามสกุล" required value="{{$user->e_lname}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> อีเมล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="e_email" type="text" id="formFile" Placeholder="อีเมล" required value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="phone" type="text" id="formFile" Placeholder="หมายเลขโทรศัพท์" required value="{{$user->e_phone}}">
                                </div>
                            </div>

                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="pass" type="password" id="formFile" Placeholder="รหัสผ่าน">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="passCf" type="password" id="formFile" Placeholder="ยืนยันรหัสผ่าน">
                                </div>
                            </div> -->

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันเกิด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="birthday" type="date" id="formFile" required value="{{$user->e_birth}}">
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
                                    <input class="form-control box-form-ct" name="address_now" type="text" id="formFile" Placeholder="ที่อยู่" required value="{{$user->addressNO_now}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="povices_now" id="povices_now" class="form-control select2" onchange="provinceNow()" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกจังหวัด -</option> -->
                                        @foreach($provinces as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($user->FKe_province_now) && ($user->FKe_province_now == $rs->id)) selected @endif>{{$rs->name_th}}</option>
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
                                    <select name="aumphur_now" id="aumphur_now" class="form-control select2" onchange="amphureNow()" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option> -->
                                        @foreach($amphures as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($user->FKe_amphur_now) && ($user->FKe_amphur_now == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล {{$user->FKe_tambon_now}}</lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="tumbon_now" id="tumbon_now" class="form-control select2" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option> -->
                                        @foreach($districts as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($user->FKe_tambon_now) && ($user->FKe_tambon_now == $rs->id)) selected @endif>{{$rs->name_th}}</option>
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
                                    <input class="form-control box-form-ct" name="postcode_now" type="text" id="formFile" Placeholder="รหัสไปรษรีย์" required value="{{$user->postcode_now}}">
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
                                    <input class="form-control box-form-ct" name="address_past" type="text" id="formFile" Placeholder="ที่อยู่" required value="{{$user->addressNO_past}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="povices_past" id="povices_past" class="form-control select2" onchange="provincepast()" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกจังหวัด -</option> -->
                                        @foreach($provinces as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($user->FKe_province_past) && ($user->FKe_province_past == $rs->id)) selected @endif>{{$rs->name_th}}</option>
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
                                    <select name="aumphur_past" id="aumphur_past" class="form-control select2" onchange="amphurepast()" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option> -->
                                        @foreach($amphures as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($user->FKe_amphur_past) && ($user->FKe_amphur_past == $rs->id)) selected @endif>{{$rs->name_th}}</option>
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
                                    <select name="tumbon_past" id="tumbon_past" class="form-control select2" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option> -->
                                        @foreach($districts as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($user->FKe_tambon_past) && ($user->FKe_tambon_past == $rs->id)) selected @endif>{{$rs->name_th}}</option>
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
                                    <input class="form-control box-form-ct" name="postcode_past" type="text" id="formFile" Placeholder="รหัสไปรษรีย์" required value="{{$user->postcode_past}}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เพศ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="gender" type="radio" value="ชาย" @if(!empty($user->e_gender) && ($user->e_gender == 'ชาย')) checked @endif> ชาย
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="gender" type="radio" value="หญิง" @if(!empty($user->e_gender) && ($user->e_gender == 'หญิง')) checked @endif> หญิง
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุการแก้ไข </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="employ_note" name="employ_note" rows="10"></textarea>
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('backend/peopleCf')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    ClassicEditor
    .create( document.querySelector( '#employ_note' ) )
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

<script>
function provinceNow($id) {
    var provice = $('#povices_now').val();
    // alert('asd');
    if(provice == ''){
    }else{
        $.ajax({
            'type': 'post',
            'url': "{{ url('searchProvice') }}",
            'dataType': 'json',
            'data': { 
                'provice'            : provice,
                '_token'        : "{{csrf_token()}}"  
            },
           'success': function (data){
            $('#aumphur_now').html(data.html);
                
            } 
        });  
    }
}
function amphureNow() {
    var amphure = $('#aumphur_now').val();
    if(amphure == ''){
    }else{
        $.ajax({
            'type': 'post',
            'url': "{{ url('searchAmphure') }}",
            'dataType': 'json',
            'data': { 
                'amphure'            : amphure,
                '_token'        : "{{csrf_token()}}"  
            },
           'success': function (data){
            $('#tumbon_now').html(data.html);
                
            } 
        });  
    }
}

function provincepast($id) {
    var provice = $('#povices_past').val();
    // alert('asd');
    if(provice == ''){
    }else{
        $.ajax({
            'type': 'post',
            'url': "{{ url('searchProvice') }}",
            'dataType': 'json',
            'data': { 
                'provice'            : provice,
                '_token'        : "{{csrf_token()}}"  
            },
           'success': function (data){
            $('#aumphur_past').html(data.html);
                
            } 
        });  
    }
}
function amphurepast() {
    var amphure = $('#aumphur_past').val();
    if(amphure == ''){
    }else{
        $.ajax({
            'type': 'post',
            'url': "{{ url('searchAmphure') }}",
            'dataType': 'json',
            'data': { 
                'amphure'            : amphure,
                '_token'        : "{{csrf_token()}}"  
            },
           'success': function (data){
            $('#tumbon_past').html(data.html);
                
            } 
        });  
    }
}
</script>
@endsection





</body>
</html>
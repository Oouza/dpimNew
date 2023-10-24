<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterCompany')
<?php
$activePage = "setting";
$active = "";
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
                    <div class="font-medium text-center text-lg">แก้ไขประวัติ</div>
                   
                </div>
                <form action="{{ url('company/update/'.$hr->id) }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>
                    @if(session("success"))
                        <b class="text-danger">{{session('success')}}</b>
                    @endif

                    @if(!empty($user->ch_note))
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเหตุแก้ไขข้อมูล </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {!! asset($user->ch_note )?$user->ch_note :''!!}
                        </div>
                    </div>
                    @endif

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ประเภทสถานประกอบการ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="type_company" id="type_company" class="form-control" disabled>
                                <option @if($hr->c_typeCompany == "เหมืองแร่") selected @endif value="เหมืองแร่">เหมืองแร่</option>
                                <option @if($hr->c_typeCompany == "โรงโม่หิน") selected @endif value="โรงโม่หิน">โรงโม่หิน</option>
                                <option @if($hr->c_typeCompany == "โรงแต่งแร่") selected @endif value="โรงแต่งแร่">โรงแต่งแร่</option>
                                <option @if($hr->c_typeCompany == "โรงประกอบโลหกรรม") selected @endif value="โรงประกอบโลหกรรม">โรงประกอบโลหกรรม</option>
                                <option @if($hr->c_typeCompany == "ผู้รับเหมางานเหมืองแร่") selected @endif value="ผู้รับเหมางานเหมืองแร่">ผู้รับเหมางานเหมืองแร่</option>
                                <option @if($hr->c_typeCompany == "อื่นๆ") selected @endif value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเลขประทานบัตร/เลขที่ใบอนุญาต </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="no" type="text" id="formFile" value="{{$hr->c_licenseNo}}" disabled>
                        </div>
                    </div>
                    <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> วันที่ออกประทานบัตร/ใบอนุญาต </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="news_name" type="date" id="formFile" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> วันที่ประทานบัตร/ใบอนุญาตสิ้นอายุ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="news_name" type="date" id="formFile" required>
                        </div>
                    </div> -->
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชื่อสถานประกอบการ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="company_name" type="text" id="formFile" value="{{$hr->c_nameCompany}}" disabled>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชนิดแร่หลัก </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="mineralMain" id="mineralMain" class="form-control" disabled>
                                @foreach($minerals as $rs)
                                <option @if($hr->c_typeCompany == $rs->tm_id) selected @endif value="{{$rs->tm_id}}">{{$rs->tm_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> สถานที่ตั้ง </lable></b>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ที่อยู่ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="address_no" type="text" id="address_no" value="{{$hr->c_addressNo}}" required>
                        </div>
                    </div><div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="povices_now" id="povices_now" class="form-control select2" onchange="provinceNow()">
                                @foreach($provinces as $rs)
                                <option value="{{$rs->id}}" @if((!empty($hr->FKc_provinces)) && ($hr->FKc_provinces == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> เขต/อำเภอ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="aumphur_now" id="aumphur_now" class="form-control select2" onchange="amphureNow()">
                                @foreach($amphures as $rs)
                                <option value="{{$rs->id}}" @if(!empty($hr->FKc_amphur) && ($hr->FKc_amphur == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="tumbon_now" id="tumbon_now" class="form-control select2">
                                @foreach($districts as $rs)
                                <option value="{{$rs->id}}" @if(!empty($hr->FKc_tumbon) && ($hr->FKc_tumbon == $rs->id)) selected @endif>{{$rs->name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษณีย์ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="postcode" type="text" id="postcode" value="{{$hr->c_postCode}}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label"> ข้อมูลผู้ติดต่อ </lable></b>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> คำนำหน้าชื่อ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="title" type="text" id="title" value="{{$hr->ch_title}}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="fname" type="text" id="fname" value="{{$hr->ch_fname}}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="lname" type="text" id="lname" value="{{$hr->ch_lname}}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="phone" type="text" id="phone" value="{{$hr->ch_phone}}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> อีเมล </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="email" type="text" id="email" value="{{$hr->email}}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="pass" type="password" id="pass" placeholder="">
                            <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข และมีสัญลักษณ์</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="passCf" type="password" id="passCf" placeholder="">
                            <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข และมีสัญลักษณ์</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หลักฐานการเป็นสถานประกอบการ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="credti" type="file" id="credti">
                        </div>
                    </div>

                    @if(!empty($hr->ch_credit))
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <!-- <b><label for="horizontal-form-1" class="form-label "> หลักฐานการเป็นสถานประกอบการ </lable></b> -->
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <img src="{{asset('public/upload/img').'/'.$hr->ch_credit}}">
                            <!-- <img src="{{ asset('dist/images/test.jpg') }}"> -->
                        </div>
                    </div>
                    @endif
                            </div>
                            </div>
                           <br><br><br>
                            <center>

                            <!-- <a href="{{url('indexUser')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a> -->
                            <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        

                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script> 
    function checkPassword(form) { 
        password1 = form.pass.value; 
        password2 = form.passCf.value; 
        
        var extall = "jpg,jpeg,gif,png";
        var fileInput = document.getElementById("credti");
        var file = fileInput.value;
        var ext = file.split('.').pop().toLowerCase();
        
        if (extall.indexOf(ext) < 0) {
            alert('รองรับไฟล์นามสกุล : ' + extall);
            return false;
        }
        if (password1 != password2) { 
            alert("รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง") 
            return false; 
        }elseif(empty(password1) && empty(password2)){
        }else {
            if (password1.length < 8) {
                alert("รหัสผ่านของคุณน้อยกว่า 8 ตัวอักษร กรุณากรอกรหัสผ่านใหม่อีกครั้ง") 
                return false; 
            } else if (password1.length > 20) {
                alert("รหัสผ่านของคุณมากกว่า 20 ตัวอักษร กรุณากรอกรหัสผ่านใหม่อีกครั้ง") 
                return false; 
            } 
            if(password1.match(/[a-z]/)) {
            } else {
                alert('รหัสผ่านของคุณไม่มีตัวอักษรพิมพ์เล็ก กรุณากรอกรหัสผ่านใหม่อีกครั้ง');
                return false; 
            }
            if(password1.match(/[A-Z]/)) {
            } else {
                alert('รหัสผ่านของคุณไม่มีตัวอักษรพิมพ์ใหญ่ กรุณากรอกรหัสผ่านใหม่อีกครั้ง');
                return false; 
            }
            if(password1.match(/.[-, \, #, \, $, \, ., \, %, \, &, \, @, \, !, \, +, \, =, \, <, \, >, \, *, _]/)){
            }else{
                alert('รหัสผ่านของคุณไม่มีสัญลักษณ์ กรุณากรอกรหัสผ่านใหม่อีกครั้ง');
                return false;
            }
            if(password1.match(/\d+/)){
            }else{
                alert('รหัสผ่านของคุณไม่มีตัวเลข กรุณากรอกรหัสผ่านใหม่อีกครั้ง');
                return false;
            }
        }
    } 
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
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#news_detail' ) )
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
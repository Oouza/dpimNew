<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "people";
$active = "managePeople";
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
                    <div class="font-medium text-center text-lg">เพิ่มบุคลากร</div>
                   
                </div>
                <form action="{{ url('backend/people/add') }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
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
                                    <input class="form-control box-form-ct" name="title" type="text" id="formFile" Placeholder="คำนำหน้า" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="fname" type="text" id="formFile" Placeholder="ชื่อ" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="lname" type="text" id="formFile" Placeholder="นามสกุล" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> อีเมล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="e_email" type="text" id="formFile" Placeholder="อีเมล" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="phone" type="text" id="formFile" Placeholder="หมายเลขโทรศัพท์" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="pass" type="password" id="formFile" Placeholder="รหัสผ่าน" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="passCf" type="password" id="formFile" Placeholder="ยืนยันรหัสผ่าน" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันเกิด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="birthday" type="date" id="formFile" required>
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
                                    <input class="form-control box-form-ct" name="address_now" type="text" id="formFile" Placeholder="ที่อยู่" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="povices_now" id="povices_now" class="form-control select2" onchange="provinceNow()" required>
                                        <option value="" hidden>- กรุณาเลือกจังหวัด -</option>
                                        @foreach($provinces as $rs)
                                        <option value="{{$rs->id}}">{{$rs->name_th}}</option>
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
                                        <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="tumbon_now" id="tumbon_now" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
                                        <option value="1">บางแค</option>
                                        <option value="2">ตำบล 2</option>
                                        <option value="3">ตำบล 3</option>
                                        <option value="4">ตำบล 4</option>
                                        <option value="5">ตำบล 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษรีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="postcode_now" type="text" id="formFile" Placeholder="รหัสไปรษรีย์" required>
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
                                    <input class="form-control box-form-ct" name="address_past" type="text" id="formFile" Placeholder="ที่อยู่" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="povices_past" id="povices_past" class="form-control select2" onchange="provincepast()" required>
                                        <option value="" hidden>- กรุณาเลือกจังหวัด -</option>
                                        @foreach($provinces as $rs)
                                        <option value="{{$rs->id}}">{{$rs->name_th}}</option>
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
                                        <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option>
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
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษรีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="postcode_past" type="text" id="formFile" Placeholder="รหัสไปรษรีย์" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เพศ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="gender" type="radio" value="ชาย"> ชาย
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="gender" type="radio" value="หญิง"> หญิง
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('backend/people')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-50">บันทึก</button>
                            
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script> 
	// Function เพื่อตรวจสอบรหัสผ่านว่าตรงกันหรือไม่
	function checkPassword(form) { 
		password1 = form.pass.value; 
		password2 = form.passCf.value; 
        if (password1 != password2) { 
			alert ("Password did not match: Please try again...") 
			return false; 
		} 
	} 
</script>

<script>
    $(document).ready(function(){
        $('#povices_now').select2({
            placeholder: "- กรุณาเลือกจังหวัด -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#aumphur_now').select2({
            placeholder: "- กรุณาเลือกเขต/อำเภอ -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#tumbon_now').select2({
            placeholder: "- กรุณาเลือกแขวง/ตำบล -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#povices_past').select2({
            placeholder: "- กรุณาเลือกจังหวัด -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#aumphur_past').select2({
            placeholder: "- กรุณาเลือกเขต/อำเภอ -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#tumbon_past').select2({
            placeholder: "- กรุณาเลือกแขวง/ตำบล -",
            allowClear: true
        });
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
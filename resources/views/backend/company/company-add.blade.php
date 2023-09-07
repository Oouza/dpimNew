<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "company";
$active = "manage";
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
                    <div class="font-medium text-center text-lg">เพิ่มสถานประกอบการ</div>
                   
                </div>
                <form action="{{ url('backend/company/add') }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
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
                            <b><label for="horizontal-form-1" class="form-label "> ประเภทสถานประกอบการ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="type_company" id="type_company" class="form-control select2" required>
                                <option value="" hidden>- กรุณาเลือกประเภทสถานประกอบการ -</option>
                                <option value="เหมืองแร่">เหมืองแร่</option>
                                <option value="โรงโม่หิน">โรงโม่หิน</option>
                                <option value="โรงแต่งแร่">โรงแต่งแร่</option>
                                <option value="โรงประกอบโลหกรรม">โรงประกอบโลหกรรม</option>
                                <option value="ผู้รับเหมางานเหมืองแร่">ผู้รับเหมางานเหมืองแร่</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> เลขที่หมายเลขประทานบัตร/ใบอนุญาต </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="no_company" type="text" id="formFile" Placeholder="เลขที่หมายเลขประทานบัตร/ใบอนุญาต" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> วันที่ออกประทานบัตร/ใบอนุญาต </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="date_start" type="date" id="formFile" Placeholder="วันที่ออกประทานบัตร/ใบอนุญาต" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> วันที่ประทานบัตร/ใบอนุญาตสิ้นอายุ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="date_end" type="date" id="formFile" Placeholder="วันที่ประทานบัตร/ใบอนุญาตสิ้นอายุ" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชื่อสถานประกอบการ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="name_company" type="text" id="formFile" Placeholder="ชื่อสถานประกอบการ" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชนิดแร่หลัก </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <!-- <select name="type" id="type" class="form-control select2" required>
                                <option value="" hidden>- กรุณาเลือกชนิดแร่หลัก -</option>
                                <option value="1">โลหะ</option>
                                <option value="2">ทอง</option>
                                <option value="3">หิน</option>
                            </select> -->
                            <select name="mineral" id="mineral" class="form-control select2" required>
                                <option value="" hidden>- กรุณาเลือกชนิดแร่หลัก -</option>
                                @foreach($mineral as $rs)
                                <option value="{{$rs->tm_id}}"> {{$rs->tm_name}} </option>
                                @endforeach
                                <!-- <option value=""> ประเภทแร่ 3</option> -->
                            </select>
                        </div>
                    </div>                    
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชนิดแร่รอง </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input type="text" class="form-control" name="mineralSub">
                        </div>
                    </div>    

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="phone_company" type="text" id="formFile" Placeholder="หมายเลขโทรศัพท์" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label"> สถานที่ตั้ง </lable></b>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ที่อยู่ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="address_no" type="text" id="formFile" Placeholder="ที่อยู่" required>
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
                                <!-- <option value="1">บางแค</option>
                                <option value="2">ตำบล 2</option>
                                <option value="3">ตำบล 3</option>
                                <option value="4">ตำบล 4</option>
                                <option value="5">ตำบล 5</option> -->
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษณีย์ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="postcode" type="text" id="formFile" Placeholder="รหัสไปรษณีย์" required>
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
                            <input class="form-control box-form-ct" name="title" type="text" id="formFile" Placeholder="คำนำหน้าชื่อ" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="people_fname" type="text" id="formFile" Placeholder="ชื่อ" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="people_lname" type="text" id="formFile" Placeholder="นามสกุล" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="people_phone" type="text" id="formFile" Placeholder="หมายเลขโทรศัพท์" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input name="position" type="radio" id="formFile" value="ผู้บริหาร" required> ผู้บริหาร
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="position" type="radio" id="formFile" value="HR" required> HR
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label"> อีเมล </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="people_email" type="text" id="formFile" Placeholder="อีเมล" required>
                        </div>
                    </div>          
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="pass" type="password" id="pass" Placeholder="รหัสผ่าน" required>
                            <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข และมีสัญลักษณ์</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="passCf" type="password" id="passCf" Placeholder="ยืนยันรหัสผ่าน" required>
                            <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข และมีสัญลักษณ์</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หลักฐานฯ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="credti" type="file" id="formFile">
                        </div>
                    </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                            <a href="{{url('backend/company')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
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
    $(document).ready(function(){
        $('#type_company').select2({
            placeholder: "- กรุณาเลือกประเภทสถานประกอบการ -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#mineral').select2({
            placeholder: "- กรุณาเลือกชนิดแร่หลัก -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#povices').select2({
            placeholder: "- กรุณาเลือกจังหวัด -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#aumphur').select2({
            placeholder: "- กรุณาเลือกเขต/อำเภอ -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#tumbon').select2({
            placeholder: "- กรุณาเลือกแขวง/ตำบล -",
            allowClear: true
        });
    });
</script>

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

@endsection





</body>
</html>
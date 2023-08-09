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
                    <div class="font-medium text-center text-lg">แก้ไขสถานประกอบการ</div>
                   
                </div>
                <form action="{{ url('backend/company/update/'.$user->FKch_userid) }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ประเภทสถานประกอบการ</lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="type_company" id="type_company" class="form-control select2" required>
                                <option @if($user->c_typeCompany == 'เหมืองแร่') selected @endif value="เหมืองแร่">เหมืองแร่</option>
                                <option @if($user->c_typeCompany == 'โรงโม่หิน') selected @endif value="โรงโม่หิน">โรงโม่หิน</option>
                                <option @if($user->c_typeCompany == 'โรงแต่งแร่') selected @endif value="โรงแต่งแร่">โรงแต่งแร่</option>
                                <option @if($user->c_typeCompany == 'โรงประกอบโลหกรรม') selected @endif value="โรงประกอบโลหกรรม">โรงประกอบโลหกรรม</option>
                                <option @if($user->c_typeCompany == 'ผู้รับเหมางานเหมืองแร่') selected @endif value="ผู้รับเหมางานเหมืองแร่">ผู้รับเหมางานเหมืองแร่</option>
                                <option @if($user->c_typeCompany == 'อื่นๆ') selected @endif value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> เลขที่หมายเลขประทานบัตร/ใบอนุญาต </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="licenseNo" type="text" id="licenseNo" value="{{$user->c_licenseNo}}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> วันที่ออกประทานบัตร/ใบอนุญาต </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="startDate" type="date" id="startDate" value="{{$user->c_startDate}}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> วันที่ประทานบัตร/ใบอนุญาตสิ้นอายุ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="endDate" type="date" id="endDate" value="{{$user->c_endDate}}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชื่อสถานประกอบการ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="nameCompany" type="text" id="nameCompany" value="{{$user->c_nameCompany}}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชนิดแร่หลัก {{$user->FKc_typemineral}}</lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="typemineral" id="typemineral" class="form-control select2" required>
                                @foreach($mineral as $rs)
                                <option @if($user->FKc_typemineral == $rs->tm_id) selected @endif value="{{$rs->tm_id}}"> {{$rs->tm_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>            
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชนิดแร่รอง </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input type="text" class="form-control" name="typeMineralSub" id="typeMineralSub" @if(!empty($user->c_typeMineralSub)) value="{{$user->c_typeMineralSub}}" @endif>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="c_phone" type="text" id="c_phone" value="{{$user->c_phone}}" required>
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
                            <input class="form-control box-form-ct" name="addressNo" type="text" id="addressNo" value="{{$user->c_addressNo}}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="provinc" id="provinc" class="form-control select2" onchange="provinceNow()">
                                <!-- <option value="" hidden>- กรุณาเลือกจังหวัด -</option> -->
                                @foreach($provinces as $rs)
                                <option @if($user->FKc_provinces == $rs->id) selected @endif value="{{$rs->id}}">{{$rs->name_th}}</option>
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
                            <select name="amphur" id="amphur" class="form-control select2" onchange="amphureNow()">
                                <!-- <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option> -->
                                @foreach($amphures as $rs)
                                <option @if($user->FKc_amphur == $rs->id) selected @endif value="{{$rs->id}}">{{$rs->name_th}}</option>
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
                            <select name="tumbon" id="tumbon" class="form-control select2">
                                <!-- <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option> -->
                                @foreach($districts as $rs)
                                <option @if($user->FKc_tumbon == $rs->id) selected @endif value="{{$rs->id}}">{{$rs->name_th}}</option>
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
                            <input class="form-control box-form-ct" name="postCode" type="text" id="postCode" value="{{$user->c_postCode}}" required>
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
                            <input class="form-control box-form-ct" name="title" type="text" id="title" value="{{$user->ch_title}}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="fname" type="text" id="fname" value="{{$user->ch_fname}}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="lname" type="text" id="lname" value="{{$user->ch_lname}}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="ch_phone" type="text" id="ch_phone" value="{{$user->ch_phone}}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input name="position" type="radio" id="position" value="ผู้บริหาร" @if($user->ch_position == 'ผู้บริหาร') checked @endif> ผู้บริหาร
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="position" type="radio" id="position" value="HR" @if($user->ch_position == 'HR') checked @endif> HR
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label"> อีเมล </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="email" type="text" id="email" value="{{$user->email}}" required>
                        </div>
                    </div>          
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="password" type="password" id="password" Placeholder="รหัสผ่าน">
                            <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข และมีสัญลักษณ์</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="passwordCF" type="password" id="passwordCF" Placeholder="ยืนยันรหัสผ่าน">
                            <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข และมีสัญลักษณ์</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หลักฐานฯ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="credit" type="file" id="credit">
                        </div>
                    </div>

                    @if(!empty($user->ch_credit))
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หลักฐานฯเดิม </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                            <img src="{{asset('public/upload/img').'/'.$user->ch_credit}}">
                            <!-- <img src="{{ asset('dist/images/test.jpg') }}"> -->
                        </div>
                    </div>
                    @endif

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
<script> 
	// Function เพื่อตรวจสอบรหัสผ่านว่าตรงกันหรือไม่
	function checkPassword(form) { 
		password1 = form.password.value; 
		password2 = form.passwordCF.value; 
        if (password1 != password2) { 
			alert ("Password did not match: Please try again...") 
			return false; 
		} 
	}
    
    function provinceNow($id) {
        var provice = $('#provinc').val();
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
                $('#amphur').html(data.html);
                    
                } 
            });  
        }
    }
    function amphureNow() {
        var amphure = $('#amphur').val();
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
                $('#tumbon').html(data.html);
                    
                } 
            });  
        }
    }
</script>

<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection





</body>
</html>
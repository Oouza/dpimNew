<?php
$activePage = "index";
?>
<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Login - Midone - Tailwind HTML Admin Template</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                        <span class="text-white text-lg ml-3"> ระบบคลังข้อมูลสำหรับติดตามการพัฒนาทักษะ<br>ของบุคลากรในอุตสาหกรรมเหมืองแร่ </span> 
                    </a>
                    <div class="my-auto">
                        <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            <!-- A few more clicks to  -->
                            <br>
                            <!-- sign in to your account. -->
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400"></div>
                    </div>
                    <a href="" class="-intro-x flex items-center pt-5">
                    <img class="-intro-x w-1/2 -mt-16" style="width:60px;height:60px;margin-bottom:0px;margin-left:-50px;" src="dist/images/logo.png">
                        <span class="text-white text-lg ml-3" style="margin-bottom:60px;"> กรมอุตสาหกรรมพื้นฐานและการเหมืองแร่ 0 2430 6847 ต่อ 4731 </span> 
                    </a>
                    <!-- <img class="-intro-x w-1/2 -mt-16" style="width:60px;height:60px;margin-bottom:30px;margin-left:-50px;" src="dist/images/logo.jpg">
                    <span class="text-white text-lg ml-3"> กรมอุตสาหกรรมพื้นฐานและการเหมืองแร่ 0 2430 6847 ต่อ 4731 </span>  -->

                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                
                <div class="content" style="background-color:#fff;margin-left:-10%; margin-right:-15%; height: 50px; overflow: auto;scrollbar-width: none;">              
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <form method="post" action="{{ url('company/add') }}" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
                        @csrf
                            <h2 class="intro-x font-bold text-2xl xl:text-2xl text-center xl:text-left" >
                            ลงทะเบียน สถานประกอบการ รายใหม่
                            </h2>
                            @if(session("success"))
                                <b class="text-danger">{{session('success')}}</b>
                            @endif
                            <div class="intro-x mt-2 text-slate-400 xl:hidden text-center"></div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทสถานประกอบการ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="type_company" id="type_company" class="form-control">
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
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขประทานบัตร/เลขที่ใบอนุญาต </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="no_company" type="text" id="formFile" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันที่ออกประทานบัตร/ใบอนุญาต </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="date_start" type="date" id="formFile" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันที่ประทานบัตร/ใบอนุญาตสิ้นอายุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="date_end" type="date" id="formFile" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อสถานประกอบการ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="name_company" type="text" id="formFile" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชนิดแร่หลัก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="mineral" id="mineral" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกชนิดแร่หลัก -</option>
                                        @foreach($mineral as $rs)
                                        <option value="{{$rs->tm_id}}"> {{$rs->tm_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชนิดแร่รอง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="mineralSub" type="text" id="mineralSub">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="phone_company" type="text" id="phone_company" required>
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
                                    <input class="form-control box-form-ct" name="address_no" type="text" id="address_no" required>
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
                                    <select name="tumbon_now" id="tumbon_now" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษณีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="postcode" type="text" id="postcode" required>
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
                                    <input class="form-control box-form-ct" name="title" type="text" id="title" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="people_fname" type="text" id="people_fname" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="people_lname" type="text" id="people_lname" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="people_phone" type="text" id="people_phone" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="position" type="radio" id="position" value="ผู้บริหาร" required> ผู้บริหาร
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="position" type="radio" id="position" value="HR" required> HR
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> อีเมล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="people_email" type="text" id="people_email" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="pass" type="password" id="pass" placeholder="" required>
                                    <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข<br>และมีสัญลักษณ์</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="passCf" type="password" id="passCf" placeholder="" required>
                                    <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข<br>และมีสัญลักษณ์</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หลักฐานการเป็นสถานประกอบการ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="credti" type="file" id="credti" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <!-- <a href="{{url('successUser')}}"> -->
                                        <button class="btn btn-primary py-3 px-4 w-full xl:w-36 xl:mr-3 align-top">ยืนยันการลงทะเบียน</button>
                                    <!-- </a> -->
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <a href="{{url('loginCompany')}}" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                                        <!-- <button> -->
                                            เข้าสู่ระบบ
                                        <!-- </button> -->
                                    </a>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        <!-- <div data-url="login-dark-login.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
            <div class="dark-mode-switcher__toggle border"></div>
        </div> -->
        <!-- END: Dark Mode Switcher-->
        
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
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
        </script>

        <script> 
            function checkPassword(form) { 
                password1 = form.pass.value; 
                password2 = form.passCf.value; 
                
                var extall = "jpg,jpeg,gif,png";
                var fileInput = document.getElementById("credti");
                var file = fileInput.value;
                var ext = file.split('.').pop().toLowerCase();
                
                var position = form.position.value;
                if (!position) {
                    alert('กรุณาเลือกตำแหน่ง');
                    return false;
                }

                if (extall.indexOf(ext) < 0) {
                    alert('รองรับไฟล์นามสกุล : ' + extall);
                    return false;
                }
                if (password1 != password2) { 
                    alert("รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง") 
                    return false; 
                } else {
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

                    if(password1.match(/.[-, \, #, \, $, \, ., \, %, \, &, \, @, \, !, \, +, \, =, \, <, \, >, \, *]/)){
                    }else{
                        alert('รหัสผ่านของคุณไม่มีสัญลักษณ์ กรุณากรอกรหัสผ่านใหม่อีกครั้ง');
                        return false;
                    }

                    if(password1.match(/\d+/)){
                    }else{
                        alert('รหัสผ่านของคุณตัวเลข กรุณากรอกรหัสผ่านใหม่อีกครั้ง');
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
        <!-- END: JS Assets-->
    </body>
</html>
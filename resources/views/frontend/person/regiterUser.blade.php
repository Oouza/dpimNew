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
                        <form method="post" action="{{ url('employee/add') }}" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
                        @csrf
                            <h2 class="intro-x font-bold text-2xl xl:text-2xl text-center xl:text-left" >
                            ลงทะเบียน บุคลากร รายใหม่
                            </h2>
                            @if(session("success"))
                                <b class="text-danger">{{session('success')}}</b>
                            @endif
                            <div class="intro-x mt-2 text-slate-400 xl:hidden text-center"></div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label"> คำนำหน้า </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="e_title" type="text" id="e_title" Placeholder="คำนำหน้า">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="e_fname" type="text" id="e_fname" Placeholder="ชื่อ">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="e_lname" type="text" id="e_lname" Placeholder="นามสกุล">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เพศ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="radio" value="ชาย" name="gender"> ชาย
                                    <input type="radio" value="หญิง" name="gender"> หญิง
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันเกิด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="birth" type="date" id="birth">
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
                                    <input class="form-control box-form-ct" name="address_now" type="text" id="address_now" Placeholder="ที่อยู่">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="povices_now" id="povices_now" class="form-control" onchange="provinceNow()">
                                        <option value="" hidden>- กรุณาเลือกจังหวัด -</option>
                                        @foreach($provinces as $rs)
                                        <option value="{{$rs->id}}">{{$rs->name_th}}</option>
                                        @endforeach
                                        <!-- <option value="">กรุงเทพ</option>
                                        <option value="">กระบี่</option>
                                        <option value="">กาญจนบุรี</option>
                                        <option value="">กาฬสินธุ์</option>
                                        <option value="">กำแพงเพชร</option> -->
                                    </select>
                                </div>
                            </div>                    
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เขต/อำเภอ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="aumphur_now" id="aumphur_now" class="form-control" onchange="amphureNow()">
                                        <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option>
                                        <!-- <option value="">บางแค</option>
                                        <option value="">อำเภอ 2</option>
                                        <option value="">อำเภอ 3</option>
                                        <option value="">อำเภอ 4</option>
                                        <option value="">อำเภอ 5</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="tumbon_now" id="tumbon_now" class="form-control">
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
                                        <!-- <option value="">บางแค</option>
                                        <option value="">ตำบล 2</option>
                                        <option value="">ตำบล 3</option>
                                        <option value="">ตำบล 4</option>
                                        <option value="">ตำบล 5</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษรีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="postcode_now" type="text" id="postcode_now" Placeholder="รหัสไปรษรีย์">
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
                                    <input class="form-control box-form-ct" name="address_past" type="text" id="address_past" Placeholder="ที่อยู่">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="povices_past" id="povices_past" class="form-control" onchange="provincepast()">
                                        <option value="" hidden>- กรุณาเลือกจังหวัด -</option>
                                        @foreach($provinces as $rs)
                                        <option value="{{$rs->id}}">{{$rs->name_th}}</option>
                                        @endforeach
                                        <!-- <option value="">กรุงเทพ</option>
                                        <option value="">กระบี่</option>
                                        <option value="">กาญจนบุรี</option>
                                        <option value="">กาฬสินธุ์</option>
                                        <option value="">กำแพงเพชร</option> -->
                                    </select>
                                </div>
                            </div>                    
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เขต/อำเภอ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="aumphur_past" id="aumphur_past" class="form-control" onchange="amphurepast()">
                                        <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option>
                                        <!-- <option value="">บางแค</option>
                                        <option value="">อำเภอ 2</option>
                                        <option value="">อำเภอ 3</option>
                                        <option value="">อำเภอ 4</option>
                                        <option value="">อำเภอ 5</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="tumbon_past" id="tumbon_past" class="form-control">
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
                                        <!-- <option value="">บางแค</option>
                                        <option value="">ตำบล 2</option>
                                        <option value="">ตำบล 3</option>
                                        <option value="">ตำบล 4</option>
                                        <option value="">ตำบล 5</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษรีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="postcode_past" type="text" id="postcode_past" Placeholder="รหัสไปรษรีย์">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">หมายเลขโทรศัพท์</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="e_phone" class="form-control box-form-ct" Placeholder="หมายเลขโทรศัพท์">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">อีเมล</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="e_email" class="form-control box-form-ct" Placeholder="อีเมล">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="pass" type="password" id="pass" Placeholder="รหัสผ่าน">
                                    <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข<br>และมีสัญลักษณ์</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="passCF" type="password" id="passCF" Placeholder="ยืนยันรหัสผ่าน">
                                    <div class="text-danger mt-2">ต้องมีตัวหนังสือ 8-20 ตัว มีตัวอักษรใหญ่และเล็ก มีตัวเลข<br>และมีสัญลักษณ์</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <!-- <a href="{{url('success')}}"> -->
                                        <button class="btn btn-primary py-3 px-4 w-full xl:w-36 xl:mr-3 align-top">ยืนยันการลงทะเบียน</button>
                                    <!-- </a> -->
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <a href="{{url('loginCompany')}}"> <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">เข้าสู่ระบบ</button> </a>
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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script> 
            // Function เพื่อตรวจสอบรหัสผ่านว่าตรงกันหรือไม่
            function checkPassword(form) { 
                password1 = form.pass.value; 
                password2 = form.passCF.value; 
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
        <!-- END: JS Assets-->
    </body>
</html>
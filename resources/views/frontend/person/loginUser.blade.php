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
        <style>
            .btn-green {
                background-color: #1E40AF;
                color: white;
            }
            .btn-green:hover {
                color: white;
                box-shadow: 0 0 50px rgba(0, 0, 0, 0.5) inset;
            }
            .box-cookie {
                background-color: white;
                border: 1px solid #a3a3a3;
                box-shadow: 0px 2px 50px 7px rgba(0, 0, 0, 0.2);
                padding: 25px 40px;
                border-radius: 10px;
                position: fixed;
                transform: translate(-50%, -40px);
                left: 50%;
                bottom: 0;
                width: 1340px;
                max-width: 90%;
                z-index: 999;
            }
            .text-green {
                color: rgba(var(--color-green), var(--opa-1));
            }
            @media screen and (max-width: 767px) {
                .list-group-item {
                    padding: 0.5rem 0rem;
                }
                .box-cookie {
                    padding: 25px 20px;
                }
            }
            h6 {
                line-height: 1.7;
            }
        </style>
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
                
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
              
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <center>
                        <a href="{{url('/')}}">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">
                                สำหรับบุคลากร
                            </button>
                        </a>
                        <a href="{{url('loginCompany')}}">
                            <button class="btn btn-outline-secondary py-3 px-4 align-top">
                                สำหรับสถานประกอบการ
                            </button>
                        </a>
                    </center>
                    <br>
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        เข้าสู่ระบบสำหรับบุคลากร
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center"></div>
                        <div class="intro-x mt-8">
                        <input type="text" class="intro-x login__input form-control py-3 px-4 block @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email" autofocus >
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                             
                            <input type="password"  id="password" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        
                        </div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <!-- <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label> -->
                            </div>
                            <!-- <a href="">Forgot Password?</a>  -->
                        </div>
                        <br>
                        <center>
                            <!-- <a href="{{url('indexUser')}}"> -->
                                <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">
                                    เข้าสู่ระบบ
                                </button>
                            <!-- </a> -->
                        </center>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <a href="{{url('regiterUser')}}" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-34 mt-3 xl:mt-0 align-top">
                                    ลงทะเบียน &nbsp; <strong> บุคลากร </strong> &nbsp; รายใหม่
                            </a>
                            <br><br>
                            <center> <a href="{{url('forgotPasswordUser')}}">ลืมรหัสผ่าน</a> </center>
                        </div>
                        <!-- <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"> By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a> </div> -->
                        </form>
                        <div class="box-cookie">
                            <h6>เว็บไซต์นี้ใช้คุกกี้</h6>
                            <p>เราใช้คุกกี้เพื่อเพิ่มประสิทธิภาพ และประสบการณ์ที่ดีในการใช้งานเว็บไซต์ คุณสามารถเลือกตั้งค่าความยินยอมการใช้คุกกี้ได้ โดยคลิก "การตั้งค่าคุกกี้"นโยบายความเป็นส่วนตัว</p>

                            <div class="text-center">
                                <button class="btn btn-link text-green">การตั้งค่าคุกกี้</button>
                                <button class="btn btn-green">ยอมรับทั้งหมด</button>
                            </div>

                        </div>
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
        <!-- END: JS Assets-->

    </body>
</html>
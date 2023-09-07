<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterCompany')
<?php
$activePage = "users";
$active = "mUser";
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
                    <div class="font-medium text-center text-lg">แก้ไขบุคลากร</div>
                   
                </div>
                <form action="{{ url('backend/skills/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำนำหน้า </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="นาย" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="ชื่อ1" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="นามสกุล1" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> อีเมล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="name1@gmail.com" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="0999995555" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันเกิด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="date" id="formFile" value="2001-06-06" required>
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
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="25/558" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control" required>
                                        <option value="" hidden>-เลือก-</option>
                                        <option value="" selected>กรุงเทพ</option>
                                        <option value="">กระบี่</option>
                                        <option value="">กาญจนบุรี</option>
                                        <option value="">กาฬสินธุ์</option>
                                        <option value="">กำแพงเพชร</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เขต/อำเภอ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control" required>
                                        <option value="" hidden>-เลือก-</option>
                                        <option value="" selected>บางแค</option>
                                        <option value="">อำเภอ 2</option>
                                        <option value="">อำเภอ 3</option>
                                        <option value="">อำเภอ 4</option>
                                        <option value="">อำเภอ 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control" required>
                                        <option value="" hidden>-เลือก-</option>
                                        <option value="" selected>บางแค</option>
                                        <option value="">ตำบล 2</option>
                                        <option value="">ตำบล 3</option>
                                        <option value="">ตำบล 4</option>
                                        <option value="">ตำบล 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษณีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="11501" required>
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
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="44/852" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> จังหวัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control" required>
                                        <option value="" hidden>-เลือก-</option>
                                        <option value="">กรุงเทพ</option>
                                        <option value="" selected>กระบี่</option>
                                        <option value="">กาญจนบุรี</option>
                                        <option value="">กาฬสินธุ์</option>
                                        <option value="">กำแพงเพชร</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เขต/อำเภอ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control" required>
                                        <option value="" hidden>-เลือก-</option>
                                        <option value="">บางแค</option>
                                        <option value="" selected>อำเภอ 2</option>
                                        <option value="">อำเภอ 3</option>
                                        <option value="">อำเภอ 4</option>
                                        <option value="">อำเภอ 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แขวง/ตำบล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control" required>
                                        <option value="" hidden>-เลือก-</option>
                                        <option value="">บางแค</option>
                                        <option value="" selected>ตำบล 2</option>
                                        <option value="">ตำบล 3</option>
                                        <option value="">ตำบล 4</option>
                                        <option value="">ตำบล 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสไปรษณีย์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="75889" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เพศ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="radio"value="1" checked> ชาย
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio"value="2"  required> หญิง
                                </div>
                            </div>

                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">สถานะการทำงาน</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="radio" value="2" name="work_status" checked> ทำงาน
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="1" name="work_status" disabled> ว่างงาน
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">ประเภทสถานประกอบการ</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="type_company" id="type_company" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกประเภทสถานประกอบการ -</option>
                                        <option value="1" selected>เหมืองแร่</option>
                                        <option value="2">โรงโม่หิน</option>
                                        <option value="3">โรงแต่งแร่</option>
                                        <option value="4">โรงประกอบโลหกรรม</option>
                                        <option value="5">ผู้รับเหมางานเหมืองแร่</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">สถานประกอบการ</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="company_name" id="company_name" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกสถานประกอบการ -</option>
                                        <option value="1">สถานประกอบการ 1</option>
                                        <option value="2" selected>สถานประกอบการ 2</option>
                                        <option value="3">สถานประกอบการ 3</option>
                                        <option value="4">สถานประกอบการ 4</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขพนักงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="001" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="department" id="department" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกแผนก -</option>
                                        <option value="1">แผนก 1</option>
                                        <option value="2">แผนก 2</option>
                                        <option value="3" selected>แผนก 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="departmentSub" id="departmentSub" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกแผนกย่อย -</option>
                                        <option value="1">แผนกย่อย 1</option>
                                        <option value="2" selected>แผนกย่อย 2</option>
                                        <option value="3">แผนกย่อย 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="position" id="position" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกตำแหน่ง -</option>
                                        <option value="1" selected>ตำแหน่ง 1</option>
                                        <option value="2">ตำแหน่ง 2</option>
                                        <option value="3">ตำแหน่ง 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="lavel_job" id="lavel_job" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกระดับงาน -</option>
                                        <option value="1">ระดับงาน 1</option>
                                        <option value="2">ระดับงาน 2</option>
                                        <option value="3">ระดับงาน 3</option>
                                        <option value="4">ระดับงาน 4</option>
                                        <option value="5" selected>ระดับงาน 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หลักฐาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <img src="{{ asset('dist/images/test.jpg') }}">
                                    <!-- <input type="file" name="" id="" class="form-control"> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">กลุ่มตำแหน่งงาน</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="job" id="job" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกกลุ่มตำแหน่งงาน -</option>
                                        <option value="1">กลุ่มตำแหน่งงาน 1</option>
                                        <option value="2">กลุ่มตำแหน่งงาน 2</option>
                                        <option value="3" selected>กลุ่มตำแหน่งงาน 3</option>
                                        <option value="4">กลุ่มตำแหน่งงาน 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประวัติการศึกษาลำดับที่ 1 </lable></b>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ปีที่เข้าการศึกษา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="year" class="form-select rounded-10 mb-3" disabled> 
                                        <option hidden>- ปีที่เข้าการศึกษา -</option>
                                        <option>2566</option>
                                        <option>2565</option>
                                        <option>2564</option>
                                        <option>2563</option>
                                        <option>2562</option>
                                        <option>2561</option>
                                        <option selected>2560</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ปีที่จบการศึกษา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="year" class="form-select rounded-10 mb-3" disabled> 
                                        <option hidden>- ปีที่จบการศึกษา -</option>
                                        <option>2566</option>
                                        <option>2565</option>
                                        <option selected>2564</option>
                                        <option>2563</option>
                                        <option>2562</option>
                                        <option>2561</option>
                                        <option>2560</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วุติที่ได้รับ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="วุติที่ได้รับ" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อสถาบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="ชื่อสถาบัน" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แนบเอกสาร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <img src="{{ asset('dist/images/test.jpg') }}">
                                    <!-- <input class="form-control box-form-ct" name="news_name" type="file" id="formFile" required> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="" id="" cols="55" rows="10">หมายเหตุ</textarea>
                                </div>
                            </div>

                            <!-- <div id="form-container"></div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div><div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มประวัติการศึกษา</button>
                                </div>
                            </div> -->

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประวัติการทำงาน 1</lable></b>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ปีที่เริ่มทำงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="year" class="form-select rounded-10 mb-3" disabled> 
                                        <option hidden>- ปีที่เริ่มทำงาน -</option>
                                        <option>2566</option>
                                        <option selected>2565</option>
                                        <option>2564</option>
                                        <option>2563</option>
                                        <option>2562</option>
                                        <option>2561</option>
                                        <option>2560</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ปีที่สิ้นสุดการทำงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="year" class="form-select rounded-10 mb-3" disabled> 
                                        <option hidden>- ปีที่สิ้นสุดการทำงาน -</option>
                                        <option selected>2566</option>
                                        <option>2565</option>
                                        <option>2564</option>
                                        <option>2563</option>
                                        <option>2562</option>
                                        <option>2561</option>
                                        <option>2560</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หน่วยงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="หน่วยงาน" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="ตำแหน่ง" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แนบเอกสาร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <img src="{{ asset('dist/images/test.jpg') }}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="" id="" cols="55" rows="10" disabled>หมายเหตุ</textarea>
                                </div>
                            </div>

                            <!-- <div id="form-container-job"></div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div><div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <button id="add-form-btn-job" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มประวัติการทำงาน</button>
                                </div>
                            </div> -->

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('backend/people')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <a href="#" class="btn btn-success w-50">บันทึก</a>
                            
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
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
    const formContainer = document.getElementById("form-container");
    const addFormBtn = document.getElementById("add-form-btn");
    let formCount = 1;

    addFormBtn.addEventListener("click", function() {
    formCount++;
    const div = document.createElement("div");
    div.setAttribute("id", `study${formCount}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> ประวัติการศึกษาลำดับที่ ${formCount} </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <button class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6 btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> ปีที่เข้าการศึกษา </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <input class="form-control box-form-ct" name="news_name" type="date" id="formFile" required>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> ปีที่จบการศึกษา </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <input class="form-control box-form-ct" name="news_name" type="date" id="formFile" required>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> วุติที่ได้รับ </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" required>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> ชื่อสถาบัน </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" required>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> แนบเอกสาร </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <input class="form-control box-form-ct" name="news_name" type="file" id="formFile" required>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <textarea name="" id="news_detail" cols="5" rows="5"></textarea>
        </div>
    </div>
    `;
    formContainer.appendChild(div);
    });

    function del_study(num){
        const div = document.getElementById(`study${num}`);
        if (div) {
            if (confirm(`Are you sure you want to delete ?`)) {
            formContainer.removeChild(div);
            formCount--;
            }
        }
    }  

</script>

<script>
function skillsSub() {
    const formContainerskills = document.getElementById("form-container-skills");
    const skillsSub1 = document.getElementById("skillsSub1");
    let formCountSkills = 0;

    if (!skillsSub1) {
    formCountSkills++;
    const div = document.createElement("div");
    div.setAttribute("id", `skillsSub${formCountSkills}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1 </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <select name="job_type" id="job_type" class="form-control" required>
                <option value="" hidden>-กรุณาเลือก-</option>
                <option value="1">ทักษะย่อย 1</option>
                <option value="1">ทักษะย่อย 2</option>
                <option value="1">ทักษะย่อย 3</option>
                <option value="1">ทักษะย่อย 4</option>
                <option value="1">ทักษะย่อย 5</option>
            </select>
        </div>
        <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
    </div>
    <div id="form-container-sub"></div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <button id="add-form-btn-sub" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
        </div>
    </div>
    `;
    formContainerskills.appendChild(div);
    }
}
function del_skillsSub(count){
        const formContainerskills = document.getElementById("form-container-skills");
        const div = document.getElementById(`skillsSub${count}`);
        if (div) {
            if (confirm(`Are you sure you want to delete ?`)) {
            formContainerskills.removeChild(div);
            formCountSkills--;
            }
        }
    } 
</script>
@endsection





</body>
</html>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterUser')
<?php
$activePage = "history";
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
                <form action="{{ url('backend/userHistury/edit/'.$user->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            @if(!empty($user->e_note))
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุแก้ไขข้อมูล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <textarea name="e_note" id="e_note" cols="45" rows="10" disabled>{{$user->e_note}}</textarea> -->
                                    {!! asset($user->e_note )?$user->e_note :''!!}
                                </div>
                            </div>
                            @endif

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำนำหน้า </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="{{$user->e_title}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="{{$user->e_fname}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="{{$user->e_lname}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">สถานะการทำงาน</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="radio" value="2" name="work_status" onclick="toggleDiv('work-div', true)"> ทำงาน
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="1" name="work_status" onclick="toggleDiv('work-div', false)"> ว่างงาน
                                </div>
                            </div>

                            <div id="work-div" style="display: none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label">ประเภทสถานประกอบการ</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="type_company" id="type_company" class="form-control select2">
                                            <option value="" hidden>- กรุณาเลือกประเภทสถานประกอบการ -</option>
                                            <option value="1">เหมืองแร่</option>
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
                                        <select name="company_name" id="company_name" class="form-control select2">
                                            <option value="" hidden>- กรุณาเลือกสถานประกอบการ -</option>
                                            <option value="1">สถานประกอบการ 1</option>
                                            <option value="2">สถานประกอบการ 2</option>
                                            <option value="3">สถานประกอบการ 3</option>
                                            <option value="4">สถานประกอบการ 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> หมายเลขพนักงาน </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="" type="text" id="formFile" Placeholder="หมายเลขพนักงาน" required>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="department" id="department" class="form-control select2">
                                            <option value="" hidden>- กรุณาเลือกแผนก -</option>
                                            <option value="1">แผนก 1</option>
                                            <option value="2">แผนก 2</option>
                                            <option value="3">แผนก 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="departmentSub" id="departmentSub" class="form-control select2">
                                            <option value="" hidden>- กรุณาเลือกแผนกย่อย -</option>
                                            <option value="1">แผนกย่อย 1</option>
                                            <option value="2">แผนกย่อย 2</option>
                                            <option value="3">แผนกย่อย 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="position" id="position" class="form-control select2">
                                            <option value="" hidden>- กรุณาเลือกตำแหน่ง -</option>
                                            <option value="1">ตำแหน่ง 1</option>
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
                                        <select name="lavel_job" id="lavel_job" class="form-control select2">
                                            <option value="" hidden>- กรุณาเลือกระดับงาน -</option>
                                            <option value="1">ระดับงาน 1</option>
                                            <option value="2">ระดับงาน 2</option>
                                            <option value="3">ระดับงาน 3</option>
                                            <option value="4">ระดับงาน 4</option>
                                            <option value="5">ระดับงาน 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> หลักฐาน </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="file" name="" id="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">กลุ่มตำแหน่งงาน</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="job" id="job" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกกลุ่มตำแหน่งงาน -</option>
                                        <option value="1">กลุ่มตำแหน่งงาน 1</option>
                                        <option value="2">กลุ่มตำแหน่งงาน 2</option>
                                        <option value="3">กลุ่มตำแหน่งงาน 3</option>
                                        <option value="4">กลุ่มตำแหน่งงาน 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> อีเมล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="{{$user->email}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="text" id="formFile" value="{{$user->e_phone}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="password" id="formFile" Placeholder="รหัสผ่าน">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="password" id="formFile" Placeholder="ยืนยันรหัสผ่าน">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันเกิด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="" type="date" id="formFile" value="{{$user->e_birth}}" required>
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
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$user->addressNO_now}}" required>
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
                                        <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option>
                                        @foreach($amphures as $rs)
                                        <option value="{{$rs->id}}" @if(!empty($user->FKe_amphur_now) && ($user->FKe_amphur_now == $rs->id)) selected @endif>{{$rs->name_th}}</option>
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
                                    <select name="tumbon_now" id="tumbon_now" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
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
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$user->postcode_now}}" required>
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
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$user->addressNO_past}}" required>
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
                                        <option value="" hidden>- กรุณาเลือกเขต/อำเภอ -</option>
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
                                        <option value="" hidden>- กรุณาเลือกแขวง/ตำบล -</option>
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
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$user->postcode_past}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เพศ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="radio" @if(!empty($user->e_gender) && $user->e_gender == 'ชาย') checked @endif> ชาย
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" @if(!empty($user->e_gender) && $user->e_gender == 'หญิง') checked @endif> หญิง
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
                                    <select name="year" class="form-select rounded-10 mb-3"> 
                                        <option hidden>- ปีที่เข้าการศึกษา -</option>
                                        @for($i=$date;$i>=$date_old;$i--)
                                            <option value="{{$i-543}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ปีที่จบการศึกษา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="year" class="form-select rounded-10 mb-3"> 
                                        <option hidden>- ปีที่จบการศึกษา -</option>
                                        @for($i=$date;$i>=$date_old;$i--)
                                            <option value="{{$i-543}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วุติที่ได้รับ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="วุติที่ได้รับ" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อสถาบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="ชื่อสถาบัน" required>
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

                            <div id="form-container"></div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div><div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มประวัติการศึกษา</button>
                                </div>
                            </div>

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
                                    <select name="year" class="form-select rounded-10 mb-3"> 
                                        <option hidden>- ปีที่เริ่มทำงาน -</option>
                                        @for($i=$date;$i>=$date_old;$i--)
                                            <option value="{{$i-543}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ปีที่สิ้นสุดการทำงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="year" class="form-select rounded-10 mb-3"> 
                                        <option hidden>- ปีที่สิ้นสุดการทำงาน -</option>
                                        @for($i=$date;$i>=$date_old;$i--)
                                            <option value="{{$i-543}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หน่วยงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="หน่วยงาน" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="ตำแหน่ง" required>
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
                                    <textarea name="job_detail" id="job_detail" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div id="form-container-job"></div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div><div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <button id="add-form-btn-job" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มประวัติการทำงาน</button>
                                </div>
                            </div>

                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประวัติการฝึกอบรม 1 </lable></b>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันเดือนปีที่อบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="">
                                        <option hidden>- กรุณาเลือกหลักสูตร -</option>
                                        <option value="">หลักสูตร 1</option>
                                        <option value="">หลักสูตร 2</option>
                                        <option value="">หลักสูตร 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ผู้จัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="">
                                        <option hidden>- กรุณาเลือกผู้จัด -</option>
                                        <option value="">ผู้จัด 1</option>
                                        <option value="">ผู้จัด 2</option>
                                        <option value="">ผู้จัด 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาอบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="number">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ใบรับรอง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="file">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="">
                                        <option value="">- สมรรถนะ -</option>
                                        <option value="">สมรรถนะ 1</option>
                                        <option value="">สมรรถนะ 2</option>
                                        <option value="">สมรรถนะ 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="">
                                        <option value="">- ทักษะ -</option>
                                        <option value="">ทักษะ 1</option>
                                        <option value="">ทักษะ 2</option>
                                        <option value="">ทักษะ 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="">
                                        <option value="">- ทักษะย่อย -</option>
                                        <option value="">ทักษะย่อย 1</option>
                                        <option value="">ทักษะย่อย 2</option>
                                        <option value="">ทักษะย่อย 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="">
                                        <option value="">- ระดับ -</option>
                                        <option value="">ระดับ 1</option>
                                        <option value="">ระดับ 2</option>
                                        <option value="">ระดับ 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div id="form-container-skills"></div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div><div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <button id="skillsSub1" type="button" class="btn btn-outline-secondary btn200 rounded-10" >ประวัติการฝึกอบรม</button>
                                </div>
                            </div> -->

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                <a href="#" class="btn btn-success w-50">บันทึก</a>
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
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
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ปีที่เข้าการศึกษา </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <select name="year" class="form-select rounded-10 mb-3"> 
                    <option hidden>- ปีที่เข้าการศึกษา -</option>
                    @for($i=$date;$i>=$date_old;$i--)
                        <option value="{{$i-543}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ปีที่จบการศึกษา </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <!-- <input class="form-control box-form-ct" name="news_name" type="date" id="formFile" required> -->
                <select name="year" class="form-select rounded-10 mb-3"> 
                    <option hidden>- ปีที่จบการศึกษา -</option>
                    @for($i=$date;$i>=$date_old;$i--)
                        <option value="{{$i-543}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> วุติที่ได้รับ </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="วุติที่ได้รับ"required>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ชื่อสถาบัน </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="ชื่อสถาบัน"required>
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
                <textarea name="" id="news_detail" cols="55" rows="10"></textarea>
            </div>
        </div>
        <div id="form-container-skills(${formCount})"></div>
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
    const formContainerJob = document.getElementById("form-container-job");
    const addFormBtnJob = document.getElementById("add-form-btn-job");
    let formCountJob = 1;

    addFormBtnJob.addEventListener("click", function() {
    formCountJob++;
    const div = document.createElement("div");
    div.setAttribute("id", `job${formCountJob}`);
    div.innerHTML = `
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ประวัติการทำงาน ${formCountJob} </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_job(${formCountJob})">ลบ</button>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ปีที่เริ่มทำงาน </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <select name="year" class="form-select rounded-10 mb-3"> 
                    <option hidden>- ปีที่เริ่มทำงาน -</option>
                    @for($i=$date;$i>=$date_old;$i--)
                        <option value="{{$i-543}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ปีที่สิ้นสุดการทำงาน </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <select name="year" class="form-select rounded-10 mb-3"> 
                    <option hidden>- ปีที่สิ้นสุดการทำงาน -</option>
                    @for($i=$date;$i>=$date_old;$i--)
                        <option value="{{$i-543}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> หน่วยงาน </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="หน่วยงาน" required>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="ตำแหน่ง" required>
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
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div id="form-container-job(${formCountJob})"></div>
    `;
    formContainerJob.appendChild(div);
    });

    function del_job(num){
        const div = document.getElementById(`job${num}`);
        if (div) {
            if (confirm(`Are you sure you want to delete ?`)) {
            formContainerJob.removeChild(div);
            formCountJob--;
            }
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

    ClassicEditor
    .create( document.querySelector( '#job_detail' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script>
    function toggleDiv(divId, show) {
        var div = document.getElementById(divId);
        if (show) {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    }
</script>

<script>
    $(document).ready(function(){
        $('#type_company').select2({
            placeholder: "- กรุณาเลือกประเภทสถานประกอบการ -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#company_name').select2({
            placeholder: "- กรุณาเลือกสถานประกอบการ -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#department').select2({
            placeholder: "- กรุณาเลือกแผนก -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#departmentSub').select2({
            placeholder: "- กรุณาเลือกแผนกย่อย -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#position').select2({
            placeholder: "- กรุณาเลือกตำแหน่ง -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#lavel_job').select2({
            placeholder: "- กรุณาเลือกระดับงาน -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#job').select2({
            placeholder: "- กรุณาเลือกกลุ่มตำแหน่งงาน -",
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
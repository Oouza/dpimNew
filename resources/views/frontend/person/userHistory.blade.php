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
                <form action="{{ url('/backend/userHistury/edit/'.$user->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            @if(!empty($user->e_note))
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุแก้ไขข้อมูล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <textarea name="e_note" id="e_note" cols="45" rows="10" disabled>{{ $user->e_note }}</textarea> -->
                                    {!! asset($user->e_note)? $user->e_note : '' !!}
                                </div>
                            </div>
                            @endif

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำนำหน้า </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="title" type="text" id="title" value="{{ $user->e_title }}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="fname" type="text" id="fname" value="{{ $user->e_fname }}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="lname" type="text" id="lname" value="{{ $user->e_lname }}" required>
                                </div>
                            </div>

                            @if($user->status == 8)
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">สถานะการทำงาน</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="radio" value="2" name="work_status" @if(!empty($user->e_status) && $user->e_status == 2) checked @endif onclick="toggleDiv('work-div', true)"> ทำงาน
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="1" name="work_status" @if(!empty($user->e_status) && $user->e_status == 1) checked @endif onclick="toggleDiv('work-div', false)"> อิสระ
                                </div>
                            </div>

                            @if($user->e_status == 2)
                            <div id="work-div">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label">ประเภทสถานประกอบการ</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        @php
                                            if(isset($user->FKe_company)){
                                                $companies = DB::table('companies')->where('c_id', $user->FKe_company)->first();
                                            }
                                        @endphp
                                        <select name="type_company" id="type_company" class="form-control select2" onchange="GetTypecompany(this.value)">
                                            <option value="" hidden>- กรุณาเลือกประเภทสถานประกอบการ -</option>
                                            <option value="1" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 1)? 'selected' : '' }}>เหมืองแร่</option>
                                            <option value="2" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 2)? 'selected' : '' }}>โรงโม่หิน</option>
                                            <option value="3" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 3)? 'selected' : '' }}>โรงแต่งแร่</option>
                                            <option value="4" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 4)? 'selected' : '' }}>โรงประกอบโลหกรรม</option>
                                            <option value="5" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 5)? 'selected' : '' }}>ผู้รับเหมางานเหมืองแร่</option>
                                            <option value="6" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 6)? 'selected' : '' }}>อื่นๆ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label">สถานประกอบการ</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="company_name" id="company_name" class="form-control select2" onchange="Getcompany(this.value)">
                                            <option value="" hidden>- กรุณาเลือกสถานประกอบการ -</option>
                                            @foreach ($company as $key => $val)
                                            <option value="{{ $val->c_id }}" {{ ($val->c_id == $user->FKe_company)? 'selected' : '' }}>{{ $val->c_nameCompany }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> หมายเลขพนักงาน </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="employeeNo" type="text" id="employeeNo" Placeholder="หมายเลขพนักงาน" value="{{ $user->e_employeeNo }}" required>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="department" id="department" class="form-control select2" onchange="Getdepartment(this.value)">
                                            <option value="" hidden>- กรุณาเลือกแผนก -</option>
                                            @foreach ($department as $key => $val)
                                            <option value="{{ $val->d_id }}" {{ ($val->d_id == $user->FKe_department)? 'selected' : '' }}>{{ $val->d_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="departmentSub" id="departmentSub" class="form-control select2" onchange="Getdepartmentsub(this.value)">
                                            <option value="" hidden>- กรุณาเลือกแผนกย่อย -</option>
                                            @foreach ($departmentsub as $key => $val)
                                            <option value="{{ $val->ds_id }}" {{ ($val->ds_id == $user->FKe_departmentSub)? 'selected' : '' }}>{{ $val->ds_name }}</option>
                                            @endforeach
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
                                            @foreach ($setting_positions as $key => $val)
                                            <option value="{{ $val->sp_id }}" {{ ($val->sp_id == $user->FKe_position)? 'selected' : '' }}>{{ $val->sp_nameposition }}</option>
                                            @endforeach
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
                                            @foreach ($level_jobs as $key => $val)
                                            <option value="{{ $val->lj_id }}" {{ ($val->lj_id == $user->FKe_lavel)? 'selected' : '' }}>{{ $val->lj_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> หลักฐาน </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="file" name="credit" id="credit" class="form-control">
                                        <br>
                                        <a href="{{ asset('public/upload/personnel/'.$user->e_credit) }}" target="_blank"><font color="blue">{{ $user->e_credit }}</font></a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div id="work-div" style="display: none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label">ประเภทสถานประกอบการ</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        @php
                                            if(isset($user->FKe_company)){
                                                $companies = DB::table('companies')->where('c_id', $user->FKe_company)->first();
                                            }
                                        @endphp
                                        <select name="type_company" id="type_company" class="form-control select2" onchange="GetTypecompany(this.value)">
                                            <option value="" hidden>- กรุณาเลือกประเภทสถานประกอบการ -</option>
                                            <option value="1" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 1)? 'selected' : '' }}>เหมืองแร่</option>
                                            <option value="2" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 2)? 'selected' : '' }}>โรงโม่หิน</option>
                                            <option value="3" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 3)? 'selected' : '' }}>โรงแต่งแร่</option>
                                            <option value="4" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 4)? 'selected' : '' }}>โรงประกอบโลหกรรม</option>
                                            <option value="5" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 5)? 'selected' : '' }}>ผู้รับเหมางานเหมืองแร่</option>
                                            <option value="6" {{ (!empty($companies->FKc_typemineral) && $companies->FKc_typemineral == 6)? 'selected' : '' }}>อื่นๆ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label">สถานประกอบการ</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="company_name" id="company_name" class="form-control select2" onchange="Getcompany(this.value)">
                                            <option value="" hidden>- กรุณาเลือกสถานประกอบการ -</option>
                                            @foreach ($company as $key => $val)
                                            <option value="{{ $val->c_id }}" {{ ($val->c_id == $user->FKe_company)? 'selected' : '' }}>{{ $val->c_nameCompany }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> หมายเลขพนักงาน </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="employeeNo" type="text" id="employeeNo" Placeholder="หมายเลขพนักงาน" value="{{ $user->e_employeeNo }}" required>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="department" id="department" class="form-control select2" onchange="Getdepartment(this.value)">
                                            <option value="" hidden>- กรุณาเลือกแผนก -</option>
                                            @foreach ($department as $key => $val)
                                            <option value="{{ $val->d_id }}" {{ ($val->d_id == $user->FKe_department)? 'selected' : '' }}>{{ $val->d_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="departmentSub" id="departmentSub" class="form-control select2" onchange="Getdepartmentsub(this.value)">
                                            <option value="" hidden>- กรุณาเลือกแผนกย่อย -</option>
                                            @foreach ($departmentsub as $key => $val)
                                            <option value="{{ $val->ds_id }}" {{ ($val->ds_id == $user->FKe_departmentSub)? 'selected' : '' }}>{{ $val->ds_name }}</option>
                                            @endforeach
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
                                            @foreach ($setting_positions as $key => $val)
                                            <option value="{{ $val->sp_id }}" {{ ($val->sp_id == $user->FKe_position)? 'selected' : '' }}>{{ $val->sp_nameposition }}</option>
                                            @endforeach
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
                                            @foreach ($level_jobs as $key => $val)
                                            <option value="{{ $val->lj_id }}" {{ ($val->lj_id == $user->FKe_lavel)? 'selected' : '' }}>{{ $val->lj_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> หลักฐาน </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="file" name="credit" id="credit" class="form-control">
                                        <br>
                                        <a href="{{ asset('public/upload/personnel/'.$user->e_credit) }}" target="_blank"><font color="blue">{{ $user->e_credit }}</font></a>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">กลุ่มตำแหน่งงาน</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="job" id="job" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกกลุ่มตำแหน่งงาน -</option>
                                        @foreach ($group as $key => $val)
                                        <option value="{{ $val->gj_id }}" {{ ($val->gj_id == $user->FKe_group)? 'selected' : '' }}>{{ $val->gj_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> อีเมล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="email" type="text" id="email" value="{{ $user->email }}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเลขโทรศัพท์ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="phone" type="text" id="phone" value="{{ $user->e_phone }}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสผ่าน <font color="red">*</font></lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="password_1" type="password" id="password_1" Placeholder="รหัสผ่าน" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ยืนยันรหัสผ่าน <font color="red">*</font></lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="password_2" type="password" id="password_2" Placeholder="ยืนยันรหัสผ่าน" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันเกิด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="birth" type="date" id="birth" value="{{ $user->e_birth }}" required>
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
                                    <input class="form-control box-form-ct" name="addressNO_now" type="text" id="addressNO_now" value="{{ $user->addressNO_now }}" required>
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
                                        <option value="{{ $rs->id }}" @if(!empty($user->FKe_province_now) && ($user->FKe_province_now == $rs->id)) selected @endif>{{ $rs->name_th }}</option>
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
                                        <option value="{{ $rs->id }}" @if(!empty($user->FKe_amphur_now) && ($user->FKe_amphur_now == $rs->id)) selected @endif>{{ $rs->name_th }}</option>
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
                                        <option value="{{ $rs->id }}" @if(!empty($user->FKe_tambon_now) && ($user->FKe_tambon_now == $rs->id)) selected @endif>{{ $rs->name_th }}</option>
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
                                    <input class="form-control box-form-ct" name="postcode_now" type="text" id="postcode_now" value="{{ $user->postcode_now }}" required>
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
                                    <input class="form-control box-form-ct" name="addressNO_past" type="text" id="addressNO_past" value="{{ $user->addressNO_past }}" required>
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
                                        <option value="{{ $rs->id }}" @if(!empty($user->FKe_province_past) && ($user->FKe_province_past == $rs->id)) selected @endif>{{ $rs->name_th }}</option>
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
                                        <option value="{{ $rs->id }}" @if(!empty($user->FKe_amphur_past) && ($user->FKe_amphur_past == $rs->id)) selected @endif>{{ $rs->name_th }}</option>
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
                                        <option value="{{ $rs->id }}" @if(!empty($user->FKe_tambon_past) && ($user->FKe_tambon_past == $rs->id)) selected @endif>{{ $rs->name_th }}</option>
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
                                    <input class="form-control box-form-ct" name="postcode_past" type="text" id="postcode_past" value="{{ $user->postcode_past }}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เพศ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="radio" id="gender" name="gender" @if(!empty($user->e_gender) && $user->e_gender == 'ชาย') checked @endif value="ชาย"> ชาย
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" @if(!empty($user->e_gender) && $user->e_gender == 'หญิง') checked @endif value="หญิง"> หญิง
                                </div>
                            </div>

                            @php
                                $educational = DB::table('educational_record')->where('FKer_userid', $user->id)->get();
                            @endphp
                            @foreach ($educational as $key => $val)
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประวัติการศึกษาลำดับที่ {{ $key+1 }} </lable></b>
                                </div>
                            </div>
                            <input type="hidden" id="ids" name="ids[]" value="{{ $val->er_id }}" readonly>
                            <input type="hidden" class="keys" id="keys" name="keys[]" value="{{ $key+1 }}" readonly>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ปีที่เข้าการศึกษา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select id="from_years" name="from_years[]" class="form-select rounded-10 mb-3"> 
                                        <option hidden>- ปีที่เข้าการศึกษา -</option>
                                        @for($i=$date; $i>=$date_old; $i--)
                                            <option value="{{ $i-543 }}" @if(!empty($i-543) && ($i-543 == $val->er_datefrom)) selected @endif>{{ $i }}</option>
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
                                    <select id="to_years" name="to_years[]" class="form-select rounded-10 mb-3"> 
                                        <option hidden>- ปีที่จบการศึกษา -</option>
                                        @for($i=$date; $i>=$date_old; $i--)
                                            <option value="{{ $i-543 }}" @if(!empty($i-543) && ($i-543 == $val->er_dateto)) selected @endif>{{ $i }}</option>
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
                                    <input class="form-control box-form-ct" name="qualifications[]" type="text" id="qualifications" Placeholder="วุติที่ได้รับ" value="{{ $val->er_qualification }}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อสถาบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="institution_names[]" type="text" id="institution_names" Placeholder="ชื่อสถาบัน" value="{{ $val->er_Nameinstitution }}">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แนบเอกสาร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="qualification_credits[]" type="file" id="qualification_credits">
                                    <br>
                                    <a href="{{ asset('public/upload/personnel/'.$val->er_credit) }}" target="_blank"><font color="blue">{{ $val->er_credit }}</font></a>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="education_notes[]" id="education_notes" cols="58" rows="10">{!! $val->er_note !!}</textarea>
                                </div>
                            </div>
                            @endforeach
                            @if (empty($val->FKer_employeeid) != '')
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
                                    <select id="from_year" name="from_year[]" class="form-select rounded-10 mb-3"> 
                                        <option value="" hidden>- ปีที่เข้าการศึกษา -</option>
                                        @for($i=$date; $i>=$date_old; $i--)
                                            <option value="{{ $i-543 }}">{{ $i }}</option>
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
                                    <select id="to_year" name="to_year[]" class="form-select rounded-10 mb-3"> 
                                        <option value="" hidden>- ปีที่จบการศึกษา -</option>
                                        @for($i=$date; $i>=$date_old; $i--)
                                            <option value="{{ $i-543 }}">{{ $i }}</option>
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
                                    <input class="form-control box-form-ct" name="qualification[]" type="text" id="qualification" Placeholder="วุติที่ได้รับ">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อสถาบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="institution_name[]" type="text" id="institution_name" Placeholder="ชื่อสถาบัน">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แนบเอกสาร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="qualification_credit[]" type="file" id="qualification_credit">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="education_note[]" id="education_note" cols="58" rows="10"></textarea>
                                </div>
                            </div>

                            @endif

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
                                    <select id="fromwork_year" name="fromwork_year[]" class="form-select rounded-10 mb-3"> 
                                        <option hidden>- ปีที่เริ่มทำงาน -</option>
                                        @for($i=$date; $i>=$date_old; $i--)
                                            <option value="{{ $i-543 }}">{{ $i }}</option>
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
                                    <select id="towork_year" name="towork_year[]" class="form-select rounded-10 mb-3"> 
                                        <option hidden>- ปีที่สิ้นสุดการทำงาน -</option>
                                        @for($i=$date; $i>=$date_old; $i--)
                                            <option value="{{ $i-543 }}">{{ $i }}</option>
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
                                    <input class="form-control box-form-ct" name="namedepartment[]" type="text" id="namedepartment" Placeholder="หน่วยงาน" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="nameposition[]" type="text" id="nameposition" Placeholder="ตำแหน่ง" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แนบเอกสาร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="work_credit[]" type="file" id="work_credit" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="job_detail[]" id="job_detail" cols="30" rows="10"></textarea>
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
                                <button type="submit" class="btn btn-success w-50">บันทึก</button>
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
    
    let keysInputElement = 1;
    const keysInputElements = document.querySelectorAll('input[name="keys[]"]');
    const keysValues = [];
    for (const element of keysInputElements) {
        keysValues.push(element.value);
    }
    const latestId = keysValues[keysValues.length - 1];
    if(latestId){
        formCount = latestId;
    }else{
        formCount = keysInputElement;
    }

    addFormBtn.addEventListener("click", function() {
    formCount++;
    // console.log(latestId);
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
                <select id="from_year" name="from_year[]" class="form-select rounded-10 mb-3"> 
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
                <!-- <input class="form-control box-form-ct" name="to_year[]" type="date" id="to_year" required> -->
                <select id="to_year" name="to_year[]" class="form-select rounded-10 mb-3"> 
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
                <input class="form-control box-form-ct" name="qualification[]" type="text" id="qualification" Placeholder="วุติที่ได้รับ"required>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ชื่อสถาบัน </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <input class="form-control box-form-ct" name="institution_name[]" type="text" id="institution_name" Placeholder="ชื่อสถาบัน"required>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> แนบเอกสาร </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <input class="form-control box-form-ct" name="qualification_credit[]" type="file" id="qualification_credit" required>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <textarea name="education_note[]" id="education_note" cols="58" rows="10"></textarea>
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
                <select id="fromwork_year" name="fromwork_year[]" class="form-select rounded-10 mb-3"> 
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
                <select id="towork_year" name="towork_year[]" class="form-select rounded-10 mb-3"> 
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
                <input class="form-control box-form-ct" name="namedepartment[]" type="text" id="namedepartment" Placeholder="หน่วยงาน" required>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <input class="form-control box-form-ct" name="nameposition[]" type="text" id="nameposition" Placeholder="ตำแหน่ง" required>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> แนบเอกสาร </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <input class="form-control box-form-ct" name="work_credit[]" type="file" id="work_credit" required>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <textarea name="job_detail[]" id="job_detail" cols="30" rows="10"></textarea>
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
    .create( document.querySelector( '#education_note' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#education_notes' ) )
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

    function GetTypecompany(val) {
        var id = $('#type_company').val();
        // console.log(id);
        if (id) {
            $.ajax({
                type: "GET",
                url: "{!! url('/backend/userHistury/GetTypecompany/" + id + "') !!}",
                success: function (res) {
                    if (res) {
                        $("#company_name").empty();
                        $("#company_name").append('<option>- กรุณาเลือกสถานประกอบการ -</option>');
                        $.each(res, function (key, value) {
                            $("#company_name").append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    }
                }
            });
        }
    };

    function Getcompany(val) {
        var id = $('#company_name').val();
        if (id) {
            $.ajax({
                type: "GET",
                url: "{!! url('/backend/userHistury/Getcompany/" + id + "') !!}",
                success: function (res) {
                    if (res) {
                        $("#department").empty();
                        $("#department").append('<option>- กรุณาเลือกแผนก -</option>');
                        $.each(res, function (key, value) {
                            $("#department").append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    }
                }
            });
        }
    };

    function Getdepartment(val) {
        var id = $('#department').val();
        if (id) {
            $.ajax({
                type: "GET",
                url: "{!! url('/backend/userHistury/Getdepartment/" + id + "') !!}",
                success: function (res) {
                    if (res) {
                        $("#departmentSub").empty();
                        $("#departmentSub").append('<option>- กรุณาเลือกแผนกย่อย -</option>');
                        $.each(res, function (key, value) {
                            $("#departmentSub").append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    }
                }
            });
        }
    };

    function Getdepartmentsub(val) {
        var id = $('#departmentSub').val();
        if (id) {
            $.ajax({
                type: "GET",
                url: "{!! url('/backend/userHistury/Getdepartmentsub/" + id + "') !!}",
                success: function (res) {
                    if (res) {
                        $("#position").empty();
                        $("#position").append('<option>- กรุณาเลือกตำแหน่ง -</option>');
                        $.each(res, function (key, value) {
                            $("#position").append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    }
                }
            });
        }
    };

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
        if(provice == ''){
        }else{
            $.ajax({
                'type': 'post',
                'url': "{{ url('searchProvice') }}",
                'dataType': 'json',
                'data': { 
                    'provice': provice,
                    '_token': "{{csrf_token()}}"  
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
                    'amphure': amphure,
                    '_token': "{{csrf_token()}}"  
                },
            'success': function (data){
                $('#tumbon_now').html(data.html);
                    
                } 
            });  
        }
    }

    function provincepast($id) {
        var provice = $('#povices_past').val();
        if(provice == ''){
        }else{
            $.ajax({
                'type': 'post',
                'url': "{{ url('searchProvice') }}",
                'dataType': 'json',
                'data': { 
                    'provice': provice,
                    '_token': "{{csrf_token()}}"  
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
                    'amphure': amphure,
                    '_token': "{{csrf_token()}}"  
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
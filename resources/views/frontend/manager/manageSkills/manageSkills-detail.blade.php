<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterManager')
<?php
$activePage = "manage";
$active = "userSkills";
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
                    <div class="font-medium text-center text-lg">ข้อมูลการพัฒนาบุคลากร</div>
                   
                </div>
                <form action="{{ url('backend/skills/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-base">รายละเอียด</div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            หมายเลขพนักงาน
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            001
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ชื่อ - นามสกุล
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            นาย ไก่ กา
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แผนก
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            แผนก 1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แผนกย่อย
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            แผนกย่อย 1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            ตำแหน่ง 1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            กลุ่มตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            กลุ่มตำแหน่ง 1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ประวัติการศึกษาลำดับที่ 1 
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ปีที่เข้าการศึกษา
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            2560
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ปีที่จบการศึกษา
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            2564
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            วุติที่ได้รับ
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            วุติ1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ชื่อสถาบัน
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            สถาบัน1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แนบเอกสาร
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <img src="{{ asset('dist/images/test.jpg') }}">
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            หมายเหตุ
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            หมายเหตุ
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ประวัติการทำงาน 1 
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ปีที่เริ่มทำงาน
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            2564
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ปีที่สิ้นสุดการทำงาน
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            2566
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            หน่วยงาน
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            หน่วยงาน1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            ตำแหน่ง1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แนบเอกสาร
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <img src="{{ asset('dist/images/test.jpg') }}">
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            หมายเหตุ
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            หมายเหตุ
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ประวัติการพัฒนาทักษะ 
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                
                                <th><center>รหัสหลักสูตร</center></th>
                                <th><center>ชื่อหลักสูตร</center></th>
                                <th><center>ผู้จัด</center></th>
                                <th><center>ระยะเวลาอบรม (ชั่วโมง)</center></th>
                                <th><center>วันเดือนปีที่อบรม</center></th>
                                <th><center>ค่าใช้จ่าย (บาท)</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>001</center></td>
                                <td><center>หลัดสูตร 1</center></td>
                                <td><center>ผู้จัด1</center></td>
                                <td><center>1 </center></td>
                                <td><center>10-07-2023</center></td>
                                <td><center>100</center></td>
                                
                            </tr>
                            <tr>
                                <td><center>002</center></td>
                                <td><center>หลัดสูตร 2</center></td>
                                <td><center>ผู้จัด 2</center></td>
                                <td><center>3 </center></td>
                                <td><center>20-07-2023</center></td>
                                <td><center>200</center></td>
                            </tr>
                            <tr>
                                <td><center>002</center></td>
                                <td><center>หลัดสูตร 2</center></td>
                                <td><center>ผู้จัด 2</center></td>
                                <td><center>3 </center></td>
                                <td><center>31-07-2023</center></td>
                                <td><center>500</center></td>
                            </tr>
                        </tbody>
                    
                    </table>
                </div>
                <div class="px-5 mt-10">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <tr>
                            <th><center>สมรรถนะ</center></th>
                            <th><center>ทักษะ/ความรู้</center></th>
                            <th><center>ทักษะย่อย</center></th>
                            <th><center>ระดับ 1</center></th>
                            <th><center>ระดับ 2</center></th>
                            <th><center>ระดับ 3</center></th>
                        </tr>
                        <tr>
                            <td><center>สมรรถนะ 1</center></td>
                            <td><center>ทักษะ 1</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center>ทักษะย่อย 2</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center>ทักษะ 2</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center>x</center></th>
                            <th><center>x</center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center>ทักษะย่อย 2</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center>x</center></th>
                            <th><center></center></th>
                        </tr>
                        <tr>
                            <td><center>สมรรถนะ 2</center></td>
                            <td><center>ทักษะ 1</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center>ทักษะ 2</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center>x</th>
                            <th><center></th>
                        </tr>
                    </table>
                </div>

                    <div class="grid grid-cols-12 gap-6 mt-5 sm:px-20">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input type="radio" checked> ทักษะที่มีแล้ว
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" disabled> ทักษะที่ต้องการเพิ่มในปีนี้
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            x ทักษะที่ต้องมี
                        </div>
                    </div>
                <!-- <div class="px-5"> -->
                    <div class="grid grid-cols-12 gap-6 mt-5 sm:px-20">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> หมายเหตุแก้ไข </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <textarea cols="80" id="news_detail" name="news_detail" rows="10"></textarea>
                        </div>
                    </div>
                <!-- </div> -->
                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                <a href="{{url('company/manage/skills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <a href="#" class="btn btn-primary w-50">ส่งออกเป็น xls</a> -->
                                <a href="#" class="btn btn-danger">แก้ไข</a>
                                <a href="#" class="btn btn-success w-50">บันทึก</a>
                                <!-- <button type="submit" class="btn btn-danger w-24 ml-2">ยกเลิกการอบรม</button>         -->
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
@endsection





</body>
</html>
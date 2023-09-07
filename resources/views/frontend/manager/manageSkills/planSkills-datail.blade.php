<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterManager')
<?php
$activePage = "manage";
$active = "planSkills";
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
                    <div class="font-medium text-center text-lg">แก้ไขแผนการพัฒนาบุคลากร</div>
                   
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> พนักงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="นาย ไก่ กา" disabled>
                                    <!-- <select name="" id="" class="form-control" disabled>
                                        <option value="" hidden>- เลือกพนักงาน -</option>
                                        <option value="" selected>ไก่ กา</option>
                                        <option value="">เอ บี</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="แผนก1" disabled>
                                    <!-- <select name="" id="" class="form-control" disabled>
                                        <option value="" hidden>- เลือกแผนก -</option>
                                        <option value="" selected>แผนก 1</option>
                                        <option value="">แผนก 2</option>
                                        <option value="">แผนก 3</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="แผนกย่อย1" disabled>
                                    <!-- <select name="" id="" class="form-control" disabled>
                                        <option value="" hidden>- เลือกแผนกย่อย -</option>
                                        <option value="" selected>แผนกย่อย 1</option>
                                        <option value="">แผนกย่อย 2</option>
                                        <option value="">แผนกย่อย 3</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" class="form-control" value="ตำแหน่ง 1" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="กลุ่มตำแหน่ง1" disabled>
                                    <!-- <select name="" id="" class="form-control" disabled>
                                        <option value="" hidden>- เลือกกลุ่มตำแหน่ง -</option>
                                        <option value="" selected>กลุ่มตำแหน่ง 1</option>
                                        <option value="">กลุ่มตำแหน่ง 2</option>
                                        <option value="">กลุ่มตำแหน่ง 3</option>
                                    </select> -->
                                </div>
                            </div>

                            

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="สมรรถนะ1" disabled>
                                    <!-- <select name="news_type" id="news_type" class="form-control" required onchange="province()" disabled>
                                        <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                                        <option value="1">สมรรถนะ 1</option>
                                        <option value="1" selected>สมรรถนะ 2</option>
                                        <option value="1">สมรรถนะ 3</option>
                                        <option value="1">สมรรถนะ 4</option>
                                        <option value="1">สมรรถนะ 5</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="ทักษะ1" disabled>
                                    <!-- <select name="news_type" id="news_type" class="form-control" required onchange="province()" disabled>
                                        <option value="" hidden>- กรุณาเลือกทักษะ -</option>
                                        <option value="1">ทักษะ 1</option>
                                        <option value="1" selected>ทักษะ 2</option>
                                        <option value="1">ทักษะ 3</option>
                                        <option value="1">ทักษะ 4</option>
                                        <option value="1">ทักษะ 5</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อยที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="ทักษะย่อย1" disabled>
                                    <!-- <select name="news_type" id="news_type" class="form-control" required onchange="province()" disabled>
                                        <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                        <option value="1">ทักษะย่อย 1</option>
                                        <option value="1" selected>ทักษะย่อย 2</option>
                                        <option value="1">ทักษะย่อย 3</option>
                                        <option value="1">ทักษะย่อย 4</option>
                                        <option value="1">ทักษะย่อย 5</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="หลักสูตร1" disabled>
                                    <!-- <select name="news_type" id="news_type" class="form-control" required onchange="province()" disabled>
                                        <option value="" hidden>- กรุณาเลือกหลักสูตร -</option>
                                        <option value="1" selected>หลักสูตร 1</option>
                                        <option value="1">หลักสูตร 2</option>
                                        <option value="1">หลักสูตร 3</option>
                                        <option value="1">หลักสูตร 4</option>
                                        <option value="1">หลักสูตร 5</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="ผู้จัด1" disabled>
                                    <!-- <select name="news_type" id="news_type" class="form-control" required onchange="province()" disabled>
                                        <option value="" hidden>- กรุณาเลือกผู้จัดการอบรม -</option>
                                        <option value="1">ผู้จัดการอบรม 1</option>
                                        <option value="1" selected>ผู้จัดการอบรม 2</option>
                                        <option value="1">ผู้จัดการอบรม 3</option>
                                        <option value="1">ผู้จัดการอบรม 4</option>
                                        <option value="1">ผู้จัดการอบรม 5</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="number" class="form-control" value="3" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" value="ประเภทหลักสูตร1" disabled>
                                    <!-- <select name="news_type" id="news_type" class="form-control" required onchange="province()" disabled>
                                        <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option>
                                        <option value="1" selected>ประเภทหลักสูตร 1</option>
                                        <option value="1">ประเภทหลักสูตร 2</option>
                                        <option value="1">ประเภทหลักสูตร 3</option>
                                        <option value="1">ประเภทหลักสูตร 4</option>
                                        <option value="1">ประเภทหลักสูตร 5</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เริ่มการอบรมวันที่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date" class="form-control" value="2023-08-10" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สิ้นสุดการอบรมวันที่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date" class="form-control" value="2023-08-12" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ค่าใช้จ่าย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="number" class="form-control" value="200" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุแก้ไข </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="news_detail" name="news_detail" rows="10"></textarea>
                                </div>
                            </div>



                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('manager/plan/skills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <a href="#" class="btn btn-danger">แก้ไข</a>
                                <a href="#" class="btn btn-success w-50">ยืนยัน</a>
                            
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
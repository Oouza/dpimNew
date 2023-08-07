<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "people";
$active = "peopleSkills";
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
                    <div class="font-medium text-center text-lg">เพิ่มประวัติการพัฒนาบุคลากร</div>
                   
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> บุคลากร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="people" id="people" class="form-control select2">
                                        <option value="" hidden>- เลือบุคลากร -</option>
                                        <option value="1">ไก่ กา</option>
                                        <option value="2">เอ บี</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="job" id="job" class="form-control select2">
                                        <option value="" hidden>- เลือกกลุ่มตำแหน่ง -</option>
                                        <option value="1">กลุ่มตำแหน่ง 1</option>
                                        <option value="2">กลุ่มตำแหน่ง 2</option>
                                        <option value="3">กลุ่มตำแหน่ง 3</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สถานประกอบการ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div> -->

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="course" id="course" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกหลักสูตร -</option>
                                        <option value="1">หลักสูตร 1</option>
                                        <option value="2">หลักสูตร 2</option>
                                        <option value="3">หลักสูตร 3</option>
                                        <option value="4">หลักสูตร 4</option>
                                        <option value="5">หลักสูตร 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="people_course" id="people_course" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกผู้จัดการอบรม -</option>
                                        <option value="1">ผู้จัดการอบรม 1</option>
                                        <option value="2">ผู้จัดการอบรม 2</option>
                                        <option value="3">ผู้จัดการอบรม 3</option>
                                        <option value="4">ผู้จัดการอบรม 4</option>
                                        <option value="5">ผู้จัดการอบรม 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="number" class="form-control">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="type_course" id="type_course" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option>
                                        <option value="1">ประเภทหลักสูตร 1</option>
                                        <option value="2">ประเภทหลักสูตร 2</option>
                                        <option value="3">ประเภทหลักสูตร 3</option>
                                        <option value="4">ประเภทหลักสูตร 4</option>
                                        <option value="5">ประเภทหลักสูตร 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="skills" id="skills" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกทักษะ -</option>
                                        <option value="0" disabled>ทักษะ</option>
                                        <option value="1">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 1</option>
                                        <option value="2">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 2</option>
                                        <option value="3">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 3</option>
                                        <option value="4">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 4</option>
                                        <option value="5">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 5</option>
                                        <option value="0" disabled>ทักษะ</option>
                                        <option value="6">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 1</option>
                                        <option value="7">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 2</option>
                                        <option value="8">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 3</option>
                                        <option value="9">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 4</option>
                                        <option value="10">&nbsp; &nbsp; &nbsp; &nbsp;ทักษะ 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันที่อบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันสิ้นอายุใบรับรอง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date" class="form-control">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หลักฐานอบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="file" class="form-control">
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('backend/people/manageskills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <a href="#" class="btn btn-danger">แก้ไข</a> -->
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
    $(document).ready(function(){
        $('#people').select2({
            placeholder: "- เลือกบุคลากร -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#job').select2({
            placeholder: "- เลือกกลุ่มตำแหน่ง -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#course').select2({
            placeholder: "- กรุณาเลือกหลักสูตร -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#people_course').select2({
            placeholder: "- กรุณาเลือกผู้จัดการอบรม -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#type_course').select2({
            placeholder: "- กรุณาเลือกประเภทหลักสูตร -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#skills').select2({
            placeholder: "- กรุณาเลือกประเภทชุดทักษะ -",
            allowClear: true
        });
    });
</script>
@endsection



</body>
</html>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "index";
$active = "job";
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
                    <div class="font-medium text-center text-lg">แก้ไขกลุ่มตำแหน่งงาน</div>
                   
                </div>
                <form action="{{ url('backend/job/update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสกลุ่มตำแหน่งงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="job_id" type="text" id="formFile" value="001" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อกลุ่มตำแหน่งงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="job_name" type="text" id="formFile" value="ตำแหน่ง1" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="job_detail" name="job_detail" rows="10">คำอธิบาย1</textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="job_type" id="job_type" class="form-control select2" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกประเภทงาน -</option> -->
                                        <option value="1บริหาร" selected>บริหาร</option>
                                        <option value="1เทคนิค">เทคนิค</option>
                                        <option value="1สนับสนุน">สนับสนุน</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="job_lavel" id="job_lavel" class="form-control select2" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกระดับงาน -</option> -->
                                        <option value="1ผู้จัดการ"selected>ผู้จัดการ</option>
                                        <option value="1หัวหน้างาน">หัวหน้างาน</option>
                                        <option value="1ผู้ปฏิบัติ">ผู้ปฏิบัติ</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>สมรรถนะ1</option>
                                        <option value="1">สมรรถนะ2</option>
                                        <option value="1">สมรรถนะ3</option>
                                        <option value="1">สมรรถนะ4</option>
                                        <option value="1">สมรรถนะ5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะ1</option>
                                        <option value="1">ทักษะ2</option>
                                        <option value="1">ทักษะ3</option>
                                        <option value="1">ทักษะ4</option>
                                        <option value="1">ทักษะ5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะย่อย1</option>
                                        <option value="1">ทักษะย่อย2</option>
                                        <option value="1">ทักษะย่อย3</option>
                                        <option value="1">ทักษะย่อย4</option>
                                        <option value="1">ทักษะย่อย5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 2 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1">ทักษะย่อย1</option>
                                        <option value="1" selected>ทักษะย่อย2</option>
                                        <option value="1">ทักษะย่อย3</option>
                                        <option value="1">ทักษะย่อย4</option>
                                        <option value="1">ทักษะย่อย5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <button id="add-form-btn-sub" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ 2 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะ1</option>
                                        <option value="1">ทักษะ2</option>
                                        <option value="1">ทักษะ3</option>
                                        <option value="1">ทักษะ4</option>
                                        <option value="1">ทักษะ5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะย่อย1</option>
                                        <option value="1">ทักษะย่อย2</option>
                                        <option value="1">ทักษะย่อย3</option>
                                        <option value="1">ทักษะย่อย4</option>
                                        <option value="1">ทักษะย่อย5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <button id="add-form-btn-sub" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะ</button>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ2 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1">สมรรถนะ1</option>
                                        <option value="1"selected>สมรรถนะ2</option>
                                        <option value="1">สมรรถนะ3</option>
                                        <option value="1">สมรรถนะ4</option>
                                        <option value="1">สมรรถนะ5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะ1</option>
                                        <option value="1">ทักษะ2</option>
                                        <option value="1">ทักษะ3</option>
                                        <option value="1">ทักษะ4</option>
                                        <option value="1">ทักษะ5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะย่อย1</option>
                                        <option value="1">ทักษะย่อย2</option>
                                        <option value="1">ทักษะย่อย3</option>
                                        <option value="1">ทักษะย่อย4</option>
                                        <option value="1">ทักษะย่อย5</option>
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <button id="add-form-btn-sub" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะ</button>
                                </div>
                            </div>

                            <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มสมรรถนะ</button> -->

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                            <a href="{{url('backend/job')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                            <button type="submit" class="btn btn-success w-50">บันทึก</button>
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
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
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection





</body>
</html>
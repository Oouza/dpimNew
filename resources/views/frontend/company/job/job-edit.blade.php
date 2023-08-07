<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterCompany')
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
                    <div class="font-medium text-center text-lg">แก้ไขตำแหน่งงาน</div>
                   
                </div>
                <form action="{{ url('backend/news/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="แผนก1" required> -->
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="" hidden>- เลือกแผนก -</option> -->
                                        <option value="1" selected>แผนก 1</option>
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
                                    <!-- <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="แผนกย่อย1" required> -->
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="" hidden>- เลือกแผนกย่อย -</option> -->
                                        <option value="1" selected>แผนกย่อย 1</option>
                                        <option value="2">แผนกย่อย 2</option>
                                        <option value="3">แผนกย่อย 3</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="ตำแหน่ง1" required> -->
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="" hidden>- เลือกตำแหน่ง -</option> -->
                                        <option value="1" selected>ตำแหน่ง 1</option>
                                        <option value="2">ตำแหน่ง 2</option>
                                        <option value="3">ตำแหน่ง 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="ตำแหน่ง1" required> -->
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="" hidden>- เลือกกลุ่มตำแหน่ง -</option> -->
                                        <option value="1" selected>กลุ่มตำแหน่ง 1</option>
                                        <option value="2">กลุ่มตำแหน่ง 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="news_detail" name="news_detail" rows="10">คำอธิบาย 1</textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="่job_type" id="่job_type" class="form-control select2" required>
                                        <!-- <option value="" hidden>-กรุณาเลือก-</option> -->
                                        <option value="1" selected>บริหาร</option>
                                        <option value="2">เทคนิค</option>
                                        <option value="3">สนับสนุน</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="news_type" id="news_type" class="form-control select2" required>
                                        <!-- <option value="" hidden>-กรุณาเลือก-</option> -->
                                        <option value="1" selected>ผู้จัดการ</option>
                                        <option value="2">หัวหน้างาน</option>
                                        <option value="3">ผู้ปฏิบัติ</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <br>
                            <br>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <tr>
                                    <th><center>สมถรรนะ</center></th>
                                    <th><center>ทักษะ/ความรู้</center></th>
                                    <th><center>ทักษะย่อย</center></th>
                                </tr>
                                <tr>
                                    <td><center>สมถรรนะ 1</center></td>
                                    <td><center>ทักษะ 1</center></td>
                                    <td><center>ทักษะย่อย 1</center></td>
                                </tr>
                                <tr>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td><center>ทักษะย่อย 2</center></td>
                                </tr>
                                <tr>
                                    <td><center></center></td>
                                    <td><center>ทักษะ 2</center></td>
                                    <td><center>ทักษะย่อย 1</center></td>
                                </tr>
                                <tr>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td><center>ทักษะย่อย 2</center></td>
                                </tr>
                                <tr>
                                    <td><center>สมถรรนะ 2</center></td>
                                    <td><center>ทักษะ 1</center></td>
                                    <td><center>ทักษะย่อย 1</center></td>
                                </tr>
                                <tr>
                                    <td><center></center></td>
                                    <td><center>ทักษะ 2</center></td>
                                    <td><center>ทักษะย่อย 1</center></td>
                                </tr>
                            </table>

                            <div class="grid grid-cols-12 gap-6 mt-5">
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

                                <a href="{{url('indexCompany')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>         -->
                                <a href="#" class="btn btn-success w-24 ml-2">บันทึก</a>

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
        $('.select2').select2();
    });
</script>
@endsection





</body>
</html>
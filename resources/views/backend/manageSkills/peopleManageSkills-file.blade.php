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
                    <div class="font-medium text-center text-lg"> เพิ่มไฟล์ข้อมูลประวัติการพัฒนาทักษะบุคลากร </div>
                   
                </div>
                <form action="{{ url('backend/people/manageskills/import') }}" method="post" enctype="multipart/form-data" onSubmit="return checkForm(this)">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ไฟล์ตัวอย่าง </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <a class="btn btn-primary" href="{{ url('public/file/Coures-Table-header.xlsx') }}">
                                ไฟล์ตัวอย่าง
                            </a>
                            <!-- <input class="form-control box-form-ct" name="news_name" type="file" id="formFile"> -->
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> ไฟล์ข้อมูลประวัติการพัฒนาทักษะบุคลากร </lable></b>
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <input class="form-control box-form-ct" name="history_coures" type="file" id="history_coures">
                        </div>
                    </div>
                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                            <a href="{{url('backend/people/manageskills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script> 
	function checkForm(form) {
        var extall = "xlsx";
        var fileInput = document.getElementById("history_coures");
        var file = fileInput.value;
        var ext = file.split('.').pop().toLowerCase();
        
        if (extall.indexOf(ext) < 0) {
            alert('รองรับไฟล์นามสกุล : ' + extall);
            return false;
        }
    }
</script>
@endsection





</body>
</html>
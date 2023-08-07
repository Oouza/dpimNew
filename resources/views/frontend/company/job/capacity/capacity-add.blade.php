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
                    <div class="font-medium text-center text-lg">เพิ่มสมรรถนะกลุ่มตำแหน่ง 1</div>
                   
                </div>
                <form action="{{ url('backend/news/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity" id="capacity" class="form-control select2" onchange="sSelect()">
                                        <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                                        <option value="0">อื่นๆ</option>
                                        <option value="1">สมรรถนะ 1</option>
                                        <option value="2">สมรรถนะ 2</option>
                                        <option value="3">สมรรถนะ 3</option>
                                    </select>
                                </div>
                            </div>

                            <div id="capacity_new" style="display:none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสสมรรถนะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control" type="text" name="capacity_code" id="capacity_code" value="001" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อสมรรถนะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control" type="text" name="capacity_code" id="capacity_code" placeholder="ชื่อสมรรถนะ" required>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="55" id="capacity_detail" name="capacity_detail" rows="10" placeholder="คำอธิบาย"></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ระดับความจำเป็น </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input name="gender" type="radio" value="ชาย"> จำเป็น
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input name="gender" type="radio" value="หญิง"> ไม่จำเป็น
                                    </div>
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>

                                <a href="{{url('company/job/capacity')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>         -->
                                <a href="#" class="btn btn-success w-24 ml-2">บันทึก</a>

                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script type="text/javascript">
	function sSelect(){
		index = document.getElementById('capacity').value;
		if(index == '0'){
			document.getElementById('capacity_new').style.display='';
		}else{
			document.getElementById('capacity_new').style.display='none';
        }
	}
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#capacity_detail' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script>
    $(document).ready(function(){
        $('#capacity').select2({
            placeholder: "- กรุณาเลือกสมรรถนะ -",
            allowClear: true
        });
    });
</script>
@endsection





</body>
</html>
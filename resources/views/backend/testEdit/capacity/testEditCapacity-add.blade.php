<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "testEdit";
$active = "testEditCapacity";
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
                    <div class="font-medium text-center text-lg">รวมข้อมูลสมรรถนะ</div>
                   
                </div>
                <form action="{{ url('backend/testEdit/capacity/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เลือกสมรรถนะเป้าหมาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity" id="capacity" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                                        @foreach($capacityAdmin as $rs)
                                        <option value="{{$rs->cc_id}}">{{$rs->cc_no}} {{$rs->cc_name}}</option>
                                        @endforeach
                                        <!-- <option value="2">กลุ่มตำแหน่ง 2</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะที่ต้องการนำไปรวมยังสมรรถนะเป้าหมาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity_new" id="capacity_new" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                                        @foreach($capacity as $rs)
                                        <option value="{{$rs->cc_id}}">{{$rs->cc_no}} {{$rs->cc_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะที่ต้องการนำไปรวมยังสมรรถนะเป้าหมาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity_two" id="capacity_two" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                                        <option value="1">- สมรรถนะ 1 -</option>
                                        <option value="2">- สมรรถนะ 2 -</option>
                                    </select>
                                </div>
                            </div> -->

                            <div id="form-container"></div>
                            <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มสมรรถนะ</button>
                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="news_detail" name="news_detail" rows="10"></textarea>
                                </div>
                            </div> -->

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                            <a href="{{url('backend/testEdit/job')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
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
    let formCount = 2;

    addFormBtn.addEventListener("click", function() {
    formCount++;
    const div = document.createElement("div");
    div.setAttribute("id", `study${formCount}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> สมรรถนะที่ต้องการนำไปรวมยังสมรรถนะเป้าหมาย </lable></b> 
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <select name="capacityAdd[${formCount}]" id="capacityAdd[${formCount}]" class="form-control">
                <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                @foreach($capacity as $rs)
                <option value="{{$rs->cc_id}}">{{$rs->cc_no}} {{$rs->cc_name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
    </div>
    <div id="form-container-skills(${formCount})"></div>
    `;
    formContainer.appendChild(div);

    $(document).ready(function(){
        $(`#capacityAdd\\[${formCount}\\]`).select2({
            placeholder: "- กรุณาเลือกสมรรถนะ -",
            allowClear: true
        });
    });

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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('#job').select2({
            placeholder: "- กรุณาเลือกกลุ่มตำแหน่ง -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#capacity_one').select2({
            placeholder: "- กรุณาเลือกสมรรถนะ -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#capacity_two').select2({
            placeholder: "- กรุณาเลือกสมรรถนะ -",
            allowClear: true
        });
    });
</script>
@endsection





</body>
</html>
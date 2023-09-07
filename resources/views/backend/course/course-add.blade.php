<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "course";
$active = "totalCourse";
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
                    <div class="font-medium text-center text-lg"> เพิ่มข้อมูลหลักสูตรพัฒนาบุคลากร </div>
                   
                </div>
                <form action="{{ url('backend/course/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="no" type="text" id="formFile" Placeholder="รหัสหลักสูตร" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="couName" type="text" id="formFile" Placeholder="ชื่อหลักสูตร" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ผู้จัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="peopleName" type="text" id="formFile" Placeholder="ผู้จัด" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กำหนดการจัดอบรม</lable></b>
                                </div>
                                <!-- <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="number" min="1" id="formFile" Placeholder="ระยะเวลาจัดอบรม (ชั่วโมง)" required>
                                </div> -->
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เริ่ม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="start" type="date" id="formFile" Placeholder="เริ่ม" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สิ้นสุด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="end" type="date" id="formFile" Placeholder="สิ้นสุด" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาจัดอบรม (ชั่วโมง) </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="period" type="number" min="1" id="formFile" Placeholder="ระยะเวลาจัดอบรม (ชั่วโมง)" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="course_type" id="course_type" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option>
                                        @foreach($typeCourse as $rs)
                                        <option value="{{$rs->tc_id}}">{{$rs->tc_no}} {{$rs->tc_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1</lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="skills" id="skills" class="form-control select2" required>
                                        <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                        @foreach($skills as $row)
                                        <option value="{{$row->s_id}}" disabled>{{$row->s_no}} {{$row->s_name}}</option>
                                            @foreach($skillsSubs as $rs)
                                            @if($rs->FKss_skills == $row->s_id)
                                            <option value="{{$rs->ss_id}}">&nbsp;&nbsp;&nbsp;{{$rs->ss_no}} {{$rs->ss_name}}</option>
                                            @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="form-container"></div>
                            <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" onclick="add_fields()">เพิ่มทักษะ</button>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ความถี่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="frequency" type="text" id="formFile" Placeholder="ความถี่" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="detail" name="detail" rows="10" Placeholder="คำอธิบาย"></textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="course_note" name="course_note" rows="10" Placeholder="หมายเหตุ"></textarea>
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                            <a href="{{url('backend/course')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    function add_fields(){
        const formContainer = document.getElementById("form-container");
            let formCount = formContainer.querySelectorAll('[id^="study"]').length + 1;
            formCount++;
            // alert(formCount);

            const div = document.createElement("div");
            div.setAttribute("id", `study${formCount}`);
            div.innerHTML = `
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย ${formCount} </lable></b>
                </div>
                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                    <select name="skills_other[${formCount}]" id="skills_other[${formCount}]" class="form-control select2">
                        <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                        @foreach($skills as $row)
                        <option value="{{$row->s_id}}" disabled>{{$row->s_no}} {{$row->s_name}}</option>
                            @foreach($skillsSubs as $rs)
                            @if($rs->FKss_skills == $row->s_id)
                            <option value="{{$rs->ss_id}}">&nbsp;&nbsp;&nbsp;{{$rs->ss_no}} {{$rs->ss_name}}</option>
                            @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
            </div>
            `;
            formContainer.appendChild(div);

            $(document).ready(function(){
                $(`#skills_other\\[${formCount}\\]`).select2({
                    placeholder: "- กรุณาเลือกทักษะย่อย -",
                    allowClear: true
                });
            });
    }

    function del_study(num) {
        const div = document.getElementById(`study${num}`);
        if (div) {
            if (confirm(`คุณแน่ใจหรือไม่ว่าต้องการลบทักษะย่อยที่${num}?`)) {
                div.parentNode.removeChild(div); // ใช้ parentNode.removeChild เพื่อลบองค์ประกอบ
                formCount--;
            }
        }
    }
</script>
<!-- <script>
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
            <b><label for="horizontal-form-1" class="form-label "> ทักษะ ${formCount} </lable></b> 
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <select name="skills" id="skills" class="form-control select2">
                <option value="" hidden>- กรุณาเลือกทักษะ -</option>
                @foreach($skills as $row)
                <option value="{{$row->s_id}}" disabled>{{$row->s_no}} {{$row->s_name}}</option>
                    @foreach($skillsSubs as $rs)
                    @if($rs->FKss_skills == $row->s_id)
                    <option value="{{$rs->ss_id}}">&nbsp;&nbsp;&nbsp;{{$rs->ss_no}} {{$rs->ss_name}}</option>
                    @endif
                    @endforeach
                @endforeach
            </select>
        </div>
        <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
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

</script> -->

<script>
    ClassicEditor
    .create( document.querySelector( '#detail' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#course_note' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
        $('#course_type').select2({
            placeholder: "- กรุณาเลือกประเภทหลักสูตร -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#skills').select2({
            placeholder: "- กรุณาเลือกทักษะย่อย -",
            allowClear: true
        });
    });
</script>
@endsection





</body>
</html>
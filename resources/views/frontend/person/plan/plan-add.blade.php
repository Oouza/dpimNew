<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterUser')
<?php
$activePage = "plan";
$active = "";
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
                    <div class="font-medium text-center text-lg">เพิ่มแผนการพัฒนาทักษะย่อย</div>
                   
                </div>
                <form action="{{ url('backend/skills/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">หลักสูตรการอบรม</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="select_id" type="radio" id="select_id" onclick="sSelect2()" required checked> หลักสูตรการอบรมเก่า
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="select_id" type="radio" id="select_id" onclick="sSelect()" required> หลักสูตรการอบรมใหม่
                                </div>
                            </div>

                        <div style="display:block" id="input_studyOld">                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label ">ชื่อหลักสูตรการอบรม</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="course_name" id="course_name" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกหลักสูตรการอบรม -</option>
                                        <option value="1">หลักสูตรการอบรม 1</option>
                                        <option value="2">หลักสูตรการอบรม 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ผู้จัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" class="form-control" disabled>
                                    <!-- <select name="course_people" id="course_people" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกผู้จัด -</option>
                                        <option value="1">ผู้จัด 1</option>
                                        <option value="2">ผู้จัด 2</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กำหนดการจัดอบรม</lable></b>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เริ่ม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="start" type="text" id="formFile" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สิ้นสุด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="end" type="text" id="formFile" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="number" min="1" id="formFile" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" class="form-control" disabled>
                                    <!-- <select name="type_course" id="type_course" class="form-control select2" disabled>
                                        <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option>
                                        <option value="1">ประเภทหลักสูตร 1</option>
                                        <option value="2">ประเภทหลักสูตร 2</option>
                                        <option value="3">ประเภทหลักสูตร 3</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="55" id="" name="" rows="10" class="form-control" disabled></textarea>
                                </div>
                            </div>
                            
                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ความถี่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="number" min="1" id="formFile" disabled>
                                </div>
                            </div> -->

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="55" id="" name="" rows="10" class="form-control" disabled></textarea>
                                </div>
                            </div>
                        </div>                       

                        <div style="display:none" id="input_study">
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อหลักสูตรการอบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="ชื่อหลักสูตรการอบรม" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ผู้จัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" Placeholder="ผู้จัด" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กำหนดการจัดอบรม</lable></b>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เริ่ม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="start" type="date" id="formFile">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สิ้นสุด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="end" type="date" id="formFile">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="number" min="1" id="formFile" Placeholder="ระยะเวลาการอบรม (ชั่วโมง)" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="type_now" id="type_now" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option>
                                        <option value="1">ประเภทหลักสูตร 1</option>
                                        <option value="2">ประเภทหลักสูตร 2</option>
                                        <option value="3">ประเภทหลักสูตร 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1</lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="skills_now" id="skills_now" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                        <option value="1">ทักษะย่อย 1</option>
                                        <option value="2">ทักษะย่อย 2</option>
                                        <option value="3">ทักษะย่อย 3</option>
                                    </select>
                                </div>
                            </div>

                            <div id="form-container"></div>
                            <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
                            
                            <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ความถี่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="number" min="1" id="formFile" Placeholder="ความถี่" required>
                                </div>
                            </div> -->

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="detail_new" name="detail_new" rows="10" Placeholder="คำอธิบาย"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                <b><label for="horizontal-form-1" class="form-label "> เริ่มการอบรมวันที่ </lable></b>
                            </div>
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                <b><label for="horizontal-form-1" class="form-label "> สิ้นสุดการอบรมวันที่ </lable></b>
                            </div>
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                <b><label for="horizontal-form-1" class="form-label "> แนบรายละเอียดหลักสูตรอบรม </lable></b>
                            </div>
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                <input type="file" name="" id="" class="form-control box-form-ct">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                <b><label for="horizontal-form-1" class="form-label "> ค่าสมัครการอบรม </lable></b>
                            </div>
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                <input type="number" min="0" class="form-control">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                <b><label for="horizontal-form-1" class="form-label "> ค่าใช้จ่ายอื่นๆ </lable></b>
                            </div>
                            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                <input type="number" min="0" class="form-control">
                            </div>
                        </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                                <a href="{{url('user/plan')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>         -->
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

    ClassicEditor
    .create( document.querySelector( '#detail_new' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script type="text/javascript">
    function sSelect(){
        document.getElementById('input_study').style.display = 'block';
        document.getElementById('input_studyOld').style.display = 'none';
        
        // var index = document.getElementById('select_id').value;
        // if(index === '0'){
        //     document.getElementById('input_study').style.display = 'block';
        // } else {
        //     document.getElementById('input_study').style.display = 'none';
        // }
    }

    function sSelect2(){
        document.getElementById('input_study').style.display = 'none';
        document.getElementById('input_studyOld').style.display = 'block';
    }
</script>

<script>
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
            <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย ${formCount} </lable></b> 
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <select name="job_type" id="job_type" class="form-control select2" required">
                <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                <option value="1">ทักษะย่อย 1</option>
                <option value="1">ทักษะย่อย 2</option>
                <option value="1">ทักษะย่อย 3</option>
                <option value="1">ทักษะย่อย 4</option>
                <option value="1">ทักษะย่อย 5</option>
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

</script>

<script>
    $(document).ready(function(){
        $('#course_name').select2({
            placeholder: "- กรุณาเลือกหลักสูตรการอบรม -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#course_people').select2({
            placeholder: "- กรุณาเลือกผู้จัด -",
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
            placeholder: "- กรุณาเลือกทักษะย่อย -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#type_now').select2({
            placeholder: "- กรุณาเลือกประเภทหลักสูตร -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#skills_now').select2({
            placeholder: "- กรุณาเลือกทักษะย่อย -",
            allowClear: true
        });
    });
</script>
@endsection





</body>
</html>
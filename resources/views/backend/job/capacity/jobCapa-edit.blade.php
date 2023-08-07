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
                    <div class="font-medium text-center text-lg">แก้ไขสมรรถนะในกลุ่มตำแหน่งงาน 1</div>
                   
                </div>
                <form action="{{ url('backend/job/capacity/update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity" id="capacity" class="form-control select2" required>
                                        <!-- <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option> -->
                                        <option value="1">สมรรถนะ 1</option>
                                        <option value="2" selected>สมรรถนะ 2</option>
                                        <option value="3">สมรรถนะ 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label"> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="55" id="" name="" rows="10" disabled> คำอธิบายสมรรถนะ2 </textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับความจำเป็น </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="gender" type="radio" value="ชาย" checked> จำเป็น
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="gender" type="radio" value="หญิง"> ไม่จำเป็น
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                            <a href="{{url('backend/job/capacity')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
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
            <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ ${formCount} </lable></b> 
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
            <select name="job_type" id="job_type" class="form-control" required onchange="province(${formCount})">
                <option value="" hidden>-กรุณาเลือก-</option>
                <option value="1">สมรรถนะ1</option>
                <option value="1">สมรรถนะ2</option>
                <option value="1">สมรรถนะ3</option>
                <option value="1">สมรรถนะ4</option>
                <option value="1">สมรรถนะ5</option>
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
function province($id) {
    const formContainerskills = document.getElementById("form-container-skills("+$id+")");
    const skills1 = document.getElementById("skills1");
    let formCountSkills = 0;

    if (!skills1) {
    formCountSkills++;
    const div = document.createElement("div");
    div.setAttribute("id", `skills${formCountSkills}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> ทักษะ${formCountSkills} </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
            <select name="job_type" id="job_type" class="form-control" required onchange="skillsSub()">
                <option value="" hidden>-กรุณาเลือก-</option>
                <option value="1">ทักษะ1</option>
                <option value="1">ทักษะ2</option>
                <option value="1">ทักษะ3</option>
                <option value="1">ทักษะ4</option>
                <option value="1">ทักษะ5</option>
            </select>
        </div>
        <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skills(${formCountSkills})">ลบ</button>
    </div>
    <div id="form-container"></div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะ</button>
        </div>
    </div>
    `;
    formContainerskills.appendChild(div);
    }
}
function del_skills(count){
        const formContainerskills = document.getElementById("form-container-skills");
        const div = document.getElementById(`skills${count}`);
        if (div) {
            if (confirm(`Are you sure you want to delete ?`)) {
            formContainerskills.removeChild(div);
            formCountSkills--;
            }
        }
    } 
</script>

<script>
function skillsSub() {
    const formContainerskills = document.getElementById("form-container-skills");
    const skillsSub1 = document.getElementById("skillsSub1");
    let formCountSkills = 0;

    if (!skillsSub1) {
    formCountSkills++;
    const div = document.createElement("div");
    div.setAttribute("id", `skillsSub${formCountSkills}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1 </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
            <select name="job_type" id="job_type" class="form-control" required>
                <option value="" hidden>-กรุณาเลือก-</option>
                <option value="1">ทักษะย่อย 1</option>
                <option value="1">ทักษะย่อย 2</option>
                <option value="1">ทักษะย่อย 3</option>
                <option value="1">ทักษะย่อย 4</option>
                <option value="1">ทักษะย่อย 5</option>
            </select>
        </div>
        <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skillsSub(${formCountSkills})">ลบ</button>
    </div>
    <div id="form-container-sub"></div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <button id="add-form-btn-sub" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
        </div>
    </div>
    `;
    formContainerskills.appendChild(div);
    }
}
function del_skillsSub(count){
        const formContainerskills = document.getElementById("form-container-skills");
        const div = document.getElementById(`skillsSub${count}`);
        if (div) {
            if (confirm(`Are you sure you want to delete ?`)) {
            formContainerskills.removeChild(div);
            formCountSkills--;
            }
        }
    } 
</script>

<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>

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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterCompany')
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
                    <div class="font-medium text-center text-lg">เพิ่มรายการพัฒนาบุคลากร</div>
                   
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
                                    <select name="people" id="people" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกพนักงาน -</option>
                                        <option value="1">ไก่ กา</option>
                                        <option value="2">เอ บี</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" disabled>
                                    <!-- <select name="department" id="department" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกแผนก -</option>
                                        <option value="1">แผนก 1</option>
                                        <option value="2">แผนก 2</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" disabled>
                                    <!-- <select name="departmentSub" id="departmentSub" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกแผนกย่อย -</option>
                                        <option value="1">แผนกย่อย 1</option>
                                        <option value="2">แผนกย่อย 2</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" disabled>
                                    <!-- <select name="position" id="position" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกตำแหน่ง -</option>
                                        <option value="1">ตำแหน่ง 1</option>
                                        <option value="2">ตำแหน่ง 2</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="" id="" class="form-control" disabled>
                                    <!-- <select name="job" id="job" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกกลุ่มตำแหน่ง -</option>
                                        <option value="1">กลุ่มตำแหน่ง 1</option>
                                        <option value="2">กลุ่มตำแหน่ง 2</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity" id="capacity" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                                        <option value="1">สมรรถนะ 1</option>
                                        <option value="2">สมรรถนะ 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="upSkills" id="upSkills" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกทักษะ -</option>
                                        <option value="1">ทักษะ 1</option>
                                        <option value="2">ทักษะ 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อยที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="skillsSub" id="skillsSub" class="form-control select2">
                                        <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                        <option value="1">ทักษะย่อย 1</option>
                                        <option value="2">ทักษะย่อย 2</option>
                                    </select>
                                </div>
                            </div>

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
                                            <!-- <option value="0">อื่นๆ</option> -->
                                            <option value="1">หลักสูตรการอบรม 1</option>
                                            <option value="2">หลักสูตรการอบรม 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" disabled>
                                        <!-- <select name="people_course" id="people_course" class="form-control select2" required onchange="province()">
                                            <option value="" hidden>- กรุณาเลือกผู้จัดการอบรม -</option>
                                            <option value="1">ผู้จัดการอบรม 1</option>
                                            <option value="2">ผู้จัดการอบรม 2</option>
                                            <option value="3">ผู้จัดการอบรม 3</option>
                                            <option value="4">ผู้จัดการอบรม 4</option>
                                            <option value="5">ผู้จัดการอบรม 5</option>
                                        </select> -->
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" disabled>
                                        <!-- <select name="type_course" id="type_course" class="form-control select2" required onchange="province()">
                                            <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option>
                                            <option value="1">ประเภทหลักสูตร 1</option>
                                            <option value="2">ประเภทหลักสูตร 2</option>
                                            <option value="3">ประเภทหลักสูตร 3</option>
                                            <option value="4">ประเภทหลักสูตร 4</option>
                                            <option value="5">ประเภทหลักสูตร 5</option>
                                        </select> -->
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย</lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="" id="" cols="55" rows="10" class="form-control" disabled></textarea>    
                                    <!-- <select name="skills" id="skills" class="form-control select2" required>
                                            <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                            <option value="1">ทักษะย่อย 1</option>
                                            <option value="2">ทักษะย่อย 2</option>
                                            <option value="3">ทักษะย่อย 3</option>
                                            <option value="4">ทักษะย่อย 4</option>
                                            <option value="5">ทักษะย่อย 5</option>
                                        </select> -->
                                    </div>
                                </div>

                                <!-- <div id="form-container"></div>
                                <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button> -->

                                <!-- <div class="grid grid-cols-12 gap-6 mt-5">
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
                                </div> -->
                            </div>

                            <div style="display:none" id="input_study">                            
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label ">ชื่อหลักสูตรการอบรม</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" placeholder="กรอกชื่อหลักสูตร">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" placeholder="ผู้จัดการอบรม">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" class="form-control" placeholder="ระยะเวลาการอบรม (ชั่วโมง)">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="type_course_now" id="type_course_now" class="form-control select2" required onchange="province()">
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
                                        <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1</lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="skills1" id="skills1" class="form-control select2" required onchange="province()">
                                            <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                            <option value="1">ทักษะย่อย 1</option>
                                            <option value="2">ทักษะย่อย 2</option>
                                            <option value="3">ทักษะย่อย 3</option>
                                            <option value="4">ทักษะย่อย 4</option>
                                            <option value="5">ทักษะย่อย 5</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="form-container"></div>
                                <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
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
                                        <b><label for="horizontal-form-1" class="form-label "> ค่าสมัครอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ค่าใช้จ่ายอื่นๆ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            <!-- <div id="form-container-skills"></div>

                            <div id="form-container"></div>
                            <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มสมรรถนะ</button> -->


                            


                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('company/plan/skills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>         -->
                                <a href="#" class="btn btn-success w-50">บันทึก</a>
                            
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script type="text/javascript">
    function sSelect(){
        document.getElementById('input_study').style.display = 'block';
        document.getElementById('input_studyOld').style.display = 'none';
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
            <select name="job_type" id="job_type" class="form-control" required">
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
        $('#people').select2({
            placeholder: "- กรุณาเลือกพนักงาน -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#department').select2({
            placeholder: "- กรุณาเลือกแผนก -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#departmentSub').select2({
            placeholder: "- กรุณาเลือกแผนกย่อย -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#position').select2({
            placeholder: "- กรุณาเลือกตำแหน่ง -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#job').select2({
            placeholder: "- กรุณาเลือกกลุ่มตำแหน่ง -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#course_name').select2({
            placeholder: "- กรุณาเลือกหลักสูตรการอบรม -",
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
        $('#type_course_now').select2({
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
        $('#skills1').select2({
            placeholder: "- กรุณาเลือกทักษะย่อย -",
            allowClear: true
        });
    });
    
    $(document).ready(function(){
        $('#capacity').select2({
            placeholder: "- กรุณาเลือกสมรรถนะ -",
            allowClear: true
        });
    });
    
    $(document).ready(function(){
        $('#upSkills').select2({
            placeholder: "- กรุณาเลือกทักษะ -",
            allowClear: true
        });
    });
    
    $(document).ready(function(){
        $('#skillsSub').select2({
            placeholder: "- กรุณาเลือกทักษะย่อย -",
            allowClear: true
        });
    });
</script>
@endsection



</body>
</html>
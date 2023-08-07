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
                    <div class="font-medium text-center text-lg">แก้ไขรายการพัฒนาบุคลากร</div>
                   
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
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="1" hidden>- กรุณาเลือกพนักงาน -</option> -->
                                        <option value="2" selected>ไก่ กา</option>
                                        <option value="3">เอ บี</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="" hidden>- กรุณาเลือกแผนก -</option> -->
                                        <option value="1" selected>แผนก 1</option>
                                        <option value="2">แผนก 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="" hidden>- กรุณาเลือกแผนกย่อย -</option> -->
                                        <option value="1" selected>แผนกย่อย 1</option>
                                        <option value="2">แผนกย่อย 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="" hidden>- กรุณาเลือกตำแหน่ง -</option> -->
                                        <option value="1" selected>ตำแหน่ง 1</option>
                                        <option value="2">ตำแหน่ง 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="" id="" class="form-control select2">
                                        <!-- <option value="" hidden>- กรุณาเลือกกลุ่มตำแหน่ง -</option> -->
                                        <option value="1" selected>กลุ่มตำแหน่ง 1</option>
                                        <option value="2">กลุ่มตำแหน่ง 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity" id="capacity" class="form-control select2">
                                        <option value="1">สมรรถนะ 1</option>
                                        <option value="2" selected>สมรรถนะ 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="upSkills" id="upSkills" class="form-control select2">
                                        <option value="1" selected>ทักษะ 1</option>
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
                                        <option value="1">ทักษะย่อย 1</option>
                                        <option value="2" selected>ทักษะย่อย 2</option>
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
                                        <select name="" id="select_id" class="form-control select2">
                                            <!-- <option value="" hidden>- กรุณาเลือกหลักสูตรการอบรม -</option> -->
                                            <option value="1" selected>หลักสูตรการอบรม 1</option>
                                            <option value="2">หลักสูตรการอบรม 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" value="ผู้จัดการอบรม1">
                                        <!-- <select name="" id="" class="form-control select2" required onchange="province()">
                                            <option value="" hidden>- กรุณาเลือกผู้จัดการอบรม -</option>
                                            <option value="1" selected>ผู้จัดการอบรม 1</option>
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
                                        <input type="number" class="form-control" placeholder="ระยะเวลาการอบรม (ชั่วโมง)" value="3">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" value="ประเภทหลักสูตร1">
                                        <!-- <select name="" id="" class="form-control select2" required onchange="province()">
                                            <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option>
                                            <option value="1" selected>ประเภทหลักสูตร 1</option>
                                            <option value="2">ประเภทหลักสูตร 2</option>
                                            <option value="3">ประเภทหลักสูตร 3</option>
                                            <option value="4">ประเภทหลักสูตร 4</option>
                                            <option value="5">ประเภทหลักสูตร 5</option>
                                        </select> -->
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชุดทักษะ 1</lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea name="" id="" cols="30" rows="10" class="form-control">
ทักษะ1
ทักษะ2
                                        </textarea>
                                        <!-- <select name="" id="" class="form-control select2" required onchange="province()">
                                            <option value="" hidden>- กรุณาเลือกชุดทักษะ -</option>
                                            <option value="1" selected>ชุดทักษะ 1</option>
                                            <option value="2">ชุดทักษะ 2</option>
                                            <option value="4">ชุดทักษะ 3</option>
                                            <option value="5">ชุดทักษะ 4</option>
                                            <option value="6">ชุดทักษะ 5</option>
                                        </select> -->
                                    </div>
                                </div>

                                <!-- <div id="form-container"></div>
                                <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มชุดทักษะ</button> -->

                            </div>

                            <div style="display:none" id="input_study">                            
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label ">ชื่อหลักสูตรการอบรม</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" placeholder="กรอกชื่อหลักสูตร" value="หลักสูตรการอบรม 3">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" class="form-control" placeholder="ผู้จัดการอบรม" value="ผู้จัดการอบรม 3">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" class="form-control" placeholder="ระยะเวลาการอบรม (ชั่วโมง)" value="6">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="" id="" class="form-control select2" required onchange="province()">
                                            <!-- <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option> -->
                                            <option value="1" selected>ประเภทหลักสูตร 1</option>
                                            <option value="2">ประเภทหลักสูตร 2</option>
                                            <option value="3">ประเภทหลักสูตร 3</option>
                                            <option value="5">ประเภทหลักสูตร 4</option>
                                            <option value="4">ประเภทหลักสูตร 5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชุดทักษะ 1</lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="" id="" class="form-control select2" required onchange="province()">
                                            <!-- <option value="" hidden>- กรุณาเลือกชุดทักษะ -</option> -->
                                            <option value="1" selected>ชุดทักษะ 1</option>
                                            <option value="2">ชุดทักษะ 2</option>
                                            <option value="3">ชุดทักษะ 3</option>
                                            <option value="4">ชุดทักษะ 4</option>
                                            <option value="5">ชุดทักษะ 5</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="form-container"></div>
                                <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มชุดทักษะ</button>

                                <!-- <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เริ่มการอบรมวันที่ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="date" class="form-control" value="2023-07-20">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> สิ้นสุดการอบรมวันที่ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="date" class="form-control" value="2023-07-25">
                                    </div>
                                </div> -->
                            </div>

                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เริ่มการอบรมวันที่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date" class="form-control" value="2023-07-20">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สิ้นสุดการอบรมวันที่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date" class="form-control" value="2023-07-25">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ค่าใช้จ่าย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="number" class="form-control" value="200">
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
            <b><label for="horizontal-form-1" class="form-label "> ชุดทักษะ ${formCount} </lable></b> 
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <select name="job_type" id="job_type" class="form-control" required">
                <option value="" hidden>- กรุณาเลือกชุดทักษะ -</option>
                <option value="1">ชุดทักษะ 1</option>
                <option value="1">ชุดทักษะ 2</option>
                <option value="1">ชุดทักษะ 3</option>
                <option value="1">ชุดทักษะ 4</option>
                <option value="1">ชุดทักษะ 5</option>
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
        $('.select2').select2();
    });
</script>
@endsection



</body>
</html>
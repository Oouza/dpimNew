<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterCompany')
<?php
$activePage = "manage";
$active = "userSkills";
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
                    <div class="font-medium text-center text-lg">ข้อมูลสมรรถนะ ทักษะ และเป้าหมายการพัฒนารายบุคคล</div>
                   
                </div>
                <form action="{{ url('backend/skills/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            หมายเลขพนักงาน
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            001
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ชื่อ - นามสกุล
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            นาย ไก่ กา
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แผนก
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            แผนก 1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แผนกย่อย
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            แผนกย่อย 1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            ตำแหน่ง 1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            กลุ่มตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            กลุ่มตำแหน่ง 1
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ปี
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="" id="" class="form-control">
                                <option value="">2566</option>
                                <option value="">2567</option>
                                <option value="">2568</option>
                                <option value="">2569</option>
                                <option value="">2570</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <tr>
                            <th><center>สมรรถนะ</center></th>
                            <th><center>ทักษะ/ความรู้</center></th>
                            <th><center>ทักษะย่อย</center></th>
                            <th><center>ระดับ 1</center></th>
                            <th><center>ระดับ 2</center></th>
                            <th><center>ระดับ 3</center></th>
                        </tr>
                        <tr>
                            <td><center>สมรรถนะ 1</center></td>
                            <td><center>ทักษะ 1</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center>ทักษะย่อย 2</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center>ทักษะ 2</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center>ทักษะย่อย 2</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                        <tr>
                            <td><center>สมรรถนะ 2</center></td>
                            <td><center>ทักษะ 1</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center>ทักษะ 2</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                    </table>
                    <br>
                    <div id="form-container"></div>
                    <div> <button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10">เพิ่มเป้าหมายการพัฒนาทักษะ</button> </div>
                </div>
                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                <a href="{{url('company/manage/skills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <a href="#" class="btn btn-primary w-50">ส่งออกเป็น xls</a>ดาวน์โหลดข้อมูลแผนกทั้งหมด (เป็น xlsx) -->
                                <a href="#" class="btn btn-primary w-50">ดาวน์โหลด (เป็น pdf)</a>
                                <a href="#" class="btn btn-secondary w-50">ดาวน์โหลด (เป็น xlsx)</a>
                                <a href="#" class="btn btn-success w-50">บันทึก</a>
                                <!-- <button type="submit" class="btn btn-danger w-24 ml-2">ยกเลิกการอบรม</button>         -->
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
    let formCount = 0;

    addFormBtn.addEventListener("click", function() {
    formCount++;
    const div = document.createElement("div");
    div.setAttribute("id", `study${formCount}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> เป้าหมายการพัฒนาทักษะ ${formCount} </lable></b> 
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
            <select name="job_type" id="job_type" class="form-control" required onchange="province(${formCount})">
                <option value="" hidden>-กรุณาเลือกเป้าหมายการพัฒนาทักษะ-</option>
                <option value="1">สมรรถนะ 1</option>
                <option value="1">&nbsp;&nbsp;ทักษะ 1</option>
                <option value="1">&nbsp;&nbsp;ทักษะ 2</option>
                <option value="1">สมรรถนะ 2</option>
                <option value="1">&nbsp;&nbsp;ทักษะ 1</option>
                <option value="1">&nbsp;&nbsp;ทักษะ 2</option>
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
@endsection





</body>
</html>
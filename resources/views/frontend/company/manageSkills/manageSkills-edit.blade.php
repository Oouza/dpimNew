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
                    <div class="font-medium text-center text-lg">แก้ไขการพัฒนาบุคลากร</div>
                   
                </div>
                <form action="{{ url('backend/news/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <input class="form-control box-form-ct" name="news_name" value="ไก่" type="text" id="formFile" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> นามสกุล </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <input class="form-control box-form-ct" name="news_name" value="กา" type="text" id="formFile" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1">กลุ่มงาน 1</option>
                                        <option value="1" selected>กลุ่มงาน 2</option>
                                        <option value="1">กลุ่มงาน 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1">ตำแหน่ง 1</option>
                                        <option value="1" selected>ตำแหน่ง 2</option>
                                        <option value="1">ตำแหน่ง 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>สมรรถนะ1</option>
                                        <option value="1">สมรรถนะ2</option>
                                        <option value="1">สมรรถนะ3</option>
                                        <option value="1">สมรรถนะ4</option>
                                        <option value="1">สมรรถนะ5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะ1</option>
                                        <option value="1">ทักษะ2</option>
                                        <option value="1">ทักษะ3</option>
                                        <option value="1">ทักษะ4</option>
                                        <option value="1">ทักษะ5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะย่อย1</option>
                                        <option value="1">ทักษะย่อย2</option>
                                        <option value="1">ทักษะย่อย3</option>
                                        <option value="1">ทักษะย่อย4</option>
                                        <option value="1">ทักษะย่อย5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 2 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1">ทักษะย่อย1</option>
                                        <option value="1" selected>ทักษะย่อย2</option>
                                        <option value="1">ทักษะย่อย3</option>
                                        <option value="1">ทักษะย่อย4</option>
                                        <option value="1">ทักษะย่อย5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ 2 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะ1</option>
                                        <option value="1">ทักษะ2</option>
                                        <option value="1">ทักษะ3</option>
                                        <option value="1">ทักษะ4</option>
                                        <option value="1">ทักษะ5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะย่อย1</option>
                                        <option value="1">ทักษะย่อย2</option>
                                        <option value="1">ทักษะย่อย3</option>
                                        <option value="1">ทักษะย่อย4</option>
                                        <option value="1">ทักษะย่อย5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ2 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1">สมรรถนะ1</option>
                                        <option value="1"selected>สมรรถนะ2</option>
                                        <option value="1">สมรรถนะ3</option>
                                        <option value="1">สมรรถนะ4</option>
                                        <option value="1">สมรรถนะ5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะ1</option>
                                        <option value="1">ทักษะ2</option>
                                        <option value="1">ทักษะ3</option>
                                        <option value="1">ทักษะ4</option>
                                        <option value="1">ทักษะ5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-2"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                    <select name="news_type" id="news_type" class="form-control" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ทักษะย่อย1</option>
                                        <option value="1">ทักษะย่อย2</option>
                                        <option value="1">ทักษะย่อย3</option>
                                        <option value="1">ทักษะย่อย4</option>
                                        <option value="1">ทักษะย่อย5</option>
                                    </select>
                                </div>
                            </div>

                            

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('company/manage/skills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
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
            <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ ${formCount} </lable></b> 
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
            <select name="news_type" id="news_type" class="form-control" required onchange="province()">
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
    <div id="form-container-skills"></div>
    `;
    formContainer.appendChild(div);
    });

    function del_study(num){
        const div = document.getElementById(`study${num}`);
        if (div) {
            if (confirm(`Are you sure you want to delete form ${num}?`)) {
            formContainer.removeChild(div);
            formCount--;
            }
        }
    }  

</script>

<!-- <script>
    const formContainerskills = document.getElementById("form-container-skills");
    const addFormBtnSkills = document.getElementById("add-form-btn-skills");
    let formCountSkills = 1;

    addFormBtnSklils.addEventListener("click", function() {
    formCountSkills++;
    const div = document.createElement("div");
    div.setAttribute("id", `skills${formCountSkills}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ1 ทักษะ${formCountSkills} </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
            <select name="news_type" id="news_type" class="form-control" required>
                <option value="" hidden>-กรุณาเลือก-</option>
                <option value="1">ทักษะ1</option>
                <option value="1">ทักษะ2</option>
                <option value="1">ทักษะ3</option>
                <option value="1">ทักษะ4</option>
                <option value="1">ทักษะ5</option>
            </select>
        </div>
    </div>
    `;
    formContainerskills.appendChild(div);
    });

    function del_skills(count){
        const div = document.getElementById(`skills${count}`);
        if (div) {
            if (confirm(`Are you sure you want to delete form ${count}?`)) {
            formContainerskills.removeChild(div);
            formCountSkills--;
            }
        }
    }  

</script> -->

<script>
function province() {
    // alert('5555');
    const formContainerskills = document.getElementById("form-container-skills");
    const skills1 = document.getElementById("skills1");
    // const addFormBtnSkills = document.getElementById("add-form-btn-skills");
    let formCountSkills = 0;

    if (!skills1) {// addFormBtnSklils.addEventListener("click", function() {
    formCountSkills++;
    const div = document.createElement("div");
    div.setAttribute("id", `skills${formCountSkills}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ1 ทักษะ${formCountSkills} </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
            <select name="news_type" id="news_type" class="form-control" required onchange="skillsSub()">
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
    <button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะ</button>
    `;
    formContainerskills.appendChild(div);
    }
    // });
}
function del_skills(count){
        const formContainerskills = document.getElementById("form-container-skills");
        const div = document.getElementById(`skills${count}`);
        if (div) {
            if (confirm(`Are you sure you want to delete form ${count}?`)) {
            formContainerskills.removeChild(div);
            formCountSkills--;
            }
        }
    } 
</script>

<script>
function skillsSub() {
    // alert('5555');
    const formContainerskills = document.getElementById("form-container-skills");
    const skillsSub1 = document.getElementById("skillsSub1");
    // const addFormBtnSkills = document.getElementById("add-form-btn-skills");
    let formCountSkills = 0;

    // addFormBtnSklils.addEventListener("click", function() {
    if (!skillsSub1) {
    formCountSkills++;
    const div = document.createElement("div");
    div.setAttribute("id", `skillsSub${formCountSkills}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ1 ทักษะ1 ทักษะย่อย 1 </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
            <select name="news_type" id="news_type" class="form-control" required>
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
    <button id="add-form-btn-sub" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
    `;
    formContainerskills.appendChild(div);
    }
    // });
}
function del_skillsSub(count){
        const formContainerskills = document.getElementById("form-container-skills");
        const div = document.getElementById(`skillsSub${count}`);
        if (div) {
            if (confirm(`Are you sure you want to delete form ${count}?`)) {
            formContainerskills.removeChild(div);
            formCountSkills--;
            }
        }
    } 
</script>

@endsection

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  delete -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  <!-- delete -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>



</body>
</html>
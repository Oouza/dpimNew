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
                    <div class="font-medium text-center text-lg">เพิ่ม ทักษะ ใน{{$gjc->cc_name}} ของ{{$gjc->gj_name}}</div>
                   
                </div>
                <form action="{{ url('backend/job/skills/add/'.$gjc->gjc_id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <select name="jobC" id="jobC" class="form-control" required onchange="province(1)"> -->
                                    <select name="skills" id="skills" class="form-control" onchange="selectSkills()" required>
                                        <option value="" hidden>- กรุณาเลือกทักษะ -</option>
                                        @foreach($skills as $rs)
                                        <option value="{{$rs->s_id}}">{{$rs->s_no}} {{$rs->s_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="45" id="skills_detail" name="skills_detail" rows="10" class="form-control" disabled></textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1</lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <select name="jobC" id="jobC" class="form-control" required onchange="province(1)"> -->
                                    <select name="skillsSub_one" id="skillsSub_one" class="form-control" onchange="selectSkillsSub()" required>
                                        <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะย่อย 1 </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="55" id="skillsSub_detail" name="skillsSub_detail" rows="10" class="form-control" disabled></textarea>
                                </div>
                            </div>
                            <div id="form-container-skills(1)"></div>

                            <div id="form-container"></div>
                            <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" onclick="add_fields()">เพิ่มทักษะย่อย</button>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                            <a href="{{url('backend/job/skills/'.$gjc->gjc_id)}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                            <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')

<script>
    function add_fields() {
        var skills = $('#skills').val();
        // alert(skills);
        if(skills == ''){
            alert('กรุณาเลือกทักษะ');
        }else{
            const formContainer = document.getElementById("form-container");
            let formCount = formContainer.querySelectorAll('[id^="study"]').length + 1;
            formCount++;
            // alert(formCount);

            const div = document.createElement("div");
            div.setAttribute("id", `study${formCount}`);
            div.innerHTML = `
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย ${formCount} </label></b> 
                </div>
                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                    <select name="skillsSub[${formCount}]" id="skillsSub[${formCount}]" class="form-control" onchange="selectSkillsSub2(${formCount})" required>
                        <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                    </select>
                </div>
                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
            </div>
            <div id="form-container-skills${formCount}"></div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                    <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะย่อย ${formCount} </label></b>
                </div>
                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                    <textarea cols="45" id="skillsSub_detail[${formCount}]" name="skillsSub_detail[${formCount}]" rows="10" class="form-control" disabled></textarea>
                </div>
            </div>
            `;
            formContainer.appendChild(div);


            $(document).ready(function(){
                $(`#skillsSub\\[${formCount}\\]`).select2({
                    placeholder: "- กรุณาเลือกทักษะย่อย -",
                    allowClear: true
                });
            });

            if (skills !== '') {
                $.ajax({
                    type: 'post',
                    url: "{{ url('searchSkills') }}",
                    dataType: 'json',
                    data: {
                        skills: skills,
                        _token: "{{csrf_token()}}"
                    },
                    success: function (response) {
                        let skillsSubSelect = $(`#skillsSub\\[${formCount}\\]`);
                        skillsSubSelect.html(response.html);
                    }
                });
            }
        }
    }
</script>

<script>
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

<script>
    function selectSkillsSub2($id) {
        let skillsSub = $(`#skillsSub\\[${$id}\\]`).val();

        if (skillsSub == '') {
            // Do something if skills is empty
        } else {
            $.ajax({
                type: 'post',
                url: "{{ url('searchskillsSub') }}",
                dataType: 'json',
                data: {
                    skillsSub: skillsSub,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    var skillsDetail = $(`#skillsSub_detail\\[${$id}\\]`); // ใช้ $id ที่ส่งเข้ามาในฟังก์ชัน
                    var cleanedResponse = removeHtmlTagsSub(response);
                    skillsDetail.text(cleanedResponse); // ใช้ .text() แทน .innerText เนื่องจากใช้ jQuery
                }
            });
        }
    }

    function removeHtmlTagsSub(input) {
        var div = document.createElement('div');
        div.innerHTML = input;
        return div.textContent || div.innerText || '';
    }
</script>

<script>
    $(document).ready(function(){
        $('#skills').select2({
            placeholder: "- กรุณาเลือกทักษะ -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#skillsSub_one').select2({
            placeholder: "- กรุณาเลือกทักษะย่อย -",
            allowClear: true
        });
    });
</script>

<script>
    function removeHtmlTags(input) {
        var div = document.createElement('div');
        div.innerHTML = input;
        return div.textContent || div.innerText || '';
}

    function selectSkills() {
        var skills = $('#skills').val();
        // alert(skills);
        if (skills == '') {
            // Do something if skills is empty
        } else {
            $.ajax({
                type: 'post',
                url: "{{ url('searchSkills') }}",
                dataType: 'json',
                data: {
                    skills: skills,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    // Assuming response is a string containing the description
                    var skillsDetail = document.getElementById('skills_detail');
                    var cleanedResponse = removeHtmlTags(response.detail);
                    skillsDetail.innerText = cleanedResponse;
                    $('#skillsSub_one').html(response.html);
                }
            });
        }
    }
</script>

<script>
    function removeHtmlTags(input) {
        var div = document.createElement('div');
        div.innerHTML = input;
        return div.textContent || div.innerText || '';
}

    function selectSkillsSub() {
        var skillsSub = $('#skillsSub_one').val();
        // alert(skillsSub);
        if (skillsSub == '') {
            // Do something if skillsSub is empty
        } else {
            $.ajax({
                type: 'post',
                url: "{{ url('searchskillsSub') }}",
                dataType: 'json',
                data: {
                    skillsSub: skillsSub,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    // Assuming response is a string containing the description
                    var skillsSubDetail = document.getElementById('skillsSub_detail');
                    var cleanedResponse = removeHtmlTags(response);
                    skillsSubDetail.innerText = cleanedResponse;
                }
            });
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
            <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย ${formCount} </lable></b> 
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <select name="job_type" id="job_type" class="form-control" required">
                <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
            </select>
        </div>
        <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
    </div>
    <div id="form-container-skills(${formCount})"></div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะย่อย ${formCount} </lable></b>
        </div>
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
            <textarea cols="55" id="" name="" rows="10" class="form-control" disabled></textarea>
        </div>
    </div>
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
@endsection





</body>
</html>
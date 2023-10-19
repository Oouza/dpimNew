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
                <form action="{{url('company/plan/skills/add')}}" method="post" enctype="multipart/form-data" onSubmit="return checkForm(this)">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>
                    <input type="hidden" name="company" id="company" value="{{$com_id}}">
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> พนักงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="people" id="people" class="form-control select2" onchange="selectPeople()" >
                                        <option value="" hidden>- กรุณาเลือกพนักงาน -</option>
                                        @foreach($employee as $rs)
                                        <option value="{{$rs->FKe_userid}}">{{$rs->e_title}} {{$rs->e_fname}} {{$rs->e_lname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="department" id="department" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="departmentSub" id="departmentSub" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="position" id="position" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="groupJob" id="groupJob" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity" id="capacity" class="form-control select2" onchange="selectSkills()">
                                        <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                                        @foreach($capacity as $rs)
                                        <option value="{{$rs->cc_id}}">{{$rs->cc_no}} {{$rs->cc_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="upSkills" id="upSkills" class="form-control select2"  onchange="selectSkillsSub()">
                                        <option value="" hidden>- กรุณาเลือกทักษะ -</option>
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
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">หลักสูตรการอบรม</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="select_id" type="radio" id="select_id" value="1" onclick="sSelect2()"  checked> หลักสูตรการอบรมเก่า
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="select_id" type="radio" id="select_id" value="0" onclick="sSelect()" > หลักสูตรการอบรมใหม่
                                </div>
                            </div>

                            <!-- course old -->
                            <div style="display:block" id="input_studyOld">                            
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label ">ชื่อหลักสูตรการอบรม</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="course_name" id="course_name" class="form-control select2" onchange="selectCourse()" >
                                            <option value="" hidden>- กรุณาเลือกหลักสูตร -</option>
                                            @foreach($course as $rs)
                                            <option value="{{$rs->cou_id}}">{{$rs->cou_no}} {{$rs->cou_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" naem="Organizer" id="Organizer" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" name="time" id="time" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" name="type" id="type" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย</lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="skillsSubCouse" id="skillsSubCouse" cols="55" rows="10" class="form-control" disabled></textarea>    
                                    </div>
                                </div>
                            </div>

                            <!-- course new -->
                            <div style="display:none" id="input_study">                            
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label ">ชื่อหลักสูตรการอบรม</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" name="nameCouserNew" id="nameCouserNew" class="form-control" placeholder="กรอกชื่อหลักสูตร">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" name="organizerNew" id="organizerNew" class="form-control" placeholder="ผู้จัดการอบรม">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" name="timeNew" id="timeNew" class="form-control" placeholder="ระยะเวลาการอบรม (ชั่วโมง)">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="type_course_now" id="type_course_now" class="form-control select2" style="width:100%;">
                                            <option value="" hidden>- กรุณาเลือกประเภทหลักสูตร -</option>
                                            @foreach($typeCourse as $rs)
                                            <option value="{{$rs->tc_id}}">{{$rs->tc_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย 1</lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="skills1" id="skills1" class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6 form-control select2" style="width:100%;">
                                            <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                            @foreach($skills as $rs)
                                            <option value="{{$rs->s_id}}" disabled>{{$rs->s_no}} {{$rs->s_name}}</option>
                                                @foreach($skillsSubs as $row)
                                                @if($rs->s_id == $row->FKss_skills)
                                                <option value="{{$row->ss_id}}">{{$row->ss_no}} {{$row->ss_name}}</option>
                                                @endif
                                                @endforeach
                                            @endforeach
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
                                        <input type="date" name="dateStart" id="dateStart" class="form-control">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> สิ้นสุดการอบรมวันที่ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="date" name="dateEnd" id="dateEnd" class="form-control">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ค่าสมัครอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" name="moneyCouser" id="moneyCouser" min="0" class="form-control">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ค่าใช้จ่ายอื่นๆ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" name="moneyOther" id="moneyOther" min="0" class="form-control">
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
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
	function checkForm(form) { 
		typeRadio = form.select_id.value; 
		people = form.people.value; 
		dateStart = form.dateStart.value; 
		dateEnd = form.dateEnd.value; 
		moneyCouser = form.moneyCouser.value; 
		moneyOther = form.moneyOther.value; 

        if(!people){
            alert('กรุณาเลือกพนักงาน');
            return false;
        }else if(!dateStart){
            alert('กรุณากรอกวันที่เริ่มอบรม');
            return false;
        }else if(!dateEnd){
            alert('กรุณากรอกวันที่สิ้นสุดการอบรม');
            return false;
        }else if(!moneyCouser){
            alert('กรุณากรอกค่าสมัครอบรม');
            return false;
        }else if(!moneyOther){
            alert('กรุณากรอกค่าใช้จ่ายอื่นๆ');
            return false;
        }else{
            if(typeRadio == 1){
                // alert('old');
                courseId = form.course_name.value;
                if (!courseId) {
                    alert('กรุณาเลือกหลักสูตรการอบรม');
                    return false;
                }
            }else{
                // alert('new');
                
                nameCouserNew = form.nameCouserNew.value;
                organizerNew = form.organizerNew.value;
                timeNew = form.timeNew.value;
                type_course_now = form.type_course_now.value;
                skills1 = form.skills1.value;
                if (!nameCouserNew) {
                    alert('กรุณากรอกชื่อหลักสูตรการอบรม');
                    return false;
                }else if(!organizerNew){
                    alert('กรุณากรอกชื่อผู้จัด');
                    return false;
                }else if(!timeNew){
                    alert('กรุณากรอกระยะเวลาการอบรม');
                    return false;
                }else if(!type_course_now){
                    alert('กรุณาเลือกประเภทหลักสูตร');
                    return false;
                }else if(!skills1){
                    alert('กรุณาเลือกทักษะย่อย');
                    return false;
                }
            }
        }
	} 
</script>

</script>
<script>
    function selectCourse(){
        var course = $('#course_name').val();
        if (course !== '') {
            $.ajax({
                type: 'post',
                // url: "{{ url('searchCoursePlan') }}",
                url: "{{ url('searchTrain') }}",
                dataType: 'json',
                data: {
                    course: course,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    $('#Organizer').val(response.Organizer);
                    $('#time').val(response.time);
                    $('#type').val(response.type);
                    $('#skillsSubCouse').val(response.skills);
                }
            });
        }
    }
</script>
<script>
    function selectSkills() {
        var capacity = $('#capacity').val();
        var company = $('#company').val();

        if (capacity !== '') {
            $.ajax({
                type: 'post',
                url: "{{ url('skillsWant') }}",
                dataType: 'json',
                data: {
                    capacity: capacity,
                    company: company,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    $('#upSkills').html(response.html);
                }
            });
        } else {
            $('#upSkills').html('<option value="" hidden>- กรุณาเลือกทักษะ -</option>');
        }

        $('#upSkills').select2({
            placeholder: "- กรุณาเลือกทักษะ -",
            allowClear: true
        });
    }
</script>

<script>
    function selectSkillsSub(){
        var upSkills = $('#upSkills').val();
        var company = $('#company').val();

        if (upSkills !== '') {
            $.ajax({
                type: 'post',
                url: "{{ url('skillsSubWant') }}",
                dataType: 'json',
                data: {
                    upSkills: upSkills,
                    company: company,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    $('#skillsSub').html(response.html);
                }
            });
        } else {
            $('#skillsSub').html('<option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>');
        }

        $('#skillsSub').select2({
            placeholder: "- กรุณาเลือกทักษะ -",
            allowClear: true
        });
    }
</script>

<script>
function selectPeople() {
    var people = $('#people').val();
    // alert(people);
    if (people == '') {
    } else {
        $.ajax({
            type: 'post',
            url: "{{ url('searchEmployee') }}",
            dataType: 'json',
            data: {
                people: people,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response) {
                    $('#groupJob').val(response.gjName);
                } else {
                    $('#groupJob').val(''); // เซ็ตเป็นช่องว่างเมื่อ response ว่าง
                }
                $('#position').val(response.position);
                $('#department').val(response.departments);
                $('#departmentSub').val(response.department_subs);
                
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
                // แสดงข้อผิดพลาดที่เกิดขึ้น หรือทำอะไรตามความเหมาะสม
            }
        });
    }
}
</script>
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
            <select name="course_skills[${formCount}]" id="course_skills[${formCount}]" class="form-control select2" ">
            <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                @foreach($skills as $rs)
                <option value="{{$rs->s_id}}" disabled>{{$rs->s_no}} {{$rs->s_name}}</option>
                    @foreach($skillsSubs as $row)
                    @if($rs->s_id == $row->FKss_skills)
                    <option value="{{$row->ss_id}}">{{$row->ss_no}} {{$row->ss_name}}</option>
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

    $(document).ready(function(){
        $(`#course_skills\\[${formCount}\\]`).select2({
            placeholder: "- กรุณาเลือกทักษะย่อย -",
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

<script>
    $(document).ready(function(){
        $('#people').select2({
            placeholder: "- กรุณาเลือกพนักงาน -",
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
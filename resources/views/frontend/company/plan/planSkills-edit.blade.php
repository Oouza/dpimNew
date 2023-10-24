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
                <form action="{{url('company/plan/skills/update/'.$plan->plans_id)}}" method="post" enctype="multipart/form-data" onSubmit="return checkForm(this)">
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
                                        <option value="{{$rs->FKe_userid}}" @if($plan->FKplans_employee == $rs->FKe_userid) selected @endif>{{$rs->e_title}} {{$rs->e_fname}} {{$rs->e_lname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="department" id="department" class="form-control" value="{{$plan->d_name}}" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="departmentSub" id="departmentSub" class="form-control" value="{{$plan->ds_name}}" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่งปัจจุบัน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="position" id="position" class="form-control" value="{{$plan->p_name}}" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="groupJob" id="groupJob" class="form-control" value="{{$plan->gj_name}}" disabled>
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
                                        <option value="{{$rs->cc_id}}" @if($plan->FKplans_capacity == $rs->cc_id) selected @endif>{{$rs->cc_no}} {{$rs->cc_name}}</option>
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
                                        @foreach($sWant as $rs)
                                        <option value="{{$rs->s_id}}" @if($plan->FKplans_skills == $rs->s_id) selected @endif>{{$rs->s_no}} {{$rs->s_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อยที่ต้องการพัฒนา </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="skillsSub" id="skillsSub" class="form-control select2">
                                        @foreach($ssWant as $rs)
                                        <option value="{{$rs->ss_id}}" @if($plan->FKplans_skillssub == $rs->ss_id) selected @endif>{{$rs->ss_no}} {{$rs->ss_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">หลักสูตรการอบรม</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="select_id" type="radio" id="select_id" value="1" onclick="sSelect2()" @if($plan->FKcou_userCreate != $com_id) checked @endif> หลักสูตรการอบรมเก่า
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="select_id" type="radio" id="select_id" value="0" onclick="sSelect()" @if($plan->FKcou_userCreate == $com_id) checked @endif> หลักสูตรการอบรมใหม่
                                </div>
                            </div>

                            <!-- course old -->
                            @if($plan->FKcou_userCreate != $com_id)
                            <div style="display:block" id="input_studyOld">
                            @else
                            <div style="display:none" id="input_studyOld">
                            @endif
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label ">ชื่อหลักสูตรการอบรม</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="course_name" id="course_name" class="form-control select2" onchange="selectCourse()" style="width:100%;">
                                            <option value="" hidden>- กรุณาเลือกหลักสูตร -</option>
                                            @foreach($course as $rs)
                                            <option value="{{$rs->cou_id}}" @if(($plan->FKplans_course == $rs->cou_id) && ($plan->FKcou_userCreate != $com_id)) selected @endif>{{$rs->cou_no}} {{$rs->cou_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" naem="Organizer" id="Organizer" class="form-control" @if($plan->FKcou_userCreate != $com_id) value="{{$plan->cou_organizer}}" @endif disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" name="time" id="time" class="form-control" @if($plan->FKcou_userCreate != $com_id) value="{{$plan->cou_period}}" @endif disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" name="type" id="type" class="form-control" @if($plan->FKcou_userCreate != $com_id) value="{{$plan->tc_name}}" @endif disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย</lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    @php $i=1; @endphp
                                    <textarea name="skillsSubCouse" id="skillsSubCouse" cols="55" rows="10" class="form-control" disabled>@if($plan->FKcou_userCreate != $com_id) @foreach($courseSkills as $rs) {{$i++}}. {{$rs->ss_name}} @endforeach @endif</textarea>    
                                    </div>
                                </div>
                            </div>

                            <!-- course new -->
                            @if($plan->FKcou_userCreate != $com_id)
                            <div style="display:none" id="input_study">
                            @else
                            <div style="display:block" id="input_study">
                            @endif
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label ">ชื่อหลักสูตรการอบรม</label></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" name="nameCouserNew" id="nameCouserNew" class="form-control" @if($plan->FKcou_userCreate != $com_id) placeholder="กรอกชื่อหลักสูตร" @else value="{{$plan->cou_name}}" @endif>
                                        @if($plan->FKcou_userCreate == $com_id)<input type="hidden" name="couserNewId" id="couserNewId" class="form-control" value="{{$plan->cou_id}}"> @endif
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ผู้จัดการอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="text" name="organizerNew" id="organizerNew" class="form-control" @if($plan->FKcou_userCreate != $com_id) placeholder="ผู้จัดการอบรม" @else value="{{$plan->cou_organizer}}" @endif>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาการอบรม (ชั่วโมง) </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" name="timeNew" id="timeNew" class="form-control" @if($plan->FKcou_userCreate != $com_id) placeholder="ระยะเวลาการอบรม (ชั่วโมง)" @else value="{{$plan->cou_period}}" @endif>
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
                                            <option value="{{$rs->tc_id}}" @if(($plan->FKcou_typeCourse == $rs->tc_id) && ($plan->FKcou_userCreate == $com_id)) selected @endif>{{$rs->tc_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @php $j=1; @endphp
                                @if(($plan->FKcou_userCreate == $com_id))
                                @foreach($courseSkills as $rs1)
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย {{$j}}</lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <select name="skills[{{$j}}]" id="skills[{{$j}}]" class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6 form-control select2" style="width:100%;">
                                            <!-- <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option> -->
                                            @foreach($skills as $rs)
                                            <option value="{{$rs->s_id}}" disabled>{{$rs->s_no}} {{$rs->s_name}}</option>
                                                @foreach($skillsSubs as $row)
                                                @if($rs->s_id == $row->FKss_skills)
                                                <option value="{{$row->ss_id}}" @if($rs1->FKcs_skills == $row->ss_id) selected @endif>{{$row->ss_no}} {{$row->ss_name}}</option>
                                                @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skills({{$rs1->cs_id}})">ลบ</button>
                                </div>
                                <input type="hidden" name="csId[{{$j}}]" id="csId[{{$j++}}]" value="{{$rs1->cs_id }}">
                                @endforeach
                                <input type="hidden" name="num" id="num" value="{{$j-1}}">

                                <div id="form-container"></div>
                                <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
                                @else
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
                                <input type="hidden" name="num" id="num" value="{{$j}}">

                                <div id="form-container"></div>
                                <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button>
                                @endif
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เริ่มการอบรมวันที่ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="date" name="dateStart" id="dateStart" class="form-control" value="{{$plan->plans_datestart}}">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> สิ้นสุดการอบรมวันที่ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="date" name="dateEnd" id="dateEnd" class="form-control" value="{{$plan->plans_dateend}}">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ค่าสมัครอบรม </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" name="moneyCouser" id="moneyCouser" min="0" class="form-control" value="{{$plan->	plans_moneycouser}}">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ค่าใช้จ่ายอื่นๆ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input type="number" name="moneyOther" id="moneyOther" min="0" class="form-control" value="{{$plan->plans_moneyother}}">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  <!-- delete -->
<script>
    $(document).ready(function() {
    $('#example').DataTable({
        responsive: true
    });
} );
function del_skills(id) {
            Swal.fire({
            title: 'ต้องการลบข้อมูลใช่หรือไม่ ?',
            text: "ข้อมูลจะลูกลบอย่างถาวร !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type:"GET",
                        url:"{!! url('course/skills/delete/"+id+"') !!}",
                        success: function(data) {
                            console.log(data);
                        }   
                    });

                    Swal.fire(
                        'สำเร็จ!',
                        'ข้อมูลถูกลบสำเร็จ',
                        'success'
                    ).then(() => {
                        location.reload();
                    })
                   
                }
            })
        }
</script>

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
    var count = parseInt($('#num').val());
    let formCount = 0;

    addFormBtn.addEventListener("click", function() {
    formCount++;
    count++;
    const div = document.createElement("div");
    div.setAttribute("id", `study${count}`);
    div.innerHTML = `
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
            <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย ${count} </lable></b> 
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


    function del_study(formCount){
        const div = document.getElementById(`study${formCount}`);
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
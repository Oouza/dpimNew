<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "people";
$active = "peopleSkills";
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
                    <div class="font-medium text-center text-lg">เพิ่มประวัติการพัฒนาบุคลากร</div>
                   
                </div>
                <form action="{{url('backend/people/manageskills/add')}}" method="post" enctype="multipart/form-data" onSubmit="return checkForm(this)">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> บุคลากร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="people" id="people" class="form-control select2" onchange="selectPeople()" required>
                                        <option value="" hidden>- เลือกบุคลากร -</option>
                                        @foreach($employee as $rs)
                                        <option value="{{$rs->FKe_userid}}">{{$rs->e_title}} {{$rs->e_fname}} {{$rs->e_lname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="gj" id="gj" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="course" id="course" class="form-control select2" onchange="selectCourse()" required>
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
                                    <input type="text" name="Organizer" id="Organizer" class="form-control" disabled>
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
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea name="skillsSub" id="skillsSub" cols="45" rows="10" class="form-control" disabled></textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันที่อบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date" name="dateTrain" id="dateTrain" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> วันสิ้นอายุใบรับรอง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="date" name="dateEnd" id="dateEnd" class="form-control">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หลักฐานอบรม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="file" name="credit" id="credit" class="form-control">
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                
                                <a href="{{url('backend/people/manageskills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
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
	// Function เพื่อตรวจสอบรหัสผ่านว่าตรงกันหรือไม่
	function checkForm(form) { 
        
        var extall = "jpg,jpeg,gif,png";
        var fileInput = document.getElementById("credit");
        var file = fileInput.value;
        var ext = file.split('.').pop().toLowerCase();
        
        if (extall.indexOf(ext) < 0) {
            alert('รองรับไฟล์นามสกุล : ' + extall);
            return false;
        }
    }
</script>

<script>
function selectCourse() {
    var course = $('#course').val();
    // alert(course);
    if (course == '') {
    } else {
        $.ajax({
            type: 'post',
            url: "{{ url('searchTrain') }}",
            dataType: 'json',
            data: {
                course: course,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                $('#Organizer').val(response.Organizer);
                $('#time').val(response.time);
                $('#type').val(response.type);
                $('#skillsSub').val(response.skills);
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
                // แสดงข้อผิดพลาดที่เกิดขึ้น หรือทำอะไรตามความเหมาะสม
            }
        });
    }
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
            url: "{{ url('searchPeople') }}",
            dataType: 'json',
            data: {
                people: people,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response) {
                    $('#gj').val(response);
                } else {
                    $('#gj').val(''); // เซ็ตเป็นช่องว่างเมื่อ response ว่าง
                }
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
                // แสดงข้อผิดพลาดที่เกิดขึ้น หรือทำอะไรตามความเหมาะสม
            }
        });
    }
}
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

<script>
    $(document).ready(function(){
        $('#people').select2({
            placeholder: "- เลือกบุคลากร -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#job').select2({
            placeholder: "- เลือกกลุ่มตำแหน่ง -",
            allowClear: true
        });
    });

    $(document).ready(function(){
        $('#course').select2({
            placeholder: "- กรุณาเลือกหลักสูตร -",
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
        $('#skills').select2({
            placeholder: "- กรุณาเลือกประเภทชุดทักษะ -",
            allowClear: true
        });
    });
</script>
@endsection



</body>
</html>
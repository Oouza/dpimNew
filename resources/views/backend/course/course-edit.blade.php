<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "course";
$active = "totalCourse";
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
                    <div class="font-medium text-center text-lg"> แก้ไขข้อมูลหลักสูตรพัฒนาบุคลากร </div>
                   
                </div>
                <form action="{{ url('backend/course/update/'.$cou->cou_id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="no" value="{{$cou->cou_no}}" type="text" id="formFile" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="nameCourse" value="{{$cou->cou_name}}" type="text" id="formFile" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ผู้จัด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="namePeople" value="{{$cou->cou_organizer}}" type="text" id="formFile" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กำหนดการจัดอบรม </lable></b>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> เริ่ม </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="start" type="date" id="formFile" value="{{$cou->cou_startTime}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-1"></div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สิ้นสุด </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="end" type="date" id="formFile" value="{{$cou->cou_endTime}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระยะเวลาจัดอบรม (ชั่วโมง) </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="period" value="{{$cou->cou_period}}" type="number" min="1" id="formFile" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทหลักสูตร </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="typeCourse" id="typeCourse" class="form-control select2">
                                        @foreach($typeCourse as $rs)
                                        <option value="{{$rs->tc_id}}" @if($cou->FKcou_typeCourse == $rs->tc_id) selected @endif>{{$rs->tc_no}} {{$rs->tc_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @php $i = 1; @endphp
                            @foreach($cs as $rsc)
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย {{$i++}}</lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="skills[{{$i}}]" id="skills[{{$i}}]" class="form-control select2" required onchange="province()">
                                        @foreach($skills as $row)
                                            <option value="{{$row->s_id}}" disabled>{{$row->s_no}} {{$row->s_name}}</option>
                                            @foreach($skillsSubs as $rs)
                                            @if($rs->FKss_skills == $row->s_id)
                                            <option value="{{$rs->ss_id}}" @if($rsc->FKcs_skills == $rs->ss_id) selected @endif>&nbsp;&nbsp;&nbsp;{{$rs->ss_no}} {{$rs->ss_name}}</option>
                                            @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="conId[{{$i}}]" value="{{$rsc->cs_id}}">
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_skills({{$rsc->cs_id}})">ลบ</button>
                            </div>
                            @endforeach
                            <input type="hidden" name="num" id="num" value="{{$i-1}}">

                            <div id="form-container"></div>
                            <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" onclick="add_fields()">เพิ่มทักษะย่อย</button>
                            <!-- <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" >เพิ่มทักษะย่อย</button> -->
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ความถี่ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="frequency" type="text" min="1" id="formFile" value="{{$cou->cou_frequency}}" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="detail" name="detail" rows="10">{{$cou->cou_detail}}</textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="80" id="course_note" name="course_note" rows="10">{{$cou->cou_note}}</textarea>
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                            <a href="{{url('backend/course')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    ClassicEditor
    .create( document.querySelector( '#detail' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#course_note' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script>
    function add_fields(){
        const formContainer = document.getElementById("form-container");
        var formCount = document.getElementById("num").value;
        // var index = document.getElementById('select_id').value;
        // let formCount = formCountElement.value.length - 1;
        // alert(formCount);

        const div = document.createElement("div");
        formCount++;
        div.setAttribute("id", `study${formCount}`);
        div.innerHTML = `
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย ${formCount} </lable></b>
            </div>
            <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                <select name="skills_other[${formCount}]" id="skills_other[${formCount}]" class="form-control select2">
                    <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                    @foreach($skills as $row)
                    <option value="{{$row->s_id}}" disabled>{{$row->s_no}} {{$row->s_name}}</option>
                        @foreach($skillsSubs as $rs)
                        @if($rs->FKss_skills == $row->s_id)
                        <option value="{{$rs->ss_id}}">&nbsp;&nbsp;&nbsp;{{$rs->ss_no}} {{$rs->ss_name}}</option>
                        @endif
                        @endforeach
                    @endforeach
                </select>
            </div>
            <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
        </div>
        `;
        formContainer.appendChild(div);
        document.getElementById("num").value = formCount;


        $(document).ready(function(){
            $(`#skills_other\\[${formCount}\\]`).select2({
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

<script type="text/javascript">
    function sSelect(){
        var index = document.getElementById('select_id').value;
        if(index === '0'){
            document.getElementById('input_study').style.display = 'block';
        } else {
            document.getElementById('input_study').style.display = 'none';
        }
    }
</script>

<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  <!-- delete -->
<script>
    // function del_skills($id){}
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
                    url:"{!! url('backend/courseSkills/delete/"+id+"') !!}",
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
@endsection





</body>
</html>
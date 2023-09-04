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
                    <div class="font-medium text-center text-lg">แก้ไข ทักษะ ใน{{$gjs->gjc_namecapacity}} ของ{{$gjs->gjc_namegroupjob}}</div>
                   
                </div>
                <form action="{{ url('backend/job/skillsSub/update/'.$gjs->gjs_id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <select name="jobC" id="jobC" class="form-control" required onchange="province(1)"> -->
                                    <select name="skills" id="skills" class="form-control" onchange="selectSkills()" disabled>
                                        <option value="" hidden>- กรุณาเลือกทักษะ -</option>
                                        @foreach($skills as $rs)
                                        <option value="{{$rs->s_id}}" @if($gjs->FKgjs_skills == $rs->s_id) selected @endif>{{$rs->s_no}} {{$rs->s_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                <textarea cols="45" id="skills_detail" name="skills_detail" rows="10" class="form-control" disabled>{{ isset($gjs->s_detail) ? strip_tags($gjs->s_detail) : '' }}</textarea>
                                    <!-- <textarea cols="45" id="skills_detail" name="skills_detail" rows="10" class="form-control" disabled>{!! isset($gjs->s_detail) ? $gjs->s_detail : '' !!}</textarea> -->
                                </div>
                            </div>

                            @php $i=1; @endphp
                            @foreach($gjSub as $rs)
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย {{$i}}</lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <select name="jobC" id="jobC" class="form-control" required onchange="province(1)"> -->
                                    <select name="ssdtb[{{$i}}]" id="ssdtb[{{$i}}]" class="form-control select2" onchange="selectSkillsSub({{$i}})" required >
                                        @foreach($skillsSubs as $row)
                                        <option value="{{$row->ss_id}}" @if($rs->FKgjss_skillsSub == $row->ss_id) selected @endif>{{$row->ss_no}} {{$row->ss_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_sub({{$rs->gjss_id}})">ลบ</button>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะย่อย {{$i}} </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="55" id="ssd[{{$i}}]" name="ssd[{{$i}}]" rows="10" class="form-control" disabled>{{ isset($rs->ss_detail) ? strip_tags($rs->ss_detail) : '' }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id_glss[{{$i}}]" value="{{$rs->gjss_id}}">
                            <input type="hidden" value="{{$i++}}">
                            @endforeach
                            <input type="hidden" id="num" value="{{$i-1}}">

                            <div id="form-container-skills(1)"></div>

                            <div id="form-container"></div>
                            <br><button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10" onclick="add_fields()">เพิ่มทักษะย่อย</button>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                            <a href="{{url('backend/job/skills/'.$gjs->gjc_id)}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
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
        // var formCount = $('#num').val();
        var skills = $('#skills').val();
        // alert(formCount);
        if(skills == ''){
            alert('กรุณาเลือกทักษะ');
        }else{
            const formContainer = document.getElementById("form-container");
            let formCount = document.getElementById("num").value;
            // alert(formCount);

            const div = document.createElement("div");
            formCount++;
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
            document.getElementById("num").value = formCount;


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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>

<!-- <script>
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
</script> -->

<script>
    function removeHtmlTagsSSDTB(input) {
        var div = document.createElement('div');
        div.innerHTML = input;
        return div.textContent || div.innerText || '';
    }

    function selectSkillsSub(id) {
        // alert(id);
        let skillsSub = $(`#ssdtb\\[${id}\\]`).val();
        console.log(skillsSub);
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
                    var skillsDetail = $(`#ssd\\[${id}\\]`);
                    var cleanedResponse = removeHtmlTagsSSDTB(response);
                    skillsDetail.text(cleanedResponse); // Use .text() instead of innerText
                }
            });
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  <!-- delete -->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    } );
    function del_sub(id) {
        Swal.fire({
            title: 'ต้องการลบข้อมูลใช่หรือไม่ ?',
            text: "ข้อมูลจะถูกลบอย่างถาวร !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "GET",
                    url: "{!! url('backend/job/skillsSub/delete/') !!}/" + id,
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
                });
               
            }
        });
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
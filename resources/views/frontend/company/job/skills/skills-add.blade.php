<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterCompany')
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
                    <div class="font-medium text-center text-lg">เพิ่ม ทักษะ ในสมรรถนะ{{$gjc->cc_name}} ของตำแหน่งงาน {{$sp->p_name}}</div>
                   
                </div>
                <form action="{{ url('/company/job/skills/add/'.$gjc->gjc_id.'/'.$sp->sp_id) }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="skills" id="skills" class="form-control select2" onchange="sselect()" required>
                                        <option value="" hidden>- กรุณาเลือกทักษะ -</option>
                                        <option value="0">อื่นๆ</option>
                                        @foreach($skills as $rs)
                                        <option value="{{$rs->s_id}}">{{$rs->s_no}} {{$rs->s_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="detailSkills" style="display:block;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="skills_detail" name="skills_detail" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="skillsAdd" style="display:none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        @php
                                            $number = count($skillsTotal)+1;
                                            $num = str_pad($number, 3, "0", STR_PAD_LEFT);
                                        @endphp
                                        <input class="form-control box-form-ct" name="skills_id" type="text" id="skills_id" value="{{$num}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skills_name" type="text" id="skills_name" placeholder="ชื่อทักษะ">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="80" id="ss_detail" name="ss_detail" rows="10" placeholder="คำอธิบาย"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                <a href="{{url('company/job/skills/'.$gjc->gjc_id.'/'.$sp->sp_id)}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    function sselect(){
        var skills = $('#skills').val();
        if (skills == 0) {
			document.getElementById('detailSkills').style.display='none';
			document.getElementById('skillsAdd').style.display='';
        } else {
			document.getElementById('detailSkills').style.display='';
			document.getElementById('skillsAdd').style.display='none';
            $.ajax({
                type: 'post',
                url: "{{ url('searchHrSkills') }}",
                dataType: 'json',
                data: {
                    skills: skills,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    // Assuming response is a string containing the description
                    var skillsDetail = document.getElementById('skills_detail');
                    var cleanedResponse = removeHtmlTags(response);
                    skillsDetail.innerText = cleanedResponse;
                    // $('#skillsSub_one').html(response.html);
                }
            });
        }
    }

    function removeHtmlTags(input) {
        var div = document.createElement('div');
        div.innerHTML = input;
        return div.textContent || div.innerText || '';
    }
</script>

<script>
    function checkPassword(form) { 
    var capacity = document.getElementById('skills').value;
    var name = document.getElementById('skills_name').value;
    
    if (capacity == 0) { // ใช้เครื่องหมาย == ในการเปรียบเทียบค่า
        if (name == '') { 
            alert('กรุณากรอกชื่อทักษะ');
            return false;
        }
    }
}
</script>

<script>
    $(document).ready(function(){
        $('#skills').select2({
            placeholder: "- กรุณาเลือกทักษะ -",
            allowClear: true
        });
    });

    ClassicEditor
    .create( document.querySelector( '#ss_detail' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection





</body>
</html>
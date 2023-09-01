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
                    <div class="font-medium text-center text-lg">เพิ่ม ทักษะย่อย ในทักษะ{{$gjs->s_name}} ของตำแหน่งงาน {{$sp->p_name}}</div>
                   
                </div>
                <form action="{{ url('/company/job/skillsSub/add/'.$gjs->gjs_id.'/'.$sp->sp_id) }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ทักษะย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="skills" id="skills" class="form-control select2" onchange="sselect()" required>
                                        <option value="" hidden>- กรุณาเลือกทักษะย่อย -</option>
                                        <option value="0">อื่นๆ</option>
                                        @foreach($skillsSub as $rs)
                                        <option value="{{$rs->ss_id}}">{{$rs->ss_no}} {{$rs->ss_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="detailSkills" style="display:block;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="skills_detail" name="skills_detail" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 1 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld1" name="lavelOld1" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 2 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld2" name="lavelOld2" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 3 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld3" name="lavelOld3" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>
                                
                            </div>

                            <div id="skillsAdd" style="display:none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        @php
                                            $number = count($skillsSubstotal)+1;
                                            $num = str_pad($number, 3, "0", STR_PAD_LEFT);
                                        @endphp
                                        <input class="form-control box-form-ct" name="skills_id" type="text" id="skills_id" value="{{$num}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skills_name" type="text" id="skills_name" placeholder="ชื่อทักษะย่อย">
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

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 1 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="80" id="lavel1" name="lavel1" rows="10" placeholder="เกณฑ์ระดับที่ 1"></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 2 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="80" id="lavel2" name="lavel2" rows="10" placeholder="เกณฑ์ระดับที่ 2"></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 3 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="80" id="lavel3" name="lavel3" rows="10" placeholder="เกณฑ์ระดับที่ 3"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                <a href="{{url('company/job/skillsSub/'.$gjs->gjs_id.'/'.$sp->sp_id)}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
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
                url: "{{ url('searchHrSkillsSub') }}",
                dataType: 'json',
                data: {
                    skills: skills,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    var skillsDetail = document.getElementById('skills_detail');
                    var cleanedResponse = removeHtmlTags(response.detail);
                    skillsDetail.innerText = cleanedResponse;

                    var Lavel1Detail = document.getElementById('lavelOld1');
                    var cleanedLavel1 = removeHtmlTags(response.standardOne);
                    Lavel1Detail.innerText = cleanedLavel1;

                    var Lavel2Detail = document.getElementById('lavelOld2');
                    var cleanedLavel2 = removeHtmlTags(response.standardTwo);
                    Lavel2Detail.innerText = cleanedLavel2;

                    var Lavel3Detail = document.getElementById('lavelOld3');
                    var cleanedLavel3 = removeHtmlTags(response.standardThree);
                    Lavel3Detail.innerText = cleanedLavel3;
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
    var lavel1 = document.getElementById('lavel1').value;
    
    if (capacity == 0) { // ใช้เครื่องหมาย == ในการเปรียบเทียบค่า
        if (name == '') { 
            alert('กรุณากรอกชื่อทักษะย่อย');
            return false;
        }else if(lavel1 == ''){
            alert('กรุณากรอกเกณฑ์ระดับที่ 1');
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

    ClassicEditor
    .create( document.querySelector( '#lavel1' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#lavel2' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
    ClassicEditor
    .create( document.querySelector( '#lavel3' ) )
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
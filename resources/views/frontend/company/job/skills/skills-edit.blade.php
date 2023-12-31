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
                    <div class="font-medium text-center text-lg">แก้ไข ทักษะ ในสมรรถนะ{{$gjs->cc_name}} ของตำแหน่งงาน {{$sp->p_name}}</div>
                   
                </div>
                <form action="{{ url('company/job/skills/update/'.$gjs->gjs_id.'/'.$sp->sp_id) }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
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
                                        <option @if($gjs->FKgjs_skills == $rs->s_id) selected @endif value="{{$rs->s_id}}">{{$rs->s_no}} {{$rs->s_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if($gjs->FKs_Create == 0)
                            <div id="detailAdmin" style="display:block;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="skills_detail" name="skills_detail" rows="10" class="form-control" disabled>{{ strip_tags(str_replace('&nbsp;', ' ', $gjs->s_detail ?: '')) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="detailHr" style="display:none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skills_id" type="text" id="skills_id" value="" disabled>
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
                            @else
                            <div id="detailAdmin" style="display:none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="skills_detail" name="skills_detail" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="detailHr" style="display:block;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skills_id" type="text" id="skills_id" value="{{$gjs->s_no}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skills_name" type="text" id="skills_name" value="{{$gjs->s_name}}">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="80" id="ss_detail" name="ss_detail" rows="10" placeholder="คำอธิบาย">{{ isset($gjs->s_detail) ? strip_tags($gjs->s_detail) : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @endif

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
                                        <input class="form-control box-form-ct" name="no" type="text" id="no" value="{{$num}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อทักษะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="sName" type="text" id="sName" placeholder="ชื่อทักษะ">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="80" id="ssNew_detail" name="ssNew_detail" rows="10" placeholder="คำอธิบาย"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                <a href="{{url('company/job/skills/'.$gjs->gjc_id.'/'.$sp->sp_id)}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
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
			document.getElementById('detailAdmin').style.display='none';
			document.getElementById('detailHr').style.display='none';
			document.getElementById('skillsAdd').style.display='';
        } else {
			document.getElementById('skillsAdd').style.display='none';
            $.ajax({
                type: 'post',
                url: "{{ url('searchHrSkillsDetail') }}",
                dataType: 'json',
                data: {
                    skills: skills,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    if (response && response.user == 0) {
                        $('#detailAdmin').show();
                        $('#detailHr').hide();

                        var skillsDetail = $('#skills_detail');
                        var cleanedResponse = removeHtmlTags(response.detail);
                        skillsDetail.val(cleanedResponse);
                    } else {
                        $('#detailAdmin').hide();
                        $('#detailHr').show();

                        // Update CKEditor content
                        if (editor) {
                            var cleanedResponse = removeHtmlTags(response.detail);
                            editor.setData(cleanedResponse);
                        }

                        $('#skills_id').val(response.no);
                        $('#skills_name').val(response.name);
                    }
                }
            });
        }
    }

    function removeHtmlTags(input) {
        var div = document.createElement('div');
        div.innerHTML = input;
        return div.textContent || div.innerText || '';
    }

    var editor = null;
    ClassicEditor
        .create(document.querySelector('#ss_detail'))
        .then(ckEditorInstance => {
            editor = ckEditorInstance;
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    function checkPassword(form) { 
    var skills = document.getElementById('skills').value;
    var name = document.getElementById('skills_name').value;
    
    if (skills == 0) { // ใช้เครื่องหมาย == ในการเปรียบเทียบค่า
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

    // ClassicEditor
    // .create( document.querySelector( '#ss_detail' ) )
    // .then( editor => {
    //     console.log( editor );
    // } )
    // .catch( error => {
    //     console.error( error );
    // } );

    ClassicEditor
    .create( document.querySelector( '#ssNew_detail' ) )
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
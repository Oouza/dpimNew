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
                    <div class="font-medium text-center text-lg">แก้ไข ทักษะย่อย ในทักษะ{{$gjss->s_name}} ของตำแหน่งงาน {{$sp->p_name}}</div>
                   
                </div>
                <form action="{{ url('company/job/skillsSub/update/'.$gjss->gjss_id.'/'.$sp->sp_id) }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
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
                                        <option @if($gjss->FKgjss_skillsSub == $rs->ss_id) selected @endif value="{{$rs->ss_id}}">{{$rs->ss_no}} {{$rs->ss_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if($gjss->FKss_Create == 0)
                            <div id="detailAdmin" style="display:block;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบายทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="skills_detail" name="skills_detail" rows="10" class="form-control" disabled>{{ strip_tags(str_replace('&nbsp;', ' ', $gjss->ss_detail ?: '')) }}</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 1 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelAdmin1" name="lavelAdmin1" rows="10" class="form-control" disabled>@if(!empty($gjss->ss_standardOne)) {{ strip_tags(str_replace('&nbsp;', ' ', $gjss->ss_standardOne ?: '')) }} @endif</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 2 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelAdmin2" name="lavelAdmin2" rows="10" class="form-control" disabled>@if(!empty($gjss->ss_standardTwo)) {{ strip_tags(str_replace('&nbsp;', ' ', $gjss->ss_standardTwo ?: '')) }} @endif</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 3 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelAdmin3" name="lavelAdmin3" rows="10" class="form-control" disabled>@if(!empty($gjss->ss_standardThree)) {{ strip_tags(str_replace('&nbsp;', ' ', $gjss->ss_standardThree ?: '')) }} @endif</textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="detailHr" style="display:none;">
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skillsOld_id" type="text" id="skillsOld_id" value="{{$gjss->ss_no}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skillsOld_name" type="text" id="skillsOld_name" value="{{$gjss->ss_name}}">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="editor" name="editor" rows="10" placeholder="คำอธิบาย">{{ isset($gjss->ss_detail) ? strip_tags($gjss->ss_detail) : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 1 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld1" name="lavelOld1" rows="10" placeholder="เกณฑ์ระดับที่ 1">{{ isset($gjss->ss_standardOne) ? strip_tags($gjss->ss_standardOne) : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 2 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld2" name="lavelOld2" rows="10" placeholder="เกณฑ์ระดับที่ 2">{{ isset($gjss->ss_standardTwo) ? strip_tags($gjss->ss_standardTwo) : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 3 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld3" name="lavelOld3" rows="10" placeholder="เกณฑ์ระดับที่ 3">{{ isset($gjss->ss_standardThree) ? strip_tags($gjss->ss_standardThree) : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div id="detailAdmin" style="display:none;">
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
                                        <textarea cols="45" id="lavelAdmin1" name="lavelAdmin1" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 2 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelAdmin2" name="lavelAdmin2" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 3 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelAdmin3" name="lavelAdmin3" rows="10" class="form-control" disabled></textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="detailHr" style="display:block;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skillsOld_id" type="text" id="skillsOld_id" value="{{$gjss->ss_no}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="skillsOld_name" type="text" id="skillsOld_name" value="{{$gjss->ss_name}}">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="editor" name="editor" rows="10" placeholder="คำอธิบาย">{{ isset($gjss->ss_detail) ? strip_tags($gjss->ss_detail) : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 1 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld1" name="lavelOld1" rows="10" placeholder="เกณฑ์ระดับที่ 1">{{ isset($gjss->ss_standardOne) ? strip_tags($gjss->ss_standardOne) : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 2 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld2" name="lavelOld2" rows="10" placeholder="เกณฑ์ระดับที่ 2">{{ isset($gjss->ss_standardTwo) ? strip_tags($gjss->ss_standardTwo) : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 3 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavelOld3" name="lavelOld3" rows="10" placeholder="เกณฑ์ระดับที่ 3">{{ isset($gjss->ss_standardThree) ? strip_tags($gjss->ss_standardThree) : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @endif

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
                                        <input class="form-control box-form-ct" name="no" type="text" id="no" value="{{$num}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อทักษะย่อย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control box-form-ct" name="sName" type="text" id="sName" placeholder="ชื่อทักษะย่อย">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="ssNew_detail" name="ssNew_detail" rows="10" placeholder="คำอธิบาย"></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 1 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavel1" name="lavel1" rows="10" placeholder="เกณฑ์ระดับที่ 1"></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 2 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavel2" name="lavel2" rows="10" placeholder="เกณฑ์ระดับที่ 2"></textarea>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> เกณฑ์ระดับที่ 3 </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="lavel3" name="lavel3" rows="10" placeholder="เกณฑ์ระดับที่ 3"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                <a href="{{url('company/job/skillsSub/'.$gjss->gjs_id.'/'.$sp->sp_id)}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    function sselect() {
        var skills = $('#skills').val();
        if (skills == 0) {
            document.getElementById('detailAdmin').style.display = 'none';
            document.getElementById('detailHr').style.display = 'none';
            document.getElementById('skillsAdd').style.display = '';
        } else {
            document.getElementById('skillsAdd').style.display = 'none';
            $.ajax({
                type: 'post',
                url: "{{ url('searchHrSkillsSubDetail') }}",
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

                        var lavelAdmin1 = $('#lavelAdmin1');
                        var cleanedResponse = removeHtmlTags(response.lavel1);
                        lavelAdmin1.val(cleanedResponse);

                        var lavelAdmin2 = $('#lavelAdmin2');
                        var cleanedResponse = removeHtmlTags(response.lavel2);
                        lavelAdmin2.val(cleanedResponse);

                        var lavelAdmin3 = $('#lavelAdmin3');
                        var cleanedResponse = removeHtmlTags(response.lavel3);
                        lavelAdmin3.val(cleanedResponse);
                    } else {
                        $('#detailAdmin').hide();
                        $('#detailHr').show();

                        // Update CKEditor content
                        if (editor) {
                            var cleanedResponse = removeHtmlTags(response.detail);
                            editor.setData(cleanedResponse);
                        }

                        if (lavel1) {
                            var cleanedResponse = removeHtmlTags(response.lavel1);
                            lavel1.setData(cleanedResponse);
                        }

                        if (lavel2) {
                            var cleanedResponse = removeHtmlTags(response.lavel2);
                            lavel2.setData(cleanedResponse);
                        }

                        if (lavel3) {
                            var cleanedResponse = removeHtmlTags(response.lavel3);
                            lavel3.setData(cleanedResponse);
                        }

                        $('#skillsOld_id').val(response.no);
                        $('#skillsOld_name').val(response.name);
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
    var lavel1 = null;
    var lavel2 = null;
    var lavel3 = null;

    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(ckEditorInstance => {
            editor = ckEditorInstance;
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#lavelOld3'))
        .then(ckEditorInstance => {
            lavel3 = ckEditorInstance; // Assign to lavel3, not editor
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#lavelOld2'))
        .then(ckEditorInstance => {
            lavel2 = ckEditorInstance; // Assign to lavel2, not editor
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#lavelOld1'))
        .then(ckEditorInstance => {
            lavel1 = ckEditorInstance; // Assign to lavel1, not editor
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
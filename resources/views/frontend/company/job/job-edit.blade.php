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
                    <div class="font-medium text-center text-lg">แก้ไขตำแหน่งงาน</div>
                   
                </div>
                <form action="{{ url('company/job/update/'.$sp->sp_id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="department" id="department" class="form-control select2" onchange="selectDepartment()" required>
                                        @foreach($dp as $rs)
                                        <option value="{{$rs->d_id}}" @if($sp->FKgsp_department == $rs->d_id) selected @endif>{{$rs->d_name}}</option>
                                        @endforeach
                                        <!-- <option value="1" selected>แผนก 1</option>
                                        <option value="2">แผนก 2</option>
                                        <option value="3">แผนก 3</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="departmentSub" id="departmentSub" class="form-control select2">
                                        @foreach($dpSub as $rs)
                                        <option value="{{$rs->ds_id}}" @if($sp->FKgsp_departmentSub == $rs->ds_id) selected @endif>{{$rs->ds_name}}</option>
                                        @endforeach
                                        <!-- <option value="1" selected>แผนกย่อย 1</option>
                                        <option value="2">แผนกย่อย 2</option>
                                        <option value="3">แผนกย่อย 3</option> -->
                                    </select>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="position" id="position" class="form-control select2" required>
                                        @foreach($position as $rs)
                                        <option value="{{$rs->p_id}}" @if($sp->FKgsp_position == $rs->p_id) selected @endif>{{$rs->p_name}}</option>
                                        @endforeach
                                        <!-- <option value="1" selected>ตำแหน่ง 1</option>
                                        <option value="2">ตำแหน่ง 2</option>
                                        <option value="3">ตำแหน่ง 3</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" class="form-control" value="{{$sp->gj_name}}" disabled>
                                    <!-- <select name="job" id="job" class="form-control select2" onchange="selectGJ()" disabled>
                                        @foreach($gj as $rs)
                                        <option value="{{$rs->gj_id}}" @if($sp->FKgsp_groupJob == $rs->gj_id) selected @endif>{{$rs->gj_name}}</option>
                                        @endforeach
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="45" id="gj_detail" name="gj_detail" rows="10" class="form-control" disabled>{{ isset($sp->gj_detail) ? strip_tags($sp->gj_detail) : '' }}</textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="type" id="type" class="form-control" value="{{$sp->tj_name}}" disabled>
                                    <!-- <select name="่job_type" id="่job_type" class="form-control select2" required>
                                        <option value="1" selected>บริหาร</option>
                                        <option value="2">เทคนิค</option>
                                        <option value="3">สนับสนุน</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input type="text" name="lavel" id="lavel" class="form-control" value="{{$sp->lj_name}}" disabled>
                                    <!-- <select name="news_type" id="news_type" class="form-control select2" required>
                                        <option value="" hidden>-กรุณาเลือก-</option>
                                        <option value="1" selected>ผู้จัดการ</option>
                                        <option value="2">หัวหน้างาน</option>
                                        <option value="3">ผู้ปฏิบัติ</option>
                                    </select> -->
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>

                                <a href="{{url('/home')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                                <!-- <a href="#" class="btn btn-success w-24 ml-2">บันทึก</a> -->

                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    function removeHtmlTags(input) {
        var div = document.createElement('div');
        div.innerHTML = input;
        return div.textContent || div.innerText || '';
    }

    function selectGJ(){
        var job = $('#job').val();
        if (job == '') {
            // Do something if job is empty
        } else {
            $.ajax({
                type: 'post',
                url: "{{ url('searchGroupJob') }}",
                dataType: 'json',
                data: {
                    job: job,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    // Assuming response is a string containing the description
                    var jobDetail = document.getElementById('gj_detail');
                    var cleanedResponse = removeHtmlTags(response.detail);
                    jobDetail.innerText = cleanedResponse;
                    $('#type').val(response.type);   
                    $('#lavel').val(response.lavel);   
                }
            });
        }
    }
</script>
<script>
    function selectDepartment(){
        var department = $('#department').val();
        // alert(department);
        if (department == '') {
        } else {
            $.ajax({
                type: 'post',
                url: "{{ url('searchDepartment') }}",
                dataType: 'json',
                data: {
                    department: department,
                    _token: "{{csrf_token()}}"
                },
                'success': function (data){
                    $('#departmentSub').html(data.html);
                }
            });
        }

        var department = $('#department').val();
        if(department == ''){
        }else{
            $.ajax({
                'type': 'post',
                'url': "{{ url('searchDepartment') }}",
                'dataType': 'json',
                'data': { 
                    'department'            : department,
                    '_token'        : "{{csrf_token()}}"  
                },
            'success': function (data){
                $('#departmentSub').html(data.html);
                    
                } 
            });  
        }

        $(document).ready(function(){
            $('#departmentSub').select2({
                placeholder: "- กรุณาเลือกแผนกย่อย -",
                allowClear: true
            });
        });
    }
</script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection





</body>
</html>
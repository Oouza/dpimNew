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
                    <div class="font-medium text-center text-lg">สรุปข้อมูลสมรรถนะและทักษะของตำแหน่งงาน</div>
                   
                </div>
                <!-- <form action="{{ url('backend/news/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} -->
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนก </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$sp->d_name}}" disabled>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> แผนกย่อย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$sp->ds_name}}" disabled>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$sp->p_name}}" disabled>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> กลุ่มตำแหน่ง </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$sp->gj_name}}" disabled>
                                    <!-- <select name="" id="" class="form-control" disabled>
                                        <option value="" hidden>- กรุณาเลือกกลุ่มตำแหน่ง -</option>
                                        <option value=""> เลือกกลุ่มตำแหน่ง 1 </option>
                                        <option value="" selected> เลือกกลุ่มตำแหน่ง 2 </option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="45" id="news_detail" name="news_detail" rows="10" class="form-control" disabled>{{ isset($sp->gj_detail) ? strip_tags($sp->gj_detail) : '' }}</textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$sp->tj_name}}" disabled>
                                    <!-- <select name="" id="" class="form-control" disabled>
                                        <option value="" hidden>- กรุณาเลือกประเภทงาน -</option>
                                        <option value="" selected>ประเภทงาน 1</option>
                                        <option value="">ประเภทงาน 2</option>
                                        <option value="">ประเภทงาน 3</option>
                                    </select> -->
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$sp->lj_name}}" disabled>
                                    <!-- <select name="" id="" class="form-control" disabled>
                                        <option value="" hidden>- กรุณาเลือกระดับงาน -</option>
                                        <option value="" selected>ระดับงาน 1</option>
                                        <option value="">ระดับงาน 2</option>
                                        <option value="">ระดับงาน 3</option>
                                    </select> -->
                                </div>
                            </div>

                            <br>
                            {{count($gjCapa)}}
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <tr>
                                    <th><center>สมรรถนะ</center></th>
                                    <th><center>ทักษะ</center></th>
                                    <th><center>ทักษะย่อย</center></th>
                                </tr>
                                @php 
                                    $capacity = null;
                                    $skills = "";
                                @endphp
                                @foreach($gjCapa as $rs)
                                    @if($capacity != $rs->gjc_id) 
                                        <tr>
                                            <td><center>
                                                {{$rs->gjc_id}} {{$rs->cc_name}}
                                                @if($rs->FKgjc_userCreate == 0)
                                                    <br> (พื้นฐาน)
                                                @endif
                                            </td></center>
                                            @if($skills != $rs->gjs_id)
                                            <td><center>
                                                {{$rs->s_name}}
                                                @php 
                                                    $skills = $rs->s_name;
                                                @endphp
                                                @if($rs->FKgjs_userCreate == 0)
                                                    <br> (พื้นฐาน)
                                                @endif
                                            </center></td>
                                            @endif
                                            <td><center>{{$rs->ss_name}}</center></td>
                                        </tr>
                                        @php  
                                            $capacity = $rs->gjc_id; // อัพเดตค่า capacity เมื่อมีการเปลี่ยนค่า
                                        @endphp
                                    @endif
                                    
                                    
                                @endforeach


                                <!-- อันเก่า -->
                                <!-- @foreach($gjCapa as $rs)
                                <tr>
                                    <td><center>
                                        @if($capacity != $rs->gjc_id) 
                                            {{$rs->gjc_id}} {{$rs->cc_name}}
                                            @php  $capacity = $rs->gjc_id; @endphp
                                            @if($rs->FKgjc_userCreate == 0)
                                                <br> (พื้นฐาน)
                                            @endif
                                        @endif
                                    </center></td>
                                    <td><center>
                                        @if($skills != $rs->s_name) 
                                            {{$rs->s_name}}
                                            @php 
                                                $skills = $rs->s_name;
                                            @endphp
                                            @if($rs->FKgjs_userCreate == 0)
                                                <br> (พื้นฐาน)
                                            @endif
                                        @endif
                                    </center></td>
                                    <td><center>
                                        {{$rs->ss_name}}
                                        @if($rs->FKgjss_userCreate == 0)
                                            <br> (พื้นฐาน)
                                        @endif
                                    </center></td>
                                </tr>
                                @endforeach -->

                                <!-- อันเก่า -->
                                <!-- @foreach($gjCapa as $rs)
                                <tr>
                                    <td>{{$rs->gjc_id}} {{$rs->cc_name}} @if($rs->FKgjc_userCreate == 0) (พื้นฐาน) @endif</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforeach -->
                                <!-- @php 
                                    $capacity = "";
                                    $skills = "";
                                @endphp
                                @foreach($gjSub as $rs)
                                <tr>
                                    <td><center>
                                        @if($capacity != $rs->cc_name) 
                                            {{$rs->cc_name}}
                                            @php 
                                                $capacity = $rs->cc_name;
                                            @endphp
                                            @if($rs->FKgjc_userCreate == 0)
                                                <br> (พื้นฐาน)
                                            @endif
                                        @endif
                                    </center></td>
                                    <td><center>
                                        @if($skills != $rs->s_name) 
                                            {{$rs->s_name}}
                                            @php 
                                                $skills = $rs->s_name;
                                            @endphp
                                            @if($rs->FKgjs_userCreate == 0)
                                                <br> (พื้นฐาน)
                                            @endif
                                        @endif
                                    </center></td>
                                    <td><center>
                                        {{$rs->ss_name}}
                                        @if($rs->FKgjss_userCreate == 0)
                                            <br> (พื้นฐาน)
                                        @endif
                                    </center></td>
                                </tr>
                                @endforeach -->
                            </table>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                                <a href="{{url('indexCompany')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <button type="button" class="btn btn-success w-24 ml-2">ส่งออกเป็น xls</button>         -->
                                <a href="#" class="btn btn-success">ส่งออกเป็น xls</a>
                            </center>
                      
                <!-- </form> -->
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
function showdetail(id) {
    var skillsDiv = document.getElementById('skills(' + id + ')');
    var button = document.getElementById('button' + id);

    if (skillsDiv.style.display === 'none') {
        skillsDiv.style.display = 'block';
        button.textContent = 'ซ่อนข้อมูล';
    } else {
        skillsDiv.style.display = 'none';
        button.textContent = 'แสดงข้อมูล';
    }
}
</script>
@endsection





</body>
</html>
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
                    <div class="font-medium text-center text-lg">รายละเอียดกลุ่มตำแหน่งงาน {{$gj->gj_name}}</div>
                   
                </div>
                <form action="{{ url('backend/news/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> รหัสกลุ่มตำแหน่งงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="job_name" type="text" id="formFile" value="{{$gj->gj_no}}" disabled="disabled">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ชื่อกลุ่มตำแหน่งงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_name" type="text" id="formFile" value="{{$gj->gj_name}}" disabled="disabled">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label">คำอธิบาย</label></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <textarea cols="55" id="" name="" rows="10" class="form-control" disabled>{{ isset($gj->gj_detail) ? strip_tags($gj->gj_detail) : '' }}</textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ประเภทงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_img"  type="text" id="formFile" value="{{$gj->tj_name}}" disabled="disabled">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับงาน </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input class="form-control box-form-ct" name="news_img"  type="text" id="formFile" value="{{$gj->lj_name}}" disabled="disabled">
                                </div>
                            </div>

                            <!-- <div class="px-5 mt-10">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <tr>
                                    <th><center>สมรรถนะ</center></th>
                                    <th><center>ทักษะ/ความรู้</center></th>
                                    <th><center>ทักษะย่อย</center></th>
                                    <th><center>ระดับ 1</center></th>
                                    <th><center>ระดับ 2</center></th>
                                    <th><center>ระดับ 3</center></th>
                                </tr>
                                <tr>
                                    <td><center>สมรรถนะ 1</center></td>
                                    <td><center>ทักษะ 1</center></td>
                                    <td><center>ทักษะย่อย 1</center></td>
                                    <th><center><input type="radio" checked> </center></th>
                                    <th><center><input type="radio" checked> </center></th>
                                    <th><center><input type="radio" checked> </center></th>
                                </tr>
                                <tr>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td><center>ทักษะย่อย 2</center></td>
                                    <th><center><input type="radio" checked> </center></th>
                                    <th><center><input type="radio" disabled> </center></th>
                                    <th><center><input type="radio" disabled> </center></th>
                                </tr>
                                <tr>
                                    <td><center></center></td>
                                    <td><center>ทักษะ 2</center></td>
                                    <td><center>ทักษะย่อย 1</center></td>
                                    <th><center><input type="radio" disabled> </center></th>
                                    <th><center></center></th>
                                    <th><center></center></th>
                                </tr>
                                <tr>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td><center>ทักษะย่อย 2</center></td>
                                    <th><center><input type="radio" checked> </center></th>
                                    <th><center></center></th>
                                    <th><center></center></th>
                                </tr>
                                <tr>
                                    <td><center>สมรรถนะ 2</center></td>
                                    <td><center>ทักษะ 1</center></td>
                                    <td><center>ทักษะย่อย 1</center></td>
                                    <th><center><input type="radio" checked> </center></th>
                                    <th><center><input type="radio" checked> </center></th>
                                    <th><center><input type="radio" disabled> </center></th>
                                </tr>
                                <tr>
                                    <td><center></center></td>
                                    <td><center>ทักษะ 2</center></td>
                                    <td><center>ทักษะย่อย 1</center></td>
                                    <th><center><input type="radio" disabled> </center></th>
                                    <th><center></th>
                                    <th><center></th>
                                </tr>
                            </table>
                        </div>

                            </div>

                            <div> <button id="button2" type="button" class="btn btn-outline-secondary btn200 rounded-10" onclick="showdetail(2)">แสดงข้อมูล</button> </div> -->
                            <div class="px-5 mt-10">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <tr>
                                        <th><center>สมรรถนะ</center></th>
                                        <th><center>ทักษะ/ความรู้</center></th>
                                        <th><center>ทักษะย่อย</center></th>
                                    </tr>
                                    
                                    @php 
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
                                            @endif
                                        </center></td>
                                        <td><center>
                                            @if($skills != $rs->s_name) 
                                                {{$rs->s_name}}
                                                @php 
                                                    $skills = $rs->s_name;
                                                @endphp
                                            @endif
                                        </center></td>
                                        <td><center>{{$rs->ss_name}}</center></td>
                                    </tr>
                                    @endforeach
                                    <!-- <tr>
                                        <td><center>สมรรถนะ 1</center></td>
                                        <td><center>ทักษะ 1</center></td>
                                        <td><center>ทักษะย่อย 1</center></td>
                                    </tr>
                                    <tr>
                                        <td><center></center></td>
                                        <td><center></center></td>
                                        <td><center>ทักษะย่อย 2</center></td>
                                    </tr>
                                    <tr>
                                        <td><center></center></td>
                                        <td><center>ทักษะ 2</center></td>
                                        <td><center>ทักษะย่อย 1</center></td>
                                    </tr>
                                    <tr>
                                        <td><center></center></td>
                                        <td><center></center></td>
                                        <td><center>ทักษะย่อย 2</center></td>
                                    </tr>
                                    <tr>
                                        <td><center>สมรรถนะ 2</center></td>
                                        <td><center>ทักษะ 1</center></td>
                                        <td><center>ทักษะย่อย 1</center></td>
                                    </tr>
                                    <tr>
                                        <td><center></center></td>
                                        <td><center>ทักษะ 2</center></td>
                                        <td><center>ทักษะย่อย 1</center></td>
                                    </tr> -->
                                </table>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                

                                <a href="{{url('backend/job')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="button" class="btn btn-success w-26 ml-2">ส่งออกเป็น PDF</button>        
                                <button type="button" class="btn btn-primary w-24 ml-2" onclick="printPage()">พิมพ์</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    function printPage() {
        window.print();
    }

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
@endsection





</body>
</html>
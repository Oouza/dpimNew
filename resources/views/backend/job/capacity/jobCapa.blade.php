@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "index";
$active = "job";
$i=1;
?>  
@endsection

@section('content')
  <!-- BEGIN: Content -->
  <div class="content">
            <div class="flex items-center mt-8">
               
            </div>
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box py-10 sm:py-20 mt-5">
               
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">ข้อมูลสมรรถนะของ{{$gj->gj_name}}</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            รายละเอียดสมรรถนะของ{{$gj->gj_name}}
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="{{ url ('backend/job/capacity/form/'.$gj->gj_id)}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                        </div>
                    </div>
                    <br>
                        <br>
                        <div class="intro-y block sm:flex items-center h-10">
                            <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามความจำเป็น</h3>
                        <!-- </div>
                        <div class="intro-y block sm:flex items-center h-10"> -->
                            <input type="radio" name="important" id="important" value="" onclick="important()">&nbsp;ทั้งหมด
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="important" id="important" value="จำเป็น" onclick="important()">&nbsp;จำเป็น
                        </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                            <tr>
                                <th><center>รหัสสมรรถนะ</center></th>
                                <th><center>ชื่อสมรรถนะ</center></th>
                                <th><center>คำอธิบาย</center></th>
                                <th><center>ระดับความจำเป็น</center></th>
                                <th><center>ทักษะ</center></th>
                                <th><center>การตั้งค่า</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($capacity as $rs)
                            <tr>
                                <td><center>{{$rs->cc_no}}</center></td>
                                <td><center>{{$rs->cc_name}}</center></td>
                                <td><center>{!! asset($rs->cc_detail )?$rs->cc_detail :''!!}</center></td>
                                <td><center>{{$rs->gjc_important}}</center></td>
                                <td><center><a href="{{ url ('backend/job/skills/'.$rs->gjc_id)}}"><button id="add-form-btn" type="button" class="btn btn-outline-secondary" >ทักษะ</button></a></center></td>
                                <td><center>
                                    <a href="{{ url ('backend/job/capacity/edit/'.$rs->gjc_id)}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value({{$rs->gjc_id}})">ลบ</button>
                                </center></td>
                                <!-- <td><center><a href="{{url('backend/job/detail')}}"><button type="button" class="btn btn-success"> รายละเอียด </button></a></center></td> -->
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td><center>02</center></td>
                                <td><center>สมรรถนะ2</center></td>
                                <td><center>คำอธิบาย2</center></td>
                                <td><center>ไม่จำเป็น</center></td>
                                <td><center><a href="{{ url ('backend/job/skills')}}"><button id="add-form-btn" type="button" class="btn btn-outline-secondary" >ทักษะ</button></a></center></td>
                                <td><center>
                                    <a href="{{ url ('backend/job/capacity/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                </center></td>
                            </tr> -->
                        </tbody>                    
                    </table>
                        <center>
                            <a href="{{ url ('backend/job')}}"><button type="button" class="btn btn-secondary w-26 ml-2"> กลับหน้ากลุ่มตำแหน่งงาน </button></a>
                        </center>
                </div>
              
            </div>
            <!-- END: Wizard Layout -->
        </div>
        <!-- END: Content -->
@endsection
@section('javascripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  <!-- delete -->
<script>
    function important (){
        var important = $('#important').val();
        alert(important);
    }
</script>

<script>
    $(document).ready(function() {
    $('#example').DataTable({
        responsive: true
    });
} );
function del_value(id) {
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
                        url:"{!! url('backend/job/capacity/delete/"+id+"') !!}",
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
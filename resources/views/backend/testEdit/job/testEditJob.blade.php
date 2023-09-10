@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "testEdit";
$active = "testEditJob";
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
                    <div class="font-medium text-center text-lg">ข้อมูลกลุ่มตำแหน่ง</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดตำแหน่ง
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                        <a href="{{ url ('backend/testEdit/job/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">รวมข้อมูล</button></a>
                                        <a href="{{ url ('backend/testEdit/job/clean')}}"  >   <button class="btn btn-success mr-1 mb-2"> ดูประวัติการแก้ไขกลุ่มตำแหน่ง </button></a>
                                    </div>
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสกลุ่มตำแหน่ง</center></th>
                                <th><center>ชื่อกลุ่มตำแหน่ง</center></th>
                                <th><center>ตำแหน่ง</center></th>
                                <th><center>เพิ่มโดย</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settingPosition as $rs)
                            <tr>
                                <td><center>{{$rs->gj_no}}</center></td>
                                <td><center>{{$rs->gj_name}}</center></td>
                                <td><center>{{$rs->p_name}}</center></td>
                                <td><center>{{$rs->c_nameCompany}}</center></td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td><center>02</center></td>
                                <td><center>กลุ่มตำแหน่ง 2</center></td>
                                <td><center>ตำแหน่ง 2</center></td>
                                <td><center>สถานประกอบการ2</center></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
              
            </div>
            <!-- END: Wizard Layout -->
        </div>
        <!-- END: Content -->
@endsection
@section('javascripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  <!-- delete -->


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
                        url:"{!! url('member/delete/"+id+"') !!}",
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
@extends('layouts.masterCompany')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "users";
$active = "cfUser";
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
                    <div class="font-medium text-center text-lg">ข้อมูลบุคลากร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดข้อมูลบุคลากร
                                    </h2>
                                    <!-- <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('company/position/form') }}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div> -->
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>หมายเลขพนักงาน</center></th>
                                <th><center>ชื่อ</center></th>
                                <th><center>นามสกุล</center></th>
                                <th><center>แผนก</center></th>
                                <th><center>แผนกย่อย</center></th>
                                <th><center>ตำแหน่งปัจจุบัน</center></th>
                                <th><center>สถานะ</center></th>
                                <th><center>ประวัติ</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>ไก่</center></td>
                                <td><center>กา</center></td>
                                <td><center>แผนก 1 </center></td>
                                <td><center>แผนกย่อย 1 </center></td>
                                <td><center>ตำแหน่งปัจจุบัน 1</center></td>
                                <td><center>ผู้สมัครรายใหม่</center></td>
                                <td><center><a href="{{ url ('company/user/detail')}}"> <button type="button" class="btn btn-success"> แสดงประวัติ </button> </a></center></td>
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>เอ</center></td>
                                <td><center>บี</center></td>
                                <td><center>แผนก 2</center></td>
                                <td><center>แผนกย่อย 2</center></td>
                                <td><center>ตำแหน่งปัจจุบัน 2</center></td>
                                <td><center>แก้ไขข้อมูล</center></td>
                                <td><center><a href="{{ url ('company/user/detail')}}"> <button type="button" class="btn btn-success"> แสดงประวัติ </button> </a></center></td>
                            </tr>
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
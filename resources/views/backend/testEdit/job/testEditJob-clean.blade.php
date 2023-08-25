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
                    <div class="font-medium text-center text-lg">ข้อมูลกลุ่มตำแหน่งที่ถูกรวมกลุ่มแล้ว</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="text-lg font-medium truncate mr-5">
                        กลุ่มตำแหน่ง
                        <select name="" id="" class="select2">
                            <option value="">กลุ่มตำแหน่ง 1</option>
                            <option value="">กลุ่มตำแหน่ง 2</option>
                            <option value="">กลุ่มตำแหน่ง 3</option>
                        </select>
                    </h2>
                        
                <div class="intro-y block sm:flex items-center h-10">
                        
                                    <!-- <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดตำแหน่ง
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                        <a href="{{ url ('backend/testEdit/job/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">รวมข้อมูล</button></a>
                                        <a href="{{ url ('backend/testEdit/job/clean')}}"  >   <button class="btn btn-success mr-1 mb-2"> ดูข้อมูลที่ถูกคลีนแล้ว </button></a>
                                    </div> -->
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                                <tr>
                                    <th><center>ตำแหน่ง</center></th>
                                    <th><center>เพิ่มโดย</center></th>
                                    <th><center>กลุ่มตำแหน่งเดิม</center></th>
                                    <th><center>กลุ่มตำแหน่งใหม่</center></th>
                                    <th><center>วันที่แก้ไข</center></th>
                                    <th><center>แก้ไข</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><center>ตำแหน่ง 1</center></td>
                                    <td><center>สถานประกอบการ 1</center></td>
                                    <td><center>กลุ่มตำแหน่งเดิม1</center></td>
                                    <td><center>กลุ่มตำแหน่งใหม่2</center></td>
                                    <td><center>20-05-2023</center></td>
                                    <td><center><a href="{{ url('backend/testEdit/job/edit') }}"><button class="btn btn-warning w-50"> แก้ไข </button></a></center></td>
                                </tr>
                                <tr>
                                    <td><center>ตำแหน่ง </center></td>
                                    <td><center>สถานประกอบการ1</center></td>
                                    <td><center>กลุ่มตำแหน่งเดิม1</center></td>
                                    <td><center>กลุ่มตำแหน่งใหม่3</center></td>
                                    <td><center>23-05-2023</center></td>
                                    <td><center><a href="{{ url('backend/testEdit/job/edit') }}"><button class="btn btn-warning w-50"> แก้ไข </button></a></center></td>
                                </tr>
                            </tbody>
                        
                        </table>
                        <center>
                            <a href="{{url('backend/testEdit/job')}}" class="btn btn-success w-50">กลับหน้าหลัก</a>
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
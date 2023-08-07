@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
   
@endsection

@section('styles')
<?php
$activePage = "study";
$active = "";
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
                    <div class="font-medium text-center text-lg">ข้อมูลการอบรม</div>
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">รายละเอียดข้อมูลการอบรม</h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <a href="{{ url ('backend/skills/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสหลักสูตร กพร.</center></th>
                                <th><center>ชื่อหลักสูตร กพร.</center></th>
                                <th><center>ผู้จัด</center></th>
                                <th><center>ระยะเวลาการอบรม (ชั่วโมง.)</center></th>
                                <th><center>ประเภทหลักสูตร</center></th>
                                <th><center>ชุดทักษะ</center></th>
                                <th><center>ยืนยันการอบรม</center></th>
                                <th><center>แก้ไข</center></th>
                                <th><center>ลบ</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>หลักสูตร กพร.1</center></td>
                                <td><center>ผู้จัด1</center></td>
                                <td><center>1 ชม. </center></td>
                                <td><center>ประเภทหลักสูตร1</center></td>
                                <td><center>ชุดทักษะ1</center></td>
                                <td><center>ยืนยันการอบรมแล้ว</center></td>
                                <td><center><a href="{{ url ('user/study/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a></center></td>
                                <td><center><button type="button" class="btn btn-danger" onclick="del_value(1)">Delete</button></center></td>
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>หลักสูตร กพร.2</center></td>
                                <td><center>ผู้จัด2</center></td>
                                <td><center>2 ชม.</center></td>
                                <td><center>ประเภทหลักสูตร2</center></td>
                                <td><center>ชุดทักษะ2</center></td>
                                <td><center>ยังไม่มีการยืนยันการอบรม</center></td>
                                <td><center><a href="{{ url ('user/study/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a></center></td>
                                <td><center><button type="button" class="btn btn-danger" onclick="del_value(2)">Delete</button></center></td>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  <!-- delete -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
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
                        url:"{!! url('backend/news/delete/"+id+"') !!}",
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
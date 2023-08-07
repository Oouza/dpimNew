@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
   
@endsection

@section('styles')
<?php
$activePage = "people";
$active = "peopleCfSkills";
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
                    <div class="font-medium text-center text-lg">ข้อมูลการอบรมบุคลากร</div>
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">รายละเอียดการอบรมบุคลากร</h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <!-- <a href="{{ url ('company/manage/skills/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a> -->
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>คำนำหน้า</center></th>
                                <th><center>ชื่อ</center></th>
                                <th><center>นามสกุล</center></th>
                                <th><center>หลักสูตรอบรม</center></th>
                                <th><center>ผู้จัดการอบรม</center></th>
                                <th><center>วันเดือนปีที่อบรม</center></th>
                                <th><center>รายละเอียด</center></th>
                                <!-- <th><center>การตั้งค่า</center></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>นาย</center></td>
                                <td><center>ไก่</center></td>
                                <td><center>กา</center></td>
                                <td><center>หลักสูตรอบรม 1 </center></td>
                                <td><center>ผู้จัดการอบรม 1</center></td>
                                <td><center>10-10-2560</center></td>
                                <td><center>
                                    <a href="{{ url ('backend/people/cfSkills/detail')}}">
                                        <button type="button" class="btn btn-success"> รายละเอียด </button>
                                    </a>
                                </center></td>
                                <!-- <td><center>
                                    <a href="{{ url ('company/manage/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">Delete</button>
                                </center></td> -->
                            </tr>
                            <tr>
                                <td><center>นาย</center></td>
                                <td><center>เอ</center></td>
                                <td><center>บี</center></td>
                                <td><center>หลักสูตรอบรม 2</center></td>
                                <td><center>ผู้จัดการอบรม 2</center></td>
                                <td><center>05-06-2566</center></td>
                                <td><center>
                                    <a href="{{ url ('backend/people/cfSkills/detail')}}">
                                        <button type="button" class="btn btn-success"> รายละเอียด </button>
                                    </a>
                                </center></td>
                                <!-- <td><center>
                                    <a href="{{ url ('company/manage/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">Delete</button>
                                </center></td> -->
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
                        url:"{!! url('company/user/delete/"+id+"') !!}",
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

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
function detail(id) {
            Swal.fire({
                title: 'รายละเอียดข้อมูลของ ไก่ กา',
            text: "",
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
                        url:"{!! url('"+id+"') !!}",
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
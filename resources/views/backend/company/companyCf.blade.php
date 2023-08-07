@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
   
@endsection

@section('styles')
<?php
$activePage = "company";
$active = "cf";
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
                    <div class="font-medium text-center text-lg">ยืนยันข้อมูลสถานประกอบการ</div>
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">รายละเอียดข้อมูลสถานประกอบการ</h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <!-- <a href="{{ url ('backend/skills/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a> -->
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>ลำดับ</center></th>
                                <th><center>ประเภทสถานประกอบการ</center></th>
                                <th><center>เลขที่หมายเลขประทานบัตร/ใบอนุญาต</center></th>
                                <th><center>ชื่อสถานประกอบการ</center></th>
                                <th><center>ชนิดแร่หลัก</center></th>
                                <th><center>จังหวัด</center></th>
                                <th><center>ข้อมูลผู้ติดต่อ</center></th>
                                <th><center>สถานะ</center></th>
                                <th><center>ตรวจสอบข้อมูล</center></th>
                                <!-- <th><center>ลบ</center></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><center>01</center></th>
                                <th><center>โรงแต่งแร่</center></th>
                                <th><center>001/544</center></th>
                                <th><center>โรงแต่งแร่</center></th>
                                <th><center>เหล็ก</center></th>
                                <th><center>กรุงเทพ</center></th>
                                <th><center>นาย ดี ดีดี email@gmail.com</center></th>
                                <td><center>ผู้บริหาร</center></td>
                                <td><center><a href="{{ url ('backend/companyCf/detail')}}"  >  <button type="button" class="btn btn-warning"  >ตรวจสอบข้อมูล</button></a></center></td>
                                <!-- <td><center><button type="button" class="btn btn-danger" onclick="del_value(1)">Delete</button></center></td> -->
                            </tr>
                            <tr>
                                <th><center>02</center></th>
                                <th><center>โรงแต่งแร่</center></th>
                                <th><center>001/544</center></th>
                                <th><center>โรงแต่งแร่</center></th>
                                <th><center>เหล็ก</center></th>
                                <th><center>กรุงเทพ</center></th>
                                <th><center>นาย ไก่ ขัน gmail@gmail.com</center></th>
                                <td><center>HR</center></td>
                                <td><center><a href="{{ url ('backend/companyCf/detail')}}"  >  <button type="button" class="btn btn-warning"  >ตรวจสอบข้อมูล</button></a></center></td>
                                <!-- <td><center><button type="button" class="btn btn-danger" onclick="del_value(2)">Delete</button></center></td> -->
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
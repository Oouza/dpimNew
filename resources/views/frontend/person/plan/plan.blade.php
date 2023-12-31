@extends('layouts.masterUser')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "plan";
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
                    <div class="font-medium text-center text-lg">แผนการพัฒนาทักษะ</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดแผนการพัฒนาทักษะ
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('user/plan/form') }}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสหลักสูตร </center></th>
                                <th><center>ชื่อหลักสูตร </center></th>
                                <th><center>ผู้จัด</center></th>
                                <th><center>ช่วงเวลาที่อบรม</center></th>
                                <th><center>ระยะเวลาการอบรม (ชั่วโมง)</center></th>
                                <th><center>ประเภทหลักสูตร</center></th>
                                <!-- <th><center>ชุดทักษะ</center></th> -->
                                <th><center>สถานะการดำเนินการ</center></th>
                                <th><center>แก้ไข/รายงานผล</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>หลักสูตร 1</center></td>
                                <td><center>ผู้จัด 1</center></td>
                                <td><center>10/10/2566 ถึง 12/10/2566</center></td>
                                <td><center>1</center></td>
                                <td><center>ประเภทหลักสูตร 1</center></td>
                                <!-- <td><center>ชุดทักษะ 1</center></td> -->
                                <td><center>รอการยืนยันจาก HR</center></td>
                                <td><center>
                                    <a href="{{ url ('user/plan/edit')}}"  >  <button type="button" class="btn btn-success">ใส่ข้อมูล</button></a>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>หลักสูตร 2</center></td>
                                <td><center>ผู้จัด 2</center></td>
                                <td><center>20/11/2566 ถึง 25/11/2566</center></td>
                                <td><center>2</center></td>
                                <td><center>ประเภทหลักสูตร 2</center></td>
                                <!-- <td><center>ชุดทักษะ 2</center></td> -->
                                <td><center>รอการยืนยันจากผู้บริหาร</center></td>
                                <td><center>

                                    <a href="{{ url ('user/plan/edit')}}"  >  <button type="button" class="btn btn-success">ใส่ข้อมูล</button></a>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>03</center></td>
                                <td><center>หลักสูตร 1</center></td>
                                <td><center>ผู้จัด 1</center></td>
                                <td><center>10/10/2566 ถึง 12/10/2566</center></td>
                                <td><center>1</center></td>
                                <td><center>ประเภทหลักสูตร 1</center></td>
                                <!-- <td><center>ชุดทักษะ 1</center></td> -->
                                <td><center>รอดำเนินการ</center></td>
                                <td><center>
                                    <a href="{{ url ('user/plan/edit')}}"  >  <button type="button" class="btn btn-success">ใส่ข้อมูล</button></a>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>04</center></td>
                                <td><center>หลักสูตร 2</center></td>
                                <td><center>ผู้จัด 2</center></td>
                                <td><center>20/11/2566 ถึง 25/11/2566</center></td>
                                <td><center>2</center></td>
                                <td><center>ประเภทหลักสูตร 2</center></td>
                                <!-- <td><center>ชุดทักษะ 2</center></td> -->
                                <td><center>ดำเนินการแล้ว</center></td>
                                <td><center>

                                    <a href="{{ url ('user/plan/edit')}}"  >  <button type="button" class="btn btn-success">ใส่ข้อมูล</button></a>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>05</center></td>
                                <td><center>หลักสูตร 1</center></td>
                                <td><center>ผู้จัด 1</center></td>
                                <td><center>10/10/2566 ถึง 12/10/2566</center></td>
                                <td><center>1</center></td>
                                <td><center>ประเภทหลักสูตร 1</center></td>
                                <!-- <td><center>ชุดทักษะ 1</center></td> -->
                                <td><center>ยกเลิกการดำเนินการ</center></td>
                                <td><center>
                                    <a href="{{ url ('user/plan/edit')}}"  >  <button type="button" class="btn btn-success">ใส่ข้อมูล</button></a>
                                </center></td>
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
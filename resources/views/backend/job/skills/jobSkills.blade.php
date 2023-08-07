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
                    <div class="font-medium text-center text-lg">ข้อมูลทักษะในสมรรถนะ 1 ของกลุ่มตำแหน่งงาน 1</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            รายละเอียดทักษะในสมรรถนะ 1 ของกลุ่มตำแหน่งงาน 1
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="{{ url ('backend/job/skills/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                            <th><center>รหัสทักษะ</center></th>
                            <th><center>ชื่อทักษะ</center></th>
                            <th><center>คำอธิบาย</center></th>
                            <th><center>ทักษะย่อย</center></th>
                            <th><center>การตั้งค่า</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>คำอธิบาย1</center></td>
                                <td><center>
                                    <a href="#" onclick="detail_skills(1)">ทักษะย่อย 1</a>
                                    <br>
                                    <a href="#" onclick="detail_skills(1)">ทักษะย่อย 2</a>
                                </center></td>
                                <td><center>
                                    <a href="{{ url ('backend/job/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>ทักษะ2</center></td>
                                <td><center>คำอธิบาย2</center></td>
                                <td><center>
                                    <a href="#" onclick="detail_skills(1)">ทักษะย่อย 1</a>
                                    <br>
                                    <a href="#" onclick="detail_skills(1)">ทักษะย่อย 2</a>
                                </center></td>
                                <td><center>
                                    <a href="{{ url ('backend/job/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                </center></td>
                            </tr>
                        </tbody>

                    </table>
                        <center>
                            <a href="{{ url ('backend/job/capacity')}}"><button type="button" class="btn btn-secondary w-26 ml-2"> กลับหน้าสมรรถนะ </button></a>
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

<script>
function detail_skills(id) {
            Swal.fire({
            // title: 'ต้องการลบข้อมูลใช่หรือไม่ ?',
            text: "คำอธิบาย",
            // icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#d33',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'ปิด',
            // cancelButtonText: 'ปิด'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type:"GET",
                        url:"{!! url('member/delete/"+id+"') !!}",
                        success: function(data) {
                            console.log(data);
                        }   
                    });

                    // Swal.fire(
                    //     'สำเร็จ!',
                    //     'ข้อมูลถูกลบสำเร็จ',
                    //     'success'
                    // ).then(() => {
                    //     location.reload();
                    // })
                   
                }
            })
        }
</script>
@endsection
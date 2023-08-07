@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "index";
$active = "skillsSub";
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
                    <div class="font-medium text-center text-lg">ข้อมูลทักษะย่อย</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดทักษะย่อย
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url('backend/skillsSub/form') }}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                        <select name="" id="">
                                            <option value="" hidden>-เลือกกลุ่มสมรรถนะ-</option>
                                            <option value=""> กลุ่มสมรรถนะ 1</option>
                                            <option value=""> กลุ่มสมรรถนะ 2</option>
                                            <option value=""> กลุ่มสมรรถนะ 3</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสทักษะย่อย</center></th>
                                <th><center>ชื่อทักษะย่อย</center></th>
                                <th><center>คำอธิบาย</center></th>
                                <th><center>ทักษะ</center></th>
                                <th><center>เกณฑ์ระดับที่ 1</center></th>
                                <th><center>เกณฑ์ระดับที่ 2</center></th>
                                <th><center>เกณฑ์ระดับที่ 3</center></th>
                                <th><center>ตั้งค่า</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>ทักษะย่อย 1</center></td>
                                <td><center>คำอธิบาย1</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>คำอธิบายเกณฑ์ระดับที่ 1</center></td>
                                <td><center>คำอธิบายเกณฑ์ระดับที่ 2</center></td>
                                <td><center>คำอธิบายเกณฑ์ระดับที่ 3</center></td>                                <td><center>
                                    <a href="{{ url ('backend/skillsSub/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>ทักษะย่อย 2</center></td>
                                <td><center>คำอธิบาย2</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>คำอธิบายเกณฑ์ระดับที่ 1</center></td>
                                <td><center>คำอธิบายเกณฑ์ระดับที่ 2</center></td>
                                <td><center>คำอธิบายเกณฑ์ระดับที่ 3</center></td>                                <td><center>
                                    <a href="{{ url ('backend/skillsSub/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(2)">ลบ</button>
                                </center></td>
                            </tr>
                        </tbody>
                    </table>
                        <center>
                            <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลทักษะย่อยทั้งหมด (เป็น xlsx) </button>        
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
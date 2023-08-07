@extends('layouts.masterCompany')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "searchCourse";
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
                    <div class="font-medium text-center text-lg">ข้อมูลหลักสูตร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดข้อมูลหลักสูตร
                                    </h2>
                                </div>
                                    <br>
                                    <div class="intro-y block sm:flex items-center h-10">
                                        <h3 class="text-lg font-medium truncate mr-5">ค้นหาโดย</h3>
                                    <!-- </div>
                                    <div class="intro-y block sm:flex items-center h-10"> -->
                                        <input type="text" placeholder="ชื่อหลักสูตร(คีย์เวิร์ด)">
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="" id="">
                                            <option value="" hidden>- ผู้จัด -</option>
                                            <option value=""> ผู้จัด 1</option>
                                            <option value=""> ผู้จัด 2</option>
                                            <option value=""> ผู้จัด 3</option>
                                        </select>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="" id="">
                                            <option value="" hidden>- สมถรรนะ -</option>
                                            <option value=""> สมถรรนะ 1</option>
                                            <option value=""> สมถรรนะ 2</option>
                                            <option value=""> สมถรรนะ 3</option>
                                        </select>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="" id="">
                                            <option value="" hidden>- ทักษะ -</option>
                                            <option value=""> ทักษะ 1</option>
                                            <option value=""> ทักษะ 2</option>
                                            <option value=""> ทักษะ 3</option>
                                        </select>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <button type="button" class="btn btn-primary">ค้นหา</button>
                                    </div>
                                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสหลักสูตร </center></th>
                                <th><center>ชื่อหลักสูตร </center></th>
                                <th><center>ผู้จัด</center></th>
                                <th><center>ระยะเวลาการอบรม (จำนวนวัน)</center></th>
                                <th><center>รายละเอียด</center></th>
                                <th><center>สมรรถนะ</center></th>
                                <th><center>ทักษะ</center></th>
                                <th><center>ทักษะย่อย</center></th>
                                <th><center>ระดับ</center></th>
                                <th><center>หมายเหตุ</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>001</center></td>
                                <td><center>ชื่อหลักสูตร 1</center></td>
                                <td><center>ผู้จัด 1</center></td>
                                <td><center>3</center></td>
                                <td><center>รายละเอียด 1</center></td>
                                <td><center>สมรรถนะ 1</center></td>
                                <td><center>ทักษะ 1</center></td>
                                <td><center>ทักษะย่อย 1</center></td>
                                <td><center>ระดับ 1</center></td>
                                <td><center>หมายเหตุ 1</center></td>
                            </tr>
                            <tr>
                                <td><center>002</center></td>
                                <td><center>ชื่อหลักสูตร 2</center></td>
                                <td><center>ผู้จัด 2</center></td>
                                <td><center>5</center></td>
                                <td><center>รายละเอียด 2</center></td>
                                <td><center>สมรรถนะ 2</center></td>
                                <td><center>ทักษะ 2</center></td>
                                <td><center>ทักษะย่อย 2</center></td>
                                <td><center>ระดับ 2</center></td>
                                <td><center>หมายเหตุ 2</center></td>
                            </tr>
                        </tbody>
                    
                    </table>
                        <!-- <center>
                            <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลแผนกทั้งหมด (เป็น xlsx) </button>        
                        </center> -->
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
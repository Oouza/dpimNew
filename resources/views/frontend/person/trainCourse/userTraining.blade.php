@extends('layouts.masterUser')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "training";
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
                    <div class="font-medium text-center text-lg">ข้อมูลหลักสูตรพัฒนาบุคลากร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดหลักสูตรพัฒนาบุคลากร
                                    </h2>
                                </div>
                                    <br>
                                    <div class="intro-y block sm:flex items-center h-10">
                                        <h3 class="text-lg font-medium truncate mr-5">ค้นหาโดย</h3>
                                    <!-- </div>
                                    <div class="intro-y block sm:flex items-center h-10"> -->
                                        <select name="skills" id="skills" class="form-control select2" onchange="searchCourse()">
                                            <option value="" >ทักษะทั้งหมด</option>
                                            <option value="1"> ทักษะ1 </option>
                                            <option value="2"> ทักษะ2 </option>
                                            <option value="3"> ทักษะ3 </option>
                                            <option value="4"> ทักษะ4 </option>
                                        </select>
                                        <select name="course" id="course" class="form-control select2" onchange="searchCourse()">
                                            <option value="" >ประเภทหลักสูตรทั้งหมด</option>
                                            <option value="1"> ประเภทหลักสูตร1 </option>
                                            <option value="2"> ประเภทหลักสูตร2 </option>
                                            <option value="3"> ประเภทหลักสูตร3 </option>
                                            <option value="4"> ประเภทหลักสูตร4 </option>
                                        </select>
                                        <select name="people" id="people" class="form-control select2" onchange="searchCourse()">
                                            <option value="" >ผู้จัดทั้งหมด</option>
                                            <option value="1"> ผู้จัด1 </option>
                                            <option value="2"> ผู้จัด2 </option>
                                            <option value="3"> ผู้จัด3 </option>
                                            <option value="4"> ผู้จัด4 </option>
                                        </select>
                                        <select name="time" id="time" class="form-control select2" onchange="searchCourse()">
                                            <option value="" >ระยะเวลาทั้งหมด</option>
                                            <option value="1"> 1 ชม. </option>
                                            <option value="2"> 2 ชม. </option>
                                            <option value="3"> 3 ชม. </option>
                                            <option value="4"> 4 ชม. </option>
                                        </select>
                                    </div>
                                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสหลักสูตร </center></th>
                                <th><center>ชื่อหลักสูตร </center></th>
                                <th><center>ผู้จัด</center></th>
                                <th><center>ประเภทหลักสูตร</center></th>
                                <th><center>ระยะเวลาการอบรม (จำนวนชั่วโมง)</center></th>
                                <th><center>รายละเอียด</center></th>
                                <th><center>ทักษะย่อย</center></th>
                                <th><center>ค่าใช้จ่าย</center></th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                                <td><center>001</center></td>
                                <td><center>ชื่อหลักสูตร 1</center></td>
                                <td><center>ผู้จัด 1</center></td>
                                <th><center>ประเภทหลักสูตร1</center></th>
                                <td><center>5</center></td>
                                <td><center>รายละเอียด 1</center></td>
                                <!-- <td><center>สมรรถนะ 1</center></td>
                                <td><center>ทักษะ 1</center></td>
                                <td><center>ระดับ 1</center></td> -->
                                <td><center>ทักษะย่อย 1</center></td>
                                <td><center>0 บาท</center></td>
                            </tr>
                            <tr>
                                <td><center>002</center></td>
                                <td><center>ชื่อหลักสูตร 2</center></td>
                                <td><center>ผู้จัด 2</center></td>
                                <th><center>ประเภทหลักสูตร2</center></th>
                                <td><center>6</center></td>
                                <td><center>รายละเอียด 2</center></td>
                                <!-- <td><center>สมรรถนะ 2</center></td>
                                <td><center>ทักษะ 2</center></td>
                                <td><center>ระดับ 2</center></td> -->
                                <td><center>ทักษะย่อย 2</center></td>
                                <td><center>200 บาท</center></td>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>

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
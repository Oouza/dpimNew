@extends('layouts.masterCompany')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "scoreboard";
$active = "skills";
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
                    <div class="font-medium text-center text-lg">สรุปผลการพัฒนาทักษะของบุคลากร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <!-- <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดข้อมูลแบ่งตามทักษะ
                                    </h2> -->
                                </div>
                                    <br>
                                    <div class="intro-y block sm:flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">เลือกแสดงของปี</h2>
                                        <select name="" id="" class="select2">
                                            <option value="">2566</option>
                                            <option value="">2565</option>
                                            <option value="">2564</option>
                                        </select>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <h2 class="text-lg font-medium truncate mr-5">เลือกแสดงของกลุ่มตำแหน่ง</h2>
                                        <select name="" id="" class="select2">
                                            <option value="">กลุ่มตำแหน่งทั้งหมด</option>
                                            <option value="">กลุ่มตำแหน่ง 1</option>
                                            <option value="">กลุ่มตำแหน่ง 2</option>
                                            <option value="">กลุ่มตำแหน่ง 3</option>
                                        </select>
                                    </div>
                                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>ชื่อ</center></th>
                                <th><center>นามสกุล</center></th>
                                <th><center>ตำแหน่ง</center></th>
                                <th><center>หลักสูตร</center></th>
                                <th><center>ระยะเวลาอบรม</center></th>
                                <th><center>สมรรถนะ</center></th>
                                <th><center>ทักษะ</center></th>
                                <th><center>ทักษะย่อย</center></th>
                                <th><center>รวมระยะเวลาอบรม</center></th>
                                <th><center>ค่าใช้จ่าย</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>สมชาย</center></td>
                                <td><center>อยู่ดี</center></td>
                                <td><center>ตำแหน่ง 1</center></td>
                                <td><center>หลักสูตร 1</center></td>
                                <td><center>2 ชั่วโมง</center></td>
                                <td><center>สมรรถนะ 1</center></td>
                                <td><center>ทักษะ 2</center></td>
                                <td><center>ทักษะย่อย8</center></td>
                                <td rowspan="4"><center>9</center></td>
                                <td><center>100</center></td>
                            </tr>
                            <tr>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center>หลักสูตร 2</center></td>
                                <td><center>1 ชั่วโมง</center></td>
                                <td><center>สมรรถนะ1</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>ทักษะย่อย1</center></td>
                                <td><center>200</center></td>
                            </tr>
                            <tr>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center>หลักสูตร 3</center></td>
                                <td><center>3 ชั่วโมง</center></td>
                                <td><center>สมรรถนะ 1</center></td>
                                <td><center>ทักษะ 1</center></td>
                                <td><center>ทักษะย่อย4</center></td>
                                <td><center>300</center></td>
                            </tr>
                            <tr>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center>หลักสูตร 5</center></td>
                                <td><center>3 ชั่วโมง</center></td>
                                <td><center>สมรรถนะ 5</center></td>
                                <td><center>ทักษะ 1</center></td>
                                <td><center>ทักษะย่อย5</center></td>
                                <td><center>150</center></td>
                            </tr>
                            <tr>
                                <td><center>สมศักดิ์</center></td>
                                <td><center>สกุลดี</center></td>
                                <td><center>ตำแหน่ง 1</center></td>
                                <td><center>หลักสูตร 1</center></td>
                                <td><center>2 ชั่วโมง</center></td>
                                <td><center>สมรรถนะ 1</center></td>
                                <td><center>ทักษะ 2</center></td>
                                <td><center>ทักษะย่อย2</center></td>
                                <td rowspan="3"><center>6 ชั่วโมง</center></td>
                                <td><center>250</center></td>
                            </tr>
                            <tr>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center>หลักสูตร 2</center></td>
                                <td><center>1 ชั่วโมง</center></td>
                                <td><center>สมรรถนะ 1</center></td>
                                <td><center>ทักษะ 1</center></td>
                                <td><center>ทักษะย่อย3</center></td>
                                <td><center>0</center></td>
                            </tr>
                            <tr>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center></center></td>
                                <td><center>หลักสูตร3</center></td>
                                <td><center>3 ชั่วโมง</center></td>
                                <td><center>สมรรถนะ 1</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>ทักษะย่อย1</center></td>
                                <td><center>100</center></td>
                            </tr>
                            <tr>
                                <td colspan="8" align="left">ค่าเฉลี่ยต่อคนต่อปี</td>
                                <td><center>7 ชั่วโมง</center></td>
                                <td><center>550 บาท</center></td>
                            </tr>
                        </tbody>
                    
                    </table>
                </div>
                <br>
                <center>
                    <button type="button" class="btn btn-secondary w-26 ml-2">  ดาวน์โหลดข้อมูลสรุปผลการพัฒนาทักษะของบุคลากร (เป็น xlsx) </button>        
                </center>
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
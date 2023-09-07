@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
   
@endsection

@section('styles')
<?php
$activePage = "scoreboard";
$active = "sHour";
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
                    <div class="font-medium text-center text-lg">สรุปผลการพัฒนาทักษะของบุคลากร
 </div>
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <!-- <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">รายละเอียดหลักสูตรพัฒนาบุคลากร </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <a href="{{ url ('backend/dpim/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                        </div>
                    </div> -->
                    
                    <br>
                    <div class="intro-y block sm:flex items-center h-10">
                        <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                            <select name="year" id="year" class="select2">
                                <!-- <option value="" hidden>- เลือกปี -</option> -->
                                <option value=""> ปีทั้งหมด  </option>
                                <option value=""> 2566 </option>
                                <option value=""> 2565 </option>
                                <option value=""> 2564 </option>
                            </select>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <select name="typeCom" id="typeCom" class="select2">
                                <option value=""> ประเภทสถานประกอบการทั้งหมด </option>
                                <option value="เหมืองแร่">เหมืองแร่</option>
                                <option value="โรงโม่หิน">โรงโม่หิน</option>
                                <option value="โรงแต่งแร่">โรงแต่งแร่</option>
                                <option value="โรงประกอบโลหกรรม">โรงประกอบโลหกรรม</option>
                                <option value="ผู้รับเหมาเหมืองแร่">ผู้รับเหมาเหมืองแร่</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                                <option value="อิสระ">อิสระ</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    กลุ่มตำแหน่ง 1 รวม 100 คน
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <!-- <th><center>ลำดับ</center></th> -->
                                <th><center>กลุ่มตำแหน่ง</center></th>
                                <th><center>จำนวนบุคลากร</center></th>
                                <th><center>สมรรถนะ</center></th>
                                <th><center>จำนวนชั่วโมงที่ได้รับการพัฒนาสมรรถนะ</center></th>
                                <!-- <th><center>จำนวนชั่วโมงที่ได้รับการพัฒนาเฉลี่ยต่อคน - รวม</center></th>
                                <th><center>หมายเหตุ</center></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <td><center>01</center></td> -->
                                <td><center>กลุ่มตำแหน่ง 1</center></td>
                                <td><center>100</center></td>
                                <td><center>4</center></td>
                                <td><center>6</center></td>
                                <!-- <td><center>10</center></td>
                                <th><center></center></th> -->
                            </tr>
                            <tr>
                                <!-- <td><center>01</center></td> -->
                                <td><center>สมรรถนะ1</center></td>
                                <td><center>100</center></td>
                                <td><center>4</center></td>
                                <td><center>6</center></td>
                                <!-- <td><center>10</center></td>
                                <th><center></center></th> -->
                            </tr>
                            <tr>
                                <!-- <td><center>01</center></td> -->
                                <td><center>สมรรถนะ2</center></td>
                                <td><center>100</center></td>
                                <td><center>4</center></td>
                                <td><center>6</center></td>
                                <!-- <td><center>10</center></td>
                                <th><center></center></th> -->
                            </tr>
                            <tr>
                                <!-- <td><center>02</center></td> -->
                                <td><center>กลุ่มตำแหน่ง 2</center></td>
                                <td><center>100</center></td>
                                <td><center>5</center></td>
                                <td><center>3</center></td>
                                <!-- <td><center>6</center></td>
                                <th><center></center></th> -->
                            </tr>
                            <tr>
                                <!-- <td><center>01</center></td> -->
                                <td><center>สมรรถนะ1</center></td>
                                <td><center>100</center></td>
                                <td><center>4</center></td>
                                <td><center>6</center></td>
                                <!-- <td><center>10</center></td>
                                <th><center></center></th> -->
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <!-- <center>
                        <button type="button" class="btn btn-success w-26 ml-2"> ดาวน์โหลดข้อมูลหลักสูตรพัฒนาบุคลากรทั้งหมด (เป็น xls) </button>
                    </center> -->
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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>

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
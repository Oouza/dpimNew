@extends('layouts.masterManager')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
   
@endsection

@section('styles')
<?php
$activePage = "scoreboard";
$active = "job";
$i=1;
?>
<!-- <style>
    canvas {
        border: 1px solid black;
    }
</style> -->
@endsection

@section('content')
  <!-- BEGIN: Content -->
  <div class="content">
            <div class="flex items-center mt-8">
               
            </div>
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box py-10 sm:py-20 mt-5">
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">สรุประดับทักษะของบุคลากรรายกลุ่มตำแหน่ง</div>
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">กลุ่มตำแหน่ง</h2>
                        <select name="" id="" class="select2">
                            <option value="">กลุ่มตำแหน่งทั้งหมด</option>
                            <option value="">กลุ่มตำแหน่งที่ 1</option>
                            <option value="">กลุ่มตำแหน่งที่ 2</option>
                            <option value="">กลุ่มตำแหน่งที่ 3</option>
                        </select>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <!-- <a href="{{ url ('company/skillsSub/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a> -->
                        </div>
                    </div>
                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <tr><th>รายชื่อบุคลากรในกลุ่มตำแหน่ง</th></tr>
                        <!-- <tr><td>
                            ตำแหน่ง 1 <br>
                            สมเกียรติ.ม – สมเกียรติ ม้าแก้ว
                        </td></tr> -->
                        <tr><td>
                            สมเกียรติ.ม – สมเกียรติ ม้าแก้ว ตำแหน่ง 1 <br>
                            กมล.ท – กมล ทหารไทย ตำแหน่ง 2 <br>
                            สมาน.ด -  สมาน เด็กดี ตำแหน่ง 2 <br>
                        </td></tr>
                    </table>
                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <tr>
                            <th><center>สมรรถนะ</center></th>
                            <th><center>ทักษะ/ความรู้</center></th>
                            <th><center>ทักษะย่อย</center></th>
                            <th><center>ระดับ 1</center></th>
                            <th><center>ระดับ 2</center></th>
                            <th><center>ระดับ 3</center></th>
                        </tr>
                        <tr>
                            <td><center>สมรรถนะ 1</center></td>
                            <td><center>ทักษะ 1</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <td><center>สมเกียรติ.ม กมล.ท สมาน.ด</center></td>
                            <td><center></center></td>
                            <td><center></center></td>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center>ทักษะย่อย 2</center></td>
                            <td><center>สมเกียรติ.ม กมล.ท สมาน.ด</center></td>
                            <td><center></center></td>
                            <td><center></center></td>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center>ทักษะ 2</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <td><center>สมเกียรติ.ม กมล.ท สมาน.ด</center></td>
                            <td><center>สมเกียรติ.ม</center></td>
                            <td><center></center></td>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center>ทักษะย่อย 2</center></td>
                            <td><center>สมเกียรติ.ม กมล.ท</center></td>
                            <td><center>สมเกียรติ.ม กมล.ท</center></td>
                            <td><center>สมเกียรติ.ม กมล.ท</center></td>
                        </tr>
                        <tr>
                            <td><center>สมรรถนะ 2</center></td>
                            <td><center>ทักษะ 1</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <td><center>สมเกียรติ.ม กมล.ท สมาน.ด</center></td>
                            <td><center></center></td>
                            <td><center></center></td>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center>ทักษะ 2</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <td><center>สมเกียรติ.ม กมล.ท สมาน.ด</center></td>
                            <td><center></center></td>
                            <td><center></center></td>
                        </tr>
                    </table>
                    
                    <br>
                    <center>
                        <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลสรุประดับทักษะของบุคลากรรายกลุ่มตำแหน่ง (เป็น xlsx) </button>        
                    </center>
                    <!-- <center><button type="button" class="btn btn-success">ส่งออกข้อมูล xlsx</button></center> -->
                    
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสทักษะ</center></th>
                                <th><center>ชื่อทักษะย่อย</center></th>
                                <th><center>คำอธิบาย</center></th>
                                <th><center>ทักษะย่อย</center></th>
                                <th><center>ตั้งค่า</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>ทักษะย่อย 1</center></td>
                                <td><center>คำอธิบาย1</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>
                                    <a href="{{ url ('company/skillsSub/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">Delete</button>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>ทักษะย่อย 2</center></td>
                                <td><center>คำอธิบาย2</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>
                                    <a href="{{ url ('company/skillsSub/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(2)">Delete</button>
                                </center></td>
                            </tr>
                        </tbody>
                    </table> -->
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
                        url:"{!! url('company/news/delete/"+id+"') !!}",
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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection
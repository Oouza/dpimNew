@extends('layouts.masterUser')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
   
@endsection

@section('styles')
<?php
$activePage = "course";
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
                        <h2 class="text-lg font-medium truncate mr-5">รายละเอียดข้อมูลหลักสูตร</h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <!-- <a href="{{ url ('backend/dpim/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a> -->
                        </div>
                    </div>
                    <br>
                    <div class="intro-y block sm:flex items-center h-10">
                        <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                        <select name="" id="">
                            <option value="" hidden>-เลือกชุดทักษะ-</option>
                            <option value=""> ชุดทักษะ 1</option>
                            <option value=""> ชุดทักษะ 2</option>
                            <option value=""> ชุดทักษะ 3</option>
                        </select>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <select name="" id="">
                            <option value="" hidden>-เลือกประเภทหลักสูตร-</option>
                            <option value=""> ประเภทหลักสูตร 1</option>
                            <option value=""> ประเภทหลักสูตร 2</option>
                            <option value=""> ประเภทหลักสูตร 3</option>
                        </select>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <select name="" id="">
                            <option value="" hidden>-เลือกผู้จัด-</option>
                            <option value=""> ผู้จัด 1</option>
                            <option value=""> ผู้จัด 2</option>
                            <option value=""> ผู้จัด 3</option>
                        </select>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <select name="" id="">
                            <option value="" hidden>-เลือกระยะเวลา-</option>
                            <option value=""> ระยะเวลา 1</option>
                            <option value=""> ระยะเวลา 2</option>
                            <option value=""> ระยะเวลา 3</option>
                        </select>
                    </div>
                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสหลักสูตร กพร.</center></th>
                                <th><center>ชื่อหลักสูตร กพร.</center></th>
                                <th><center>ผู้จัด</center></th>
                                <th><center>ระยะเวลาการอบรม (ชั่วโมง.)</center></th>
                                <th><center>ประเภทหลักสูตร</center></th>
                                <th><center>ชุดทักษะ</center></th>
                                <th><center>ความถี่/การจัดครั้งล่าสุด</center></th>
                                <th><center>รายละเอียด</center></th>
                                <!-- <th><center>ตั้งค่า</center></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>หลักสูตร กพร.1</center></td>
                                <td><center>ผู้จัด1</center></td>
                                <td><center>1 ชม. </center></td>
                                <td><center>ประเภทหลักสูตร1</center></td>
                                <td><center>ชุดทักษะ1</center></td>
                                <td><center>1 เดือน/ครั้ง</center></td>
                                <td><center><a href="{{ url ('user/training/detail')}}"> <button class="btn btn-success"> รายละเอียด </button> </a></center></td>
                                <!-- <td><center>
                                    <a href="{{ url ('backend/dpim/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">Delete</button>
                                </center></td> -->
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>หลักสูตร กพร.2</center></td>
                                <td><center>ผู้จัด2</center></td>
                                <td><center>2 ชม.</center></td>
                                <td><center>ประเภทหลักสูตร2</center></td>
                                <td><center>ชุดทักษะ2</center></td>
                                <td><center>2 เดือน/ครั้ง</center></td>
                                <td><center><a href="{{ url ('user/training/detail')}}"> <button class="btn btn-success"> รายละเอียด </button> </a></center></td>
                                <!-- <td><center>
                                    <a href="{{ url ('backend/dpim/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(2)">Delete</button>
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

<script>
    function training($id) {
        // alert('asd');
        Swal.fire({
            title: '<h4>ข้อมูลหลักสูตร</h4>',
            // text: 'product1',
            html:   '<hr><h5><b>ออมทอง'+
                    '</h5></b><p>ออมทองราคา 1000 บาท จากราคา 1500'+
                    ' บาท<br>เพียงแค่จ่ายให้ครบในกำหนด 3 เดือน<hr>เหลือ 20 สิทธิ์',
            showCloseButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'ปิด',
        })
    }
</script>
@endsection
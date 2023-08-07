@extends('layouts.masterUser')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
   
@endsection

@section('styles')
<?php
$activePage = "statistic";
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
                    <div class="font-medium text-center text-lg">ข้อมูลการพัฒนาบุคลากร</div>
                   
                </div>
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-base">รายละเอียด</div>
                    @if(!empty($user->e_employeeNo))
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            หมายเลขพนักงาน
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$user->e_employeeNo}}
                        </div>
                    </div>
                    @endif

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ชื่อ - นามสกุล
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$user->e_title}} {{$user->e_fname}} {{$user->e_lname}}
                        </div>
                    </div>

                    @if(!empty($user->e_nameDepartment))
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แผนก
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$user->e_nameDepartment}}
                        </div>
                    </div>
                    @endif

                    @if(!empty($user->e_nameDepartmentSub))
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แผนกย่อย
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$user->e_nameDepartmentSub}}
                        </div>
                    </div>
                    @endif

                    @if(!empty($user->e_namePosition))
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$user->e_namePosition}}
                        </div>
                    </div>
                    @endif
                    
                    @if(!empty($user->e_nameGroup))
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            กลุ่มตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$user->e_nameGroup}}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="px-5 mt-10">
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
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center>ทักษะย่อย 2</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center>ทักษะ 2</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center>x</center></th>
                            <th><center>x</center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center>ทักษะย่อย 2</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center>x</center></th>
                            <th><center></center></th>
                        </tr>
                        <tr>
                            <td><center>สมรรถนะ 2</center></td>
                            <td><center>ทักษะ 1</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" checked> </center></th>
                            <th><center><input type="radio" disabled> </center></th>
                        </tr>
                        <tr>
                            <td><center></center></td>
                            <td><center>ทักษะ 2</center></td>
                            <td><center>ทักษะย่อย 1</center></td>
                            <th><center><input type="radio" disabled> </center></th>
                            <th><center>x</th>
                            <th><center></th>
                        </tr>
                    </table>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5 sm:px-20">
                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                        <b><label for="horizontal-form-1" class="form-label "> หมายเหตุ </lable></b>
                    </div>
                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                        <input type="radio" checked> ทักษะที่มีแล้ว
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" disabled> ทักษะที่ต้องการเพิ่มในปีนี้
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        x ทักษะที่ต้องมี
                    </div>
                </div>

                <div class="px-5 mt-10">
                    <!-- <div class="font-medium text-center text-lg">ประวัติการพัฒนาทักษะ</div> -->
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <!-- <h2 class="text-lg font-medium truncate mr-5">รายละเอียดประวัติการพัฒนาทักษะ</h2> -->
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <!-- <a href="{{ url ('user/study/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a> -->
                        </div>
                    </div>
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>สมรรถนะ</center></th>
                                <th><center>ทักษะ/ความรู้</center></th>
                                <th><center>ทักษะย่อย</center></th>
                                <th><center>ระดับ 1</center></th>
                                <th><center>ระดับ 2</center></th>
                                <th><center>ระดับ 3</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>สมรรถนะ1</center></td>
                                <td><center>ทักษะ 1</center></td>
                                <td><center>ทักษะย่อย 1</center></td>
                                <td><center><input type="radio" checked></center></td>
                                <td><center><input type="radio" checked></center></td>
                                <td><center><input type="radio" checked></center></td>
                            </tr>
                            <tr>
                                <td><center>สมรรถนะ2</center></td>
                                <td><center>ทักษะ 1</center></td>
                                <td><center>ทักษะย่อย 2</center></td>
                                <td><center><input type="radio" checked></center></td>
                                <td><center><input type="radio"></center></td>
                                <td><center><input type="radio"></center></td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
                <!-- <button type="button" class="btn btn-primary">สีน้ำเงิน</button>
                <button type="button" class="btn btn-secondary">สีเทา</button> -->
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
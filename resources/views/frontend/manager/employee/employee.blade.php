@extends('layouts.masterManager')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "employee";
$active = "manage";
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
                    <div class="font-medium text-center text-lg">ข้อมูลประวัติและการพัฒนาบุคลากร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                        รายละเอียดข้อมูลประวัติและการพัฒนาบุคลากร
                        </h2>
                    </div>
                    <div class="intro-y block sm:flex items-center h-10">
                        <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                        <select name="" id="">
                            <option value="" hidden>-เลือกแผนก-</option>
                            <option value=""> แผนก 1</option>
                            <option value=""> แผนก 2</option>
                            <option value=""> แผนก 3</option>
                        </select>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <select name="" id="">
                            <option value="" hidden>-เลือกแผนกย่อย-</option>
                            <option value=""> แผนกย่อย 1</option>
                            <option value=""> แผนกย่อย 2</option>
                            <option value=""> แผนกย่อย 3</option>
                        </select>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสพนักงาน</center></th>
                                <th><center>ชื่อ</center></th>
                                <th><center>นามสกุล</center></th>
                                <th><center>แผนก</center></th>
                                <th><center>แผนกย่อย</center></th>
                                <th><center>ตำแหน่งปัจจุบัน</center></th>
                                <th><center>ประวัติ</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>ไก่</center></td>
                                <td><center>กา</center></td>
                                <td><center>แผนก 1 </center></td>
                                <th><center>แผนกย่อย 1</center></th>
                                <td><center>ตำแหน่งปัจจุบัน 1</center></td>
                                <td><center>
                                    <a href="{{url('manager/employee/detail')}}"><button class="btn btn-primary">แสดงประวัติ</button></a>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>เอ</center></td>
                                <td><center>บี</center></td>
                                <td><center>แผนก 2</center></td>
                                <th><center>แผนกย่อย 2</center></th>
                                <td><center>ตำแหน่งปัจจุบัน 2</center></td>
                                <td><center>
                                    <a href="{{url('manager/employee/detail')}}"><button class="btn btn-primary">แสดงประวัติ</button></a>
                                </center></td>
                            </tr>
                        </tbody>
                    </table>
                    <center>
                        <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลประวัติและการพัฒนาบุคลากร (เป็น xlsx) </button>        
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
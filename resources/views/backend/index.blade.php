@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "user";
?>  
@endsection

@section('styles')


@endsection

@section('content')
  <!-- BEGIN: Content -->
  <div class="content">
            <div class="flex items-center mt-8">
               
            </div>
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box py-10 sm:py-20 mt-5">
               
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">ข้อมูลผู้ใช้</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดข้อมูลผู้ใช้
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('adduser')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                                <tr>
                                    <th><center>ลำดับ</center></th>
                                    <th ><center>ชื่อ</center></th>
                                    <th ><center>แผนก</center></th>
                                    <th ><center>รายละเอียด</center></th>
                                    <th><center>จัดการ</center></th>
                                    <th><center>ลำดับ</center></th>
                                    <th ><center>ชื่อ</center></th>
                                    <th ><center>แผนก</center></th>
                                    <th ><center>รายละเอียด</center></th>
                                    <th><center>จัดการ</center></th>
                                    <th><center>ลำดับ</center></th>
                                    <th ><center>ชื่อ</center></th>
                                    <th ><center>แผนก</center></th>
                                    <th ><center>รายละเอียด</center></th>
                                    <th><center>จัดการ</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><center><br>
                                        1
                                    </center></td>
                                    <th ><center><br>
                                        นาย แสนดี ดีดีดี
                                    </center></th>
                                    <th ><center><br>
                                        การตลาด
                                    </center></th>
                                    <th ><center><br>
                                    <a href="{{ url ('user_pageuser')}}"  > <button class="btn btn-success mr-1 mb-2"> รายละเอียด </button></a>
                                    </center></th>
                                    <td><center>
                                        <button type="button" class="btn btn-danger mr-1 mb-2" onclick="del_value(1)"> <i data-lucide="trash" class="w-5 h-5"></i> </button>
                                    </center></td>
                                    <td><center><br>
                                        1
                                    </center></td>
                                    <th ><center><br>
                                        นาย แสนดี ดีดีดี
                                    </center></th>
                                    <th ><center><br>
                                        การตลาด
                                    </center></th>
                                    <th ><center><br>
                                    <a href="{{ url ('user_pageuser')}}"  > <button class="btn btn-success mr-1 mb-2"> รายละเอียด </button></a>
                                    </center></th>
                                    <td><center>
                                        <button type="button" class="btn btn-danger mr-1 mb-2" onclick="del_value(1)"> <i data-lucide="trash" class="w-5 h-5"></i> </button>
                                    </center></td>
                                    <td><center><br>
                                        1
                                    </center></td>
                                    <th ><center><br>
                                        นาย แสนดี ดีดีดี
                                    </center></th>
                                    <th ><center><br>
                                        การตลาด
                                    </center></th>
                                    <th ><center><br>
                                    <a href="{{ url ('user_pageuser')}}"  > <button class="btn btn-success mr-1 mb-2"> รายละเอียด </button></a>
                                    </center></th>
                                    <td><center>
                                        <button type="button" class="btn btn-danger mr-1 mb-2" onclick="del_value(1)"> <i data-lucide="trash" class="w-5 h-5"></i> </button>
                                    </center></td>
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
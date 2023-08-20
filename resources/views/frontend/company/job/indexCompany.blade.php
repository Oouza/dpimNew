@extends('layouts.masterCompany')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "index";
$active = "job";
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
                    <div class="font-medium text-center text-lg">ตั้งค่าตำแหน่งงาน สมรรถนะ และทักษะในองค์กร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดตำแหน่งงาน
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('company/job/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                                <tr>
                                    <th><center>แผนก</center></th>
                                    <th><center>แผนกย่อย</center></th>
                                    <th><center>ตำแหน่ง</center></th>
                                    <th><center>คำอธิบาย</center></th>
                                    <th><center>กลุ่มตำแหน่ง</center></th>
                                    <th><center>ระดับงาน</center></th>
                                    <th><center>ตั้งค่าสมรรถนะและทักษะของตำแหน่งงาน</center></th>
                                    <th><center>สรุปข้อมูลสมรรถนะและทักษะของตำแหน่งงาน</center></th>
                                    <th><center>แก้ไข/ลบ</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><center>แผนก 1</center></td>
                                    <td><center>แผนกย่อย 1</center></td>
                                    <td><center>ตำแหน่ง 1</center></td>
                                    <td><center>คำอธิบาย 1</center></td>
                                    <td><center>กลุ่มตำแหน่ง 1</center></td>
                                    <td><center>ระดับงาน 1</center></td>
                                    <td><center><a href="{{url('company/job/capacity')}}"><button class="btn btn-outline-secondary">ตั้งค่า</button></a></center></td>
                                    <td><center><a href="{{url('company/job/detail')}}"><button type="button" class="btn btn-success"> สรุปข้อมูล </button></a></center></td>
                                    <td><center>
                                        <a href="{{ url ('company/job/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                        <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                    </center></td>
                                </tr>
                                <tr>
                                    <td><center>แผนก 2</center></td>
                                    <td><center>แผนกย่อย 2</center></td>
                                    <td><center>ตำแหน่ง 2</center></td>
                                    <td><center>คำอธิบาย 2</center></td>
                                    <td><center>กลุ่มตำแหน่ง 2</center></td>
                                    <td><center>ระดับงาน 2</center></td>
                                    <td><center><a href="{{url('company/job/capacity')}}"><button class="btn btn-outline-secondary">ตั้งค่า</button></a></center></td>
                                    <td><center><a href="{{url('company/job/detail')}}"><button type="button" class="btn btn-success"> สรุปข้อมูล </button></a></center></td>
                                    <td><center>
                                        <a href="{{ url ('company/job/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                        <button type="button" class="btn btn-danger" onclick="del_value(2)">ลบ</button>
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
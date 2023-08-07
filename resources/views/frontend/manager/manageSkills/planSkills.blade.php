@extends('layouts.masterManager')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "manage";
$active = "planSkills";
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
                    <div class="font-medium text-center text-lg">แผนการพัฒนาบุคลากร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดแผนการพัฒนาบุคลากร
                                    </h2>
                                    <!-- <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('user/study/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div> -->
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>ชื่อ</center></th>
                                <th><center>นามสกุล</center></th>
                                <th><center>ตำแหน่ง</center></th>
                                <th><center>ชื่อหลักสูตร</center></th>
                                <th><center>ผู้จัดการอบรม</center></th>
                                <th><center>ระยะเวลาอบรม</center></th>
                                <th><center>ค่าใช้จ่าย</center></th>
                                <th><center>รายละเอียด</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>ชื่อ1</center></td>
                                <td><center>นามสกุล1</center></td>
                                <td><center>ตำแหน่ง1</center></td>
                                <td><center>ชื่อหลักสูตร1</center></td>
                                <td><center>ผู้จัดการอบรม1</center></td>
                                <td><center>10-07-2023 ถึง 31-07-2023</center></td>
                                <td><center>100</center></td>
                                <td><center>
                                    <a href="{{ url ('manager/plan/skills/detail')}}">
                                        <button class="btn btn-success"> รายละเอียด </button>
                                    </a>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>ชื่อ2</center></td>
                                <td><center>นามสกุล2</center></td>
                                <td><center>ตำแหน่ง2</center></td>
                                <td><center>ชื่อหลักสูตร2</center></td>
                                <td><center>ผู้จัดการอบรม2</center></td>
                                <td><center>01-08-2023 ถึง 31-08-2023</center></td>
                                <td><center>200</center></td>
                                <td><center>
                                    <a href="{{ url ('manager/plan/skills/detail')}}">
                                        <button class="btn btn-success"> รายละเอียด </button>
                                    </a>
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
@extends('layouts.master')
 
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
                    <div class="font-medium text-center text-lg">ข้อมูลกลุ่มตำแหน่งงาน</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดกลุ่มตำแหน่งงาน
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('backend/job/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสกลุ่มตำแหน่ง</center></th>
                                <th><center>กลุ่มตำแหน่ง</center></th>
                                <th><center>คำอธิบาย</center></th>
                                <th><center>ประเภทงาน</center></th>
                                <th><center>ระดับงาน</center></th>
                                <th><center>สมรรถนะ</center></th>
                                <th><center>การตั้งค่า</center></th>
                                <th><center>รายละเอียด</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groupjob as $rs)
                            <tr>
                                <td><center>{{$rs->gj_no}}</center></td>
                                <td><center>{{$rs->gj_name}}</center></td>
                                <td><center>{!! asset($rs->gj_detail )?$rs->gj_detail :''!!}</center></td>
                                <td><center>{{$rs->gj_nametypeJob}}</center></td>
                                <td><center>{{$rs->gj_namelavel}}</center></td>
                                <td><center><a href="{{ url('backend/job/capacity/'.$rs->gj_id) }}"><button class="btn btn-outline-secondary">สมรรถนะ</button></a></center></td>
                                <td><center>
                                    <a href="{{ url('backend/job/edit/'.$rs->gj_id) }}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value({{{$rs->gj_id}}})">ลบ</button>
                                </center></td>
                                <td><center><a href="{{url('backend/job/detail/'.$rs->gj_id)}}"><button type="button" class="btn btn-success"> รายละเอียด </button></a></center></td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td><center>01</center></td>
                                <td><center>กลุ่มตำแหน่ง1</center></td>
                                <td><center>คำอธิบาย1</center></td>
                                <td><center>ประเภทงาน1</center></td>
                                <td><center>ระดับงาน1</center></td>
                                <td><center><a href="{{ url ('backend/job/capacity')}}"><button class="btn btn-outline-secondary">สมรรถนะ</button></a></center></td>
                                <td><center>
                                    <a href="{{ url ('backend/job/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                </center></td>
                                <td><center><a href="{{url('backend/job/detail')}}"><button type="button" class="btn btn-success"> รายละเอียด </button></a></center></td>
                            </tr> -->
                        </tbody>
                    </table>
                        <center>
                            <a href="{{ url('backend/job/pdf') }}">
                                <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลกลุ่มตำแหน่งทั้งหมด (เป็น pdf) </button>
                            </a>            
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
                        url:"{!! url('backend/job/delete/"+id+"') !!}",
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
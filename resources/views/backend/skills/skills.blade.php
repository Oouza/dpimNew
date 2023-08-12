@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "index";
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
                    <div class="font-medium text-center text-lg">ข้อมูลทักษะ</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดทักษะ
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url('backend/skills/form' )}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                        <select name="capacity" id="capacity">
                                            <option value="" hidden>- เลือกกลุ่มสมรรถนะ -</option>
                                            @foreach($capacity as $rs)
                                            <option value="{{$rs->cc_id}}">{{$rs->cc_name}}</option>
                                            @endforeach
                                            <!-- <option value=""> กลุ่มสมรรถนะ 1</option>
                                            <option value=""> กลุ่มสมรรถนะ 2</option>
                                            <option value=""> กลุ่มสมรรถนะ 3</option> -->
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสทักษะ</center></th>
                                <th><center>ชื่อทักษะ</center></th>
                                <th><center>คำอธิบาย</center></th>
                                <th><center>สมรรถนะ</center></th>
                                <th><center>ตั้งค่า</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $rs)
                            <tr>
                                <td><center>{{$rs->s_no}}</center></td>
                                <td><center>{{$rs->s_name}}</center></td>
                                <td><center>{!! asset($rs->s_detail )?$rs->s_detail :''!!}</center></td>
                                <td><center>{{$rs->cc_name}}</center></td>
                                <!-- <td><center></center></td> -->
                                <td><center>
                                    <a href="{{ url ('backend/skills/edit/'.$rs->s_id)}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value({{$rs->s_id}})">ลบ</button>
                                </center></td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td><center>02</center></td>
                                <td><center>ทักษะ2</center></td>
                                <td><center>คำอธิบาย2</center></td>
                                <td><center>สมรรถนะ1</center></td>
                                <td><center>
                                    <a href="{{ url ('backend/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                </center></td>
                            </tr> -->
                        </tbody>
                    </table>
                        <center>
                            <a href="{{ url('backend/skills/export') }}">
                                <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลทักษะทั้งหมด (เป็น xlsx) </button>        
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
                        url:"{!! url('backend/skills/delete/"+id+"') !!}",
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
$(document).ready(function(){
        $('#capacity').select2({
            placeholder: "- เลือกกลุ่มสมรรถนะ -",
            allowClear: true
        });
    });
</script>
@endsection
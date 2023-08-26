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
                    <div class="font-medium text-center text-lg">ตั้งค่าสมรรถนะและทักษะของ{{$gj->p_name}}</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียด{{$gj->p_name}}
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('company/job/capacity/form/'.$gj->sp_id) }}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                                <tr>
                                    <th><center>สมรรถนะ</center></th>
                                    <th><center>คำอธิบาย</center></th>
                                    <th><center>ระดับความจำเป็น</center></th>
                                    <th><center>ทักษะ</center></th>
                                    <th><center>แก้ไข/ลบ</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gjc as $rs)
                                <tr>
                                    <td><center>{{$rs->gjc_id}} {{$rs->cc_name}} @if($rs->FKgjc_userCreate == 0) <br> (พื้นฐาน) @endif</center></td>
                                    <td><center>{!! asset($rs->cc_detail )?$rs->cc_detail :''!!}</center></td>
                                    <th><center>{{$rs->gjc_important}}</center></th>
                                    <td><center><a href="{{url('company/job/skills/'.$rs->gjc_id.'/'.$gj->sp_id)}}"><button class="btn btn-outline-secondary">ทักษะ</button></a></center></td>
                                    <td><center>
                                        @if($rs->FKgjc_userCreate != 0)
                                        <a href="{{ url ('company/job/capacity/edit/'.$rs->gjc_id.'/'.$gj->sp_id)}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                        <button type="button" class="btn btn-danger" onclick="del_value({{$gj->gjc_id}})">ลบ</button>
                                        @endif
                                    </center></td>
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <td><center>สมรรถนะ 2</center></td>
                                    <td><center>คำอธิบาย</center></td>
                                    <td><center><a href="{{url('company/job/skills')}}"><button class="btn btn-outline-secondary">ทักษะ</button></a></center></td>
                                    <td><center>
                                        <a href="{{ url ('company/job/capacity/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                        <button type="button" class="btn btn-danger" onclick="del_value(2)">ลบ</button>
                                    </center></td>
                                </tr>
                                <tr>
                                    <td><center>สมรรถนะ 3 (พื้นฐาน)</center></td>
                                    <td><center>คำอธิบาย</center></td>
                                    <td><center><a href="{{url('company/job/skills')}}"><button class="btn btn-outline-secondary">ทักษะ</button></a></center></td>
                                    <td><center>
                                    </center></td>
                                </tr>
                                <tr>
                                    <td><center>สมรรถนะ 4 (พื้นฐาน)</center></td>
                                    <td><center>คำอธิบาย</center></td>
                                    <td><center><a href="{{url('company/job/skills')}}"><button class="btn btn-outline-secondary">ทักษะ</button></a></center></td>
                                    <td><center>
                                    </center></td>
                                </tr> -->
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
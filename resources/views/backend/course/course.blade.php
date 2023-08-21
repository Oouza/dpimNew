@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "course";
$active = "totalCourse";
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
                    <div class="font-medium text-center text-lg">ข้อมูลหลักสูตรพัฒนาบุคลากร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดหลักสูตรพัฒนาบุคลากร
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('backend/course/form') }}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                                    <!-- <br> -->
                                    <select name="skills" id="skills" class="form-control select2">
                                        <!-- <option value="" hidden>- เลือกทักษะ -</option> -->
                                        @foreach($skills as $row)
                                        <option value="" >ทักษะทั้งหมด</option>
                                        <option value="{{$row->s_id}}" disabled>{{$row->s_no}} {{$row->s_name}}</option>
                                            @foreach($skillsSubs as $rs)
                                            @if($rs->FKss_skills == $row->s_id)
                                            <option value="{{$rs->ss_id}}">&nbsp;&nbsp;&nbsp;{{$rs->ss_no}} {{$rs->ss_name}}</option>
                                            @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <!-- &nbsp; &nbsp; &nbsp; &nbsp; -->
                                    <!-- <br> -->
                                    <select name="course" id="course" class="form-control select2">
                                        <!-- <option value="" hidden>- เลือกประเภทหลักสูตร -</option> -->
                                        @foreach($typeCourse as $rs)
                                        <option value="" >ประเภทหลักสูตรทั้งหมด</option>
                                        <option value="{{$rs->tc_id}}">{{$rs->tc_no}} {{$rs->tc_name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- &nbsp; &nbsp; &nbsp; &nbsp; -->
                                    <!-- <br> -->
                                    <select name="people" id="people" class="form-control select2">
                                        <!-- <option value="" hidden>- เลือกผู้จัด -</option> -->
                                        <option value="" >ผู้จัดทั้งหมด</option>
                                        @foreach($pp as $rs)
                                        <option value="{{$rs->cou_organizer}}">{{$rs->cou_organizer}}</option>
                                        @endforeach
                                        <!-- <option value=""> ผู้จัด 1</option>
                                        <option value=""> ผู้จัด 2</option>
                                        <option value=""> ผู้จัด 3</option> -->
                                    </select>
                                    <!-- &nbsp; &nbsp; &nbsp; &nbsp; -->
                                    <!-- <br> -->
                                    <select name="time" id="time" class="form-control select2">
                                        <!-- <option value="" hidden>- เลือกระยะเวลา -</option> -->
                                        <option value="" >ระยะเวลาทั้งหมด</option>
                                        @foreach($time as $rs)
                                        <option value="{{$rs->cou_period}}">{{$rs->cou_period}} ชม.</option>
                                        @endforeach
                                        <!-- <option value=""> ระยะเวลา 1</option>
                                        <option value=""> ระยะเวลา 2</option>
                                        <option value=""> ระยะเวลา 3</option> -->
                                    </select>
                                </div>
                                <br>
                                <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสหลักสูตร</center></th>
                                <th><center>ชื่อหลักสูตร</center></th>
                                <th><center>ผู้จัด</center></th>
                                <th><center>ระยะเวลาการอบรม (ชั่วโมง)</center></th>
                                <th><center>ประเภทหลักสูตร</center></th>
                                <th><center>ความถี่</center></th>
                                <!-- <th><center>คำอธิบาย</center></th> -->
                                <th><center>ผู้เพิ่มข้อมูล</center></th>
                                <th><center>ตั้งค่า</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course as $rs)
                            <tr>
                                <td><center>{{$rs->cou_no}}</center></td>
                                <td><center>{{$rs->cou_name}}</center></td>
                                <td><center>{{$rs->cou_organizer}}</center></td>
                                <td><center>{{$rs->cou_period}}</center></td>
                                <td><center>{{$rs->tc_name}}</center></td>
                                <td><center>{{$rs->cou_frequency}}</center></td>
                                <!-- <td><center>{!! asset($rs->cou_detail )?$rs->cou_detail :''!!}</center></td> -->
                                <td><center>
                                    @if($rs->FKcou_userCreate == 0)
                                        กพร.
                                    @endif
                                </center></td>
                                <td><center>
                                    <a href="{{ url ('backend/course/edit/'.$rs->cou_id)}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value({{$rs->cou_id}})">ลบ</button>
                                </center></td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td><center>02</center></td>
                                <td><center>หลักสูตร2</center></td>
                                <td><center>ผู้จัด2</center></td>
                                <td><center>2</center></td>
                                <td><center>ประเภทหลักสูตร2</center></td>
                                <td><center>2 เดือน/ครั้ง</center></td>
                                <td><center>คำอธิบาย 2</center></td>
                                <td><center>สถานประกอบการ</center></td>
                                <td><center>
                                    <a href="{{ url ('backend/course/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(2)">ลบ</button>
                                </center></td>
                            </tr> -->
                        </tbody>
                    
                    </table>
                        <center>
                            <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลหลักสูตรพัฒนาบุคลากรทั้งหมด (เป็น xlsx) </button>        
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
                        url:"{!! url('backend/course/delete/"+id+"') !!}",
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
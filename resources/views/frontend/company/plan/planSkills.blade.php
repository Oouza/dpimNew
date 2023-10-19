@extends('layouts.masterCompany')
 
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
                    <div class="font-medium text-center text-lg">การกำหนดและติดตามการพัฒนาบุคลากรตามแผน</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดการกำหนดและติดตามการพัฒนาบุคลากรตามแผน
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('company/plan/skills/form') }}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสพนักงาน</center></th>
                                <th><center>ชื่อ</center></th>
                                <th><center>นามสกุล</center></th>
                                <th><center>กลุ่มตำแหน่ง</center></th>
                                <!-- <th><center>ช่วงเวลา</center></th> -->
                                <th><center>รหัสหลักสูตร</center></th>
                                <th><center>ชื่อหลักสูตร</center></th>
                                <!-- <th><center>ผู้จัดการอบรม</center></th> -->
                                <th><center>ระยะเวลาอบรม (ชั่วโมง)</center></th>
                                <th><center>ค่าใช้จ่าย (บาท)</center></th>
                                <th><center>การดำเนินการ</center></th>
                                <th><center>จัดการรายการ</center></th>
                            </tr>
                        </thead>
                        @php $now = new DateTime(); @endphp
                        <tbody>
                        @foreach($plan as $rs)
                            @if($rs->plans_dateend > $now && $rs->plans_status == 1)
                            <tr style="color:red">
                            @else
                            <tr>
                            @endif
                                <td><center>{{$rs->e_employeeNo}}</center></td>
                                <td><center>{{$rs->e_fname}}</center></td>
                                <td><center>{{$rs->e_lname}}</center></td>
                                <td><center>{{$rs->gj_name}}</center></td>
                                <td><center>{{$rs->cou_no}}</center></td>
                                <td><center>{{$rs->cou_name}}</center></td>
                                <td><center>{{$rs->cou_period}}</center></td>
                                <td><center>{{$rs->plans_moneycouser + $rs->plans_moneyother}} บาท</center></td>
                                <td><center>
                                    @if($rs->plans_status == 2)
                                        @if(empty($rs->plans_note))
                                            <button type="button" class="btn btn-secondary"> รอยืนยัน </button>
                                        @else
                                            <button type="button" class="btn btn-secondary"> แก้ไข </button>
                                        @endif
                                    @elseif($rs->plans_status == 1)
                                        <button class="btn btn-primary"> ยังไม่ดำเนินการ </button>
                                    @else
                                        <button class="btn btn-success"> ดำเนินการแล้ว </button>
                                    @endif
                                </center></td>
                                <td><center>
                                    <a href="{{ url ('company/plan/skills/edit/'.$rs->plans_id)}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value({{$rs->plans_id}})">ลบ</button>
                                </center></td>
                            </tr>
                            <!-- <tr>
                                <td><center>002</center></td>
                                <td><center>เอ</center></td>
                                <td><center>บี</center></td>
                                <td><center>กลุ่มตำแหน่ง 2</center></td>
                                <td><center>002</center></td>
                                <td><center>หลัดสูตร 2</center></td>
                                <td><center>3 </center></td>
                                <td><center>200</center></td>
                                <td><center>
                                        <button type="button" class="btn btn-secondary"> รอยืนยัน </button>
                                </center></td>
                                <td><center>
                                    <a href="{{ url ('company/plan/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>002</center></td>
                                <td><center>เอ</center></td>
                                <td><center>บี</center></td>
                                <td><center>กลุ่มตำแหน่ง 2</center></td>
                                <td><center>002</center></td>
                                <td><center>หลัดสูตร 2</center></td>
                                <td><center>3 </center></td>
                                <td><center>500</center></td>
                                <td><center>
                                    <button class="btn btn-success"> ดำเนินการแล้ว </button>
                                </center></td>
                                <td><center>
                                    <a href="{{ url ('company/plan/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                </center></td>
                            </tr> -->
                        @endforeach
                        </tbody>
                    </table>
                        <!-- <center>
                            <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลแผนกทั้งหมด (เป็น xlsx) </button>        
                        </center> -->
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
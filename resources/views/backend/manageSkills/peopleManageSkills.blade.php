@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "people";
$active = "peopleSkills";
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
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดข้อมูลการพัฒนาบุคลากร
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('backend/people/manageskills/form') }}"><button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    <a href="{{ url ('backend/people/manageskills/file') }}"  >   <button class="btn btn-elevated-secondary mr-1 mb-2">เพิ่มไฟล์ข้อมูล</button></a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                                </div>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <select name="coures" id="coures" class="select2" onchange="searchTrain()">
                                        <option value="" > หลักสูตรอบรมทั้งหมด </option>
                                        @foreach($course as $rs)
                                        <option value="{{$rs->cou_id}}" @if((!empty($s_coures)) && ($s_coures == $rs->cou_id)) selected @endif>{{$rs->cou_no}} {{$rs->cou_name}}</option>
                                        @endforeach
                                        <!-- <option value=""> หลักสูตรอบรม 2</option>
                                        <option value=""> หลักสูตรอบรม 3</option> -->
                                    </select>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <select name="GJ" id="GJ" class="select2" onchange="searchTrain()">
                                        <option value="" hidden> กลุ่มตำแหน่งทั้งหมด </option>
                                        @foreach($groupJob as $rs)
                                        <option value="{{$rs->gj_id}}" @if((!empty($s_gj)) && ($s_gj == $rs->gj_id)) selected @endif>{{$rs->gj_no}} {{$rs->gj_name}}</option>
                                        @endforeach
                                        <!-- <option value=""> กลุ่มตำแหน่ง 2</option>
                                        <option value=""> กลุ่มตำแหน่ง 3</option> -->
                                    </select>
                                </div>
                                <br>
                                <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>คำนำหน้า</center></th>
                                <th><center>ชื่อ</center></th>
                                <th><center>นามสกุล</center></th>
                                <th><center>อีเมล</center></th>
                                <th><center>หลักสูตรอบมรม</center></th>
                                <th><center>วันที่อบมรม</center></th>
                                <th><center>รายละเอียด</center></th>
                                <th><center>การแก้ไข/ลบข้อมูล</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($training as $rs)
                            <tr>
                                <td><center>{{$rs->e_title}}</center></td>
                                <td><center>{{$rs->e_fname}}</center></td>
                                <td><center>{{$rs->e_lname}}</center></td>
                                <td><center>{{$rs->email}}</center></td>
                                <td><center>{{$rs->cou_name}}</center></td>
                                <td><center>{{ date('d-m-Y', strtotime($rs->tn_dateTrain)) }}</center></td>
                                <td><center>
                                    <a href="{{ url ('backend/people/manageskills/detail/'.$rs->tn_id)}}"><button type="button" class="btn btn-success">แสดงรายละเอียด</button></a>
                                </center></td>
                                <td><center>
                                    <a href="{{ url ('backend/people/manageskills/edit/'.$rs->tn_id)}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value({{$rs->tn_id}})">ลบ</button>
                                </center></td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                        <center>
                            <a href="{{ url('backend/people/manageskills/download') }}">
                                <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลการพัฒนาบุคลากรทั้งหมด (เป็น xlsx) </button>        
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
function searchTrain() {
    var coures = $('#coures').val();
    var GJ = $('#GJ').val();
    if(coures == '' && GJ == ''){
        var url = '{!! route('training') !!}';
        window.location.href = url;

    }else{
        var data = {
            data: null,
            coures: coures,
            GJ: GJ,
            _token: '{{ csrf_token() }}'
        };
        var params = $.param(data);

        var url = '{{ route('resultTraining', ['data' => '']) }}' +  params;

        window.location.href = url;
    }
    
}
</script>

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
                        url:"{!! url('backend/people/manageskills/delete/"+id+"') !!}",
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
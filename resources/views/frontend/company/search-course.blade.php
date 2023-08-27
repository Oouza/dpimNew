@extends('layouts.masterCompany')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "searchCourse";
$active = "";
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
                    <div class="font-medium text-center text-lg">ข้อมูลหลักสูตร</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดข้อมูลหลักสูตร
                                    </h2>
                                </div>
                                    <br>
                                    <div class="intro-y block sm:flex items-center h-10">
                                        <h3 class="text-lg font-medium truncate mr-5">ค้นหาโดย</h3>
                                    <!-- </div>
                                    <div class="intro-y block sm:flex items-center h-10"> -->
                                        <select name="skills" id="skills" class="form-control select2" onchange="searchCourse()">
                                            <option value="" >ทักษะทั้งหมด</option>
                                            @foreach($skills as $row)
                                            <option value="{{$row->s_id}}" disabled>{{$row->s_no}} {{$row->s_name}}</option>
                                                @foreach($skillsSubs as $rs)
                                                @if($rs->FKss_skills == $row->s_id)
                                                <option @if(!empty($Sskills) && $Sskills == $rs->ss_id) selected @endif value="{{$rs->ss_id}}">&nbsp;&nbsp;&nbsp;{{$rs->ss_no}} {{$rs->ss_name}}</option>
                                                @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <select name="course" id="course" class="form-control select2" onchange="searchCourse()">
                                            <option value="" >ประเภทหลักสูตรทั้งหมด</option>
                                            @foreach($typeCourse as $rs)
                                            <option @if(!empty($type) && $type == $rs->tc_id) selected @endif value="{{$rs->tc_id}}">{{$rs->tc_no}} {{$rs->tc_name}}</option>
                                            @endforeach
                                        </select>
                                        <select name="people" id="people" class="form-control select2" onchange="searchCourse()">
                                            <option value="" >ผู้จัดทั้งหมด</option>
                                            @foreach($pp as $rs)
                                            <option @if(!empty($people) && $people == $rs->cou_organizer) selected @endif value="{{$rs->cou_organizer}}">{{$rs->cou_organizer}}</option>
                                            @endforeach
                                        </select>
                                        <select name="time" id="time" class="form-control select2" onchange="searchCourse()">
                                            <option value="" >ระยะเวลาทั้งหมด</option>
                                            @foreach($time as $rs)
                                            <option @if(!empty($Stime) && $Stime == $rs->cou_period) selected @endif value="{{$rs->cou_period}}">{{$rs->cou_period}} ชม.</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสหลักสูตร </center></th>
                                <th><center>ชื่อหลักสูตร </center></th>
                                <th><center>ผู้จัด</center></th>
                                <th><center>ประเภทหลักสูตร</center></th>
                                <th><center>ระยะเวลาการอบรม (จำนวนวัน)</center></th>
                                <th><center>รายละเอียด</center></th>
                                <!-- <th><center>สมรรถนะ</center></th> -->
                                <th><center>ทักษะ</center></th>
                                <!-- <th><center>ทักษะย่อย</center></th> -->
                                <th><center>หมายเหตุ</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course as $rs)
                            <tr>
                                <td><center>{{$rs->cou_no}}</center></td>
                                <td><center>{{$rs->cou_name}}</center></td>
                                <td><center>{{$rs->cou_organizer}}</center></td>
                                <td><center>{{$rs->tc_name}}</center></td>
                                <td><center>{{$rs->cou_period}}</center></td>
                                <td><center>{!! asset($rs->cou_detail )?$rs->cou_detail :''!!}</center></td>
                                <!-- <td><center>สมรรถนะ 1</center></td> -->
                                <td><center>
                                    @php $i=1; @endphp
                                    @foreach($courseSkills as $row)
                                        @if($row->FKcs_course == $rs->cou_id)
                                            {{$i++}}. {{$row->ss_name}} {{$row->cs_id}}<br>
                                        @endif
                                    @endforeach
                                </center></td>
                                <!-- <td><center>ทักษะย่อย 1</center></td> -->
                                <td><center>{!! asset($rs->cou_note )?$rs->cou_note :''!!}</center></td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td><center>002</center></td>
                                <td><center>ชื่อหลักสูตร 2</center></td>
                                <td><center>ผู้จัด 2</center></td>
                                <td><center>5</center></td>
                                <td><center>รายละเอียด 2</center></td>
                                <td><center>สมรรถนะ 2</center></td>
                                <td><center>ทักษะ 2</center></td>
                                <td><center>ทักษะย่อย 2</center></td>
                                <td><center>ระดับ 2</center></td>
                                <td><center>หมายเหตุ 2</center></td>
                            </tr> -->
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
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

<script>
    function searchCourse() {
        var skills = $('#skills').val();
        var course = $('#course').val();
        var people = $('#people').val();
        var time = $('#time').val();
        if(skills == '' && course == '' && people == '' && time == ''){
            var url = '{!! route('hrCourse') !!}';
            window.location.href = url;

        }else{
            var data = {
            data: null,
            skills: skills,
            course: course,
            people: people,
            time: time,
            _token: '{{ csrf_token() }}'
        };
        var params = $.param(data);

        var url = '{{ route('resultHrCourse', ['data' => '']) }}' +  params;

        window.location.href = url;
        }
        
    }
</script>
@endsection
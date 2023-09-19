@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "scoreboard";
$active = "sPeople";
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
                    <div class="font-medium text-center text-lg">สรุปการใช้งานเว็บแอปพลิเคชั่น</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <!-- <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดหลักสูตรพัฒนาบุคลากร
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('backend/course/form') }}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div> -->
                                <br>
                                <br>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h3 class="text-lg font-medium truncate mr-5">เรียกดูตาม</h3>
                                    <select name="skills" id="skills" style="width: 30%;" class="form-control select2" onchange="">
                                        <option value=""> ปีทั้งหมด  </option>
                                        <option value=""> 2566 </option>
                                        <option value=""> 2565 </option>
                                        <option value=""> 2564 </option>
                                    </select>
                                </div>
                                <div class="intro-y block sm:flex items-center h-10">
                                    
                                    <!-- <select name="course" id="course" class="form-control select2" onchange="">
                                        <option value=""> ประเภทสถานประกอบการทั้งหมด </option>
                                        <option value="เหมืองแร่">เหมืองแร่</option>
                                        <option value="โรงโม่หิน">โรงโม่หิน</option>
                                        <option value="โรงแต่งแร่">โรงแต่งแร่</option>
                                        <option value="โรงประกอบโลหกรรม">โรงประกอบโลหกรรม</option>
                                        <option value="ผู้รับเหมาเหมืองแร่">ผู้รับเหมาเหมืองแร่</option>
                                        <option value="อื่นๆ">อื่นๆ</option>
                                        <option value="อิสระ">อิสระ</option>
                                    </select> -->
                                </div>
                                <br>
                                <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>ลำดับ</center></th>
                                <!-- <th><center>วันที่</center></th>
                                <th><center>เวลา</center></th> -->
                                <th><center>เมนูที่เข้าใช้งาน</center></th>
                                <th><center>ประเภทผู้ใช้งาน</center></th>
                                <th><center>จำนวนผู้เข้าใช้งาน</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>1</center></td>
                                <!-- <td><center>10/10/2566</center></td>
                                <td><center>10.00</center></td> -->
                                <td><center>เมนู1</center></td>
                                <td><center>บุคลากร</center></td>
                                <td><center>10 คน</center></td>
                            </tr>
                            <tr>
                                <td><center>2</center></td>
                                <!-- <td><center>10/10/2566</center></td>
                                <td><center>09.30</center></td> -->
                                <td><center>เมนู2</center></td>
                                <td><center>HR</center></td>
                                <td><center>3 คน</center></td>
                            </tr>
                            <tr>
                                <td><center>3</center></td>
                                <!-- <td><center>10/10/2566</center></td>
                                <td><center>09.30</center></td> -->
                                <td><center>เมนู3</center></td>
                                <td><center>ผู้บริหาร</center></td>
                                <td><center>3 คน</center></td>
                            </tr>
                        </tbody>
                    
                    </table>
                        <center>
                            <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลการใช้งานเว็บแอปพลิเคชั่นทั้งหมด (เป็น xlsx) </button>        
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

<script>
function searchCourse() {
    var skills = $('#skills').val();
    var course = $('#course').val();
    var people = $('#people').val();
    var time = $('#time').val();
    if(skills == '' && course == '' && people == '' && time == ''){
        var url = '{!! route('adminCourse') !!}';
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

    var url = '{{ route('resultCourse', ['data' => '']) }}' +  params;

    window.location.href = url;
    }
    
}

</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection
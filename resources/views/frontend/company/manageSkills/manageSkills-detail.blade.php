<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  <!-- delete -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@extends('layouts.masterCompany')
<?php
$activePage = "manage";
$active = "userSkills";
?>
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')
</head>
<body>

@section('styles_link')
   
@endsection

@section('styles')


@endsection

@section('content')
  <!-- BEGIN: Content -->
  <div class="content">
            <div class="flex items-center mt-8">
               
            </div>
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box py-10 sm:py-20 mt-5">
               
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">ข้อมูลสมรรถนะ ทักษะ และเป้าหมายการพัฒนารายบุคคล</div>
                   
                </div>
                <form action="{{ url('company/manage/skills/add/'.$id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            หมายเลขพนักงาน
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$employee->e_employeeNo}}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ชื่อ - นามสกุล
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$employee->e_title}} {{$employee->e_fname}} {{$employee->e_lname}}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แผนก
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$employee->d_name}}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            แผนกย่อย
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$employee->ds_name}}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$employee->p_name}}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            กลุ่มตำแหน่ง
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            {{$employee->gj_name}}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            ปี
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="year" id="year" class="form-control select2" onchange="searchGoals()">
                                @php
                                    use Carbon\Carbon;
                                    $dateTime = Carbon::now();
                                    $formattedDate = $dateTime->format('Y');
                                    $date = $dateTime->format('Y')+5;
                                @endphp
                                @for($formattedDate; $formattedDate<=$date; $formattedDate++)
                                <option value="{{$formattedDate}}" @if(!empty($year) && ($year == $formattedDate)) selected @endif>{{$formattedDate+543}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="{{$id}}" name="idUser" id="idUser">
                    <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <tr>
                            <th><center>สมรรถนะ</center></th>
                            <th><center>ทักษะ/ความรู้</center></th>
                            <th><center>ทักษะย่อย</center></th>
                            <th><center>ระดับ 1</center></th>
                            <th><center>ระดับ 2</center></th>
                            <th><center>ระดับ 3</center></th>
                        </tr>
                        @php 
                            $capacity = "";
                            $skills = "";
                        @endphp
                        @foreach($gjSub as $rs)
                        <tr>
                            <td><center>
                                @if($capacity != $rs->cc_name) 
                                    {{$rs->cc_name}}
                                    @if($rs->FKgjc_userCreate == 0)
                                        <br> (พื้นฐาน)
                                    @endif
                                    @php 
                                        $capacity = $rs->cc_name;
                                    @endphp
                                @endif
                            </center></td>
                            <td><center>
                                @if($skills != $rs->s_name) 
                                    {{$rs->s_name}}
                                    @if($rs->FKgjs_userCreate == 0)
                                        <br> (พื้นฐาน)
                                    @endif
                                    @php 
                                        $skills = $rs->s_name;
                                    @endphp
                                @endif
                            </center></td>
                            <td><center>
                                {{$rs->ss_name}}
                                @if($rs->FKgjss_userCreate == 0)
                                    <br> (พื้นฐาน)
                                @endif
                            </center></td>
                            
                            <td><center>
                                @foreach($goals as $row)
                                    @if($row->FKgoals_skillsSub == $rs->gjss_id && $row->goals_status == '1')
                                        <input type="radio" disabled>
                                    @elseif($row->FKgoals_skillsSub == $rs->gjss_id && $row->goals_status == '2')
                                        <input type="radio" checked>
                                    @endif
                                @endforeach
                            </center></td>
                            <td><center>
                                @foreach($goals as $row)
                                    @if($row->FKgoals_skillsSub == $rs->gjss_id && $row->goals_status == '1')
                                        <input type="radio" disabled>
                                    @elseif($row->FKgoals_skillsSub == $rs->gjss_id && $row->goals_status == '2')
                                        <input type="radio" checked>
                                    @endif
                                @endforeach
                            </center></td>
                            <td><center>
                                @foreach($goals as $row)
                                    @if($row->FKgoals_skillsSub == $rs->gjss_id && $row->goals_status == '1')
                                        <input type="radio" disabled>
                                    @elseif($row->FKgoals_skillsSub == $rs->gjss_id && $row->goals_status == '2')
                                        <input type="radio" checked>
                                    @endif
                                @endforeach
                            </center></td>
                            
                        </tr>
                        @endforeach
                    </table>
                    <br>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($goals as $row)
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                            <b><label for="horizontal-form-1" class="form-label "> เป้าหมายการพัฒนาทักษะ {{$i}} </label></b> 
                        </div>
                        <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                            <select name="goals[{{$i}}]" id="goals[{{$i}}]" class="form-control select2" required>
                                <option value="" hidden>-กรุณาเลือกเป้าหมายการพัฒนาทักษะ-</option>
                                @php
                                    $skills = "";
                                @endphp
                                @foreach($gjSub as $rs)
                                    @if($skills != $rs->s_name)
                                        <option value="{{$rs->gjs_id}}" disabled>{{$rs->s_name}} @if($rs->FKgjs_userCreate == 0) (พื้นฐาน) @endif</option>
                                        @php
                                            $skills = $rs->s_name;
                                        @endphp
                                    @endif
                                    <option value="{{$rs->gjss_id}}" @if($row->FKgoals_skillsSub == $rs->gjss_id) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;{{$rs->ss_name}} @if($rs->FKgjss_userCreate == 0) (พื้นฐาน) @endif</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="goalsId[{{$i}}]" value="{{$row->goals_id}}">
                        <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_goals({{$row->goals_id}})">ลบ</button>
                    </div>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                    <input type="hidden" name="num" id="num" value="{{$i}}">
                    <br>
                    <div id="form-container"></div>
                    <div> <button id="add-form-btn" type="button" class="btn btn-outline-secondary btn200 rounded-10">เพิ่มเป้าหมายการพัฒนาทักษะ</button> </div>
                </div>

                            </div>
                            </div>
                           <!-- <br><br><br> -->
                            <center>
                                <a href="{{url('company/manage/skills')}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <!-- <a href="#" class="btn btn-primary w-50">ส่งออกเป็น xls</a>ดาวน์โหลดข้อมูลแผนกทั้งหมด (เป็น xlsx) -->
                                <a href="#" class="btn btn-primary w-50">ดาวน์โหลด (เป็น pdf)</a>
                                <a href="#" class="btn btn-secondary w-50">ดาวน์โหลด (เป็น xlsx)</a>
                                <!-- <a href="#" class="btn btn-success w-50">บันทึก</a> -->
                                <button type="submit" class="btn btn-success w-50">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    function searchGoals(){
        // alert('asd');
        var year = $('#year').val();
        var idUser = $('#idUser').val();
        // alert($idUser);
        if(year == '{{ \Carbon\Carbon::now()->year }}'){
            var url = 'company/manage/skills/detail/' + idUser;
            window.location.href = url;
        }else{
            var data = {
                data: null,
                year: year,
                idUser: idUser,
                _token: '{{ csrf_token() }}'
            };
            var params = $.param(data);
            var url = '{{ route('resultManageSkillsDetail', ['data' => '']) }}' +  params;
            window.location.href = url;
        }
    }
</script>

<script>
    const formContainer = document.getElementById("form-container");
    const addFormBtn = document.getElementById("add-form-btn");
    // var formCount = document.getElementById("num");
    var num = document.getElementById("num").value-1;

    // alert($formCount);
    let formCount = 0;

    addFormBtn.addEventListener("click", function() {
        // ตรวจสอบว่า formCount น้อยกว่า 5 ก่อนที่จะสร้างแบบฟอร์มใหม่
        if (num < 5) {
            num++;
            formCount++;
            const div = document.createElement("div");
            div.setAttribute("id", `study${formCount}`);
            div.innerHTML = `
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                    <b><label for="horizontal-form-1" class="form-label "> เป้าหมายการพัฒนาทักษะ ${num} </label></b> 
                </div>
                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                    <select name="job_type[${formCount}]" id="job_type[${formCount}]" class="form-control select2" required>
                        <option value="" hidden>-กรุณาเลือกเป้าหมายการพัฒนาทักษะ-</option>
                        @php
                            $skills = "";
                        @endphp
                        @foreach($gjSub as $rs)
                            @if($skills != $rs->s_name)
                                <option value="{{$rs->gjs_id}}" disabled>{{$rs->s_name}} @if($rs->FKgjs_userCreate == 0) (พื้นฐาน) @endif</option>
                                @php
                                    $skills = $rs->s_name;
                                @endphp
                            @endif
                            <option value="{{$rs->gjss_id}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$rs->ss_name}} @if($rs->FKgjss_userCreate == 0) (พื้นฐาน) @endif</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn py-0 px-2 btn-outline-secondary" type="button" onclick="del_study(${formCount})">ลบ</button>
            </div>
            <div id="form-container-skills(${formCount})"></div>
            `;
            formContainer.appendChild(div);
            
            // หาก formCount มากกว่าหรือเท่ากับ 5 ให้ปิดปุ่ม "เพิ่ม"
            if (num >= 5) {
                addFormBtn.disabled = true;
            }

            $(document).ready(function(){
                $(`#job_type\\[${formCount}\\]`).select2({
                    placeholder: "- กรุณาเลือกเป้าหมายการพัฒนาทักษะ -",
                    allowClear: true
                });
            });
        }
    });

    function del_study(num){
        const div = document.getElementById(`study${num}`);
        if (div) {
            if (confirm(`Are you sure you want to delete ?`)) {
            formContainer.removeChild(div);
            formCount--;
            }
        }
    }  

</script>

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
function del_goals(id) {
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
                        url:"{!! url('company/manage/skills/delete/"+id+"') !!}",
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





</body>
</html>
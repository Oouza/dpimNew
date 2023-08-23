@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "company";
$active = "manage";
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
                    <div class="font-medium text-center text-lg">ข้อมูลสถานประกอบการ</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดข้อมูลสถานประกอบการ
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('backend/company/form') }}"><button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    <a href="{{ url ('backend/company/file') }}"  >   <button class="btn btn-elevated-secondary mr-1 mb-2">เพิ่มไฟล์ข้อมูล</button></a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                                    <select name="typeCompany" id="typeCompany" class="select2" onchange="searchCompany()">
                                        <!-- <option value="" hidden>- เลือกประเภทสถานประกอบการ -</option> -->
                                        <option value=""> ประเภทสถานประกอบการทั้งหมด </option>
                                        <option @if(!empty($typeCompany) && $typeCompany == "เหมืองแร่") selected @endif value="เหมืองแร่"> เหมืองแร่ </option>
                                        <option @if(!empty($typeCompany) && $typeCompany == "โรงโม่หิน") selected @endif value="โรงโม่หิน"> โรงโม่หิน </option>
                                        <option @if(!empty($typeCompany) && $typeCompany == "โรงแต่งแร่") selected @endif value="โรงแต่งแร่"> โรงแต่งแร่ </option>
                                        <option @if(!empty($typeCompany) && $typeCompany == "โรงประกอบโลหกรรม") selected @endif value="โรงประกอบโลหกรรม"> โรงประกอบโลหกรรม </option>
                                        <option @if(!empty($typeCompany) && $typeCompany == "ผู้รับเหมางานเหมืองแร่") selected @endif value="ผู้รับเหมางานเหมืองแร่"> ผู้รับเหมาเหมืองแร่ </option>
                                        <option @if(!empty($typeCompany) && $typeCompany == "อื่นๆ") selected @endif value="อื่นๆ"> อื่นๆ </option>
                                    </select>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <select name="mineral" id="mineral" class="select2" onchange="searchCompany()">
                                        <!-- <option value="" hidden>- เลือกชนิดแร่ -</option> -->
                                        <option value=""> ชนิดแร่ทั้งหมด </option>
                                        @foreach($mineral as $rs)
                                        <option @if(!empty($Smineral) && $Smineral == $rs->tm_id) selected @endif value="{{$rs->tm_id}}"> {{$rs->tm_name}} </option>
                                        @endforeach
                                        <!-- <option value=""> ประเภทแร่ 3</option> -->
                                    </select>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <select name="provinces" id="provinces" class="select2" onchange="searchCompany()">
                                        <!-- <option value="" hidden>- เลือกจังหวัด -</option> -->
                                        <option value=""> จังหวัดทั้งหมด </option>
                                        @foreach($provinces as $rs)
                                        <option @if(!empty($Sprovinces) && $Sprovinces == $rs->id) selected @endif value="{{$rs->id}}"> {{$rs->name_th}} </option>
                                        @endforeach
                                        <!-- <option value=""> จังหวัด 3</option> -->
                                    </select>
                                </div>
                                <br>
                                <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>เลขที่หมายเลขประทานบัตร/ใบอนุญาต</center></th>
                                <th><center>ชื่อสถานประกอบการ</center></th>
                                <th><center>ประเภทสถานประกอบการ</center></th>
                                <th><center>ชนิดแร่หลัก</center></th>
                                <th><center>จังหวัด</center></th>
                                <th><center>ข้อมูลผู้ติดต่อ</center></th>
                                <th><center>สถานะ</center></th>
                                <th><center>จัดการข้อมูล</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $rs)
                            <tr>
                                <td><center>{{$rs->c_licenseNo}}</center></td>
                                <td><center>{{$rs->c_nameCompany}}</center></td>
                                <td><center>{{$rs->c_typeCompany}}</center></td>
                                <td><center>{{$rs->c_nameTypeMineral}}</center></td>
                                <td><center>{{$rs->name_th}}</center></td>
                                <td><center>{{$rs->name}} <br> {{$rs->email}}</center></td>
                                <td><center>{{$rs->ch_position}}</center></td>
                                <!-- <td><center><a href="{{ url ('backend/company/detail')}}"  >  <button type="button" class="btn btn-success"  >รายละเอียด</button></a></center></td> -->
                                <td><center>
                                    <a href="{{ url ('backend/company/edit/'.$rs->FKch_userid)}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value({{$rs->FKch_userid}})">ลบ</button>
                                </center></td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td><center>02</center></td>
                                <td><center>โรงแต่งแร่</center></td>
                                <td><center>001/544</center></td>
                                <td><center>โรงแต่งแร่</center></td>
                                <td><center>เหล็ก</center></td>
                                <td><center>กรุงเทพ</center></td>
                                <td><center>นาย ไก่ ขัน gmail@gmail.com</center></td>
                                <td><center>HR</center></td>
                                <td><center>
                                    <a href="{{ url ('backend/company/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(2)">ลบ</button>
                                </center></td>
                            </tr> -->
                        </tbody>
                    
                    </table>
                        <center>
                            <button type="button" class="btn btn-secondary w-26 ml-2"> ดาวน์โหลดข้อมูลสถานประกอบการทั้งหมด (เป็น xlsx) </button>        
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
function searchCompany() {
    var typeCompany = $('#typeCompany').val();
    var mineral = $('#mineral').val();
    var provinces = $('#provinces').val();
    if(typeCompany == '' && mineral == '' && provinces == ''){
        var url = '{!! route('adminCompany') !!}';
        window.location.href = url;

    }else{
        var data = {
        data: null,
        typeCompany: typeCompany,
        mineral: mineral,
        provinces: provinces,
        _token: '{{ csrf_token() }}'
    };
    var params = $.param(data);

    var url = '{{ route('resultCompany', ['data' => '']) }}' +  params;

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
                    url:"{!! url('backend/company/delate/"+id+"') !!}",
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

    // $(document).ready(function(){
    //     $('#typeCompany').select2({
    //         placeholder: "- เลือกประเภทสถานประกอบการ -",
    //         allowClear: true
    //     });
    // });

    // $(document).ready(function(){
    //     $('#mineral').select2({
    //         placeholder: "- เลือกชนิดแร่ -",
    //         allowClear: true
    //     });
    // });

    // $(document).ready(function(){
    //     $('#provinces').select2({
    //         placeholder: "- เลือกจังหวัด -",
    //         allowClear: true
    //     });
    // });
</script>
@endsection
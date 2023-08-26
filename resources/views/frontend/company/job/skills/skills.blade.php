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
                    <div class="font-medium text-center text-lg">ตั้งค่าสมรรถนะและทักษะของตำแหน่งงาน {{$sp->p_name}}</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    รายละเอียดทักษะ ใน{{$gjc->cc_name}} ของตำแหน่งงาน {{$sp->p_name}}
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url ('company/job/skills/form/'.$gjc->gjc_id.'/'.$sp->sp_id)}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                                <tr>
                                    <th><center>ทักษะ</center></th>
                                    <th><center>คำอธิบาย</center></th>
                                    <th><center>ทักษะย่อย</center></th>
                                    <th><center>แก้ไข/ลบ</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gjskills as $rs)
                                <tr>
                                    <td><center>
                                        {{$rs->s_name}}
                                        @if($rs->FKs_Create == 0)
                                            <br>
                                            (พื้นฐาน)
                                        @endif
                                    </center></td>
                                    <td><center>{!! asset($rs->s_detail )?$rs->s_detail :''!!}</center></td>
                                    <td><center>
                                    @php $i=1; @endphp
                                    @foreach($gjSkillsSub as $row)
                                        @if($row->FKgjss_gjskills == $rs->gjs_id)
                                        <a href="#" onclick="detail_skills({{$row->FKgjss_skillsSub}})">{{$i++}}. {{$row->ss_name}}</a>
                                        @if($rs->FKs_Create == 0)
                                            <br>
                                            (พื้นฐาน)
                                        @endif
                                        <br>
                                        @endif
                                    @endforeach
                                    </center></td>
                                    <td><center>
                                        <a href="{{ url ('company/job/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                        <button type="button" class="btn btn-danger" onclick="del_value(1)">ลบ</button>
                                    </center></td>
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <td><center>ทักษะ 2</center></td>
                                    <td><center>คำอธิบาย 2</center></td>
                                    <td><center>ทักษะย่อย 1 <br> ทักษะย่อย 2</center></td>
                                    <td><center>
                                        <a href="{{ url ('company/job/skills/edit')}}"  >  <button type="button" class="btn btn-warning"  >แก้ไข</button></a>
                                        <button type="button" class="btn btn-danger" onclick="del_value(2)">ลบ</button>
                                    </center></td>
                                </tr>
                                <tr>
                                    <td><center>ทักษะ 3 (พื้นฐาน)</center></td>
                                    <td><center>คำอธิบาย 1</center></td>
                                    <td><center>ทักษะย่อย 1 <br> ทักษะย่อย 2</center></td>
                                    <td><center></center></td>
                                </tr>
                                <tr>
                                    <td><center>ทักษะ 4 (พื้นฐาน)</center></td>
                                    <td><center>คำอธิบาย 2</center></td>
                                    <td><center>ทักษะย่อย 1 <br> ทักษะย่อย 2</center></td>
                                    <td><center></center></td>
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

<script>
    function detail_skills(id) {
        // alert(id);

        if(id == ''){
        }else{
            $.ajax({
                'type': 'post',
                'url': "{{ url('searchskillsSub') }}",
                'dataType': 'json',
                'data': { 
                    'skillsSub'            : id,
                    '_token'        : "{{csrf_token()}}"  
                },
                // success: function (response) {
                //     var skillsDetail = $(`#skillsSub_detail\\[${$id}\\]`); // ใช้ $id ที่ส่งเข้ามาในฟังก์ชัน
                //     var cleanedResponse = removeHtmlTagsSub(response);
                //     skillsDetail.text(cleanedResponse); // ใช้ .text() แทน .innerText เนื่องจากใช้ jQuery
                // }
            'success': function (response){
                Swal.fire({
                    title: '<h4>คำอธิบาย</h4>',
                    html:   response,
                    showCloseButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'ปิด',
                })
                
                } 
            });  
        }
    }
</script>
@endsection
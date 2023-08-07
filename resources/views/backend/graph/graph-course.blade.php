@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "scoreboard";
$active = "sCourse";
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
                    <div class="font-medium text-center text-lg">สรุปจำนวนหลักสูตรฝึกอบรม</div>
                   
                </div>
         
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <!-- <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                    สรุปจำนวนบุคลากรรายกลุ่มตำแหน่งงานตามประเภทสถานประกอบการ
                                    </h2>
                                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ url('backend/skills/form' )}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a>
                                    </div>
                                </div> -->
                                <br>
                                <br>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                        <select name="" id="">
                                            <option value="" hidden>- เลือกปี -</option>
                                            <option value=""> ทั้งหมด  </option>
                                            <option value=""> 2566 </option>
                                            <option value=""> 2565 </option>
                                            <option value=""> 2564 </option>
                                        </select>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="" id="">
                                            <option value="" hidden>- เลือกกลุ่มตำแหน่ง -</option>
                                            <option value=""> ทั้งหมด  </option>
                                            <option value=""> กลุ่มตำแหน่ง1  </option>
                                            <option value=""> กลุ่มตำแหน่ง2  </option>
                                            <option value=""> กลุ่มตำแหน่ง3  </option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
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

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    Highcharts.chart('container', {
        chart: {
        type: 'column'
    },
    title: {
        text: 'สรุปจำนวนบุคลากรตามระดับงาน',
        align: 'left'
    },
    xAxis: {
        categories: ['สมรรถนะ1', 'สมรรถนะ2', 'สมรรถนะ3', 'สมรรถนะ4'],
        crosshair: true,
        accessibility: {
            description: 'Countries'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนบุคลากร'
        }
    },
    // tooltip: {
    //     valueSuffix: ' (1000 MT)'
    // },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'ทักษะ1',
            data: [100, 110, 50, 40]
        },
        {
            name: 'ทักษะ2',
            data: [50, 90, 60, 80]
        },
        {
            name: 'ทักษะ3',
            data: [60, 40, 84, 33]
        },
        {
            name: 'ทักษะ4',
            data: [90, 70, 98, 65]
        },
        {
            name: 'ทักษะ5',
            data: [20, 30, 70, 52]
        },
        {
            name: 'ทักษะ6',
            data: [30, 50, 45, 39]
        },
        {
            name: 'ทักษะอื่นๆ',
            data: [10, 5, 15, 30]
        }
    ]
});
</script>
@endsection
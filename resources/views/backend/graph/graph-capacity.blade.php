@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "scoreboard";
$active = "sCapacity";
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
                    <div class="font-medium text-center text-lg">สรุปจำนวนบุคลากรในระดับสมรรถนะต่าง ๆ</div>
                   
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
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="" id="">
                                          <option value="">- เลือกประเภทสถานประกอบการ -</option>
                                          <option value="">เหมืองแร่</option>
                                          <option value="">โรงโม่หิน</option>
                                          <option value="">โรงแต่งแร่</option>
                                          <option value="">โรงประกอบโลหกรรม</option>
                                          <option value="">ผู้รับเหมาเหมืองแร่</option>
                                          <option value="">อื่นๆ</option>
                                          <option value="">อิสระ</option>
                                      </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                        <br>
                        <figure class="highcharts-figure">
                            <div id="lavelJob"></div>
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
        text: null
    },
    xAxis: {
        categories: ['สมรรถนะ1', 'สมรรถนะ2', 'สมรรถนะ3', 'สมรรถนะ4', 'สมรรถนะ5']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนบุคลากร'
        },
        stackLabels: {
            enabled: true
        }
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'จำนวนบุคลากรที่มีทักษะมากกว่า 50 %',
        data: [3, 5, 1, 13, 10]
    }, {
        name: 'จำนวนบุคลากรที่มีทักษะน้อยกว่า 50 %',
        data: [14, 8, 8, 12, 6]
    }, {
        name: 'จำนวนคนที่ยังไม่มีทักษะ',
        data: [0, 2, 6, 3, 8]
    }]
});
</script>
@endsection
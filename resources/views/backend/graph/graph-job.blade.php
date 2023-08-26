@extends('layouts.master')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
<?php
$activePage = "scoreboard";
$active = "sJob";
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
                    <div class="font-medium text-center text-lg">สรุปจำนวนสถานประกอบการและบุคลากรที่ใช้ระบบ</div>
                   
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
                                @foreach($user as $rs)
                                    @if($rs->c_typeCompany == '')
                                        อิสระ
                                    @else
                                        {{$rs->c_typeCompany}}
                                    @endif
                                @endforeach
                                <br>
                                <br>
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h3 class="text-lg font-medium truncate mr-5">เรียกดูตามหมวด</h3>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-4">
                                        <select name="" id="" class="select2">
                                            <!-- <option value="" hidden>- เลือกปี -</option> -->
                                            <option value=""> ปีทั้งหมด  </option>
                                            <option value=""> 2566 </option>
                                            <option value=""> 2565 </option>
                                            <option value=""> 2564 </option>
                                        </select>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="" id="" class="select2">
                                            <!-- <option value="" hidden>- เลือกกลุ่มตำแหน่ง -</option> -->
                                            <option value=""> กลุ่มตำแหน่งทั้งหมด  </option>
                                            @foreach($groupjob as $rs)
                                            <option value="{{$rs->gj_id}}">{{$rs->gj_no}} {{$rs->gj_name}}</option>
                                            @endforeach
                                            <!-- <option value=""> กลุ่มตำแหน่ง1  </option>
                                            <option value=""> กลุ่มตำแหน่ง2  </option>
                                            <option value=""> กลุ่มตำแหน่ง3  </option> -->
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
        align: 'left',
        text: 'สรุปจำนวนบุคลากรรายกลุ่มตำแหน่งงานตามประเภทสถานประกอบการ'
    },
    // subtitle: {
    //     align: 'left',
    //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    // },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'จำนวนบุคลากร'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
    },

    series: [
        {
            name: 'ประเภทสถานประกอบการ',
            colorByPoint: true,
            data: [
                {
                    name: 'เหมืองแร่',
                    y: 25,
                    drilldown: 'เหมืองแร่'
                },
                {
                    name: 'โรงโม่หิน',
                    y: 19,
                    drilldown: 'โรงโม่หิน'
                },
                {
                    name: 'โรงแต่งแร่',
                    y: 4,
                    drilldown: 'โรงแต่แร่'
                },
                {
                    name: 'โรงประกอบโลหกรรม',
                    y: 4,
                    drilldown: 'โรงประกอบโลหกรรม'
                },
                {
                    name: 'ผู้รับเหมาเหมืองแร่',
                    y: 2,
                    drilldown: 'ผู้รับเหมาเหมืองแร่'
                },
                {
                    name: 'อื่นๆ',
                    y: 30,
                    drilldown: 'อื่นๆ'
                },
                {
                    name: 'อิสระ',
                    y: 15,
                    drilldown: 'อิสระ'
                }
            ]
        }
    ],
});
</script>

<script>
    Highcharts.chart('lavelJob', {
        chart: {
        type: 'column'
    },
    title: {
        text: 'สรุปจำนวนบุคลากรตามระดับงาน',
        align: 'left'
    },
    xAxis: {
        categories: ['ระดับปฏิบัติงาน', 'ระดับหัวหน้า'],
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
            name: 'เหมืองแร่',
            data: [100, 110]
        },
        {
            name: 'โรงโม่หิน',
            data: [50, 90]
        },
        {
            name: 'โรงแต่งแร่',
            data: [60, 40]
        },
        {
            name: 'โรงประกอบโลหกรรม',
            data: [90, 70]
        },
        {
            name: 'ผู้รับเหมาเหมืองแร่',
            data: [20, 30]
        },
        {
            name: 'อื่นๆ',
            data: [30, 50]
        },
        {
            name: 'อิสระ',
            data: [10, 5]
        }
    ]
});
</script>
@endsection
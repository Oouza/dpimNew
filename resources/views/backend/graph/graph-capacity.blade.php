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
                                        <select name="year" id="year" class="select2" onchange="search()">
                                          <!-- <option value="" hidden>- เลือกปี -</option> -->
                                            <option value=""> ปีทั้งหมด  </option>
                                            @php
                                                use Carbon\Carbon;
                                                $dateTime = Carbon::now();
                                                $formattedDate = $dateTime->format('Y');
                                            @endphp
                                            @for($formattedDate; $formattedDate>=2020; $formattedDate--)
                                            <option value="{{$formattedDate}}" @if(!empty($year) && ($year == $formattedDate)) selected @endif>{{$formattedDate+543}}</option>
                                            @endfor
                                        </select>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="gj" id="gj" class="select2" onchange="search()">
                                          <!-- <option value="" hidden>- เลือกกลุ่มตำแหน่ง -</option> -->
                                          <option value=""> กลุ่มตำแหน่งทั้งหมด  </option>
                                          @foreach($groupjob as $rs)
                                          <option value="{{$rs->gj_id}}">{{$rs->gj_name}}</option>
                                          @endforeach
                                          <!-- <option value=""> กลุ่มตำแหน่ง2  </option>
                                          <option value=""> กลุ่มตำแหน่ง3  </option> -->
                                        </select>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="company" id="company" class="select2" onchange="search()">
                                          <option value="ประเภทสถานประกอบการทั้งหมด">ประเภทสถานประกอบการทั้งหมด</option>
                                          <option value="เหมืองแร่">เหมืองแร่</option>
                                          <option value="โรงโม่หิน">โรงโม่หิน</option>
                                          <option value="โรงแต่งแร่">โรงแต่งแร่</option>
                                          <option value="โรงประกอบโลหกรรม">โรงประกอบโลหกรรม</option>
                                          <option value="ผู้รับเหมาเหมืองแร่">ผู้รับเหมาเหมืองแร่</option>
                                          <option value="อื่นๆ">อื่นๆ</option>
                                          <option value="อิสระ">อิสระ</option>
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
        categories: [@foreach($capacity as $item) "{{$item->cc_name}}", @endforeach]
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
        data: [5,10,15]
    }, {
        name: 'จำนวนบุคลากรที่มีทักษะน้อยกว่า 50 %',
        data: [5,10,15]
    }, {
        name: 'จำนวนคนที่ยังไม่มีทักษะ',
        data: [5,10,15]
    }]
});
</script>

<script>
    console.log(@json($capacity));
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection
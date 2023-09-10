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
                                            <!-- <option value=""> 2565 {{$formattedDate}}</option>
                                            <option value=""> 2564 {{$formattedDate}}</option> -->
                                        </select>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <select name="gj" id="gj" class="select2" onchange="search()">
                                            <!-- <option value="" hidden>- เลือกกลุ่มตำแหน่ง -</option> -->
                                            <option value=""> กลุ่มตำแหน่งทั้งหมด  </option>
                                            @foreach($groupjob as $rs)
                                            <option value="{{$rs->gj_id}}" @if(!empty($gj) && ($gj == $rs->gj_id)) selected @endif>{{$rs->gj_id}} {{$rs->gj_no}} {{$rs->gj_name}}</option>
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

        
<!-- @foreach($user as $item)
    {
        name: '{{ $item->c_typeCompany }}',
        y: 25,
        drilldown: '{{ $item->c_typeCompany }}'
    },
@endforeach -->

@endsection
@section('javascripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  <!-- delete -->

<script>
function search() {
    var year = $('#year').val();
    var gj = $('#gj').val();
    // alert(year);
    if(year == '' && gj == ''){
        var url = '{!! route('home') !!}';
        window.location.href = url;

    }else{
        var data = {
        data: null,
        year: year,
        gj: gj,
        _token: '{{ csrf_token() }}'
    };
    var params = $.param(data);

    var url = '{{ route('resultadminSearchGraphJob', ['data' => '']) }}' +  params;

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
    var user = {!! json_encode($user) !!};
    console.log(user);

    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'สรุปจำนวนบุคลากรรายกลุ่มตำแหน่งงานตามประเภทสถานประกอบการ'
    },
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
                    // y: @foreach($user as $rs) @if($rs->c_typeCompany == 'เหมืองแร่') @php $num = 0 @endphp $num++ @endif @endforeach,
                    y: {{ $user->where('c_typeCompany', 'เหมืองแร่')->count() }},
                    drilldown: 'เหมืองแร่'
                },
                {
                    name: 'โรงโม่หิน',
                    y: {{ $user->where('c_typeCompany', 'โรงโม่หิน')->count() }},
                    drilldown: 'โรงโม่หิน'
                },
                {
                    name: 'โรงแต่งแร่',
                    y: {{ $user->where('c_typeCompany', 'โรงแต่งแร่')->count() }},
                    drilldown: 'โรงแต่แร่'
                },
                {
                    name: 'โรงประกอบโลหกรรม',
                    y: {{ $user->where('c_typeCompany', 'โรงประกอบโลหกรรม')->count() }},
                    drilldown: 'โรงประกอบโลหกรรม'
                },
                {
                    name: 'ผู้รับเหมาเหมืองแร่',
                    y: {{ $user->where('c_typeCompany', 'ผู้รับเหมาเหมืองแร่')->count() }},
                    drilldown: 'ผู้รับเหมาเหมืองแร่'
                },
                {
                    name: 'อื่นๆ',
                    y: {{ $user->where('c_typeCompany', 'อื่นๆ')->count() }},
                    drilldown: 'อื่นๆ'
                },
                {
                    name: 'อิสระ',
                    y: {{ $user->where('e_status', '')->count() }},
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
        categories: [@foreach($lj as $rs) '{{$rs->lj_name}}', @endforeach],
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
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'เหมืองแร่',
            data: [@foreach($lj as $rs) {{$user->where('c_typeCompany', 'เหมืองแร่')->where('FKe_lavel', $rs->lj_id)->count()}}, @endforeach]
        }
        ,
        {
            name: 'โรงโม่หิน',
            data: [@foreach($lj as $rs) {{$user->where('c_typeCompany', 'โรงโม่หิน')->where('FKe_lavel', $rs->lj_id)->count()}} ,@endforeach]
        },
        {
            name: 'โรงแต่งแร่',
            data: [@foreach($lj as $rs) {{{$user->where('c_typeCompany', 'โรงแต่งแร่')->where('FKe_lavel', $rs->lj_id)->count()}}}, @endforeach]
        },
        {
            name: 'โรงประกอบโลหกรรม',
            data: [@foreach($lj as $rs) {{{$user->where('c_typeCompany', 'โรงประกอบโลหกรรม')->where('FKe_lavel', $rs->lj_id)->count()}}}, @endforeach]
        },
        {
            name: 'ผู้รับเหมาเหมืองแร่',
            data: [@foreach($lj as $rs) {{{$user->where('c_typeCompany', 'ผู้รับเหมาเหมืองแร่')->where('FKe_lavel', $rs->lj_id)->count()}}}, @endforeach]
        },
        {
            name: 'อื่นๆ',
            data: [@foreach($lj as $rs) {{{$user->where('c_typeCompany', 'อื่นๆ')->where('FKe_lavel', $rs->lj_id)->count()}}}, @endforeach]
        },
        {
            name: 'อิสระ',
            data: [@foreach($lj as $rs) {{{$user->where('c_typeCompany', '')->where('FKe_lavel', $rs->lj_id)->count()}}}, @endforeach]
        }
    ]
});
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection
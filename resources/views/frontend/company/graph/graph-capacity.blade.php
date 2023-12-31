@extends('layouts.masterCompany')
 
@section('title_name', 'Responsive Bootstrap 4 Admin Dashboard Template')

@section('styles_link')
   
@endsection

@section('styles')
<?php
$activePage = "scoreboard";
$active = "capacity";
$i=1;
?>
<!-- <style>
    canvas {
        border: 1px solid black;
    }
</style> -->
@endsection

@section('content')
  <!-- BEGIN: Content -->
  <div class="content">
            <div class="flex items-center mt-8">
               
            </div>
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box py-10 sm:py-20 mt-5">
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">ข้อมูลกราฟแบ่งตามสมรรถนะ 555</div>
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">รายละเอียดข้อมูลกราฟแบ่งตามสมรรถนะ</h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <!-- <a href="{{ url ('company/skillsSub/form')}}"  >   <button class="btn btn-elevated-primary w-24 mr-1 mb-2">เพิ่มข้อมูล</button></a> -->
                        </div>
                    </div>

                    <div class="table table-striped table-bordered" style="width:100%">
                        <div class="mt-6">
                            <div class="h-[290px]">
                                <canvas id="graph-capacity"></canvas>
                            </div>
                        </div>
                    </div>

                    <br>
                    <center><button type="button" class="btn btn-success">ส่งออกข้อมูล xlsx</button></center>
                    
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>รหัสทักษะ</center></th>
                                <th><center>ชื่อทักษะย่อย</center></th>
                                <th><center>คำอธิบาย</center></th>
                                <th><center>ทักษะย่อย</center></th>
                                <th><center>ตั้งค่า</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center>01</center></td>
                                <td><center>ทักษะย่อย 1</center></td>
                                <td><center>คำอธิบาย1</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>
                                    <a href="{{ url ('company/skillsSub/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(1)">Delete</button>
                                </center></td>
                            </tr>
                            <tr>
                                <td><center>02</center></td>
                                <td><center>ทักษะย่อย 2</center></td>
                                <td><center>คำอธิบาย2</center></td>
                                <td><center>ทักษะ1</center></td>
                                <td><center>
                                    <a href="{{ url ('company/skillsSub/edit')}}"  >  <button type="button" class="btn btn-warning"  >Edit</button></a>
                                    <button type="button" class="btn btn-danger" onclick="del_value(2)">Delete</button>
                                </center></td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
            </div>
            <!-- END: Wizard Layout -->
        </div>
        <!-- END: Content -->
@endsection
@section('javascripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  <!-- delete -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  <!-- delete -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
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
                        url:"{!! url('company/news/delete/"+id+"') !!}",
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
    var _ctx4 = $("#graph-capacity")[0].getContext("2d");
    
    var _myChart = new chart_js_auto__WEBPACK_IMPORTED_MODULE_2__["default"](_ctx4, {
      type: "bar",
      data: {
        labels: ["กลุ่มงาน 1", "กลุ่มงาน 2", "กลุ่มงาน 3", "กลุ่มงาน 4"],
        datasets: [{
    //   borderWidth: 10,
          label: "Html Template",
          barThickness: 8,
          maxBarThickness: 10,
          data: [60, 150, 30, 200],
          backgroundColor: _colors__WEBPACK_IMPORTED_MODULE_1__["default"].primary(0.9)
        }]
      },
      options: {
        indexAxis: 'y',
        maintainAspectRatio: false,
        // maintainAspectRatio: true,
        // responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            ticks: {
                font: {
                    size: 14
                  },
                  color: _colors__WEBPACK_IMPORTED_MODULE_1__["default"].slate[500](0.8),
                // crossAlign: 'far'
            },
            grid: {
              color: $("html").hasClass("dark") ? _colors__WEBPACK_IMPORTED_MODULE_1__["default"].darkmode[300](0.8) : _colors__WEBPACK_IMPORTED_MODULE_1__["default"].slate[300](),
              borderDash: [2, 2],
              drawBorder: false
            }
          }
        }
      }
    });
  </script>
@endsection
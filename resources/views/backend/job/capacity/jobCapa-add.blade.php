<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.master')
<?php
$activePage = "index";
$active = "job";
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
                    <div class="font-medium text-center text-lg">เพิ่มสมรรถนะใน{{$gj->gj_name}}</div>
                   
                </div>
                <form action="{{ url('backend/job/capacity/add/'.$id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6" style="margin-top:6%;">
                                    <select class="form-control select2" name="capacity" id="capacity" onchange="selectCapacity()" required>
                                        <option value="" hidden>- กรุณาเลือกสมรรถนะ -</option>
                                        @foreach($capacity as $rs)
                                        <option value="{{$rs->cc_id}}">{{$rs->cc_no}} {{$rs->cc_name}}</option>
                                        @endforeach
                                        <!-- <option value="1111">สมรรถนะ 1</option>
                                        <option value="222">สมรรถนะ 2</option>
                                        <option value="333">สมรรถนะ 3</option>
                                        <option value="4">สมรรถนะ 4</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label"> คำอธิบาย </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <!-- <input type="text" name="capacity_detail" id="capacity_detail"> -->
                                    <textarea cols="55" id="capacity_detail" name="capacity_detail" rows="10" class="form-control" disabled></textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับความจำเป็น </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="important" type="checkbox" value="จำเป็น">&nbsp;&nbsp;จำเป็น
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <!-- <input name="important" type="radio" value="ไม่จำเป็น"> ไม่จำเป็น -->
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>
                                <a href="{{url('backend/job/capacity/'.$id)}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    function removeHtmlTags(input) {
    var div = document.createElement('div');
    div.innerHTML = input;
    return div.textContent || div.innerText || '';
}

function selectCapacity(id) {
    var capacity = $('#capacity').val();
    // alert(capacity);
    if (capacity == '') {
        // Do something if capacity is empty
    } else {
        $.ajax({
            type: 'post',
            url: "{{ url('searchCapacity') }}",
            dataType: 'json',
            data: {
                capacity: capacity,
                _token: "{{csrf_token()}}"
            },
            success: function (response) {
                // Assuming response is a string containing the description
                var capacityDetail = document.getElementById('capacity_detail');
                var cleanedResponse = removeHtmlTags(response);
                capacityDetail.innerText = cleanedResponse;
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
                // Handle error cases here
            }
        });
    }
}
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('#capacity').select2({
            placeholder: "- กรุณาเลือกสมรรถนะ -",
            allowClear: true
        });
    });
</script>

<!-- <script>
    ClassicEditor
    .create( document.querySelector( '#capacity_detail' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script> -->
@endsection





</body>
</html>
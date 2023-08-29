<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

@extends('layouts.masterCompany')
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
                    <div class="font-medium text-center text-lg">แก้ไขสมรรถนะ{{$sp->sp_name}}</div>
                   
                </div>
                <form action="{{ url('company/job/capacity/update/'.$id.'/'.$spId) }}" method="post" enctype="multipart/form-data" onSubmit="return checkPassword(this)">
                {{ csrf_field() }}
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-sl ate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">รายละเอียด</div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> สมรรถนะ </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <select name="capacity_select" id="capacity_select" class="form-control select2" onchange="sSelect()">
                                        <!-- <option value="" hidden>- เลือกสมรรถนะ -</option> -->
                                        <option value="0" selected>อื่นๆ</option>
                                        @foreach($capacity as $rs)
                                        <option @if($gjc->FKgjc_capacity == $rs->cc_id) selected @endif value="{{$rs->cc_id}}" >{{$rs->cc_no}} {{$rs->cc_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if($gjc->FKcc_Create == 0)
                            <div id="detailAdmin" style="display:block;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="45" id="capa_detail" name="capa_detail" rows="10" class="form-control" disabled>{{ strip_tags(str_replace('&nbsp;', ' ', $gjc->cc_detail ?: '')) }}</textarea>
                                        <!-- <textarea class="form-control" cols="55" id="capa_detail" name="capa_detail" rows="10" disabled>{!! asset($gjc->cc_detail )?$gjc->cc_detail :''!!}</textarea> -->
                                    </div>
                                </div>
                            </div>

                            <div id="detailHr" style="display:none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสสมรรถนะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control" type="text" name="capacity_code" id="capacity_code" value="" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อสมรรถนะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control" type="text" name="capacity_name" id="capacity_name" placeholder="ชื่อสมรรถนะ" value="">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="55" id="HRcapacity_detail" name="HRcapacity_detail" rows="10" placeholder="คำอธิบาย"></textarea>
                                    </div>
                                </div>
                            </div>

                            @else
                            <div id="detailAdmin" style="display:none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea class="form-control" cols="55" id="capa_detail" name="capa_detail" rows="10" disabled>{{ strip_tags($gjc->cc_detail ?: '') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="detailHr" style="display:block;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสสมรรถนะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control" type="text" name="capacity_code" id="capacity_code" value="{{$gjc->cc_no}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อสมรรถนะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control" type="text" name="capacity_name" id="capacity_name" placeholder="ชื่อสมรรถนะ" value="{{$gjc->cc_name}}">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="55" id="HRcapacity_detail" name="HRcapacity_detail" rows="10" placeholder="คำอธิบาย">{{ isset($gjc->cc_detail) ? strip_tags($gjc->cc_detail) : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @endif                            

                            <div id="capacity_new" style="display:none;">
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> รหัสสมรรถนะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        @php
                                            $number = count($ct)+1;
                                            $num = str_pad($number, 3, "0", STR_PAD_LEFT);
                                        @endphp
                                        <input class="form-control" type="text" name="no" id="no" value="{{$num}}" disabled>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label "> ชื่อสมรรถนะ </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <input class="form-control" type="text" name="name" id="name" placeholder="ชื่อสมรรถนะ">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                        <b><label for="horizontal-form-1" class="form-label"> คำอธิบาย </lable></b>
                                    </div>
                                    <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                        <textarea cols="55" id="capacity_detail" name="capacity_detail" rows="10" placeholder="คำอธิบาย"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-3">
                                    <b><label for="horizontal-form-1" class="form-label "> ระดับความจำเป็น </lable></b>
                                </div>
                                <div class="mt-2 col-span-12 sm:col-span-6 xl:col-span-6">
                                    <input name="important" type="checkbox" value="จำเป็น" @if($gjc->gjc_important == "จำเป็น") checked @endif> จำเป็น
                                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="gender" type="radio" value="ไม่จำเป็น" checked> ไม่จำเป็น -->
                                </div>
                            </div>

                            </div>
                            </div>
                           <br><br><br>
                            <center>

                                <a href="{{url('company/job/capacity/'.$spId)}}" class="btn btn-warning w-50">กลับหน้าหลัก</a>
                                <button type="submit" class="btn btn-success w-24 ml-2">บันทึก</button>        
                                <!-- <a href="#" class="btn btn-success w-24 ml-2">บันทึก</a> -->

                            </center>
                      
                </form>
            </div>
            
            <!-- END: Wizard Layout -->
        </div>
        
 
      
@endsection


@section('javascripts')
<script>
    function checkPassword(form) { 
    var capacity = document.getElementById('capacity_select').value;
    var name = document.getElementById('name').value;
    var capacity_detail = document.getElementById('capacity_detail').value;
    
    if (capacity == 0) { // ใช้เครื่องหมาย == ในการเปรียบเทียบค่า
        if (name == '') { 
            alert('กรุณากรอกชื่อสมรรถนะ');
            return false;
        }
    }
}
</script>

<script type="text/javascript">
    var editor = null;
    ClassicEditor
        .create(document.querySelector('#HRcapacity_detail'))
        .then(ckEditorInstance => {
            editor = ckEditorInstance;
        })
        .catch(error => {
            console.error(error);
        });

    function removeHtmlTags(input) {
        var div = document.createElement('div');
        div.innerHTML = input;
        return div.textContent || div.innerText || '';
    }

	function sSelect(){
        var capacity = $('#capacity_select').val();
        // alert(capacity);
		if(capacity == '0'){
			document.getElementById('capacity_new').style.display = 'block';
            document.getElementById('detailHr').style.display = 'none';
            document.getElementById('detailAdmin').style.display = 'none';
		}else{
			document.getElementById('capacity_new').style.display='none';
            $.ajax({
                type: 'post',
                url: "{{ url('searchHrCapacity') }}",
                dataType: 'json',
                data: {
                    capacity: capacity,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    if (response && response.user == 0) {
                        $('#detailAdmin').show();
                        $('#detailHr').hide();

                        var capacityDetail = $('#capa_detail');
                        var cleanedResponse = removeHtmlTags(response.detail);
                        capacityDetail.val(cleanedResponse);
                    } else {
                        $('#detailAdmin').hide();
                        $('#detailHr').show();

                        // Update CKEditor content
                        if (editor) {
                            var cleanedResponse = removeHtmlTags(response.detail);
                            editor.setData(cleanedResponse);
                        }

                        $('#capacity_code').val(response.no);
                        $('#capacity_name').val(response.name);
                    }
                },
                error: function (xhr, status, error) {
                    console.log("Error:", error);
                    // Handle error cases here
                }
            });
            
        }
	}
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#capacity_detail' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection





</body>
</html>
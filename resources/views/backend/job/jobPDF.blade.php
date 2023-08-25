<html>
<header>
    <title>{{ $gj->gj_name }}</title>
    <meta http-equiv="Content-Language" content="th" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link
        href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'sarabun', sans-serif;
            font-size: 12px;
        }

    </style>
</header>

<body>
    <!-- <h1>{{ $gj->gj_name }}</h1> -->
    <b> รายละเอียดกลุ่มตำแหน่ง {{$gj->gj_name}} </b> <br>
    <b> รหัสกลุ่มตำแหน่งงาน </b> : {{$gj->gj_no}} <br>
    <b> ชื่อกลุ่มตำแหน่งงาน </b> : {{$gj->gj_name}} <br>
    <b> คำอธิบาย </b> : {{ isset($gj->gj_detail) ? strip_tags($gj->gj_detail) : '' }} <br>
    <b> ประเภทงาน </b> : {{$gj->tj_name}} <br>
    <b> ระดับงาน </b> : {{$gj->lj_name}} <br>
    <table border="1">
        <tr>
           <th><center>สมรรถนะ</center></th>
           <th><center>ทักษะ</center></th>
           <th><center>ทักษะย่อย</center></th>
        </tr>
        @php 
            $capacity = "";
            $skills = "";
        @endphp
        @foreach($gjSub as $rs)
        <tr>
            <td><center>
                @if($capacity != $rs->cc_name) 
                    {{$rs->cc_name}}
                    @php 
                        $capacity = $rs->cc_name;
                    @endphp
                @endif
            </center></td>
            <td><center>
                @if($skills != $rs->s_name) 
                    {{$rs->s_name}}
                    @php 
                        $skills = $rs->s_name;
                    @endphp
                @endif
            </center></td>
            <td><center>{{$rs->ss_name}}</center></td>
        </tr>
        @endforeach
    </table>
</body>

</html>
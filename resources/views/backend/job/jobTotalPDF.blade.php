<html>
<header>
    <title>ข้อมูลกลุ่มตำแหน่งงาน</title>
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
    <h3>ข้อมูลกลุ่มตำแหน่งงาน</h3>
    @foreach($gj as $rs)
        <b> รายละเอียดกลุ่มตำแหน่ง {{$rs->gj_name}} </b> <br>
        <b> รหัสกลุ่มตำแหน่งงาน </b> : {{$rs->gj_no}} <br>
        <b> ชื่อกลุ่มตำแหน่งงาน </b> : {{$rs->gj_name}} <br>
        <b> คำอธิบาย </b> : {{ isset($rs->gj_detail) ? strip_tags($rs->gj_detail) : '' }} <br>
        <b> ประเภทงาน </b> : {{$rs->tj_name}} <br>
        <b> ระดับงาน </b> : {{$rs->lj_name}} <br>
        <table border="1">
            <tr>
            <th><center>สมรรถนะ</center></th>
            <th><center>ทักษะ/ความรู้</center></th>
            <th><center>ทักษะย่อย</center></th>
            </tr>
            @php 
                $capacity = "";
                $skills = "";
            @endphp
            @foreach($gjSub as $row)
            @if($row->FKgjss_groupjob == $rs->gj_id)
            <tr>
                <td><center>
                    @if($capacity != $row->cc_name) 
                        {{$row->cc_name}}
                        @php 
                            $capacity = $row->cc_name;
                        @endphp
                    @endif
                </center></td>
                <td><center>
                    @if($skills != $row->s_name) 
                        {{$row->s_name}}
                        @php 
                            $skills = $row->s_name;
                        @endphp
                    @endif
                </center></td>
                <td><center>{{$row->ss_name}}</center></td>
            </tr>
            @endif
            @endforeach
        </table>
        <hr>
    @endforeach
</body>

</html>
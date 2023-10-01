<?php

namespace App\Imports;

use App\Models\training;
use App\Models\employee;
use App\Models\User;
use App\Models\course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TrainingImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nameUser = $row['title'].' '.$row['first_name'].' '.$row['last_name'];
        $idUser = employee::join('users','users.id','employees.FKe_userid')
            ->where('e_title',$row['title'])
            ->where('e_fname',$row['first_name'])
            ->where('e_lname',$row['last_name'])
            ->where('email',$row['email'])->first();
        $course = course::where('cou_name',$row['name_course'])->first();
        $dateTraining = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_training'])->format('Y-m-d');
        if(!empty($row['date_of_expiry'])){
            $dateEnd = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_expiry'])->format('Y-m-d');
        }else{
            $dateEnd = null;
        }

        if(!empty($course) && !empty($idUser)){
            $training = new training;
            $training->FKtn_userId      = $idUser->id;
            $training->name_user        = $nameUser;
            $training->FKtn_courseId    = $course->cou_id;
            $training->name_course      = $course->cou_name;
            $training->tn_dateTrain     = $dateTraining;
            $training->tn_endCredit     = $dateEnd;
            $training->tn_status        = 1;
            $training->FKtn_userCreate  = 0;
            $training->tn_userCreate    = Auth::user()->name;
            $training->tn_userUpdate    = Auth::user()->name;
            $training->save();
        }else if(empty($idUser)){
            $mes = 'ไม่มีข้อมูลของ คุณ'.$row['first_name'].' '.$row['last_name'].' กรุณาเพิ่มข้อมูลบุคลากรก่อน';
            $yourURL= url('backend/people/manageskills');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }else if(empty($course)){
            $mes = 'ไม่มีข้อมูลหลักสูตรการอบรม หัวข้อ '.$row['name_course'].' กรุณาเพิ่มข้อมูลหลักสูตรการอบรมก่อน';
            $yourURL= url('backend/people/manageskills');
            echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
        }
    }
}

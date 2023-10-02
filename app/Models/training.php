<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    use HasFactory;

    protected $table = 'trainings';
    protected $primaryKey = 'tn_id';
    protected $fillable = [
        'FKtn_userId',
        'name_user',
        'FKtn_courseId',
        'name_course',
        'tn_dateTrain',
        'tn_endCredit',
        'tn_Credit',
        'FKtn_capacity',
        'name_capacity',
        'FKtn_skills',
        'name_skills',
        'FKtn_skillsSub',
        'name_skillsSub',
        'tn_moneyTrain',
        'tn_moneyOther',
        'tn_status',
        'FKtn_userCreate',
        'tn_userCreate',
        'tn_userUpdate',
        'tn_userDelete',
    ];
}

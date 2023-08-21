<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'cou_id';
    protected $fillable = [
        'cou_no',
        'cou_name',
        'cou_organizer',
        'cou_startTime',
        'cou_endTime',
        'FKcou_typeCourse',
        'cou_nametypeCourse',
        'cou_period',
        'cou_frequency',
        'cou_detail',
        'cou_note',
        'FKcou_userCreate',
        'cou_userCreate',
        'cou_userUpdate',
        'cou_userDelete',
    ];
}

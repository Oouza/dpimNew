<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseSkills extends Model
{
    use HasFactory;

    protected $table = 'course_skills';
    protected $primaryKey = 'cs_id';
    protected $fillable = [
        'FKcs_skills',
        'cs_nameskills',
        'FKcs_course',
        'cs_namecourse',
        'FKcs_userCreate',
        'cou_userCreate',
        'cou_userUpdate',
        'cou_userDelete',
    ];
}

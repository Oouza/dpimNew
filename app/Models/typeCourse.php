<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class typeCourse extends Model
{
    use HasFactory;

    protected $table = 'type_course';
    protected $primaryKey = 'tc_id';
    protected $fillable = [
        'tc_no',
        'tc_name',
        'tc_userCreate',
        'tc_userUpdate',
        'tc_userDelete',
    ];
}

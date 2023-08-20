<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gjskills extends Model
{
    use HasFactory;

    protected $table = 'gjskills';
    protected $primaryKey = 'gjs_id';
    protected $fillable = [
        'FKgjs_skills',
        'gjs_nameskills',
        'FKgjs_gjcapacity',
        'FKgjs_groupjob',
        'FKgjs_userCreate',
        'gjs_userCreate',
        'gjs_userUpdate',
        'gjs_userDelete',
    ];
}

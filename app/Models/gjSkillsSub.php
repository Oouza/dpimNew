<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gjSkillsSub extends Model
{
    use HasFactory;

    protected $table = 'gj_skills_subs';
    protected $primaryKey = 'gjss_id';
    protected $fillable = [
        'FKgjss_skillsSub',
        'gjss_nameskillsSub',
        'FKgjss_gjskills',
        'FKgjss_gjcapacity',
        'FKgjss_groupjob',
        'FKgjss_userCreate',
        'gjss_userCreate',
        'gjss_userUpdate',
        'gjss_userDelete',
    ];
}

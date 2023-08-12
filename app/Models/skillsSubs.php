<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skillsSubs extends Model
{
    use HasFactory;

    protected $table = 'skills_subs';
    protected $primaryKey = 'ss_id';
    protected $fillable = [
        'ss_no',
        'ss_name',
        'ss_detail',
        'ss_standardOne',
        'ss_standardTwo',
        'ss_standardThree',
        'FKss_skills',
        'FKss_capacity',
        'FKss_Create',
        'ss_userCreate',
        'ss_userUpdate',
        'ss_userDelete',
    ];
    
}

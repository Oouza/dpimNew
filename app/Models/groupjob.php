<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class groupjob extends Model
{
    use HasFactory;

    protected $table = 'groupjobs';
    protected $primaryKey = 'gj_id';
    protected $fillable = [
        'gj_no',
        'gj_name',
        'gj_detail',
        'FKgj_typeJob',
        'gj_nametypeJob',
        'FKgj_lavel',
        'gj_namelavel',
        'FKgj_userCreate',
        'gj_userCreate',
        'gj_userUpdate',
        'gj_userDelete',
    ];
}

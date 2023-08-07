<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lavelJob extends Model
{
    use HasFactory;

    protected $table = 'lavel_jobs';
    protected $primaryKey = 'lj_id';
    protected $fillable = [
        'lj_no',
        'lj_name',
        'lj_userCreate',
        'lj_userUpdate',
        'lj_userDelete',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gjcapacity extends Model
{
    use HasFactory;

    protected $table = 'gjcapacities';
    protected $primaryKey = 'gjc_id';
    protected $fillable = [
        'FKgjc_capacity',
        'gjc_namecapacity',
        'gjc_important',
        'FKgjc_groupjob',
        'gjc_namegroupjob',
        'FKgjc_userCreate',
        'gjc_userCreate',
        'gjc_userUpdate',
        'gjc_userDelete',
    ];
}

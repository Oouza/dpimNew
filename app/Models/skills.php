<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skills extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $primaryKey = 's_id';
    protected $fillable = [
        's_no',
        's_name',
        's_detail',
        'FKs_capacity',
        'FKs_Create',
        's_userCreate',
        's_userUpdate',
        's_userDelete',
    ];
}

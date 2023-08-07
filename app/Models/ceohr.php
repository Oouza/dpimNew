<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ceohr extends Model
{
    use HasFactory;

    protected $table = 'ceohrs';
    protected $primaryKey = 'ch_id';
    protected $fillable = [
        'ch_title',
        'ch_fname',
        'ch_lname',
        'ch_phone',
        'FKch_userid',
        'ch_note',
        'FKch_company',
        'ch_userCreate',
        'ch_userUpdate',
        'ch_userDelete',
    ];
}

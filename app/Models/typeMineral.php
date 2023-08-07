<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeMineral extends Model
{
    use HasFactory;

    protected $table = 'type_minerals';
    protected $primaryKey = 'tm_id';
    protected $fillable = [
        'tm_no',
        'tm_name',
        'tm_userCreate',
        'tm_userUpdate',
        'tm_userDelete',
    ];
}

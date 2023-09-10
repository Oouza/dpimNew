<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capacity extends Model
{
    use HasFactory;

    protected $table = 'capacities';
    protected $primaryKey = 'cc_id';
    protected $fillable = [
        'cc_no',
        'cc_name',
        'cc_detail',
        'FKcc_Create',
        'cc_userCreate',
        'cc_userUpdate',
        'cc_userDelete',
        'FKgroupAdmin',
    ];
}

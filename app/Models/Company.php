<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'c_id';
    protected $fillable = [
        'c_nameCompany',
        'c_typeCompany',
        'c_licenseNo',
        'c_startDate',
        'c_endDate',
        'c_typeMineral',
        'c_phone',
        'c_credit',
        'FKc_manager',
        'FKc_hr',
        'c_userCreate',
        'c_userUpdate',
        'c_userDelete',
    ];
}

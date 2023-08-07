<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'e_id';
    protected $fillable = [
        'e_title',
        'e_fname',
        'e_lname',
        'e_phone',
        'e_birth',
        'e_gender',
        'e_status',
        'FKe_company',
        'e_nameCompany',
        'e_employeeNo',
        'FKe_department',
        'FKe_departmentSub',
        'FKe_position',
        'FKe_lavel',
        'FKe_group',
        'e_credit',
        'addressNO_now',
        'FKe_province_now',
        'FKe_amphur_now',
        'FKe_tambon_now',
        'postcode_now',
        'addressNO_past',
        'FKe_province_past',
        'FKe_amphur_past',
        'FKe_tambon_past',
        'postcode_past',
        'FKe_userid',
        'e_userCreate',
        'e_userUpdate',
        'e_userDelete',
        'e_note',
    ];
}

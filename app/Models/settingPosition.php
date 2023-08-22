<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settingPosition extends Model
{
    use HasFactory;

    protected $table = 'setting_positions';
    protected $primaryKey = 'sp_id';
    protected $fillable = [
        'FKgsp_department',
        'sp_namedepartment',
        'FKgsp_departmentSub',
        'sp_namedepartmentSub',
        'FKgsp_position',
        'sp_nameposition',
        'FKgsp_groupJob',
        'sp_namegroupJob',
        'sp_detail',
        'FKgsp_typeJob',
        'sp_nametypeJob',
        'FKgsp_lavel',
        'sp_namelavel',
        'FKgsp_company',
        'sp_delete',
    ];
}

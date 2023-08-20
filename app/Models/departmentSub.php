<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departmentSub extends Model
{
    use HasFactory;

    protected $table = 'department_subs';
    protected $primaryKey = 'ds_id';
    protected $fillable = [
        'ds_name',
        'FKds_department',
        'ds_namedepartment',
        'FKds_company',
        'ds_delete',
    ];
}

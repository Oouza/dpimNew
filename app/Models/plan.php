<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;

    protected $table = 'plans';
    protected $primaryKey = 'plans_id';
    protected $fillable = [
        'plans_id',
        'FKplans_employee',
        'plans_nameemployee',
        'FKplans_course',
        'plans_namecourse',
        'FKplans_capacity',
        'plans_namecapacity',
        'FKplans_skills',
        'plans_nameskills',
        'FKplans_skillssub',
        'plans_nameskillssub',
        'plans_datestart',
        'plans_dateend',
        'plans_moneycouser',
        'plans_moneyother',
        'plans_status',
        'plans_note',
        'plans_userDelete',
    ];
}

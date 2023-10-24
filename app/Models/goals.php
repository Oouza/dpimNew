<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class goals extends Model
{
    use HasFactory;

    protected $table = 'goals';
    protected $primaryKey = 'goals_id';
    protected $fillable = [
        'FKgoals_employee',
        'goals_nameemployee',
        'FKgoals_skillsSub',
        'goals_nameskillsSub',
        'goals_year',
        'goals_status',
        'goals_note',
        'goals_userDelete',
    ];
}

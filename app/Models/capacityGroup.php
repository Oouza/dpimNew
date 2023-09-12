<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capacityGroup extends Model
{
    use HasFactory;

    protected $table = 'capacity_groups';
    protected $primaryKey = 'ccg_id';
    protected $fillable = [
        'FKcc_Company',
        'FKcc_Admin',
        'ccg_userUpdate',
    ];
}

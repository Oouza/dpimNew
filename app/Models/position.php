<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class position extends Model
{
    use HasFactory;

    protected $table = 'positions';
    protected $primaryKey = 'p_id';
    protected $fillable = [
        'p_name',
        'FKp_company',
        'p_delete',
    ];
}

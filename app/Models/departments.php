<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departments extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $primaryKey = 'd_id';
    protected $fillable = [
        'd_name',
        'FKd_company',
        'd_delete',
    ];
}

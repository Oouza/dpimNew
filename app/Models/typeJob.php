<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class typeJob extends Model
{
    use HasFactory;

    // use SoftDeletes;
    
    protected $table = 'type_job';
    protected $primaryKey = 'tj_id';
    protected $fillable = [
        'tj_no',
        'tj_name',
        'tj_userCreate',
        'tj_userUpdate',
        'tj_userDelete',
        'tj_cretae',
    ];
    // public $timedtamp = false;
}

class order extends Model
{
    //โมเดลเรียกใช้การบันทึกค่าในฐานข้อมูล//
    protected $table = 'carsearchreserve';
    protected $primaryKey = 'Book_id';
    protected $fillable = ['Book_name','Book_call','Book_email','Book_brand','Book_brandmodel','Book_daypickup','Book_timepickup'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timedtamp = false;
}
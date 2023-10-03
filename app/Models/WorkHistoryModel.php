<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHistoryModel extends Model
{
    use HasFactory;
    protected $table = 'work_history';
    protected $primaryKey = 'wh_id';
    protected $fillable = ['wh_id', 'FKwh_employeeid', 'FKwh_userid', 'wh_datefrom', 'wh_dateto', 'wh_agencies', 'wh_position', 'wh_credit', 'wh_note', 'wh_userCreate', 'wh_userUpdate', 'wh_userDelete'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}

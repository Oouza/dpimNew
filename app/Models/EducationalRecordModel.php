<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalRecordModel extends Model
{
    use HasFactory;
    protected $table = 'educational_record';
    protected $primaryKey = 'er_id';
    protected $fillable = ['er_id', 'FKer_employeeid', 'FKer_userid', 'er_datefrom', 'er_dateto', 'er_qualification', 'er_Nameinstitution', 'er_credit', 'er_note', 'er_userCreate', 'er_userUpdate', 'er_userDelete'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}

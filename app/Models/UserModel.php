<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
     protected $table = 'users';
     protected $primaryKey = 'id';
     protected $fillable = ['id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'status', 'FK_company'];
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
     public $timedtamp = false;
}

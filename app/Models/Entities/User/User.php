<?php

namespace App\Models\Entities\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'user';
    protected $fillable = ['account','username', 'password', 'phone', 'level', 'status', 'login_try','good','bad', 'login_at', 'created_at', 'updated_at'];
}

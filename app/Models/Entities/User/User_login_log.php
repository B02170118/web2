<?php

namespace App\Models\Entities\User;

use Illuminate\Database\Eloquent\Model;

class User_login_log extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'user_login_log';
    protected $fillable = ['ip','input', 'status', 'created_at', 'updated_at'];
}

<?php

namespace App\Models\Entities\User;

use Illuminate\Database\Eloquent\Model;

class User_notify extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'user_notify';
    protected $fillable = ['id', 'user_id', 'msg', 'is_read', 'created_at', 'updated_at'];
}

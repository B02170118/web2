<?php

namespace App\Models\Entities\User;

use Illuminate\Database\Eloquent\Model;

class User_bad extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'user_bad';
    protected $fillable = ['user_id', 'trade_id', 'to_user_id', 'text', 'created_at', 'updated_at'];
}

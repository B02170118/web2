<?php

namespace App\Models\Entities\Type;

use Illuminate\Database\Eloquent\Model;

class Server_type extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'server_type';
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

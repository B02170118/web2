<?php

namespace App\Models\Entities\Type;

use Illuminate\Database\Eloquent\Model;

class Platform_type extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'platform_type';
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

<?php

namespace App\Models\Entities\Type;

use Illuminate\Database\Eloquent\Model;

class Alliance_type extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'alliance_type';
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

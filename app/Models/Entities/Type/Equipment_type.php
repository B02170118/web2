<?php

namespace App\Models\Entities\Type;

use Illuminate\Database\Eloquent\Model;

class Equipment_type extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'equipment_type';
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

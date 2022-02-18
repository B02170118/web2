<?php

namespace App\Models\Entities\Type;

use Illuminate\Database\Eloquent\Model;

class Amulet_type extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'amulet_type';
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

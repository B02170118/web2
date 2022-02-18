<?php

namespace App\Models\Entities\Type;

use Illuminate\Database\Eloquent\Model;

class Gem_type extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'gem_type';
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

<?php

namespace App\Models\Entities\Type;

use Illuminate\Database\Eloquent\Model;

class Rune_type extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'rune_type';
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

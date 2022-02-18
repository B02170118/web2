<?php

namespace App\Models\Entities\Type;

use Illuminate\Database\Eloquent\Model;

class Goods_type extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'goods_type';
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

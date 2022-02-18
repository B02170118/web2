<?php

namespace App\Models\Entities\Trade;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entities\Trade;


class Trade_item extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'trade_item';
    protected $fillable = ['trade_id', 'name', 'value', 'created_at', 'updated_at'];
}

<?php

namespace App\Models\Entities\Trade;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entities\Trade\Trade_item;
use App\Models\Entities\User\User;
use App\Models\Entities\Type\Goods_type;
use App\Models\Entities\Type\Platform_type;
use App\Models\Entities\Type\Alliance_type;
use App\Models\Entities\Type\Server_type;
use App\Models\Entities\Type\Amulet_type;
use App\Models\Entities\Type\Equipment_type;
use App\Models\Entities\Type\Gem_type;
use App\Models\Entities\Type\Rune_type;

class Trade extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'trade';
    protected $fillable = ['user_id', 'server_type_id', 'platform_type_id', 'alliance_type_id', 'goods_type_id', 'amulet_type_id', 'equipment_type_id', 'gem_type_id', 'rune_type_id', 'name', 'image', 'buyname', 'price', 'created_at', 'updated_at'];

    public function join_tradeitem()
    {
        return $this->hasMany(Trade_item::class,'trade_id','id');
    }

    public function join_user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function join_server_type()
    {
        return $this->hasOne(Server_type::class,'id','server_type_id');
    }

    public function join_platform_type()
    {
        return $this->hasOne(Platform_type::class,'id','platform_type_id');
    }

    public function join_alliance_type()
    {
        return $this->hasOne(Alliance_type::class,'id','alliance_type_id');
    }

    public function join_goods_type()
    {
        return $this->hasOne(Goods_type::class,'id','goods_type_id');
    }

    public function join_amulet_type()
    {
        return $this->hasOne(Amulet_type::class,'id','amulet_type_id');
    }

    public function join_equipment_type()
    {
        return $this->hasOne(Equipment_type::class,'id','equipment_type_id');
    }

    public function join_gem_type()
    {
        return $this->hasOne(Gem_type::class,'id','gem_type_id');
    }

    public function join_rune_type()
    {
        return $this->hasOne(Rune_type::class,'id','rune_type_id');
    }
}

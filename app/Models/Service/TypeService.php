<?php

namespace App\Models\Service;

use App\Models\Repository\TypeRepository as TypeRep;
use Log;
use Carbon\Carbon;
use Cache;

class TypeService
{
    protected $PostRep;

    private $use_cache = false;

    public function __construct(TypeRep $TypeRep)
    {
        $this->TypeRep = $TypeRep;
    }

    /**
     * 取得search_options
     *
     * @return array
     */
    public function gettrade_search_options()
    {
        $data = [
            'amulet_type' => $this->getType('Amulet_type'),
            'equipment_type' => $this->getType('Equipment_type'),
            'gem_type' => $this->getType('Gem_type'),
            'goods_type' => $this->getType('Goods_type'),
            'platform_type' => $this->getType('Platform_type'),
            'rune_type' => $this->getType('Rune_type'),
            'alliance_type' => $this->getType('Alliance_type'),
            'server_type' => $this->getType('Server_type'),
        ];
        return $data;
    }

    /**
     * 取得道具類型
     *
     * @param string $type 類型名稱
     * @return array
     */
    public function getType($type)
    {
        if (cache()->has($type) && $this->use_cache === true) {
            return cache($type);
        }else {
            $data = $this->TypeRep->getType($type,['id','name']);
            $result = [];
            if (!empty($data)) {
                foreach ($data as $row) {
                    $result[$row['id']] = $row;
                }
                Cache::forever($type,$result);
            }
            return $result;
        }
    }
}

<?php

namespace App\Models\Repository;

class TypeRepository
{
    /**
     * 取得道具類型
     *
     * @uses App\Models\Entities\Type\Amulet_type;
     * @uses App\Models\Entities\Type\Equipment_type;
     * @uses App\Models\Entities\Type\Gem_type;
     * @uses App\Models\Entities\Type\Goods_type;
     * @uses App\Models\Entities\Type\Platform_type;
     * @uses App\Models\Entities\Type\Rune_type;
     * @uses App\Models\Entities\Type\Alliance_type;
     * @uses App\Models\Entities\Type\Server_type;
     * @param array $type 道具分類名稱
     * @param array $column
     * @return array
     */
    public function getType($type,$column = [])
    {
        $class = 'App\\Models\\Entities\\Type\\'.$type;
        if (class_exists($class)) {
            $typeModel = new $class;
            if (!empty($column)) {
                return $typeModel::all($column)->toArray();
            }else {
                return $typeModel::all()->toArray();
            }
        }
        return [];
    }
}

<?php

namespace App\Models\Repository;

use App\Models\Entities\SystemConfig\System_Config;

class SystemRepository
{
    public function all()
    {
        return System_Config::all()->toArray();
    }

    /**
     * 取得系統設定資料
     *
     * @param string $keyword keyword
     * @return array
     */
    public function systemconfig($keyword = null)
    {
        if (is_string($keyword) && $keyword != null) {
            return System_Config::where('key',$keyword)->pluck('value')->first();
        }else {
            return [];
        }
    }
}

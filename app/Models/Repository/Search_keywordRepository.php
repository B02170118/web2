<?php

namespace App\Models\Repository;

use App\Models\Entities\Search\Search_keyword;

class Search_keywordRepository
{
    /**
     * 取得全部搜尋關鍵字
     *
     * @return array
     */
    public function all()
    {
        return Search_keyword::select('keyword','count')->orderBy('count','desc')->get()->toArray();
    }

    /**
     * 更新次數或新增一筆
     *
     * @param string $keyword
     * @return void
     */
    public function insert_or_update($keyword)
    {
        $hash = md5($keyword);
        $model = Search_keyword::firstOrCreate(['hash' => $hash],['keyword' => $keyword]);
        if (!empty($model)) {
            $model->count = $model->count+1;
            $model->save();
        }
        return;
    }
}

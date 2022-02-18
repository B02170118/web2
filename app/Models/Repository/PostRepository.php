<?php

namespace App\Models\Repository;

use App\Models\Entities\Post\Post;
use Carbon\Carbon;

class PostRepository
{
    public function all()
    {
        # code...
    }

    /**
     * 取得可用公告
     *
     * @return array
     */
    public function getpost()
    {
        return Post::select('content')
        ->where('start_at','<=',Carbon::now())->where('end_at','>=',Carbon::now())
        ->orderBy('seq')->pluck('content')->toArray();
    }
}

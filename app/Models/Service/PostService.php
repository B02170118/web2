<?php

namespace App\Models\Service;

use App\Models\Repository\PostRepository as PostRep;
use Log;
use Request;
use Cookie;
use Carbon\Carbon;

class PostService
{
    protected $PostRep;

    public function __construct(PostRep $PostRep)
    {
        $this->PostRep = $PostRep;
    }

    /**
     * 取得公告
     *
     * @return array $post 公告資料
     */
    public function getpost()
    {
        $post = [];
        //已看過公告
        if (session('post') == 1) {
            return [];
        }
        $data = $this->PostRep->getpost();
        if (!empty($data)) {
            $post = $data;
            session()->put('post', '1');
        }
        return $post;
    }
}

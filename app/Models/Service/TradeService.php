<?php

namespace App\Models\Service;

use App\Models\Repository\TradeRepository as TradeRep;
use App\Models\Repository\Search_keywordRepository as SkRep;
use Log;
use Carbon\Carbon;
use Cache;
use Image;
use Storage;
use Illuminate\Support\Facades\Input;

class TradeService
{
    protected $TradeRep;
    protected $SkRep;

    private $use_cache = false;

    public function __construct(TradeRep $TradeRep,SkRep $SkRep)
    {
        $this->TradeRep = $TradeRep;
        $this->SkRep = $SkRep;
    }

    /**
     * 取得交易列表
     *
     * @return array
     */
    public function gettrade_list($search = null)
    {
        if (!empty($search)) {
            $this->SkRep->insert_or_update($search['goods_name']);
            $trade = $this->TradeRep->gettrade_list($search);
            // dd($trade);
            return $trade;
        }
        if (cache()->has('trade') && $this->use_cache === true) {
            return cache('trade');
        }else {
            $trade = $this->TradeRep->gettrade_list();
            if (!empty($trade)) {
                Cache::forever('trade',$trade);
            }
            return $trade;
        }
    }

    /**
     * 取得全部搜尋關鍵字
     *
     * @return array
     */
    public function getsearch_keyword()
    {
        return $this->SkRep->all();
    }

    /**
     * 取得指定交易
     *
     * @param int $id
     * @return array $trade
     */
    public function gettrade($id)
    {
        $usersession = getuser_session();
        //檢查登入狀態
        if (!empty($usersession['id'])) {
            $trade = $this->TradeRep->gettrade($id);
            if (!empty($trade)) {
                //檢查是否賣家
                if ($usersession['id'] == $trade['user_id']) {
                    return $trade;
                }
            }
        }
        return;
    }

    /**
     * 編輯指定交易
     *
     * @param array $input
     * @return mixed
     */
    public function edittrade($input)
    {
        $trade_id = $input['trade_id'];
        try {
            $imagePath = request('image')->store("uploads/{$trade_id}");
            // dump(Storage::get(public_path("storage/{$imagePath}")));
            $file = Input::file('image');
            // $image = Image::make(public_path("storage/{$imagePath}"))->resize(900, null, function ($constraint) {
            $image = Image::make($file->getRealPath())->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // dump($imagePath);
            $image->save(public_path("storage/{$imagePath}"), 60);//品質壓縮到60%
            $input['image'] = $imagePath;
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::error($e->getMessage());
            return ['code'=>1,'msg'=>__('frontend.edit_fail_image')];
        }
        $res = $this->TradeRep->update_trade($input);
        if ($res == true) {
            return ['code'=>1,'msg'=>__('frontend.edit_success')];
        }
        if (Storage::exists("public/".$imagePath)) {
            Storage::delete("public/".$imagePath);
        }
        return ['code'=>1,'msg'=>__('frontend.edit_fail')];
    }
}

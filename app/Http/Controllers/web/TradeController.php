<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\TradeEditRequest;
use App\Http\Controllers\Controller;
use PostService;
use TradeService;
use TypeService;
use UserService;

class TradeController extends Controller
{
    /**
     * 首頁
     *
     * @return void
     */
    public function index(Request $request)
    {
        $userInfo =UserService::getuser();
        if (!empty($request->all())) {
            $rules = [
                'goods_name' => 'required|string|min:1|max:40',//道具名稱
                // 'server_type' => 'required|numeric|min:1|max:10',//伺服器類型
                'platform_type' => 'required|numeric|min:1|max:10',//平台類型
                'alliance_type' => 'required|numeric|min:1|max:30',//聯盟類型
                'goods_type' => 'required|numeric|min:1|max:30',//道具類型
                'amulet_type' => 'required_if:goods_type,4|numeric|min:1|max:10',//護身符類型
                'equipment_type' => 'required_if:goods_type,1|min:1|max:10',//裝備類型
                'gem_type' => 'required_if:goods_type,3|numeric|min:1|max:10',//寶石種類
                'rune_type' => 'required_if:goods_type,2|numeric|min:1|max:33',//符石種類
                'goods_item.*' => 'string|min:1|max:20',//道具屬性
                'goods_item_min.*' => 'numeric|min:1|max:9999',//道具屬性最小值(>=)
                'goods_item_max.*' => 'numeric|min:1|max:9999',//道具屬性最大值(<=)
            ];
            // request()->validate($rules);
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $viewdata = [
                    'post'=>PostService::getpost(),
                    'trade'=>null,
                    'search_options'=>TypeService::gettrade_search_options(),
                    'userInfo' => $userInfo,
                    'keyword'=>TradeService::getsearch_keyword(),
                ];
                return view('page.trade.index',$viewdata)->withErrors($validator);
            }
            // dd($request->all());
            $viewdata = [
                'post'=>PostService::getpost(),
                'trade'=>TradeService::gettrade_list($request->all()),
                'search_options'=>TypeService::gettrade_search_options(),
                'userInfo' => $userInfo,
                'keyword'=>TradeService::getsearch_keyword(),
            ];
        }else{
            $viewdata = [
                'post'=>PostService::getpost(),
                'trade'=>TradeService::gettrade_list(),
                'search_options'=>TypeService::gettrade_search_options(),
                'userInfo' => $userInfo,
                'keyword'=>TradeService::getsearch_keyword(),
            ];
        }
        return view('page.trade.index',$viewdata);
    }

    /**
     * 建立商品頁
     *
     * @return void
     */
    public function create()
    {
        # code...
    }

    /**
     * 編輯商品頁
     *
     * @return void
     */
    public function edit($trade_id)
    {
        $input['trade_id'] = $trade_id;
        $rules =[
            'trade_id' => 'required|numeric|min:1|max:99999999',//交易id
        ];
        $validator = Validator::make($input, $rules);
        if (!$validator->fails()) {
            $trade = TradeService::gettrade($input['trade_id']);
            if (!empty($trade)) {
                $viewdata = [
                    'search_options'=>TypeService::gettrade_search_options(),
                    'trade' => $trade,
                    'keyword'=>TradeService::getsearch_keyword(),
                ];
                return view('page.trade.edit',$viewdata);
            }
        }
        return abort(403,__('frontend.page_403'));
    }

    public function editform(TradeEditRequest $request)
    {
        $input =  $request->validated();
        $usersession = getuser_session();
        //檢查登入狀態
        if (!empty($usersession['id'])) {
            if ($usersession['id'] == $input['user_id']) {
                $res = TradeService::edittrade($input);
            }
        }
        return redirect()->back()->withErrors(['msg' => $res['msg']]);
    }
}

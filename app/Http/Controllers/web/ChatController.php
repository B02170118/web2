<?php

namespace App\Http\Controllers\web;

use UserService;
use App\Models\Service\ChatService;
use TradeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ChatController extends Controller
{
    public ChatService $ChatService;

    public function __construct(ChatService $ChatService)
    {
        $this->ChatService = $ChatService;
    }

    /**
     * 發送訊息測試頁
     * todo 目前沒session , 應該統一導向 login ,建議改在 middleware
     * @return Application|Factory|View
     */
    public function chatBox()
    {

        $input = request()->all();
        $userInfo = UserService::getuser();
        if (!empty($userInfo) && isset($input['chatWithId'])) {
            $chatWithId = $input['chatWithId'];
            $chatStartUser = UserService::getUserInfoById($userInfo->id);
            $chatWithUserInfo = UserService::getUserInfoById($chatWithId);

            if($chatStartUser && $chatWithUserInfo){
                //自己不能跟自己聊天 且 兩個會員都不為關閉時 才可以進行聊天
                if($chatWithUserInfo->id!==$chatStartUser->id && $chatStartUser->status==1 && $chatWithUserInfo->status==1){
                    $chatChannel = $this->ChatService->getChatChannel($userInfo->id,$chatWithId);
                    return view('page.chat.ChatBox',[
                        'chatChannel' => $chatChannel,
                        'userName'       => $chatStartUser->username,
                    ]);
                }
            }
        }
        return redirect(route('login'));
    }
}

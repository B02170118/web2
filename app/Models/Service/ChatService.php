<?php

namespace App\Models\Service;

use App\Models\Entities\Chat\Chat_Channel;
use App\Models\Entities\Modules\Pusher_Module;
use App\Models\Repository\Chat\ChatRepository as ChatRep;
use App\Models\Repository\Modules\PusherModuleRepository as PusherModule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ChatService
{
    protected ChatRep $chatRep;
    protected pusherModule $pusherModule;

    public function __construct(ChatRep $chatRep,PusherModule $pusherModule)
    {
        $this->chatRep = $chatRep;
        $this->pusherModule = $pusherModule;
    }

    /**
     * 取得pusher模組
     * @param $moduleId
     * @return Pusher_Module|Pusher_Module[]|Collection|Model|null
     */
    public function getPusherModuleById($moduleId){
        return $this->pusherModule->Pusher_Module->find($moduleId);
    }

    /**
     * 檢查 key 是否屬實 且屬於其中一個user
     * @param $userId
     * @param $key
     * @return mixed|null
     */
    public function chkChannelKey($userId,$key){
        $result = $this->chatRep->Chat_Channel->where(['chat_channel_key'=>$key])->get()->first();
        if($result){
            if($result->chat_start_user_id==$userId || $result->chat_get_user_id==$userId){
                return $result;
            }
        }
        return null;
    }


    /**
     * 目前使用的 pusher 是哪個
     * @return int|mixed
     */
    public function getUsingPusherModule()
    {
        $nowAppId = config('broadcasting.connections.pusher.app_id');
        return $this->pusherModule->Pusher_Module->where('pusher_app_id',$nowAppId)->get()->first()??1;
    }


    /**
     * 取得聊天室 channel
     * @param $startId
     * @param $chatWithId
     * @return Chat_Channel|Chat_Channel[]|Collection|Model|mixed|null
     */
    public function getChatChannel($startId,$chatWithId){
        //大的在後面
        if($startId>$chatWithId){
            $tempId = $startId;
            $startId = $chatWithId;
            $chatWithId = $tempId;
        }

        //產生md5 channel key
        $chat_channel_key = $this->makeChannelKey($startId,$chatWithId,$type=0);

        //判斷是否已存在
        $nowChannel = $this->chatRep->Chat_Channel->where([
            ['chat_channel_key','=',$chat_channel_key],
            ['chat_type','=',$type],
        ])->get()->first();

        //不存在創建
        if(!$nowChannel){
            $nowChannel = $this->createChatChannel($startId,$chatWithId,$type);
        }
        return $nowChannel;
    }

    /**
     * @param $startId
     * @param $chatWithId
     * @param $type
     * @return Chat_Channel|Chat_Channel[]|Collection|Model|null
     */
    public function createChatChannel($startId,$chatWithId,$type){

        $created =  $this->chatRep->Chat_Channel->create([
            'chat_channel_pusher_module_id' => $this->getUsingPusherModule()->id,
            'chat_channel_key' => $this->makeChannelKey($startId,$chatWithId,$type),
            'chat_start_user_id' => $startId,
            'chat_get_user_id' => $chatWithId,
            'chat_type' => $type,
            'chat_status' => 1,
        ]);
        return $this->chatRep->Chat_Channel->find($created->id);
    }

    /**
     * 產生channel key
     * @param $startId
     * @param $chatWithId
     * @param $type
     * @return string
     */
    public function makeChannelKey($startId,$chatWithId,$type) : string
    {
        return md5($startId.$chatWithId,$type);
    }


    /**
     * 寫入對話紀錄
     * @param $user_id
     * @param $channelKey
     * @param $message
     * @return bool
     */
    public function saveChannelRecord($user_id,$channelKey,$message) : bool{
        $channelInfo = $this->chatRep->Chat_Channel->where(['chat_channel_key'=>$channelKey])->get()->first();
        if($channelInfo){
            $this->chatRep->Chat_Record->create([
                "chat_channel_id" =>$channelInfo->id,
                "chat_user_id" => $user_id,
                "chat_message" => $message,
                "chat_send_time" => date('Y-m-d H:i:s'),
            ]);
            return true;
        }
        return false;
    }
}

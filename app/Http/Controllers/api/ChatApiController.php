<?php

namespace App\Http\Controllers\api;

use App\Events\D2ChatMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Service\ChatService;
use Pusher\Pusher;
use Pusher\PusherException;
use UserService;

class ChatApiController extends Controller
{
    private Request $request;
    private array $resultBox;
    protected ChatService $ChatService;

    public function __construct(Request $request,ChatService $ChatService)
    {
        $this->request = $request;
        $this->ChatService = $ChatService;
        $this->resultBox = [
            'code'      => 'fail',
            'isSelf'    => false,
            'userName'  => '',
            'message'       => ''
        ];
    }

    /**
     * 接收User post message
     */
    public function sendMessage()
    {
        $input = $this->request->all();
        $rules = [
            'message' => 'required|string',
            'chatChannelKey' => 'required|string',
        ];
        $validator = Validator::make($input, $rules);
        if (!$validator->fails()){
            $userInfo = UserService::getuser();
            $data = [
                'id'        => $userInfo->id,
                'userName'  => $userInfo->username,
                'message'   => $input['message']
            ];
            $chkChatChannel = $this->ChatService->chkChannelKey($userInfo->id,$input['chatChannelKey']);

            if(!empty($userInfo) && $chkChatChannel){
                $this->ChatService->saveChannelRecord($userInfo->id,$chkChatChannel->chat_channel_key,$input['message']);
                event(new D2ChatMessage($data,$chkChatChannel->chat_channel_key));

            }
        }
    }

    /**
     * 收到 pusher 服務器發送message,
     * SHOW 之前需驗證內容無誤 且對應聊天的人
     * @return JsonResponse
     */
    public function showMessageAuth(): JsonResponse
    {
        $userInfo = UserService::getuser();
        if($userInfo!=null){
            $input = $this->request->all();
            if(isset($input['data'])){
                $data = json_decode($input['data'],true);
                if(isset($data['msgInfo'])){
                    $data = $data['msgInfo'];
                    $rules = [
                        'id' => 'required|int',
                        'userName' => 'required|string',
                        'message' => 'required|string',
                    ];
                    $validator = Validator::make($data, $rules);

                    if (!$validator->fails()) {
                        //驗證發話人是不是自己
                        if($userInfo['id']==$data['id']){
                            $this->resultBox['isSelf'] = true;
                        }
                        $this->resultBox['userName'] = $data['userName'];
                        $this->resultBox['code'] = 'success';
                        $this->resultBox['message']  = $data['message'];
                    }
                }
            }
        }
        return response()->json($this->resultBox);
    }


    /**
     * 驗證private channel
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @throws PusherException
     */
    public function privateAuth(Request $request){

        $socket_id = $request['socket_id'];
        $channel_name = $request['channel_name'];

        $channelArr = explode('-',$channel_name);

        if(count($channelArr)>1){
            $userInfo = UserService::getuser();
            $channelKey = $channelArr[1];
            $chkChatChannel = $this->ChatService->chkChannelKey($userInfo->id,$channelKey);
            if($chkChatChannel){

                $pusherModuleInfo =$this->ChatService->getPusherModuleById($chkChatChannel->chat_channel_pusher_module_id);

                $key = $pusherModuleInfo->pusher_key??config('broadcasting.connections.pusher.key');
                $secret = $pusherModuleInfo->pusher_secret??config('broadcasting.connections.pusher.secret');
                $app_id = $pusherModuleInfo->pusher_app_id??config('broadcasting.connections.pusher.app_id');

                $pusher = new Pusher($key, $secret, $app_id);
                $auth = $pusher->socket_Auth($channel_name, $socket_id);
                return response($auth, 200);
            }
        }
        header('', true, 403);
        echo "Forbidden";
    }
}

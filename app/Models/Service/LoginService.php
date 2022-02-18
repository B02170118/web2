<?php

namespace App\Models\Service;

use App\Models\Repository\UserRepository as UserRep;
use Illuminate\Contracts\Encryption\DecryptException;
use Log;
use Session;
use Hash;

class LoginService
{
    protected $UserRep;

    public function __construct(UserRep $UserRep)
    {
        $this->UserRep = $UserRep;
    }

    /**
     * 前台登入
     *
     * @param array $input
     * @return array
     */
    public function Login($input)
    {
        $data = $this->UserRep->login($input);
        $update = [];
        if (!empty($data)) {
            //檢查密碼
            if (!Hash::check($input['password'], $data['password']))
            {
                $this->UserRep->updatelogin_log($input);
                return ['code'=>3,'msg'=>__('frontend.login_fail')];
            }
            //檢查登入次數
            if ($data['login_try'] > UserRep::LOGIN_TRY) {
                return ['code'=>1,'msg'=>__('frontend.login_retry')];
            }
            //檢查會員狀態
            if ($data['status'] != UserRep::USER_STATUS_1) {
                return ['code'=>2,'msg'=>__('frontend.login_status_'.$data['status'])];
            }
            //檢查是否為臨時會員
            if ($data['level'] == UserRep::USER_LEVEL_0) {
                return ['code'=>4,'msg'=>__('frontend.login_level_0')];
            }
            if (Hash::needsRehash($data['password']))
            {
                $update['password'] = Hash::make($input['password']);
            }
            $update['id'] = $data['id'];
            $update['login_try'] = 0;
            $update['login_at'] = date("Y-m-d H:i:s");
            $this->UserRep->updatelogin($update);
            $this->set_login_session($data);
            $this->UserRep->updatelogin_log($input,1);
        }else {
            return ['code'=>4,'msg'=>__('frontend.login_fail')];
        }
        return ['code'=>0,'msg'=>__('frontend.login_success')];
    }

    /**
     * 前台登出
     *
     * @return array
     */
    public function Logout()
    {
        if (session()->has('user')) {
            Session::forget('user');
            return ['code'=>0,'msg'=>__('frontend.logout_success')];
        }
        return ['code'=>1,'msg'=>__('frontend.logout_fail')];
    }

    /**
     * 取得前台會員資料
     *
     * @return array  $result 會員資料
     */
    public function getuser_frontend()
    {
        $usersession = getuser_session();
        //檢查登入狀態
        if (!empty($usersession['id'])) {
            $userdata = $this->check_login($usersession);
            if (!empty($userdata)) {
                $result = $this->set_login_session($userdata['user']);
                if (empty($result)) {
                    Session::forget('user');
                }
                $usersession = $result;
            }
        }
        return $usersession;
    }

    /**
     * 檢查登入session
     *
     * @param array $usersession 會員session資料
     * @return array
     */
    public function check_login($usersession)
    {
        $result = [];
        //檢查登入時間
        if ($this->check_login_time($usersession['time'])) {
            $user = $this->check_user($usersession['id']);
            if (!empty($user)) {
                $result['user'] = $user;
                $result['user_notify'] = $this->UserRep->getuser_notify($user['id'],0);//會員未讀通知
                // $result['user_chat'] = $this->UserRep->getuser_chat($user['id']);//會員聊天資料
            }
        }
        return $result;
    }

    /**
     * 檢查會員
     *
     * @param array $user_id 會員id
     * @return array $result 會員資料
     */
    public function check_user($user_id)
    {
        $result = [];
        if ($user_id > 0) {
            $user = $this->UserRep->getuser($user_id,['id','username','level','status']);//會員基本資料
            if (!empty($user)) {
                //檢查會員狀態 & 不是臨時會員
                if ($user['status'] == UserRep::USER_STATUS_1 && $user['level'] != UserRep::USER_LEVEL_0) {
                    $result = $user;
                }
            }
        }
        return $result;
    }

    /**
     * 檢查登入時間
     *
     * @param array $time
     * @return bool
     */
    public function check_login_time($time)
    {
        if ($time > time()) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * 設置登入 session
     *
     * @param $array $user
     * @return void
     */
    public function set_login_session($user)
    {
        $userinfo = [
            'id' => $user['id']?? null,
            'name' => $user['username']?? null,
            'level' => $user['level']?? null,
            'time' => time() + UserRep::LOGIN_TIME?? 0,
            'notify' => $user['user_notify']?? null,
            // 'chat' => $userdata['user_chat']?? null,
        ];
        session()->put('user', encrypt(json_encode($userinfo)));
        return $userinfo;
    }

    /**
     * 前台註冊
     *
     * @param array $input
     * @return array
     */
    public function Register($input)
    {
        //檢查手機重複
        if (!empty($this->UserRep->getuser_phone($input['phone']))) {
            return ['code'=>1,'msg'=>__('frontend.phone_repeat')];
        }

        //檢查手機驗證碼是否過期
        // if ($this->check_phonecode($input['phone'],$input['phone_code'] === false)) {
        //     return ['code'=>2,'msg'=>__('frontend.phone_message_timeout')];
        // }

        //檢查會員名重複
        if (!empty($this->UserRep->getuser_name($input['username']))) {
            return ['code'=>3,'msg'=>__('frontend.username_repeat')];
        }

        //檢查帳號重複
        if (!empty($this->UserRep->getuser_account($input['account']))) {
            return ['code'=>4,'msg'=>__('frontend.account_repeat')];
        }
        $input['password'] = Hash::make($input['password']);

        $res = $this->UserRep->register($input);
        if (!empty($res)) {
            return ['code'=>0,'msg'=>__('frontend.register_success')];
        }
        return ['code'=>5,'msg'=>__('frontend.register_fail')];
    }

    /**
     * 檢查手機驗證碼
     *
     * @param string $phone 手機號碼
     * @param string $phonecode 驗證碼
     * @return bool
     */
    public function check_phonecode($phone,$phonecode)
    {
        // $phonedata = $this->phonecodeRep->getphonecode($phone,$phonecode);
        // if (!empty($phonedata)) {
        //     if (time() - strtotime($phonedata['created_at']) < PhonecodeRep::TIMEOUT) {
        //         return true;
        //     }
        // }
        // return false;
    }


}

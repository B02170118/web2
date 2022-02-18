<?php

namespace App\Models\Repository;

use App\Models\Entities\User\User;
use App\Models\Entities\User\User_notify;
use App\Models\Entities\User\User_login_log;
use App\Models\Entities\User\User_bad;
use Carbon\Carbon;
use Log;
use DB;
use Request;
use Hash;

class UserRepository
{
    const LOGIN_TIME = 21600;//會員登入時間
    const LOGIN_TRY = 5;//登入嘗試次數
    //會員狀態
    const USER_STATUS_0 = 0;//禁用
    const USER_STATUS_1 = 1;//啟用
    const USER_STATUS_2 = 2;//鎖定
    // 會員等級
    const USER_LEVEL_0 = 0;//臨時
    const USER_LEVEL_1 = 1;//普通
    const USER_LEVEL_2 = 2;//高級

    public function getall()
    {
        # code...
    }

    /**
     * 取得會員資料
     *
     * @param int $id 會員id
     * @param array $select 欄位
     * @return mixed
     */
    public function getuser($id,$select = null)
    {
        if ($select == null) {
            return User::find($id);
        }else {
            return User::select($select)->find($id);
        }
    }

    /**
     * 取得會員通知
     * @param int $id 會員id
     * @param int $read 是否已讀
     * @return array
     */
    public function getuser_notify($id,$read = -1)
    {
        if ($read == -1) {
            return User_notify::where('user_id',$id)->orderBy('created_at','desc')->get()->toArray();
        }else {
            return User_notify::where(['user_id'=>$id,'is_read'=>$read])->orderBy('created_at','desc')->get()->toArray();
        }
    }

    /**
     * 登入
     *
     * @param array $input
     * @return array $result
     */
    public function login($input)
    {
        $data = User::where(['account'=>$input['account']])->first();
        if (!empty($data)) {
            return $data->toArray();
        }
    }

    /**
     * 更新登入資料
     *
     * @param array $data
     * @return int
     */
    public function updatelogin($data)
    {
        $model = User::find($data['id']);
        return $model->update($data);
    }

    /**
     * 更新登入log
     *
     * @param array $input
     * @param array $status
     * @return void
     */
    public function updatelogin_log($input,$status = 0)
    {
        if ($status == 0) {
            $model = User::where('account',$input['account'])->first();
            User::where(['id'=>$model->id])->update(['login_try'=>$model->login_try + 1]);
        }
        User_login_log::create([
            'input' => json_encode($input),
            'ip' => Request::getClientIp(),
            'status' => $status,
        ]);
        return;
    }

    /**
     * 變更會員資料
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function edit_userdata($id,$input)
    {
        $model = $this->getuser($id);
        $model->password = Hash::make($input['password']);
        return $model->save();
    }

    /**
     * 取得會員-帳號
     *
     * @param $account 帳號
     * @return mixed
     */
    public function getuser_account($account)
    {
        return User::where('account',$account)->first();
    }

    /**
     * 取得會員-名稱
     *
     * @param $username 會員名稱
     * @return mixed
     */
    public function getuser_name($username)
    {
        return User::where('username',$username)->first();
    }

    /**
     * 取得會員-手機
     *
     * @param $phone 用戶名稱
     * @return mixed
     */
    public function getuser_phone($phone)
    {
        return User::where('phone',$phone)->first();
    }

    /**
     * 註冊
     *
     * @param $input 表單資料
     * @return mixed
     */
    public function register($input)
    {
        return User::create($input);
    }
}

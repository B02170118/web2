<?php

namespace App\Models\Service;

use App\Models\Repository\UserRepository as UserRep;
use Log;
use Illuminate\Contracts\Encryption\DecryptException;

class UserService
{
    protected $UserRep;

    public function __construct(UserRep $UserRep)
    {
        $this->UserRep = $UserRep;
    }

    /**
     * 取得當前登入的會員資料
     *
     * @return mixed
     */
    public function getuser()
    {
        $usersession = getuser_session();
        if (!empty($usersession['id'])) {
            $user = $this->UserRep->getuser($usersession['id'],['id','account','username','phone','level','good','bad']);
            $length = strlen($user->phone);
            $prefix = 2;
            $user['phone'] = substr_replace($user->phone,str_repeat('*',$length-$prefix-1),$prefix,$length-$prefix-1);
            if ($user->level == 1) {
                $user->level = "普通會員";
            }elseif($user->level == 2) {
                $user->level = "高級會員";
            }
            return $user;
        }
        return [];
    }

    /**
     * 編輯會員資料
     *
     * @param array $input
     * @return array
     */
    public function edit_userdata($input)
    {
        $usersession = getuser_session();
        if (!empty($usersession['id'])) {
            $res = $this->UserRep->edit_userdata($usersession['id'],$input);
            if ($res == true) {
                return ['code'=>0,'msg'=>__('frontend.edit_success')];
            }else {
                return ['code'=>1,'msg'=>__('frontend.edit_fail')];
            }
        }
        return ['code'=>2,'msg'=>__('frontend.edit_fail')];
    }

    public function get_notify()
    {
        $usersession = getuser_session();
        if (!empty($usersession['id'])) {
            return $this->UserRep->getuser_notify($usersession['id']);
        }
        return [];
    }

    /**
     * ID
     * @int $id 綁個 int 避免被注入
     * @return mixed
     */
    public function getUserInfoById(int $id){
        return $this->UserRep->getuser($id);
    }
}

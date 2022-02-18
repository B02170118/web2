<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditDataRequest;
use UserService;

class UserController extends Controller
{
    /**
     * 會員中心
     *
     * @return void
     */
    public function index()
    {
        $viewdata = [
            'userinfo' => UserService::getuser(),
        ];
        return view('page.user.index',$viewdata);
    }

    public function editform(UserEditDataRequest $request)
    {
        $input =  $request->validated();
        $res = UserService::edit_userdata($input);
        return redirect()->route('user.index')->withErrors(['msg' => $res['msg']]);
    }

    /**
     * 會員倒讚原因
     *
     * @param int $id
     * @return void
     */
    public function userbad($id)
    {
        # code...
    }

    /**
     * 會員通知
     *
     * @return void
     */
    public function notify()
    {
        $viewdata = [
            'notify' => UserService::get_notify(),
        ];
        return view('page.user.notify',$viewdata);
    }

    /**
     * 會員付款資料
     *
     * @return void
     */
    public function paylist()
    {
        # code...
    }
}

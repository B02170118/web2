<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use LoginService;

class LoginController extends Controller
{
    /**
     * 會員註冊
     *
     * @return void
     */
    public function register()
    {
        return view('page.login.register');
    }

    /**
     * 會員登入
     *
     * @return void
     */
    public function login()
    {
        return view('page.login.login');
    }

    /**
     * 會員登出
     *
     * @return void
     */
    public function logout()
    {
        $res = LoginService::logout();
        return redirect()->route('trade')->withErrors(['fail' => $res['msg']]);
    }

    /**
     * 會員登入表單
     *
     * @param LoginRequest $request
     * @return void
     */
    public function loginform(LoginRequest $request)
    {
        $input =  $request->validated();
        $res = LoginService::Login($input);
        if ($res['code'] == 0) {
            return redirect()->route('trade');
        }
        return redirect()->route('login')->withErrors(['fail' => $res['msg']])->withInput();
    }

    /**
     * 會員註冊表單
     *
     * @param RegisterRequest $request
     * @return void
     */
    public function registerform(RegisterRequest $request)
    {
        $input =  $request->validated();
        $res = LoginService::Register($input);
        if ($res['code'] == 0) {
            return redirect()->route('login')->withErrors(['fail' => $res['msg']]);
        }
        return redirect()->route('register')->withErrors(['fail' => $res['msg']])->withInput();
    }
}

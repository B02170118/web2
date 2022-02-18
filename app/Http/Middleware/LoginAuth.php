<?php
/**
 * 系統設置
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Encryption\DecryptException;
use LoginService;

class LoginAuth
{
    private $needlogin = [
        'login',
        'register',
    ];

    private $notneedlogin= [
        '/user',
        '/trade',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userdata = LoginService::getuser_frontend();
        if (!empty($userdata)) {
            if (in_array($request->route()->getName(),$this->needlogin)) {
                return redirect()->route('trade');
            }
            view()->share('user', $userdata);
        }else {
            if ($request->route()->getName() == 'logout'){
                return redirect()->route('trade');
            }
            if (in_array($request->route()->getPrefix(),$this->notneedlogin)) {
                return redirect()->route('login')->withErrors(['fail' => __('frontend.login_please')]);
            }
        }
        return $next($request);
    }


}

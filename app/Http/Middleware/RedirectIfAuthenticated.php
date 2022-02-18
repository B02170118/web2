<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use LiffService;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (WEB_MODULE == 'liff') {
            // if (!LiffService::check()) {
            //     return abort(403,__('frontend.line_not_login'));
            // }
        }else {
            if (Auth::check()) {
                $data = Auth::user();
                dd($data);
            }
        }

        return $next($request);
    }
}

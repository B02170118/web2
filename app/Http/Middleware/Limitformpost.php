<?php

namespace App\Http\Middleware;

use Closure;

class Limitformpost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->input('form_token');
        if (cache()->has($token)) {
            return redirect()->back()->withErrors(['fail'=>__('frontend.form_retry_error')]);
        }

        cache([$token => 'value'], 60);

        return $next($request);
    }
}

<?php
/**
 * 系統設置
 */
namespace App\Http\Middleware;

use Closure;
use SystemService;

class SystemConfig
{
    private $search_data = [
        'FORNT_URL',
        'IMG_URL',
        'WEB_STATUS',
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
        $this->set_define();
        $this->check_webstatus();
        return $next($request);
    }

    /**
     * 檢查開站狀態
     *
     * @return void
     */
    private function check_webstatus()
    {
        if (defined('WEB_STATUS')) {
            if (WEB_STATUS != 1) {
                abort(403, __('frontend.system_close'));
            }
        }else {
            abort(403, __('frontend.system_close'));
        }
        return;
    }

    /**
     * 設置網站常數
     *
     * @return void
     */
    private function set_define()
    {
        $data = SystemService::all();
        if (count($data)>0) {
            foreach ($data as $row) {
                if (in_array($row['key'],$this->search_data)) {
                    if (isset($row['value'])) {
                        if(!defined($row['key'])){
                            define($row['key'], $row['value']);
                        }
                    }
                }
            }
        }
        return;
    }
}

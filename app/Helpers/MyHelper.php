<?php
use Illuminate\Contracts\Encryption\DecryptException;

/*
 * Here you can make your own shortcut functions.
 *
 */

if (! function_exists('sdfsdfds')) {

    /**
     * 判斷是否是json
     *
     * @param string $string
     * @return boolean
     */
    function isJson($string) {
        return ((is_string($string) &&
                (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }

    /**
     * 取得user session資料
     *
     * @return array
     */
    function getuser_session()
    {
        $usersession = [];
        if (session()->has('user')) {
            $session = session()->get('user');
            try {
                $decrypted = decrypt($session);
                if (isJson($decrypted)) {
                    $usersession = json_decode($decrypted,1);
                }
            } catch (DecryptException $e) {
                // dump($e->getMessage());
            }
        }
        return $usersession;
    }

    /**
     * 算距離當前時間多久
     *
     * @param int $timestamp 時間戳
     * @return void
     */
    function gettrade_time_after($timestamp)
    {
        $t = time() - $timestamp;
        $f = array(
            '31536000' => '年',
            '2592000' => '個月',
            '604800' => '星期',
            '86400' => '天',
            '3600' => '小時',
            '60' => '分鐘',
            '1' => '秒'
        );
        foreach($f as $k => $v){
            if(0 != $c = floor($t/(int)$k)){
                return $c.$v.'前';
            }
        }
        return '剛剛';
    }
}

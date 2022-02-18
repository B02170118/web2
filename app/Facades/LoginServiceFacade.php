<?php
namespace App\Facades;

use \Illuminate\Support\Facades\Facade;

class LoginServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Models\Service\LoginService';
    }
}

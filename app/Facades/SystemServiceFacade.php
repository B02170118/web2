<?php
namespace App\Facades;

use \Illuminate\Support\Facades\Facade;

class SystemServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Models\Service\SystemService';
    }
}

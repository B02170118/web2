<?php

namespace App\Models\Repository\Modules;

use App\Models\Entities\Modules\Pusher_Module;
use Carbon\Carbon;

class PusherModuleRepository
{
    public Pusher_Module $Pusher_Module;

    public function __construct()
    {
        $this->Pusher_Module = new Pusher_Module();
    }

    public function all()
    {
        # code...
    }
}

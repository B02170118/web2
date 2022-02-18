<?php

namespace App\Models\Service;

use App\Models\Repository\SystemRepository as SystemRep;
use Log;

class SystemService
{
    protected $SysRep;

    public function __construct(SystemRep $SystemRep)
    {
        $this->SystemRep = $SystemRep;
    }

    public function all()
    {
        return $this->SystemRep->all();
    }
}

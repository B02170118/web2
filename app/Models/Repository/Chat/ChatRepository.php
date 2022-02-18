<?php

namespace App\Models\Repository\Chat;

use App\Models\Entities\Chat\Chat_Channel;
use App\Models\Entities\Chat\Chat_Record;
use Carbon\Carbon;

class ChatRepository
{

    public Chat_Channel $Chat_Channel;
    public Chat_Record $Chat_Record;

    public function __construct()
    {
        $this->Chat_Channel = new Chat_Channel();
        $this->Chat_Record = new Chat_Record();
    }

    public function all()
    {
        # code...
    }
}

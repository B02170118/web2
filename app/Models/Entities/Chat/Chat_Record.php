<?php

namespace App\Models\Entities\Chat;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pusher_Module
 * @package App\Models\Entities
 * @mixin Builder
 * @property mixed key
 * @property mixed value
 * @property mixed description
 * @property mixed created_at
 * @property mixed updated_at
 * @author Roger 2021-10-11
 */
class Chat_Record extends Model
{
    protected $table = 'chat_record';
    protected $primaryKey = 'id';
    protected $fillable = [
        'chat_channel_id',
        'chat_user_id',
        'chat_message',
        'chat_send_time',
        'created_at',
        'update_at',
    ];
}

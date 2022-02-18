<?php

namespace App\Models\Entities\Chat;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chat_Channel
 * @package App\Models\Entities
 * @mixin Builder
 * @property mixed chat_channel_pusher_module_id
 * @property mixed chat_channel_key
 * @property mixed chat_start_user_id
 * @property mixed chat_get_user_id
 * @property mixed chat_type
 * @property mixed chat_status
 * @property mixed created_at
 * @property mixed updated_at
 * @author Roger 2021-10-11
 */
class Chat_Channel extends Model
{
    protected $table = 'chat_channel';
    protected $primaryKey = 'id';
    protected $fillable = [
        'chat_channel_pusher_module_id',
        'chat_channel_key',
        'chat_start_user_id',
        'chat_get_user_id',
        'chat_type',
        'chat_status',
        'created_at',
        'updated_at',
    ];
}

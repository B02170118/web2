<?php

namespace App\Models\Entities\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Pusher_Module
 * @package App\Models\Entities
 * @mixin Builder
 * @property mixed pusher_content
 * @property mixed pusher_app_id
 * @property mixed pusher_key
 * @property mixed pusher_secret
 * @property mixed pusher_cluster
 * @property mixed created_at
 * @property mixed updated_at
 * @author Roger 2021-10-11
 */
class Pusher_Module extends Model
{
    protected $table = 'pusher_module';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pusher_content',
        'pusher_app_id',
        'pusher_key',
        'pusher_secret',
        'pusher_cluster',
        'created_at',
        'updated_at',
    ];
}

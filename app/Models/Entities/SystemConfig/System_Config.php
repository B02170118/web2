<?php

namespace App\Models\Entities\SystemConfig;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class System_Config
 * @package App\Models\Entities
 * @mixin Builder
 * @property mixed key
 * @property mixed value
 * @property mixed description
 * @property mixed created_at
 * @property mixed updated_at
 * @author Roger 2021-10-11
 */
class System_Config extends Model
{
    protected $table = 'system_config';
    protected $primaryKey = 'id';
    protected $fillable = ['key', 'value', 'description', 'created_at', 'updated_at'];
}

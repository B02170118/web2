<?php

namespace App\Models\Entities\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'post';
    protected $fillable = ['content', 'seq', 'start_at', 'end_at', 'created_at', 'updated_at'];
}

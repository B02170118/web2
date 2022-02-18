<?php

namespace App\Models\Entities\Search;

use Illuminate\Database\Eloquent\Model;

class Search_keyword extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'search_keyword';
    protected $fillable = ['hash','keyword', 'count', 'created_at', 'updated_at'];
}

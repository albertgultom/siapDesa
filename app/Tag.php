<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = [];
    protected $fillable = [];

    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }

    public function galleries()
    {
        return $this->morphedByMany('App\Gallery', 'taggable');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function tags()
	{
		return $this->morphToMany('App\Tag', 'taggable');
	}
}

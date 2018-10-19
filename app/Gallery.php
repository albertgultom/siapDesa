<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];

    public function contents()
    {
        return $this->hasMany('App\Content', 'gallery_id', 'id');
    }

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
		return $this->morphToMany(Tag::class, 'taggable');
	}
}

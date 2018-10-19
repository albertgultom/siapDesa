<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];

    public function gallery()
    {
        $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }
}

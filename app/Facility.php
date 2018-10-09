<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];

    public function servicings()
    {
        return $this->belongsToMany('App\Servicing');
    }
}

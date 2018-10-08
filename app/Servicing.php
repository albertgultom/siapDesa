<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicing extends Model
{
    protected $table = 'servicings';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];

    public function populations()
    {
        return $this->belongsToMany('App\Population');
    }

    public function facilities()
    {
        return $this->belongsToMany('App\Facility');
    }
}

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
        return $this->belongsTo('App\Population','population_id');
    }

    public function facilities()
    {
        return $this->belongsTo('App\Facility','facility_id');
    }
}

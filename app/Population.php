<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    protected $table = 'populations';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];

    public function education()
    {
        return $this->belongsTo('App\Education');
    }

    public function occupation()
    {
        return $this->belongsTo('App\Occupation');
    }
}

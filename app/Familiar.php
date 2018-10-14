<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiars';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];

    public function karkel()
    {
        return $this->belongsTo(Karkel::class);
    }

    public function population()
    {
        return $this->belongsTo(Population::class);
    }
}

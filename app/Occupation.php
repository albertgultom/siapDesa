<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = 'occupations';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];
    public $timestamps = false;
}

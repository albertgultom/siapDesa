<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];
    public $timestamps = false;
}

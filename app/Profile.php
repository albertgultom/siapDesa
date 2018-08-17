<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'posts';
    protected $guarded = [];
    protected $fillable = [];
}

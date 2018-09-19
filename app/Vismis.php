<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class Vismis extends Model
{
    protected $table = 'profiles';
    protected $guarded = [];
    protected $fillable = ['vision','mission'];
}

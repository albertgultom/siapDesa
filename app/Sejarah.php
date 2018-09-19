<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class Sejarah extends Model
{
    protected $table = 'Profile';
    protected $guarded = [];
    protected $fillable = ['history'];
}

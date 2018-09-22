<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $guarded = [];
    // protected $fillable = array('name','subdistrict','history','vision','mission');
    protected $fillable = ['name','subdistrict','district','phone','email','zip_code','province','image_headman','image_profile','headman','history','vision','mission'];
}

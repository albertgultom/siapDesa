<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karkel extends Model
{
    protected $table = 'karkels';
    protected $guarded = [];
    protected $fillable = [];
    // protected $hidden = [];

    public function familiars()
    {
        return $this->hasMany(Familiar::class);
    }
}

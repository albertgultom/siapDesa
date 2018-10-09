<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criterias';
    protected $guarded = [];
    protected $fillable = [];
    protected $with = ['criterias', 'tabulations'];
    protected $hidden = [
        'criteriaable_id',
        'criteriaable_type'
    ];

    public function tabulations()
    {
        return $this->hasMany('App\Tabulation');
    }

    public function criteriaable()
    {
        return $this->morphTo();
    }

    public function criterias()
    {
        return $this->morphMany(Criteria::class, 'criteriaable');
    }
}

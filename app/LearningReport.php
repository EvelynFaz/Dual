<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class LearningReport extends Model
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'week',
        'qualification',
        'date_delivery',
        'reflection',
        'observations',
        'priority',
    ];


    public function learningReports()
    {
        return $this->belongsToMany('App\LearningReport')->withTimestamps();
    }

}

<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class TeachingPeriod extends Model
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'description',
        'start_date',
        'finish_date',
        'enrolled',
        'code',
    ];



    public function tracing()
    {
        return $this->belongsToMany('App\TeachingPeriod')->withTimestamps();
    }

}
<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class ActivityReportLearning extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'description',
        'type',
        'date',
        'hour_income',
        'departure_time',
        'hours_total',
        'priority',
    ];



    public function role()
    {
        return $this->belongsToMany('App\ActivityReportLearning')->withTimestamps();
    }

}

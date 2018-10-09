<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Student extends Model
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'first_name',
        'last_name',
    ];



    public function tracings()
    {
        return $this->belongsToMany('App\Tracing')->withTimestamps();
    }

    public function profilePhotos()
    {
        return $this->hasOne('App\ProfilePhoto')->withTimestamps();
    }

    public function rotationPlans()
    {
        return $this->hasOne('App\RotationPlan')->withTimestamps();
    }
    public function academicPeriods()
    {
        return $this->hasOne('App\AcademicPeriod')->withTimestamps();
    }
}
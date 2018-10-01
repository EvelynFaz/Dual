<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Tracing extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'career_coordinator',
        'start_date',
        'finish_date',
        'hours_training',
    ];

    public function tracing()
    {
        return $this->belongsToMany('App\Tracing')->withTimestamps();
    }

    public function students()
  {
        return $this->belongsToMany('App\Students')->withTimestamps();
    }

    public function FormativeEntity()
    {
        return $this->hasMany('App\FormativeEntity');
    }

    public function TeachingPeriod()
    {
        return $this->hasMany('App\TeachingPeriod');
    }
    public function AcademicPeriod()
    {
        return $this->hasMany('App\AcademicPeriod');
    }
    public function tutors()
    {
        return $this->hasMany('App\tutor');
    }


}
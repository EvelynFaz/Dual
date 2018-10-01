<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class FormativeEntity extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',
        'nature',
        'legal_representative',
        'ruc',
        'activity_economic',
        'email',
        'address',
        'phone',

    ];

    public function role()
    {
        return $this->belongsToMany('App\TrainingFrameworkPlan')->withTimestamps();
    }

}

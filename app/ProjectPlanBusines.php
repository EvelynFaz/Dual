<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class ProjectPlanBusines extends Model
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [


        'type',
        'analysis',
        'objective',
        'description',
        'indicator',
        'measurement',
        'goal',
        'data_source',
        'budget',
        'expected_benefits',
        'priority',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    public function role()
    {
        return $this->belongsToMany('App\TrainingFrameworkPlan')->withTimestamps();
    }

}

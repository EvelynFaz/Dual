<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Object extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'description',
        'level_achievement_expected',
        'level_achievement_reached',
        'homework',
        'Post_Learning',
        'week_learning',
        'week',
        'responsible',
        'priority',


];



    public function tracing()
    {
        return $this->belongsToMany('App\LearningReport')->withTimestamps();
    }

}
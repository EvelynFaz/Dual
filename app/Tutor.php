<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Tutor extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'type',

];


    public function tracing()
{
    return $this->belongsToMany('App\Tracing')->withTimestamps();
}
    public function students()
    {
        return $this->hasOne('App\Student')->withTimestamps();
    }

}
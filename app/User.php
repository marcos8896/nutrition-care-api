<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    /**
     * Eloquent's definition of 'hasMany' relationship with an UserProgress instance.
     *
     * @param  {*}
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
    */
    public function userProgresses()
    {
      return $this->hasMany(UserProgress::class)->withDefault();;
    }
}

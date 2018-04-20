<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserProgress;
use App\Routine;
use App\Diet;

class User extends Authenticatable implements JWTSubject
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
      return $this->hasMany(UserProgress::class);
    }

    /**
     * Eloquent's definition of 'hasMany' relationship with a Routine instance.
     *
     * @param  {*}
    */
    public function routines()
    {
      return $this->hasMany(Routine::class);
    }

    /**
     * Eloquent's definition of 'hasMany' relationship with a Diet instance.
     *
     * @param  {*}
    */
    public function diets()
    {
      return $this->hasMany(Diet::class);
    }

    /**
     * Get only the active diets.
     *
     * @param  {*}
    */
    public function activeDiets()
    {
      return $this->hasMany(Diet::class)->where('status', 'ACTIVO');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [ 
          'user_id' => $this->id,
          'user_name' => $this->name,
          'user_email' => $this->email
       ];
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\RoutineDetail;

class Routine extends Model
{
    protected $fillable = [
        'description', 'state'
    ];
    
    /**
     * Eloquent's definition of 'belongsTo' relationship with an User instance.
     *
     * @param  {*}
    */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Eloquent's definition of 'hasMany' relationship with a RoutineDetail instance.
     *
     * @param  {*}
    */
    public function routineDetails()
    {
      return $this->hasMany(RoutineDetail::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Routine;
use App\Exercise;
use App\Day;

class RoutineDetail extends Model
{
    protected $fillable = [
        'user_id', 'day_id', 'series', 'reps', 'description'
    ];
    
    /**
     * Eloquent's definition of 'belongsTo' relationship with a Routine instance.
     *
     * @param  {*}
    */
    public function routine() {
        return $this->belongsTo(Routine::class);
    }

    /**
     * Eloquent's definition of 'belongsTo' relationship with an Exercise instance.
     *
     * @param  {*}
    */
    public function exercise() {
        return $this->belongsTo(Exercise::class);
    }

    /**
     * Eloquent's definition of 'belongsTo' relationship with a Day instance.
     *
     * @param  {*}
    */
    public function day() {
        return $this->belongsTo(Day::class);
    }

}

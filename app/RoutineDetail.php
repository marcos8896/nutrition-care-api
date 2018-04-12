<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Routine;

class RoutineDetail extends Model
{
    protected $fillable = [
        'user_id', 'day_id', 'series', 'reps', 'description'
    ];
    
    /**
     * Eloquent's definition of 'belongsTo' relationship with an Routine instance.
     *
     * @param  {*}
    */
    public function routine() {
        return $this->belongsTo(Routine::class);
    }
}

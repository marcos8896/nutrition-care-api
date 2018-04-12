<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RoutineDetail;

class Day extends Model
{
    protected $fillable = [
        'description'
    ];

    /**
     * Eloquent's definition of 'hasMany' relationship with a RoutineDetail instance.
     *
     * @param  {*}
    */
    public function routineDetails() {
        return $this->hasMany(RoutineDetails::class);
    }
}

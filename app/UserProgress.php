<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    protected $fillable = [
      'weight', 'fat_percentage', 'fat_kilogram',
      'muscle_kilogram', 'progress_date'
    ];


    /**
     * Eloquent's definition of 'belongsTo' relationship with an user (owner).
     *
     * @param  {*}
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
    */
    public function user() {
      return $this->belongsTo(User::class)->withDefault();;
    }

}

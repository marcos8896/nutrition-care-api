<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    protected $fillable = [
      'weight', 'fat_percentage', 'fat_kilogram',
      'muscle_kilogram', 'progress_date'
    ];
}

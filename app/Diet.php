<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
  protected $fillable = [
    'totalCarbohydrates', 'totalProteins', 'totalFats',     
    'totalCalories', 'register_date'      
  ];
}

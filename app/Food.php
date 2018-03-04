<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

  protected $fillable = [
    'description', 'proteins', 'carbohydrates',
    'fats', 'calories'
  ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diet;

class Food extends Model
{

  protected $fillable = [
    'description', 'proteins', 'carbohydrates',
    'fats', 'calories'
  ];

  public function diets() {
    return $this->belongsToMany(Diet::class);
  }

}

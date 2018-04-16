<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Food;
use App\User;

class Diet extends Model
{
  protected $fillable = [
    'totalCarbohydrates', 'totalProteins', 'totalFats',     
    'totalCalories', 'register_date', 'description'      
  ];

  public function foods() {
    return $this->belongsToMany(Food::class)
                ->withPivot(
                              'food_calories', 'food_carbohydrates', 
                              'food_fats', 'food_proteins', 'food_grams'
                            );
  }

  public function user() {
    return $this->belongsTo(User::class);
}

}

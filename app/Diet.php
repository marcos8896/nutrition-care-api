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
                              'desiredCalories', 'desiredCarbohydrates', 
                              'desiredFats', 'desiredProteins', 'desiredGrams',
                              'description'
                            );
  }

  public function user() {
    return $this->belongsTo(User::class);
}

}

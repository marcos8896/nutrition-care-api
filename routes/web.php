<?php

use App\Food;
use App\Http\Resources\FoodResource;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/food', function () {
  return FoodResource::collection(Food::all());
});

Route::get('/{id}', function ($id) {
    return new FoodResource(Food::find($id));
});

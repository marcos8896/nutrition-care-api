<?php

use App\Food;
use App\User;
use App\Http\Resources\FoodResource;
use App\Http\Resources\UserResource;


Route::get('/', function () {
    return view('welcome');
});


Route::get('api/food/all', function () {
  return FoodResource::collection(Food::paginate());
});

Route::get('api/food/{id}', function ($id) {
    return new FoodResource(Food::find($id));
});

Route::get('api/user/all', function () {
  return UserResource::collection(User::paginate());
});

Route::get('api/user/{id}', function ($id) {
    return new UserResource(User::find($id));
});

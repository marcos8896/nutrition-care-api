<?php

use App\Food;
use App\User;
use App\Http\Resources\FoodResource;
use App\Http\Resources\UserResource;


Route::get('/', function () {
    return view('welcome');
});

Route::apiResources(['foods' => 'FoodController']);

// Route::get('api/user/all', function () {
//   return UserResource::collection(User::paginate());
// });

// Route::get('api/user/{id}', function ($id) {
//     return new UserResource(User::find($id));
// });

<?php


Route::get('/', function () {
    return view('welcome');
});


// Route::get('api/user/all', function () {
//   return UserResource::collection(User::paginate());
// });

// Route::get('api/user/{id}', function ($id) {
//     return new UserResource(User::find($id));
// });

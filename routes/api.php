<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Authentication's routes.
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

  // 'middleware' => 'api',
  'prefix' => 'auth'

// ], function ($router) {
], function () {

  Route::post('login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');
  Route::post('register', 'AuthController@register');

});

//WareHopes' routes.
Route::apiResources(['foods' => 'FoodController']);
Route::apiResources(['typeroutines' => 'TypeRoutineController']);

Route::get('userprogresses/currentUserProgresses', 
            'UserProgressController@getUserProgressByUserToken');
Route::apiResources(['userprogresses' => 'UserProgressController']);

Route::apiResources(['bodyareas' => 'BodyAreaController']);
Route::apiResources(['days' => 'DayController']);

//Processes' routes.
Route::apiResources(['exercises' => 'ExerciseController']);
Route::apiResources(['routines' => 'RoutineController']);

Route::get('routines/user/{id}', 
            'RoutineController@getRoutinesByUser');




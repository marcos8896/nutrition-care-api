<?php

namespace App\Http\Controllers;

use App\Routine;
use App\RoutineDetail;
use App\Http\Resources\RoutineResource;
use JWTAuth;

use Illuminate\Http\Request;

class RoutineController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return RoutineResource::collection(Routine::with('routineDetails', 'user')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Get the user info through the received token from the request
      $user = JWTAuth::parseToken()->authenticate();
      
      // Validation
      $this->validate($request, [
        'description' => 'required|string',
        'routineDetail' => 'array|required',
      ]);
      
      // Create an insatnce of a new Routine
      $routine = new Routine(
        request(['description'])
      );

      // Add the user_id to the instance
      $routine->user_id = $user->id;
      $routine->state = 'ACTIVO';
      
      // Inserts the instance into the data base
      $routine->save();
      
      // Array to store all routineDetails
      $routineDetails = [];

      // Create and inserts all the details 
      foreach ($request->routineDetail as $day) {
        $routineDetail = new RoutineDetail();

        $routineDetail->routine_id = $routine->id;
        $routineDetail->exercise_id = $day['exercise_id'];
        $routineDetail->day_id = $day['day_id'];
        $routineDetail->series = isset($day['series']) ?: '';
        $routineDetail->reps = isset($day['reps']) ?: '';
        $routineDetail->description = isset($day['description']) ?: '';

        $routineDetail->save();
        
        array_push($routineDetails, $routineDetail);
      }
      
      // Merge the routine and routineDetails in one variable
      $response = [
        'routine' => $routine,
        'routineDetail' => $routineDetails
      ];
      
      // Response sent to the client
      return $this->customResponse('success', $response,  200);

    }
}

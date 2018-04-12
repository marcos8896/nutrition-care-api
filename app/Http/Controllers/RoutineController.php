<?php

namespace App\Http\Controllers;

use App\Routine;
use App\Http\Resources\RoutineResource;

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
}

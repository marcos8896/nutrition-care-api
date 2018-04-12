<?php

namespace App\Http\Controllers;

use App\Day;
use App\Http\Resources\DayResource;

use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DayResource::collection(Day::paginate(10));
    }
}

<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;
use App\Http\Resources\ExerciseResource;


class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return ExerciseResource::collection(Exercise::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //   'name'         => 'required|max:150|string',
        //   'base64_image' => 'required|string'
        // ]);

        // $exercise = new Exercise;
        // $exercise = $request->name;

        // $image = base64_encode(file_get_contents($request->file('base64_image')->pat‌​h()));

        // $exercise->save();

        // return $this->customResponse('success', $food, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        return new ExerciseResource( Exercise::findOrFail($exercise->id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}

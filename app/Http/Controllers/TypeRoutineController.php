<?php

namespace App\Http\Controllers;

use App\TypeRoutine;
use App\Http\Resources\TypeRoutineResource;
use Illuminate\Http\Request;

class TypeRoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TypeRoutineResource::collection(TypeRoutine::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeRoutine  $typeRoutine
     * @return \Illuminate\Http\Response
     */
    public function show(TypeRoutine $typeroutine)
    {
      return new TypeRoutineResource( TypeRoutine::findOrFail($typeroutine->id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeRoutine  $typeRoutine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeRoutine $typeroutine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeRoutine  $typeRoutine
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeRoutine $typeroutine)
    {
        //
    }
}

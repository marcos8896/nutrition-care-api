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
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
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
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'description'   => 'required|max:500|string'
        ]);

        $typeRoutine = new TypeRoutine( request(['description']) );

        $typeRoutine->save();

        return $this->customResponse('success', $typeRoutine, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeRoutine  $typeRoutine
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
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
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function update(Request $request, TypeRoutine $typeroutine)
    {
        $this->validate($request, [
          'description'   => 'required|max:500|string'
        ]);

        $typeroutine->description   = $request->description;
       

        $typeroutine->update();

        return $this->customResponse('success', $typeroutine, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeRoutine  $typeRoutine
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function destroy(TypeRoutine $typeroutine)
    {
        //
    }
}

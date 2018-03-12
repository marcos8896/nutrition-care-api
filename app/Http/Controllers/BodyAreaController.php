<?php

namespace App\Http\Controllers;

use App\BodyArea;
use Illuminate\Http\Request;
use App\Http\Resources\BodyAreaResource;


class BodyAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function index()
    {
        return BodyAreaResource::collection(BodyArea::paginate(10));
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

        $bodyArea = new BodyArea( request(['description']) );

        $bodyArea->save();

        return $this->customResponse('success', $bodyArea, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BodyArea  $bodyArea
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function show(BodyArea $bodyarea)
    {
        return new BodyAreaResource( BodyArea::find($bodyarea->id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BodyArea  $bodyArea
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     * 
     */
    public function update(Request $request, BodyArea $bodyarea)
    {
        $this->validate($request, [
          'description'   => 'required|max:500|string'
        ]);

        $bodyarea->description   = $request->description;
      

        $bodyarea->update();

        return $this->customResponse('success', $bodyarea, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BodyArea  $bodyArea
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function destroy(BodyArea $bodyarea)
    {
        $bodyarea->delete();
        return $this->customResponse('success', $bodyarea, 200);
    }
}

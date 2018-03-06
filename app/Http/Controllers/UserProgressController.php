<?php

namespace App\Http\Controllers;

use App\UserProgress;
use App\Http\Resources\UserProgressResource;

use Illuminate\Http\Request;


class UserProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function index()
    {
        return UserProgressResource::collection(UserProgress::paginate(10));
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
          'weight'          => 'required|numeric',
          'fat_percentage'  => 'required|numeric',
          'fat_kilogram'    => 'required|numeric',
          'muscle_kilogram' => 'required|numeric',
          'progress_date'   => 'date'
        ]);

        $userprogress = new UserProgress(
          request(['weight', 'fat_percentage', 'fat_kilogram', 
                  'muscle_kilogram', 'progress_date']));

        $userprogress->save();

        return $this->customResponse('success', $userprogress, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserProgress  $userprogress
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function show(UserProgress $userprogress)
    {
        return new UserProgressResource( UserProgress::findOrFail($userprogress->id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProgress  $userprogress
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function update(Request $request, UserProgress $userprogress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserProgress  $userprogress
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function destroy(UserProgress $userprogress)
    {
        //
    }
}

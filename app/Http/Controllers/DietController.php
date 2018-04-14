<?php

namespace App\Http\Controllers;

use App\Diet;
use App\Http\Resources\DietResource;
use Illuminate\Http\Request;
use JWTAuth;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return DietResource::collection(Diet::with('foods', 'user')->get());
    }

    /**
     * Store a newly created resource in storage.
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //Attach related selectedFoods to the diet.

      // Get the user info through the received token from the request
      $user = JWTAuth::parseToken()->authenticate();

        $this->validate($request, [
          'totalCarbohydrates' => 'required|numeric',
          'totalProteins'      => 'required|numeric',
          'totalFats'          => 'required|numeric',
          'totalCalories'      => 'required|numeric',
          'register_date'      => 'required|date',
          // 'selectedFoods'      => 'array|required',
          // 'selectedFoods.*.id' => 'required|numeric|distinct',
        ]);

        $diet = new Diet(request(['totalCarbohydrates', 'totalProteins', 'totalFats', 
                                  'totalCalories', 'register_date']));

        $diet->user_id = $user->id;
        $diet->status = 'ACTIVO';

        $diet->save();

        return $this->customResponse('success', $diet, 200);


    }

    /**
     * Display the specified resource.
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     *
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function show(Diet $diet)
    {
      return new DietResource( Diet::find($diet->id) );
    }

    /**
     * Update the specified resource in storage.
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diet $diet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     *
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diet $diet)
    {
        //
    }
}

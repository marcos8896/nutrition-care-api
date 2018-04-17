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
          'description'        => 'string|required',
          'totalCarbohydrates' => 'required|numeric',
          'totalProteins'      => 'required|numeric',
          'totalFats'          => 'required|numeric',
          'totalCalories'      => 'required|numeric',
          'register_date'      => 'required|date',
          'selectedFoods'      => 'array|required',
          'selectedFoods.*.food_id' => 'required|numeric|distinct',
        ]);

        $diet = new Diet(request(['totalCarbohydrates', 'totalProteins', 'totalFats', 
                                  'totalCalories', 'register_date', 'description']));

        $diet->user_id = $user->id;
        $diet->status = 'ACTIVO';

        //Get id property from every selectedBodyArea object in the selectedBodyAreas array.
        $selectedFoods = ($request->selectedFoods);
        
        $diet->save();
        
        // //Make the relationship between the new diet and its related foods.
        for ($i=0; $i < sizeOf($selectedFoods); $i++) {
          $diet->foods()->attach( $selectedFoods[$i]['food_id'], [
            'desiredCalories' => $selectedFoods[$i]['desiredCalories'],
            'desiredCarbohydrates' => $selectedFoods[$i]['desiredCarbohydrates'],
            'desiredFats' => $selectedFoods[$i]['desiredFats'],
            'desiredProteins' => $selectedFoods[$i]['desiredProteins'],
            'desiredGrams' => $selectedFoods[$i]['desiredGrams'],
            'description' => $selectedFoods[$i]['description'],
          ]);

        }
          
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
      $user = JWTAuth::parseToken()->authenticate();

      return new DietResource( 
        Diet::where('user_id', $user->id)
        ->where('id', $diet->id)
        ->first()
      );
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


    /**
     * Get user diets through request token.
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     *
     * @param  \App\Diet 
     * @return \Illuminate\Http\Response
     */
    public function getDietsThroughUserToken() {

      $user = JWTAuth::parseToken()->authenticate();
      
      //Check later how to avoid Lazy Loading.
      $diets = $user->diets;
      return $this->customResponse('success', $diets, 200);

    }

}

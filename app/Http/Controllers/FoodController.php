<?php

namespace App\Http\Controllers;

use App\Food;
use App\Http\Resources\FoodResource;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FoodResource::collection(Food::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $this->validate($request, [
          'description'   => 'required|max:500|string',
          'proteins'      => 'required|numeric',
          'carbohydrates' => 'required|numeric',
          'fats'          => 'required|numeric',
          'calories'      => 'required|numeric'
        ]);

        $food = new Food(
          request(['description', 'proteins', 'carbohydrates', 
                   'fats', 'calories']));

        $food->save();

        return response($food, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return new FoodResource(
          Food::findOrFail($food->id)
      );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $this->validate($request, [
          'description'   => 'required|max:500|string',
          'proteins'      => 'required|numeric',
          'carbohydrates' => 'required|numeric',
          'fats'          => 'required|numeric',
          'calories'      => 'required|numeric'
        ]);

        $food->description   = $request->description;
        $food->proteins      = $request->proteins;
        $food->carbohydrates = $request->carbohydrates;
        $food->fats          = $request->fats;
        $food->calories      = $request->calories;

        $food->update();

        return response($food, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return $this->customResponse('success', $food, 200);
    }
}

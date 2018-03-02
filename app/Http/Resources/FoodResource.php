<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FoodResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'description' => $this->description,
        'proteins' => $this->proteins,
        'carbohydrates' => $this->carbohydrates,
        'fats' => $this->fats,
        'calories' => $this->calories,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
      ];
    }
}

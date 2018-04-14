<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DietResource extends Resource
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
        'user_id' => $this->user,
        'totalCarbohydrates' => $this->totalCarbohydrates,
        'totalProteins' => $this->totalProteins,
        'totalFats' => $this->totalFats,
        'totalCalories' => $this->totalCalories,
        'status' => $this->status,
        'register_date' => $this->register_date,
        'foods' => $this->foods,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
      ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\User;

class UserProgressResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $this->resource->load('user');

        return [
          'id' => $this->id,
          'weight' => $this->weight,
          'fat_percentage' => $this->fat_percentage,
          'fat_kilogram' => $this->fat_kilogram,
          'muscle_kilogram' => $this->muscle_kilogram,
          'progress_date' => $this->progress_date,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
          // 'owner' => $this->whenLoaded('user')
          'owner' => $this->user
        ];
    }
}

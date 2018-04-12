<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RoutineResource extends Resource
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
            'state' => $this->state,
            'routine_detail' => $this->whenLoaded('routineDetails'),
            'user_info' => $this->whenLoaded('user'),
        ];
    }
}

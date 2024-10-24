<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CabinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $index = $this->cabinlevels_id - 1;
        return [
            "name" => $this->name,
            "cabinlevel_id" =>chr(65 + $index),
            "capacity" =>$this->capacity
        ];
    }
}

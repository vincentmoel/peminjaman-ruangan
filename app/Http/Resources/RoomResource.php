<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'code'          => $this->code,
            'department'    => $this->department->name,
            'name'          => $this->name,
            'floor'         => $this->floor
        ];
    }

    public function with($request)
    {
        return ['message' => 'success'];
    }
}

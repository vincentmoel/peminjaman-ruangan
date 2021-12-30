<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
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
            'id'            => $this->id,
            'room'          => $this->room->name,
            'division'      => $this->division->name,
            'borrower_name' => $this->borrower_name,
            'phone'         => $this->phone,
            'from_date'     => $this->from_date,
            'until_date'    => $this->until_date,
            'description'   => $this->description,
            'note'          => $this->note
        ];
    }

    public function with($request)
    {
        return ['message' => 'success'];
    }
}

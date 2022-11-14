<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'rate'        => $this->rate,
            'country'     => $this->country->name,
            'location'    => $this->location->name,
            'created_at'  => $this->created_at,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $default = 'en';
        $locale = $default;
        if(session()->get('locale')) $locale = session()->get('locale');
        return [
            'id' => $this->id,
            'code_saq' => $this->code_saq,
            'name' => $this->name,
            'size' => $this->size,
            'price' => $this->price,
            'photo' => $this->photo,
            'user_id' => $this->user_id,
            'type' => isset(json_decode($this->type)->$locale) && json_decode($this->type)->$locale != ""? json_decode($this->type)->$locale : json_decode($this->type)->$default,
            'country' =>  isset(json_decode($this->country)->$locale) && json_decode($this->country)->$locale != ""? json_decode($this->country)->$locale : json_decode($this->country)->$default
        ];
    }
}

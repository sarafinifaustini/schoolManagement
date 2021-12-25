<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'parentName'=>$this->parentName,
            'phoneNumber'=>$this->phoneNumber,
            'email'=>$this->email,
            'yearJoined'=>$this->yearJoined,
            'yob'=>$this->yob,
            'section_id'=>$this->section_id,
            'class_id'=>$this->class_id,
            'created_at'=>$this->created_at->toFormattedDateString(),
               ];
    }
}

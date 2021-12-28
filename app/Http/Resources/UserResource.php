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
            'age'=>date_diff(date_create($this->yob), date_create('now'))->y,
            'section'=>$this->section->name,
            'class'=>$this->class->name,
            'created_at'=>$this->created_at->toFormattedDateString(),
               ];
    }
}

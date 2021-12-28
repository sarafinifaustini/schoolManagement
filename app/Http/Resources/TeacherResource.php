<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'email'=>$this->email,
            'subject'=>$this->subject->name,
            'section'=>$this->section->name,
             'class'=>$this->class->name,
            'created_at'=>$this->created_at->toFormattedDateString(),
               ];
    }
}

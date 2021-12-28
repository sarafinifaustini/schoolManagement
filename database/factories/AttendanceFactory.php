<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {$subject_id=rand(1,5);
        return [
            'status' => 'present',
            'subject_id'=>$subject_id,
            'user_id'=>'1',

        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name' => $this->faker->name,
            'email' => $this->faker->email,
            'subject'=>'Geography',
                        //  'phoneNumber' => '0712345678',
            // 'parentName' => 'parent@gmail.com',
            // 'yoB'=>'1998',
            // 'section_id'=>'L-Stream',
            // 'yearJoined'=>'2000',
             'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //  'remember_token' => Str::random(10),
         ];
    }
}

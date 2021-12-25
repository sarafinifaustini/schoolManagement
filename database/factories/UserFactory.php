<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
// protected $model = User::class;

    public function definition()

    {
        $class_id=rand(1,4);
        $section_id = Section::where('class_id',$class_id)->first();
        return [
           'name' => $this->faker->name,
            'email' => $this->faker->email,
             'phoneNumber' => $this->faker->phoneNumber,
            'parentName' => $this->faker->name,
            'yoB'=>$this->faker->year,
            'class_id' => $class_id,
            'section_id' => 'D',
            'yearJoined'=>$this->faker->year,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
         ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

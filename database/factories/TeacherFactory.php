<?php

namespace Database\Factories;

use App\Models\Section;
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
         $class_id=rand(1,4);
        $section_id = Section::where('class_id',$class_id)->first();
 $subject_id=rand(1,5);
        return [
           'name' => $this->faker->name,
            'email' => $this->faker->email,
            'subject_id'=>$subject_id,
                        //  'phoneNumber' => '0712345678',
            // 'parentName' => 'parent@gmail.com',
            // 'yoB'=>'1998',
            // 'section_id'=>'L-Stream',
            // 'yearJoined'=>'2000',
            'class_id' => $class_id,
             'section_id' => Section::where('class_id',$class_id)->first()->id,
             'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //  'remember_token' => Str::random(10),
         ];
    }
}

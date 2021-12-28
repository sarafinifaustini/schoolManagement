<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subject = [
            [
                'name' => 'Geography',
            ],
            [
                'name' => 'Math',
            ],
            [
                'name' => 'Chemistry',
            ],
            [
                'name' => 'Physics',
            ],
             [
                'name' => 'Biology',
            ],


        ];
        Subject::insert($subject);
    }
}

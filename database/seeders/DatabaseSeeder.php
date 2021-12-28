<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ClassesSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\SectionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //   $this->call(AddDummyEvent::class);
        //   $this->call(ClassesSeeder::class);
        //   $this->call(SectionsSeeder::class);
        //   $this->call(SubjectSeeder::class);

            // \App\Models\User::factory(100)->create();
            // \App\Models\Attendance::factory(5)->create();

         \App\Models\Teacher::factory(10)->create();


            // \App\Models\Admin::factory(1)->create();


    }
}

<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Calendar;
use Illuminate\Database\Seeder;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $data = [
        	['event_name'=>'Demo Event-1', 'start_date'=>'2021-07-11', 'end_date'=>'2021-07-12'],
        	['event_name'=>'Demo Event-2', 'start_date'=>'2021-07-11', 'end_date'=>'2021-07-13'],
        	['event_name'=>'Demo Event-3', 'start_date'=>'2021-07-14', 'end_date'=>'2021-07-14'],
        	['event_name'=>'Demo Event-3', 'start_date'=>'2021-07-17', 'end_date'=>'2021-07-17'],
        ];
        foreach ($data as $key => $value) {
        	Calendar::create($value);
        }
    }
}

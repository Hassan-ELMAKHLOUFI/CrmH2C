<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Upcoming;
use Illuminate\Support\str;

class UpcomingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $fake =\Faker\Factory::create();
       for($i = 0; $i<5 ; $i++){
           Upcoming::create([
               'completed' =>false ,
               'title' => $fake->sentence ($nbWords = 4,$varialbeWords=false ),
               'approved' =>false ,
               'deadline' => $fake->date ,
               'waiting' => true ,
               'project_id'=>$i+1
           ]);
       }
    }
}

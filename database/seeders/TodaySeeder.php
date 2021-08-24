<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Today;
use Illuminate\Support\str;



class TodaySeeder extends Seeder
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
            Today::create([
                'complated' =>false ,
                'title' => $fake->sentence ($nbWords = 4,$varialbeWords=false ),
                'approved' =>false ,
               
                'taskId' => str::random(10)
            ]);
        }
    }
}

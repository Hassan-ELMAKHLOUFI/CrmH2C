<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\project;

class projectSeeder extends Seeder
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
            project::create([
                'name' =>$fake->name,
                'description' => $fake->sentence ($nbWords = 4,$varialbeWords=false ),
                'finished' =>false  ,
                'user_id'=>$i+1
            ]);
        }
    }
}

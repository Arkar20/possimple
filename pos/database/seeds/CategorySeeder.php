<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
        // @return void

    public function run()
    {

        $faker=Faker::create();

        foreach(range(1,20) as $index){
            DB::table('categories')->insert([
                'name' => $faker->name,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
       
    }
}

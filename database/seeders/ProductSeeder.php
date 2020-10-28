<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,200) as $index) {
	        DB::table('products')->insert([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'user_id' => User::all()->random()->user_id,
	    
	        ]);
    };
    }
}

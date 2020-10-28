<?php


namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      

foreach (range(1,10) as $index) {
    $faker = Faker::create();
    foreach (range(1,200) as $index) {
        DB::table('categories')->insert([
            'name' => $faker->word,
          
    
        ]);
};
}
    }
}

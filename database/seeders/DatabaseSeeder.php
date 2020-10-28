<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class
        ]);
        /*
$products = App\Models\Product::all();
// Populate the pivot table
App\Models\User::all()->each(function ($user) use ($products) { 
    $user->products()->attach(
        $roles->random(rand(1, 50))->pluck('user_id')->toArray()
    ); 
});
*/
    }    
    }


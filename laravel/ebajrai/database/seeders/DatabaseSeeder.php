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
<<<<<<< Updated upstream
        // \App\Models\User::factory(10)->create();
=======
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ShopTableSeeder::class);
>>>>>>> Stashed changes
    }
}

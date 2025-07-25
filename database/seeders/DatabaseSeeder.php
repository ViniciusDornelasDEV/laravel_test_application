<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();        
         $this->call([
            \Modules\Auth\database\seeders\AuthDatabaseSeeder::class,
            \Modules\Product\database\seeders\CategorySeeder::class,
            \Modules\Product\database\seeders\ProductSeeder::class,
        ]);
    }
}

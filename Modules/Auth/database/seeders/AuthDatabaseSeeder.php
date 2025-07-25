<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;

class AuthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]);
        
        User::create([
            'name' => 'Atendente',
            'email' => 'atendente@atendente.com',
            'password' => bcrypt('123'),
            'role' => 'attendant'
        ]);
    }
}

<?php

namespace Modules\Product\Database\Seeders;
use Modules\Product\Models\Category;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Hambúrgueres', 'order' => 1, 'status' => 'ativo'],
            ['name' => 'Porções',     'order' => 2, 'status' => 'ativo'],
            ['name' => 'Bebidas',     'order' => 3, 'status' => 'ativo'],
            ['name' => 'Sobremesas',  'order' => 4, 'status' => 'ativo'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}

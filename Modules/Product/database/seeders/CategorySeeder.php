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
            ['name' => 'Hambúrgueres', 'order' => 1, 'active' => true],
            ['name' => 'Porções',     'order' => 2, 'active' => true],
            ['name' => 'Bebidas',     'order' => 3, 'active' => true],
            ['name' => 'Sobremesas',  'order' => 4, 'active' => true],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}

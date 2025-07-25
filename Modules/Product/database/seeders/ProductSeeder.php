<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;
use Modules\Product\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pegue os IDs das categorias (por ordem)
        $categories = Category::orderBy('order')->get();

        // Produtos
        $products = [
            // Hamburgueres
            [
                'category' => 'Hambúrgueres',
                'items' => [
                    [
                        'name' => 'X-Burguer',
                        'order' => 1,
                        'active' => true,
                        'code' => 100,
                        'price' => 15.00,
                        'sales_locations' => ['Caixa', 'Site', 'App', 'Ifood'],
                        'description' => 'Hambúrguer, queijo, pão, maionese.',
                        'photo' => null,
                    ],
                    [
                        'name' => 'X-Salada',
                        'order' => 2,
                        'active' => true,
                        'code' => 101,
                        'price' => 18.00,
                        'sales_locations' => ['Caixa', 'Site', 'App'],
                        'description' => 'Hambúrguer, queijo, salada, pão, maionese.',
                        'photo' => null,
                    ],
                    [
                        'name' => 'X-Bacon',
                        'order' => 3,
                        'active' => true,
                        'code' => 102,
                        'price' => 20.00,
                        'sales_locations' => ['Caixa', 'Site'],
                        'description' => 'Hambúrguer, queijo, bacon, pão, maionese.',
                        'photo' => null,
                    ],
                ]
            ],
            // Porções
            [
                'category' => 'Porções',
                'items' => [
                    [
                        'name' => 'Batata Frita',
                        'order' => 1,
                        'active' => true,
                        'code' => 200,
                        'price' => 12.00,
                        'sales_locations' => ['Caixa', 'Site', 'App', 'Ifood'],
                        'description' => 'Batata frita crocante.',
                        'photo' => null,
                    ],
                ]
            ],
            // Bebidas
            [
                'category' => 'Bebidas',
                'items' => [
                    [
                        'name' => 'Refrigerante Lata',
                        'order' => 1,
                        'active' => true,
                        'code' => 300,
                        'price' => 6.00,
                        'sales_locations' => ['Caixa', 'App'],
                        'description' => 'Refrigerante diversos sabores.',
                        'photo' => null,
                    ],
                    [
                        'name' => 'Água Mineral',
                        'order' => 2,
                        'active' => true,
                        'code' => 301,
                        'price' => 4.00,
                        'sales_locations' => ['Caixa', 'App'],
                        'description' => 'Água mineral sem gás.',
                        'photo' => null,
                    ],
                ]
            ],
            // Sobremesas
            [
                'category' => 'Sobremesas',
                'items' => [
                    [
                        'name' => 'Sorvete',
                        'order' => 1,
                        'active' => true,
                        'code' => 400,
                        'price' => 10.00,
                        'sales_locations' => ['Caixa'],
                        'description' => 'Sorvete de diversos sabores.',
                        'photo' => null,
                    ],
                ]
            ],
        ];

        foreach ($products as $group) {
            $category = $categories->firstWhere('name', $group['category']);
            if ($category) {
                foreach ($group['items'] as $prod) {
                    Product::create(array_merge($prod, [
                        'category_id' => $category->id,
                    ]));
                }
            }
        }
    }
}

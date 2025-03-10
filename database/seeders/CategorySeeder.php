<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [            
                'id' => 1,
                'name' => 'Tacos',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [            
                'id' => 2,
                'name' => 'Ramenbirria',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [            
                'id' => 3,
                'name' => 'Bebidas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [            
                'id' => 4,
                'name' => 'Extras',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [            
                'id' => 5,
                'name' => 'Combos',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [            
                'id' => 6,
                'name' => 'Otros',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}

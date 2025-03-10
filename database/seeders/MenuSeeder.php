<?php

namespace Database\Seeders;

use App\Enum\CochinitaPibilEnum;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [

            // Tacos
            [
                'id' => 1,
                'category_id' => 1,
                'name' => 'Quesabirrias',
                'description' => null,
                'price' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'name' => 'Suadero',
                'description' => null,
                'price' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'name' => 'Pastor',
                'description' => null,
                'price' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'name' => CochinitaPibilEnum::ORDEN_4,
                'description' => null,
                'price' => 260,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'category_id' => 1,
                'name' => CochinitaPibilEnum::ORDEN_6,
                'description' => null,
                'price' => 380,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'category_id' => 1,
                'name' => CochinitaPibilEnum::ORDEN_12,
                'description' => null,
                'price' => 700,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Ramenbirrias
            [
                'id' => 7,
                'category_id' => 2,
                'name' => '32 onzas',
                'description' => null,
                'price' => 200,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'category_id' => 2,
                'name' => '60 onzas',
                'description' => null,
                'price' => 340,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Bebidas
            [
                'id' => 9,
                'category_id' => 3,
                'name' => 'Gaseosa 355ml',
                'description' => null,
                'price' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'category_id' => 3,
                'name' => 'Te de limon 500ml',
                'description' => null,
                'price' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 11,
                'category_id' => 3,
                'name' => 'Batidos naturales',
                'description' => null,
                'price' => 45,
                'created_at' => now(),
                'updated_at' => now()
            ],

            //Especiales
            [
                'id' => 12,
                'category_id' => 6,
                'name' => 'Meganachobirria',
                'description' => null,
                'price' => 280,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 13,
                'category_id' => 6,
                'name' => 'Mega torta de Birria',
                'description' => null,
                'price' => 260,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 14,
                'category_id' => 6,
                'name' => 'Dedos de queso con papas',
                'description' => null,
                'price' => 200,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Extras
            [
                'id' => 15,
                'category_id' => 4,
                'name' => 'Papas',
                'description' => null,
                'price' => 70,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 16,
                'category_id' => 4,
                'name' => 'Queso',
                'description' => null,
                'price' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 17,
                'category_id' => 4,
                'name' => 'Frijoles molidos',
                'description' => null,
                'price' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 18,
                'category_id' => 4,
                'name' => 'Cebolla Encurtida',
                'description' => null,
                'price' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 19,
                'category_id' => 4,
                'name' => 'Caldo birria 16 onzas',
                'description' => null,
                'price' => 90,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 20,
                'category_id' => 4,
                'name' => 'Cebolla con cilantro',
                'description' => null,
                'price' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Combos
            [
                'id' => 21,
                'category_id' => 5,
                'name' => 'Taquiza Mixta',
                'description' => 'Orden de 12 tacos 4 Quesabirrias 4 Tacos al pastor 4 Suadero',
                'price' => 730,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 22,
                'category_id' => 5,
                'name' => 'Entre compas',
                'description' => 'Orden de 12 Quesabirrias 2 Ramenbirria 32 oz 1 bebida 1 lts Extra de frijoles molidos y salsa roja',
                'price' => 1100,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($menu as $mn) {
            Menu::updateOrCreate($mn);
        }
    }
}

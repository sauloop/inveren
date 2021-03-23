<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['name' => 'Vivienda']);
        Category::factory()->create(['name' => 'Coche']);
        Category::factory()->create(['name' => 'Local']);
        Category::factory()->create(['name' => 'Colección']);
        Category::factory()->create(['name' => 'Bolsa']);
        Category::factory()->create(['name' => 'Terreno']);
        Category::factory()->create(['name' => 'Moto']);
    }
}

<?php

namespace Database\Seeders;

use \App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory()->create(['name' => 'Álava']);
        City::factory()->create(['name' => 'Albacete']);
        City::factory()->create(['name' => 'Alicante']);
        City::factory()->create(['name' => 'Almería']);
        City::factory()->create(['name' => 'Asturias']);
        City::factory()->create(['name' => 'Ávila']);
        City::factory()->create(['name' => 'Badajoz']);
        City::factory()->create(['name' => 'Baleares']);
        City::factory()->create(['name' => 'Barcelona']);
        City::factory()->create(['name' => 'Burgos']);
        City::factory()->create(['name' => 'Cáceres']);
        City::factory()->create(['name' => 'Cádiz']);
        City::factory()->create(['name' => 'Cantabria']);
        City::factory()->create(['name' => 'Castellón']);
        City::factory()->create(['name' => 'Ceuta']);
        City::factory()->create(['name' => 'Ciudad Real']);
        City::factory()->create(['name' => 'Córdoba']);
        City::factory()->create(['name' => 'Cuenca']);
        City::factory()->create(['name' => 'Gerona']);
        City::factory()->create(['name' => 'Granada']);
        City::factory()->create(['name' => 'Guadalajara']);
        City::factory()->create(['name' => 'Guipúzcoa']);
        City::factory()->create(['name' => 'Huelva']);
        City::factory()->create(['name' => 'Huesca']);
        City::factory()->create(['name' => 'Jaén']);
        City::factory()->create(['name' => 'La Coruña']);
        City::factory()->create(['name' => 'La Rioja']);
        City::factory()->create(['name' => 'Las Palmas']);
        City::factory()->create(['name' => 'León']);
        City::factory()->create(['name' => 'Lérida']);
        City::factory()->create(['name' => 'Lugo']);
        City::factory()->create(['name' => 'Madrid']);
        City::factory()->create(['name' => 'Málaga']);
        City::factory()->create(['name' => 'Melilla']);
        City::factory()->create(['name' => 'Murcia']);
        City::factory()->create(['name' => 'Navarra']);
        City::factory()->create(['name' => 'Orense​']);
        City::factory()->create(['name' => 'Palencia']);
        City::factory()->create(['name' => 'Pontevedra']);
        City::factory()->create(['name' => 'Salamanca']);
        City::factory()->create(['name' => 'Segovia']);
        City::factory()->create(['name' => 'Sevilla']);
        City::factory()->create(['name' => 'Soria']);
        City::factory()->create(['name' => 'Tarragona']);
        City::factory()->create(['name' => 'Tenerife']);
        City::factory()->create(['name' => 'Teruel']);
        City::factory()->create(['name' => 'Toledo']);
        City::factory()->create(['name' => 'Valencia']);
        City::factory()->create(['name' => 'Valladolid']);
        City::factory()->create(['name' => 'Vizcaya']);
        City::factory()->create(['name' => 'Zamora']);
        City::factory()->create(['name' => 'Zaragoza']);
    }
}

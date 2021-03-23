<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Link;
use App\Category;
use Illuminate\Support\Facades\DB;

class LinksTableSeeder extends Seeder
{
    protected $categories;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fetchRelations();
        foreach (range(1, 100) as $i) {
            $this->createLink();
        }


        //   factory(Link::class)->times(10)->create();
    }

    protected function fetchRelations()
    {
        $this->categories = Category::all();
    }

    protected function createLink()
    {
        // $cat = DB::select('SELECT id FROM categories WHERE name="Local"');

        // DB::table('links')->insert([
        //     'title' => 'Test',
        //     'category_id' => $cat[0]->id,
        // ]);


        $link = Link::factory()->create([
            //   'title' => 'Enlace prueba',
            'category_id' => $this->categories->random()->id,
            'price' => rand(100, 5000),
            'created_at' => now()->subDays(rand(1, 90)),
            'url' => 'https://www.w3schools.com/php/func_math_rand.asp',
        ]);
    }
}

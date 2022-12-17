<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            [
                'name' => 'Adults Cake Toppers',
                'slug' => 'adults-cake-toppers',
                'banner' => 'banners/adults.jpg',
                'description' => 'Adults Cake Toppers Category',
            ],
            [
                'name' => 'Girls And Boys Toppers',
                'slug' => 'girls-and-boys-toppers',
                'banner' => 'banners/girlsandboys.jpg',
                'description' => 'Girls And Boys Toppers Category'
            ],
            [
                'name' => 'Graduation Party',
                'slug' => 'graduation-party',
                'banner' => 'banners/graduation.jpg',
                'description' => 'Graduation Party Category'
            ],
            [
                'name' => 'Wedding Cake Toppers',
                'slug' => 'wedding-cake-toppers',
                'banner' => 'banners/wedding.jpg',
                'description' => 'Wedding Cake Toppers Category'
            ],
            [
                'name' => 'Print PDF / Cupcake Tops',
                'slug' => 'print-pdf-cupcake-tops',
                'banner' => 'banners/adults.jpg',
                'description' => 'Print PDF / Cupcake Tops Category'
            ],

        );
        $user = \App\Models\User::create([
            'name' => 'khary',
            'surname' => 'goarts',
            'email' => 'admin@email.com',

        ]);
        \App\Models\Credentials::create([
            'user_id' => $user->id,
            'username' => 'admin',
            'password' => '$2y$10$St2/CwquPg3nergOLWNHfu4C/uXQbmePr0qRtxB9P0oVof3YfZLRK',
            'type' => 'admin',

        ]);

        // \App\Models\ShoppingSession::create([
        //     'user_id' => $user->id,
        //     'total' => 0
        // ]);
    
        \App\Models\User::factory()->count(3)->has(\App\Models\Credentials::factory())->create();
        foreach($categories as $category){
            $prodNr = 0;
            \App\Models\ProductCategories::factory()->state(function($attr) use ($category){
                return [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'slug' => $category['slug'],
                    'banner' => $category['banner']
                ];
            })
            // ->create();
            ->has(
                \App\Models\Product::factory()->count(3)
                ->has(
                    \App\Models\ProductMedia::factory()->count(3)->state(function($attr, $prod) use($prodNr){                        
                        $attr = array();
                        $str = 'gallery/'.$prod->id.'/{b}.jpg';
                        $attr['name'] = $str;
                        $attr['uri'] = $str;
                        $attr['url'] = $str;

                        return $attr;
                    })
                )
            )->create();
            
            // $cat = \App\Models\ProductCategories::create([
            //     'name' => $category['name'],
            //     'description' => $category['description']
            // ]);


        }
    }
}

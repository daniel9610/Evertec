<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create random images to items
        DB::table('pictures')->insert([
            'id' => 1,
            'location' => 'https://picsum.photos/200/300?random=1',
            'type' => 2,           
        ]);

        DB::table('pictures')->insert([
            'id' => 2,
            'location' => 'https://picsum.photos/200/300?random=2',
            'type' => 2,           
        ]);

        DB::table('pictures')->insert([
            'id' => 3,
            'location' => 'https://picsum.photos/200/300?random=3',
            'type' => 2,           
        ]);

        DB::table('pictures')->insert([
            'id' => 4,
            'location' => 'https://picsum.photos/200/300?random=4',
            'type' => 2,           
        ]);

        DB::table('pictures')->insert([
            'id' => 5,
            'location' => 'https://picsum.photos/200/300?random=5',
            'type' => 2,           
        ]);

        DB::table('pictures')->insert([
            'id' => 6,
            'location' => 'https://picsum.photos/200/300?random=6',
            'type' => 2,           
        ]);

        DB::table('pictures')->insert([
            'id' => 7,
            'location' => 'https://picsum.photos/200/300?random=7',
            'type' => 2,           
        ]);

        // create test items
        DB::table('items')->insert([
            'name' => 'Product 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 300000,
            'stock' => 10,
            'picture_id' => 1,            
        ]);

        DB::table('items')->insert([
            'name' => 'Product 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 400000,
            'stock' => 10,
            'picture_id' => 2,            
        ]);

        DB::table('items')->insert([
            'name' => 'Product 3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 450000,
            'stock' => 10,
            'picture_id' => 3,            
        ]);

        DB::table('items')->insert([
            'name' => 'Product 4',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 200000,
            'stock' => 10,
            'picture_id' => 4,            
        ]);

        DB::table('items')->insert([
            'name' => 'Product 5',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 230000,
            'stock' => 10,
            'picture_id' => 5,            
        ]);

        DB::table('items')->insert([
            'name' => 'Product 6',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 600000,
            'stock' => 10,
            'picture_id' => 6,            
        ]);

        DB::table('items')->insert([
            'name' => 'Product 7',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 900000,
            'stock' => 10,
            'picture_id' => 7,            
        ]);
    }
}

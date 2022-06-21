<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => "trouser",
            'price' => '1000',
            'description' => 'color : blue , size : M ',
            'image' => '2033277335.jpg',
]);
        DB::table('products')->insert([
            'name' => "pullover",
            'price' => '5000',
            'description' => 'color : pink , size : L ',
            'image' => '2033277335.jpg',
        ]);
        DB::table('products')->insert([
            'name' => "travelbag",
            'price' => '4000',
            'description' => 'color : yellow , size : S ',
            'image' => '2033277335.jpg',
        ]);
        DB::table('products')->insert([
            'name' => "handbag",
            'price' => '2000',
            'description' => 'color : red , size : XS ',
            'image' => '2033277335.jpg',
        ]);
        DB::table('products')->insert([
            'name' => "jacket",
            'price' => '6500',
            'description' => 'color : brown , size : XL  ',
            'image' => '2033277335.jpg',
        ]);
        DB::table('products')->insert([
            'name' => "coat",
            'price' => '4500',
            'description' => 'color : dark green , size : M  ',
            'image' => '2033277335.jpg',
        ]);
    }
}

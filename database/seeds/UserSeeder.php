<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'name' => "farah",
            'email' => 'farahalomrany@gmail.com',
            'password' => bcrypt('123456789'),
            'phonenumber' => '5432016',
        ]);
           DB::table('users')->insert([
            'name' => "loujain",
            'email' => 'loujain@gmail.com',
            'password' => bcrypt('123456789'),
            'phonenumber' => '5432012',
        ]);
            DB::table('users')->insert([
            'name' => "ahmad",
            'email' => 'ahmad@gmail.com',
            'password' => bcrypt('123456789'),
            'phonenumber' => '5432016',
        ]);
             DB::table('users')->insert([
            'name' => "ghadeer",
            'email' => 'ghadeer@gmail.com',
            'password' => bcrypt('123456789'),
            'phonenumber' => '5432016',
        ]);
              DB::table('users')->insert([
            'name' => "fadi",
            'email' => 'fadi@gmail.com',
            'password' => bcrypt('123456789'),
            'phonenumber' => '5432016',
        ]);
               DB::table('users')->insert([
            'name' => "samar",
            'email' => 'samar@gmail.com',
            'password' => bcrypt('123456789'),
            'phonenumber' => '5432016',
        ]);
         

    }
}

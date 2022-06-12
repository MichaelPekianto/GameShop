<?php

namespace Database\Seeders;

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
        \DB::table('users')->insert([
            'name' => 'admina',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'gender' => 'Male',
            'DOB' => '2001-1-1',
            'user_role' => 'admin'
        ]);
        \DB::table('users')->insert([
            'name' => 'Agung',
            'email' => 'agung@gmail.com',
            'password' => bcrypt('agung123'),
            'gender' => 'Male',
            'DOB'=>'2001-2-28',
            'user_role'=> 'member'
        ]);
    }
}

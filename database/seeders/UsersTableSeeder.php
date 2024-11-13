<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'मानसरोवर नेपाल',
            'email'=>'superadmin@gmail.com',
            'password'=>bcrypt('admin@123'),
            'role_super' => 1,
        ]);
        User::create([
            'name'=>'मानसरोवर नेपाल',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
        ]);
      
    }
}

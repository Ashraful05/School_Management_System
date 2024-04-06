<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name'=>'Ashraf',
           'user_type'=>'Admin',
           'email'=>'admin@gmail.com',
           'password'=>Hash::make('ashraful5'),
            'image'=>'2024_03_011532.png'
        ]);
    }
}

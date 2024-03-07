<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i=0;$i<5;$i++){
            StudentClass::create([
                'name'=>$faker->name,
                'phone_no'=>fake()->unique()->e164PhoneNumber()
            ]);
        }
    }
}

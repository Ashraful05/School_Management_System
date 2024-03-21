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
//        $faker = Factory::create();
//        for($i=0;$i<5;$i++){
//            StudentClass::create([
//                'name'=>$faker->name,
//                'phone_no'=>fake()->unique()->e164PhoneNumber()
//            ]);
//        }

        $classes = [
          ['name'=>'Class One'],
          ['name'=>'Class Two'],
          ['name'=>'Class Three'],
          ['name'=>'Class Four'],
          ['name'=>'Class Five'],
          ['name'=>'Class Six'],
          ['name'=>'Class Seven'],
          ['name'=>'Class Eight'],
          ['name'=>'Class Nine'],
          ['name'=>'Class Ten'],
        ];
        StudentClass::insert($classes);
    }
}

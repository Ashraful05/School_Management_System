<?php

namespace Database\Seeders;

use App\Models\StudentYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StudentYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $years = [
//            'year_name'=>2020,
//            'year_name'=>2021,
//            'year_name'=>2022,
//            'year_name'=>2023,
//            'year_name'=>2024,
//        ];
//        foreach ($years as $year){
//            StudentYear::insert([
//               'year_name'=>$year->year_name
//            ]);
//        }
        DB::table('student_years')->delete();
        $years = [
            ['year_name'=>'2019'],
            ['year_name'=>'2020'],
            ['year_name'=>'2021'],
            ['year_name'=>'2022'],
            ['year_name'=>'2023'],
            ['year_name'=>'2024'],
        ];
        StudentYear::insert($years);
    }
}

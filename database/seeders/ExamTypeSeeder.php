<?php

namespace Database\Seeders;

use App\Models\ExamType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamType::insert([
            ['name'=>'1st Terminal'],
            ['name'=>'2nd Terminal'],
            ['name'=>'3rd Terminal'],
        ]);
    }
}

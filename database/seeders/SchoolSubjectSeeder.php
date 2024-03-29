<?php

namespace Database\Seeders;

use App\Models\SchoolSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolSubject::insert([
            ['name'=>'Health'],
            ['name'=>'English'],
            ['name'=>'Bangla'],
            ['name'=>'Math'],
            ['name'=>'Science'],
            ['name'=>'General Knowledge'],
            ['name'=>'Physics'],
            ['name'=>'Chemistry'],
            ['name'=>'History'],
            ['name'=>'Agriculture'],
            ['name'=>'Commerce'],
            ['name'=>'Humanities'],
            ['name'=>'Geography'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\StudentGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            ['group_name'=>'Science'],
            ['group_name'=>'Commerce'],
            ['group_name'=>'Arts'],
        ];
        StudentGroup::insert($groups);

    }
}

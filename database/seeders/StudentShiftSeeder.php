<?php

namespace Database\Seeders;

use App\Models\StudentShift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts = [
            ['shift_name'=>'Shift A'],
            ['shift_name'=>'Shift B'],
            ['shift_name'=>'Shift C']
        ];
        StudentShift::insert($shifts);
    }
}

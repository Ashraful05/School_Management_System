<?php

namespace Database\Seeders;

use App\Models\StudentFeeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentFeeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fees = [
          ['fee_category_name'=>'Registration Fee'],
          ['fee_category_name'=>'Monthly Fee'],
          ['fee_category_name'=>'Exam Fee'],
        ];
        StudentFeeCategory::insert($fees);
    }
}

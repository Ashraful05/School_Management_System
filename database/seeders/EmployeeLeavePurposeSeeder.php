<?php

namespace Database\Seeders;

use App\Models\LeavePurpose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EmployeeLeavePurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leave_purposes')->delete();

        $purposes = [
           [ 'name'=>'Family Problem'],
            ['name'=>'Personal Problem',],
            ['name'=>'Sickness',]
        ];
        LeavePurpose::insert($purposes);
    }
}

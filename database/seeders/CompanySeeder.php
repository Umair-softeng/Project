<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert([
            'name' => 'BUITEMS',
            'mobileNo' => '0300-3000000',
            'address' => 'Airport Road',
            'companyTypeID' => 16
        ]);
    }
}

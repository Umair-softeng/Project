<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyTypes = [
            ['companyTypeID' => 1, 'name' => 'Real Estate'],
            ['companyTypeID' => 2, 'name' => 'Technology'],
            ['companyTypeID' => 3, 'name' => 'Finance'],
            ['companyTypeID' => 4, 'name' => 'HealthCare'],
            ['companyTypeID' => 5, 'name' => 'Retail'],
            ['companyTypeID' => 6, 'name' => 'Manufacturing'],
            ['companyTypeID' => 7, 'name' => 'Energy'],
            ['companyTypeID' => 8, 'name' => 'Telecommunications'],
            ['companyTypeID' => 9, 'name' => 'Construction'],
            ['companyTypeID' => 10, 'name' => 'Automotive'],
            ['companyTypeID' => 11, 'name' => 'Food and Beverage'],
            ['companyTypeID' => 12, 'name' => 'Hospitality'],
            ['companyTypeID' => 13, 'name' => 'Transportation and Logistics'],
            ['companyTypeID' => 14, 'name' => 'Agriculture'],
            ['companyTypeID' => 15, 'name' => 'Entertainment and Media'],
            ['companyTypeID' => 16, 'name' => 'Education'],
            ['companyTypeID' => 17, 'name' => 'Pharmaceuticals'],
            ['companyTypeID' => 18, 'name' => 'Aerospace and Defense'],
            ['companyTypeID' => 19, 'name' => 'Fashion and Apparel'],
            ['companyTypeID' => 20, 'name' => 'Non-profit and NGOs'],
        ];
        foreach ($companyTypes as $companyType) {
            DB::table('companyType')->insert(['companyTypeID' => $companyType['companyTypeID'],'name' => $companyType['name']]);
        }
    }
}

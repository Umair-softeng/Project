<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryModules = [
            ['moduleID' => 1, 'moduleCode' => 'USER', 'moduleName' => 'Users Module'],
            ['moduleID' => 2, 'moduleCode' => 'ROLES','moduleName' => 'Roles Module'],
            ['moduleID' => 3, 'moduleCode' => 'TEXT','moduleName' => 'Text Module'],
            ['moduleID' => 4, 'moduleCode' => 'CODE','moduleName' => 'Code Module'],
            ['moduleID' => 5, 'moduleCode' => 'PAINTING','moduleName' => 'Painting Module'],
            ['moduleID' => 6, 'moduleCode' => 'APPOINTMENTS','moduleName' => 'Appointments Module'],
        ];
        foreach ($aryModules as $module) {
            DB::table('modules')->insert(['moduleCode' => $module['moduleCode'],'moduleName' => $module['moduleName'],'moduleID' => $module['moduleID']]);
        }
    }
}

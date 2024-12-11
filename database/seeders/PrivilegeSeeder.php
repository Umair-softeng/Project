<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryPrivileges = [
            ['moduleID' => 1, 'accessLevelID' => 1, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Create'],
            ['moduleID' => 1, 'accessLevelID' => 2, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Read'],
            ['moduleID' => 1, 'accessLevelID' => 3, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Update'],
            ['moduleID' => 1, 'accessLevelID' => 4, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Delete'],

            ['moduleID' => 2, 'accessLevelID' => 1, 'privilegeCode' => 'ROLES', 'privilegeName' => 'Roles Create'],
            ['moduleID' => 2, 'accessLevelID' => 2, 'privilegeCode' => 'ROLES', 'privilegeName' => 'Roles Read'],
            ['moduleID' => 2, 'accessLevelID' => 3, 'privilegeCode' => 'ROLES', 'privilegeName' => 'Roles Update'],
            ['moduleID' => 2, 'accessLevelID' => 4, 'privilegeCode' => 'ROLES', 'privilegeName' => 'Roles Delete'],

            ['moduleID' => 3, 'accessLevelID' => 1, 'privilegeCode' => 'TEXT', 'privilegeName' => 'Text Create'],
            ['moduleID' => 3, 'accessLevelID' => 2, 'privilegeCode' => 'TEXT', 'privilegeName' => 'Text Read'],
            ['moduleID' => 3, 'accessLevelID' => 3, 'privilegeCode' => 'TEXT', 'privilegeName' => 'Text Update'],
            ['moduleID' => 3, 'accessLevelID' => 4, 'privilegeCode' => 'TEXT', 'privilegeName' => 'Text Delete'],

            ['moduleID' => 4, 'accessLevelID' => 1, 'privilegeCode' => 'CODE', 'privilegeName' => 'Code Create'],
            ['moduleID' => 4, 'accessLevelID' => 2, 'privilegeCode' => 'CODE', 'privilegeName' => 'Code Read'],
            ['moduleID' => 4, 'accessLevelID' => 3, 'privilegeCode' => 'CODE', 'privilegeName' => 'Code Update'],
            ['moduleID' => 4, 'accessLevelID' => 4, 'privilegeCode' => 'CODE', 'privilegeName' => 'Code Delete'],

            ['moduleID' => 5, 'accessLevelID' => 1, 'privilegeCode' => 'PAINTING', 'privilegeName' => 'Painting Create'],
            ['moduleID' => 5, 'accessLevelID' => 2, 'privilegeCode' => 'PAINTING', 'privilegeName' => 'Painting Read'],
            ['moduleID' => 5, 'accessLevelID' => 3, 'privilegeCode' => 'PAINTING', 'privilegeName' => 'Painting Update'],
            ['moduleID' => 5, 'accessLevelID' => 4, 'privilegeCode' => 'PAINTING', 'privilegeName' => 'Painting Delete'],

            ['moduleID' => 6, 'accessLevelID' => 1, 'privilegeCode' => 'APPOINTMENTS', 'privilegeName' => 'Appointments Create'],
            ['moduleID' => 6, 'accessLevelID' => 2, 'privilegeCode' => 'APPOINTMENTS', 'privilegeName' => 'Appointments Read'],
            ['moduleID' => 6, 'accessLevelID' => 3, 'privilegeCode' => 'APPOINTMENTS', 'privilegeName' => 'Appointments Update'],
            ['moduleID' => 6, 'accessLevelID' => 4, 'privilegeCode' => 'APPOINTMENTS', 'privilegeName' => 'Appointments Delete'],

        ];
        foreach ($aryPrivileges as $privilege) {
            DB::table('privileges')->insert(
                [
                    'moduleID' => $privilege['moduleID'],
                    'accessLevelID' => $privilege['accessLevelID'],
                    'privilegeCode' => $privilege['privilegeCode'],
                    'privilegeName' => $privilege['privilegeName'],
                ]
            );
        }
    }
}

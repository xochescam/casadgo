<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionList = [
            [
                // 1
                'permission_id' => '1',
                'role_id' => '1'
            ],
            [
                // 2
                'permission_id' => '2',
                'role_id' => '1'
            ],
            [
                // 3
                'permission_id' => '3',
                'role_id' => '1'
            ],
            [
                // 4
                'permission_id' => '4',
                'role_id' => '1'
            ],
            [
                // 5
                'permission_id' => '5',
                'role_id' => '1'
            ],
            [
                // 6
                'permission_id' => '6',
                'role_id' => '1'
            ],
            [
                // 7
                'permission_id' => '7',
                'role_id' => '1'
            ],
            [
                // 8
                'permission_id' => '8',
                'role_id' => '1'
            ],
            [
                // 9
                'permission_id' => '9',
                'role_id' => '1'
            ],

        ];

        foreach ($permissionList as $permission) {
            DB::table('permission_roles')->insert([
                'permission_id' => $permission['permission_id'],
                'role_id' => $permission['role_id']
            ]);
        }
    }
}

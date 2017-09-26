<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$roleUsersList = [
            [
                // 1
                'role_id' => '1',
                'user_id' => '1'
            ]
        ];

        foreach ($roleUsersList as $roleUser) {
            DB::table('role_users')->insert([
                'role_id' => $roleUser['role_id'],
                'user_id' => $roleUser['user_id']
            ]);
        }
    }
}

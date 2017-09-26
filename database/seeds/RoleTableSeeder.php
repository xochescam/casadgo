<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$rolesList = [
            [
                // 1
                'role' => 'admin',
                'slug' => 'admin'
            ]
        ];

        foreach ($rolesList as $role) {
            DB::table('roles')->insert([
                'role' => $role['role'],
                'slug' => $role['slug']
            ]);
        }
    }
}

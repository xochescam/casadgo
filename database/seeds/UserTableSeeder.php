<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersList = [
            [
                // 1
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@casa.mx',
                'password' => bcrypt('admin')
            ]
        ];

        foreach ($usersList as $user) {
            DB::table('users')->insert([
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'password' => $user['password']
            ]);
        }
    }
}

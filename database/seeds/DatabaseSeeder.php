<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->truncateTables();

        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);

        Model::reguard();
    }

    private function truncateTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();
        DB::table('permission_roles')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

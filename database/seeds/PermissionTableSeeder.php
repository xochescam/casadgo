<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$permissionsList = [
            [
                // 1
                'permission' => 'ver galeria',
                'slug' => 'show.galery'
            ],
            [
                // 2
                'permission' => 'subir a galeria',
                'slug' => 'create.galery'
            ],
            [
                // 3
                'permission' => 'editar en galeria',
                'slug' => 'edit.galery'
            ],
            [
                // 4
                'permission' => 'eliminar en galeria',
                'slug' => 'delete.galery'
            ],            
            [
                // 5
                'permission' => 'ver noticia',
                'slug' => 'show.notice'
            ],
            [
                // 6
                'permission' => 'subir noticia',
                'slug' => 'create.notice'
            ],
            [
                // 7
                'permission' => 'editar noticia',
                'slug' => 'edit.notice'
            ],
            [
                // 8
                'permission' => 'eliminar noticia',
                'slug' => 'delete.notice'
            ]
        ];

        foreach ($permissionsList as $permission) {
            DB::table('permissions')->insert([
                'permission' => $permission['permission'],
                'slug' => $permission['slug']
            ]);
        }
    }
}

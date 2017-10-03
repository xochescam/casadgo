<?php

use Illuminate\Database\Seeder;

class GaleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		$galeryList = [
            [
                // 1
                'title'       => '1',
                'description' => '',
                'media_id'    => 1
            ],
            [
                // 2
                'title'       => '2',
                'description' => 'admin',
                'media_id'    => 2
            ],
            [
                // 3
                'title'       => '3',
                'description' => '',
                'media_id'    => 3
            ],
            [
                // 4
                'title'       => '4',
                'description' => '',
                'media_id'    => 4
            ],
            [
                // 5
                'title'       => '5',
                'description' => '',
                'media_id'    => 5
            ],
            [
                // 6
                'title'       => '6',
                'description' => '',
                'media_id'    => 6
            ],
            [
                // 7
                'title'       => '7',
                'description' => '',
                'media_id'    => 7
            ],
            [
                // 8
                'title'       => '8',
                'description' => '',
                'media_id'    => 8
            ],
        ];

        foreach ($galeryList as $galery) {
            DB::table('galeries')->insert([
                'title'       => $galery['title'],
                'description' => $galery['description'],
                'media_id'    => $galery['media_id']
            ]);
        }
    }
}

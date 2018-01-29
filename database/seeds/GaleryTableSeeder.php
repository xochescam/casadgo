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
                'slug'       => '\albergue'
            ]
        ];

        foreach ($galeryList as $galery) {
            DB::table('galeries')->insert([
                'title'       => $galery['title'],
                'slug'       => $galery['slug']
            ]);
        }
    }
}

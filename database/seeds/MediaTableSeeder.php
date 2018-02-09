<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$mediaList = [
            [
                // 1
                'name'        => '1.jpg',
                'url' 		 => 'storage/galery/album/',
                'type'    	 => 'img'
            ],
            [
                // 2
                'name'        => '2.jpg',
                'url' 		 => 'storage/galery/album/',
                'type'    	 => 'img'
            ],
            [
                // 3
                'name'        => '3.jpg',
                'url' 		 => 'storage/galery/album/',
                'type'    	 => 'img'
            ],
            [
                // 4
                'name'        => '4.jpg',
                'url' 		 => 'storage/galery/album/',
                'type'    	 => 'img'
            ],
            [
                // 5
                'name'        => '5.jpg',
                'url' 		 => 'storage/galery/album/',
                'type'    	 => 'img'
            ],
            [
                // 9
                'name'        => '1.jpg',
                'url' 		 => 'storage/notices/doble-maraton-2016/',
                'type'    	 => 'img'
            ],
            [
                // 10
                'name'        => '2.jpg',
                'url' 		 => 'storage/notices/doble-maraton-2016/',
                'type'    	 => 'img'
            ],
            [
                // 11
                'name'        => '1.jpg',
                'url' 		 => 'storage/notices/tapaton-2016/',
                'type'    	 => 'img'
            ],
            [
                // 14
                'name'        => '2.jpg',
                'url' 		 => 'storage/notices/tapaton-2016/',
                'type'    	 => 'img'
            ],
            [
                // 15
                'name'        => '1.jpg',
                'url'        => 'storage/notices/ultra-bombon/',
                'type'       => 'img'
            ],
        ];

        foreach ($mediaList as $media) {
            DB::table('media')->insert([
                'name'  => $media['name'],
                'url'  => $media['url'],
                'type' => $media['type']
            ]);
        }
    }
}

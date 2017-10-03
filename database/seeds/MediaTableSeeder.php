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
                'name'       => '1',
                'url' 		 => 'storage/galery/1.jpg',
                'type'    	 => 'img'
            ],
            [
                // 2
                'name'       => '2',
                'url' 		 => 'storage/galery/2.jpg',
                'type'    	 => 'img'
            ],
            [
                // 3
                'name'       => '3',
                'url' 		 => 'storage/galery/3.jpg',
                'type'    	 => 'img'
            ],
            [
                // 4
                'name'       => '4',
                'url' 		 => 'storage/galery/4.jpg',
                'type'    	 => 'img'
            ],
            [
                // 5
                'name'       => '5',
                'url' 		 => 'storage/galery/5.jpg',
                'type'    	 => 'img'
            ],
            [
                // 6
                'name'       => '6',
                'url' 		 => 'storage/galery/6.jpg',
                'type'    	 => 'img'
            ],
            [
                // 7
                'name'       => '7',
                'url' 		 => 'storage/galery/7.jpg',
                'type'    	 => 'img'
            ],
            [
                // 8
                'name'       => '8',
                'url' 		 => 'storage/galery/8.jpg',
                'type'    	 => 'img'
            ],
            [
                // 9
                'name'       => '1',
                'url' 		 => 'storage/notices/doble-maraton/1.jpg',
                'type'    	 => 'img'
            ],
            [
                // 10
                'name'       => '2',
                'url' 		 => 'storage/notices/doble-maraton/2.jpg',
                'type'    	 => 'img'
            ],
            [
                // 11
                'name'       => '1',
                'url' 		 => 'storage/notices/tapaton-2016/1.jpg',
                'type'    	 => 'img'
            ],
            [
                // 12
                'name'       => '2',
                'url' 		 => 'storage/notices/tapaton-2016/2.jpg',
                'type'    	 => 'img'
            ],
            [
                // 13
                'name'       => '3',
                'url' 		 => 'storage/notices/tapaton-2016/3.jpg',
                'type'    	 => 'img'
            ],
            [
                // 14
                'name'       => '4',
                'url' 		 => 'storage/notices/tapaton-2016/4.jpg',
                'type'    	 => 'img'
            ],
        ];

        foreach ($mediaList as $media) {
            DB::table('media')->insert([
                'name' => $media['name'],
                'url'  => $media['url'],
                'type' => $media['type']
            ]);
        }
    }
}

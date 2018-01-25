<?php

use Illuminate\Database\Seeder;

class MediaGaleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$mediaNoticesList = [
            [
                // 1
                'media_id'  => '1',
                'galery_id' => '1'
            ],
            [
                // 1
                'media_id'  => '2',
                'galery_id' => '1'
            ],
            [
                // 1
                'media_id'  => '3',
                'galery_id' => '1'
            ],
            [
                // 1
                'media_id'  => '4',
                'galery_id' => '1'
            ],
            [
                // 1
                'media_id'  => '5',
                'galery_id' => '1'
            ]
        ];

        foreach ($mediaNoticesList as $mediaNotice) {
            DB::table('media_galeries')->insert([
                'media_id'  => $mediaNotice['media_id'],
                'galery_id' => $mediaNotice['galery_id']
            ]);
        }
    }
}

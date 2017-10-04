<?php

use Illuminate\Database\Seeder;

class MediaNoticeTableSeeder extends Seeder
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
                'media_id'  => '9',
                'notice_id' => '1'
            ],
            [
                // 1
                'media_id'  => '10',
                'notice_id' => '1'
            ],
            [
                // 1
                'media_id'  => '11',
                'notice_id' => '3'
            ],
            [
                // 1
                'media_id'  => '12',
                'notice_id' => '3'
            ],
            [
                // 1
                'media_id'  => '13',
                'notice_id' => '3'
            ],
            [
                // 1
                'media_id'  => '14',
                'notice_id' => '3'
            ],
            [
                // 1
                'media_id'  => '15',
                'notice_id' => '2'
            ],
        ];

        foreach ($mediaNoticesList as $mediaNotice) {
            DB::table('media_notices')->insert([
                'media_id'  => $mediaNotice['media_id'],
                'notice_id' => $mediaNotice['notice_id']
            ]);
        }
    }
}

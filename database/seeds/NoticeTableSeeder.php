<?php

use Illuminate\Database\Seeder;

class NoticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$noticeList = [
            [
                // 1
                'title'       => 'Doble maratón 2016',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis odio facere atque aliquam impedit beatae veritatis, dolore, quidem libero animi nisi distinctio! Corporis velit aliquam ea deserunt nam atque eaque. Cum itaque et laboriosam accusamus in tenetur maxime deserunt nihil cum itaque et laboriosam accusamus in tenetur maxime deserunt nihil.',
                'date'    	  => '2016-10-09'
            ],
            [
                // 2
                'title'       => 'Tapaton 2016',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis odio facere atque aliquam impedit beatae veritatis, dolore, quidem libero animi nisi distinctio! Corporis velit aliquam ea deserunt nam atque eaque. Cum itaque et laboriosam accusamus in tenetur maxime deserunt nihil cum itaque et laboriosam accusamus in tenetur maxime deserunt nihil.',
                'date'    	  => '2016-10-09'
            ],
            [
                // 3
                'title'       => 'Ultra Bombon',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis odio facere atque aliquam impedit beatae veritatis, dolore, quidem libero animi nisi distinctio! Corporis velit aliquam ea deserunt nam atque eaque. Cum itaque et laboriosam accusamus in tenetur maxime deserunt nihil cum itaque et laboriosam accusamus in tenetur maxime deserunt nihil.',
                'date'    	  => '2016-10-09'
            ]
        ];

        foreach ($noticeList as $notice) {
            DB::table('notices')->insert([
                'title' 	  => $notice['title'],
                'description' => $notice['description'],
                'date'        => $notice['date']
            ]);
        }
    }
}

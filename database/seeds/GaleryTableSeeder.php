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
                'slug'        => 'albergue',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde error cumque voluptatibus autem voluptatum corrupti cum facilis reprehenderit, fugiat beatae quas tenetur aliquid nemo itaque? Maxime nisi eos vitae sapiente.'
            ]
        ];

        foreach ($galeryList as $galery) {
            DB::table('galeries')->insert([
                'title'       => $galery['title'],
                'slug'        => $galery['slug'],
                'description' => $galery['description']
            ]);
        }
    }
}

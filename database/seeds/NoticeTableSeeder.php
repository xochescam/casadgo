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
                'description' => 'Hago deporte no solo por mi  bienestar, sino también para motivar y dar ejemplo a mis hijos de practicar algún deporte. Siendo ciclista empecé a correr en la pretemporada para dejar un poco la bicicleta y poco a poco empiezo a tomarle gusto a correr y me dejo llevar por el boom de las carreras en donde te dan medallas. Hasta que se me ocurre la idea de realizar un ultramaraton de  84.390 kms.        

                    Le platico a mi entrenador Jesús Rivera, que siempre me apoya y asesora en mis locuras y le expongo que quiero hacer 2 maratones en menos de 24 horas. La cual consiste en lo siguiente: subir hacia la Muralla, recorrido que tiene una altimetría de más de 2000 mts. lo cual habla de lo difícil que será recorrer 42.195 kms. el primer día. Acampar ahí y al día siguiente hacer la misma distancia de regreso. La dificultad que se tiene aquí, es lograr una recuperación lo más rápido posible para  poder terminar el segundo maratón.
                    
                    Después de ir planeando todo esto me doy cuenta que dejó de correr por una medalla y en un entrenamiento de fondo comienzo a pensar que correr solo por mí es como correr en el vacío. Y pienso en C A S A.
                    Te invito que apoyes esta carrera y juntos recabar la renta del Albergue Mi C.A.S.A. del próximo año.',
                'date'    	  => '2016-10-09'
            ],
            [
                // 2
                'title'       => 'Ultra Bombon',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nam, laboriosam quidem dolores aspernatur, impedit quas libero est odit, nemo ratione possimus? Minima, nam placeat molestiae labore deserunt expedita nihil.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error omnis, consequatur ex eaque, aut numquam quas neque distinctio repudiandae possimus. Placeat non officia labore quisquam, excepturi magni. Ducimus, quas beatae!
    Ad vitae accusamus delectus, cumque a deserunt eum reprehenderit! Facere iusto, ea tempore dolor odio rerum fugit nostrum repudiandae, blanditiis esse maxime iure at, tenetur culpa dolores illo quia! Tenetur!

    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam vel suscipit fugit nulla illo quas iusto pariatur voluptates eius. Doloremque minima odit quibusdam dolorem omnis officiis maiores sunt deserunt. Magni.
    Quasi aspernatur alias, adipisci repellendus ut cum, et assumenda quos possimus, ullam illum aliquid corporis nisi illo maiores consequatur error magnam deserunt suscipit sed qui sapiente dicta. Beatae at, repellat?
    Corporis recusandae officia eum, eos voluptatum minima deserunt quae neque, explicabo doloremque facilis fugit assumenda dolorum vero ab ea, voluptas voluptatibus tempore, facere. Expedita, repudiandae, voluptatum quos beatae aut officiis!',
                'date'        => '2016-10-09'
            ],
            [
                // 3
                'title'       => 'Tapaton 2016',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nam, laboriosam quidem dolores aspernatur, impedit quas libero est odit, nemo ratione possimus? Minima, nam placeat molestiae labore deserunt expedita nihil.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error omnis, consequatur ex eaque, aut numquam quas neque distinctio repudiandae possimus. Placeat non officia labore quisquam, excepturi magni. Ducimus, quas beatae!
    Ad vitae accusamus delectus, cumque a deserunt eum reprehenderit! Facere iusto, ea tempore dolor odio rerum fugit nostrum repudiandae, blanditiis esse maxime iure at, tenetur culpa dolores illo quia! Tenetur!

    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam vel suscipit fugit nulla illo quas iusto pariatur voluptates eius. Doloremque minima odit quibusdam dolorem omnis officiis maiores sunt deserunt. Magni.
    Quasi aspernatur alias, adipisci repellendus ut cum, et assumenda quos possimus, ullam illum aliquid corporis nisi illo maiores consequatur error magnam deserunt suscipit sed qui sapiente dicta. Beatae at, repellat?
    Corporis recusandae officia eum, eos voluptatum minima deserunt quae neque, explicabo doloremque facilis fugit assumenda dolorum vero ab ea, voluptas voluptatibus tempore, facere. Expedita, repudiandae, voluptatum quos beatae aut officiis!',
                'date'    	  => '2016-10-09'
            ],
            
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

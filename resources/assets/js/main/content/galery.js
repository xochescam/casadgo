(function() {
	const clase = document.querySelector('body').className;

    if (clase !== 'homepage') {
        return;
    }

	const volunters  = document.querySelectorAll('.voluter');
	const modal		 = document.getElementById('volunterModal');
	const modalTitle = modal.querySelector('#completeNameVolunter');
	const modalImg   = modal.querySelector('#pictureVolunter');
	const modalText  = modal.querySelector('#textVolunter');

    const showInfo = function(e) {
    	const name    = e.currentTarget.text.trim();
		const picture = e.currentTarget.querySelector('img').src;

		$.each(voluntersObj.data, function(i, v) {

		    if (v.name == name) {

		    	modalTitle.innerText = v.completeName;
		    	modalText.innerText  = v.text;
		    	modalImg.src 		 = picture;

				return;
		    }
		});
    };

    Array.prototype.forEach.call(volunters, (opt) => {
        opt.addEventListener('click', showInfo);
    });

	var voluntersObj = {
	        
	        		"data": [
	        			{
					    	"name":"Betty Grace",
					    	"completeName":"BETTY GRACE HOWAR McCLAIN", 
					    	"text":"Es un lugar en donde se encuentran la aceptación y la armonía a través de un grupo unido, estable y esforzado, que tiene como meta principal ayudar al prójimo."
					    }, 
					    {
					    	"name":"Dra. Patty",
					    	"completeName":"Dra. Patty", 
					    	"text":"Es el lugar donde de Dios me envió para compartir convivencia, amor, paz, tranquilidad y aumentar mi fe."
					    },
					    {
					    	"name":"Chuyita",
					    	"completeName":"Chuyita", 
					    	"text":"Es un lugar de paz,  de esperanza, de crecimiento y lleno de bendiciones."
					    },
					    {
					    	"name":"Balvina Villegas",
					    	"completeName":"Balvina Villegas Silerio", 
					    	"text":"Son personas con espíritu de servicio, generosas y amorosas; te acompañan,  aconsejan, y  te escuchan sin críticas; para encontrar una solución a crisis emocionales y te dan herramientas que antes ignorabas, las cuales te ayudan a dar dirección a tu vida."
					    },
					    {
					    	"name":"Lourdes Sanchez",
					    	"completeName":"Lourdes Sanchez Álvarez", 
					    	"text":"Es una oportunidad en donde puedo compartir de Dios con las personas que no le conocen, así  como también puedo ver cómo Dios transforma vida. Es un privilegio ser usada por Dios en este lugar."
					    },
					    {
					    	"name":"Norma Mendoza",
					    	"completeName":"Norma Alicia Mendoza Carrasco", 
					    	"text":"Es el lugar donde puedes encontrar un amigo, en el cual puedas confiar, un oído que te escucha, un hombro donde  recargar tu cabeza  cuando sientes que ya no puedes más."
					    },
					    {
					    	"name":"Rigoberto Medina",
					    	"completeName":"Rigoberto Medina Herrera", 
					    	"text":"Es una agencia de Dios para traer bendición a personas con necesidades materiales, morales y espirituales; me representa la oportunidad de ser instrumento para lograr ese propósito."
					    },
					    {
					    	"name":"Olga Martinez",
					    	"completeName":"Olga Martinez", 
					    	"text":"Ha sido una bendición en mi vida, la oportunidad de poder servirle a Dios y de poder sembrar los principios y valores a las personas de nuestra ciudad. Ha sido un gran privilegio ser parte del equipo de C.A.S.A., siempre estará en mi corazón."
					    },
					    {
					    	"name":"Antonio Luna",
					    	"completeName":"Antonio Luna", 
					    	"text":"El ayudar a nuestros semejantes es una tarea difícil pero muy gratificante, el dar la mano, entregando el corazón es muy hermoso, pero entregarlo todo en un solo un instante es dar la vida y CASA da todo en ese instante, siendo gratificado sólo con una sonrisa."
					    },
					    {
					    	"name":"Brissia Olivas",
					    	"completeName":"Brissia Olivas", 
					    	"text":"Para mí CASA representa lo que todos aspiramos encontrar en un hogar; calma en medio de la tormenta; esperanza y fe ante la enfermedad y el dolor, el mana del cielo que alimenta no solo el cuerpo físico sino también el espíritu y el alma a través del amor y la sonrisa de sus servidores. El oído atento y compasivo que se duele con el otro colocándose en la trinchera por el bienestar físico, mental y espiritual de los usuarios."
					    },
					    {
					    	"name":"Karla Martínez",
					    	"completeName":"Karla Martínez Pegueros", 
					    	"text":"CASA para mi es la oportunidad que me da Dios de devolver algo de lo mucho que me ha dado. Dios me dio más tiempo de vida y una sanidad, así que dono parte de ese tiempo que me dio para agradecer a El que me tiene  aquí. Aunque en realidad SIEMPRE gano más yo estando ahí ya que he conocido personas extraordinarias que me han hecho saber que no es mi tiempo es Dios el que me tiene ahí. El llegar a CASA fue realmente encontrar una familia una casa donde todos trabajamos en un mismo sentido y en un mismo canal,  AYUDAR. Gracias CASA por la oportunidad que me brindan de servir a los demás."
					    },
					    {
					    	"name":"Ana Lilia",
					    	"completeName":"Ana Lilia Lares", 
					    	"text":"Es un hermoso lugar, donde encuentras. Ayuda, compañía, dirección y ánimo. Para enfrentar lo difícil que se encuentra en la vida. Sales con un pedacito del corazón de personas que te comparte, su amor, y esperanza. Que tu siembras más adelante en tu vida."
					    },
					    {
					    	"name":"Silvia Gutierrez",
					    	"completeName":"Silvia Gutierrez", 
					    	"text":"Es un espacio de servicio para todas aquellas personas que necesiten ayuda emocional. En lo personal, me ha servido para dejar de lado el egoísmo, pues te  desprendes de el  para ayudar a la persona más necesitada."
					    },
					    {
					    	"name":"Lupita Quintero",
					    	"completeName":"Lupita Quintero", 
					    	"text":"Es un hermoso regalo que Dios me dio en donde cada día me asombra su gran amor, misericordia, fidelidad y más."
					    },
					    {
					    	"name":"Daniela Nájera",
					    	"completeName":"Daniela Nájera Quintero", 
					    	"text":"Para mí, C.A.S.A. es fe, mi familia, amor entre las personas y un lugar muy cariñoso en Durango."
					    },
					    {
					    	"name":"Eberth Tavarez",
					    	"completeName":"Eberth I. Tavarez Hernández", 
					    	"text":"C.A.S.A. Es un proyecto nacido del corazón de Dios el cual busca a través de la labor social, acercar a las personas a Jesús. Mostrándoles que Él se interesa por su necesidad."
					    },
					    {
					    	"name":"Areli Gurrola",
					    	"completeName":"Areli Gurrola Núñez", 
					    	"text":"Es la respuesta de Dios a mis oraciones. Un lugar donde he sido bendecida con apoyo, fortaleza, amor, compañerismo, amistad , empatía, consejo (…) Donde me siento privilegiada y plena ayudando y escuchando a personas en crisis y diversos problemas."
					    },
					    {
					    	"name":"Vero Alanis",
					    	"completeName":"Veronica Alanís", 
					    	"text":"Para mi c.a.s.a. ha sido algo realmente hermoso...me ha enseñado a ser una persona mejor...he aprendido pues algo de tanta gente buena que he conocido ahí...amo estar en c.a.s.a. ...creo y digo que es mi segundo hogar...es una ilusión que tengo de ir a apoyar a la gente y me gusta hacerlo...le doy  gracias a DIOS por haberme puesto donde estoy...en C.A.S.A"
					    },
					    {
					    	"name":"Edgar Morales",
					    	"completeName":"Edgar Morales", 
					    	"text":"Para mí es, un lugar donde se encuentra familia, esperanza. Donde se puede encontrar la verdad y transformación."
					    },
					    {
					    	"name":"Mayra Marrufo",
					    	"completeName":"Mayra Marrufo", 
					    	"text":"CASA, es la 3 decisión más importante de mi vida, es un lugar que amo y unas personas que admiro, es un lugar donde se puede sentir el amor de Dios para mi vida."
					    },
					    {
					    	"name":"Violeta García",
					    	"completeName":"Violeta García", 
					    	"text":""
					    },
					    {
					    	"name":"Aaron Amador",
					    	"completeName":"Aaron Amador", 
					    	"text":""
					    },
					    {
					    	"name":"Anabell",
					    	"completeName":"Anabell", 
					    	"text":""
					    },
					    {
					    	"name":"Brisia Olivas",
					    	"completeName":"Brisia Olivas", 
					    	"text":""
					    },
					    {
					    	"name":"Maria Chavez",
					    	"completeName":"Maria Chavez", 
					    	"text":""
					    },
					    {
					    	"name":"Alicia Ontiveros",
					    	"completeName":"Alicia Ontiveros", 
					    	"text":"SANIDAD, GRACIA, GRATITUD, PAZ, AMOR, SERVICIO. <br> Santidad. Lo primero que hizo la consejería para mí, fue sanar muchas áreas de mi vida que estaban débiles, con dolor y enojo. Al escuchar diversas situaciones por las que pasaban las mujeres que llegaban a la consejería, pude a través de lo que el Espíritu Santo me indicaba sanar mi propio corazón de muchas heridas a partir de mi separación matrimonial. <br> Gracia. Darme cuenta que solo por la Gracia de Dios podía estar frente a diversas situaciones contadas por estas mujeres de diferente edad, desde adolecentes hasta mujeres maduras a las cuales podía darles paz y amor que era lo que más necesitaban. 'Un oído atento que pudiera escucharlas'. <br>Gratitud. Darle Gracias a Dios a cada momento por el privilegio que me otorgaba, yo una vasija con tantas imperfecciones, había sido elegida para ayudar a otros de sus hijos. <br>Paz. Salir cada vez de las sesiones con la paz que Jesús me daba al poder transmitir su amor y su palabra a otros. <br>Amor. El amor que me permite tener por cada una de las usuarias y la empatía por las situaciones que atraviesan, tener el privilegio de orar por ellas y transmitir a su vez el amor de Dios a sus vidas. Ese amor que sobrepasa todo entendimiento. <br>Servicio. Tener el privilegio de servir a Dios es la responsabilidad más importante de mi vida, ya que sé que la santidad del corazón de las personas es la prioridad de Dios y al saber que soy un instrumento en sus manos puede dar libertad y paz me honra y me da gozo. <br>"
					    },
					    {
					    	"name":"Jorge Ponce",
					    	"completeName":"Jorge Ponce", 
					    	"text":""
					    }
					]
				};

})();


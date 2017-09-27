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
					    	"name":"",
					    	"completeName":"Dra. PATTY", 
					    	"text":"Es el lugar donde de Dios me envió para compartir convivencia, amor, paz, tranquilidad y aumentar mi fe."
					    },
					    {
					    	"name":"",
					    	"completeName":"CHUYITA", 
					    	"text":"Es un lugar de paz,  de esperanza, de crecimiento y lleno de bendiciones."
					    },
					    {
					    	"name":"",
					    	"completeName":"BALVINA VILLEGAS SILERIO", 
					    	"text":"Son personas con espíritu de servicio, generosas y amorosas; te acompañan,  aconsejan, y  te escuchan sin críticas; para encontrar una solución a crisis emocionales y te dan herramientas que antes ignorabas, las cuales te ayudan a dar dirección a tu vida."
					    },
					    {
					    	"name":"Lourdes Sanchez",
					    	"completeName":"LOURDES SÁNCHEZ ÁLVAREZ", 
					    	"text":"Es una oportunidad en donde puedo compartir de Dios con las personas que no le conocen, así  como también puedo ver cómo Dios transforma vida. Es un privilegio ser usada por Dios en este lugar."
					    },
					    {
					    	"name":"Norma Mendoza",
					    	"completeName":"NORMA ALICIA MENDOZA CARRASCO", 
					    	"text":"Es el lugar donde puedes encontrar un amigo, en el cual puedas confiar, un oído que te escucha, un hombro donde  recargar tu cabeza  cuando sientes que ya no puedes más."
					    },
					    {
					    	"name":"Rigoberto Medina",
					    	"completeName":"RIGOBERTO MEDINA HERRERA", 
					    	"text":"Es una agencia de Dios para traer bendición a personas con necesidades materiales, morales y espirituales; me representa la oportunidad de ser instrumento para lograr ese propósito."
					    },
					    {
					    	"name":"Olga Martinez",
					    	"completeName":"OLGA MARTÍNEZ", 
					    	"text":"Ha sido una bendición en mi vida, la oportunidad de poder servirle a Dios y de poder sembrar los principios y valores a las personas de nuestra ciudad. Ha sido un gran privilegio ser parte del equipo de C.A.S.A., siempre estará en mi corazón."
					    },
					    {
					    	"name":"Antonio Luna",
					    	"completeName":"ANTONIO LUNA", 
					    	"text":"El ayudar a nuestros semejantes es una tarea difícil pero muy gratificante, el dar la mano, entregando el corazón es muy hermoso, pero entregarlo todo en un solo un instante es dar la vida y CASA da todo en ese instante, siendo gratificado sólo con una sonrisa."
					    },
					    {
					    	"name":"",
					    	"completeName":"BRISIA OLIVAS", 
					    	"text":"Para mí CASA representa lo que todos aspiramos encontrar en un hogar; calma en medio de la tormenta; esperanza y fe ante la enfermedad y el dolor, el mana del cielo que alimenta no solo el cuerpo físico sino también el espíritu y el alma a través del amor y la sonrisa de sus servidores. El oído atento y compasivo que se duele con el otro colocándose en la trinchera por el bienestar físico, mental y espiritual de los usuarios."
					    },
					    {
					    	"name":"",
					    	"completeName":"KARLA MARTÍNEZ PEGUEROS", 
					    	"text":"CASA para mi es la oportunidad que me da Dios de devolver algo de lo mucho que me ha dado. Dios me dio más tiempo de vida y una sanidad, así que dono parte de ese tiempo que me dio para agradecer a El que me tiene  aquí. Aunque en realidad SIEMPRE gano más yo estando ahí ya que he conocido personas extraordinarias que me han hecho saber que no es mi tiempo es Dios el que me tiene ahí. El llegar a CASA fue realmente encontrar una familia una casa donde todos trabajamos en un mismo sentido y en un mismo canal,  AYUDAR. Gracias CASA por la oportunidad que me brindan de servir a los demás."
					    },
					    {
					    	"name":"",
					    	"completeName":"ANA LILIA LARES", 
					    	"text":"Es un hermoso lugar, donde encuentras. Ayuda, compañía, dirección y ánimo. Para enfrentar lo difícil que se encuentra en la vida. Sales con un pedacito del corazón de personas que te comparte, su amor, y esperanza. Que tu siembras más adelante en tu vida."
					    },
					    {
					    	"name":"Silvia Gutierrez",
					    	"completeName":"SILVIA GUTIERREZ", 
					    	"text":"Es un espacio de servicio para todas aquellas personas que necesiten ayuda emocional. En lo personal, me ha servido para dejar de lado el egoísmo, pues te  desprendes de el  para ayudar a la persona más necesitada."
					    },
					    {
					    	"name":"",
					    	"completeName":"LUPITA QUINTERO", 
					    	"text":"Es un hermoso regalo que Dios me dio en donde cada día me asombra su gran amor, misericordia, fidelidad y más."
					    },
					    {
					    	"name":"",
					    	"completeName":"DANIELA NÁJERA QUINTERO", 
					    	"text":"Para mí, C.A.S.A. es fe, mi familia, amor entre las personas y un lugar muy cariñoso en Durango."
					    },
					    {
					    	"name":"",
					    	"completeName":"EBERTH I. TAVÁREZ HERNÁNDEZ", 
					    	"text":"C.A.S.A. Es un proyecto nacido del corazón de Dios el cual busca a través de la labor social, acercar a las personas a Jesús. Mostrándoles que Él se interesa por su necesidad."
					    },
					    {
					    	"name":"Areli Gurrola",
					    	"completeName":"ARELI GURROLA NÚÑEZ", 
					    	"text":"Es la respuesta de Dios a mis oraciones. Un lugar donde he sido bendecida con apoyo, fortaleza, amor, compañerismo, amistad , empatía, consejo (…) Donde me siento privilegiada y plena ayudando y escuchando a personas en crisis y diversos problemas."
					    },
					    {
					    	"name":"Vero Alanis",
					    	"completeName":"VERONICA ALANÍS", 
					    	"text":"Para mi c.a.s.a. ha sido algo realmente hermoso...me ha enseñado a ser una persona mejor...he aprendido pues algo de tanta gente buena que he conocido ahí...amo estar en c.a.s.a. ...creo y digo que es mi segundo hogar...es una ilusión que tengo de ir a apoyar a la gente y me gusta hacerlo...le doy  gracias a DIOS por haberme puesto donde estoy...en C.A.S.A"
					    },
					    {
					    	"name":"Edgar Morales",
					    	"completeName":"EDGAR MORALES", 
					    	"text":"Para mí es, un lugar donde se encuentra familia, esperanza. Donde se puede encontrar la verdad y transformación."
					    },
					    {
					    	"name":"Jorge Ponce",
					    	"completeName":"JORGE PONCE", 
					    	"text":""
					    },
					    {
					    	"name":"Mayra Marrufo",
					    	"completeName":"MAYRA MARRUFO", 
					    	"text":"CASA, es la 3 decisión más importante de mi vida, es un lugar que amo y unas personas que admiro, es un lugar donde se puede sentir el amor de Dios para mi vida."
					    },
					    {
					    	"name":"Violeta Garcia",
					    	"completeName":"VIOLETA GARCÍA", 
					    	"text":""
					    },
					    {
					    	"name":"Aaron Amador",
					    	"completeName":"AARON AMADOR", 
					    	"text":""
					    },
					    {
					    	"name":"Anabell",
					    	"completeName":"Anabell", 
					    	"text":""
					    },
					    {
					    	"name":"Balvina Villegas",
					    	"completeName":"Balvina Villegas", 
					    	"text":""
					    },
					    {
					    	"name":"Brisia Olivas",
					    	"completeName":"Brisia Olivas", 
					    	"text":""
					    },
					    {
					    	"name":"Eberth Tavarez",
					    	"completeName":"Eberth Tavarez", 
					    	"text":""
					    },
					    {
					    	"name":"Maria Chavez",
					    	"completeName":"Maria Chavez", 
					    	"text":""
					    }
					    ,
					    {
					    	"name":"Alicia Ontiveros",
					    	"completeName":"Alicia Ontiveros", 
					    	"text":""
					    }

					]
				};

})();


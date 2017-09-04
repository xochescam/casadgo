(function() {

	const clase = document.querySelector('body').className;



    if (clase !== 'about') {
        return;
    }

    const listOfLi = document.querySelectorAll('.navbar-nav a');

    const url = window.location.href.split("/", 3).join("/");
    const sectionTitle = document.querySelector('.section-title').innerText;


    Array.prototype.forEach.call(listOfLi, (li) => {

    	const href = li.href.split("#")[1];

    	li.href = url + '/#' + href;

    	li.parentNode.classList.remove('active');

    
    	if(sectionTitle == li.innerText.toUpperCase()){

    		li.parentNode.classList.add('active');
    	}


    	return;

        // const href = li.href;

        // href.split("#");

        // console.log(href);
    });
    

})();


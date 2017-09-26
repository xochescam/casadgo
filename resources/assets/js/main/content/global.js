(function() {

	const classModule = document.querySelector('body').className;

    if (classModule !== 'homepage') {
        
        const listOfLi     = document.querySelectorAll('.navbar-nav a');
        const url          = window.location.href.split("/", 3).join("/");
        const sectionTitle = document.querySelector('.section-title');

        Array.prototype.forEach.call(listOfLi, (li) => {

            const href = li.href.split("#")[1];
            li.href    = url + '/#' + href;
            li.parentNode.classList.remove('active');
        
            if(sectionTitle != null && sectionTitle.innerText == li.innerText.toUpperCase()){

                li.parentNode.classList.add('active');
            }

            return;
        });

    }

})();

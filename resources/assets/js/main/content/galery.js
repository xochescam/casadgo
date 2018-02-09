 (function() {
	const clase = document.querySelector('body').className;

    if (clase !== 'homepage' && clase !== 'galery-show' && clase !==  'notices-show') {
        return;
    }

    const items      = document.querySelectorAll('.galery-item');
    const modalTitle = document.querySelector('#modalTitle');
    const modalImg   = document.querySelector('#modalImg');

    function openModal(e) {
    	const img = e.currentTarget.querySelector('img');

        const split = img.src.split("thumb-");

        modalTitle.innerText = img.getAttribute('data-title');
        modalImg.src         = split[0]+split[1];

        return;
    }

    Array.prototype.forEach.call(items, (item) => {
        item.addEventListener('click', openModal);
    });

})();
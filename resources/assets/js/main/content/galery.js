 (function() {
	const clase = document.querySelector('body').className;

    if (clase !== 'homepage') {
        return;
    }

    const items      = document.querySelectorAll('.galery-item');
    const modalTitle = document.querySelector('#modalTitle');
    const modalImg   = document.querySelector('#modalImg');

    function openModal(e) {
    	const img = e.currentTarget.querySelector('img');

        console.log(img);

        modalTitle.innerText = img.getAttribute('data-title');
        modalImg.src         = img.src;

        return;
    }

    Array.prototype.forEach.call(items, (item) => {
        item.addEventListener('click', openModal);
    });

})();
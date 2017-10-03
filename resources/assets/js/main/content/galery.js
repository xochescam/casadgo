(function() {
	const clase = document.querySelector('body').className;

    if (clase !== 'homepage') {
        return;
    }

    const items       = document.querySelectorAll('.galery-item');
    const modalTitle = modal.querySelector('#modalTitle');
    const modalImg   = modal.querySelector('#modalImg');

    function openModal(e) {
    	const img = e.currentTarget.querySelector('img');

        modalTitle.innerText = img.getAttibute('data-title');
        modalImg.src         = img.src;

        return;
    }

    Array.prototype.forEach.call(items, (item) => {
        item.addEventListener('click', openModal);
    });

})();
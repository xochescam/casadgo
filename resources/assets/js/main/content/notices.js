 (function() {
	const clase = document.querySelector('body').className;

    if (clase !== 'more-notices') {
        return;
    }

    const items      = document.querySelectorAll('.notices-item');
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
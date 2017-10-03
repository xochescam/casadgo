(function() {
	const clase = document.querySelector('body').className;

    if (clase !== 'homepage') {
        return;
    }

    const items = document.querySelectorAll('.galery-item');

    function openModal(e) {
    	console.log(e.currentTarget);
    }

    Array.prototype.forEach.call(items, (item) => {
        item.addEventListener('click', openModal);
    });

})();
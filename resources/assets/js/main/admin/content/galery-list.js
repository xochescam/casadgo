(function() {
  const clase = document.querySelector('body').className;

  if (clase !== 'galery-list') {
    return;
  }

  const btnDelete = document.querySelectorAll('.js-delete-galery');

  function deleteGalery(e) {
    const id = e.currentTarget.getAttribute('data-item');
    const csrf = e.currentTarget.getAttribute('data-csrf');

    swal({
      title: '¿Está seguro de eliminar?',
      text: "Usted no podrá revertirlo",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si'
    }).then((result) => {
      if (result) {

        let request  = new XMLHttpRequest();
        let response = false;

        request.open('DELETE', 'http://casa.dev/admin/galeria/delete/' + id , true);
        request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        request.setRequestHeader('X-CSRF-Token', csrf);

        request.onload = function() {

            if (request.status >= 200 && request.status < 400) {
              
              swal(
                  '¡Eliminado!',
                  'El registro a sido eliminado.',
                  'success'
                ).then( function () {
                    window.location.href = 'http://casa.dev/admin/galeria';
                  })

            } else {
              // We reached our target server, but it returned an error
              console.log('No se pudo eliminar al registro, por favor intente de nuevo.');
          
            }
        };

        request.onerror = function() {
            // There was a connection error of some sort
            console.log('Ocurrió un error de conexión, por favor intente de nuevo.');
        };

        request.send();
        } 
    })
  }

  Array.prototype.forEach.call(btnDelete, (btn) => {
    btn.addEventListener('click', deleteGalery);
  });

})();
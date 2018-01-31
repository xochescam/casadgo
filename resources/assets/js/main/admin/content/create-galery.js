(function() {
  const clase = document.querySelector('body').className;

  if (clase !== 'galery-create') {
    return;
  }
  
  const addVideoBtn   = document.querySelector('#add-video-btn');
  const container     = document.querySelector('#videos-container');
  const smallAlert    = document.querySelector('.small-alert');
  const saveGaleryBtn = document.querySelector('.js-save-galery');

  function addVideo(e) {

    const itemsLength = container.querySelectorAll('.item-video').length;

    const limit = hideSmallAlert(itemsLength);

    if(limit) {
      return;
    }

    const count = itemsLength + 1;

    const html = `<div class="form-group">
                    <label for="videos `+count+`" class="col-sm-2 text-right">`+count+`.</label>
                    <div class="col-sm-10 align-self-end float-right item-video">
                      <textarea name="videos[]" class="form-control" rows="1"></textarea>
                      <a class="delete-item-video"=><i class="fa fa-plus fa-rotate-42"></i></a>
                    </div>
                  </div>`;

    container.insertAdjacentHTML('beforeend', html);

    const items = container.querySelectorAll('.item-video textarea');
    items[items.length - 1].focus();

    const deleteVideoItem = container.querySelectorAll('.delete-item-video');

    Array.prototype.forEach.call(deleteVideoItem, (video) => {
      video.addEventListener('click', deleteVideo);
    });

  }

  function deleteVideo(e) {

    const currentItems = container.querySelectorAll('.item-video');

    if(currentItems.length == 1) {
      return;
    }

    const parent = e.currentTarget.parentNode.parentNode.parentNode;

    parent.removeChild(e.currentTarget.parentNode.parentNode);

    const newCurrentItems = container.querySelectorAll('.item-video');

    for (var i = 0; i <= newCurrentItems.length - 1; i++) {  

      const label     = newCurrentItems[i].parentNode.querySelector('label');
      label.innerText = i + 1 + '.';
    }

    const items = container.querySelectorAll('.item-video textarea');
    items[items.length - 1].focus();

    hideSmallAlert(items.length);
  }

  function hideSmallAlert(lenght) {

    if(lenght >= 5) {
      smallAlert.classList.remove('none');
      smallAlert.classList.add('initial');

      return 'true';

    } else {

      smallAlert.classList.remove('initial');
      smallAlert.classList.add('none');
    }
  }

  function saveGalery(e) {
    e.preventDefault();
    
    const request = new XMLHttpRequest();
    const token   = e.currentTarget.getAttribute('data-csrf');
    const form    = document.getElementById('save-galery');
    const data    = new FormData(form);
    const spin    = document.querySelector('.fa-spin');
    const btn     = e.currentTarget;
    
    btn.setAttribute("disabled", "true");
    spin.classList.remove('hidden');

    request.open('POST', 'http://casa.dev/galeria', true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    request.onload = function() {

      console.log(request.status);
      if (request.status >= 200 && request.status < 400) {
                  
        // swal(
        //   '¡Guardado!',
        //   'La noticia a sido guardada exitosamente.',
        //   'success'
        //   ).then( function () {
        //     window.location.href = 'http://casa.dev/admin/noticias';
        //   })

      } else {
        // We reached our target server, but it returned an error

        btn.removeAttribute("disabled", "false");
        spin.classList.add('hidden');

        const alerts = document.getElementById('alerts');
        alerts.innerText = '';

        const errors = JSON.parse(request.responseText);

        for (var key in errors) {
          $("#alerts").append('<div class="alert alert-danger" role="alert">'+errors[key][0]+'</div>');
        }
      }
    };

    request.onerror = function() {
        // There was a connection error of some sort
        console.log('Ocurrió un error de conexión, por favor intente de nuevo.');

    };

    request.send(data);

  }

  
  addVideoBtn.addEventListener('click', addVideo);
  saveGaleryBtn.addEventListener('click', saveGalery);

})();
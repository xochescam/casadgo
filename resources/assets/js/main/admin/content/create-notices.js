 (function() {
  const clase = document.querySelector('body').className;

  if (clase !== 'notice-create' && clase !== 'notice-edit' ) {
        return;
  }

  const addVideoBtn      = document.querySelector('#add-video-btn');
  const container        = document.querySelector('#videos-container');
  const smallAlert       = document.querySelector('.small-alert');
  const saveNoticeBtn    = document.querySelector('.js-save-notice');
  const deleteVideoItems = container.querySelectorAll('.delete-item-video');


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
                      <textarea name="videos[]" class="form-control" rows="2"></textarea>
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

  function saveNotice(e) {
    e.preventDefault();
    
    const btn     = e.currentTarget;
    const method  = btn.getAttribute('data-method');
    const id      = btn.getAttribute('data-notice');
    const token   = btn.getAttribute('data-csrf');
    const form    = document.getElementById('save-notice');;
    const spin    = document.querySelector('.fa-spin');
    const request = new XMLHttpRequest();
    const data    = new FormData(form);
    const url     = window.location.origin;
    
    btn.setAttribute("disabled", "true");
    spin.classList.remove('hidden');

    request.open('POST', url+'/noticias'+id, true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    request.onload = function() {
      if (request.status >= 200 && request.status < 400) {

        let message = 'La noticia a sido guardada exitosamente.';

         if(method == 'PUT') {
            message = 'Los cambios han sido guardados exitosamente.';
         } 

        swal(
          '¡Guardado!',
          message,
          'success'
          ).then( function () {
            window.location.href = url+'/admin/noticias';
          })

      } else {
        // We reached our target server, but it returned an error

        btn.removeAttribute("disabled", "false");
        spin.classList.add('hidden');

        const errors = JSON.parse(request.responseText);
        const alerts = document.getElementById('alerts');
        alerts.innerText = '';

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

  Array.prototype.forEach.call(deleteVideoItems, (video) => {
      video.addEventListener('click', deleteVideo);
  });

  addVideoBtn.addEventListener('click', addVideo);
  saveNoticeBtn.addEventListener('click', saveNotice);

})();
 (function() {
      const clase = document.querySelector('body').className;

      if (clase !== 'notice-create') {
            return;
      }

    const addVideoBtn     = document.querySelector('#add-video-btn');
    const container       = document.querySelector('#videos-container');
    const smallAlert      = document.querySelector('.small-alert');

    function addVideo(e) {

      const itemsLength = container.querySelectorAll('.item-video').length;

      const limit = hideSmallAlert(itemsLength);

      if(limit) {
        return;
      }

      const html = `<div class="col-sm-10 align-self-end float-right min-margin-top item-video">
                      <textarea name="videos[]" class="form-control" rows="2"></textarea>
                      <a class="delete-item-video"=><i class="fa fa-plus fa-rotate-42"></i></a>
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

      const currentItems = container.querySelectorAll('.item-video').length;

      if(currentItems == 1) {
        return;
      }

      const parent = e.currentTarget.parentNode.parentNode;
      parent.removeChild(e.currentTarget.parentNode);

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

    addVideoBtn.addEventListener('click', addVideo);

})();
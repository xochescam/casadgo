 (function() {
      const clase = document.querySelector('body').className;

      if (clase !== 'notice-create') {
            return;
      }

    const addVideo        = document.querySelector('#add-video-btn');
    const container       = document.querySelector('#videos-container');
    const smallAlert      = document.querySelector('.small-alert');

    function openModal(e) {

      const items = container.querySelectorAll('.item-video');

      if(items.length >= 5) {
            smallAlert.classList.remove('none');
            smallAlert.classList.add('initial');

            return;
      }

      const html = `<div class="col-sm-10 align-self-end float-right min-margin-top item-video">
                      <textarea name="videos[]" class="form-control" rows="2"></textarea>
                      <a class="delete-item-video"=><i class="fa fa-minus"></i></a>
                    </div>`;

      container.insertAdjacentHTML('beforeend', html);

      const deleteVideoItem = container.querySelectorAll('.delete-item-video');

      Array.prototype.forEach.call(deleteVideoItem, (video) => {
        video.addEventListener('click', deleteVideo);
      });

    }

    function deleteVideo(e) {

      const parent = e.currentTarget.parentNode.parentNode;
      parent.removeChild(e.currentTarget.parentNode);

    }

    addVideo.addEventListener('click', openModal);

})();
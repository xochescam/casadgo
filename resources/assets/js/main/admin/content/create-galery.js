(function() {
  const clase = document.querySelector('body').className;

  if (clase !== 'galery-create') {
    return;
  }

  const options        = document.querySelectorAll('.options');
  const videoContainer = document.querySelector('#video-container');
  const imgContainer   = document.querySelector('#image-container');

  imgContainer.classList.add('inline-block');

  function showOption(e) {
    if (e.currentTarget.value == 1) {

      videoContainer.classList.remove('block');
      videoContainer.classList.add('none');

      imgContainer.classList.remove('none');
      imgContainer.classList.add('inline-block');

    } else {

      imgContainer.classList.remove('inline-block');
      imgContainer.classList.add('none');

      videoContainer.classList.remove('none');
      videoContainer.classList.add('block');

    }
  }


  Array.prototype.forEach.call(options, (opt) => {
    opt.addEventListener('change', showOption);
  });


})();
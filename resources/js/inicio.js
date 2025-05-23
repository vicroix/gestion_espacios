document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.getElementById('openLoginBtn');
    const closeBtn = document.getElementById('closeBtn');
    const modal = document.getElementById('loginModal');

    openBtn.addEventListener('click', function () {
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    });

    closeBtn.addEventListener('click', function () {
      modal.classList.remove('flex');
      modal.classList.add('hidden');
    });

    modal.addEventListener('click', function (event) {
      if (event.target === modal) {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
      }
    });
  });
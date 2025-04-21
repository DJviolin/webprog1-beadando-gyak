if (document.getElementById('kepek')) {
  const images = Array.from(document.querySelectorAll('.gallery-img'));
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightboxImg');
  let currentIndex = 0;

  function showImage(index) {
    if (index < 0 || index >= images.length) return;
    currentIndex = index;
    lightboxImg.src = images[currentIndex].src;
    lightbox.classList.remove('d-none');
  }

  function closeLightbox() {
    lightbox.classList.add('d-none');
  }

  function showPrev() {
    showImage((currentIndex - 1 + images.length) % images.length);
  }

  function showNext() {
    showImage((currentIndex + 1) % images.length);
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('closeBtn').addEventListener('click', closeLightbox);
    document.getElementById('prevBtn').addEventListener('click', showPrev);
    document.getElementById('nextBtn').addEventListener('click', showNext);

    images.forEach(img => {
      img.addEventListener('click', () => {
        showImage(parseInt(img.dataset.index));
      });
    });

    document.addEventListener('keydown', (e) => {
      if (lightbox.classList.contains('d-none')) return;

      switch (e.key) {
        case 'Escape':
          closeLightbox();
          break;
        case 'ArrowLeft':
          showPrev();
          break;
        case 'ArrowRight':
          showNext();
          break;
      }
    });

    // Masonry csak képek betöltődése után
    const grid = document.querySelector('.row[data-masonry]');
    imagesLoaded(grid, function () {
      new Masonry(grid, {
        itemSelector: '[class*="col-"]',
        percentPosition: true
      });
    });
  });
}

if (document.getElementById('kapcsolat')) {
  const form = document.querySelector("form");

  document.addEventListener("DOMContentLoaded", function () {
    form.addEventListener("submit", function (e) {
      let hiba = [];

      const nev = form.nev?.value.trim();
      const email = form.email?.value.trim();
      const telefon = form.telefon?.value.trim();
      const fajta = form.fajta?.value;
      const mennyiseg = parseInt(form.mennyiseg?.value);

      if (nev === "") hiba.push("Név megadása kötelező.");
      if (email === "" || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) hiba.push("Érvénytelen email cím.");
      if (telefon === "") hiba.push("Telefonszám megadása kötelező.");
      if (!fajta) hiba.push("Kérjük, válasszon fajtát.");
      if (isNaN(mennyiseg) || mennyiseg < 1) hiba.push("A mennyiségnek legalább 1-nek kell lennie.");

      if (hiba.length > 0) {
        e.preventDefault();
        alert(hiba.join("\n"));
      }
    });
  });
}

document.addEventListener('DOMContentLoaded', function () {
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

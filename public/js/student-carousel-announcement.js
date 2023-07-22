// * FUNCTION TO SHOW SLIDE FOR A SPECIFIC CAROUSEL * //
function showSlide(carouselId, index) {
    const carousel = document.getElementById(carouselId);
    const slides = carousel.querySelectorAll(".carousel-slide");
    const indicators = carousel.querySelectorAll(".carousel-indicator");

    slides.forEach((slide, i) => {
        slide.style.left = `${(i - index) * 100}%`;
        slide.style.opacity = i === index ? 1 : 0;
    });

    indicators.forEach((indicator, i) => {
        indicator.classList.toggle("bg-black", i === index);
        indicator.classList.toggle("bg-white", i !== index);
    });
}

// * FUNCTION TO GO TO THE PREVIOUS SLIDE FOR A SPECIFIC CAROUSEL * //
function prevSlide(carouselId) {
    const carousel = document.getElementById(carouselId);
    const numSlides = carousel.querySelectorAll(".carousel-slide").length;
    const currentIndex = parseInt(carousel.dataset.currentIndex, 10) || 0;
    const prevIndex = (currentIndex - 1 + numSlides) % numSlides;
    showSlide(carouselId, prevIndex);
    carousel.dataset.currentIndex = prevIndex;
}

// * FUNCTION TO GO TO THE NEXT SLIDE FOR A SPECIFIC CAROUSEL * //
function nextSlide(carouselId) {
    const carousel = document.getElementById(carouselId);
    const numSlides = carousel.querySelectorAll(".carousel-slide").length;
    const currentIndex = parseInt(carousel.dataset.currentIndex, 10) || 0;
    const nextIndex = (currentIndex + 1) % numSlides;
    showSlide(carouselId, nextIndex);
    carousel.dataset.currentIndex = nextIndex;
}

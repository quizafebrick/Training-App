// * JAVASCRIPT FUNCTION FOR CAROUSEL FUNCTIONALITY * //
function showSlide(slideIndex) {
    const slides = document.querySelectorAll(".carousel-slide");
    const indicators = document.querySelectorAll(".carousel-indicator");
    const totalSlides = slides.length;

    // * ENSURE SLIDEINDEX IS WITHIN THE VALID RANGE * //
    slideIndex = (slideIndex + totalSlides) % totalSlides;

    // Hide all slides and reset indicators
    slides.forEach((slide, index) => {
        slide.style.display = index === slideIndex ? "block" : "none";
        indicators[index].classList.toggle("bg-white", index === slideIndex);
        indicators[index].classList.toggle("bg-gray-500", index !== slideIndex);
    });
}

// * FUNCTION TO SHOW NEXT SLIDE * //
function nextSlide() {
    const currentSlide = document.querySelector(
        '.carousel-slide[style*="display: block"]'
    );
    const currentIndex = currentSlide
        ? Array.from(currentSlide.parentNode.children).indexOf(currentSlide)
        : 0;

    // * CALL SHOWSLIDE WITH NEXT SLIDE INDEX * //
    showSlide(currentIndex + 1);
}

// * Function to show previous slide * //
function prevSlide() {
    const currentSlide = document.querySelector(
        '.carousel-slide[style*="display: block"]'
    );
    const currentIndex = currentSlide
        ? Array.from(currentSlide.parentNode.children).indexOf(currentSlide)
        : 0;

    // * CALL SHOWSLIDE WITH PREVIOUS SLIDE INDEX * //
    showSlide(currentIndex - 1);
}

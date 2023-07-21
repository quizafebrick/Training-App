// // JavaScript function for carousel functionality
// function showSlide(slideIndex) {
//     const slides = document.querySelectorAll(".carousel-slide");
//     const totalSlides = slides.length;

//     // Ensure slideIndex is within the valid range
//     slideIndex = (slideIndex + totalSlides) % totalSlides;

//     // Hide all slides
//     slides.forEach((slide) => {
//         slide.style.display = "none";
//     });

//     // Show the current slide
//     slides[slideIndex].style.display = "block";
// }

// // Function to show next slide
// function nextSlide() {
//     const currentSlide = document.querySelector(
//         '.carousel-slide[style*="display: block"]'
//     );
//     const currentIndex = currentSlide
//         ? Array.from(currentSlide.parentNode.children).indexOf(currentSlide)
//         : 0;

//     // Call showSlide with next slide index
//     showSlide(currentIndex + 1);
// }

// // Function to show previous slide
// function prevSlide() {
//     const currentSlide = document.querySelector(
//         '.carousel-slide[style*="display: block"]'
//     );
//     const currentIndex = currentSlide
//         ? Array.from(currentSlide.parentNode.children).indexOf(currentSlide)
//         : 0;

//     // Call showSlide with previous slide index
//     showSlide(currentIndex - 1);
// }

// JavaScript function for carousel functionality
function showSlide(slideIndex) {
    const slides = document.querySelectorAll(".carousel-slide");
    const indicators = document.querySelectorAll(".carousel-indicator");
    const totalSlides = slides.length;

    // Ensure slideIndex is within the valid range
    slideIndex = (slideIndex + totalSlides) % totalSlides;

    // Hide all slides and reset indicators
    slides.forEach((slide, index) => {
        slide.style.display = index === slideIndex ? "block" : "none";
        indicators[index].classList.toggle("bg-white", index === slideIndex);
        indicators[index].classList.toggle("bg-gray-500", index !== slideIndex);
    });
}

// Function to show next slide
function nextSlide() {
    const currentSlide = document.querySelector(
        '.carousel-slide[style*="display: block"]'
    );
    const currentIndex = currentSlide
        ? Array.from(currentSlide.parentNode.children).indexOf(currentSlide)
        : 0;

    // Call showSlide with next slide index
    showSlide(currentIndex + 1);
}

// Function to show previous slide
function prevSlide() {
    const currentSlide = document.querySelector(
        '.carousel-slide[style*="display: block"]'
    );
    const currentIndex = currentSlide
        ? Array.from(currentSlide.parentNode.children).indexOf(currentSlide)
        : 0;

    // Call showSlide with previous slide index
    showSlide(currentIndex - 1);
}

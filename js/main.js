const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-container")
// const navMenu = document.querySelector(".nav-menu");
// const navLogin = document.querySelector(".login-button");


hamburger.addEventListener("click", () => {
    navMenu.classList.toggle("active")
    hamburger.classList.toggle("active");
})

document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () =>{
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");

}))



const sliderWrapper = document.querySelector('.slider-wrapper');
const cards = document.querySelectorAll('.card');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let currentIndex = 0;

// Update the slider position
function updateSliderPosition() {
    const containerWidth = sliderWrapper.offsetWidth; // Get the container's width dynamically
    const cardWidth = cards[0].offsetWidth; // Get the width of a single card
    const offset = -currentIndex * cardWidth;
    sliderWrapper.style.transform = `translateX(${offset}px)`;
}

// Add event listeners
prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        updateSliderPosition();
    }
});

nextBtn.addEventListener('click', () => {
    if (currentIndex < cards.length - 1) {
        currentIndex++;
        updateSliderPosition();
    }
});

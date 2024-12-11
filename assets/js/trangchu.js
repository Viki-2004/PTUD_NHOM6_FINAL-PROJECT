// Hàm để mở hoặc đóng navbar khi click vào icon menu
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle class 'active' để hiển thị/ẩn navbar
}

function initCarousel(buttonLeft, buttonRight, track, itemSelector, visibleItems = 5) {
    const items = document.querySelectorAll(itemSelector);
    const totalItems = items.length;
    let currentIndex = 0;
    let itemWidth = items[0].offsetWidth;

    function updatePosition() {
        const newPosition = -(currentIndex * itemWidth);
        track.style.transform = `translateX(${newPosition}px)`;
    }

    buttonLeft.addEventListener('click', () => {
        currentIndex = currentIndex > 0 ? currentIndex - 1 : totalItems - visibleItems;
        updatePosition();
    });

    buttonRight.addEventListener('click', () => {
        currentIndex = currentIndex < totalItems - visibleItems ? currentIndex + 1 : 0;
        updatePosition();
    });

    window.addEventListener('resize', () => {
        itemWidth = items[0].offsetWidth;
        updatePosition();
    });
}

// Gọi hàm cho từng carousel
document.addEventListener('DOMContentLoaded', function () {
    initCarousel(
        document.querySelector('.left-btn'),
        document.querySelector('.right-btn'),
        document.querySelector('.products-carousel'),
        '.product-item',
        2
    );
});

//NAV
// Get the navigation buttons and carousel container
const leftBtn = document.querySelector('.nav-left-btn');
const rightBtn = document.querySelector('.nav-right-btn');
const carousel = document.querySelector('.nav-carousel');

// Get the width of each carousel item
const itemWidth = document.querySelector('.nav-item').offsetWidth + 20; // item width + gap
const totalItems = document.querySelectorAll('.nav-item').length;

// Initialize the position variable for the carousel
let currentPosition = 0;

// Add event listener to the left button
leftBtn.addEventListener('click', () => {
  if (currentPosition < 0) {
    currentPosition += itemWidth; // Move left by one item
    carousel.style.transform = `translateX(${currentPosition}px)`; // Apply the transform
  }
});

// Add event listener to the right button
rightBtn.addEventListener('click', () => {
  const maxPosition = -(itemWidth * (totalItems - 1)); // Maximum scroll position
  if (currentPosition > maxPosition) {
    currentPosition -= itemWidth; // Move right by one item
    carousel.style.transform = `translateX(${currentPosition}px)`; // Apply the transform
  }
});


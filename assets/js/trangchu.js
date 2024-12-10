// Hàm để mở hoặc đóng navbar khi click vào icon menu
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle class 'active' để hiển thị/ẩn navbar
}
document.addEventListener('DOMContentLoaded', function () {
// Lấy tất cả các phần tử cần thiết
const prevButton = document.querySelector('.nav-carousel-btn-left');
const nextButton = document.querySelector('.nav-carousel-btn-right');
const carouselTrack = document.querySelector('.nav-carousel-track');
const carouselItems = document.querySelectorAll('.nav-carousel-item');
const totalItems = carouselItems.length;
let itemWidth = carouselItems[0].offsetWidth; // Chiều rộng mặc định của mỗi item
let visibleItems = 5; // Số sản phẩm hiển thị mặc định
let currentIndex = 0;

// Cập nhật kích thước và số lượng hiển thị dựa trên kích thước màn hình
function updateCarouselSettings() {
    if (window.innerWidth <= 480) {
        visibleItems = 1; // Hiển thị 1 sản phẩm trên màn hình nhỏ
    } else {
        visibleItems = 5; // Hiển thị 5 sản phẩm trên màn hình lớn
    }
    itemWidth = carouselItems[0].offsetWidth; // Cập nhật chiều rộng mỗi item
    adjustCurrentIndex(); // Điều chỉnh currentIndex nếu cần
    updateCarouselPosition(); // Cập nhật vị trí
}

// Điều chỉnh currentIndex nếu vượt quá giới hạn
function adjustCurrentIndex() {
    if (currentIndex > totalItems - visibleItems) {
        currentIndex = totalItems - visibleItems; // Đặt currentIndex hợp lệ
    }
}

// Chức năng di chuyển carousel sang trái
prevButton.addEventListener('click', function () {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = totalItems - visibleItems; // Quay lại ảnh cuối cùng nếu đang ở đầu
    }
    updateCarouselPosition();
});

// Chức năng di chuyển carousel sang phải
nextButton.addEventListener('click', function () {
    if (currentIndex < totalItems - visibleItems) {
        currentIndex++;
    } else {
        currentIndex = 0; // Quay lại ảnh đầu tiên nếu đang ở cuối
    }
    updateCarouselPosition();
});

// Cập nhật vị trí của carousel
function updateCarouselPosition() {
    const newPosition = -(currentIndex * itemWidth);
    carouselTrack.style.transform = `translateX(${newPosition}px)`;
}

// Lắng nghe sự kiện thay đổi kích thước màn hình
window.addEventListener('resize', updateCarouselSettings);

// Gọi hàm lần đầu khi trang được tải
updateCarouselSettings();
});
// TRENDING NOW
document.addEventListener('DOMContentLoaded', function () { 
// Lấy tất cả các phần tử cần thiết
const prevButton = document.querySelector('.left-btn');
const nextButton = document.querySelector('.right-btn');
const carouselTrack = document.querySelector('.products-carousel');
const productItems = document.querySelectorAll('.product-item');
const totalItems = productItems.length;
const gap = 20; // Khoảng cách giữa các ảnh
let itemWidth = productItems[0].offsetWidth + gap; // Chiều rộng của mỗi item
let visibleItems = 2; // Số ảnh hiển thị mặc định
let currentIndex = 0;

// Hàm cập nhật chiều rộng và số lượng ảnh hiển thị
function updateCarousel() {
    // Kiểm tra kích thước màn hình
    if (window.innerWidth <= 480) {
        visibleItems = 1; // Chỉ hiển thị 1 ảnh khi màn hình nhỏ
    } else {
        visibleItems = 2; // Hiển thị 2 ảnh trên màn hình lớn
    }

    itemWidth = productItems[0].offsetWidth + gap; // Cập nhật chiều rộng mỗi item
    adjustCurrentIndex(); // Đảm bảo currentIndex hợp lệ
    updatePosition(); // Cập nhật vị trí
}

// Điều chỉnh currentIndex nếu cần
function adjustCurrentIndex() {
    if (currentIndex > totalItems - visibleItems) {
        currentIndex = totalItems - visibleItems; // Đặt lại nếu vượt quá giới hạn
    }
}

// Chức năng di chuyển carousel sang trái
prevButton.addEventListener('click', function () {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = totalItems - visibleItems; // Quay lại ảnh cuối cùng nếu đang ở đầu
    }
    updatePosition();
});

// Chức năng di chuyển carousel sang phải
nextButton.addEventListener('click', function () {
    if (currentIndex < totalItems - visibleItems) {
        currentIndex++;
    } else {
        currentIndex = 0; // Quay lại ảnh đầu tiên nếu đang ở cuối
    }
    updatePosition();
});

// Cập nhật vị trí của carousel
function updatePosition() {
    const newPosition = -(currentIndex * itemWidth);
    carouselTrack.style.transform = `translateX(${newPosition}px)`;
}

// Cập nhật lại khi thay đổi kích thước màn hình
window.addEventListener('resize', updateCarousel);

// Gọi hàm lần đầu khi trang được tải
updateCarousel();
});














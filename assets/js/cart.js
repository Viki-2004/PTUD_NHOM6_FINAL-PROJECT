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
    updateCarouselPosition(); // Cập nhật vị trí
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

// Cập nhật lại khi thay đổi kích thước màn hình
window.addEventListener('resize', updateCarousel);

// Gọi hàm lần đầu khi trang được tải
updateCarousel();
});

// Lấy tất cả các dòng sản phẩm trong giỏ hàng
const cartItems = document.querySelectorAll('.cart tbody tr');

// Hàm cập nhật tổng tiền theo số lượng
document.addEventListener('DOMContentLoaded', function () {
    const quantityInputs = document.querySelectorAll('.quantity');
    const cartRows = document.querySelectorAll('tr[data-id]');
    const totalBillElement = document.querySelector('.total-bill');
    const finalBillElement = document.querySelector('.final-bill');

    // Hàm tính tổng tiền
    function calculateTotal() {
        let totalBill = 0;

        cartRows.forEach(row => {
            const price = parseInt(row.querySelector('.price').textContent.replace(/\D/g, ''), 10);
            const quantity = parseInt(row.querySelector('.quantity').value, 10);
            const total = price * quantity;

            row.querySelector('.total').textContent = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
            totalBill += total;
        });

        const discount = parseFloat(<?= $discount ?>); // Lấy giảm giá từ PHP
        const finalBill = totalBill * (1 - discount);

        totalBillElement.textContent = 'Tổng hóa đơn: ' + new Intl.NumberFormat('vi-VN').format(totalBill) + 'đ';
        finalBillElement.textContent = 'Thành tiền: ' + new Intl.NumberFormat('vi-VN').format(finalBill) + 'đ';
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các nút tăng giảm
        const increaseBtns = document.querySelectorAll('.increase-btn');
        const decreaseBtns = document.querySelectorAll('.decrease-btn');
        
        // Thêm sự kiện cho nút tăng
        increaseBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const input = document.querySelector(`input[name="quantity[${productId}]"]`);
                let quantity = parseInt(input.value);
                input.value = quantity + 1;
                updateTotalPrice(productId);
            });
        });
    
        // Thêm sự kiện cho nút giảm
        decreaseBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const input = document.querySelector(`input[name="quantity[${productId}]"]`);
                let quantity = parseInt(input.value);
                if (quantity > 1) {
                    input.value = quantity - 1;
                    updateTotalPrice(productId);
                }
            });
        });
    
        // Cập nhật lại tổng tiền của sản phẩm
        function updateTotalPrice(productId) {
            const price = parseFloat(document.querySelector(`.price[data-id="${productId}"]`).textContent.replace('đ', '').replace(',', ''));
            const quantity = parseInt(document.querySelector(`input[name="quantity[${productId}]"]`).value);
            const total = price * quantity;
            document.querySelector(`.total[data-id="${productId}"]`).textContent = total.toLocaleString() + 'đ';
        }
    });

    calculateTotal(); // Tính toán ban đầu
});

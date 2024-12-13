// Hàm để mở hoặc đóng navbar khi click vào icon menu
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle class 'active' để hiển thị/ẩn navbar
}

// Lấy tất cả các dòng sản phẩm trong giỏ hàng
const cartItems = document.querySelectorAll('.cart tbody tr');

// Hàm cập nhật tổng tiền theo số lượng
document.addEventListener('DOMContentLoaded', function () {
    const cartRows = document.querySelectorAll('tr[data-id]');
    const totalBillElement = document.querySelector('.total-bill');
    const finalBillElement = document.querySelector('.final-bill');

    // Hàm tính tổng tiền
    function calculateTotal() {
        let totalBill = 0;

        cartRows.forEach(row => {
            const price = parseInt(row.querySelector('.price').textContent.replace(/\D/g, ''), 10);
            const quantityInput = row.querySelector('.quantity input');
            const quantity = parseInt(quantityInput.value, 10);
            const total = price * quantity;

            row.querySelector('.total').textContent = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
            totalBill += total;
        });

        const discount = parseFloat(<?= $discount ?> || 0); // Lấy giảm giá từ PHP
        const finalBill = totalBill * (1 - discount);

        totalBillElement.textContent = 'Tổng hóa đơn: ' + new Intl.NumberFormat('vi-VN').format(totalBill) + 'đ';
        finalBillElement.textContent = 'Thành tiền: ' + new Intl.NumberFormat('vi-VN').format(finalBill) + 'đ';
    }

    // Xử lý sự kiện khi số lượng thay đổi
    cartRows.forEach(row => {
        const quantityInput = row.querySelector('.quantity input');
        
        // Sự kiện khi nhấn nút tăng hoặc giảm
        const increaseBtn = row.querySelector('.increase-btn');
        const decreaseBtn = row.querySelector('.decrease-btn');

        increaseBtn.addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            calculateTotal();
        });

        decreaseBtn.addEventListener('click', () => {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                calculateTotal();
            }
        });

        // Sự kiện khi nhập trực tiếp vào ô số lượng
        quantityInput.addEventListener('change', () => {
            if (quantityInput.value < 1) {
                quantityInput.value = 1; // Đảm bảo số lượng tối thiểu là 1
            }
            calculateTotal();
        });
    });

    // Tính tổng ngay khi load trang
    calculateTotal();
});

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
        5
    );
});

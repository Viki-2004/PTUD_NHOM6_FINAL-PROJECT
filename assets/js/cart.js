// Hàm để mở hoặc đóng navbar khi click vào icon menu
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle class 'active' để hiển thị/ẩn navbar
}

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

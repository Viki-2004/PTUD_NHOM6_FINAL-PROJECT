// Hàm để mở hoặc đóng navbar khi click vào icon menu
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle class 'active' để hiển thị/ẩn navbar
}
$('.menu-nav').click(
    function () {
        $('.main-nav').slideToggle(200);
        // Cái sử dụng click kia là để click vào icon nó xuất hiện đống main-nav
        // Vế if là để khi mình click vào icon thì nó chuyển thành dấu X (fa-times là icon của dấu X)
        if ($('.menu-nav').hasClass('fa-bars')) {
            $('.menu-nav').addClass('fa-times')
            $('.menu-nav').removeClass('fa-bars')
        }
        else {
            $('.menu-nav').addClass('fa-bars')
            $('.menu-nav').removeClass('fa-times')
        }
    }
)
// Xử lý thay đổi ảnh khi bấm vào thumbnail
function changeImage(element) {
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail');

    // Đổi ảnh chính
    mainImage.src = element.src;

    // Gỡ class active từ tất cả các thumbnail
    thumbnails.forEach(thumbnail => thumbnail.classList.remove('active'));

    // Thêm class active vào thumbnail được chọn
    element.classList.add('active');
}

// Xử lý tăng/giảm số lượng
document.addEventListener("DOMContentLoaded", function () {
    const quantityInput = document.getElementById("quantity");
    const quantityButtons = document.querySelectorAll(".quantity-btn");

    // Xử lý tăng/giảm số lượng khi nhấn nút
    quantityButtons.forEach((button) => {
        button.addEventListener("click", () => {
            let currentValue = parseInt(quantityInput.value, 10);

            if (button.dataset.action === "increase") {
                quantityInput.value = currentValue + 1;
            } else if (button.dataset.action === "decrease") {
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            }
        });
    });

    // Xử lý khi nhập giá trị trực tiếp vào ô
    quantityInput.addEventListener("input", () => {
        let currentValue = parseInt(quantityInput.value, 10);

        // Nếu giá trị không hợp lệ hoặc nhỏ hơn 1, đặt lại giá trị thành 1
        if (isNaN(currentValue) || currentValue < 1) {
            quantityInput.value = 1;
        }
    });

    // Xử lý khi ô số lượng bị mất focus
    quantityInput.addEventListener("blur", () => {
        if (quantityInput.value === "" || parseInt(quantityInput.value, 10) < 1) {
            quantityInput.value = 1; // Đảm bảo không để giá trị trống hoặc < 1
        }
    });
});















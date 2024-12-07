// Hàm để mở hoặc đóng navbar khi click vào icon menu
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle class 'active' để hiển thị/ẩn navbar
}
// Hàm để định dạng giá từ chuỗi '420.000đ' thành số 420000
function parsePrice(priceString) {
    return parseInt(priceString.replace(/\./g, '').replace('đ', ''));
}

// Hàm sắp xếp sản phẩm
function sortProducts(criteria) {
    const productContainer = document.querySelector('.product_items');
    const products = Array.from(document.querySelectorAll('.product_item'));

    let sortedProducts;
    if (criteria === 'price-asc') {
        // Sắp xếp giá tăng dần
        sortedProducts = products.sort((a, b) => {
            const priceA = parsePrice(a.querySelector('.product_price').textContent);
            const priceB = parsePrice(b.querySelector('.product_price').textContent);
            return priceA - priceB;
        });
    } else if (criteria === 'price-desc') {
        // Sắp xếp giá giảm dần
        sortedProducts = products.sort((a, b) => {
            const priceA = parsePrice(a.querySelector('.product_price').textContent);
            const priceB = parsePrice(b.querySelector('.product_price').textContent);
            return priceB - priceA;
        });
    } else {
        // Mặc định (không thay đổi thứ tự)
        sortedProducts = products;
    }

    // Xóa sản phẩm cũ và thêm lại sản phẩm đã sắp xếp
    productContainer.innerHTML = '';
    sortedProducts.forEach(product => productContainer.appendChild(product));
}

// Gắn sự kiện vào dropdown
document.getElementById('sort').addEventListener('change', function () {
    const selectedValue = this.value;
    sortProducts(selectedValue);
});

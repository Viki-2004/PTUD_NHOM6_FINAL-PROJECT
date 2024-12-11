<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHI TIẾT SẢN PHẨM <?= $product['product_name']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cart.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cart_queries.css">
    <script src="../../assets/js/cart.js"></script>
</head>
<body>
<!-- Header -->
<header class="header">
        <div class="logo">POLIDOLL</div>
        <div class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
        <nav class="navbar">
            <div class="dropdown">
                <button class="dropbtn"><a href="trangchu.php">TRANG CHỦ</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a href="product.html">SẢN PHẨM</a></button>
                <div class="dropdown-content">
                    <a href="#">Mắt</a>
                    <a href="#">Môi</a>
                    <a href="#">Mặt</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">KHÁM PHÁ</button>
                <div class="dropdown-content">
                    <a href="aboutus.php">Về Chúng Tôi</a>
                    <a href="news.php">Blogs</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="lienhe.php"><button class="dropbtn">LIÊN HỆ</a></button>
            </div>
        </nav>
        <div class="icons">
            <a href="#" title="Search"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a href="#" title="Wishlist"><i class="fa-solid fa-heart"></i></a>
            <a href="#" title="Cart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </header>

<?php
include "../../config/connect.php";

// Lấy ID sản phẩm từ URL
$product_id = isset($_GET['id']) ? $_GET['id'] : '';
$product = null;

if ($product_id) {
    // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm
    $query = "SELECT * FROM product WHERE sku = '$product_id'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    }
}

// Kiểm tra xem sản phẩm có tồn tại không
if (!$product) {
    echo "Sản phẩm không tồn tại!";
    exit;
}
?>

    <main class="product_details_container">
        <div class="container">
            <div class="product_details">
                <div class="product_images">
                    <img src="../../assets/img/products/<?php echo $product['product_img']; ?>" alt="<?php echo $product['product_name']; ?>">
                    <img src="../../assets/img/products/<?php echo $product['product_hover']; ?>" alt="<?php echo $product['product_name']; ?> hover">
                </div>
                <div class="product_info">
                    <h1><?php echo $product['product_name']; ?></h1>
                    <p class="product_price"><?php echo $product['product_price']; ?>đ</p>
                    <p class="product_description"><?php echo $product['product_description']; ?></p>
                    <button class="buy_now_btn">Mua ngay</button>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <!-- Nội dung footer -->
    </footer>
</body>
</html>

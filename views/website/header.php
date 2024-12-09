<!DOCTYPE html>
<html>

<head>
    <title>HEADER</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/header.css">
    <script src="../../assets/js/header.js"></script>
</head>
<body>
        <div class="logo">POLIDOLL</div>
        <div class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
        <nav class="navbar">
            <div class="dropdown">
                <button class="dropbtn"><a href="trangchu.html">TRANG CHỦ</a></button>
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
                    <a href="aboutus.html">Về Chúng Tôi</a>
                    <a href="news.html">Blogs</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="lienhe.html"><button class="dropbtn">LIÊN HỆ</a></button>
            </div>
        </nav>
        <div class="icons">
            <a href="#" title="Search"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a href="#" title="Wishlist"><i class="fa-solid fa-heart"></i></a>
            <a href="#" title="Cart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
</body>
</html>
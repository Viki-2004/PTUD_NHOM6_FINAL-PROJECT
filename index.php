<?php
    require "./config/connect.php";
    // include "./config/createdatabase.php";
    // echo "<br>";
    // include "./config/insertdata.php";
    // echo "<br>";
    // echo "hole fen";
?>
<!DOCTYPE html>
<html>

<head>
    <title>POLIDOLL</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/trangchu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/trangchu_queries.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="assets/js/trangchu.js"></script>
    <!-- Header -->
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <script src="assets/js/header.js"></script>
    <!-- Footer -->
    <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
</head>

<body>
    <?php
    include "config/connect.php";

    $trendproducts = mysqli_query($conn, "SELECT * FROM product WHERE trending = 1");
    $new_products = mysqli_query($conn, "SELECT * FROM product WHERE new_arrival = 1");
    $category = mysqli_query($conn, "SELECT * FROM category");
    ?>
    <header class="header">
        <div class="logo"><a href="views/website/trangchu.php" style = "color: #f25a8c; text-decoration: none">POLIDOLL</a></div>
        <div class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars mobile-nav-icon"></i></div>
        <nav class="navbar">
            <div class="dropdown">
                <button class="dropbtn"><a href="views/website/trangchu.php">TRANG CHỦ</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a href="views/website/product.php">SẢN PHẨM</a></button>
                <div class="dropdown-content">
                <?php while($cat1 = mysqli_fetch_array($category)) { ?>
                        <div>
                            <a href="views/website/product.php?id_category=<?=$cat1['category_id']?>"><?= $cat1['category_name'] ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">KHÁM PHÁ</button>
                <div class="dropdown-content">
                    <a href="views/website/aboutus.php">Về Chúng Tôi</a>
                    <a href="views/website/news.php">Blogs</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="views/website/lienhe.php"><button class="dropbtn">LIÊN HỆ</a></button>
            </div>
        </nav>
        <div class="icons">
        <a href="views/website/product.php" title="shopping"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="views/website/cart.php" title="Cart"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="views/website/login.php" title="user"><i class="fa-duotone fa-solid fa-user"></i></a>
        </div>
    </header>
    <section class="main-banner">
        <img src="assets/img/trang chu/ảnh bìa trang chủ.png" alt="Main Banner">
    </section>
    <section class="shop-category">
        <h2>Danh mục sản phẩm</h2>
        <div class="card-container">
            <div class="category">
                <img src="assets/img/trang chu/trang chủ - lips.png" alt="Lips" class="Category-image">
            </div>
            <div class="category">
                <img src="assets/img/trang chu/trang chủ - eyes.png" alt="Eyes" class="Category-image">
            </div>
            <div class="category">
                <img src="assets/img/trang chu/trang chủ - faces.png" alt="Faces" class="Category-image">
            </div>
            <div class="category">
                <img src="assets/img/trang chu/trang chủ - tools.png" alt="Tools" class="Category-image">
            </div>
        </div>
    </section>
    <section class="trending-now-section">
        <h2>Xu hướng</h2>
        <div class="content-container">
            <!-- Left: Product Carousel -->
            <div class="products-container">
                <button class="arrow-btn left-btn" >&#10094;</button>
                <div class="products-carousel-wrapper">
                    <div class="products-carousel">
                            <?php
                            while($row = mysqli_fetch_array($trendproducts)){                          
                            ?>
                            <!-- Product 1 -->
                            <div class="product-item">
                                <div class="product-image">
                                    <a href = "views/website/chitietsanpham.php?sku=<?=$row["sku"]?>">
                                    <img src="assets/img/products/<?php echo $row["product_img"] ?>" alt="<?php echo $row["product_img"] ?>" class="default_img">
                                    <img src="assets/img/products/<?php echo $row["product_hover"] ?>" alt="<?php echo $row["product_hover"] ?> hover" class="hover_img">
                                    </a>
                                            <form id = "add-to-cart-form" action = "views/website/addcart.php?sku=<?php echo $row['sku'] ?>" method = "POST">
                                                <input type = "submit" id="addToCart" name="addcart" class="nav-buy-now-btn" value ="Mua ngay"/>
                                            </form>
                                </div>
                                    <p class="product-name"><a style="text-decoration: none; color: #f25a8c;" href = "views/website/chitietsanpham.php?sku=<?=$row["sku"]?>"><?php echo $row["product_name"] ?></a>
                                    </p>
                                    <p class="product-price"><?php echo number_format($row['product_price'], 0, ',', '.'); ?>đ</p>
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <button class="arrow-btn right-btn" >&#10095;</button>
            </div>
    
            <!-- Right: Banner -->
            <div class="banner-container">
                <img src="assets/img/trang chu/trending banner.png" alt="Trending Banner">
            </div>
        </div>
    </section>
       
    
    <section class="top-selling-collection">
        <div class="top-selling-img">
            <img src="assets/img/trang chu/top selling collection.png" alt="Top Selling Collection">
        </div>
        <h2>Sản phẩm mới</h2>
    </section>

    <section class="nav-section">
        <div class="content-container">
    <div class="nav-container">
                <!-- <button class="nav-btn nav-left-btn" >&#10094;</button> -->
                <div class="nav-carousel-wrapper">
                    <div class="nav-carousel">
                            <?php
                            while($row = mysqli_fetch_array($new_products)){                          
                            ?>
                            <!-- Product -->
                            <div class="nav-item">
                                <div class="nav-image">
                                    <a href = "views/website/chitietsanpham.php?sku=<?=$row["sku"]?>">
                                    <img src="assets/img/products/<?php echo $row["product_img"] ?>" alt="<?php echo $row["product_img"] ?>" class="nav-main-image">
                                    <img src="assets/img/products/<?php echo $row["product_hover"] ?>" alt="<?php echo $row["product_hover"] ?> hover" class="nav-hover-image">
                                    </a>
                                    <form id = "add-to-cart-form" action = "views/website/addcart.php?sku=<?php echo $row['sku'] ?>" method = "POST">
                                                <input type = "submit" id="addToCart" name="addcart" class="nav-buy-now-btn" value ="Mua ngay"/>
                                    </form>
                                </div>
                                    <p class="nav-name"><a style="text-decoration: none; color: #f25a8c;" href = "views/website/chitietsanpham.php?sku=<?=$row["sku"]?>"><?php echo $row["product_name"] ?></a>
                                    </p>
                                    <p class="nav-price"><?php echo number_format($row['product_price'], 0, ',', '.'); ?>đ</p>
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <!-- <button class="nav-btn nav-right-btn" >&#10095;</button> -->
            </div>
            </div>
        </section>
    <section class="why-us-section">
        <h2>Đến với PoliDoll</h2>
        <div class="why-us-container">
            <!-- Item 1 -->
            <div class="why-us-item">
                <div class="why-us-icon">🚚</div>
                <div class="why-us-text">Vận chuyển nhanh chóng</div>
            </div>

            <!-- Item 2 -->
            <div class="why-us-item">
                <div class="why-us-icon">📦</div>
                <div class="why-us-text">Dễ dàng hoàn trả</div>
            </div>

            <!-- Item 3 -->
            <div class="why-us-item">
                <div class="why-us-icon">🏅</div>
                <div class="why-us-text">Sản phẩm chính hãng</div>
            </div>
        </div>
    </section>
    <section class="carousel-section">
        <h2>PoliDoll Trên Instagram</h2>
        <p>#POLIGIRL COMMUNITY</p>
        <div class="carousel-container">
            <div class="carousel-track">
                <!-- Các ảnh -->
                <div class="carousel-item"><img src="assets/img/trang chu/1.png" alt="Image 1"></div>
                <div class="carousel-item"><img src="assets/img/trang chu/2.png" alt="Image 2"></div>
                <div class="carousel-item"><img src="assets/img/trang chu/5.png" alt="Image 3"></div>
                <div class="carousel-item"><img src="assets/img/trang chu/7.png" alt="Image 4"></div>
                <div class="carousel-item"><img src="assets/img/trang chu/6.png" alt="Image 8"></div>
            </div>
        </div>
        <a href="#" class="view-gallery">Xem Thư Viện</a>
    </section>
    <section class="parallax-section">
        <div class="parallax-content">
            <h3>ĐĂNG KÝ NHẬN THƯ</h3>
            <p>Nhận những thông tin mới nhất về sản phẩm và chương trình ưu đãi của chúng tôi</p>
            <form action="#" method="post" class="newsletter-form">
                <input type="email" placeholder="Nhập địa chỉ email của bạn" required>
                <button type="submit">GỬI</button>
            </form>
        </div>
    </section>
</body>
<footer class="footer">
<div class="footer-container">
        <!-- Customer Service Section -->
        <div class="footer-section">
            <h4>CHĂM SÓC KHÁCH HÀNG</h4>
            <p>polidoll.cskh@gmail.com</p>
        </div>
        <!-- Informations Section -->
        <div class="footer-section information">
            <h4>THÔNG TIN</h4>
            <ul>
                <li><a href="aboutus.php">Về chúng tôi</a></li>
                <li><a href="lienhe.php">Liên lạc</a></li>
                <li><a href="#">Theo dõi đơn hàng</a></li>
                <li><a href="news.php">Tin tức</a></li>
            </ul>
        </div>
        <!-- Policy Section -->
        <div class="footer-section Policy">
            <h4>CHÍNH SÁCH</h4>
            <ul>
                <li><a href="#">Chính sách bảo mật</a></li>
                <li><a href="#">Chính sách hoàn trả</a></li>
                <li><a href="#">Chính sách vận chuyển</a></li>
                <li><a href="#">Điều khoản dịch vụ</a></li>
            </ul>
        </div>
        <!-- Follow Us Section -->
        <div class="footer-section">
            <h4>THEO DÕI CHÚNG TÔI</h4>
            <div class="social-icons">
                <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
            <h4>ĐĂNG KÝ LIÊN LẠC</h4>
            <div class="newsletter">
                <p>Nhận những thông tin mới nhất về sản phẩm và chương trình ưu đãi của chúng tôi</p>
                <input type="email" placeholder="Nhâp địa chỉ email của bạn">
                <button>GỬI</button>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button -->
    <div class="scroll-top">
        <a href="#">⬆</a>
    </div>
</footer>
</html>



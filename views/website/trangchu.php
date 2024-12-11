<!DOCTYPE html>
<html>

<head>
    <title>POLIDOLL</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/trangchu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/trangchu_queries.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="assets/js/trangchu.js"></script>
</head>

<body>
<header class="header">
<<<<<<< HEAD
    <?php include "views/website/header.php";
    include "config/connect.php";

    $trendproducts = mysqli_query($conn, "SELECT * FROM product WHERE trending = 1");
    $new_products = mysqli_query($conn, "SELECT * FROM product WHERE new_arrival = 1");
=======
    <?php include "./header.php";
    include "../../config/connect.php";

    $products = mysqli_query($conn, "SELECT * FROM product WHERE trending = 1");
>>>>>>> origin/nhatanh
    ?>
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
<<<<<<< HEAD
                            while($row = mysqli_fetch_array($trendproducts)){                          
                            ?>
                            <!-- Product 1 -->
                            <div class="product-item">
                                <div class="product-image">
                                    <a href = "chitietsanpham.php?sku=<?=$row["sku"]?>">
                                    <img src="assets/img/products/<?php echo $row["product_img"] ?>" alt="<?php echo $row["product_img"] ?>" class="default_img">
                                    <img src="assets/img/products/<?php echo $row["product_hover"] ?>" alt="<?php echo $row["product_hover"] ?> hover" class="hover_img">
                                    </a>
                                    <button class="nav-buy-now-btn">Mua ngay</button>
                                </div>
                                    <p class="product-name"><a style="text-decoration: none; color: #f25a8c;" href = "chitietsanpham.php?sku=<?=$row["sku"]?>"><?php echo $row["product_name"] ?></a>
                                    </p>
                                    <p class="product-price"><?php echo number_format($row['product_price'], 0, ',', '.'); ?>đ</p>
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <button class="arrow-btn right-btn" >&#10095;</button>
=======
                            while($row = mysqli_fetch_array($products)){                          
                            ?>
                        <!-- Product 1 -->
                        <div class="product-item">
                            <div class="product-image">
                            <a href = "chitietsanpham.php?sku=<?=$row["sku"]?>">
                                <img src="../../assets/img/products/<?php echo $row["product_img"] ?>" alt="<?php echo $row["product_img"] ?>" class="default_img">
                                <img src="../../assets/img/products/<?php echo $row["product_hover"] ?>" alt="<?php echo $row["product_hover"] ?> hover" class="hover_img">
                                </a>
                                <button class="nav-buy-now-btn">Mua ngay</button>
                            </div>
                            <p class="product-name"><a href = "chitietsanpham.php?sku=<?=$row["sku"]?>"><?php echo $row["product_name"] ?></a>
                            </p>
                            <p class="product-price"><?php echo number_format($row['product_price'], 0, ',', '.'); ?>đ</p>
                        </div>
                    </div>
                </div>
                <button class="arrow-btn right-btn" onclick="navigateCarousel(1)">&#10095;</button>
                <?php } ?>                
>>>>>>> origin/nhatanh
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
                <button class="nav-btn nav-left-btn" >&#10094;</button>
                <div class="nav-carousel-wrapper">
                    <div class="nav-carousel">
                            <?php
                            while($row = mysqli_fetch_array($new_products)){                          
                            ?>
                            <!-- Product -->
                            <div class="nav-item">
                                <div class="nav-image">
                                    <a href = "chitietsanpham.php?sku=<?=$row["sku"]?>">
                                    <img src="assets/img/products/<?php echo $row["product_img"] ?>" alt="<?php echo $row["product_img"] ?>" class="nav-main-image">
                                    <img src="assets/img/products/<?php echo $row["product_hover"] ?>" alt="<?php echo $row["product_hover"] ?> hover" class="nav-hover-image">
                                    </a>
                                    <button class="nav-buy-now-btn">Mua ngay</button>
                                </div>
                                    <p class="nav-name"><a style="text-decoration: none; color: #f25a8c;" href = "chitietsanpham.php?sku=<?=$row["sku"]?>"><?php echo $row["product_name"] ?></a>
                                    </p>
                                    <p class="nav-price"><?php echo number_format($row['product_price'], 0, ',', '.'); ?>đ</p>
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <button class="nav-btn nav-right-btn" >&#10095;</button>
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
    <footer>
    <?php include "./footer.php"; ?>
    </footer>
</body>
<<<<<<< HEAD
<footer>
<?php include "views/website/footer.php"; ?>
</footer>
=======
>>>>>>> origin/nhatanh
</html>
<!DOCTYPE html>
<html>

<head>
    <title>POLIDOLL</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/trangchu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/trangchu_queries.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/trangchu.js"></script>
</head>

<body>
<header class="header">
    <?php include "./header.php"; ?>
    </header>
    <section class="main-banner">
        <img src="../../assets/img/trang chu/ảnh bìa trang chủ.png" alt="Main Banner">
    </section>
    <section class="shop-category">
        <h2>Danh mục sản phẩm</h2>
        <div class="card-container">
            <div class="category">
                <img src="../../assets/img/trang chu/trang chủ - lips.png" alt="Lips" class="Category-image">
            </div>
            <div class="category">
                <img src="../../assets/img/trang chu/trang chủ - eyes.png" alt="Eyes" class="Category-image">
            </div>
            <div class="category">
                <img src="../../assets/img/trang chu/trang chủ - faces.png" alt="Faces" class="Category-image">
            </div>
            <div class="category">
                <img src="../../assets/img/trang chu/trang chủ - tools.png" alt="Tools" class="Category-image">
            </div>
        </div>
    </section>
    <section class="trending-now-section">
        <h2>Xu hướng</h2>
        <div class="content-container">
            <!-- Left: Product Carousel -->
            <div class="products-container">
                <button class="arrow-btn left-btn" onclick="navigateCarousel(-1)">&#10094;</button>
                <div class="products-carousel-wrapper">
                    <div class="products-carousel">
                        <!-- Product 1 -->
                        <div class="product-item">
                            <div class="product-image">
                                <img src="../../assets/img/trang chu/trending now 1.png" alt="Product 1" class="default-img">
                                <img src="../../assets/img/trang chu/trending now details 1.png" alt="Product 1 Hover" class="hover-img">
                                <button class="nav-buy-now-btn">Mua ngay</button>
                            </div>
                            <p class="product-name">Ice Watery Lip Gloss - #01 Orange Flash</p>
                            <p class="product-price">420.000đ</p>
                        </div>
                        <!-- Product 2 -->
                        <div class="product-item">
                            <div class="product-image">
                                <img src="../../assets/img/trang chu/trending now 2.png" alt="Product 2" class="default-img">
                                <img src="../../assets/img/trang chu/trending now details 2.png" alt="Product 2 Hover" class="hover-img">
                                <button class="nav-buy-now-btn">Mua ngay</button>
                            </div>
                            <p class="product-name">Cushion Lip Powder Cream - N01 Cutie Peach</p>
                            <p class="product-price">350.000đ</p>
                        </div>
                        <!-- Product 3 -->
                        <div class="product-item">
                            <div class="product-image">
                                <img src="../../assets/img/trang chu/trending now 3.png" alt="Product 3" class="default-img">
                                <img src="../../assets/img/trang chu/trending now details 3.png" alt="Product 3 Hover" class="hover-img">
                                <button class="nav-buy-now-btn">Mua ngay</button>
                            </div>
                            <p class="product-name">Hearty Lip Tint</p>
                            <p class="product-price">220.000đ</p>
                        </div>
                        <div class="product-item">
                            <div class="product-image">
                                <img src="../../assets/img/trang chu/trending now 4.png" alt="Product 3" class="default-img">
                                <img src="../../assets/img/trang chu/trending now details 4.png" alt="Product 3 Hover" class="hover-img">
                                <button class="nav-buy-now-btn">Mua ngay</button>
                            </div>
                            <p class="product-name">Mist Lip Glaze
                            </p>
                            <p class="product-price">190.000đ</p>
                        </div>
                    </div>
                </div>
                <button class="arrow-btn right-btn" onclick="navigateCarousel(1)">&#10095;</button>
            </div>
    
            <!-- Right: Banner -->
            <div class="banner-container">
                <img src="../../assets/img/trang chu/trending banner.png" alt="Trending Banner">
            </div>
        </div>
    </section>
       
    
    <section class="top-selling-collection">
        <h2>Bộ sưu tập bán chạy nhất</h2>
        <div class="top-selling-img">
            <img src="../../assets/img/trang chu/top selling collection.png" alt="Top Selling Collection">
        </div>
    </section>
    <section class="nav-carousel">
        <button class="nav-carousel-btn nav-carousel-btn-left">&lt;</button>
        <div class="nav-carousel-wrapper">
            <ul class="nav-carousel-track">
                <!-- Sản phẩm 1 -->
                <li class="nav-carousel-item">
                    <div class="nav-product-image">
                        <img src="../../assets/img/trang chu/product list 1.png" alt="JudyDoll Iron Mascara" class="nav-main-image" />
                        <a href = "chitietsanpham.html"><img src="../../assets/img/trang chu/product list detail 1.png" alt="JudyDoll Iron Mascara Hover"
                            class="nav-hover-image" /></a>
                            <a href = "chitietsanpham.html"><button class="nav-buy-now-btn">Mua ngay</button></a>
                    </div>
                    <div class="nav-product-info">
                        <p>JudyDoll Brand New - Iron Mascara</p>
                        <span>620.000đ</span>
                    </div>
                </li>
                <!-- Sản phẩm 2 -->
                <li class="nav-carousel-item">
                    <div class="nav-product-image">
                        <img src="../../assets/img/trang chu/product list 2.png" alt="3D Curling Mascara" class="nav-main-image" />
                        <img src="../../assets/img/trang chu/product list detail 2.png" alt="3D Curling Mascara Hover"
                            class="nav-hover-image" />
                        <button class="nav-buy-now-btn">Mua ngay</button>
                    </div>
                    <div class="nav-product-info">
                        <p>3D Curling Eyelash Iron Mascara</p>
                        <span>420.000đ</span>
                    </div>
                </li>
                <!-- Thêm các sản phẩm khác -->
                <li class="nav-carousel-item">
                    <div class="nav-product-image">
                        <img src="../../assets/img/trang chu/product list 3.png" alt="3D Curling Mascara" class="nav-main-image" />
                        <img src="../../assets/img/trang chu/product list detail 3.png" alt="3D Curling Mascara Hover"
                            class="nav-hover-image" />
                        <button class="nav-buy-now-btn">Mua ngay</button>
                    </div>
                    <div class="nav-product-info">
                        <p>Cushion Comb Brow Mascara
                        </p>
                        <span>599.000đ</span>
                    </div>
                </li>
                <li class="nav-carousel-item">
                    <div class="nav-product-image">
                        <img src="../../assets/img/trang chu/product list 4.png" alt="3D Curling Mascara" class="nav-main-image" />
                        <img src="../../assets/img/trang chu/product list detail 4.png" alt="3D Curling Mascara Hover"
                            class="nav-hover-image" />
                        <button class="nav-buy-now-btn">Mua ngay</button>
                    </div>
                    <div class="nav-product-info">
                        <p>Volume & Curling Mascara Duo
                        </p>
                        <span>210.000đ</span>
                    </div>
                </li>
                <li class="nav-carousel-item">
                    <div class="nav-product-image">
                        <img src="../../assets/img/trang chu/product list 5.png" alt="3D Curling Mascara" class="nav-main-image" />
                        <img src="../../assets/img/trang chu/product list detail 5.png" alt="3D Curling Mascara Hover"
                            class="nav-hover-image" />
                        <button class="nav-buy-now-btn">Mua ngay</button>
                    </div>
                    <div class="nav-product-info">
                        <p>2 in 1 Eyebrow Mascara</p>
                        <span>260.000đ</span>
                    </div>
                </li>
                <li class="nav-carousel-item">
                    <div class="nav-product-image">
                        <img src="../../assets/img/trang chu/product list 6.png" alt="3D Curling Mascara" class="nav-main-image" />
                        <img src="../../assets/img/trang chu/product list detail 6.png" alt="3D Curling Mascara Hover"
                            class="nav-hover-image" />
                        <button class="nav-buy-now-btn">Mua ngay</button>
                    </div>
                    <div class="nav-product-info">
                        <p>Iron Mascara - Sport Chic
                        </p>
                        <span>320.000đ</span>
                    </div>
                </li>
                <li class="nav-carousel-item">
                    <div class="nav-product-image">
                        <img src="../../assets/img/trang chu/product list 7.png" alt="3D Curling Mascara" class="nav-main-image" />
                        <img src="../../assets/img/trang chu/product list detail 7.png" alt="3D Curling Mascara Hover"
                            class="nav-hover-image" />
                        <button class="nav-buy-now-btn">Mua ngay</button>
                    </div>
                    <div class="nav-product-info">
                        <p>Forming Refined Eyelash Base Primer

                        </p>
                        <span>350.000đ</span>
                    </div>
                </li>
                <li class="nav-carousel-item">
                    <div class="nav-product-image">
                        <img src="../../assets/img/trang chu/product list 8.png" alt="3D Curling Mascara" class="nav-main-image" />
                        <img src="../../assets/img/trang chu/product list detail 8.png" alt="3D Curling Mascara Hover"
                            class="nav-hover-image" />
                        <button class="nav-buy-now-btn">Mua ngay</button>
                    </div>
                    <div class="nav-product-info">
                        <p>Mascara Remover
                        </p>
                        <span>250.000đ</span>
                    </div>
                </li>
            </ul>
        </div>
        <button class="nav-carousel-btn nav-carousel-btn-right">&gt;</button>
    </section>
    <section class="new-arrivals">
        <h2>Sản phẩm mới</h2>
        <div class="arrivals">
            <img src="../../assets/img/trang chu/new arrivals.png" alt="New Arrivals">
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
                <div class="carousel-item"><img src="../../assets/img/trang chu/1.png" alt="Image 1"></div>
                <div class="carousel-item"><img src="../../assets/img/trang chu/2.png" alt="Image 2"></div>
                <div class="carousel-item"><img src="../../assets/img/trang chu/5.png" alt="Image 3"></div>
                <div class="carousel-item"><img src="../../assets/img/trang chu/7.png" alt="Image 4"></div>
                <div class="carousel-item"><img src="../../assets/img/trang chu/6.png" alt="Image 8"></div>
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
<footer>
<?php include "./footer.php"; ?>
</footer>
</html>
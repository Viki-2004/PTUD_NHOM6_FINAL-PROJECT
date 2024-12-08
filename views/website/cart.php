<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIỎ HÀNG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cart.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cart_queries.css">
    <script src="../../assets/js/cart.js"></script>
</head>
<body>
    <header class="header">
    <?php include "./header.php"; ?>
    </header>
    <div class="container">
        <div class="cart">
            <h2>GIỎ HÀNG CỦA TÔI</h2>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="../../assets/img/products/cushion lip 1.jpg" alt="Ice Watery Lip Gloss">
                            Cushion Lip Powder Cream<br> #01 Orange Flash
                        </td>
                        <td class="price">200.000đ</td>
                        <td><input type="number" value="1" min="1" class="quantity"></td>
                        <td class="total">200.000đ</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="../../assets/img/products/eyeshadow 1.jpg" alt="Cushion Lip Powder Cream">
                            Ice Watery Lip Gloss<br> N01 Cutie Peach
                        </td>
                        <td class="price">400.000đ</td>
                        <td>
                            <input type="number" value="1" min="1"class="quantity"></td>
                        </td>
                        <td class="total">400.000đ</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="order-summary">
            <h2>ĐƠN HÀNG</h2>
            <input type="text" placeholder="Discount Code">
            <button class="apply-btn">APPLY</button>
            <p class="total-bill">Tổng hóa đơn: 600.000đ</p>
            <button>TIẾP TỤC THANH TOÁN</button>
            <button class="continue">TIẾP TỤC MUA HÀNG</button>
            <button class="Momo"><b>Momo</b></button>
        </div>
    </div>
    
    <div class="comment-section">
        <h2>Bình luận</h2>
        <form>
            <textarea placeholder="Viết bình luận của bạn..." rows="4" cols="50"></textarea>
            <button type="submit">Gửi bình luận</button>
        </form>
        </div>
    </div>
    <div class="best-seller-section">
        <h2>Bán chạy nhất</h2>
    </div>

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
<footer>
<?php include "./footer.php"; ?>
</footer>
</body>
</html>

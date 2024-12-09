<!DOCTYPE html>
<html>

<head>
    <title>Polidoll - Chi tiết sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/chitietsanpham.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/chitietsp_queries.css">
    <script src="../../assets/js/chitietsanpham.js"></script>
</head>
<body>
<header class="header">
    <?php include "./header.php"; ?>
    </header>
    <section class="product">
        <div class="container">
            <!-- Thư viện ảnh -->
            <div class="image-gallery">
                <img id="mainImage" src="../../assets/img/chitietsanpham/product list 1.png" alt="Hình ảnh chính"
                    class="main-image">
                <div class="thumbnail-wrapper">
                    <img src="../../assets/img/chitietsanpham/product list 1.png" alt="Ảnh nhỏ 1"
                        class="thumbnail active" onclick="changeImage(this)">
                    <img src="../../assets/img/chitietsanpham/product list detail 1.png" alt="Ảnh nhỏ 4"
                        class="thumbnail" onclick="changeImage(this)">
                    <img src="../../assets/img/chitietsanpham/product list detail 1 (2).png" alt="Ảnh nhỏ 1"
                        class="thumbnail active" onclick="changeImage(this)">
                    <img src="../../assets/img/chitietsanpham/product list detail 1 (3).png" alt="Ảnh nhỏ 2"
                        class="thumbnail" onclick="changeImage(this)">
                    <img src="../../assets/img/chitietsanpham/product list detail 1 (4).png" alt="Ảnh nhỏ 3"
                        class="thumbnail" onclick="changeImage(this)">
                </div>
            </div>
    
            <!-- Chi tiết sản phẩm -->
            <div class="product-details">
                <div class="product-title">PoliDoll Brand New - Iron Mascara</div>
                <div class="product-price">620.000đ</div>
      
                <!-- Chọn số lượng -->
                <div class="quantity-selector">
                    <label for="quantity">Số lượng:</label>
                    <div class="quantity-control">
                        <!-- Nút giảm -->
                        <button type="button" data-action="decrease" class="quantity-btn">-</button>
                        <!-- Ô hiển thị và cho phép nhập số lượng -->
                        <input id="quantity" type="number" value="1" min="1" />
                        <!-- Nút tăng -->
                        <button type="button" data-action="increase" class="quantity-btn">+</button>
                    </div>
                </div>
    
                <!-- Hành động -->
                <div class="product-actions">
                    <div class="action-buttons">
                        <a href="#" id="addToCart" class="add-to-cart">Thêm vào giỏ hàng</a>
                        <a href="#" class="buy-now">Mua Ngay</a>
                    </div>
                    <div class="wishlist">
                        <i class="heart">❤️</i> Thêm vào yêu thích
                    </div>
                </div>
    
                <!-- Chính sách -->
                <div class="policy">
                    <div class="policy-item">
                        <i class="shipping">🚚</i>
                        <span>Vận chuyển nhanh chóng: Miễn phí vận chuyển với giá trị đơn hàng trên 200.000đ</span>
                    </div>
                    <div class="policy-item">
                        <i class="returns">🔄</i>
                        <span>Trả hàng dễ dàng: Tìm hiểu thêm về chính sách trả hàng của chúng tôi.</span>
                    </div>
                    <div class="policy-item">
                        <i class="secure">🔒</i>
                        <span>Thanh toán an toàn: Thông tin thanh toán của bạn được xử lý an toàn.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <section class = "product-intro">
        <h2>Description</h2>
        <div class = "description-img">
            <img src ="../../assets/img/chitietsanpham/description 1.png">
            <img src ="../../assets/img/chitietsanpham/description 2.png">
            <img src ="../../assets/img/chitietsanpham/description 3.png">
            <img src ="../../assets/img/chitietsanpham/description 4.png">
            <img src ="../../assets/img/chitietsanpham/description 5.png">
            <img src ="../../assets/img/chitietsanpham/description 6.png">
            <img src ="../../assets/img/chitietsanpham/description 7.png">
            <img src ="../../assets/img/chitietsanpham/description 8.png">
            <img src ="../../assets/img/chitietsanpham/description 9.png">
            <img src ="../../assets/img/chitietsanpham/description 10.png">
            <img src ="../../assets/img/chitietsanpham/description 11.png">
            <img src ="../../assets/img/chitietsanpham/description 12.png">
        </div>
    </section>
    <section class = "related">
        <!-- Sản phẩm liên quan -->
        <div class="related-products">
            <h2>Sản phẩm liên quan</h2>
            <div class="products-wrapper">
                <div class="product-card">
                    <img src="../../assets/img/chitietsanpham/product list 2.png" alt="Sản phẩm 1">
                    <div class="product-name">JudyDoll Brand New - Iron Mascara

                    </div>
                    <div class="product-price">620.000 VNĐ</div>
                </div>
                <div class="product-card">
                    <img src="../../assets/img/chitietsanpham/product list 4.png" alt="Sản phẩm 2">
                    <div class="product-name">3D Curling Eyelash Iron Mascara

                    </div>
                    <div class="product-price">420.000 VNĐ</div>
                </div>
                <div class="product-card">
                    <img src="../../assets/img/chitietsanpham/trending now 1.png" alt="Sản phẩm 3">
                    <div class="product-name">Ice Watery Lip Gloss - #01 Orange Flash</div>
                    <div class="product-price">420.000 VNĐ</div>
                </div>
                <div class="product-card">
                    <img src="../../assets/img/chitietsanpham/trending now 2.png" alt="Sản phẩm 1">
                    <div class="product-name">Cushion Lip Powder Cream - N01 Cutie Peach</div>
                    <div class="product-price">359.000 VNĐ</div>
                </div>
            </div>
        </div>
    </section>
    <section class="danhgia">
        <h2>Đánh giá khách hàng</h2>
        <div class="danhgia-overall">
          <div class="danhgia-score">
            <span class="score-number">5.0</span>
            <span class="score-total">/5</span>
          </div>
          <div class="danhgia-stars">★★★★★</div>
          <div class="danhgia-count">Dựa trên 10 đánh giá</div>
        </div>
        <div class="danhgia-distribution">
          <div class="danhgia-row">
            <span class="label">5 sao</span>
            <div class="bar"><div class="fill" style="width: 100%;"></div></div>
            <span class="count">8</span>
          </div>
          <div class="danhgia-row">
            <span class="label">4 sao</span>
            <div class="bar"><div class="fill" style="width: 20%;"></div></div>
            <span class="count">2</span>
          </div>
          <div class="danhgia-row">
            <span class="label">3 sao</span>
            <div class="bar"><div class="fill" style="width: 0%;"></div></div>
            <span class="count">0</span>
          </div>
          <div class="danhgia-row">
            <span class="label">2 sao</span>
            <div class="bar"><div class="fill" style="width: 0%;"></div></div>
            <span class="count">0</span>
          </div>
          <div class="danhgia-row">
            <span class="label">1 sao</span>
            <div class="bar"><div class="fill" style="width: 0%;"></div></div>
            <span class="count">0</span>
          </div>
        </div>
        <button class="danhgia-write">Viết đánh giá</button>
        <div class="danhgia-reviews">
          <div class="review">
            <div class="review-header">
              <span class="review-name">Nhật Anh</span>
              <span class="review-date">2 tháng trước</span>
            </div>
            <div class="review-stars">★★★★★</div>
            <div class="review-text">Giữ được 4 tiếng dưới nước. Chắc chắn 5 sao!</div>
          </div>
          <div class="review">
            <div class="review-header">
              <span class="review-name">Gia Huy</span>
              <span class="review-date">4 tháng trước</span>
            </div>
            <div class="review-stars">★★★★★</div>
            <div class="review-text">
              Tôi mới mua sản phẩm này để thay thế mascara cũ của Poli Doll mà tôi rất thích. Nhưng trời ơi, có thể do sản phẩm mới, tôi còn thích cái này hơn nữa...
            </div>
          </div>
        </div>
      </section>
</body>
<footer>
<?php include "./footer.php"; ?>
</footer>
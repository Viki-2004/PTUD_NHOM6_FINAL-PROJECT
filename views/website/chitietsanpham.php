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
<?php
include "../../config/connect.php";

// Lấy SKU từ URL (cần kiểm tra để tránh lỗi nếu không có SKU)
$sku = isset($_GET['sku']) ? mysqli_real_escape_string($conn, $_GET['sku']) : '';

// Kiểm tra nếu SKU tồn tại
if (empty($sku)) {
    echo "SKU không hợp lệ.";
    exit;
}

// Truy vấn để lấy thông tin sản phẩm từ cơ sở dữ liệu
$result = mysqli_query($conn, "SELECT * FROM product WHERE sku = '$sku'");

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Không tìm thấy sản phẩm với SKU đã cung cấp.";
    exit;
}

// Lấy thông tin sản phẩm
$product = mysqli_fetch_assoc($result);

// Truy vấn để lấy các hình ảnh liên quan đến sản phẩm
$imgLibrary = mysqli_query($conn, "SELECT * FROM image_library WHERE product_id = ".$product['id']);
$product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
?>
    <section class="product">
    <div class="container">
        <h2>Chi tiết sản phẩm</h2>
        <div id="product-detail">
            <div id="product-img">
                <img src="<?=$product['image']?>" alt="<?=$product['name']?>" />
            </div>
            <div id="product-info">
                <h1><?=$product['name']?></h1>
                <label>Giá: </label><span class="product-price"><?= number_format($product['price'], 0, ",", ".") ?> VND</span><br/>
                <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
                    <input type="number" value="1" name="quantity[<?=$product['id']?>]" min="1" /><br/>
                    <input type="submit" value="Thêm vào giỏ hàng" />
                </form>
                
                <div id="color-options">
                    <label for="color">Màu sắc: </label>
                    <select id="color" name="color">
                        <option value="1">Màu 1</option>
                        <option value="2">Màu 2</option>
                        <option value="3">Màu 3</option>
                    </select>
                </div>

                <?php if(!empty($product['images'])){ ?>
                    <div id="gallery">
                        <ul>
                            <?php foreach($product['images'] as $img) { ?>
                                <li><img src="<?=$img['path']?>" alt="Product Image" /></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div class="clear-both"></div>
            <div id="product-description">
                <?=$product['content']?>
            </div>
        </div>
    </div>
                <!-- Hành động -->
             <div class="product-actions">
                    <div class="action-buttons">
                      /*GIA HUY TEST LIÊN KẾT*/
                      <form action="cart.php" method="POST">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="hidden" name="name" value="<?= htmlspecialchars($product['product_name']) ?>">
    <input type="hidden" name="price" value="<?= $product['product_price'] ?>">
    <input type="hidden" name="image" value="<?= htmlspecialchars($product['product_image']) ?>">
    <input type="number" name="quantity" id="quantity" value="1" min="1">
    <button type="submit" name="add_to_cart" class="add-to-cart">Thêm vào giỏ hàng</button>
</form>

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
        <p><?=$product["product_description"]?></p>
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
              Tôi mới mua sản phẩm này để thay thế sản phẩm cũ của Poli Doll mà tôi rất thích. Nhưng trời ơi, có thể do sản phẩm mới, tôi còn thích cái này hơn nữa...
            </div>
          </div>
        </div>
      </section>
</body>
<footer>
<?php include "./footer.php"; ?>
</footer>
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
<?php
include "../../config/connect.php";
if (!isset($_GET['sku']) || empty($_GET['sku'])) {
    // Nếu SKU không tồn tại, chuyển hướng về trang sản phẩm hoặc hiển thị thông báo
    echo "SKU không hợp lệ hoặc không được cung cấp.";
    exit;
}
$sku = mysqli_real_escape_string($conn, $_GET['sku']); // Escape để tránh SQL Injection
$result = mysqli_query($conn, "SELECT * FROM product WHERE sku = '$sku'");
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Không tìm thấy sản phẩm với SKU đã cung cấp.";
    exit;
}
$product = mysqli_fetch_assoc($result);
$imgLibrary = mysqli_query($conn, "SELECT * FROM product_img WHERE sku = '$sku'");
$product["images"] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
$related = mysqli_query($conn, "SELECT * FROM product");
$crumber = mysqli_query($conn, "SELECT * FROM product WHERE sku = '$sku'");
?>
<header class="header">
    <?php include "./header.php"; ?>
    </header>
    <div class="shop_breadcrumb">
            <a href="../../index.php">Trang chủ</a>
            &gt; 
            <a href="./product.php">Trang sản phẩm</a>
            &gt; 
            <?php
                      while($crumb = mysqli_fetch_array($crumber)){                          
                      ?>
            <a href = "chitietsanpham.php?sku=<?=$crumb["sku"]?>"><?php echo $crumb["product_name"] ?></a>     
            <?php } ?>   
</div>
    <section class="product">
        <div class="container">
            <!-- Thư viện ảnh -->
            <div class="image-gallery">
            <img id="mainImage" src="../../assets/img/products/<?=$product["product_img"]?>" alt="Hình ảnh chính" class="main-image">
            <?php if(!empty($product["images"])) { ?>
                <div class="thumbnail-wrapper">
                    <?php foreach($product["images"] as $img) { ?>
                    <img src="../../assets/img/products/<?=$img["img_url"]?>" alt="Ảnh nhỏ 1" class="thumbnail active" onclick="changeImage(this)">
                    <?php } ?>
                </div>
                <?php } ?>
              </div>
    
            <!-- Chi tiết sản phẩm -->
            <div class="product-details">
            <div class="product-title"><?=$product["product_name"]?></div>
            <div class="product_price"><?php echo number_format($product['product_price'], 0, ',', '.'); ?>đ</div>
            <div class="product-rating">
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <a href="#" class="reviews">71 Đánh giá</a>
              <span class="divider">|</span>
              <span class="sold">7000+ Đã bán</span>
              <div class="icons-details">
                <i class="far fa-heart"></i>
                <i class="fa-solid fa-share-nodes"></i>
              </div>
            </div>
               <!-- Hành động -->
                <div class="product-actions">
                    <div class="action-buttons">
                        <form id = "add-to-cart-form" action = "addcart.php?sku=<?php echo $product['sku'] ?>" method = "POST">
                        <input type = "submit" id="addToCart" name="addcart" class="add-to-cart" value ="Thêm vào giỏ hàng"/>
                         </form>
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
        <h2>Mô tả sản phẩm</h2>
        <p><?=$product["product_description"]?></p>
        </div>
    </section>
    <section class = "related">
        <!-- Sản phẩm liên quan -->
        <div class="related-products">
            <h2>Bạn có thể thích</h2>
            <div class="products-wrapper">
            <?php
                      while($rowrelated = mysqli_fetch_array($related)){                          
                      ?>
                <div class="product-card">
                  <div class = "productcard">
                  <a style ="color: black ; text-decoration: none; font-weight: bold " href = "chitietsanpham.php?sku=<?=$rowrelated["sku"]?>"><img src="../../assets/img/products/<?php echo $rowrelated["product_img"] ?>" alt="<?php echo $rowrelated["product_img"] ?>" class="Sản phẩm 1"></a>
                    <div class="product-name"><a style ="color: black ; text-decoration: none; font-weight: bold " href = "chitietsanpham.php?sku=<?=$rowrelated["sku"]?>"><?php echo $rowrelated["product_name"] ?></a></div>
                    <div class="product-price"><?php echo number_format($rowrelated['product_price'], 0, ',', '.'); ?>đ</div>
                  </div>
               </div>
               <?php } ?>
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
          <div class="danhgia-count">Dựa trên 71 đánh giá</div>
        </div>
        <div class="danhgia-distribution">
          <div class="danhgia-row">
            <span class="label">5 sao</span>
            <div class="bar"><div class="fill" style="width: 100%;"></div></div>
            <span class="count">45</span>
          </div>
          <div class="danhgia-row">
            <span class="label">4 sao</span>
            <div class="bar"><div class="fill" style="width: 90%;"></div></div>
            <span class="count">20</span>
          </div>
          <div class="danhgia-row">
            <span class="label">3 sao</span>
            <div class="bar"><div class="fill" style="width: 20%;"></div></div>
            <span class="count">6</span>
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
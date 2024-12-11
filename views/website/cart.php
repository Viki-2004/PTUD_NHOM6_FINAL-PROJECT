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
    <?php
include "../../config/connect.php";
$relatedproducts = mysqli_query($conn, "SELECT * FROM product");
// Kiểm tra và khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

// Xử lý khi thêm sản phẩm vào giỏ hàng
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            if (isset($_POST['quantity'])) {
                foreach ($_POST['quantity'] as $id => $quantity) {
                    // Kiểm tra nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
                    if (isset($_SESSION["cart"][$id])) {
                        $_SESSION["cart"][$id] += $quantity;
                    } else {
                        $_SESSION["cart"][$id] = $quantity;
                    }
                }
            }
            break;
        case "remove":
            if (isset($_GET['id'])) {
                unset($_SESSION["cart"][$_GET['id']]);
            }
            break;
    }
}

// Lấy thông tin các sản phẩm trong giỏ hàng
if (!empty($_SESSION["cart"])) {
    // Truy vấn sản phẩm trong giỏ hàng
    $productIds = implode(",", array_keys($_SESSION["cart"]));
    $productsQuery = "SELECT * FROM `product` WHERE `id` IN ($productIds)";
    $products = mysqli_query($con, $productsQuery);
}

// Tính toán tổng tiền giỏ hàng
$totalBill = 0;
if (isset($products) && mysqli_num_rows($products) > 0) {
    while ($row = mysqli_fetch_array($products)) {
        $productId = $row['id'];
        $quantity = $_SESSION["cart"][$productId];
        
        // Chuyển giá từ chuỗi sang số (bỏ "đ" và chuyển sang số)
        $price = floatval(str_replace(" đ", "", $row['price']));
        
        $totalBill += $price * $quantity;
    }
}

// Giảm giá (nếu có)
$discount = $_SESSION['discount'] ?? 0;
$finalBill = $totalBill - ($totalBill * $discount);

// Thêm sản phẩm vào giỏ hàng (mảng session) khi test
$productsToAdd = [
    'id' => 'F01', // Mã sản phẩm
    'quantity' => 1 // Số lượng sản phẩm
];

// Thêm sản phẩm vào giỏ hàng (mảng session)
$_SESSION["cart"][$productsToAdd['id']] = $productsToAdd['quantity'];

?>
<div class="container">
    <a href="index.php"></a>
    <div class="cart">
        <h2>GIỎ HÀNG CỦA TÔI</h2>
        <form id="cart-form" action="cart.php?action=submit" method="POST">
            <table>
                <thead>
                    <tr>
                        <th class="rank">STT</th>
                        <th class="img">Ảnh sản phẩm</th>
                        <th class="price">Đơn giá</th>
                        <th class="quantity">Số lượng</th>
                        <th class="total">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $num = 1;
                    if ($totalBill && mysqli_num_rows($totalBill) > 0) {
                        while ($row = mysqli_fetch_array($totalBill)) { ?>
                            <tr data-id="<?= $row['id'] ?>">
                                <td class="rank"><?= $num++; ?></td>
                                <td class="img"><img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" /></td>
                                <td class="price"><?= number_format($row['price'], 0, ',', '.') ?>đ</td>
                                <td class="quantity">
                                    <button type="button" class="decrease-btn" data-id="<?= $row['id'] ?>">-</button>
                                    <input type="number" value="<?= $_SESSION["cart"][$row['id']] ?>" name="quantity[<?= $row['id'] ?>]" min="1" />
                                    <button type="button" class="increase-btn" data-id="<?= $row['id'] ?>">+</button>
                                </td>
                                <td class="total"><?= number_format($row['price'] * $_SESSION["cart"][$row['id']], 0, ',', '.') ?>đ</td>
                            </tr>
                        <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="6">Giỏ hàng trống</td>
                        </tr>
                    <?php } ?>
                    <tr id="row-total">
                        <td class="rank">&nbsp;</td>
                        <td class="img">&nbsp;</td>
                        <td class="price">&nbsp;</td>
                        <td class="quantity">&nbsp;</td>
                        <td class="total"><?= number_format($totalBill, 0, ',', '.') ?>đ</td>
                    </tr>
                </tbody>
            </table>
    </div>
            <div class="order-summary">
                <h2>ĐƠN HÀNG</h2>
                    <input type="text" name="discount_code" placeholder="Mã giảm giá">
                    <button type="submit" name="apply_code" class="apply-btn">ÁP DỤNG</button>
                <p class="total-bill">Tổng hóa đơn: <?= number_format($totalBill, 0, ',', '.') ?>đ</p>
                <p class="discount">Giảm giá: <?= $discount * 100 ?>%</p>
                <p class="final-bill">Thành tiền: <?= number_format($finalBill, 0, ',', '.') ?>đ</p>
                <button type="submit">TIẾP TỤC THANH TOÁN</button>
                <button class="continue">TIẾP TỤC MUA HÀNG</button>
                </form>
            </div>
    </div>
</div>

    <div class="comment-section">
        <form>
            <textarea placeholder="Viết bình luận của bạn..." rows="4" cols="50"></textarea>
            <button type="submit">Gửi bình luận</button>
        </form>
        </div>
    </div>
    <!-- <div class="best-seller-section">
        <h2>Bán chạy nhất</h2>
    </div> -->

    <section class="product_section">
        <h2>Sản phẩm liên quan</h2>
        <div class="content-container">
            <!-- Left: Product Carousel -->
            <div class="products-container">
                <div class="products-carousel-wrapper">
                    <div class="products-carousel">
                            <?php
                            while($row = mysqli_fetch_array($relatedproducts)){                          
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
                                    <p class="product-name"><a style="text-decoration: none; color: #f25a8c;" href = "chitietsanpham.php?sku=<?=$row["sku"]?>"><?php echo $row["product_name"] ?></a>
                                    </p>
                                    <p class="product-price"><?php echo number_format($row['product_price'], 0, ',', '.'); ?>đ</p>
                            </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<footer>
    <?php include "./footer.php"; ?>
</footer>
</body>
</html>
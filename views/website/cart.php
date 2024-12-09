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
session_start();

// Khởi tạo giỏ hàng mẫu nếu chưa có
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        ['id' => 1, 'name' => 'Sản phẩm A', 'image' => 'image_a.jpg', 'price' => 100000, 'quantity' => 2],
        ['id' => 2, 'name' => 'Sản phẩm B', 'image' => 'image_b.jpg', 'price' => 200000, 'quantity' => 1],
    ];
}

// Xử lý các hành động POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cập nhật số lượng sản phẩm
    if (isset($_POST['update']) && isset($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $id => $quantity) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == intval($id)) {
                    $item['quantity'] = max(1, intval($quantity)); // Không cho phép số lượng < 1
                }
            }
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    if (isset($_POST['delete'])) {
        $idToDelete = intval($_POST['delete']);
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($idToDelete) {
            return $item['id'] !== $idToDelete;
        });
    }

    // Áp dụng mã giảm giá
    if (isset($_POST['apply_code'])) {
        $discountCode = trim($_POST['discount_code']);
        if ($discountCode === 'SALE10') {
            $_SESSION['discount'] = 0.1; // Giảm 10%
        } else {
            $_SESSION['discount'] = 0; // Không hợp lệ
        }
    }
}

// Hàm tính tổng hóa đơn
function calculateTotal($cart) {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Lấy dữ liệu giỏ hàng
$cart = $_SESSION['cart'];
$totalBill = calculateTotal($cart);
$discount = $_SESSION['discount'] ?? 0;
$finalBill = $totalBill - ($totalBill * $discount);
?>
<div class="container">
    <div class="cart">
        <h2>GIỎ HÀNG CỦA TÔI</h2>
        <form method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td>
                                <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width:50px; height:50px;">
                                <?= htmlspecialchars($item['name']) ?>
                            </td>
                            <td class="price"><?= number_format($item['price'], 0, ',', '.') ?>đ</td>
                            <td>
                                <input type="number" name="quantity[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1" class="quantity">
                            </td>
                            <td class="total"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>đ</td>
                            <td>
                                <button type="submit" name="delete" value="<?= $item['id'] ?>" class="delete-btn">Xóa</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
    <div class="order-summary">
        <h2>ĐƠN HÀNG</h2>
        <form method="POST">
            <input type="text" name="discount_code" placeholder="Mã giảm giá">
            <button type="submit" name="apply_code" class="apply-btn">ÁP DỤNG</button>
        </form>
        <p class="total-bill">Tổng hóa đơn: <?= number_format($totalBill, 0, ',', '.') ?>đ</p>
        <p class="discount">Giảm giá: <?= $discount * 100 ?>%</p>
        <p class="final-bill">Thành tiền: <?= number_format($finalBill, 0, ',', '.') ?>đ</p>
        <button>TIẾP TỤC THANH TOÁN</button>
        <button class="continue">TIẾP TỤC MUA HÀNG</button>
    </div>
</div>
    <div class="comment-section">
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

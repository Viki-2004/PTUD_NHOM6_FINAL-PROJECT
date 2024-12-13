<?php
    session_start();
?>
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
    if (isset($_SESSION['cart'])) {
    }
?>
<div class="container">
    <div class="cart">
        <h2>GIỎ HÀNG CỦA TÔI</h2>
        <!-- <form id="cart-form" action="cart.php?action=submit" method="POST"> -->
            <table>
                    <tr>
                        <th class="rank">STT</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="img">Ảnh sản phẩm</th>
                        <th class="price">Đơn giá</th>
                        <th class="quantity">Số lượng</th>
                        <th class="total">Thành tiền</th>
                        <th class="total">Xóa</th>
                    </tr>
                    <?php
                        if (isset($_SESSION['cart'])) {
                            $stt = 0;
                            $total = 0;
                            foreach($_SESSION['cart'] as $cart_item) {
                                $thanhtien = $cart_item['quantity']*$cart_item['price'];
                                $stt++;
                                $total += $thanhtien;
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $cart_item['product_name']; ?></td>
                        <td><img src="../../assets/img/products/<?php echo $cart_item['img']; ?>" width="150px" ></td>
                        <td><?=number_format($cart_item['price'], 0, ',', '.')?> đ</td>
                        <td><?php echo $cart_item['quantity']; ?></td>
                        <td><?=number_format($thanhtien, 0, ',', '.')?> đ</td>
                        <td><a href="addcart.php?delete=<?php echo $cart_item['sku']?>">Xóa</a></td>
                    </tr>
                    
                    <?php
                        }} else {
                    ?>
                    <tr>
                        <td colspan ="7"><p>Giỏ hàng của bạn đang trống</p></td>
                    </tr>
                    <?php }?>
                        <td colspan ="7">
                            <button type="submit" name="update" class="update_btn">Cập nhật</button>
                            <button type="submit" name="delete" class="delete_btn"><a href="addcart.php?deleteall=1">Xóa tất cả</a></button>
                        </td>
            </table>
            <!-- <input type="submit" name = "action" value = "Cập nhật"/>
            <input type="submit" name = "action" value = "Xóa tất cả"/>
        </form> -->
    </div>
            <div class="order-summary">
                <h2>ĐƠN HÀNG</h2>
                <input type="text" name="discount_code" placeholder="Mã giảm giá">
                <button type="submit" name="apply_code" class="apply-btn">ÁP DỤNG</button>
                <p class="total-bill"><span> Tổng tiền: </span><?=number_format($total, 0, ',', '.')?> đ</p>
                <p class="discount">Giảm giá: 0 đ</p>
                <p class="final-bill"><span> Tổng hóa đơn: <span><?=number_format($total, 0, ',', '.')?> đ</p>
                <input type="submit" name = "order_click" value = "Đặt Hàng"/>
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

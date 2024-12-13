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
                        <td><img style = "width=200px"src="../../assets/img/products/<?php echo $cart_item['product_img'];?>"></td>
                        <td><?=number_format($cart_item['price'], 0, ',', '.')?> đ</td>
                        <td>
                            <a style = "text-decoration: none; color: #df376f; font-size: 110%" href ="addcart.php?cong=<?php echo $cart_item['sku']?>"><i class="fa-regular fa-square-plus"></i></a>
                            <?php echo $cart_item['quantity']; ?>
                            <a style = "text-decoration: none; color: #df376f; font-size: 110%" href ="addcart.php?tru=<?php echo $cart_item['sku']?>"><i class="fa-regular fa-square-minus"></i></a>
                        </td>
                        <td><?=number_format($thanhtien, 0, ',', '.')?> đ</td>
                        <td><a style = "text-decoration: none; color: #df376f" href="addcart.php?delete=<?php echo $cart_item['sku']?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    
                    <?php
                        }} else {
                    ?>
                    <tr>
                        <td colspan ="7"><p>Giỏ hàng của bạn đang trống</p></td>
                    </tr>
                    <?php }?>
                        <td colspan ="7">
                            <button type="submit" name="update" class="update_btn"><a style = "text-decoration: none; color: black" href="./product.php">Tiếp tục mua hàng</button>
                            <button type="submit" name="delete" class="delete_btn"><a style = "text-decoration: none; color: black" href="addcart.php?deleteall=1">Xóa tất cả</a></button>
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
                <p class="total-bill">Tổng tiền:
                    <?php 
                    if (!empty($total)) {
                        ?>
                        <p style = "font-weight: bold ; color: red"><?= number_format($total, 0, ',', '.') ?>đ</p>
                        <?php
                    } else {
                        echo "Chưa có sản phẩm trong giỏ hàng";
                    }   
                    ?>
                </p>
                <p class="discount">Giảm giá: 0 đ</p>
                <p class="final-bill">Tổng hóa đơn:
                <?php 
                  if (!empty($total)) {
                    ?>
                    <p style = "font-weight: bold ; color: red"><?= number_format($total, 0, ',', '.') ?>đ</p>
                    <?php
                } else {
                    echo "Chưa có sản phẩm trong giỏ hàng";
                }   
                ?> 
                </p>
                <input type="submit" name = "order_click" value = "Đặt Hàng" class ="order_btn" onclick="window.location.href='./checkout.php';"/>
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

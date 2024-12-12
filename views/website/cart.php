<?php session_start(); ?>
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
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(isset($_GET['action'])){
    function update_cart($add = false){
        foreach($_POST['quantity'] as $sku => $quantity){
            if($quantity == 0){
                unset($_SESSION['cart'][$_GET['sku']]);
            } else {
                if($add)
                {
                    $_SESSION['cart'][$sku] += $quantity;
    
                }else
                {
                $_SESSION['cart'][$sku] = $quantity;
                }
            }
        }
    }
    switch($_GET['action']){
        case "add":
            update_cart(true);
            header("location: ./cart.php");
            break;
        case "delete":    
            if(isset($_GET['sku'])){
                unset($_SESSION['cart'][$_GET['sku']]);
            }
            header("location: ./cart.php");
            break;
        case "submit":
            // CẬP NHẬT SỐ LƯỢNG SẢN PHẨM
            if(isset($_POST['update_click'])){
                update_cart();
                header("location: ./cart.php");
            }
            // ĐẶT HÀNG SẢN PHẨM
            elseif ($_POST['order_click']) {
            }
            break;
    }
}
if(!empty($_SESSION['cart'])){
    $products = mysqli_query($conn, "SELECT * FROM product WHERE sku IN ('".implode(",", array_keys($_SESSION["cart"]))."')");
}
?>
<div class="container">
    <a href="index.php"></a>
    <div class="cart">
        <h2>GIỎ HÀNG CỦA TÔI</h2>
        <form id="cart-form" action="cart.php?action=submit" method="POST">
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
                    $num = 1;
                        while ($row = mysqli_fetch_array($products)){ ?>
                        <tr>
                            <td class="rank"><?=$num++;?></td>
                                <td class = "name"><?=$row['product_name']?></td>
                                <td class="img"><img src="../../assets/img/products/<?=$row['product_img']?>"/></td>
                                <td class="price"><?=$row['product_price']?></td>
                                <td class="quantity"><input type="text" value ="<?=$_SESSION["cart"][$row['sku']]?>" name = "quantity[<?=$row['sku']?>]"/></td>
                                <td class="total"><?=$row['product_price']?></td>
                                <td style = "color: #f25a8"><a href ="cart.php?action=delete&sku=<?=$row['sku']?>"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php 
                        $num++;
                    } ?>
                    <tr id="row-total">
                        <td class="rank">&nbsp;</td>
                        <td class = "name">&nbsp;</td>
                        <td class="img">Tổng tiền</td>
                        <td class="price">&nbsp;</td>
                        <td class="quantity">&nbsp;</td>
                        <td class="total"><?= number_format($row, 0, ',', '.') ?>đ</td>
                        <td>&nbsp;</td>
                    </tr>
            </table>
            <input type="submit" name = "update_click" value = "Cập nhật"/>

</form>
    </div>
            <div class="order-summary">
                <h2>ĐƠN HÀNG</h2>
                <input type="text" name="discount_code" placeholder="Mã giảm giá">
                <button type="submit" name="apply_code" class="apply-btn">ÁP DỤNG</button>
                <p class="total-bill">Tổng hóa đơn: <?= number_format($row, 0, ',', '.') ?>đ</p>
                <p class="discount">Giảm giá: <?= $row * 100 ?>%</p>
                <p class="final-bill">Thành tiền: <?= number_format($row, 0, ',', '.') ?>đ</p>
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
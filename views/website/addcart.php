<?php
    session_start();
    include "../../config/connect.php";
    // session_destroy();
    //thêm số lượng
    //trừ số lượng
    //xóa sản phẩm
    if (isset($_SESSION['cart']) && $_GET['delete']) {
        $sku = $_GET['delete'];
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['sku'] == $sku) {
                unset($_SESSION['cart'][$key]); // Xóa sản phẩm
            }
        }
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        header('Location: ./cart.php');
        exit;
        }
//     // xóa tất cả
    if (isset($_GET['deleteall']) && $_GET['deleteall'] == 1) {
        unset($_SESSION['cart']);
        header('location: ./cart.php');
    }
//     // Thêm sản phẩm vào giỏ hàng
    if (isset($_POST['addcart'])){
        $sku = $_GET['sku'];
        $quantity= 1;
        $sql = "SELECT * FROM product where sku = '".$sku."' LIMIT 1";
        $query= mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        if ($row) {
            $new_product = array(array(
                'product_name' => $row['product_name'],
                'sku' => $sku,
                'quantity' => $quantity,
                'price' => $row['product_price'], 
                'img' => $row['product_img'] ));
            // Kiem tra session gio hang ton tai
            if (isset($_SESSION['cart'])){
                $found =false;
                $product = array();
                foreach($_SESSION['cart'] as $cart_item) {
                    if ($cart_item['sku'] == $sku) {
                        $cart_item['quantity'] += $quantity;
                        // $product[] = array('product_name' => $cart_item['product_name'],'sku' => $cart_item['sku'],'quantity' => $quantity + 1,'price' => $cart_item['price'], 'img' => $cart_item['img'] );
                        $found = true;
                    }
                        $product[] = $cart_item;
                    }
                    // Nếu sản phẩm không tồn tại trong giỏ hàng, thêm mới
                if (!$found) {
                $product = array_merge($product, $new_product);
                }

                // Cập nhật giỏ hàng
                $_SESSION['cart'] = $product;

                } else {
                // Nếu giỏ hàng chưa tồn tại, tạo mới
                $_SESSION['cart'] = $new_product;
                }
            }   

     // Quay về trang giỏ hàng
    header('location: ./cart.php');
}
?>
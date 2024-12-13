<?php
    session_start ();
    include('../../config/connect.php');
    $user_id = $_SESSION['user_id'];
    $show_orders = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT 1 ";
    $stmt = $conn->prepare($show_orders);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    // Lấy thông tin trong orders
    if ($result->num_rows > 0) {
    $first_row = $result->fetch_assoc();
    $customer_name = $first_row['customer_name'];
    $customer_address = $first_row['customer_address'];
    $customer_phone = $first_row['customer_phone'];
    $customer_email = $first_row['customer_email'];
    $total_bill = $first_row['total_bill'];
    $order_id = $first_row['order_id'];
    } else {
        echo "Không có dữ liệu";
    }

    // Lấy thông tin order_details
    $show_order_details = 
    "SELECT od.sku, od.order_quantity, od.price, od.total, p.product_name, p.product_img
     FROM order_details od
     JOIN product p ON od.sku = p.sku
     WHERE od.order_id = ?";
    $stmt = $conn->prepare($show_order_details);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order_items = [];
    while ($row = $result->fetch_assoc()) {
    $order_items[] = $row;
    }
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
    <link rel="stylesheet" type="text/css" href="../../assets/css/checkout.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cart_queries.css">
    <script src="../../assets/js/cart.js"></script>
</head>
<body>
    <div class="logo"><b>POLIDOLL</b></div>
    <div class="container">
        <!-- Form Section -->
        <div class="container">
            <h1>ĐẶT HÀNG THÀNH CÔNG</h1>
            <!-- Form Section -->
            <div class="checkout-form">
            <h2>Thông tin người đặt</h2>
            <ul>
                <li><strong>Họ và Tên:</strong><?php echo $customer_name?></li>
                <li><strong>Địa chỉ:</strong><?php echo $customer_address?></li>
                <li><strong>Số điện thoại:</strong><?php echo $customer_phone?></li>
                <li><strong>Email:</strong><?php echo $customer_email?></li>
            </ul>
        </div>
    
            <!-- Order Summary Section -->
            <div class="order-summary">
                <h3>Thông tin đơn hàng</h3>
                <ul>
                    <?php foreach ($order_items as $item) {?>
                    <li>
                        <img src="../../assets/img/products/<?php echo $item['product_img']; ?>" alt="<?php echo $item['product_img']; ?>">
                        <span><?php echo $item['product_name']; ?></span>
                        <span><?php echo $item['order_quantity']; ?></span>
                        <span><?=number_format($item['price'], 0, ',', '.')?> đ</span>
                    </li>
                    <?php } ?>
                </ul>
                
                <div class="total">
                    <span>Tổng:</span>
                    <span><?=number_format($total_bill, 0, ',', '.')?> đ</span>
                </div>
                <button><a href="../../index.php">Quay về trang chủ</a></button>
            </div>
        </div>
</body>
</html>
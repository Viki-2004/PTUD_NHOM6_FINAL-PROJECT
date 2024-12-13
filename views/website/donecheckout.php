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
    <link rel="stylesheet" type="text/css" href="../../assets/css/donecheckout.css">

</head>
<body>
    <div class="container">
        <!-- Heading -->
        <h1>ĐẶT HÀNG THÀNH CÔNG</h1>

        <!-- Table: Thông tin người đặt -->
        <h2>Thông tin người đặt</h2>
        <table>
            <tbody>
                <tr>
                    <th>Họ và Tên</th>
                    <td><?php echo $customer_name; ?></td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td><?php echo $customer_address; ?></td>
                </tr>
                <tr>
                    <th>Số điện thoại</th>
                    <td><?php echo $customer_phone; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $customer_email; ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Table: Thông tin đơn hàng -->
        <h2>Thông tin đơn hàng</h2>
        <table>
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_items as $item) { ?>
                <tr>
                    <td><img src="../../assets/img/products/<?php echo $item['product_img']; ?>" alt="<?php echo $item['product_name']; ?>"></td>
                    <td><?php echo $item['product_name']; ?></td>
                    <td><?php echo $item['order_quantity']; ?></td>
                    <td><?= number_format($item['price'], 0, ',', '.'); ?> đ</td>
                </tr>
                <tr col = 3>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Tổng tiền -->
        <div class="total">
            <span>Tổng:</span>
            <span><?= number_format($total_bill, 0, ',', '.'); ?> đ</span>
        </div>

        <!-- Nút quay về -->
        <button><a href="../../index.php">Quay về trang chủ</a></button>
    </div>
</body>
</html>

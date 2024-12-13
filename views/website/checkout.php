<?php
    session_start ();
    // Kết nối tới cơ sở dữ liệu
    include '../../config/connect.php';

    $user_id = $_SESSION['user_id'];
    $insert_orders = " INSERT INTO orders(customer_name, customer_address, customer_phone, customer_email, user_id)";
    $orders_query = mysqli_query ($mysqli, $insert_orders);
    $order_id = mysqli_insert_id($mysqli);
    if ($insert_orders) {
        //Thêm giỏ hàng chi tiết
        foreach ($_SESSION['orders'] as $key => $value) {
            $sku = $value['sku'];
            $order_quantity = $value['order_quantity'];
            $insert_order_details = "INSERT INTO order_details (sku, order_id,user_id, order_quantity, price, total) VALUES ('".$sku."','".$order_id."','".$user_id."','".$order_quantity."')";
            mysqli_query($mysqli, $insert_order_details);
        }
    }
    unset($_SESSION[orders]);
    header();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THANH TOÁN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cart.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cart_queries.css">
    <script src="../../assets/js/cart.js"></script>
    <style>
        /* Tổng thể container */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề */
        .container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
        }

        /* Bảng giỏ hàng */
        .cart table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart table thead th {
            background-color: #f3f3f3;
            color: #555;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        .cart table tbody td {
            padding: 10px;
            vertical-align: middle;
            border-bottom: 1px solid #ddd;
        }

        .cart img {
            width: 80px;
            height: auto;
            border-radius: 5px;
            margin-right: 10px;
        }

        /* Input số lượng */
        .cart .quantity {
            width: 50px;
            padding: 5px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Tổng tiền */
        .cart .total {
            font-weight: bold;
            color: #e74c3c;
        }

        /* Đơn hàng */
        .order-summary {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-summary h2 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #333;
            text-align: center;
        }

        .order-summary input[type="text"] {
            width: calc(100% - 120px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .order-summary .apply-btn {
            padding: 10px 20px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .order-summary .apply-btn:hover {
            background-color: #2ecc71;
        }

        .order-summary .total-bill {
            font-size: 18px;
            font-weight: bold;
            margin-top: 15px;
            text-align: center;
            color: #555;
        }

        /* Các nút hành động */
        .order-summary button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .order-summary button:hover {
            background-color: #2980b9;
        }

        /* Nút Momo */
        .order-summary .Momo {
            background-color: #e67e22;
        }

        .order-summary .Momo:hover {
            background-color: #d35400;
        }

        /* Bình luận */
        .comment-section h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 15px;
        }

        .comment-section textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }

        .comment-section button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #16a085;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment-section button:hover {
            background-color: #1abc9c;
        }

        /* Phần bán chạy nhất */
        .best-seller-section h2 {
            font-size: 22px;
            color: #333;
            margin: 20px 0;
            text-align: center;
            text-transform: uppercase;
        }

        /* Carousel */
        .nav-carousel {
            margin-top: 20px;
            position: relative;
        }

        .nav-carousel-wrapper {
            overflow: hidden;
        }

        .nav-carousel-track {
            display: flex;
            transition: transform 0.3s ease;
        }

        .nav-carousel-item {
            flex: 0 0 25%;
            padding: 10px;
            box-sizing: border-box;
        }

        .nav-product-image {
            position: relative;
            text-align: center;
        }

        .nav-product-image img {
            width: 100%;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .nav-product-image:hover img {
            transform: scale(1.1);
        }

        .nav-buy-now-btn {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .nav-buy-now-btn:hover {
            background-color: #c0392b;
        }

        /* Nút điều hướng Carousel */
        .nav-carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .nav-carousel-btn-left {
            left: 10px;
        }

        .nav-carousel-btn-right {
            right: 10px;
        }

        .nav-carousel-btn:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
    
<body>
<!-- Header -->
<header class="header">
        <div class="logo">POLIDOLL</div>
        <div class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
        <nav class="navbar">
            <div class="dropdown">
                <button class="dropbtn"><a href="trangchu.php">TRANG CHỦ</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a href="product.html">SẢN PHẨM</a></button>
                <div class="dropdown-content">
                    <a href="#">Mắt</a>
                    <a href="#">Môi</a>
                    <a href="#">Mặt</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">KHÁM PHÁ</button>
                <div class="dropdown-content">
                    <a href="aboutus.php">Về Chúng Tôi</a>
                    <a href="news.php">Blogs</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="lienhe.php"><button class="dropbtn">LIÊN HỆ</a></button>
            </div>
        </nav>
        <div class="icons">
            <a href="#" title="Search"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a href="#" title="Wishlist"><i class="fa-solid fa-heart"></i></a>
            <a href="#" title="Cart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </header>
    <?php
// Xử lý khi form được gửi
$message = ""; // Biến để lưu thông báo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy và làm sạch dữ liệu từ form
    $name = trim(htmlspecialchars($_POST['name']));
    $address = trim(htmlspecialchars($_POST['address']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $payment_method = htmlspecialchars($_POST['payment_method']);

    // Kiểm tra dữ liệu đầu vào
    if (empty($name) || empty($address) || empty($phone) || empty($payment_method)) {
        $message = "<p><strong>Lỗi:</strong> Vui lòng điền đầy đủ thông tin.</p>";
    } elseif (!preg_match("/^[0-9]{10,11}$/", $phone)) { // Kiểm tra số điện thoại (10-11 số)
        $message = "<p><strong>Lỗi:</strong> Số điện thoại không hợp lệ.</p>";
    } else {
        // Đây là nơi bạn sẽ kết nối và xử lý cơ sở dữ liệu nếu cần
        // Kết nối cơ sở dữ liệu (giả sử bạn muốn lưu thông tin)
        /*
        $conn = new mysqli("localhost", "username", "password", "database");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("INSERT INTO orders (name, address, phone, payment_method) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $address, $phone, $payment_method);

        if ($stmt->execute()) {
            $message = "<h2>Thanh toán thành công!</h2>
                        <p>Tên người nhận: $name</p>
                        <p>Địa chỉ giao hàng: $address</p>
                        <p>Số điện thoại: $phone</p>
                        <p>Phương thức thanh toán: " . ($payment_method == 'cash' ? 'Thanh toán khi nhận hàng' : 'Thanh toán qua Momo') . "</p>";
        } else {
            $message = "<p><strong>Lỗi:</strong> Không thể lưu đơn hàng, vui lòng thử lại.</p>";
        }
        $stmt->close();
        $conn->close();
        */
        
        // Giả lập xử lý thành công
        $message = "<h2>Thanh toán thành công!</h2>
                    <p>Tên người nhận: $name</p>
                    <p>Địa chỉ giao hàng: $address</p>
                    <p>Số điện thoại: $phone</p>
                    <p>Phương thức thanh toán: " . ($payment_method == 'cash' ? 'Thanh toán khi nhận hàng' : 'Thanh toán qua Momo') . "</p>";
    }
}
?>
<div class="container">
    <h2>Thông tin thanh toán</h2>
    <?php if (!empty($message)) { echo "<div class='message'>$message</div>"; } ?>
    <form action="checkout.php" method="POST">
        <label for="name">Tên người nhận:</label>
        <input type="text" id="name" name="name" required>
        <label for="address">Địa chỉ giao hàng:</label>
        <input type="text" id="address" name="address" required>
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" required>
        <label for="payment-method">Phương thức thanh toán:</label>
        <select id="payment-method" name="payment_method" required>
            <option value="cash">Thanh toán khi nhận hàng</option>
            <option value="momo">Thanh toán qua Momo</option>
        </select>
        <button type="submit">Hoàn tất thanh toán</button>
    </form>
</div>
</body>
</html>

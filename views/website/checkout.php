<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG THANH TOÁN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/checkout.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/checkout_queries.css">
    <script src="../../assets/js/cart.js"></script>
</head> 
<body>
<header class="header">
    <?php include "./header.php"; ?>
    </header>
    <div class="container">
           
            <!-- Form Section -->
            <div class="checkout-form">
                <h2>Thông tin đặt hàng</h2>
                <form action="addcheckout.php" method="POST">

                <label for="name"><i class="fa-regular fa-circle-user"></i> Tên người nhận:</label>
                <input type="text" id="name" placeholder="Họ tên người nhận" name="name" required>
                
                <label for="address"><i class="fa-regular fa-address-card"></i> Địa chỉ</label>
                <input type="text" id="address" placeholder="Địa chỉ nhận"name="address" required>
                
                <label for="phone"><i class="fa-solid fa-phone"></i> Số điện thoại</label>
                <input type="text" id="phone" placeholder="Số điện thoại người nhận" name="phone" required>

                <label for="email"><i class="fa-regular fa-envelope"></i> Email</label>
                <input type="email" id="email" placeholder="Nhập email của bạn" name="email" required>
            
                <button type="submit">Hoàn tất đặt hàng</button>
                </form>
            </div>
    </div>
<!-- <div class="container">
    <h2>Thông tin đặt hàng</h2>
    <form action="addcheckout.php" method="POST">
        <label for="name">Tên người nhận:</label>
        <input type="text" id="name" name="name" required>
        <label for="address">Địa chỉ giao hàng:</label>
        <input type="text" id="address" name="address" required>
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" required>
        <label for="email">Email người nhận:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Hoàn tất đặt hàng</button>
    </form>
</div> -->
</body>
</html>

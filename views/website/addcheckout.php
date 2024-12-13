<?php
    session_start ();
    // Kết nối tới cơ sở dữ liệu
    include '../../config/connect.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }
    $user_id = $_SESSION['user_id'];
    $insert_orders = " INSERT INTO orders(customer_name, customer_address, customer_phone, customer_email, user_id) VALUE ('".$name."','".$address."','".$phone."','".$email."','".$user_id."')";
    $orders_query = mysqli_query ($conn, $insert_orders);
    $order_id = mysqli_insert_id($conn);
    if ($insert_orders) {
        //Thêm giỏ hàng chi tiết
        foreach ($_SESSION['cart'] as $key => $value) {
            $sku = $value['sku'];
            $order_quantity = $value['quantity'];
            $insert_order_details = "INSERT INTO order_details (sku, order_id,user_id, order_quantity, price, total) VALUES ('".$sku."','".$order_id."','".$user_id."','".$order_quantity."')";
            mysqli_query($conn, $insert_order_details);
        }
    }
    unset($_SESSION['cart']);
    header('location:../../index.php');
?>

<?php
// Xử lý khi form được gửi
$message = ""; // Biến để lưu thông báo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy và làm sạch dữ liệu từ form
    $name = trim(htmlspecialchars($_POST['name']));
    $address = trim(htmlspecialchars($_POST['address']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $email = htmlspecialchars($_POST['email']);

    // Kiểm tra dữ liệu đầu vào
    if (empty($name) || empty($address) || empty($phone) || empty($email)) {
        $message = "<p><strong>Lỗi:</strong> Vui lòng điền đầy đủ thông tin.</p>";
    } elseif (!preg_match("/^[0-9]{10,11}$/", $phone)) { // Kiểm tra số điện thoại (10-11 số)
        $message = "<p><strong>Lỗi:</strong> Số điện thoại không hợp lệ.</p>";
    } else {
        // Đây là nơi bạn sẽ kết nối và xử lý cơ sở dữ liệu nếu cần
        // Kết nối cơ sở dữ liệu (giả sử bạn muốn lưu thông tin)

       include ('../../config/connect.php');
        $stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_address, customer_phone, customer_email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $address, $phone, $email);

        if ($stmt->execute()) {
            $message = "<h2>Thanh toán thành công!</h2>
                        <p>Tên người nhận: $name</p>
                        <p>Địa chỉ giao hàng: $address</p>
                        <p>Số điện thoại: $phone</p>
                        <p>Phương thức thanh toán: " . ($email == 'cash' ? 'Thanh toán khi nhận hàng' : 'Thanh toán qua Momo') . "</p>";
        } else {
            $message = "<p><strong>Lỗi:</strong> Không thể lưu đơn hàng, vui lòng thử lại.</p>";
        }
        $stmt->close();
        $conn->close();
        
        
        // Giả lập xử lý thành công
        $message = "<h2>Thanh toán thành công!</h2>
                    <p>Tên người nhận: $name</p>
                    <p>Địa chỉ giao hàng: $address</p>
                    <p>Số điện thoại: $phone</p>
                    <p>Email: " . ($email == 'cash' ? 'Thanh toán khi nhận hàng' : 'Thanh toán qua Momo') . "</p>";
    }
}
?>

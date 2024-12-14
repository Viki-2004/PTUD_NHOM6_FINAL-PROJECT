<?php
// Kết nối tới cơ sở dữ liệu
include '../../config/connect.php';
echo "<pre>";
print_r($_POST); // Kiểm tra dữ liệu form
echo "</pre>";

// Xử lý thêm hoặc chỉnh sửa đơn hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_phone = $_POST['customer_phone'];
    $customer_email = $_POST['customer_email'];
    $total_bill = $_POST['total_bill'];
    $user_id = $_POST['user_id'];
    $action = $_POST['action'];

    if (!empty($_POST['order_id']) && ($action=== 'edit')){
        $order_id = $_POST['order_id'];
        $sql = "UPDATE orders SET customer_name = ?, customer_address = ?, customer_phone = ?, customer_email = ?, total_bill = ?, user_id = ? WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssiii", $customer_name, $customer_address, $customer_phone, $customer_email, $total_bill, $user_id, $order_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Cập nhật đơn hàng thành công!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi cập nhật đơn hàng!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
            exit();
        }
            $stmt->close();
        } else {
        $sql = "INSERT INTO orders (customer_name, customer_address, customer_phone, customer_email, total_bill,  user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssii", $customer_name, $customer_address, $customer_phone, $customer_email, $total_bill,  $user_id);

        if ($stmt->execute()) {
            echo "<script>alert('Thêm đơn hàng thành công!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi thêm đơn hàng!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
            exit();
        }
            $stmt->close();
    }}
?>
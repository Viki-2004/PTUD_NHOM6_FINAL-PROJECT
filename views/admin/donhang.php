<?php
// Kết nối tới cơ sở dữ liệu
include '../config/connection.php';

// Xử lý xóa đơn hàng
if (isset($_GET['delete_order_id'])) {
    $delete_order_id = $_GET['delete_order_id'];


// Xóa đơn hàng khỏi cơ sở dữ liệu
$sql = "DELETE FROM order WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $delete_order_id);

if ($stmt->execute()) {
    echo "<script>alert('Xóa đơn hàng thành công!'); window.location.href='../index.php';</script>";//cái này chưa sửa location
    exit();
} else {
    echo "<script>alert('Có lỗi xảy ra khi xóa đơn hàng!'); window.location.href='../index.php';</script>";//cái này chưa sửa location
    exit();
}
$stmt->close();
}

// Xử lý thêm hoặc chỉnh sửa đơn hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_phone = $_POST['customer_phone'];
    $customer_email = $_POST['customer_email'];
    $created_at = $_POST['created_at'];
    $action = $_POST['action'];

    if ($action == 'edit') {
        $news_id = $_POST['order_id'];
        $sql = "UPDATE order SET customer_name  = ?, customer_address = ?, customer_phone = ?, customer_email = ?, created_at = ? WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $customer_name , $customer_address, $customer_phone ,$customer_email, $created_at, $order_id);//chưa xong data nên ko biết kiểu dữ liệu

        if ($stmt->execute()) {
            echo "<script>alert('Cập nhật đơn hàng thành công!'); window.location.href='../index.php';</script>";//chưa sửa
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi cập nhật đơn hàng!'); window.location.href='../index.php';</script>";//chưa sửa
            exit();
        }
    } else {
        $sql = "INSERT INTO order (customer_name, customer_address, customer_phone, customer_email, created_at) VALUES (?, ?, ?,?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $customer_name , $customer_address, $customer_phone ,$customer_email, $created_at);//chưa xong data nên ko biết kiểu dữ liệu

        if ($stmt->execute()) {
            echo "<script>alert('Thêm đơn hàng thành công!'); window.location.href='../index.php';</script>";//chưa sửa
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi thêm đơn hàng!'); window.location.href='../index.php';</script>";//chưa sửa
            exit();
        }
    }
    $stmt->close();
}
$sql = "SELECT * FROM news";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐƠN HÀNG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
}
        header {
            background-color: #edeab6; /* Vàng đậm */
            padding: 20px 0;
            text-align: center;
            color: #0d3689;
            text-transform: uppercase;
            font-size: 1.8rem;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        main {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
        }
        .card {
            background-color: #fff; /* Trắng */
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-transform: uppercase;
            font-size: 1.5rem;
            color: #0d3689;
            margin-bottom: 15px;
            text-align: center;
        }
        .card table {
            width: 100%;
            border-collapse: collapse;
        }
        .card table th, 
        .card table td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .card table th {
            background-color: #edeab6;
            color: #0d3689;
        }
        .card table tbody tr:hover {
            background-color: #fff3cd;
        }
        .action-btn {
            color: #0d3689;
            font-size: 1.2rem;
            margin-right: 10px;
            transition: color 0.3s;
        }
        .action-btn:hover {
            color: #ff0000;
        }
        .form-section {
            background-color: #fff; /* Trắng */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        form label {
            font-size: 1rem;
            font-weight: bold;
            color: #000000;
            display: block;
            margin-bottom: 8px;
        }
        form input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        form input:focus {
            border-color: #d7c58f;
            box-shadow: 0 0 5px #eedeaf;
            outline: none;
        }
        form button {
            display: block;
            width: 100%;
            background-color: #edeab6;
            color: #0d3689;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        form button:hover {
            background-color: #0d3689;
            color: white;
        }
    </style>
    <script>
        function editNews(news) {
            document.getElementById('order_id').value = order.order_id;
            document.getElementById('customer_name').value = order.customer_name;
            document.getElementById('customer_address').value = order.customer_address;
            document.getElementById('customer_phone').value = order.customer_name;
            document.getElementById('customer_email').value = order.order_id;
            document.getElementById('created_at').value = order.created_at;
            document.getElementById('action').value = 'edit';
        }
    </script>
</head>
<body>
    <header>ĐƠN HÀNG</header>
    <main>
        <div class="card">
            <h3>Thông tin đơn hàng</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ nhận hàng</th>
                        <th>Email</th>
                        <th>SDT</th>
                        <th>Thời gian đặt hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['order_id'] ?></td>
                        <td><?= $row['customer_name'] ?></td>
                        <td><?= $row['customer_address'] ?></td>
                        <td><?= $row['customer_phone'] ?></td>
                        <td><?= $row['customer_email'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick='editOrder(<?= json_encode($row) ?>)' class="action-btn">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="?delete_order_id=<?= $row['order_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="action-btn">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Phần chỉnh sửa hoặc thêm mới đơn hàng-->
        <div class="form-section">
            <h3>Thêm hoặc cập nhật đơn hàng</h3>
            <form method="POST" action="">
                <input type="hidden" id="news_id" name="order_id">
                <input type="hidden" id="action" name="action" value="add">
                <label for="customer_name">Tên người nhận</label>
                <input type="text" id="customer_name" name="customer_name" required>
                <label for="customer_address">Địa chỉ người nhận</label>
                <input type = "text" id="customer_address" name="customer_address" required>
                <label for="customer_phone">SDT</label>
                <input type="tel" id="customer_phone" name="customer_phone" required>
                <label for="customer_email">Email</label>
                <input type="mail" id="customer_email" name="customer_email" required>
                <label for="created_at">Email</label>
                <input type="date" id="created_at" name="created_at" required>
                <button type="submit">XÁC NHẬN</button>
            </form>
        </div>
    </main>
</body>
</html>
<?php $conn->close(); ?>






































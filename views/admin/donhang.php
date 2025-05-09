<?php
// Kết nối tới cơ sở dữ liệu
include '../../config/connect.php';

// Xử lý xóa đơn hàng
if (isset($_GET['delete_order_id'])) {
    $delete_order_id = $_GET['delete_order_id'];

    // Xóa đơn hàng khỏi cơ sở dữ liệu
    $sql = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_order_id);

    if ($stmt->execute()) {
        echo "<script>alert('Xóa đơn hàng thành công!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
        exit();
    } else {
        echo "<script>alert('Có lỗi xảy ra khi xóa đơn hàng!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
        exit();
    }
    $stmt->close();
}
?>
<?php
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

// // Xử lý thêm hoặc chỉnh sửa đơn hàng
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
//     $customer_name = $_POST['customer_name'];
//     $customer_address = $_POST['customer_address'];
//     $customer_phone = $_POST['customer_phone'];
//     $customer_email = $_POST['customer_email'];
//     $total_bill = $_POST['total_bill'];
//     $created_at = $_POST['created_at'] ?? date('Y-m-d H:i:s');
//     $user_id = $_POST['user_id'];
//     $action = $_POST['action'];

//     if ($action == 'edit') {
//         $order_id = $_POST['order_id'];
//         $sql = "UPDATE orders SET customer_name = ?, customer_address = ?, customer_phone = ?, customer_email = ?, total_bill = ?, created_at = ?, user_id = ? WHERE order_id = ?";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("ssssisii", $customer_name, $customer_address, $customer_phone, $customer_email, $total_bill, $created_at, $user_id, $order_id);

//         if ($stmt->execute()) {
//             echo "<script>alert('Cập nhật đơn hàng thành công!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
//             exit();
//         } else {
//             echo "<script>alert('Có lỗi xảy ra khi cập nhật đơn hàng!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
//             exit();
//         }
//     } else {
//         $sql = "INSERT INTO orders (customer_name, customer_address, customer_phone, customer_email, total_bill, created_at, user_id) VALUES (?, ?, ?, ?, ?, ?)";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("ssssisi", $customer_name, $customer_address, $customer_phone, $customer_email, $total_bill, $created_at, $user_id);

//         if ($stmt->execute()) {
//             echo "<script>alert('Thêm đơn hàng thành công!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
//             exit();
//         } else {
//             echo "<script>alert('Có lỗi xảy ra khi thêm đơn hàng!'); window.location.href='../../views/admin/quanlydonhang.php';</script>";
//             exit();
//         }
//     }
//     $stmt->close();
// }
?>
<?php

$sql = "SELECT * FROM orders";
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
                background-color: #f8c3d6;
                padding: 20px 0;
                text-align: center;
                color: #050505;
                text-transform: uppercase;
                font-size: 1.8rem;
                font-weight: bold;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
            main {
                max-width: 1100px;
                margin: 30px auto;
                padding: 20px;
            }
            .card {
                background-color: #fff; 
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            h3 {
                text-transform: uppercase;
                font-size: 1.5rem;
                color:#050505;
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
                background-color: #f8c3d6;
                color: #050505;
                text-align: center;
            }
            .card table tbody tr:hover {
                background-color:#f7abc77c;
            }
            .action-btn {
                color: #050505;
                font-size: 1.2rem;
                margin-right: 10px;
                transition: color 0.3s;
            }
            .action-btn:hover {
                color: #ff0000;
            }
            .form-section {
                background-color: #fff; 
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            form label {
                font-size: 1rem;
                font-weight: bold;
                color: #050505;
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
                border-color: #f7abc77c;
                box-shadow: 0 0 5px #fed3e37c;
                outline: none;
            }
            form button {
                display: block;
                width: 100%;
                background-color: #fcc3d87c;
                color: #050505;
                border: none;
                padding: 12px;
                border-radius: 8px;
                font-size: 1.2rem;
                font-weight: bold;
                cursor: pointer;
                transition: background 0.3s;
            }
            form button:hover {
                background-color: #f64c8a7c;
                color: white;
            }
            tbody tr td:last-child{
                text-align: center;
            }
        
            @media (max-width: 768px) {
                main {
                    margin: 20px;
                    padding: 10px;
                }

                .card {
                    padding: 15px;
                }

                h3 {
                    font-size: 1.3rem;
                }

                .card table th, .card table td {
                    font-size: 14px;
                    padding: 10px;
                }

                .action-btn {
                    font-size: 1rem;
                }

                form button {
                    font-size: 1rem;
                    padding: 10px;
                }
            }

            @media (max-width: 480px) {
                header {
                    font-size: 1.5rem;
                }

                .card {
                    padding: 10px;
                }

                h3 {
                    font-size: 1.2rem;
                }

                .card table {
                    width: 100%;
                    display: block; 
                    overflow-x: auto; 
                    -webkit-overflow-scrolling: touch; 
                }

                .card table th, 
                .card table td {
                    font-size: 12px;
                    padding: 8px;
                }

                .card table th {
                    font-size: 14px;
                }

                .card table td, .card table th {
                    text-align: center;
                    min-width: 80px;  
                    word-wrap: break-word; 
                }

                .action-btn {
                    font-size: 1rem;
                }

                form button {
                    font-size: 1rem;
                    padding: 8px;
                }
            }

            @media (min-width: 481px) and (max-width: 768px) {
                header {
                    font-size: 1.7rem;
                }

                .card {
                    padding: 15px;
                }

                h3 {
                    font-size: 1.4rem;
                }

                .card table th, .card table td {
                    font-size: 13px;
                    padding: 10px;
                }

                form button {
                    font-size: 1.1rem;
                }
            }

            @media (min-width: 1024px) {
                main {
                    margin: 30px auto;
                    padding: 20px;
                }

                .card {
                    padding: 20px;
                }

                h3 {
                    font-size: 1.5rem;
                }

                .card table th, .card table td {
                    font-size: 14px;
                    padding: 12px 16px;
                }

                form button {
                    font-size: 1.2rem;
                    padding: 12px;
                }
            }
    </style>
    <script>
        function editOrder(order) {
            document.getElementById('order_id').value = order.order_id;
            document.getElementById('customer_name').value = order.customer_name;
            document.getElementById('customer_address').value = order.customer_address;
            document.getElementById('customer_phone').value = order.customer_phone;
            document.getElementById('customer_email').value = order.customer_email;
            document.getElementById('total_bill').value = order.total_bill;
            document.getElementById('created_at').value = order.created_at;
            document.getElementById('user_id').value = order.user_id;
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
                        <th>ID người dùng</th>
                        <th>Tổng hóa đơn</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['order_id'] ?></td>
                        <td><?= $row['customer_name'] ?></td>
                        <td><?= $row['customer_address'] ?></td>
                        <td><?= $row['customer_email'] ?></td>
                        <td><?= $row['customer_phone'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td><?= $row['user_id'] ?></td>
                        <td><?= $row['total_bill'] ?></td>
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
            <form method="POST" action="donhang.php" enctype="multipart/form-data">
                <input type="hidden" id="order_id" name="order_id">
                <input type="hidden" id="action" name="action" value="edit">
                <label for="customer_name">Tên người nhận</label>
                <input type="text" id="customer_name" name="customer_name" required>
                <label for="customer_address">Địa chỉ người nhận</label>
                <input type="text" id="customer_address" name="customer_address" required>
                <label for="customer_phone">SDT</label>
                <input type="tel" id="customer_phone" name="customer_phone" required>
                <label for="customer_email">Email</label>
                <input type="email" id="customer_email" name="customer_email" required>
                <input type="hidden" id="created_at" name="created_at" required>
                <label for="user_id">ID khách hàng</label>
                <input type="number" id="user_id" name="user_id" required>
                <label for="total_bill">Tổng hóa đơn</label>
                <input type="number" id="total_bill" name="total_bill" required>
                <button type="submit">XÁC NHẬN</button>
            </form>
        </div>
    </main>
</body>
</html>
<?php $conn->close(); ?>

<?php
// Kết nối tới cơ sở dữ liệu
include '../../config/connect.php';

// Xử lý xóa sản phẩm
if (isset($_GET['delete_sku'])) {
    $delete_sku = $_GET['delete_sku'];

// Xóa sản phẩm khỏi cơ sở dữ liệu
$sql = "DELETE FROM product WHERE sku = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $delete_sku);

if ($stmt->execute()) {
    echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='../../views/admin/quanlysanpham.php';</script>";//cái này chưa sửa location
    exit();
} else {
    echo "<script>alert('Có lỗi xảy ra khi xóa sản phẩm!'); window.location.href='../../views/admin/quanlysanpham.php';</script>";//cái này chưa sửa location
    exit();
}
$stmt->close();
}

// Xử lý thêm hoặc chỉnh sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $product_name = $_POST['product_name'];
    $product_img = $_POST['product_img'];
    $product_hover = $_POST['product_hover'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_quantity = $_POST['product_quantity'];
    $trending = $_POST['trending'];
    $new_arrival = $_POST['new_arrival'];
    $id_category = $_POST['id_category '];
    $action = $_POST['action'];

    if ($action == 'edit') {
        $sku = $_POST['sku'];
        $sql = "UPDATE product SET product_name  = ?, product_img = ?, product_hover = ?, product_price = ?, product_description = ?, product_quantity = ?, trending = ?, new_arrival = ?, id_category = ? WHERE sku = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdsiiiis", $product_name, $product_img, $product_hover, $product_price, $product_description, $product_quantity, $trending, $new_arrival, $id_category, $sku);

        if ($stmt->execute()) {
            echo "<script>alert('Cập nhật sản phẩm thành công!'); window.location.href='../../views/admin/quanlysanpham.php';</script>";
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi cập nhật sản phẩm!'); window.location.href='../../views/admin/quanlysanpham.php';</script>";
            exit();
        }
    } else {
        $sql = "INSERT INTO product (product_name, product_img, product_hover, product_price, product_description, product_quantity, trending, new_arrival, id_category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdsiiii", $product_name, $product_img, $product_hover, $product_price, $product_description, $product_quantity, $trending, $new_arrival, $id_category);

        if ($stmt->execute()) {
            echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='../../views/admin/quanlysanpham.php';</script>";
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi thêm sản phẩm!'); window.location.href='../../views/admin/quanlysanpham.php';</script>";
            exit();
        }
    }
    $stmt->close();
}
$sql = "SELECT * FROM product";
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
            max-width: 70%;
            margin: 0 auto;
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
        form input, 
        form select {
            width: 100%; 
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box; 
        }
        form input:focus, form select:focus {
            border-color: #f7abc77c;
            box-shadow: 0 0 5px #fed3e37c;
            outline: none;
        }
        form button {
            margin-top: 20px;
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
        tbody tr td:nth-child(n+6){
            text-align: center;
        }
        tbody tr td:nth-child(6){
            text-align: justify;
        }
    </style>
    <script>
        function editProduct(product) {
            document.getElementById('sku').value = product.sku;
            document.getElementById('product_name').value = product.product_name;
            document.getElementById('product_img').value = product.product_img;
            document.getElementById('product_hover').value = product.product_hover;
            document.getElementById('product_price').value = product.product_price;
            document.getElementById('product_description').value = product.product_description;
            document.getElementById('product_quantity').value = product.product_quantity;
            document.getElementById('trending').value = product.trending;
            document.getElementById('new_arrival').value = product.new_arrival;
            document.getElementById('id_category').value = product.id_category;
            document.getElementById('action').value = 'edit';
        }
    </script>
</head>
<body>
    <header>SẢN PHẨM</header>
    <main>
        <div class="card">
            <h3>Thông tin sản phẩm</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Hover hình ảnh</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Số lượng</th>
                        <th>Xu hướng</th>
                        <th>Mới</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['sku'] ?></td>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['product_img'] ?></td>
                        <td><?= $row['product_hover'] ?></td>
                        <td><?= $row['product_price'] ?></td>                       
                        <td><?= $row['product_description'] ?></td>
                        <td><?= $row['product_quantity'] ?></td>
                        <td><?= $row['trending'] ?></td>
                        <td><?= $row['new_arrival'] ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick='editProduct(<?= json_encode($row) ?>)' class="action-btn">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="?delete_sku=<?= $row['sku'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="action-btn">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Phần chỉnh sửa hoặc thêm mới sản phẩm-->
        <div class="form-section">
            <h3>Thêm hoặc cập nhật sản phẩm</h3>
            <form method="POST" action="">
            <input type="hidden" id="sku" name="sku">
            <input type="hidden" id="action" name="action" value="add">
            <label for="product_name">Tên</label>
            <input type="text" id="product_name" name="product_name" required>
            <label for="product_img">Hình ảnh</label>
            <input type="file" id="product_img" name="product_img" accept="image/*" required>
            <label for="product_hover">Hover hình ảnh</label>
            <input type="file" id="product_hover" name="product_hover" accept="image/*" required>
            <label for="product_price">Giá</label>
            <input type="number" id="product_price" name="product_price" required>
            <label for="product_description">Mô tả</label>
            <input type="text" id="product_description" name="product_description" required>
            <label for="product_quantity">Số lượng</label>
            <input type="number" id="product_quantity" name="product_quantity" required>
            <label for="trending">Xu hướng</label>
            <select id="trending" name="trending" required>
                <option value="0">Không</option>
                <option value="1">Có</option>
            </select>
            <label for="new_arrival">Mới</label>
             <select id="new_arrival" name="new_arrival" required>
                <option value="0">Không</option>
                <option value="1">Có</option>
            </select>
            <button type="submit">XÁC NHẬN</button>
            </form>
        </div>
    </main>
</body>
</html>
<?php $conn->close(); ?>






































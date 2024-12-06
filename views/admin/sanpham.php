<?php
// Kết nối tới cơ sở dữ liệu
include '../config/connection.php';

// Xử lý xóa sản phẩm
if (isset($_GET['delete_sku'])) {
    $delete_sku = $_GET['delete_sku'];


// Xóa sản phẩm khỏi cơ sở dữ liệu
$sql = "DELETE FROM product WHERE sku = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $delete_sku);

if ($stmt->execute()) {
    echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='../index.php';</script>";//cái này chưa sửa location
    exit();
} else {
    echo "<script>alert('Có lỗi xảy ra khi xóa sản phẩm!'); window.location.href='../index.php';</script>";//cái này chưa sửa location
    exit();
}
$stmt->close();
}

// Xử lý thêm hoặc chỉnh sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_description = $_POST['product_description'];
    $product_quantity = $_POST['product_quantity'];
    $id_category = $_POST['id_category '];
    $action = $_POST['action'];

    if ($action == 'edit') {
        $news_id = $_POST['sku'];
        $sql = "UPDATE product SET product_name  = ?, product_price = ?, product_image = ?, product_description = ?, product_quantity = ?, id_category = ? WHERE sku = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $product_name , $product_price, $product_image ,$product_description, $product_quantity, $id_category, $sku);//chưa xong data nên ko biết kiểu dữ liệu

        if ($stmt->execute()) {
            echo "<script>alert('Cập nhật sản phẩm thành công!'); window.location.href='../index.php';</script>";//chưa sửa
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi cập nhật sản phẩm!'); window.location.href='../index.php';</script>";//chưa sửa
            exit();
        }
    } else {
        $sql = "INSERT INTO product (product_name, product_price, product_image, product_description, product_quantity, id_category) VALUES (?, ?, ?,?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $product_name , $product_price, $product_image ,$product_description, $product_quantity, $id_category);//chưa xong data nên ko biết kiểu dữ liệu

        if ($stmt->execute()) {
            echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='../index.php';</script>";//chưa sửa
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi thêm sản phẩm!'); window.location.href='../index.php';</script>";//chưa sửa
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
            document.getElementById('sku').value = product.sku;
            document.getElementById('product_name').value = product.product_name;
            document.getElementById('product_price').value = product.product_price;
            document.getElementById('product_image').value = product.product_name;
            document.getElementById('product_description').value = product.sku;
            document.getElementById('product_quantity').value = product.product_quantity;
            document.getElementById('id_category').value = product.id_category;
            document.getElementById('action').value = 'edit';
        }
    </script>
</head>
<body>
    <header>ĐƠN HÀNG</header>
    <main>
        <div class="card">
            <h3>Thông tin sản phẩm</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Mô tả ngắn</th>
                        <th>Số lượng</th>
                        <th>Danh mục sản phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['sku'] ?></td>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['product_price'] ?></td>
                        <td><?= $row['product_image'] ?></td>
                        <td><?= $row['product_description'] ?></td>
                        <td><?= $row['product_quantity'] ?></td>
                        <td><?= $row['id_category'] ?></td>
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
                <input type="hidden" id="news_id" name="sku">
                <input type="hidden" id="action" name="action" value="add">
                <label for="product_name">Tên</label>
                <input type="text" id="product_name" name="product_name" required>
                <label for="product_price">Giá</label>
                <input type = "int" id="product_price" name="product_price" required>
                <label for="product_image">Ảnh</label>
                <input type="img" id="product_image" name="product_image" required>
                <label for="product_description">Mô tả ngắn</label>
                <input type="text" id="product_description" name="product_description" required>
                <label for="product_quantity">Số lượng</label>
                <input type="int" id="product_quantity" name="product_quantity" required>
                <label for="id_category">Danh mục sản phẩm</label>
                <input type="text" id="id_category" name="id_category" required>
                <button type="submit">XÁC NHẬN</button>
            </form>
        </div>
    </main>
</body>
</html>
<?php $conn->close(); ?>






































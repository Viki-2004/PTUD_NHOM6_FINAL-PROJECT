<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ SẢN PHẨM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        
        .admin-panel {
            display: flex;
            height: 100vh; 
        }
        
        .sidebar {
            width: 200px;
            background-color: #f6c9d7;
            padding: 10px 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); 
        }
        
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar ul li {
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .sidebar ul li a {
            color: #333; 
            text-decoration: none; 
            font-size: 1.1rem; 
            font-weight: bold; 
            display: block; 
            padding: 10px 0;
            transition: color 0.3s;
        }
        
        .sidebar ul li:hover {
            background-color: #f8c3d6; 
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1); 
        }
        
        .sidebar ul li a:hover {
            color: #fff; 
        }
        
        .content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            overflow-x: auto;
        }
        
        h1 {
            font-size: 1.5rem;
            color:#050505;
            margin-bottom: 15px;
            text-align: center;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }
        
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 14px;
        }
        
        table th {
            background-color: #f8c3d6;
            color: #050505;
            text-align: center;
        }
        
        table td {
            font-size: 14px;
            border: 1px solid #ddd;
            padding: 12px;
            text-align: justify;
            vertical-align: middle;
        }
        
        button {
            display: block;
            background-color: #fb9cbf7c; 
            color: #050505;
            border: none;
            padding: 8px 16px; 
            border-radius: 5px; 
            font-size: 1rem; 
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin: 0 auto; 
            width: 20%; 
            text-transform: uppercase;
        }
        
        button:hover {
            background-color: #f64c8a7c;
            color: white;
        }

        @media (max-width: 768px) {
    .admin-panel {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        height: auto;
        padding: 10px 0;
    }

    .content {
        padding: 10px;
    }

    table th, table td {
        font-size: 12px;
        padding: 8px;
    }

    button {
        width: 50%; 
    }
}

@media (max-width: 480px) {
    .sidebar {
        width: 100%;
        text-align: center;
    }

    .sidebar ul {
        padding: 0;
    }

    .sidebar ul li {
        padding: 10px;
        font-size: 1rem;
    }

    .content {
        padding: 5px;
    }

    table th, table td {
        font-size: 12px;
        padding: 6px;
    }

    h1 {
        font-size: 1.2rem;
    }

    button {
        width: 80%; 
        font-size: 1rem;
    }
}

@media (min-width: 481px) and (max-width: 768px) {
    .sidebar {
        width: 60%;
        padding: 20px;
    }

    .content {
        flex: 1;
        padding: 10px;
    }

    table th, table td {
        font-size: 13px;
        padding: 10px;
    }

    button {
        width: 30%;
    }
}

@media (min-width: 1024px) {
    .admin-panel {
        flex-direction: row;
    }

    .sidebar {
        width: 250px;
    }

    .content {
        padding: 30px;
    }

    h1 {
        font-size: 1.6rem;
    }

    table th, table td {
        font-size: 14px;
        padding: 12px;
    }

    button {
        width: 20%;
    }
}
    </style>
</head>
<body>
    <div class="admin-panel">
        <div class="sidebar">
            <ul>
                <li><a href="../../views/admin/quanlytintuc.php">Quản lý tin tức</a></li>
                <li><a href="../../views/admin/quanlysanpham.php">Quản lý sản phẩm</a></li>
                <li><a href="../../views/admin/quanlydonhang.php">Quản lý đơn hàng</a></li>
                <li><a href="../../views/admin/quanlytinnhan.php">Quản lý tin nhắn</a></li>
                <li><a href="../../views/website/trangchu.php">Website</a></li>
                <li><a href="../../views/website/login.php">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>QUẢN LÝ SẢN PHẨM</h1>
            <section>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../../config/connect.php');
                        $query = "SELECT sku, product_name, product_img, product_hover, product_price, product_description, product_quantity, trending, new_arrival FROM product";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
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
                                </tr>
                            <?php } 
                        } else { ?>
                            <tr>
                                <td colspan="9">Không có dữ liệu</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>  
                <button type="button" onclick="goToEditSKU()">Chỉnh sửa</button>
            </section>
        </div>
    </div>

    <script>
        function goToEditSKU() {
            window.location.href = '../../views/admin/sanpham.php';
        }
    </script>
</body>
</html>

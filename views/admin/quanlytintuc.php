<?php include('../../config/connect.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>QUẢN LÝ TIN TỨC</title>
    <link rel="stylesheet" href="../../assets/css/quanlytintuc.css">
</head>
<body>
    <div class="admin-panel">
        <div class="sidebar">
            <ul>
                <li>Quản lý tin tức</li>
                <li>Quản lý sản phẩm</li>
                <li>Quản lý đơn hàng</li>
                <li>Đăng xuất</li>
            </ul>
        </div>
        <div class="content">
            <h1>QUẢN LÝ TIN TỨC</h1>
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>ID tin tức</th>
                            <th>Tiêu đề</th>
                            <th>Ngày đăng</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Cập nhật</th>
                            <th>Hiển thị</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Hướng Dẫn Cách Check Nước Hoa Chính Hãng Đơn Giản Nhất</td>
                            <td>2024-12-03</td>
                            <td>Mô tả ngắn...</td>
                            <td><button class="icon-btn"><i class="fas fa-edit"></i></button></td>
                            <td><button class="visible"><i class="fas fa-eye"></i></button></td>
                            <td><button class="icon-btn delete"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                        <tr>
                            <td>N002</td>
                            <td>Tiêu đề 2</td>
                            <td>02/12/2024</td>
                            <td>Mô tả ngắn...</td>
                            <td><button class="icon-btn"><i class="fas fa-edit"></i></button></td>
                            <td><button class="visible"><i class="fas fa-eye"></i></button></td>
                            <td><button class="icon-btn delete"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                        <tr>
                            <td>N003</td>
                            <td>Tiêu đề 3</td>
                            <td>03/12/2024</td>
                            <td>Mô tả ngắn...</td>
                            <td><button class="icon-btn"><i class="fas fa-edit"></i></button></td>
                            <td><button class="visible"><i class="fas fa-eye"></i></button></td>
                            <td><button class="icon-btn delete"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
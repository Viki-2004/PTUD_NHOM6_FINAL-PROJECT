<?php
// Kết nối tới cơ sở dữ liệu
include '../../config/connect.php';

// Xử lý xóa tin tức
if (isset($_GET['delete_news_id'])) {
    $delete_news_id = $_GET['delete_news_id'];

    // Xóa tin tức khỏi cơ sở dữ liệu
    $sql = "DELETE FROM news WHERE news_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_news_id);

    if ($stmt->execute()) {
        echo "<script>alert('Xóa tin tức thành công!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
        exit();
    } else {
        echo "<script>alert('Có lỗi xảy ra khi xóa tin tức!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
        exit();
    }
    $stmt->close();
}

// Xử lý thêm hoặc chỉnh sửa tin tức
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $news_title = $_POST['news_title'];
    $publish_date = $_POST['publish_date'];
    $news_content = $_POST['news_content'];
    $action = $_POST['action'];

    // Xử lý file upload
    $news_img = '';
    if (!empty($_FILES['news_img']['name'])) {
        $news_img = basename($_FILES['news_img']['name']);
        $target_dir = '../../assets/img/NEWS/';
        $target_file = $target_dir . $news_img;

        // Di chuyển file đến thư mục chỉ định
        if (!move_uploaded_file($_FILES['news_img']['tmp_name'], $target_file)) {
            echo "<script>alert('Có lỗi khi upload ảnh!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
            exit();
        }
    }

    if ($action === 'edit') {
        // Chỉnh sửa tin tức
        $news_id = $_POST['news_id'];

        // Kiểm tra nếu không upload ảnh mới thì giữ ảnh cũ
        if (empty($news_img)) {
            $sql = "UPDATE news SET news_title = ?, publish_date = ?, news_content = ?, id_admin = ? WHERE news_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssii", $news_title, $publish_date, $news_content, $id_admin, $news_id);
        } else {
            $sql = "UPDATE news SET news_title = ?, publish_date = ?, news_content = ?, news_img = ?, id_admin = ? WHERE news_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssii", $news_title, $publish_date, $news_content, $news_img, $id_admin, $news_id);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Cập nhật tin tức thành công!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi cập nhật tin tức!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
            exit();
        }
    } else {
        // Thêm tin tức mới
        $sql = "INSERT INTO news (news_title, publish_date, news_content, news_img, id_admin) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $news_title, $publish_date, $news_content, $news_img, $id_admin);

        if ($stmt->execute()) {
            echo "<script>alert('Thêm tin tức thành công!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
            exit();
        } else {
            echo "<script>alert('Có lỗi xảy ra khi thêm tin tức!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
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
    <title>TIN TỨC</title>
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
        function editNews(news) {
            document.getElementById('news_id').value = news.news_id;
            document.getElementById('news_title').value = news.news_title;
            document.getElementById('publish_date').value = news.publish_date;
            document.getElementById('news_content').value = news.news_content;
            document.getElementById('news_img').value = news.news_img;
            document.getElementById('id_admin').value = news.id_admin;
            document.getElementById('action').value = 'edit';
        }
    </script>
</head>
<body>
    <header>TIN TỨC</header>
    <main>
        <div class="card">
            <h3>Thông tin bài đăng</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['news_id'] ?></td>
                        <td><?= $row['news_title'] ?></td>
                        <td><?= $row['publish_date'] ?></td>
                        <td><?= $row['news_content'] ?></td>
                        <td><?= $row['news_img'] ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick='editNews(<?= json_encode($row) ?>)' class="action-btn">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="?delete_news_id=<?= $row['news_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="action-btn">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Phần chỉnh sửa hoặc thêm mới tin tức-->
        <div class="form-section">
            <h3>Thêm hoặc cập nhật tin tức</h3>
            <form method="POST" action="tintuc.php" enctype="multipart/form-data">
                <input type="hidden" id="action" name="action" value="add">
                <input type="hidden" id="news_id" name="news_id">
                <label for="news_title">Tiêu đề</label>
                <input type="text" id="news_title" name="news_title" required>
                <label for="publish_date">Ngày đăng</label>
                <input type="date" id="publish_date" name="publish_date" required>
                <label for="news_content">Nội dung</label>
                <input type="text" id="news_content" name="news_content" required>
                <label for="news_img">Hình ảnh</label>
                <input type="file" id="news_img" name="news_img">
                <button type="submit">XÁC NHẬN</button>
            </form>

        </div>
    </main>
</body>
</html>
<?php $conn->close(); ?>






































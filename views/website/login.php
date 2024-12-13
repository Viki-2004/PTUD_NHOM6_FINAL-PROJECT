<!DOCTYPE html>
<html lang="vi">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ĐĂNG NHẬP</title>
        <link rel="stylesheet" href="../../assets/css/login.css">
        <link rel="stylesheet" href="../../assets/css/login_queries.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
<?php
// Kết nối tới cơ sở dữ liệu
include '../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin trong bảng admin
    $sql_admin = "SELECT * FROM admin WHERE admin_account = ? AND password = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("ss", $username, $password);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows > 0) {
        // Đăng nhập thành công với bảng admin
        header("Location: ../admin/quanlytintuc.php");
        exit();
    }

    // Kiểm tra thông tin trong bảng users
    $sql_users = "SELECT * FROM users WHERE user_name = ? AND user_password = ?";
    $stmt_users = $conn->prepare($sql_users);
    $stmt_users->bind_param("ss", $username, $password);
    $stmt_users->execute();
    $result_users = $stmt_users->get_result();

    if ($result_users->num_rows > 0) {
        $user_id = $result_users->fetch_assoc()['user_id'];
        session_start();
        $_SESSION['user_id']=$user_id;
        // Đăng nhập thành công với bảng users
        header("Location: ../../index.php");
        exit();
    }

    // Nếu không tìm thấy tài khoản nào phù hợp
    $error_message = "Tên đăng nhập hoặc mật khẩu không đúng.";
}
?>
    <div class="container">
        <!-- Phần ảnh bên trái -->
        <div class="image-section">
            <img src="../../assets/img/lolidoll_login.jpeg" alt="Ảnh nền">
        </div>    
    <div id="wrapper">
    <form action="" id="form-login" method="post">
                <h1 class="form-heading">ĐĂNG NHẬP</h1>
                <?php if (isset($error_message)) { ?>
                    <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
                <?php } ?>
                <div class="form-group">
                    <i class="far fa-user"></i>
                    <input type="text" name="username" class="form-input" placeholder="Tên đăng nhập" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" name="password" class="form-input" placeholder="Mật khẩu" required>
                    <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
                </div>
                <input type="submit" value="Đăng nhập" class="form-submit">
                <div class="signup-prompt">
                    <p>Bạn chưa có tài khoản? <a href="../../views/website/trangdangky.php">Đăng ký ngay</a></p>
                </div>
            </form>

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../../assets/js/login.js"></script>
</html>
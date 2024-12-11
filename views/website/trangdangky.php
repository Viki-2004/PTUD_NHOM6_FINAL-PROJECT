<!DOCTYPE html>
<html lang="vi">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ĐĂNG KÝ TÀI KHOẢN</title>
        <link rel="stylesheet" href="../../assets/css/signup.css">
        <link rel="stylesheet" href="../../assets/css/signup_queries.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <!-- Phần ảnh bên trái -->
        <div class="image-section">
            <img src="../../assets/img/lolidoll_signup.jpeg" alt="Ảnh nền">
        </div>  
    <div id="wrapper">
        <?php require_once "../../config/connect.php"?>
        <?php 
        if(isset($_POST['submit'])){
            $user_email = $_POST['user_email'];
            $user_phone = $_POST['user_phone'];
            $user_name = $_POST['user_name'];
            $user_password = $_POST['user_password'];
            if($conn -> query("INSERT INTO users(user_name, user_email, user_phone, user_password) VALUES (N'$user_name',N'$user_email',N'$user_phone',N'$user_password')")){
                echo("<script>alert('Bạn đã đăng ký thành công');</script>");
            }
            else{
                echo("<script>alert('Bạn đã đăng ký thất bại');</script>");
            }
        }
        $conn->close();
        ?>
        <form action="" id="form-signup" method = "POST">
            <h1 class="form-heading">ĐĂNG KÝ TÀI KHOẢN</h1>
            <div class="form-group">
                <i class="far fa-envelope"></i>
                <input type="email" class="form-input" name ="user_email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <i class="far fa-phone"></i>
                <input type="tel" class="form-input" name ="user_phone" placeholder="Số điện thoại" required pattern="[0-9]{10,11}" title="Vui lòng nhập số điện thoại hợp lệ (10-11 chữ số)">
            </div>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name ="user_name" placeholder="Tên đăng nhập" required>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name = "user_password" placeholder="Mật khẩu" required>
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" name = "submit" value="Đăng ký" class="form-submit">
            <div class="login-prompt">
                <p>Bạn đã có tài khoản? <a href="../../views/website/login.php">Đăng nhập</a></p>
            </div>
            <div id="password-strength-bar">
                <div id="power-point" style="width: 0%; background-color: #D73F40; height: 20px;"></div>
                <div id="password-strength"></div> 
                </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../../assets/js/signup.js"></script>
</html>
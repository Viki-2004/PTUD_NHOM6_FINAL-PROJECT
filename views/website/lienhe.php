<!DOCTYPE html>
<html lang="vi">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LIÊN HỆ</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../assets/css/lienhe.css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/lienhe_queries.css">
        <script src="../../assets/js/lienhe.js"></script>
    </head>
    <body> 
    <header class="header">
    <?php include "./header.php"; ?>
    </header>
        <div class="form-container">
            <h1>LIÊN HỆ VỚI POLIDOLL</h1>
            <form>
                <div class = "form-group">
                    <label for="name">Họ tên</label>
                    <input type = "text" id = "name" name ="name">
                </div>
                <div class = "form-group">
                    <label for="email">Email</label>
                    <input type = "email" id = "email" name ="email">
                </div>
                <div class = "form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type = "tel" name = "phone" id = "phone">
                </div>
                <div class = "form-group">
                    <label for="message">Tin nhắn của bạn</label>
                    <textarea id = "message" name = "message"></textarea>
                </div>
                <input type="submit" value="GỬI TIN NHẮN" class="form-submit">
            </form>
        </div>
    </body>
    <footer>
<?php include "./footer.php"; ?>
</footer>
</html>
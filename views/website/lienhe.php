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
            <form action="../../views/admin/tinnhan.php" method="POST">
            <input type="hidden" name="action" value="submit">
                <div class = "form-group">
                    <label for="contact_name">Họ tên</label>
                    <input type = "text" id = "contact_name" name ="contact_name" required>
                </div>
                <div class = "form-group">
                    <label for="contact_email">Email</label>
                    <input type = "email" id = "contact_email" name ="contact_email" required>
                </div>
                <div class = "form-group">
                    <label for="contact_phone">Số điện thoại</label>
                    <input type = "tel" id = "contact_phone" name = "contact_phone" required  pattern="^[0-9]{10}$" title="Số điện thoại phải có 10 chữ số">
                </div>
                <div class = "form-group">
                    <label for="contact_content">Tin nhắn của bạn</label>
                    <textarea id = "contact_content" name = "contact_content" required></textarea>
                </div>
                <input type="submit" value="GỬI TIN NHẮN" class="form-submit">
            </form>
        </div>
    </body>
    <footer>
<?php include "./footer.php"; ?>
</footer>
</html>
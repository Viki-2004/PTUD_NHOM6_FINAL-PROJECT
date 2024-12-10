<!DOCTYPE html>
<html>

<head>
    <title>HEADER</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/header.css">
    <script src="../../assets/js/header.js"></script>
</head>
<body>
<?php
include "../../config/connect.php";
// LỌC THEO DANH MỤC
$category = mysqli_query($conn, "SELECT * FROM category");
?>
        <div class="logo"><a href="trangchu.php" style = "color: #f25a8c; text-decoration: none">POLIDOLL</a></div>
        <div class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars mobile-nav-icon"></i></div>
        <nav class="navbar">
            <div class="dropdown">
                <button class="dropbtn"><a href="trangchu.php">TRANG CHỦ</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a href="product.php">SẢN PHẨM</a></button>
                <div class="dropdown-content">
                    <?php while($cat1 = mysqli_fetch_array($category)) { ?>
                        <div>
                            <a href="product.php?id_category=<?=$cat1['category_id']?>"><?= $cat1['category_name'] ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">KHÁM PHÁ</button>
                <div class="dropdown-content">
                    <a href="aboutus.php">Về Chúng Tôi</a>
                    <a href="news.php">Blogs</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="lienhe.php"><button class="dropbtn">LIÊN HỆ</a></button>
            </div>
        </nav>
        <div class="icons">
            <a href="#" title="Search"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a href="#" title="Wishlist"><i class="fa-solid fa-heart"></i></a>
            <a href="#" title="Cart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
</body>
</html>
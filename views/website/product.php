<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG SẢN PHẨM</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/product.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/product_queries.css">
</head>
<body>
<?php
$param = "";
$orderCondition = "";
$sortParam = "";
// TÌM KIẾM
$search = isset($_GET['product_name']) ? $_GET['product_name'] : "";
if ($search) {
    $where = "WHERE `product_name` LIKE '%".$search."%'";
    $param .= "product_name=" . $search;
    $sortParam ="product_name=" . $search;
}
// SẮP XẾP
$orderField = isset($_GET['field']) ? $_GET['field'] : "";
$orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";

if ($orderField == 'default') {
    $orderCondition = "";  
    $param = ''; 
    $sortParam = ''; 
} else {
    if(!empty($orderField) && !empty($orderSort)){
        $orderCondition = "ORDER BY `".$orderField."` ".$orderSort;
        $param .= "field=".$orderField."&sort=".$orderSort."&";
    }
}

include "../../config/connect.php";
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại 
$offset = ($current_page - 1) * $item_per_page;

if ($search) {
    $products = mysqli_query($conn, "SELECT * FROM product WHERE `product_name` LIKE '%". $search . "%' ".$orderCondition." LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($conn, "SELECT * FROM product WHERE `product_name` LIKE '%". $search . "%'"); 
} else {
    $products = mysqli_query($conn, "SELECT * FROM product ".$orderCondition." LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($conn, "SELECT * FROM product");
}

$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);
?>
    <!-- Header -->
    <header class="header">
        <div class="logo">POLIDOLL</div>
        <div class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
        <nav class="navbar">
            <div class="dropdown">
                <button class="dropbtn"><a href="trangchu.php">TRANG CHỦ</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a href="product.html">SẢN PHẨM</a></button>
                <div class="dropdown-content">
                    <a href="#">Mắt</a>
                    <a href="#">Môi</a>
                    <a href="#">Mặt</a>
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
    </header>

    <!-- Main Content -->
    <main class="shop_container">
        <div class="container">
            <!-- Breadcrumb -->
            <div class="shop_breadcrumb">
                <a href="./trangchu.php">Trang chủ</a>
                &gt; 
                <a href="./product.php">Trang sản phẩm</a>
            </div>
            <!-- Tính năng lọc -->
            <div class="shop_functions">
                <div class="shop_function--logo">
                    <i class="fa-solid fa-list"></i>
                </div>
                <div class="shop_function">
                    <div class="shop_function--searchbar">
                        <form id = "product-search" method = "GET">
                            <input type="text" value = "<?=isset($_GET['product_name']) ? $_GET['product_name'] : ""?>" name = "product_name" placeholder = "Tìm kiếm sản phẩm">
                            <button type="submit" style="background: none; border: none; cursor: pointer;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <div class="shop_function--sort">
                    <label for="sort">Sắp xếp theo</label>
                    <select id="sort" onchange ="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option value="?">Mặc định</option>
                        <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=product_price&sort=asc">Giá tăng dần</option>
                        <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=product_price&sort=desc">Giá giảm dần</option>
                    </select>
                </div>
            </div>
            <div class="shop_content">
                    <div class="shop_sidebar">
                        <h3>Danh mục</h3>
                            <ul class="sidebar_items">
                                <li class="sidebar_menu_item"><a href="#">Sản phẩm mới</a></li>
                                <li class="sidebar_menu_item"><a href="#">Sản phẩm bán chạy</a></li>
                                <li class="sidebar_menu_item"><a href="#">Sản phẩm xu hướng</a></li>
                                <li class="sidebar_menu_item"><a href="#">Trang điểm mắt</a></li>
                                <li class="sidebar_menu_item"><a href="#">Trang điểm môi</a></li>
                                <li class="sidebar_menu_item"><a href="#">Trang điểm mặt</a></li>
                            </ul>
                    </div>
                    <div class="shop_products">
                        <h3>Sản phẩm mới</h3>  <!-- Danh mục lựa chọn -->
                     <div class="product_items">
                        <!-- Sản phẩm mới 1 -->
                            <?php
                            while($row = mysqli_fetch_array($products)){                          
                            ?>
                            <div class="product_item">
                                    <div class="product_item_image">
                                        <img src="../../assets/img/products/<?php echo $row["product_img"] ?>" alt="<?php echo $row["product_img"] ?>" class="default_img">
                                        <img src="../../assets/img/products/<?php echo $row["product_hover"] ?>" alt="<?php echo $row["product_hover"] ?> hover" class="hover_img">
                                        <button class="nav-buy-now-btn">Mua ngay</button>
                                    </div>
                                    <div class="product_item_info">
                                        <h4 class="product_name"><?php echo $row["product_name"] ?></h4>
                                        <p class="product_price"><?php echo number_format($row['product_price'], 0, ',', '.'); ?>đ</p>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            </div> 
                    </div>
                <div class="shop_sidebar"></div>
                <div class="page-item-container">
                    <?php include "./pagnition.php"; ?>
                </div>
    </main>
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Customer Service Section -->
            <div class="footer-section">
                <h4>CHĂM SÓC KHÁCH HÀNG</h4>
                <p>lolidoll.cskh@gmail.com</p>
            </div>
            <!-- Informations Section -->
            <div class="footer-section information">
                <h4>THÔNG TIN</h4>
                <ul>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Liên lạc</a></li>
                    <li><a href="#">Theo dõi đơn hàng</a></li>
                    <li><a href="#">Tin tức</a></li>
                </ul>
            </div>
            <!-- Policy Section -->
            <div class="footer-section Policy">
                <h4>CHÍNH SÁCH</h4>
                <ul>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Chính sách hoàn trả</a></li>
                    <li><a href="#">Chính sách vận chuyển</a></li>
                    <li><a href="#">Điều khoản dịch vụ</a></li>
                </ul>
            </div>
            <!-- Follow Us Section -->
            <div class="footer-section">
                <h4>THEO DÕI CHÚNG TÔI</h4>
                <div class="social-icons">
                    <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
                <h4>ĐĂNG KÝ LIÊN LẠC</h4>
                <div class="newsletter">
                    <p>Nhận những thông tin mới nhất về sản phẩm và chương trình ưu đãi của chúng tôi</p>
                    <input type="email" placeholder="Email của bạn">
                    <button>GỬI</button>
                </div>
            </div>
        </div>
        <!-- Scroll to Top Button -->
        <div class="scroll-top">
            <a href="#">⬆</a>
        </div>
    </footer>
</body>
</html>

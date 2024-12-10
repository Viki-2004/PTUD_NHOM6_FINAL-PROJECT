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
    <header class="header">
    <?php include "./header.php"; ?>
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
                                    <a href = "chitietsanpham.php?sku=<?=$row["sku"]?>">
                                        <img src="../../assets/img/products/<?php echo $row["product_img"] ?>" alt="<?php echo $row["product_img"] ?>" class="default_img">
                                        <img src="../../assets/img/products/<?php echo $row["product_hover"] ?>" alt="<?php echo $row["product_hover"] ?> hover" class="hover_img">
                            </a>
                                        <button class="nav-buy-now-btn">Mua ngay</button>
                                    </div>
                                    <div class="product_item_info">
                                       <h4 class="product_name">
                                            <a href = "chitietsanpham.php?sku=<?=$row["sku"]?>"><?php echo $row["product_name"] ?></a>
                                       </h4>
                                        <p class="product_price"><?php echo number_format($row['product_price'], 0, ',', '.'); ?>đ</p>
                                    </div>
                            </div>
                            <?php } ?>
                            </div> 
                    </div>
                <div class="shop_sidebar"></div>
                <div class="page-item-container">
                    <?php include "./pagnition.php"; ?>
                </div>
    </main>
    <footer>
    <?php include "./footer.php"; ?>
    </footer>
</body>
</html>

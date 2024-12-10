<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG SẢN PHẨM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/news.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/news_queries.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/grid.css">
    <script src="../../assets/js/new.js"></script>
</head>

<body>
<?php
include "../../config/connect.php";
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại 
$offset = ($current_page - 1) * $item_per_page;
$products = mysqli_query($conn, "SELECT * FROM news ORDER BY news_id ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
$news = mysqli_query($conn, "SELECT * FROM news");
$totalRecords = mysqli_query($conn, "SELECT * FROM news");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);
?>
<header class="header">
    <?php include "./header.php"; ?>
    </header>
    <main>
        <div class="content">
        <div class="menu-toggle new1" onclick="toggleMenu1()"><i class="fa-solid fa-layer-group"></i></div>
            <!-- Sidebar with mobile toggle -->
            <aside class="sidebar">
                <p style="color: rgb(134, 134, 134);"><a href="trangchu.php">Home</a>/Tin tức</p>
                <h2 style="color: #ff6f91; font-size: 130%;">TIN TỨC</h2>
                <ul>
                    <li><a href="#">MAKE UP - MẮT</a></li>
                    <li><a href="#">MAKE UP - MÔI</a></li>
                    <li><a href="#">MAKE UP - MẶT</a></li>
                </ul>
                <div class="promo">
                    <span>ƯU ĐÃI GIẢM 15% CHO ĐƠN HÀNG ĐẦU TIÊN</span>
                </div>

                <div class="under-promo">
                    <h2 style="color: #da4d6e; font-size: 27;">Bài viết liên quan</h2>
                    <?php
                            while($rownews = mysqli_fetch_array($news)){                          
                            ?>          
                        <h3> 
                        <a style="text-decoration: none" title="Liên kết" href = "chitiettintuc.php?news_id=<?=$rownews["news_id"]?>"><?php echo $rownews["news_title"] ?></a>
                        </h3>
                        <p><?php echo $rownews["publish_date"] ?></p>
                        <?php } ?>
                </div>
            </aside>
            <section class="blog-grid">
                <div class="row">
                    <?php
                            while($row = mysqli_fetch_array($products)){                          
                            ?>          
                        <div class="col span-1-of-3">
                            <article class="post">
                            <a href = "chitiettintuc.php?news_id=<?=$row["news_id"]?>">
                                <img src="../../assets/img/NEWS/<?php echo $row["news_img"] ?>" alt="<?php echo $row["news_img"] ?>" alt="new1"></a>
                                <h2>
                                <a href = "chitiettintuc.php?news_id=<?=$row["news_id"]?>"><?php echo $row["news_title"] ?></a>
                                </h2>
                                <a href = "chitiettintuc.php?news_id=<?=$row["news_id"]?>" class="btn">Đọc thêm</a>
                            </article>
                            </div> 
                            <?php } ?>
                        </div>
                </div>
                <div class="page-item-container">
                    <?php include "./pagnition.php"; ?>
                </div>
            </section>
        </div>
    </main>
</body>
<footer>
<?php include "./footer.php"; ?>
</footer>

</html>
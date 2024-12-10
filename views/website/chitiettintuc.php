<!DOCTYPE html>
<html>

<head>
    <title>Polidoll - Chi tiết sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/chitiettintuc.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/chitiettintuc_queries.css">
    <script src="../../assets/js/chitiettintuc.js"></script>
</head>

<body>
<?php
include "../../config/connect.php";
if (!isset($_GET['news_id']) || empty($_GET['news_id'])) {
    // Nếu SKU không tồn tại, chuyển hướng về trang sản phẩm hoặc hiển thị thông báo
    echo "ID không hợp lệ hoặc không được cung cấp.";
    exit;
}
$news_id = mysqli_real_escape_string($conn, $_GET['news_id']); // Escape để tránh SQL Injection
$result = mysqli_query($conn, "SELECT * FROM news WHERE news_id = '$news_id'");
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Không tìm thấy sản phẩm với ID đã cung cấp.";
    exit;
}
$news = mysqli_fetch_assoc($result);
$newdetails = mysqli_query($conn, "SELECT * FROM news");
?>
<header class="header">
    <?php include "./header.php"; ?>
    </header>
    <section>
        <div class="container">
            <div class="main-content">
                <h1><?=$news["news_title"]?></h1>
                <div class="content">
                <p><?=$news["news_content"]?><p>    
                </div>
                <a href="news.php" class="back-button">Quay lại </a>
            </div>
            <div class="sidebar">
                <h3>Bài viết thường đọc</h3>
                <ul>
                    <?php
                            while($rownews = mysqli_fetch_array($newdetails)){                          
                            ?>     
                    <li>     
                        <a style="text-decoration: none" title="Liên kết" href = "chitiettintuc.php?news_id=<?=$rownews["news_id"]?>"><?php echo $rownews["news_title"] ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
</body>
<footer>
<?php include "./footer.php"; ?>
</footer>
</html>
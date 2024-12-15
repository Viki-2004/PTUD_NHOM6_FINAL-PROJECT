<?php
// // Kết nối tới cơ sở dữ liệu
// include '../../config/connect.php';
// // echo "<pre>";
// // print_r($_POST); // Kiểm tra dữ liệu form
// // echo "</pre>";
// // Xử lý thêm hoặc chỉnh sửa tin tức
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
//     $news_title = $_POST['news_title'];
//     $publish_date = $_POST['publish_date'];
//     $news_content = $_POST['news_content'];
//     $news_content = $_POST['news_content'];
//     $action = $_POST['action'];

//     // Xử lý file upload
//     $news_img = '';
//     if (!empty($_FILES['news_img']['name'])) {
//         $news_img = basename($_FILES['news_img']['name']);
//         $target_dir = '../../assets/img/NEWS/';
//         $target_file = $target_dir . $news_img;

//         // Di chuyển file đến thư mục chỉ định
//         if (!move_uploaded_file($_FILES['news_img']['tmp_name'], $target_file)) {
//             echo "<script>alert('Có lỗi khi upload ảnh!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
//             exit();
//         }
//     }

//     if ($action === 'edit') {
//         // Chỉnh sửa tin tức
//         if (!empty($_POST['news_id'])) {
//         $news_id = $_POST['news_id'];

//         // Kiểm tra nếu không upload ảnh mới thì giữ ảnh cũ
//         if (empty($news_img)) {
//             $sql = "UPDATE news SET news_title = ?, publish_date = ?, news_content = ?, id_admin = ? WHERE news_id = ?";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param("sssii", $news_title, $publish_date, $news_content, $id_admin, $news_id);
//         } else {
//             $sql = "UPDATE news SET news_title = ?, publish_date = ?, news_content = ?, news_img = ?, id_admin = ? WHERE news_id = ?";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param("ssssii", $news_title, $publish_date, $news_content, $news_img, $id_admin, $news_id);
//         }

//         if ($stmt->execute()) {
//             echo "<script>alert('Cập nhật tin tức thành công!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
//             exit();
//         } else {
//             echo "<script>alert('Có lỗi xảy ra khi cập nhật tin tức!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
//             exit();
//         }}
//         else {
//             // Thêm tin tức mới
//             $sql = "INSERT INTO news (news_title, publish_date, news_content, news_img, id_admin) VALUES (?, ?, ?, ?, ?)";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param("ssssi", $news_title, $publish_date, $news_content, $news_img, $id_admin);

//             if ($stmt->execute()) {
//                 echo "<script>alert('Thêm tin tức thành công!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
//                 exit();
//             } else {
//                 echo "<script>alert('Có lỗi xảy ra khi thêm tin tức!'); window.location.href='../../views/admin/quanlytintuc.php';</script>";
//                 exit();
//             }
//             $stmt->close();
//         }}
// }

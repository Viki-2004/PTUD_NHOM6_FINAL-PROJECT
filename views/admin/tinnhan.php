<?php
include('../../config/connect.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $contact_name = ($_POST['contact_name']);
    $contact_email = ($_POST['contact_email']);
    $contact_phone = ($_POST['contact_phone']);
    $contact_content = ($_POST['contact_content']);
    $action = $_POST['action'];

    if (!empty($contact_name) && !empty($contact_email) && !empty($contact_phone) && !empty($contact_content)) {
        $sql = "INSERT INTO contact (contact_name, contact_email, contact_phone, contact_content) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssss", $contact_name, $contact_email, $contact_phone, $contact_content);
            if ($stmt->execute()) {
                echo "<script>
                        alert('Tin nhắn đã được gửi thành công!');
                        window.location.href = '../../views/website/lienhe.php'; 
                      </script>";
            } else {
                echo "<script>
                        alert('Đã xảy ra lỗi: " . addslashes($stmt->error) . "');
                        window.history.back(); 
                      </script>";
            }
            $stmt->close();
        } else {
            echo "<script>
                    alert('Lỗi chuẩn bị truy vấn: " . addslashes($conn->error) . "');
                    window.history.back(); 
                  </script>";
        }
    } else {
        // Hiển thị thông báo nếu các trường bị trống
        echo "<script>
                alert('Vui lòng nhập đầy đủ thông tin!');
                window.history.back(); 
              </script>";
    }
}

// Thực thi truy vấn SELECT để lấy dữ liệu
$sql = "SELECT * FROM contact";
$result = $conn->query($sql);
?>

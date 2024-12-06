<?php
// Nhập dữ liệu
    $insert = "
        INSERT INTO admin (admin_account, password)
        VALUES
        ('admin', 'admin123');

        INSERT INTO user (user_id, user_name, user_email, user_phone, user_password)
        VALUES
        ('kim2904', 'kim29042004@gmail.com', '0377123486', 'kim2904');

        INSERT INTO category (category_name)
        VALUES
        ('Trang điểm mắt'),
        ('Trang điểm môi'),
        ('Trang điểm mmặt');

        INSERT INTO news (news_title, publish_date, news_content,news_img, id_admin)
        VALUES
        ('Hướng Dẫn Cách Check Nước Hoa Chính Hãng Đơn Giản Nhất', '2024-12-03', 'Việc lựa chọn nước hoa chính hãng không chỉ giúp bạn tận hưởng hương thơm đúng chuẩn mà còn đảm bảo an toàn khi sử dụng. Hiện nay hàng giả tràn lan trên thị trường, người tiêu dùng cần lưu ý một số chi tiết để phân biệt thật - giả. Dưới đây là những cách đơn giản giúp bạn nhận biết và phân biệt nước hoa chính hãng, xem ngay nhé!', 'news1.png', 1),
        ('Có Nên Đắp Cà Chua Trực Tiếp Lên Mặt Không?', '2024-1-02', 'Đắp cà chua trực tiếp lên mặt đang trở thành một xu hướng chăm sóc da tự nhiên ngày càng phổ biến. Tuy nhiên, liệu phương pháp này có đem lại lợi ích thực sự cho làn da của bạn hay không? Trong bài viết này, chúng ta sẽ khám phá cách đắp cà chua trực tiếp lên mặt có thể mang lại cho bạn làn da khỏe mạnh và rạng rỡ.', 'news2.png', 1),
        ('Cách Nhận Biết Da Khô Và 1 Số Mẹo Cải Thiện Cho Làn Da Khô', '2024-12-10', 'Việc xác định loại da là vô cùng quan trọng trong quá trình chăm sóc da, sẽ giúp bạn lựa chọn sản phẩm dưỡng da phù hợp làm tăng hiệu quả dưỡng da. Tham khảo bài viết về cách nhận biết da khô và 1 số mẹo cải thiện cho da khô. ', 'news3.png', 1),
        ('Vitamin E Là Gì? Vitamin E Nào Tốt Cho Da Mặt', '2024-11-20', 'Vitamin E thường có trong thành phần mỹ phẩm giúp hỗ trợ chăm sóc da, vitamin E giúp ngăn ngừa các vết thâm nám, ngăn ngừa hóa tình lão hóa da. Vậy Vitamin E nào tốt cho da mặt? Xem ngay bài viết dưới đây nhé!', 'news4.png', 1),
        ('Review Lăn Khử Mùi Etiaxil Có Những Loại Nào? Có Tốt Không?', '2024-6-12', 'Lăn khử mùi Etiaxil là một trong những sản phẩm ngăn mùi hiệu quả và được yêu thích rộng rãi trên thị trường hiện nay. Đặc biệt, với khả năng kiểm soát mồ hôi tối ưu, Etiaxil đã trở thành sản phẩm được lựa chọn nhiều nhất hiện nay. Vậy sản phẩm lăn khử mùi Etiaxil có những loại nào? Có tốt không? Hãy cùng Hasaki khám phá công dụng và khả năng ngăn mùi của từng loại để lựa chọn sản phẩm phù hợp nhất nhé!', 'news5.png', 1);
        )";

        //Kiểm tra kết nối
        if ($conn->multi_query($insert)){
        do {
            if ($conn->errno) {
                echo "Lỗi: " .$conn->error. "<br>";
            }
        } while ($conn->next_result());
        echo "Nhập dữ liệu thành công";
        } else {
        echo "Nhập dữ liệu thất bại!";
        }
?>
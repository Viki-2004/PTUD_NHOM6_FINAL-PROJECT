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
        );

        INSERT INTO product_img (img_url, sku)
        VALUES
        ('imge01.png', 'E01'),
        ('01imge01.png', 'E01'),
        ('02imge01.png', 'E01'),
        ('03imge01.png', 'E01'),
        ('01imge02.png', 'E02'),
        ('02imge02.png', 'E02'),
        ('03imge02.png', 'E02'),
        ('04imge02.png', 'E02'),
        ('01e03.png', 'E03'),
        ('02e03.png', 'E03'),
        ('03e03.png', 'E03'),
        ('e0401.png', 'E04'),
        ('e0402.png', 'E04'),
        ('e0403.png', 'E04'),
        ('e0404.png', 'E04'),
        ('e0501.png', 'E05'),
        ('e0502.png', 'E05'),
        ('e0503.png', 'E05'),
        ('e0504.png', 'E05'),
        ('l0101.png', 'L01'),
        ('l0102.png', 'L01'),
        ('l0103.png', 'L01'),
        ('l0201.png', 'L02'),
        ('l0202.png', 'L02'),
        ('l0203.png', 'L02'),
        ('l0301.png', 'L03'),
        ('l0302.png', 'L03'),
        ('l0303.png', 'L03'),
        ('l0304.png', 'L03'),
        ('l0401.png', 'L04'),
        ('l0402.png', 'L04'),
        ('l0403.png', 'L04'),
        ('01f01.png', 'F01'),
        ('02f01.png', 'F01'),
        ('03f01.png', 'F01'),
        ('01f02.png', 'F02'),
        ('02f02.png', 'F02'),
        ('03f02.png', 'F02'),
        ('04f02.png', 'F02'),
        ('01f03.png', 'F03'),
        ('02f03.png', 'F03'),
        ('03f03.png', 'F03'),
        ('04f03.png', 'F03'),
        ('01f04.png', 'F04'),
        ('02f04.png', 'F04'),
        ('03f04.png', 'F04'),
        ('01f05.png', 'F05'),
        ('02f05.png', 'F05'),
        ('03f05.png', 'F05'),
        ('04f05.png', 'F05'),
        ('01f06.png', 'F06'),
        ('02f06.png', 'F06'),
        ('03f06.png', 'F06'),
        ('04f06.png', 'F06');
        
        INSERT INTO product (sku, product_name, product_price, product_description, product_quantity, trending, new_arrival, id_category)
            VALUES
            ('F01', 'Liquid Blush - Sport Chic', '201.000 đ', 'Liquid Blush - Sport Chic là một sản phẩm má hồng dạng lỏng giúp tạo nên làn da tươi sáng, tự nhiên với sắc hồng nhẹ nhàng. Với kết cấu mịn màng, dễ tán và bám lâu, sản phẩm này mang đến vẻ ngoài rạng rỡ và khỏe khoắn như vừa tham gia một buổi tập thể thao. Chất liệu lâu trôi giúp bạn tự tin suốt cả ngày dài.', 15, TRUE, FALSE, 003),
            ('F02', 'Stereo Face Cosmetic Disc', '255.000 đ', 'Stereo Face Cosmetic Disc là một sản phẩm đa năng dành cho những ai yêu thích sự tiện lợi trong việc trang điểm. Với thiết kế nhỏ gọn, sản phẩm kết hợp các chức năng trang điểm cho khuôn mặt như kem nền, phấn phủ và má hồng, giúp bạn dễ dàng tạo nên lớp nền hoàn hảo chỉ trong vài bước. Chất liệu mịn màng giúp lớp trang điểm bền lâu và không bị xỉn màu suốt cả ngày.', 45, FALSE, TRUE, 003),
            ('F03', '2 in 1 Blush Highlight Palette', '230.000 đ', 'Bộ phấn má hồng và highlighter 2 trong 1 này giúp bạn dễ dàng tạo ra vẻ đẹp tươi tắn và rạng ngời chỉ với một sản phẩm. Phấn má hồng mang lại sắc hồng tự nhiên, trong khi highlighter giúp làm sáng các vùng xương gò má, mang đến làn da sáng khỏe. Được thiết kế nhỏ gọn, tiện lợi, bạn có thể mang theo để sử dụng mọi lúc mọi nơi.', 60, TRUE, FALSE, 003),
            ('F04', 'YOYO STACKABLE Multi-Use Balm', '150.000 đ', 'YOYO STACKABLE Multi-Use Balm là một loại kem dưỡng đa năng có thể sử dụng cho môi, má và da, giúp cung cấp độ ẩm và làm dịu da. Với thiết kế xếp chồng thông minh, bạn có thể mang theo nhiều màu sắc và công dụng khác nhau để sử dụng dễ dàng trong mọi tình huống. Kem dưỡng này giúp bạn có làn da mềm mượt và luôn đầy sức sống.', 23, FALSE, TRUE, 003),
            ('F05', 'Essence Eye and Lip Makeup Remover', '300.000 đ', 'Essence Eye and Lip Makeup Remover là sản phẩm tẩy trang dịu nhẹ dành riêng cho vùng mắt và môi. Công thức nhẹ nhàng nhưng hiệu quả giúp loại bỏ hoàn toàn lớp trang điểm mà không làm khô da. Dù là mascara chống thấm nước hay son lâu trôi, sản phẩm này vẫn dễ dàng tẩy sạch, mang lại cảm giác tươi mới và không gây kích ứng.', 20, TRUE, FALSE, 003),
            ('F06', '2 IN 1 Highlighter Contour Palette', '267.000 đ', 'Bộ phấn highlighter và contour 2 trong 1 giúp bạn tạo nên đường nét khuôn mặt sắc sảo và rạng ngời. Phấn contour giúp làm sâu các đường nét, tạo độ sắc nét cho khuôn mặt, trong khi highlighter giúp tạo điểm nhấn và ánh sáng cho những vùng cao của khuôn mặt. Thiết kế tiện dụng giúp bạn dễ dàng mang theo để chỉnh sửa và làm đẹp bất cứ khi nào.', 40, FALSE, FALSE, 002),
            ('L01', 'Ice Watery Lip Gloss', '175.000 đ', 'Ice Watery Lip Gloss là son dưỡng bóng môi với kết cấu lỏng mát lạnh, mang đến cảm giác dịu nhẹ và tươi mới cho đôi môi. Sản phẩm giúp dưỡng ẩm sâu, tạo lớp bóng mượt mà không gây dính, đồng thời làm mềm môi, giữ cho đôi môi luôn căng mọng và đầy đặn. Với công thức trong suốt và màu sắc nhẹ nhàng, Ice Watery Lip Gloss có thể dùng một mình hoặc kết hợp với son môi để tạo hiệu ứng đôi môi sáng bóng, tươi tắn cả ngày dài.', 22, FALSE, TRUE, 002),
            ('L02', 'Hearty Lip Tint', '199.000 đ', 'Hearty Lip Tint là son tints với màu sắc lâu trôi, mang lại đôi môi gợi cảm và tự nhiên. Công thức nhẹ nhàng và mịn màng giúp son dễ dàng thẩm thấu vào môi, tạo hiệu ứng màu sắc tươi tắn và bền lâu. Sản phẩm không làm khô môi, đồng thời cung cấp độ ẩm, giữ cho môi luôn mềm mại và căng mọng. Hearty Lip Tint là lựa chọn hoàn hảo cho những ai yêu thích sự tự nhiên nhưng vẫn muốn đôi môi nổi bật suốt cả ngày.', 45, FALSE, FALSE, 002),
            ('L03', 'Sweety Lip Jelly', '201.000 đ', 'Sweety Lip Jelly là son dưỡng dạng jelly với kết cấu mịn màng và dễ tán, mang lại cảm giác ngọt ngào và tươi mới cho đôi môi. Sản phẩm cung cấp độ ẩm tối ưu, giúp môi mềm mại, mịn màng suốt cả ngày mà không lo bị khô hay bong tróc. Sweety Lip Jelly có màu sắc nhẹ nhàng, trong suốt, lý tưởng để tạo ra vẻ đẹp tự nhiên hoặc làm lớp nền cho các sản phẩm môi khác. Chất son nhẹ và không dính giúp bạn thoải mái sử dụng mọi lúc mọi nơi.', 60, TRUE, FALSE, 002),
            ('L04', 'Mirror Tea Jelly Light Lip Glaze', '255.000 đ', 'Mirror Tea Jelly Light Lip Glaze là son dưỡng bóng với kết cấu jelly mịn màng, mang lại độ sáng bóng tự nhiên cho đôi môi. Với thành phần từ trà nhẹ nhàng và các dưỡng chất thiên nhiên, sản phẩm giúp bảo vệ và chăm sóc môi, đồng thời tạo hiệu ứng màu sắc nhẹ nhàng và tươi tắn. Mirror Tea Jelly Light Lip Glaze dễ dàng tán đều trên môi, không gây bết dính và duy trì độ bóng suốt cả ngày, mang đến đôi môi căng mọng, sáng khỏe.', 23, FALSE, FALSE, 002),
            ('E01', '3D Curling Eyelash Iron Mascara', '230.000 đ', 'Biến đôi mắt của bạn thành tâm điểm thu hút với 3D Curling Eyelash Iron Mascara! Sản phẩm được thiết kế đặc biệt để: Tạo hiệu ứng cong vút 3D: Định hình từng sợi mi với độ cong tự nhiên, giúp đôi mắt thêm quyến rũ. Dài và dày mi tức thì: Công thức tiên tiến mang lại hàng mi dài, dày nhưng vẫn nhẹ nhàng. Chống lem và bền màu: Duy trì vẻ đẹp suốt cả ngày mà không lo bị trôi hay lem. Phù hợp cho mọi loại mi, kể cả mi ngắn hoặc thưa. Với thiết kế đầu chổi độc đáo, sản phẩm dễ dàng chạm tới từng sợi mi, mang lại hiệu quả trang điểm hoàn hảo. Sẵn sàng để tỏa sáng với 3D Curling Eyelash Iron Mascara!', 20, FALSE, FALSE, 001),
            ('E02', 'Ultra-Fine Liquid Eyeliner', '150.000 đ', 'Đường kẻ sắc nét, chính xác từng chi tiết với Ultra-Fine Liquid Eyeliner. Công thức lâu trôi, chống lem giúp bạn tự tin cả ngày dài. Đầu cọ siêu mảnh cho phép tạo kiểu linh hoạt, từ đường kẻ tự nhiên đến mắt mèo đầy ấn tượng. Hoàn hảo cho mọi phong cách trang điểm!', 40, FALSE, TRUE, 001),
            ('E03', 'Mascara Remover', '300.000 đ', 'Mascara Remover là sản phẩm tẩy trang chuyên dụng dành cho mắt, giúp làm sạch mascara và các lớp trang điểm mắt cứng đầu một cách nhẹ nhàng và hiệu quả. Với công thức dịu nhẹ, không gây kích ứng, sản phẩm giúp tẩy sạch mọi vết bẩn mà không làm khô da quanh mắt. Mascara Remover dễ dàng loại bỏ các lớp mascara chống nước, mang lại cảm giác thoải mái và làn da mắt mềm mại, mịn màng. Phù hợp với mọi loại da, đặc biệt là da nhạy cảm.', 44, FALSE, FALSE, 001),
            ('E04', 'Precisely Depicted Slim Gel Eyeliner', '280.000 đ', 'Precisely Depicted Slim Gel Eyeliner là bút kẻ mắt gel mảnh, mang đến đường kẻ sắc nét, chính xác và lâu trôi. Với kết cấu gel mượt mà, sản phẩm dễ dàng lướt trên bầu mắt mà không bị vón cục hay lem. Đầu bút mảnh giúp tạo ra các đường kẻ mỏng hoặc dày tùy ý, cho đôi mắt thêm quyến rũ, sâu sắc. Lý tưởng cho việc tạo nên những nét kẻ mắt tinh tế, sắc sảo, đồng thời giữ màu lâu dài suốt cả ngày mà không cần dặm lại.', 100, TRUE, FALSE, 001),
            ('E05', '18° Ultra-Fine Liquid Eyeliner', '180.000 đ', '18° Ultra-Fine Liquid Eyeliner là bút kẻ mắt lỏng siêu mảnh với đầu cọ cực kỳ tinh tế, cho phép tạo ra những đường kẻ mỏng, sắc nét và chuẩn xác. Sản phẩm có khả năng chống nước, bền màu suốt cả ngày mà không bị phai hay nhòe, giúp đôi mắt luôn rạng rỡ. Dễ dàng sử dụng cho mọi phong cách trang điểm, từ tự nhiên đến cá tính, 18° Ultra-Fine Liquid Eyeliner là lựa chọn lý tưởng cho những ai yêu thích sự hoàn hảo trong từng nét vẽ.', 33, FALSE, TRUE, 001);

        
        ";

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
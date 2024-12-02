// Ẩn hiện mật khẩu
$(document).ready(function() {
    $('#eye').click(function() {
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('open')) {
            $(this).prev().attr('type', 'text');
        } else {
            $(this).prev().attr('type', 'password');
        }
    });

    // Xử lý kiểm tra form khi nhấn nút đăng ký
    $('#form-signup').on('submit', function(e) {
        e.preventDefault(); // Ngăn form gửi đi nếu không hợp lệ

        var isValid = true; // Biến kiểm tra hợp lệ
        var message = "";   // Thông báo lỗi

        // Kiểm tra từng trường trong form
        $('#form-signup .form-input').each(function() {
            var input = $(this);
            var placeholder = input.attr('placeholder');
            if (!input.val().trim()) { // Nếu trường bị bỏ trống
                isValid = false;
                message += placeholder + " không được bỏ trống!\n";
            }
        });

        // Kiểm tra độ dài tên đăng nhập
        var username = $('.form-input[placeholder="Tên đăng nhập"]').val().trim();
        if (username.length < 4 || username.length > 8) {
            isValid = false;
            message += "Tên đăng nhập phải có độ dài từ 4 đến 8 ký tự!\n";
        }

        // Hiển thị thông báo nếu có lỗi
        if (!isValid) {
            alert(message);
            return false; // Dừng form
        }

        // Nếu hợp lệ
        alert("Đăng ký thành công!");
        // Thêm logic gửi dữ liệu lên server tại đây (nếu cần)
    });

    // Xử lý kiểm tra mật khẩu và cập nhật thanh progress bar
    $('.form-input[placeholder="Mật khẩu"]').on('input', function() {
        var password = $(this).val();
        var strength = 0;

        // Kiểm tra từng tiêu chí
        if (password.length >= 8) strength++; // Độ dài tối thiểu
        if (/[0-9]/.test(password)) strength++; // Có số
        if (/[a-z]/.test(password)) strength++; // Có chữ thường
        if (/[A-Z]/.test(password)) strength++; // Có chữ hoa

        // Cập nhật thanh progress bar
        var powerPoint = $('#power-point');
        var colors = ["#D73F40", "#DC6551", "#F2B84F", "#BDE952", "#3ba62f"];
        var widths = ["1%", "25%", "50%", "75%", "100%"];

        powerPoint.css('width', widths[strength]);
        powerPoint.css('background-color', colors[strength]);

        // Hiển thị thông báo
        var messages = [
            "Mật khẩu quá yếu",
            "Mật khẩu yếu",
            "Mật khẩu trung bình",
            "Mật khẩu khá mạnh",
            "Mật khẩu mạnh"
        ];
        $('#password-strength').text(messages[strength]).css('color', colors[strength]);
    });
});

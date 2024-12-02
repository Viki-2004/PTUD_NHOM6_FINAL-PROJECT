document.getElementById('contactform').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn việc gửi form thực sự

    // Lấy dữ liệu từ form
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    // Kiểm tra nếu dữ liệu hợp lệ
    if (name && email && phone && message) {
        alert('Gửi tin nhắn thành công! Cảm ơn bạn đã liên hệ với POLIDOLL.');
    } else {
        alert('Vui lòng điền đầy đủ thông tin trước khi gửi.');
    }
});
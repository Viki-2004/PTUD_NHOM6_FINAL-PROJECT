// Hàm để mở hoặc đóng navbar khi click vào icon menu
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle class 'active' để hiển thị/ẩn navbar
}

document.getElementById('contactform').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn việc gửi form thực sự

    // Lấy dữ liệu từ form
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    // Kiểm tra nếu dữ liệu hợp lệ
    if (name && email && phone && message) {
        alert('Cảm ơn bạn đã liên hệ với LOLIDOLL! Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất');
    } else {
        alert('Vui lòng điền đầy đủ thông tin trước khi gửi.');
    }
});
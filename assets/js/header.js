// Hàm để mở hoặc đóng navbar khi click vào icon menu
function toggleMenu() {
    var navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle class 'active' để hiển thị/ẩn navbar
}

$(document).ready(
    function () {
        // mobile navigation
        // Khi đã sử dụng qua thanh bar này rồi thì bên queries chỗ media = 768 ko sử dụng visibility: hidden nữa mà sử dụng display: none để nó xuất hiện
        $('.mobile-nav-icon').click(
            function(){
                $('.navbar').slideToggle(200);
                // Cái sử dụng click kia là để click vào icon nó xuất hiện đống main-nav
                // Vế if là để khi mình click vào icon thì nó chuyển thành dấu X (fa-times là icon của dấu X)
                if($('.mobile-nav-icon').hasClass('fa-bars')){
                    $('.mobile-nav-icon').addClass('fa-times')
                    $('.mobile-nav-icon').removeClass('fa-bars')
                }
                else{
                    $('.mobile-nav-icon').addClass('fa-bars')
                    $('.mobile-nav-icon').removeClass('fa-times')
                }
            }
        )
    }
)
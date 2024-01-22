<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ??'shop thời trang adidas'?></title>
    <meta name="description" content="<?=$metadesc??'Liên hệ: 0973.333.184 -  Email: sangdeptrai1302@gmail.com - Chuyên cung cấp thời trang Adidas Siêu bền, Rẽ và Còn đẹp mắt, nhiều mẫu mã cho bạn chọn'?>">
    <meta name="keywords" content="<?=$metakey??'Adidas Lê Văn Sáng, Lê Văn Sáng, CEO Lê Văn Sáng, Văn Sáng chuyên thời trang adidas, Adidas buôn lang'?>">
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/bootstrap/css/style.css">
    <link rel="stylesheet" href="public/bootstrap/css/all.min.css">
    <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="public/css/product.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Bắt sự kiện click vào biểu tượng thêm vào giỏ hàng
        $(".add-to-cart").on("click", function (event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

            // Lấy product id từ thuộc tính data
            var productId = $(this).data("product-id");

            // Gửi yêu cầu đến server để thêm sản phẩm vào giỏ hàng (có thể sử dụng Ajax)

            // Cập nhật số lượng trong phần header
            var currentCount = parseInt($(".cart-badge").text());
            $(".cart-badge").text(currentCount + 1);
        });
    });





    window.addEventListener('scroll', function () {
    // Lấy chiều cao hiện tại của thanh cuộn (scroll)
    var scrollHeight = window.scrollY || document.documentElement.scrollTop;

    // Lấy chiều cao của phần header
    var headerHeight = document.querySelector('.top-header').offsetHeight;

    // Kiểm tra nếu chiều cao cuộn lớn hơn chiều cao của header, thêm class 'hidden', ngược lại, loại bỏ class 'hidden'
    if (scrollHeight > headerHeight) {
        document.querySelector('.top-header').classList.add('hidden');
    } else {
        document.querySelector('.top-header').classList.remove('hidden');
    }
});
</script>

<style>
    /* Thêm hiệu ứng transition để tạo hiệu ứng mềm mại khi thay đổi thuộc tính */
.top-header {
    transition: transform 0.3s ease-in-out;
}

/* Khi thêm class 'hidden', di chuyển phần header lên trên (ẩn đi) */
.top-header.hidden {
    transform: translateY(-100%);
}
       @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .top-header {
    margin-bottom: 60px;
}

.marquee-container {
    margin-right: 110px; /* Điều chỉnh giá trị này nếu cần thiết */
    color: white; /* Màu đỏ, bạn có thể thay đổi mã màu tùy thích */
    white-space: nowrap;
    overflow: hidden;
    position: fixed;
    top: 10px;
    left: 0;
    width: 100%;
    background-color: black;
    padding: 10px;
}

        .marquee-text {
            display: inline-block;
            animation: marquee 5s linear infinite; 
            /* Điều chỉnh tốc độ chạy và thời gian chạy */
        }
    </style>

</head>
<body>

<section class="logo-search  py-3">
<div class="top-header ">
<marquee class="marquee-container" behavior="scroll" direction="left">
 <a>ahihi</a>  
</marquee>
</div>
    <div class="row align-items-center">
        <!-- Logo -->
        <div class="col-md-2 text-center">
            <a href="index.php"><img src="public/images/logoa.png" alt="Logo Adidas" width="150"></a>
        </div>

        <!-- Ô Tìm kiếm -->
        <div class="col-md-2 text-center">
            <form method="post">
                <div class="input-group mb-3 pt-2">
                    <input id="searchInput" type="text" class="form-control" name="keyword" placeholder="Tìm kiếm sản phẩm" aria-label="Tìm kiếm sản phẩm" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="timkiem input-group-text" id="basic-addon2">
                            <i style="height: 30px; margin-left: 10px; justify-content: center;" class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5 text-center">
        <?php require_once('views/frontend/mod-mainmenu.php');?>
        </div>
        <!-- Biểu tượng -->
        <div class="col-md-3 text-center">
            <div class="row">
                <div class="col">
                    <a href="index.php?option=cart" class="btn position-relative">
                        <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                            <span  class="visually-hidden">unread messages</span>
                        </span>
                        <p>giỏ hàng</p>
                    </a>  
                </div>
                <div class="col">
                    <a href="index.php?option=contact" class="btn position-relative">
                        <i class="fa-solid fa-headphones"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        <p>liên hệ</p>
                    </a>                                
                </div>
                <div class="col">
                    <?php if (isset($_SESSION['logincustomer'])): ?>
                        <a href="index.php?option=customer&f=logout" class="btn position-relative"><i class="fa-sharp fa-solid fa-user"></i>
                            <p>Đăng xuất</p>
                        </a>
                    <?php else: ?>
                        <a href="index.php?option=customer&f=login" class="btn position-relative"><i class="fa-sharp fa-solid fa-user"></i>
                            <p>Tài khoản</p>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

        <!--kết thúc phần logo-->



        
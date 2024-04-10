<?php
$userLogin = null;
if (isset($_COOKIE['user'])) {
    $userCookie = $_COOKIE['user'];

    $userLogin = unserialize($userCookie);
}


// Chuyển đổi chuỗi đã serialize thành mảng

?>
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right flex flex-row items-center">
                <?php
                if ($userLogin) {
                    if ($userLogin["vai_tro"] == 1) {
                        echo "<a href='/admin/don_hang'
                        class='inline-block rounded-md border border-transparent bg-indigo-400 px-4 py-2 text-base font-medium text-white hover:bg-opacity-75'>Admin Manager</a>";
                    }
                    echo "<div class='relative ml-3'>
                    
                            <button type='button' class='-m-1.5 group flex flex-row items-center p-1.5' id='user-menu-button'
                                aria-expanded='false' aria-haspopup='true'>
                                <img class='h-8 w-8 rounded-full bg-gray-50'
                                    src='/upload/" . $userLogin["hinh"] . "'
                                    alt=''>
                                <span class=' lg:flex lg:items-center'>
                                    <span class='ml-4 text-sm font-semibold leading-6 text-gray-900'
                                        aria-hidden='true'>" . $userLogin["ho_ten"] . "</span>
                                    <svg class='ml-2 h-5 w-5 text-gray-400' viewBox='0 0 20 20' fill='currentColor'
                                        aria-hidden='true'>
                                        <path fill-rule='evenodd'
                                            d='M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z'
                                            clip-rule='evenodd' />
                                    </svg>

                                    </span>
                                    <div class='absolute hidden group-hover:!block right-0 top-5 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none'
                                role='menu' aria-orientation='vertical' aria-labelledby='user-menu-button'
                                tabindex='-1'>
                                <!-- Active: 'bg-gray-50', Not Active: ' -->
                                <a href='/site/profile' class='block px-3 py-1 text-sm leading-6 text-gray-900' role='menuitem'
                                    tabindex='-1' id='user-menu-item-0'>Your profile</a>
                                    <a href='/site/orders' class='block px-3 py-1 text-sm leading-6 text-gray-900' role='menuitem'
                                    tabindex='-1' id='user-menu-item-0'>Đơn hàng</a>
                                <a href='/site/tai_khoan?logout' class='block px-3 py-1 text-sm leading-6 text-gray-900' role='menuitem'
                                    tabindex='-1' id='user-menu-item-1'>Sign out</a>
                            </div>
                            </button>

                            
                        </div>";
                } else {


                    echo "<a href='/site/tai_khoan/index.php?login'
                        class='inline-block rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-base font-medium text-white hover:bg-opacity-75'>Sign
                        in</a>
                    <a href='/site/tai_khoan/index.php?signup'
                        class='inline-block rounded-md border border-transparent bg-white px-4 py-2 text-base font-medium text-indigo-600 hover:bg-indigo-50'>Sign
                        up</a>";
                }


                ?>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form method="post" action="/site/search/index.php?searchkey">
                            <input class="input focus-visible:outline-none" name="key" id="key" placeholder="Tìm kiếm">
                            <button class="search-btn" type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <?php
                        if ($userLogin) { ?>
                            <div>
                                <a href="../favourite/favourite_product.php?yeu_thich">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Danh Sách Yêu Thích</span>
                                    <div class="qty"></div>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="dropdown">
                            <a href="/site/checkout/index.php?cart_check">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ Hàng</span>

                            </a>

                        </div>

                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="../trang_chu/index.php">Trang chủ</a></li>
                    <li><a href="../hang_hoa/store.php?san_pham">Sản phẩm</a></li>
                    <li><a href="../trang_chu/index.php?lien_he">Liên hệ</a></li>
                    <li><a href="../tin_tuc/list_tin_tuc.php?list_tin_tuc">Tin tức</a></li>
                    <li><a href="../trang_chu/index.php?gioi_thieu">Giới thiệu</a></li>

                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
</header>
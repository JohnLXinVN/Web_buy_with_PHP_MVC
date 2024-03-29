<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <script src="demoValidation.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" /> -->
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/content/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/content/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="/content/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/content/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/content/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/content/css/style.css" />


</head>


<style>
    label.error {
        color: red;
    }

    .example_text {
        white-space: nowrap;
        /* Ngăn văn bản xuống dòng */
        overflow: hidden;
        /* Ẩn phần văn bản vượt qua khung */
        text-overflow: ellipsis;
        /* Hiển thị dấu ba chấm */
    }

    .disabled {
        pointer-events: none;
        color: gray;
        text-decoration: none;
        cursor: not-allowed;
    }

    .padding {
        padding: 10px 20px;
    }

    .custom-button:hover {
        background-color: #FF1493;
    }

    .product-old-price {
        margin-left: 10px;
    }

    .add-to-cart {
        background-color: #FFC0CB !important;
    }
</style>

<body>

    <?php
    require("header.php");
    ?>

    <?php
    require($VIEW_NAME)
    ?>



    <!-- More people... -->

    <?php
    require("footer.php");
    ?>

</body>

<script src="/content/js/jquery.min.js"></script>
<script src="/content/js/bootstrap.min.js"></script>
<script src="/content/js/slick.min.js"></script>
<script src="/content/js/nouislider.min.js"></script>
<script src="/content/js/jquery.zoom.min.js"></script>
<script src="/content/js/main.js"></script>
<script src="/content/js/app.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('.sub-btn').click(function(){
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });
        });
</script>

</html>
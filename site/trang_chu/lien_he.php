<script>
    $().ready(function () {
        $("#them_lien_he").validate({
            onfocusout: true,
            onkeyup: true,
            onclick: true,
            rules: {
                "ho_ten": {
                    required: true,
                },
                "email": {
                    required: true,
                },
                "message": {
                    required: true,
                }
            },
            messages: {
                "ho_ten": {
                    required: "Bắt buộc nhập Họ Tên",
                },
                "email": {
                    required: "Bắt Buộc Nhập Email"
                },
                "message": {
                    required: "Bắt Buộc Nhập Lời Nhắn",
                }
            }
        });
    });

</script>
<?php
$userLogin = null;
if (isset($_COOKIE['user'])) {
    $userCookie = $_COOKIE['user'];
    $userLogin = unserialize($userCookie);
}
$ma_kh = $userLogin !== null ? $userLogin['ma_kh'] : 0;

// Kiểm tra xem liên hệ đã được gửi thành công hay chưa
$lienHeDaGui = false;
if (isset($_GET['btn_gui_lh'])) {
    $hoTen = $_POST['ho_ten'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $ma_kh = $_POST['ma_kh'];
    
    $lienHeDaGui = true;
}
?>
<section class="mb-4 padding" style="position: relative;">
    <div class="background-image" style="background-image: url('/content/images/content.jpg'); background-size: cover; background-position: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.5;"></div>
    <div class="container">
        <h2 class="h1-responsive font-weight-bold text-center my-4 text-black" style="font-size: 2.5rem; color: #333; text-transform: uppercase;">Contact Us</h2>
        <p class="text-center w-responsive mx-auto mb-5 text-black">Do you have any questions? Please do not hesitate to contact us directly. Our team will get back to you within a matter of hours to help you.</p>

        <div class="row justify-content-center">
            <!--Grid column-->
            <div class="col-md-6 mb-md-0 mb-5">
                <?php if ($lienHeDaGui) : ?>
                    <p class="text-center text-success">Cảm ơn bạn đã liên hệ!</p>
                <?php else : ?>
                    <form name="lien_he" id="them_lien_he" action="index.php?btn_gui_lh" method="POST">
                        <input type="hidden" id="ma_kh" name="ma_kh" value="<?= $ma_kh ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ho_ten" class="text-black">Họ Tên</label>
                                    <input type="text" id="ho_ten" name="ho_ten" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="text-black">Email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message" class="text-black">Ý Kiến</label>
                                    <textarea id="message" name="message" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input class="btn btn-primary" name="btn_gui_lh" type="submit" value="Gửi">
                            </div>
                        </div>

                    </form>
                <?php endif; ?>
            </div>

            <div class="col-md-6 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x text-white"></i>
                        <p class="text-white">Trịnh Văn Bô</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x text-white"></i>
                        <p class="text-white">+ 01 234 567 89</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x text-white"></i>
                        <p class="text-white">contact@mdbootstrap.com</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Tin tức</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Blank</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="tin-tuc">
                <?php
                foreach ($listt as $tintuc) {
                ?>
                    <div class="o1">
                        <a href="../tin_tuc/tin_tuc.php?id_tin_tuc=<?= $tintuc['id_tin_tuc'] ?>">
                            <img src="/upload/<?= $tintuc['hinh'] ?>" alt="">
                        </a>
                        <h3><?= $tintuc['tieu_de'] ?></h3>
                        <p><?= $tintuc['mo_ta'] ?></p>
                        <a class="primary-btn cta-btn" href="../tin_tuc/tin_tuc.php?id_tin_tuc=<?= $tintuc['id_tin_tuc'] ?>">Xem thêm</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
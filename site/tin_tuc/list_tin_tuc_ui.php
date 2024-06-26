<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <div class="form-wrapper">
            <form action="../tin_tuc/list_tin_tuc.php?list_tin_tuc" method="POST" id="form_danh_muc" class="form">
                <div class="form-container">
                    <label for="danh_muc" class="form-label">Tên Danh Mục:</label>
                    <div class="form-group">
                        <select name="danh_muc" id="danh_muc" class="form-select">
                            <option value="all">All</option>
                            <?php
                            foreach ($ds_dm as $category) {
                                echo "<option value='{$category['id']}' >{$category['ten_danh_muc']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Lọc" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="grid grid-cols-3 gap-4">
                <?php
                foreach ($listt as $tintuc) {
                ?>
                    <div class="col-span-1 flex flex-col justify-between">
                        <div>
                            <a href="../tin_tuc/tin_tuc.php?id_tin_tuc=<?= $tintuc['id_tin_tuc'] ?>">
                                <img src="/upload/<?= $tintuc['hinh'] ?>" alt="">
                            </a>
                            <h3>
                                <?= $tintuc['tieu_de'] ?>
                            </h3>
                            <p>
                                <?= $tintuc['mo_ta'] ?>
                            </p>
                        </div>
                        <a class="primary-btn cta-btn mt-4 block" href="../tin_tuc/tin_tuc.php?id_tin_tuc=<?= $tintuc['id_tin_tuc'] ?>">Xem thêm</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
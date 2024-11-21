<style>
    body {
        background-color: #f8f9fa;
    }

    .form-wrapper {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 50px auto;
    }

    .form-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border-radius: 8px 8px 0 0;
        text-align: center;
    }
</style>
<div class="main-content">
    <div class="content-wrapper">
        <?php
        if (isset($_SESSION['success'])) {
            if ($_SESSION['success']) {
        ?>
                <div class="notification alert px-5" style="box-shadow: 2px 2px green; color: green;border:1px solid green">
                    <i class="fa-solid fa-circle-check"></i><?php echo $_SESSION['error']; ?>
                </div>
            <?php
            } else {
            ?>
                <div class="notification alert px-5" style="box-shadow: 2px 2px red; color: #940000; border:1px solid red">
                    <i class="fa-solid fa-triangle-exclamation"></i><?php echo $_SESSION['error']; ?>
                </div>
        <?php
            }
            unset($_SESSION['success'], $_SESSION['error']);
        }
        ?>
        <div class="container">
            <div class="form-wrapper">
                <div class="form-header">
                    <h4>Edit Banner</h4>
                </div>
                <form action="?role=admin&controller=banner&action=update" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="BannerName" class="form-label">Banner_id</label>
                        <input value="<?php echo $bannerDetail['banner_id']; ?>" type="text" class="form-control" id="banner_id" placeholder="Enter Banner name" name="banner_id" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner Image URL</label>
                        <img width="100px" src="uploads/<?php echo $bannerDetail['banner_link']; ?>" alt="">
                        <input type="file" class="form-control" name='banner_link' id="banner_link">
                    </div>
                    <div class="mb-3">
                        <label for="count">Count</label>
                        <input type="number" class="form-control" value="<?= $bannerDetail['count'] ?>" name="count">
                    </div>
                    <!-- Nút Submit -->
                    <button type="submit" name="btn-edit-banner" class="btn btn-primary w-100">Edit Banner</button>
                </form>

            </div>
            <a href="?role=admin&controller=banner">Quay lại trang danh sách</a>
        </div>

    </div>
</div>
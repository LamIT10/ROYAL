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

    .form-preview img {
        max-width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
    }
</style>

<div class="main-content">
    <div class="content-wrapper">
        <?php
        if (isset($_SESSION['success'])) {
            if ($_SESSION['success']) {
        ?>
                <div class="notification alert px-5" style="box-shadow: 2px 2px green; color: green; border:1px solid green">
                    <i class="fa-solid fa-circle-check"></i><?php echo $_SESSION['message']; ?>
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
                    <h4>Add New Banner</h4>
                </div>
                <form action="?role=admin&controller=banner&action=store" method="POST" enctype="multipart/form-data">
                    <label for="banner">Banner</label>
                    <input type="file" name="banner_link">
                    <button type="submit" name="btn-add-banner" class="btn btn-primary w-100">Thêm Banner</button>
                </form>
            </div>

            <a href="?role=admin&controller=banner">Quay lại trang danh sách</a>
        </div>
    </div>
</div>
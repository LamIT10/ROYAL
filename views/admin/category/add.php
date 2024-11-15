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
                    <i class="fa-solid fa-circle-check"></i><?php echo $_SESSION['message']; ?>
                </div>
            <?php
            } else {
            ?>
                <div class="notification alert px-5" style="box-shadow: 2px 2px red; color: #940000; border:1px solid red">
                    <i class="fa-solid fa-triangle-exclamation"></i><?php echo $_SESSION['message']; ?>
                </div>
        <?php
            }
            unset($_SESSION['success'], $_SESSION['message']);
        }
        ?>
        <div class="container">
            <div class="form-wrapper">
                <div class="form-header">
                    <h4>Add New Category</h4>
                </div>
                <form action="?role=admin&controller=category&action=store" method="post" enctype="multipart/form-data">
                    <!-- Tên Danh Mục -->
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" placeholder="Enter category name" name="category_name">
                    </div>

                    <!-- Danh Mục Cha -->
                    <div class="mb-3">
                        <label for="parentCategory" class="form-label">Parent Category</label>
                        <select class="form-select" id="parentCategory" name="parent_id">
                            <option value="" hidden selected>Chọn danh mục cha</option>
                            <?php
                            foreach ($category as $key => $value) : ?>
                                <option value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!-- Banner -->
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner Image URL</label>
                        <input type="file" class="form-control" name="banner" id="banner">
                    </div>

                    <!-- Nút Submit -->
                    <button type="submit" name="btn-add-category" class="btn btn-primary w-100">Add Category</button>
                </form>

            </div>
            <a href="?role=admin&controller=category">Quay lại trang danh sách</a>
        </div>

    </div>
</div>
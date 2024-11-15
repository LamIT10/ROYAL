
<div class="main-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Chi tiết danh mục: <?php echo $category['category_name']; ?></h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">ID danh mục:</label>
                            <input type="text" class="form-control" value="<?php echo $category['category_id']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Parent ID:</label>
                            <input type="text" class="form-control" value="<?php echo $category['parent_id']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Tên danh mục:</label>
                            <input type="text" class="form-control" value=" <?php echo $category['category_name']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Thời gian tạo:</label>
                            <input type="text" class="form-control" value="<?php echo $category['create_at']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Thời gian cập nhật:</label>
                            <input type="text" class="form-control" value="<?php echo $category['update_at']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Trạng thái:</label>
                            <input type="text" class="form-control <?php echo $category['status'] ? 'text-success' : 'text-danger'; ?>" value="Hoạt động" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Banner:</label>
                            <div class="d-flex align-items-center">
                                <img src="uploads/nen1.jpg" alt="Banner" class="img-thumbnail me-2" style="width: 100px; height: 100px; object-fit: cover;">
                                <span>nen1.jpg</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary me-2"><a class="text-white text-decoration-none" href="?role=admin&controller=category">Quay lại</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
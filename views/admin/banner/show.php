<div class="main-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Chi tiết banner</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label class="form-label">ID Banner:</label>
                            <input type="text" class="form-control" value="<?php echo $banner['banner_id']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Banner:</label>
                            <div class="d-flex align-items-center">
                                <img src="uploads/<?= $banner['banner_link'] ?>" alt="Banner" class="img-thumbnail me-2" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Thời gian tạo:</label>
                                <input type="text" class="form-control" value="<?php echo $banner['create_at']; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Thời gian cập nhật:</label>
                                <input type="text" class="form-control" value="<?php echo $banner['update_at']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Trạng thái:</label>
                                <input type="text" class="form-control <?php echo $banner['status'] ? 'text-success' : 'text-danger'; ?>" value="Hoạt động" readonly>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary me-2"><a class="text-white text-decoration-none" href="?role=admin&controller=banner">Quay lại</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi tiết bình luận</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Người dùng</th>
                            <th scope="col">Thời gian tạo</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Đánh giá</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $key => $value) {
                        ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $value['full_name'] ?></td>
                                <td><?= $value['create_at'] ?></td>
                                <td><?= $value['content'] ?></td>
                                <td><?= $value['rating'] ?> <i class="fa-solid fa-star text-warning"></i></td>
                                <td><a onclick="confirm('Ban có chắc chắn xoá bình luận này?')" href="?role=admin&controller=comment&action=delete&id=<?= $value['comment_id'] ?>" class="btn btn-danger">Xoá</a></td>
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
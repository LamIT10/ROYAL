<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý danh mục sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Giảm giá</th>
                            <th>Số lượng</th>
                            <th>Giá nhỏ nhất</th>
                            <th>Mô tả</th>
                            <th colspan="2">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($voucher as $key => $item) : ?>

                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $item['voucher_code'] ?></td>
                                <td><?= number_format($item['discount']) . " VNĐ"  ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= number_format($item['min_price']) . " VNĐ" ?></td>
                                <td><?= $item['description'] ?></td>
                                <td class="action-btns">
                                    <a href="?role=admin&controller=voucher&action=edit&id=<?= $item['voucher_id'] ?>">
                                        <button class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn xoá danh mục này không?')" href="?role=admin&controller=voucher&action=delete&id=<?= $item['voucher_id'] ?>">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
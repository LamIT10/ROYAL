<style>
    body {
        background-color: #f8f9fa;
    }

    .table-wrapper {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table-title {
        margin-bottom: 15px;
    }

    .modal-header {
        background-color: #007bff;
        color: #fff;
    }

    .action-btns .btn {
        margin-right: 5px;
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

        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách banner</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Banner_link</th>
                                    <th>Create_at</th>
                                    <th>Update_at</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($banner as $key => $item) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?> </td>
                                        <td><img src="uploads/<?= $item['banner_link'] ?>" alt="Banner" width="80px"></td>
                                        <td><?= $item['create_at'] ?></td>
                                        <td><?= $item['update_at'] ?></td>
                                        <td><?= $item['count'] ?></td>
                                        <td class="action-btns">
                                            <a href="?role=admin&controller=banner&action=edit&id=<?= $item['banner_id'] ?>">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Bạn có muốn xóa banner không?')" href="?role=admin&controller=banner&action=delete&id=<?= $item['banner_id'] ?>">
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div cl>
                </div>

            </div>
            <a href="?role=admin&controller=banner&page=2">>></a>
        </div>




    </div>
</div>


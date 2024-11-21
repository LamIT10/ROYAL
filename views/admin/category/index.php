<div class="container-fluid">
    <style>
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

            <div class="container mt-1">
                <div class="p-3 border">
                    <div class="table-title d-flex justify-content-between align-items-center">
                        <h2>Manage <b>Categories</b></h2>
                        <a href="?role=admin&controller=category&action=add">
                            <button class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Category
                            </button>
                        </a>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
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
                                                    <th>Category Name</th>
                                                    <th>Parent Id</th>
                                                    <th>Status</th>
                                                    <th>Banner</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($category as $key => $item) : ?>

                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $item['category_name'] ?></td>
                                                        <td><?= $item['parent_id'] ? $item['parent_id'] : 'Root' ?></td>

                                                        <td class="<?php echo $item['status'] == 1 ? 'text-success' : 'text-danger' ?>"><?= $item['status'] == 1 ? 'Active' : 'Inactive' ?> </td>
                                                        <td><?php
                                                            echo ($item['banner']) ? " <img src='uploads/" . $item['banner'] . "' width='100px'>" : 'Empty';
                                                            ?></td>
                                                        <td class="action-btns">
                                                            <a href="?role=admin&controller=category&action=edit&id=<?= $item['category_id'] ?>">
                                                                <button class="btn btn-info btn-sm">
                                                                    <i class="fa fa-pencil-alt"></i>
                                                                </button>
                                                            </a>
                                                            <a onclick="return confirm('Các danh mục con của danh mục này cũng sẽ bị xoá, bạn có chắc chắn không?')" href="?role=admin&controller=category&action=delete&id=<?= $item['category_id'] ?>">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                            <a href="?role=admin&controller=category&action=show&id=<?= $item['category_id'] ?>">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </button>
                                                            </a>
                                                            <a href="?role=admin&controller=category&action=changeStatus&id=<?= $item['category_id'] ?>&status=<?= $item['status'] ?>">
                                                                <button class="btn btn-secondary btn-sm">
                                                                    <i class="fa fa-ban"></i> <?php echo $item['status'] == 1 ? 'disable' : 'enable' ?>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <a href="?role=admin&controller=category&page=2">>></a>
                                    </div>
                                </div>
                            </div>

                </div>
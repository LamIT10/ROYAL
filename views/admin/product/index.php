<?php
// var_dump($product['image_main']);
// echo "<br>";
// echo "<br>";
// var_dump($category);
?>
<div class="container-fluid">

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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>View</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th colspan="4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product as $key => $item) : ?>

                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $item['product_name'] ?></td>
                                <td><?= $item['product_view'] ?></td>

                                <td><?= $item['category_name'] ?></td>
                                <td><?php
                                    echo " <img class='rounded border' src='uploads/" . $item['image'] . "' width='100px'>";
                                    ?></td>
                                <td class="action-btns">
                                    <a href="?role=admin&controller=product&action=edit&id=<?= $item['product_id'] ?>">
                                        <button class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Các biển thể của sản phẩm này cũng sẽ bị xoá, bạn có chắc chắn không?')" href="?role=admin&controller=product&action=delete&id=<?= $item['product_id'] ?>">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="?role=admin&controller=product&action=show&id=<?= $item['product_id'] ?>">
                                        <button class="btn btn-primary btn-sm">
                                            View variants
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="?role=admin&controller=product&action=changeStatus&id=<?= $item['product_id'] ?>&status=<?= $item['status'] ?>">
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
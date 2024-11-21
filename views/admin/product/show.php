<?php
echo "<pre>";
$variant = $list;
// $imageString = $variant[1]['image_urls'];

// $imageArray = explode(",", $imageString);
// var_dump($variant);
// var_dump($imageArray);
echo "</pre>";
?>
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
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách biến thể của sản phẩm</h6>
            <a href="?role=admin&controller=product&action=addVariant&id=<?= $_GET['id'] ?>">Thêm biến thể</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image Main</th>
                            <th>Image Add</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($variant as $key => $item) :
                            $imageArray = explode(",", $item['image_urls']);
                        ?>

                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><span><img class="mb-2 mr-2 rounded border" src="uploads/<?= $item['image_main'] ?>" width="90px"></span></td>
                                <td><?php
                                    foreach ($imageArray as $key => $image) {
                                        echo "<span><img  class='mb-2 mr-2 rounded border' src='uploads/" . $image . "' width='60px'></span>";
                                    }
                                    ?></td>
                                <td><?= number_format($item['base_price']) ?></td>
                                <td><?= number_format($item['sale_price']) ?></td>
                                <td><?= $item['color_name'] ?></td>
                                <td><?= $item['size_name'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td class="action-btns d-flex flex-row gap-2">
                                    <a class="mr-2" href="?role=admin&controller=product&action=editVariant&id=<?= $item['variant_id'] ?>&product_id=<?= $_GET['id'] ?>">
                                        <button class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc chắn không?')" href="?role=admin&controller=product&action=deleteVariant&id=<?= $item['variant_id'] ?>&product_id=<?= $_GET['id'] ?>">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
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
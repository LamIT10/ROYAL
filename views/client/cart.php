<?php
// var_dump($cart);
// $_SESSION['cart'] = [];
$total = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    // die;
    if ($_POST['check'] == 'on') {

        $_SESSION['cart']["$_POST[detail_id]"] = $_POST['detail_id'];
    } else {
        unset($_SESSION['cart']["$_POST[detail_id]"]);
    }
}
$count = count($_SESSION['cart']) > 1 ? '(' . count($_SESSION['cart']) . ')' : '';
var_dump($_SESSION['cart']);
?>
<div class="container my-2">
    <h4 class="bg-white py-3 px-4">Giỏ hàng</h4>

    <div class="row">
        <!-- Cột thông tin giỏ hàng -->
        <div class="col-8 cart ">
            <?php foreach ($cart as $key => $value) : ?>
                <div class="">

                    <!-- Sản phẩm trong giỏ -->
                    <div class="card mb-2 py-3">

                        <div class="row g-0">
                            <form action="" method="post" class="col-md-1 d-flex align-items-center">
                                <input type="hidden" name="detail_id" value="<?= $value['detail_id'] ?>">
                                <input type="hidden" name="check" value="off">
                                <input <?php if (in_array($value['detail_id'], $_SESSION['cart'])) echo "checked" ?> onchange="this.form.submit()" type="checkbox" name="check" class="form-check-input ms-2">
                            </form>
                            <div class="col-md-2">
                                <img src="uploads/<?= $value['image_main'] ?>" class="img-fluid border" alt="Sản phẩm">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body h-100 d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="card-title fs-6"><?= $value['product_name'] ?></h5>
                                        <p class="text-danger fs-6 mb-0"><b><?= number_format($value['sale_price']) ?> VNĐ </b><del class="text-secondary"><?= number_format($value['base_price']) ?> VNĐ</del></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-light text-dark"><?= $value['color_id'] ?> <?= $value['size_id'] ?></span>
                                        <div class="ms-auto">
                                            <button class="btn btn-outline-success btn-sm"><i class="fa-solid fa-minus"></i></button>
                                            <span class="mx-2"><?= $value['quantity_cart'] ?></span>
                                            <button class="btn btn-outline-success btn-sm"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                        <a href="?controller=cart&action=delete&id=<?= $value['detail_id'] ?>" class="btn btn-outline-danger btn-sm ms-3">Delete</a>
                                        <a id="btn-edit" href="?controller=cart&action=edit&id=<?= $value['detail_id'] ?>" class="btn btn-outline-primary btn-sm ms-3">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                if (in_array($value['detail_id'], $_SESSION['cart'])) {
                    $total += $value['sale_price'] * $value['quantity_cart'];
                }
            endforeach; ?>
        </div>

        <!-- Cột chi tiết đơn hàng -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chi tiết đơn hàng</h5>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between">
                            <span>Tổng giá trị sản phẩm:</span>
                            <strong><?= number_format($total) . " VNĐ" ?></strong>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Vận chuyển:</span>
                            <strong>20.000 đ</strong>
                        </li>
                        <?php
                        if ($total > 500000) {
                        ?>
                            <li class="d-flex justify-content-between text-success">
                                <span>Giảm giá vận chuyển:</span>
                                <strong>-20.000 đ</strong>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <hr>
                    <div class="d-flex justify-content-between fs-5">
                        <strong>Tổng thanh toán:</strong>
                        <strong>
                            <?php
                            if ($total > 500000) {
                                echo number_format($total - 20000) . " VNĐ";
                            } else {
                                echo number_format($total) . " VNĐ";
                            }
                            ?>
                        </strong>
                    </div>
                    <button  class="btn btn-warning w-100"><a href="?controller=checkout">Mua hàng <?= $count ?></a></button>
                    <p class="mt-3 text-center">
                        <a href="#" class="text-primary">Chọn Voucher giảm giá ở bước tiếp theo</a>
                    </p>
                    <div class="text-center mt-2">
                        <img src="https://via.placeholder.com/200x50" alt="Thanh toán" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
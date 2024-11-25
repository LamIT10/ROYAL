<?php

?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Đơn hàng của bạn</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Tổng tiền</th>
                            <th>Cập nhật lần cuối</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listOrder as $key => $item) : ?>

                            <tr>
                                <td><?= $key + 1 ?> </td>
                                <td><?php
                                    if ($item['payment_method'] == 0) {
                                        echo "Thanh toán COD";
                                    } else if ($item['payment_method'] == 1) {
                                        echo "Thanh toán VNPAY";
                                    }
                                    ?></td>
                                <td><?php
                                    if ($item['payment_status'] == 0) {
                                        echo "<p class='text-danger'>Chưa thanh toán</p>";
                                    } else if ($item['payment_status'] == 1) {
                                        echo "<p class='text-success'>Đã thanh toán</p>";
                                    }
                                    ?></td>
                                <td>
                                    <?php
                                    if ($item['order_status'] == 0) {
                                        echo "<span>Chờ xác nhận</span>";
                                    }
                                    if ($item['order_status'] == 1) {
                                        echo "<span>Chờ lấy hàng</span>";
                                    }
                                    if ($item['order_status'] == 2) {
                                        echo "<span>Đang vận chuyển</span>";
                                    }
                                    if ($item['order_status'] == 3) {
                                        echo "<span>Giao hàng thành công</span>";
                                    }
                                    ?>
                                </td>
                                <td><?= number_format($item['final_price']) . " VNĐ" ?></td>
                                <td><?= $item['update_at'] ?></td>
                                <td class="action-btns">
                                    <?php
                                    if ($item['order_status'] == 0) {
                                        echo '<a class="m-2 d-block" href="?role=admin&controller=order&action=buttonChangeStatus&status=' . $item['order_status'] . '&id=' . $item['order_id'] . '">
                                        <button class="btn btn-success btn-sm">
                                            Xác nhận đơn hàng
                                        </button>
                                    </a>';
                                    } else if ($item['order_status'] == 1) {
                                        echo '<a class="m-2 d-block" href="?role=admin&controller=order&action=buttonChangeStatus&status=' . $item['order_status'] . '&id=' . $item['order_id'] . '">
                                        <button class="btn btn-warning btn-sm">
                                           Bắt đầu giao hàng
                                        </button>
                                    </a>';
                                    } else if ($item['order_status'] == 2) {
                                        echo '<a class="m-2 d-block" href="?role=admin&controller=order&action=orderSuccess&status=' . $item['order_status'] . '&id=' . $item['order_id'] . '">
                                        <button class="btn btn-success btn-sm">
                                           Xác nhận giao thành công
                                        </button>
                                    </a>';
                                    }
                                    ?>

                                </td>
                                <td><a class="m-2 d-block" href="?role=admin&controller=order&action=show&id=<?= $item['order_id'] ?>">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div cl>
        </div>

    </div>
    <a href="?role=admin&controller=banner&page=2">>></a>
</div>
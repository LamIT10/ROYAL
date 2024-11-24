<style>
    .nav-tabs .nav-link {
        color: #555;
        font-weight: bold;
        border: none;
        min-width: 150px;
    }

    .nav-tabs .nav-link.active {
        color: #ff5a5f;
        border-bottom: 5px solid #ff5a5f;
    }

    .order-item {
        border-bottom: 1px solid #ddd;
        padding: 15px 0;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 6px;
    }

    .order-item .price {
        color: #ff5a5f;
        font-weight: bold;
    }

    .order-item .original-price {
        text-decoration: line-through;
        color: #999;
    }

    .order-item .status {
        color: #ff5a5f;
        font-size: 0.9rem;
        font-weight: bold;
    }

    th {
        padding: 8px 20px 8px 5px;
    }
</style>
<?php
// var_dump($listOrder);
?>
<div class="container py-4 bg-white mt-5" style="width:80%">
    <!-- Header -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">Đơn Hàng</h2>
        <p class="text-muted">Quản lý và theo dõi trạng thái đơn hàng của bạn</p>
    </div>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs justify-content-between mb-4" id="order-tabs">

        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#0">Chờ xác nhận</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#1">Chờ lấy hàng</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#2">Đang vận chuyển</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#3">Đánh giá</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#4">Đã hủy</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#5">Lịch sử mua hàng</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
        <!-- Tất cả -->
        <div class="tab-pane fade" id="5">
            <?php
            foreach ($listOrder as $key => $value)
                if ($value['order_status'] == 5) {
            ?>
                <div class="order-item d-flex align-items-center">
                    <img src="https://via.placeholder.com/80" alt="Product">
                    <div class="ms-3">
                        <h6 class="fw-bold mb-1">Áo phông freesize Unisex</h6>
                        <p class="mb-1">Phân loại: Màu trắng</p>
                        <div class="d-flex justify-content-between">
                            <span class="price">50,000đ</span>
                            <span class="original-price">70,000đ</span>
                        </div>
                    </div>
                    <span class="ms-auto status">Chờ thanh toán</span>
                </div>
            <?php
                }
            ?>
        </div>

        <!-- Chờ thanh toán -->
        <div class="tab-pane fade show active" id="0">
            <?php
            foreach ($listOrder as $key => $value)
                if ($value['order_status'] == 0) {
            ?>
                <div class="order-item d-flex align-items-center">
                    <table>
                        <tr>
                            <th>Mã đơn hàng: </th>
                            <td>ROYAL_<?= $value['order_id'] ?></td>
                        </tr>
                        <tr>
                            <th>Cập nhật lần cuối: </th>
                            <td><?= $value['update_at'] ?></td>
                        </tr>
                        <tr>
                            <th>Tổng thanh toán: </th>
                            <td><?= number_format($value['final_price']) . " VNĐ" ?></td>
                        </tr>
                    </table>
                    <span class="ms-auto status">Xem chi tiết</span>
                </div>
            <?php
                }
            ?>
        </div>
        <div class="tab-pane fade" id="1">
            <?php
            foreach ($listOrder as $key => $value)
                if ($value['order_status'] == 1) {
            ?>
                <div class="order-item d-flex align-items-center">
                    <table>
                        <tr>
                            <th>Mã đơn hàng: </th>
                            <td>ROYAL_<?= $value['order_id'] ?></td>
                        </tr>
                        <tr>
                            <th>Cập nhật lần cuối: </th>
                            <td><?= $value['update_at'] ?></td>
                        </tr>
                        <tr>
                            <th>Tổng thanh toán: </th>
                            <td><?= number_format($value['final_price']) . " VNĐ" ?></td>
                        </tr>
                    </table>
                    <span class="ms-auto status">Xem chi tiết</span>
                </div>
            <?php
                }
            ?>
        </div>
        <!-- Vận chuyển -->
        <div class="tab-pane fade" id="2">
            <?php
            foreach ($listOrder as $key => $value)
                if ($value['order_status'] == 2) {
            ?>
                <div class="order-item d-flex align-items-center">
                    <table>
                        <tr>
                            <th>Mã đơn hàng: </th>
                            <td>ROYAL_<?= $value['order_id'] ?></td>
                        </tr>
                        <tr>
                            <th>Cập nhật lần cuối: </th>
                            <td><?= $value['update_at'] ?></td>
                        </tr>
                        <tr>
                            <th>Tổng thanh toán: </th>
                            <td><?= number_format($value['final_price']) . " VNĐ" ?></td>
                        </tr>
                    </table>
                    <span class="ms-auto status">Xem chi tiết</span>
                </div>
            <?php
                }
            ?>
        </div>

        <!-- Hoàn thành -->
        <div class="tab-pane fade" id="3">
            <?php
            foreach ($listOrder as $key => $value)
                if ($value['order_status'] == 3) {
            ?>
                <div class="order-item d-flex align-items-center">
                    <table>
                        <tr>
                            <th>Mã đơn hàng: </th>
                            <td>ROYAL_<?= $value['order_id'] ?></td>
                        </tr>
                        <tr>
                            <th>Cập nhật lần cuối: </th>
                            <td><?= $value['update_at'] ?></td>
                        </tr>
                        <tr>
                            <th>Tổng thanh toán: </th>
                            <td><?= number_format($value['final_price']) . " VNĐ" ?></td>
                        </tr>
                    </table>
                    <span class="ms-auto status">Xem chi tiết</span>
                </div>
            <?php
                }
            ?>
        </div>

        <!-- Đã hủy -->
        <div class="tab-pane fade" id="4">
            <?php
            foreach ($listOrder as $key => $value)
                if ($value['order_status'] == 4) {
            ?>
                <div class="order-item d-flex align-items-center">
                    <table>
                        <tr>
                            <th>Mã đơn hàng: </th>
                            <td>ROYAL_<?= $value['order_id'] ?></td>
                        </tr>
                        <tr>
                            <th>Cập nhật lần cuối: </th>
                            <td><?= $value['update_at'] ?></td>
                        </tr>
                        <tr>
                            <th>Tổng thanh toán: </th>
                            <td><?= number_format($value['final_price']) . " VNĐ" ?></td>
                        </tr>
                    </table>
                    <span class="ms-auto status">Xem chi tiết</span>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
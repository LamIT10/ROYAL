<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet" />
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
    </style>
</head>

<body>
    <header class="border-bottom">
        <div class="bg-dark text-warning py-2 text-center fs-6 fw-semibold">
            <span>ĐỔI HÀNG MIỄN PHÍ - TẠI TẤT CẢ CỬA HÀNG TRONG 30 NGÀY</span>
        </div>
        <div class="container p-3 ">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="https://img.icons8.com/ios/50/000000/online-store.png" alt="Logo" class="bi me-2" width="40" height="40" />
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 fw-semibold" style=" font-size: 14px">

                    <?php
                    foreach ($category as $key => $value) {
                        $id = $value['category_id'];
                        if (!$value['parent_id']) {
                    ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button">
                                    <?php
                                    echo mb_strtoupper($value['category_name']);
                                    ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    foreach ($category as $key => $value) {
                                        if ($value['parent_id'] == $id) {
                                    ?>
                                            <li><a class="dropdown-item fw-semibold" style="font-size: 13px" href="#"><?php echo mb_strtoupper($value['category_name']) ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    <li><a href="#" class="nav-link px-2 link-body-emphasis">KHO VOUCHERS</a></li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <div class="input-group">
                        <input
                            type="search"
                            class="form-control"
                            placeholder="Tìm kiếm"
                            aria-label="Tìm kiếm" />
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <div class="d-flex align-items-center">
                    <a href="#" class="text-dark text-decoration-none me-4 d-flex flex-column align-items-center">
                        <i class="bi bi-shop fs-6"></i>
                        <small style="font-size: 13px">Cửa hàng</small>
                    </a>
                    <a href="#" class="text-dark text-decoration-none me-4 d-flex flex-column align-items-center">
                        <i class="bi bi-person-circle fs-6"></i>
                        <small style="font-size: 13px">Tài khoản</small>
                    </a>
                    <a href="#" class="text-dark text-decoration-none position-relative d-flex flex-column align-items-center">
                        <i class="bi bi-bag fs-6"></i>
                        <small style="font-size: 13px">Giỏ hàng</small>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 0.75em">1</span>
                    </a>
                </div>
            </div>
        </div>

    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
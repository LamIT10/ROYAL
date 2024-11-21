<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #FEEBD0;
            border-right: 1px solid #ddd;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            position: fixed;
            width: calc(100% - 250px);
            left: 250px;
            top: 0;
            height: 60px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 1000;
        }

        .header h1 {
            font-size: 20px;
            margin: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .content-wrapper {
            padding-top: 80px;
            /* Để tránh bị che bởi header */
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            border-radius: 5px;
            z-index: 1000;
            background-color: #ffffff;
            overflow: hidden;
            animation: slideInOut 7s ease-out forwards;
        }

        @keyframes slideInOut {
            0% {
                opacity: 1;
                transform: translateX(100%);
            }

            5% {
                opacity: 1;
                transform: translateX(0);
            }

            70% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                opacity: 0;
                transform: translateX(100%);
            }
        }

        .fa-circle-check,
        .fa-triangle-exclamation {
            margin-right: 15px;
            font-size: 25px;
            border-radius: 3px;
            padding: 5px 7px;
        }

        .fa-circle-check {
            color: green;
            background-color: #d1ffdb;

        }

        .fa-triangle-exclamation {
            color: red;
            background-color: #ffdede;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3">
        <h2 class="mb-4 d-flex align-items-center justify-content-center">
            ROYAL
        </h2>
        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="?role=admin" class="nav-link"><i class="fa fa-home me-2"></i>Home</a>
            </li>
            <li class="nav-item">
                <a href="?role=admin&controller=category" class="nav-link"><i class="fa fa-tachometer-alt me-2"></i>Manage Category</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-shopping-cart me-2"></i>Orders</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-box me-2"></i>Products</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-users me-2"></i>Customers</a>
            </li>
            <li><a href="?role=admin&controller=banner" class="nav-link"><i class="fa fa-tachometer-alt me-2"></i>Banner</a>
            </li>
        </ul>
    </nav>
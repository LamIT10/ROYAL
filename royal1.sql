-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2024 at 07:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royal`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int NOT NULL,
  `banner_link` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint NOT NULL DEFAULT '1',
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_link`, `create_at`, `update_at`, `status`, `count`) VALUES
(1, 'banner_1.webp', '2024-11-12 15:28:28', '2024-11-12 15:28:28', 1, 1),
(2, 'banner_2.webp', '2024-11-12 15:28:28', '2024-11-12 15:28:28', 1, 2),
(3, 'banner_3.webp', '2024-11-12 15:29:21', '2024-11-12 15:29:21', 1, 3),
(4, 'banner_4.webp', '2024-11-12 15:29:21', '2024-11-12 15:29:21', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `detail_id` int NOT NULL,
  `variant_id` int NOT NULL,
  `cart_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint NOT NULL DEFAULT '1',
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `category_name`, `create_at`, `update_at`, `status`, `banner`) VALUES
(1, NULL, 'Nam', '2024-11-10 17:41:23', '2024-11-19 18:03:30', 1, 'banner_3.webp'),
(3, NULL, 'Bé trai', '2024-11-11 07:06:19', '2024-11-17 07:35:41', 1, 'banner_4.webp'),
(4, NULL, 'Bé gái', '2024-11-11 07:06:19', '2024-11-16 13:36:39', 1, 'banner_2.webp'),
(5, 1, 'Áo phông', '2024-11-11 07:52:07', '2024-11-19 18:03:33', 1, ''),
(9, NULL, 'Nữ', '2024-11-14 20:09:38', '2024-11-16 13:10:34', 1, 'banner_1.webp'),
(29, 1, 'Áo gió', '2024-11-17 08:01:26', '2024-11-19 18:03:37', 1, ''),
(30, 9, 'Váy', '2024-11-19 18:04:12', '2024-11-19 18:04:12', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `color_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`, `color_code`) VALUES
(1, 'Trắng', '#ffffff'),
(2, 'Đen', '#000000'),
(3, 'Xanh lục', '#00bd81'),
(4, 'Hồng', '#fca0ff'),
(5, 'Xanh nước biển', '#0059ff');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL,
  `content` text,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_product`
--

CREATE TABLE `favourite_product` (
  `favour_id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `add_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_link`) VALUES
(1, 'aophong1v2c1.webp'),
(3, 'aophong1v3c1.webp'),
(4, 'aophong1v4c1.webp'),
(6, 'aophong1v6c2.webp'),
(7, 'aophong1v7c2.webp'),
(8, 'aophong1v8c2.webp'),
(13, 'nen2.jpg'),
(14, 'nen1.jpg'),
(15, 'diemtotnghiep.jpg'),
(16, 'a11.jpg'),
(17, 'a10.jpg'),
(18, 'chom.jpg'),
(19, 'chom2.jpg'),
(20, 'chom3.jpg'),
(21, '.l.jpg'),
(22, '20475173.jpg'),
(23, 'Anh-lap-nghiep-ten-lua-bay-len.jpg'),
(24, '20475173.jpg'),
(25, 'Anh-lap-nghiep-ten-lua-bay-len.jpg'),
(26, 'anhmoi.jpg'),
(27, 'aogio1v6c2.webp'),
(28, 'aogio1v7c2.webp'),
(29, 'aogio1v8c2.webp'),
(30, 'aogio1v2c1.webp'),
(31, 'aogio1v3c1.webp'),
(32, 'aogio1v4c1.webp'),
(33, 'aogio1v1c1.webp'),
(34, 'aogio1v2c1.webp'),
(35, 'aogio1v3c1.webp'),
(36, 'banner_2.webp'),
(37, 'banner_3.webp'),
(38, 'banner_4.webp'),
(39, 'banner_2.webp'),
(40, 'banner_3.webp'),
(41, 'banner_4.webp'),
(42, 'vovinam.jpg'),
(43, 'snapedit_1700370825343.png'),
(44, 'logo.png'),
(45, '386469071_3548389028713072_3754560561506806944_n.jpg'),
(46, 'anhhientai1.jpg'),
(47, 'nen2.jpg'),
(48, 'diemtotnghiep.jpg'),
(49, 'hh.jpg'),
(50, 'o.jpg'),
(51, 'rong.jpg'),
(52, 'cute-3d-dragon.jpg'),
(53, 'cute-3d-dragon-copy.jpg'),
(54, 'rong.jpg'),
(55, 'a10.jpg'),
(56, 'a11.jpg'),
(57, 'anhhientai1.jpg'),
(58, '386469071_3548389028713072_3754560561506806944_n.jpg'),
(59, 'a6.jpg'),
(60, 'a10.jpg'),
(61, '386469071_3548389028713072_3754560561506806944_n.jpg'),
(62, 'a6.jpg'),
(63, 'a10.jpg'),
(64, 'a10.jpg'),
(65, 'anhhientai1.jpg'),
(66, 'anhhientai1.jpg'),
(67, 'anhmoi.jpg'),
(68, 'a10.jpg'),
(69, 'a11.jpg'),
(70, 'anhhientai1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `image_variant`
--

CREATE TABLE `image_variant` (
  `image_variant_id` int NOT NULL,
  `image_id` int NOT NULL,
  `variant_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `image_variant`
--

INSERT INTO `image_variant` (`image_variant_id`, `image_id`, `variant_id`) VALUES
(2, 1, 1),
(3, 3, 1),
(4, 4, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 1, 3),
(11, 3, 3),
(12, 4, 3),
(13, 1, 4),
(15, 3, 4),
(16, 4, 4),
(31, 27, 12),
(32, 28, 12),
(33, 29, 12),
(34, 30, 13),
(35, 31, 13),
(36, 32, 13),
(37, 33, 14),
(38, 34, 14),
(39, 35, 14),
(61, 61, 16),
(62, 62, 16),
(63, 63, 16),
(70, 68, 10),
(71, 69, 10),
(72, 70, 10);

-- --------------------------------------------------------

--
-- Table structure for table `infor_recept`
--

CREATE TABLE `infor_recept` (
  `infor_id` int NOT NULL,
  `user_id` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `voucher_id` int DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT '"Chờ xác nhận"',
  `final_price` decimal(10,2) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_method` tinyint NOT NULL,
  `payment_status` tinyint NOT NULL DEFAULT '0',
  `infor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int NOT NULL,
  `variant_id` int NOT NULL,
  `order_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_view` int NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `category_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_view`, `description`, `status`, `category_id`, `product_name`, `image`) VALUES
(2, 0, 'Áo phông nam basic dáng regular cổ tròn, có chi tiết đồ họa là điểm nhấn trên sản phẩm.', 1, 5, 'Áo phông nam dáng suông in chữ', 'aophong1v1c1.webp'),
(4, 0, 'hihi', 1, 5, 'Demooo', 'aophong1v6c2.webp'),
(7, 0, 'Áo khoác gió nam 2 lớp, form regular, chống thấm nước, ngăn nước thấm qua vải, thích hợp thời tiết mưa ẩm tại Việt Nam.\r\nVải ít bám bẩn, dễ vệ sinh nhờ tác dụng của lớp tráng chống thấm nước.\r\nKhông nhăn nhàu.', 1, 29, 'Áo khoác gió nam ', 'aogio1v5c2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` tinyint NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Chủ shop'),
(2, 'Nhân viên'),
(3, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` tinyint NOT NULL DEFAULT '3',
  `address` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'avt_default.png',
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role_id`, `address`, `date_of_birth`, `full_name`, `create_at`, `update_at`, `avatar`, `phone`, `email`, `status`) VALUES
(2, 'lamlv10', 'lam', 1, 'Vĩnh Phúc', '2005-10-10', 'Lê Văn Lâm', '2024-11-17 08:25:52', '2024-11-17 08:25:52', 'avt_default.png', '0702024861', 'crislamm10@gmail.com', 1),
(3, 'nguyenvana', 'a', 3, 'Hà Nội', '2000-01-01', 'Nguyễn Văn A', '2024-11-17 08:28:03', '2024-11-20 10:43:04', 'avt_default.png', '0702024862', 'nguyenvana@gmail.com', 1),
(4, 'bnguyen', 'b', 3, 'Hà Nam', '2005-10-10', 'Nguyễn Thị B', '2024-11-17 23:37:43', '2024-11-20 10:43:10', 'avt_default.png', '0702024123', 'nguyenthib@gmail.com', 1),
(5, 'thuhuyen', 'huyen123', 2, 'Vĩnh Phúc', '2005-10-01', 'Nguyễn Thu Huyền', '2024-11-18 21:09:22', '2024-11-20 07:47:49', 'z6022957827600_7237a1f1c6e0698adad66d0c38381fbb.jpg', '0355050666', 'huyen@gmail.com', 1),
(6, 'ngocarot', 'rot1234', 3, 'Nam Định', '2929-04-29', 'Ngô Việt Cà Rốt', '2024-11-18 21:47:59', '2024-11-19 04:13:12', 'aophong1v7c2.webp', '0702024999', 'rot@gmail.com', 1),
(7, 'honghao', 'haohao', 3, 'Nghệ An', '2005-10-21', 'Kim Hồng Hào', '2024-11-19 00:34:40', '2024-11-19 03:49:28', 'z6022957827600_7237a1f1c6e0698adad66d0c38381fbb.jpg', '0987654389', 'hao@gmail.com', 1),
(8, 'levanlam2', 'levanlam2', 3, 'Vĩnh Phúc', '2005-10-10', 'Lê Văn Lâm Trợ Lý', '2024-11-19 01:20:09', '2024-11-20 10:39:04', 'avt_default.png', '0702024998', 'troly@gmail.com', 1),
(9, 'hihi', 'hihihi', 2, '9', '0001-11-01', 'ư', '2024-11-19 02:02:31', '2024-11-20 07:47:51', 'avt_default.png', '0355050666', 'a@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `variant_id` int NOT NULL,
  `product_id` int NOT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `size_id` int NOT NULL,
  `color_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `variant_main` tinyint NOT NULL DEFAULT '0',
  `image_main` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`variant_id`, `product_id`, `base_price`, `sale_price`, `size_id`, `color_id`, `quantity`, `status`, `create_at`, `update_at`, `variant_main`, `image_main`) VALUES
(1, 2, '150000.00', '100000.00', 4, 3, 50, 1, '2024-11-12 17:57:33', '2024-11-21 00:04:49', 1, 'aophong1v1c1.webp'),
(2, 2, '150000.00', '100000.00', 2, 2, 20, 1, '2024-11-12 17:59:22', '2024-11-16 17:48:36', 0, 'aophong1v5c2.webp'),
(3, 2, '150000.00', '100000.00', 3, 3, 20, 1, '2024-11-12 23:08:45', '2024-11-16 17:48:51', 0, 'aophong1v1c1.webp'),
(4, 2, '150000.00', '100000.00', 1, 3, 10, 1, '2024-11-12 23:08:45', '2024-11-16 17:48:58', 0, 'aophong1v1c1.webp'),
(10, 4, '1000.00', '999.00', 4, 3, 1010, 1, '2024-11-16 22:21:50', '2024-11-21 00:56:22', 0, 'anhmoi.jpg'),
(11, 4, '1.00', '1.00', 2, 4, 1, 1, '2024-11-16 22:43:35', '2024-11-17 18:08:05', 0, 'tôm.jfif'),
(12, 7, '250000.00', '200000.00', 1, 2, 30, 1, '2024-11-17 08:05:59', '2024-11-17 08:05:59', 0, 'aogio1v5c2.webp'),
(13, 7, '250000.00', '180000.00', 2, 5, 60, 1, '2024-11-17 08:32:20', '2024-11-17 08:32:20', 0, 'aogio1v1c1.webp'),
(14, 4, '1.00', '1.00', 4, 5, 1, 1, '2024-11-17 09:17:00', '2024-11-21 00:17:19', 0, 'aophong1v6c2.webp'),
(16, 4, '11.00', '10.00', 4, 5, 1, 1, '2024-11-20 02:52:31', '2024-11-20 02:52:31', 0, '1014.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `view_products`
--

CREATE TABLE `view_products` (
  `view_id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `view_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucher_id` int NOT NULL,
  `voucher_code` varchar(255) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `min_price` decimal(10,2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_id`, `voucher_code`, `discount`, `quantity`, `create_at`, `update_at`, `min_price`, `description`) VALUES
(1, 'GIAM100K', '100000.00', 10, '2024-11-21 02:10:39', '2024-11-21 03:38:12', '900000.00', 'Giảm 100k cho đơn hàng trị giá tối thiểu 1 triệu'),
(2, 'GIAM10K', '10000.00', 20, '2024-11-21 02:11:09', '2024-11-21 02:18:35', '80000.00', 'Giảm 10k cho đơn hàng trị giá tối thiểu 80k'),
(5, 'SALE01/12', '100000.00', 100, '2024-11-21 03:54:10', '2024-11-21 03:54:10', '900000.00', 'Mã giảm giá DUY NHẤT ngày 01/12 - Giảm 100K cho đơn hàng từ 900K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`),
  ADD UNIQUE KEY `count` (`count`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `cart_details_ibfk_2` (`cart_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `fk_parent` (`parent_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `favourite_product`
--
ALTER TABLE `favourite_product`
  ADD PRIMARY KEY (`favour_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `image_variant`
--
ALTER TABLE `image_variant`
  ADD PRIMARY KEY (`image_variant_id`),
  ADD KEY `variant_id` (`variant_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `infor_recept`
--
ALTER TABLE `infor_recept`
  ADD PRIMARY KEY (`infor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `voucher_id` (`voucher_id`),
  ADD KEY `orders_ibfk_3` (`infor_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_cate` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `view_products`
--
ALTER TABLE `view_products`
  ADD PRIMARY KEY (`view_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`),
  ADD UNIQUE KEY `voucher_code` (`voucher_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `detail_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_product`
--
ALTER TABLE `favourite_product`
  MODIFY `favour_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `image_variant`
--
ALTER TABLE `image_variant`
  MODIFY `image_variant_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `infor_recept`
--
ALTER TABLE `infor_recept`
  MODIFY `infor_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `variant_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `view_products`
--
ALTER TABLE `view_products`
  MODIFY `view_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_details_ibfk_3` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`variant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_parent` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favourite_product`
--
ALTER TABLE `favourite_product`
  ADD CONSTRAINT `favourite_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image_variant`
--
ALTER TABLE `image_variant`
  ADD CONSTRAINT `image_variant_ibfk_2` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`variant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `image_variant_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `infor_recept`
--
ALTER TABLE `infor_recept`
  ADD CONSTRAINT `infor_recept_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`voucher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`infor_id`) REFERENCES `infor_recept` (`infor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`variant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `variants_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `variants_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `view_products`
--
ALTER TABLE `view_products`
  ADD CONSTRAINT `view_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `view_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

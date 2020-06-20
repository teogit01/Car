-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2020 lúc 07:22 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `car`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars_detail`
--

CREATE TABLE `cars_detail` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mã xe',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên xe',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'hình xe',
  `rental` decimal(10,3) NOT NULL COMMENT 'giá thuê',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT 'trạng thái',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mô tả xe',
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'bản số xe',
  `frame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'số khung',
  `car_type_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'id loại xe',
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'id người dùng',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cars_detail`
--

INSERT INTO `cars_detail` (`id`, `code`, `name`, `image`, `rental`, `status`, `description`, `number`, `frame`, `car_type_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AB', 'Air Blade', '[]', '10.000', 0, NULL, '83C1 - 9999', '1', 1, 1, '2020-04-22 08:40:22', '2020-06-05 04:33:31', NULL),
(2, '455', 'VOIS', '[]', '20.000', 1, NULL, '83C1 - 9998', '1', 2, NULL, '2020-04-30 07:43:21', '2020-06-05 06:24:47', NULL),
(3, 'MqIcQ', 'Exciter', '[\"WceSq_fK9N2_Exciter_Number.png\"]', '10.000', 1, NULL, '65B1-12345', '1', 1, NULL, '2020-06-04 21:05:21', '2020-06-05 06:26:21', NULL),
(4, 'RDlMp', 'Jupiter', '[\"DUMB5_1ahNP_Jupiter-GP-001_Number.png\"]', '10.000', 0, NULL, '65B1--98765', '1', 1, NULL, '2020-06-04 21:06:35', '2020-06-05 05:00:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars_type`
--

CREATE TABLE `cars_type` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mã loại xe',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên loại xe',
  `seating` int(11) NOT NULL COMMENT 'số chỗ ngồi',
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'model',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cars_type`
--

INSERT INTO `cars_type` (`id`, `code`, `name`, `seating`, `model`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'XM', 'Xe máy', 2, '', '2020-04-22 06:56:33', '2020-06-04 21:00:05', NULL),
(2, 'OTO4', 'Ô tô 4 chỗ', 4, '', '2020-06-04 20:57:37', '2020-06-04 20:59:47', NULL),
(3, 'OTO5', 'Ô tô 5 chỗ', 5, '', '2020-06-04 20:59:06', '2020-06-04 20:59:06', NULL),
(4, 'OTO7', 'Ô tô 7 chỗ', 7, '', '2020-06-04 20:59:23', '2020-06-04 20:59:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'id người dùng',
  `service_id` int(10) UNSIGNED NOT NULL COMMENT 'id dịch vụ',
  `car_id` int(10) UNSIGNED NOT NULL COMMENT 'id xe',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `cart_id` int(11) NOT NULL COMMENT 'id User',
  `cart_detail_id` int(11) NOT NULL COMMENT 'id Car',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nội dung bình luận',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'user_id',
  `car_id` int(10) UNSIGNED NOT NULL COMMENT 'car_id',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loại',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Giá trị',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Miêu tả',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên khuyến mãi',
  `start` datetime NOT NULL COMMENT 'thời gian bắt đầu',
  `end` datetime NOT NULL COMMENT 'thời gian kết thúc',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'id người dùng',
  `discount_type_id` int(10) UNSIGNED NOT NULL COMMENT 'id loại khuyến mãi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts_type`
--

CREATE TABLE `discounts_type` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên loại khuyến mãi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts_type`
--

INSERT INTO `discounts_type` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sale 30%', '2020-05-04 20:57:29', '2020-05-04 20:57:45', NULL),
(3, 'Sale 20%', '2020-05-04 20:58:37', '2020-05-04 20:58:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'địa chỉ',
  `user_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('đang chờ','đã liên hệ','đã nhận cọc','đã thanh toán','hoàn thành','hủy') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'đang chờ',
  `grand_total` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `item_count` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` enum('Tiền Mặt','paypal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tiền Mặt',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `name`, `address`, `user_id`, `phone`, `service`, `status`, `grand_total`, `date`, `time`, `item_count`, `is_paid`, `payment_method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tuan Pham', '43 đường 3/2, Xuân Khánh, Ninh kiều, CT', 2, 34567898, NULL, 'hoàn thành', 10, '2020-06-05', '07:00:00', 1, 0, 'Tiền Mặt', '2020-06-05 04:33:31', '2020-06-05 04:33:31', NULL),
(2, 'Tuan Pham', '43 đường 3/2, Xuân Khánh, Ninh Kiều, CT', 2, 123456789, NULL, 'hoàn thành', 20, '2020-06-04', '05:50:00', 1, 0, 'Tiền Mặt', '2020-06-05 04:44:18', '2020-06-05 04:44:18', NULL),
(3, 'Khanh Dang', 'ktx A, đại học Cần Thơ khu 2', 4, 123456789, NULL, 'hoàn thành', 10, '2020-06-03', '09:00:00', 1, 0, 'Tiền Mặt', '2020-06-05 04:50:30', '2020-06-05 04:50:30', NULL),
(4, 'Khanh Dang', 'ktx A, đại học Cần Thơ khu 2', 4, 123456789, NULL, 'hoàn thành', 10, '2020-05-05', '07:00:00', 1, 0, 'Tiền Mặt', '2020-06-05 04:51:46', '2020-06-05 04:51:46', NULL),
(5, 'Chau Anh', 'ktx B, khu 2 đại học Cần Thơ', 3, 123456879, NULL, 'hoàn thành', 20, '2020-05-05', '08:30:00', 1, 0, 'Tiền Mặt', '2020-06-05 05:00:41', '2020-06-05 05:00:41', NULL),
(6, 'Chau Anh', 'khu 2 Đại học Cần Thơ', 3, 123456879, NULL, 'hoàn thành', 40, '2020-05-04', '08:00:00', 2, 0, 'Tiền Mặt', '2020-06-05 05:07:57', '2020-06-05 05:07:57', NULL),
(7, 'Chau Anh', '122 hẻm 51, đường 3/2, Xuân Khánh, Ninh kiều, CT', 3, 33586874, NULL, 'hoàn thành', 20, '2020-04-01', '09:00:00', 1, 0, 'Tiền Mặt', '2020-06-05 06:24:47', '2020-06-05 06:24:47', NULL),
(8, 'Chau Anh', '123 đường 3/2, Xuân Khánh, NK, CT', 3, 23548795, NULL, 'hoàn thành', 10, '2020-03-03', '07:00:00', 1, 0, 'Tiền Mặt', '2020-06-05 06:26:21', '2020-06-05 06:26:21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices_detail`
--

CREATE TABLE `invoices_detail` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `car_detail_id` int(10) UNSIGNED NOT NULL COMMENT 'id xe cụ thể',
  `invoice_id` int(10) UNSIGNED NOT NULL COMMENT 'id phiếu đặt',
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices_detail`
--

INSERT INTO `invoices_detail` (`id`, `car_detail_id`, `invoice_id`, `price`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 10, 1, '2020-06-05 04:33:31', '2020-06-05 04:33:31', NULL),
(2, 2, 2, 20, 1, '2020-06-05 04:44:18', '2020-06-05 04:44:18', NULL),
(3, 3, 3, 10, 1, '2020-06-05 04:50:30', '2020-06-05 04:50:30', NULL),
(4, 4, 4, 10, 1, '2020-06-05 04:57:49', '2020-06-05 04:57:49', NULL),
(5, 4, 5, 10, 2, '2020-06-05 05:00:41', '2020-06-05 05:00:41', NULL),
(6, 3, 6, 10, 1, '2020-06-05 05:07:57', '2020-06-05 05:07:57', NULL),
(7, 4, 6, 10, 3, '2020-06-05 05:07:57', '2020-06-05 05:07:57', NULL),
(8, 2, 7, 20, 1, '2020-06-05 06:24:47', '2020-06-05 06:24:47', NULL),
(9, 3, 8, 10, 1, '2020-06-05 06:26:21', '2020-06-05 06:26:21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2020_03_29_134844_cars_detail_table', 1),
(16, '2020_03_30_063149_users_table', 1),
(17, '2020_03_30_071521_comments_table', 1),
(18, '2020_03_30_072922_cars_type_table', 1),
(19, '2020_04_15_030326_users_type_table', 1),
(20, '2020_04_15_030633_discounts_table', 1),
(21, '2020_04_15_031032_discounts_type_table', 1),
(22, '2020_04_15_032715_carts_table', 1),
(23, '2020_04_15_033301_services_table', 1),
(24, '2020_04_15_035134_invoices_table', 1),
(25, '2020_04_22_141459_statuses_table', 1),
(26, '2020_04_22_141553_invoices_detail_table', 1),
(27, '2020_05_20_092508_create_coupons_table', 1),
(28, '2020_05_29_104708_create_cart_detail_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên dịch vụ',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'giá dịch vụ',
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'id người dùng',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên trạng thái',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên đăng nhập',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mật khẩu',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'họ và tên',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'địa chỉ',
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sdt',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'vai tro admin, user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `address`, `tel`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'khoa', '$2y$10$U7.VhP5ntMkbrlL8yh2WLODmohSYCrTD4h/XYYhU6HgrrsNopeOkq', 'Khoa', NULL, NULL, 'Admin', '2020-05-26 08:15:04', '2020-06-04 21:14:13', NULL),
(2, 'tuanpham', '$2y$10$0MgTQ/c3XW.87NFr6plPEeYCdSKHuQTD4Z3t.L9.d28aev78Qrgc2', 'Tuan Pham', NULL, NULL, 'Cus', '2020-06-04 21:13:45', '2020-06-04 21:14:29', NULL),
(3, 'chauanh', '$2y$10$KYm/xIlZicByHPqb1b5fsuwHw/kOjxUkgrwcCNEvAB4f5cy/6Axhq', 'Chau Anh', NULL, NULL, 'Cus', '2020-06-05 04:46:02', '2020-06-05 04:46:02', NULL),
(4, 'khanhdang', '$2y$10$rRBmcpqNZff7wJPIMOafp.uQxcf1Oxkju7HP8u18PWfTztqS.iepm', 'Khanh Dang', NULL, NULL, 'Cus', '2020-06-05 04:46:30', '2020-06-05 04:46:30', NULL),
(5, 'teo', '$2y$10$3VZbfBLM9E6sJPzN.Lx9FuDcHB6LEG9n8I4vGR7bhvBysS6B3oFxS', 'Teo', NULL, NULL, 'Cus', '2020-06-05 04:46:46', '2020-06-05 04:46:46', NULL),
(8, 'admin', '$2y$10$zL.RJIH.ppNmi8nQzetvi.w7v2AuzgFRV6t28P4c/eBManjBIiiMi', 'Admin', NULL, '0123456789', 'Admin', '2020-06-08 08:26:26', '2020-06-08 08:26:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_type`
--

CREATE TABLE `users_type` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên loại người dùng',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_type`
--

INSERT INTO `users_type` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2020-05-28 06:03:01', '2020-05-28 06:03:01', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cars_detail`
--
ALTER TABLE `cars_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cars_detail_code_unique` (`code`);

--
-- Chỉ mục cho bảng `cars_type`
--
ALTER TABLE `cars_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cars_type_code_unique` (`code`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discounts_type`
--
ALTER TABLE `discounts_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoices_detail`
--
ALTER TABLE `invoices_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Chỉ mục cho bảng `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cars_detail`
--
ALTER TABLE `cars_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cars_type`
--
ALTER TABLE `cars_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `discounts_type`
--
ALTER TABLE `discounts_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `invoices_detail`
--
ALTER TABLE `invoices_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

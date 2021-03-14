-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 14, 2021 lúc 08:09 PM
-- Phiên bản máy phục vụ: 5.7.33-cll-lve
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom6_trasua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`) VALUES
(1, 'Trà sữa'),
(2, 'Nước trái cây'),
(3, 'Topping'),
(4, 'Đồ ăn vặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2021_02_28_091151_hien__taobang__catalogs', 1),
(29, '2021_02_28_091447_hien__taobang__products', 1),
(30, '2021_02_28_091712_hien_taobang__personnels', 1),
(31, '2021_02_28_091812_hien_taobang__transactions', 1),
(32, '2021_02_28_092053_hien_taobang__oderdetails', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oderdetails`
--

CREATE TABLE `oderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `transactions_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personnels`
--

CREATE TABLE `personnels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `start_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `catalogs_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `view` int(11) DEFAULT '0',
  `size` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `catalogs_id`, `name`, `price`, `image_link`, `image_list`, `created_at`, `updated_at`, `view`, `size`, `position`) VALUES
(8, 1, 'sữa dâu tây', 50000, 'images (6).jfif', NULL, '2021-03-14', '2021-03-14 16:09:26', 0, 'M', 0),
(9, 1, 'Yogurt chanh leo', 60000, 'images (2).jfif', NULL, '2021-03-14', '2021-03-14 16:16:56', 0, 'M', 0),
(10, 1, 'Trà sữa đậu đỏ', 55000, 'images (5).jfif', NULL, '2021-03-14', '2021-03-14 16:27:07', 0, 'M', 0),
(11, 2, 'Trà ô long', 45000, 'images (7).jfif', NULL, '2021-03-14', '2021-03-14 16:38:58', 0, 'M', 0),
(12, 1, 'Trà sữa ngầu bọt', 33000, '14381_Trasua.jpg', NULL, '2021-03-14', '2021-03-14 17:26:05', 0, 'S', 0),
(13, 2, 'Trà sữa xoài', 45000, 'chup-anh-tra-sua-concept-dep-2020_0008.jpg', NULL, '2021-03-14', '2021-03-14 17:32:51', 0, 'M', 0),
(14, 1, 'Trà sữa cacao', 46000, 'tra-sua-ding-tea-2.jpg', NULL, '2021-03-14', '2021-03-14 17:33:31', 0, 'M', 0),
(15, 2, 'Trà sữa Chanh', 25000, 'kumquat-lemon-juice_resize.jpg', NULL, '2021-03-14', '2021-03-14 19:11:49', 0, 'M', 0),
(16, 1, 'Trà sữa thạch hoàng gia', 56000, 'tra-sua-da-lat-dingtea.jpg', NULL, '2021-03-14', '2021-03-14 19:12:42', 0, 'M', 0),
(17, 1, 'Trà sữa socola', 45000, 'dingtea-grab-sale.jpg', NULL, '2021-03-14', '2021-03-14 19:14:37', 0, 'M', 0),
(18, 3, 'Nha Đam', 10000, 'tac-dung-phu-cua-nha-dam.jpg', NULL, '2021-03-14', '2021-03-14 19:18:04', 0, 'S', 0),
(19, 3, 'Thạch matcha', 5000, 'thach-tra-sua-thai.jpg', NULL, '2021-03-14', '2021-03-14 19:21:17', 0, 'S', 0),
(20, 3, 'Trân châu đường đen', 10000, '063dae5db60ced9afa271338ee7add13.jpg', NULL, '2021-03-14', '2021-03-14 19:21:43', 0, 'S', 0),
(21, 3, 'Trân châu 3Q', 10000, '1b48bbac3043ee4757491e8ae7feb0f0.jpg', NULL, '2021-03-14', '2021-03-14 19:22:25', 0, 'S', 0),
(22, 3, 'Trân châu sợi', 10000, 'thuong-thuc-tran-chau-soi.-3-1.jpg', NULL, '2021-03-14', '2021-03-14 19:24:41', 0, 'S', 0),
(23, 4, 'xúc xích', 10000, '23416023-1121067948027489-1412957401-n.png', NULL, '2021-03-14', '2021-03-14 19:29:54', 0, 'S', 0),
(24, 4, 'Khô gà lá chanh', 25000, '1554112742-572-thumbnail_schema_article.jpg', NULL, '2021-03-14', '2021-03-14 19:30:37', 0, 'S', 0),
(25, 4, 'Khô bò', 40000, 'cach-lam-thit-bo-kho-10.jpg', NULL, '2021-03-14', '2021-03-14 19:30:54', 0, 'S', 0),
(26, 4, 'Khô heo cháy tỏi', 35000, '66792909-493086658167948-89483-9293-2870-1563443863.jpg', NULL, '2021-03-14', '2021-03-14 19:31:17', 0, 'S', 0),
(27, 4, 'Hướng dương', 15000, 'selenium-1-1920x1080-157996633-1311-6144-1579967859.jpg', NULL, '2021-03-14', '2021-03-14 19:31:32', 0, 'S', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `created_at`, `updated_at`, `position`) VALUES
(1, 'Khải Phạm', 'phamkhai313372@gmail.com', '$2y$10$tbn5RKS.HFdmM5NwiHzXE.V0Xj5YpPH2cDxbQgDaR5p8Q1Ja3rzSy', 'Tha Hóa', '0867828298', '2021-03-07', '2021-03-14', 1),
(3, 'Tiêu Hiền', 'tieuvanhien10a2@gmail.com', '$2y$10$7IhQuDjCERNRilwCiwrBJ.8iDzr6ZUGyJPAXCGr2uX2IUkfSHB4Oi', 'Bắc Giang', '0358198550', '2021-03-12', '2021-03-14', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oderdetails`
--
ALTER TABLE `oderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `oderdetails`
--
ALTER TABLE `oderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

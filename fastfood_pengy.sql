-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 11, 2025 lúc 09:47 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fastfood_pengy`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, '🍗 Chicken'),
(2, '🍔 Burgers'),
(3, '🌭 Sides'),
(4, '🍝 Noodles & Rice'),
(5, '🥤 Beverages'),
(6, '🍨 Desserts');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) ,
  `order_code` varchar(255) NOT NULL,
  `note` text ,
  `status` varchar(100) ,
  `subtotal` decimal(10,2) ,
  `tax_fee` decimal(10,2) ,
  `total` decimal(10,2) ,
  `created_at` datetime ,
  `updated_at` datetime ,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_code`, `note`, `status`, `subtotal`, `tax_fee`, `total`, `created_at`, `updated_at`, `total_price`) VALUES
(7, 1, 'OD1754657360150', '', '0', 10.00, 1.00, 11.00, '2025-08-08 14:49:20', '2025-08-08 14:49:20', 11.00),
(8, 1, 'OD1754657624941', '', '0', 25.00, 2.50, 27.50, '2025-08-08 14:53:44', '2025-08-08 14:53:44', 27.50),
(9, 1, 'OD1754660777700', '', '0', 75.00, 7.50, 82.50, '2025-08-08 15:46:17', '2025-08-08 15:46:17', 82.50),
(10, 1, 'OD1754739328745', '', '0', 80.00, 8.00, 88.00, '2025-08-09 13:35:28', '2025-08-09 13:35:28', 88.00),
(11, 1, 'OD1754739621460', '', '0', 80.00, 8.00, 88.00, '2025-08-09 13:40:21', '2025-08-09 13:40:21', 88.00),
(12, 2, 'OD1754742687107', '', '0', 30.00, 3.00, 33.00, '2025-08-09 14:31:27', '2025-08-09 14:31:27', 33.00),
(13, 2, 'OD1754742797990', '', '0', 30.00, 3.00, 33.00, '2025-08-09 14:33:17', '2025-08-09 14:33:17', 33.00),
(14, 2, 'OD1754743005372', '', '0', 70.00, 7.00, 77.00, '2025-08-09 14:36:45', '2025-08-09 14:36:45', 77.00),
(15, 2, 'OD1754743159793', '', '0', 50.00, 5.00, 55.00, '2025-08-09 14:39:19', '2025-08-09 14:39:19', 55.00),
(16, 2, 'OD1754797407776', '', '0', 235.00, 23.50, 258.50, '2025-08-10 05:43:27', '2025-08-10 05:43:27', 258.50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) ,
  `product_id` int(11) ,
  `price` decimal(10,2) ,
  `quantity` int(11) ,
  `subtotal` decimal(10,2) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `subtotal`) VALUES
(4, 7, 23, 10.00, 1, 10.00),
(5, 8, 21, 25.00, 1, 25.00),
(6, 9, 25, 25.00, 3, 75.00),
(7, 10, 24, 20.00, 4, 80.00),
(8, 11, 24, 20.00, 4, 80.00),
(9, 12, 23, 10.00, 3, 30.00),
(10, 13, 23, 10.00, 3, 30.00),
(11, 14, 23, 10.00, 7, 70.00),
(12, 15, 25, 25.00, 2, 50.00),
(13, 16, 8, 25.00, 2, 50.00),
(14, 16, 15, 30.00, 1, 30.00),
(15, 16, 16, 35.00, 1, 35.00),
(16, 16, 17, 25.00, 1, 25.00),
(17, 16, 20, 25.00, 1, 25.00),
(18, 16, 22, 5.00, 1, 5.00),
(19, 16, 24, 20.00, 2, 40.00),
(20, 16, 25, 25.00, 1, 25.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status_logs`
--

CREATE TABLE `order_status_logs` (
  `id` int(11) NOT NULL,
  `order_id` int(11) ,
  `status` varchar(100) ,
  `changed_at` datetime ,
  `note` text 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `descriptions` text ,
  `thumbnail` varchar(255) ,
  `stock` int(11) DEFAULT 0,
  `category_id` int(11) ,
  `created_at` datetime ,
  `updated_at` datetime 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `descriptions`, `thumbnail`, `stock`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Fried chicken', 30.00, 'Classic crispy chicken, golden-brown and juicy inside.', 'thumb_68927064939f5.jpg', 200, 1, '2025-08-05 22:58:12', '2025-08-08 07:56:10'),
(2, 'Spicy / sweet sauce chicken', 35.00, 'Tender chicken coated in your choice of spicy or sweet sauce.', 'thumb_689272120d0d3.jpg', 150, 1, '2025-08-05 23:05:22', '2025-08-08 07:29:31'),
(3, 'Cheese shaken chicken', 30.00, 'Crunchy chicken tossed in rich, savory cheese powder.', 'thumb_689273462e71a.jpg', 100, 1, '2025-08-05 23:10:30', '2025-08-05 23:10:30'),
(4, 'Fried Chicken Wings', 25.00, 'Crispy wings bursting with flavor, fried to golden perfection.', 'thumb_68927631e53fc.jpg', 100, 1, '2025-08-05 23:22:57', '2025-08-05 23:22:57'),
(5, 'Beef Burger', 25.00, 'Juicy grilled beef patty, fresh veggies, and tangy sauce in a soft bun.', 'thumb_689277c50a160.jpg', 150, 2, '2025-08-05 23:29:41', '2025-08-05 23:29:41'),
(6, 'Chicken Burger', 30.00, 'Crispy or grilled chicken fillet with lettuce, mayo, and cheese.', 'thumb_689278b72a84e.jpg', 200, 2, '2025-08-05 23:33:43', '2025-08-05 23:33:43'),
(7, 'Fish Burger', 25.00, 'Light and flaky fish fillet with tartar sauce and crunchy lettuce.', 'thumb_689279d170c35.jpg', 100, 2, '2025-08-05 23:38:25', '2025-08-05 23:38:25'),
(8, 'Vegetarian Burger', 25.00, 'Plant-based patty with fresh toppings and creamy dressing.', 'thumb_68927a94648ee.jpg', 150, 2, '2025-08-05 23:41:40', '2025-08-05 23:41:40'),
(9, 'French Fries', 30.00, 'Crispy on the outside, fluffy inside. A perfect fast food classic.', 'thumb_68927bb45c266.jpg', 200, 3, '2025-08-05 23:46:28', '2025-08-05 23:46:28'),
(10, 'Cheese Shaken Fries', 28.00, 'French fries coated in delicious cheese powder for extra flavor.', 'thumb_68927cca9c0ab.jpg', 100, 3, '2025-08-05 23:51:06', '2025-08-05 23:51:06'),
(11, 'Mozzarella Sticks', 25.00, 'Gooey melted mozzarella in a golden crispy coating.', 'thumb_68927eaa66af8.jpg', 0, 3, '2025-08-05 23:59:06', '2025-08-05 23:59:06'),
(12, 'Sausages', 30.00, 'Juicy, flavorful sausages grilled or pan-fried to perfection.', 'thumb_68927f34956b5.jpg', 200, 3, '2025-08-06 00:01:24', '2025-08-06 00:01:24'),
(13, 'Stir-Fried Corn', 25.00, 'Sweet corn sautéed with butter and seasoning – a tasty side.', 'thumb_689280c2ce9b1.jpg', 250, 3, '2025-08-06 00:08:02', '2025-08-08 07:29:17'),
(14, 'Spaghetti with Minced Beef/Cream Sauce', 35.00, 'Italian-style pasta with your choice of savory beef or creamy sauce.', 'thumb_6892821eab4f4.jpg', 300, 4, '2025-08-06 00:13:50', '2025-08-08 07:29:12'),
(15, 'Fried Chicken Rice', 30.00, 'Steamed rice served with crispy fried chicken and sauce.', 'thumb_6892835267420.jpg', 250, 4, '2025-08-06 00:18:58', '2025-08-08 07:29:05'),
(16, 'Teriyaki/Spicy Chicken Rice', 35.00, 'Flavorful grilled chicken with teriyaki or spicy sauce over rice.', 'thumb_6892864cd8d1e.jpg', 220, 4, '2025-08-06 00:31:40', '2025-08-08 07:29:01'),
(17, 'Peach Tea', 25.00, 'Refreshing iced tea with the sweet aroma of ripe peaches.', 'thumb_6892873a07f37.jpg', 500, 5, '2025-08-06 00:35:38', '2025-08-08 07:28:57'),
(18, 'Lemon Tea', 25.00, 'Zesty and cool – the perfect drink to quench your thirst.', 'thumb_689287b284a70.jpg', 500, 5, '2025-08-06 00:37:38', '2025-08-08 07:28:52'),
(19, 'Soft Drinks (Pepsi, Coke, 7Up, etc.)', 5.00, 'Classic fizzy drinks to pair with your meal.', 'thumb_6892889468b9f.jpg', 500, 5, '2025-08-06 00:41:24', '2025-08-08 07:28:46'),
(20, 'Milk Tea', 25.00, 'Smooth and creamy black tea with milk – a crowd favorite.', 'thumb_689289081aaf8.jpg', 500, 5, '2025-08-06 00:43:20', '2025-08-08 07:28:41'),
(21, 'Winter Melon Tea', 25.00, 'Sweet and soothing tea with a unique herbal taste.', 'thumb_6892898f2f943.jpg', 500, 5, '2025-08-06 00:45:35', '2025-08-08 07:28:32'),
(22, 'Ice Cream (Cup / Cone)', 5.00, 'Cool, creamy ice cream in a cone or cup – pick your favorite flavor!', 'thumb_68928a273a49d.jpg', 500, 6, '2025-08-06 00:48:07', '2025-08-08 07:28:29'),
(23, 'Flan', 10.00, 'Silky caramel custard dessert that melts in your mouth.', 'thumb_68928a9ab52c4.jpg', 400, 6, '2025-08-06 00:50:02', '2025-08-08 07:56:25'),
(24, 'Small Pastries', 20.00, 'Sweet baked treats – perfect for a light dessert or snack.', 'thumb_68928b3df299e.jpg', 200, 6, '2025-08-06 00:52:45', '2025-08-08 07:56:21'),
(25, 'Pudding', 25.00, 'Soft and creamy pudding, rich in flavor and texture.', 'thumb_68958bc08d57c.jpg', 300, 6, '2025-08-06 00:55:04', '2025-08-08 14:33:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `product_id` int(11) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_url`, `product_id`) VALUES
(1, 'img_68927064945b7.jpg', 1),
(2, 'img_689272120d902.jpg', 2),
(3, 'img_689273462efb6.jpg', 3),
(4, 'img_68927631e5e72.jpg', 4),
(5, 'img_689277c50abe6.jpg', 5),
(6, 'img_689278b72b318.jpg', 6),
(7, 'img_689279d17153a.jpg', 7),
(8, 'img_68927a9465083.jpg', 8),
(9, 'img_68927bb45cbaf.jpg', 9),
(10, 'img_68927cca9cc9f.jpg', 10),
(11, 'img_68927eaa67395.jpg', 11),
(12, 'img_68927f3495e51.jpg', 12),
(13, 'img_689280c2cf247.jpg', 13),
(14, 'img_6892821eac1c7.jpg', 14),
(15, 'img_6892835267bf1.jpg', 15),
(16, 'img_6892864cd97f1.jpg', 16),
(17, 'img_6892873a29ad5.jpg', 17),
(18, 'img_689287b28530b.jpg', 18),
(19, 'img_689288946969e.jpg', 19),
(20, 'img_689289081b0fa.jpg', 20),
(21, 'img_6892898f30034.jpg', 21),
(22, 'img_68928a273b030.jpg', 22),
(23, 'img_68928a9ab5bfa.jpg', 23),
(24, 'img_68928b3df30c7.jpg', 24),
(27, 'img_6895eeb3227ee.jpg', 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) ,
  `product_id` int(11) ,
  `rating` int(11)  CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` text ,
  `created_at` datetime 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) ,
  `recipient_name` varchar(255) ,
  `phone` varchar(50) ,
  `address` text ,
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` datetime 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `address` varchar(255) ,
  `created_at` datetime 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `address`, `created_at`) VALUES
(1, 'Nguyen Tính', 'nguyentrungtritinh2005@gmail.com', '0876211629', '$2y$10$kTK5Ns39zo0nIW11bPeh7uSjFikvX2KndIQtpLIo6s7/K5aEjik6O', 'admin', NULL, '2025-08-08 17:38:07'),
(2, 'Nguyen van A', 'trungtritinh2005@gmail.com', '0326771068', '$2y$10$a7JUIgWjYjlTl7M.TogLS.xKPCHm8Sv3yGKRS1NgCsRVYJSNAtNRa', 'user', NULL, '2025-08-08 17:38:07'),
(3, 'Nguyen van C', 'nguyenvanC@gmail.com', '', '', 'user', NULL, '2025-08-08 17:38:34'),
(6, 'tinhnguyentrung', 'tinhnguyentrung@gmail.com', '0876211768', '$2y$10$tHzUPYBsT/0Tu1rsoAn6p.p9jfeyFGiyGdw6ZaVMjfUbTl.EHN0He', 'user', NULL, '2025-08-08 18:03:14'),
(7, 'trungnguyen', 'trungnguyen@gmail.com', '', '', 'user', NULL, '2025-08-09 19:37:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `order_status_logs`
--
ALTER TABLE `order_status_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `order_status_logs`
--
ALTER TABLE `order_status_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `order_status_logs`
--
ALTER TABLE `order_status_logs`
  ADD CONSTRAINT `order_status_logs_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

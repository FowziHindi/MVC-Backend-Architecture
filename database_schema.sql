-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2026 at 01:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fowhin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `quantity` int(11) NOT NULL,
  `added_at` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `fk_Products` int(11) NOT NULL,
  `fk_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`quantity`, `added_at`, `is_active`, `id`, `fk_Products`, `fk_Users`) VALUES
(1, '2026-03-01', 1, 1, 1, 1),
(1, '2026-03-01', 1, 2, 3, 3),
(2, '2026-03-02', 1, 3, 4, 4),
(1, '2026-03-02', 1, 4, 5, 2),
(1, '2026-03-03', 1, 5, 6, 5),
(1, '2026-03-03', 1, 6, 8, 3),
(1, '2026-03-04', 1, 7, 13, 12),
(3, '2026-03-04', 1, 8, 17, 3),
(1, '2026-03-05', 1, 9, 2, 8),
(1, '2026-03-05', 1, 10, 14, 1),
(1, '2026-03-06', 1, 11, 11, 11),
(1, '2026-03-06', 1, 12, 15, 13),
(2, '2026-03-07', 1, 13, 20, 4),
(1, '2026-03-07', 1, 14, 19, 16),
(1, '2026-03-08', 1, 15, 7, 9),
(1, '2026-03-08', 1, 16, 12, 10),
(1, '2026-03-09', 1, 17, 18, 2),
(1, '2026-03-09', 1, 18, 9, 3),
(1, '2026-03-10', 1, 19, 16, 19),
(1, '2026-03-10', 1, 20, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`, `slug`, `display_order`, `image_url`, `is_active`, `id`) VALUES
('Laptops', 'laptops', 1, '/img/cat_laptops.jpg', 1, 1),
('Gym & Fitness', 'gym-fitness', 2, '/img/cat_gym.jpg', 1, 2),
('Manga & Comics', 'manga', 3, '/img/cat_manga.jpg', 1, 3),
('Finance Books', 'finance-books', 4, '/img/cat_finance.jpg', 1, 4),
('PC Accessories', 'accessories', 5, '/img/cat_acc.jpg', 1, 5),
('Smartphones', 'smartphones', 6, '/img/cat_phones.jpg', 1, 6),
('Audio', 'audio', 7, '/img/cat_audio.jpg', 1, 7),
('Monitors', 'monitors', 8, '/img/cat_monitors.jpg', 1, 8),
('Gaming Consoles', 'consoles', 9, '/img/cat_consoles.jpg', 1, 9),
('Apparel', 'apparel', 10, '/img/cat_apparel.jpg', 1, 10),
('Home Decor', 'home-decor', 11, '/img/cat_home.jpg', 1, 11),
('Kitchen', 'kitchen', 12, '/img/cat_kitchen.jpg', 1, 12),
('Supplements', 'supplements', 13, '/img/cat_supp.jpg', 1, 13),
('Outdoor Gear', 'outdoor', 14, '/img/cat_outdoor.jpg', 1, 14),
('Collectibles', 'collectibles', 15, '/img/cat_collect.jpg', 1, 15),
('Software', 'software', 16, '/img/cat_soft.jpg', 1, 16),
('Networking', 'networking', 17, '/img/cat_net.jpg', 1, 17),
('Cameras', 'cameras', 18, '/img/cat_cam.jpg', 1, 18),
('Storage', 'storage', 19, '/img/cat_storage.jpg', 1, 19),
('Miscellaneous', 'misc', 20, '/img/cat_misc.jpg', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_date` date NOT NULL,
  `total_amount` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `fk_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_date`, `total_amount`, `status`, `shipping_address`, `payment_method`, `id`, `fk_Users`) VALUES
('2026-02-10', 899.99, 'Delivered', 'Dorm 8, Room 304', 'Credit Card', 1, 1),
('2026-02-11', 125, 'Shipped', '123 Main St', 'PayPal', 2, 5),
('2026-02-12', 45.5, 'Processing', '456 Gym Ave', 'Debit Card', 3, 3),
('2026-02-13', 19.98, 'Delivered', '789 Manga Blvd', 'Crypto', 4, 4),
('2026-02-14', 15.99, 'Delivered', '101 Finance Ct', 'Credit Card', 5, 2),
('2026-02-15', 79.99, 'Cancelled', '202 Tech Ln', 'PayPal', 6, 5),
('2026-02-16', 22, 'Shipped', '303 Pump St', 'Credit Card', 7, 3),
('2026-02-17', 250, 'Delivered', '404 Screen Rd', 'Bank Transfer', 8, 12),
('2026-02-18', 35, 'Processing', '505 Heavy St', 'Debit Card', 9, 3),
('2026-02-19', 150, 'Shipped', '606 Sound Ave', 'Credit Card', 10, 1),
('2026-02-20', 29.99, 'Delivered', '707 Click Ln', 'PayPal', 11, 8),
('2026-02-21', 45.99, 'Processing', '808 Port Rd', 'Credit Card', 12, 9),
('2026-02-22', 12.5, 'Shipped', '909 Wealth Way', 'Debit Card', 13, 11),
('2026-02-23', 8.5, 'Delivered', '111 Shaker Ct', 'PayPal', 14, 19),
('2026-02-24', 24.99, 'Processing', '222 Action St', 'Credit Card', 15, 4),
('2026-02-25', 18, 'Delivered', '333 Stretch Blvd', 'Debit Card', 16, 13),
('2026-02-26', 14, 'Shipped', '444 History Ln', 'Credit Card', 17, 2),
('2026-02-27', 39.99, 'Pending', '555 Lens Rd', 'PayPal', 18, 16),
('2026-02-28', 12.99, 'Delivered', '666 Hold St', 'Credit Card', 19, 10),
('2026-03-01', 9.99, 'Shipped', '777 Page Ave', 'Credit Card', 20, 1),
('2026-03-31', 8, 'Delivered', 'jghfj', 'PayPal', 26, 1),
('2026-03-31', 3, 'Cancelled', 'fawdwad', 'Credit Card', 27, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `quantity` int(11) NOT NULL,
  `price_at_purchase` double NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `fk_Orders` int(11) NOT NULL,
  `fk_Return_Requests` int(11) DEFAULT NULL,
  `fk_Products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`quantity`, `price_at_purchase`, `id`, `created_at`, `fk_Orders`, `fk_Return_Requests`, `fk_Products`) VALUES
(1, 899.99, 1, '2026-02-10', 1, NULL, 1),
(1, 125, 2, '2026-02-11', 2, NULL, 2),
(1, 45.5, 3, '2026-02-12', 3, NULL, 3),
(1, 9.99, 4, '2026-02-13', 4, NULL, 4),
(1, 9.99, 5, '2026-02-13', 4, NULL, 10),
(1, 15.99, 6, '2026-02-14', 5, NULL, 5),
(1, 79.99, 7, '2026-02-15', 6, 17, 6),
(1, 22, 8, '2026-02-16', 7, NULL, 8),
(1, 250, 9, '2026-02-17', 8, NULL, 14),
(1, 35, 10, '2026-02-18', 9, NULL, 9),
(1, 150, 11, '2026-02-19', 10, NULL, 13),
(1, 29.99, 12, '2026-02-20', 11, NULL, 7),
(1, 45.99, 13, '2026-02-21', 12, NULL, 12),
(1, 12.5, 14, '2026-02-22', 13, NULL, 11),
(1, 8.5, 15, '2026-02-23', 14, NULL, 17),
(1, 24.99, 16, '2026-02-24', 15, NULL, 20),
(1, 18, 17, '2026-02-25', 16, NULL, 15),
(1, 14, 18, '2026-02-26', 17, NULL, 18),
(1, 12.99, 20, '2026-02-28', 19, NULL, 16),
(2, 0, 24, '0000-00-00', 20, NULL, 9),
(3, 0, 25, '0000-00-00', 20, NULL, 10),
(1, 0, 26, '0000-00-00', 20, NULL, 15),
(1, 0, 35, '0000-00-00', 18, NULL, 19),
(1, 0, 36, '0000-00-00', 18, NULL, 13),
(1, 0, 50, '0000-00-00', 26, NULL, 12),
(1, 0, 53, '0000-00-00', 27, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `device_model` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_Categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `description`, `price`, `stock_quantity`, `sku`, `color`, `device_model`, `id`, `fk_Categories`) VALUES
('Acer Nitro 5 (AN515-85)', 'Gaming Laptop, Core i7, 16GB RAM', 901, 15, 'LT-AN5-01', 'Black', 'AN515-85', 1, 1),
('Lenovo ThinkPad T480', 'Reliable workstation laptop (Refurbished)', 125, 8, 'LT-T480-02', 'Black', 'T480', 2, 1),
('Whey Protein Isolate 2kg', 'Post-workout muscle recovery', 45.5, 50, 'GYM-WP-01', 'Chocolate', NULL, 3, 13),
('Dragon Ball Super Manga Vol 1', 'Tournament of Power prelude', 9.99, 100, 'MG-DBS-01', 'Standard', NULL, 4, 3),
('Intelligent Investor ETF Edition', 'Guide to personal finance and index funds', 15.99, 30, 'BK-INV-01', 'Green', NULL, 5, 4),
('Mechanical Keyboard', 'RGB Cherry MX Red', 79.99, 25, 'ACC-KB-01', 'White', 'K70', 6, 5),
('Wireless Mouse', 'Ergonomic 2.4Ghz', 29.99, 40, 'ACC-MS-01', 'Black', 'M720', 7, 5),
('Creatine Monohydrate 500g', 'Performance booster', 22, 60, 'GYM-CR-01', 'Unflavored', NULL, 8, 13),
('Lifting Belts', 'Leather weightlifting belt', 35, 20, 'GYM-BL-01', 'Brown', NULL, 9, 2),
('Dragon Ball Super Vol 2', 'Universe Survival Saga', 9.99, 80, 'MG-DBS-02', 'Standard', NULL, 10, 3),
('ETF Investing for Beginners', 'Stock market basics', 12.5, 45, 'BK-INV-02', 'Blue', NULL, 11, 4),
('USB-C Docking Station', 'Dual HDMI, 100W PD', 45.99, 35, 'ACC-DK-01', 'Grey', 'D100', 12, 5),
('Noise Cancelling Headphones', 'Over-ear active noise cancellation', 150, 15, 'AUD-HP-01', 'Silver', 'WH-1000', 13, 7),
('27-inch 144Hz Monitor', 'IPS Gaming Monitor', 250, 10, 'MON-27-01', 'Black', 'VG27AQ', 14, 8),
('Yoga Mat', 'Non-slip exercise mat', 18, 55, 'GYM-YM-01', 'Blue', NULL, 15, 2),
('Smartphone Stand', 'Adjustable aluminum stand', 12.99, 100, 'ACC-ST-01', 'Silver', NULL, 16, 5),
('Protein Shaker Bottle', 'BPA-free 700ml', 8.5, 150, 'GYM-SH-01', 'Red', NULL, 17, 2),
('Wall Street History', 'Book on market trends', 14, 25, 'BK-INV-03', 'Black', NULL, 18, 4),
('Webcam 1080p', 'Streaming camera with mic', 39.99, 30, 'ACC-WC-01', 'Black', 'C920', 19, 5),
('Goku Action Figure', 'Collectible figurine', 24.99, 12, 'MG-FIG-01', 'Multi', NULL, 20, 15);

-- --------------------------------------------------------

--
-- Table structure for table `return_requests`
--

CREATE TABLE `return_requests` (
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `requested_at` date NOT NULL,
  `id` int(11) NOT NULL,
  `fk_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `return_requests`
--

INSERT INTO `return_requests` (`quantity`, `status`, `reason`, `requested_at`, `id`, `fk_Users`) VALUES
(1, 'Approved', 'Defective screen', '2026-02-15', 1, 1),
(1, 'Pending', 'Wrong color', '2026-02-16', 2, 5),
(2, 'Rejected', 'Opened supplement', '2026-02-17', 3, 3),
(1, 'Approved', 'Damaged in transit', '2026-02-18', 4, 4),
(1, 'Pending', 'Not as described', '2026-02-19', 5, 2),
(1, 'Approved', 'Double ordered', '2026-02-20', 6, 5),
(1, 'Rejected', 'Past return window', '2026-02-21', 7, 8),
(1, 'Pending', 'Too small', '2026-02-22', 8, 12),
(1, 'Approved', 'Missing parts', '2026-02-23', 9, 9),
(1, 'Pending', 'Arrived late', '2026-02-24', 10, 1),
(2, 'Rejected', 'User damaged', '2026-02-25', 11, 10),
(1, 'Approved', 'Changed mind', '2026-02-26', 12, 11),
(1, 'Pending', 'Better price found', '2026-02-27', 13, 4),
(1, 'Approved', 'Allergic reaction', '2026-02-28', 14, 3),
(1, 'Rejected', 'No receipt', '2026-03-01', 15, 13),
(1, 'Pending', 'Wrong language edition', '2026-03-02', 16, 2),
(1, 'Approved', 'Keys sticking', '2026-03-03', 17, 16),
(1, 'Pending', 'Doesn\'t fit desk', '2026-03-04', 18, 12),
(1, 'Approved', 'Unwanted gift', '2026-03-05', 19, 19),
(1, 'Pending', 'Battery issues', '2026-03-06', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rating` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `id` int(11) NOT NULL,
  `fk_Products` int(11) NOT NULL,
  `fk_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rating`, `comment`, `created_at`, `id`, `fk_Products`, `fk_Users`) VALUES
(5, 'Great gaming laptop, runs perfectly!', '2026-02-15', 1, 1, 1),
(4, 'Solid ThinkPad, good for uni work.', '2026-02-16', 2, 2, 5),
(5, 'Mixes well, tastes great after the gym.', '2026-02-17', 3, 3, 3),
(5, 'Awesome manga, can\'t wait for the tournament.', '2026-02-18', 4, 4, 4),
(4, 'Very informative on ETF investing.', '2026-02-19', 5, 5, 2),
(3, 'Keyboard is a bit too loud.', '2026-02-20', 6, 6, 5),
(5, 'Excellent mouse for the price.', '2026-02-21', 7, 7, 8),
(4, 'Good creatine, standard results.', '2026-02-22', 8, 8, 3),
(5, 'Monitor refresh rate is buttery smooth.', '2026-02-23', 9, 14, 12),
(2, 'Headphones feel a bit tight.', '2026-02-24', 10, 13, 1),
(5, 'Must read for finance beginners.', '2026-02-25', 11, 11, 11),
(4, 'Docking station does the job.', '2026-02-26', 12, 12, 9),
(1, 'Shaker bottle leaks.', '2026-02-27', 13, 17, 19),
(5, 'Figure looks exactly like the anime.', '2026-02-28', 14, 20, 4),
(4, 'Yoga mat has good grip.', '2026-03-01', 15, 15, 13),
(3, 'Webcam quality is just okay.', '2026-03-02', 16, 19, 16),
(5, 'Phone stand is sturdy.', '2026-03-03', 17, 16, 10),
(4, 'Interesting historical read.', '2026-03-04', 18, 18, 2),
(5, 'Belt offers great back support.', '2026-03-05', 19, 9, 3),
(5, 'Volume 2 is even better!', '2026-03-06', 20, 10, 4),
(5, 'Amazing battery life and the keyboard is the best I have ever used.', '2026-03-08', 21, 2, 24),
(4, 'Mixes perfectly with no clumps, but the flavor is a bit sweet.', '2026-03-09', 22, 3, 7),
(1, 'bad', '0000-00-00', 24, 1, 10),
(1, 'awdwa', '0000-00-00', 25, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `permission_level` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`name`, `description`, `permission_level`, `created_at`, `is_active`, `id`) VALUES
('Product Manager', 'Manages product catalog and inventory', 70, '2026-01-01', 1, 1),
('Sales Manager', 'Oversees sales, discounts, and orders', 60, '2026-01-01', 1, 2),
('Support Agent', 'Handles customer service and returns', 40, '2026-01-02', 1, 3),
('User', 'Standard registered customer', 10, '2026-01-02', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `fk_Roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password_hash`, `created_at`, `is_active`, `id`, `fk_Roles`) VALUES
('student_01', 'student1@example.com', 'hash1', '2026-01-20', 1, 1, 4),
('trader_pro', 'trader@example.com', 'hash2', '2026-01-21', 1, 2, 4),
('gym_bro99', 'gym99@example.com', 'hash3', '2026-01-22', 1, 3, 4),
('anime_fan', 'anime@example.com', 'hash4', '2026-01-23', 1, 4, 4),
('tech_guru', 'tech@example.com', 'hash5', '2026-01-24', 1, 5, 4),
('pm_sarah', 'sarah@company.com', 'hash6', '2026-01-25', 1, 6, 1),
('sales_tom', 'tom@company.com', 'hash7', '2026-01-26', 1, 7, 2),
('user_88', 'u88@example.com', 'hash8', '2026-01-27', 1, 8, 4),
('buyer_x', 'buyerx@example.com', 'hash9', '2026-01-28', 1, 9, 4),
('deal_hunter', 'deals@example.com', 'hash10', '2026-01-29', 1, 10, 4),
('finance_wiz', 'finance@example.com', 'hash11', '2026-01-30', 1, 11, 4),
('gamer_gril', 'gamer@example.com', 'hash12', '2026-02-01', 1, 12, 4),
('reader_007', 'read@example.com', 'hash13', '2026-02-02', 1, 13, 4),
('pm_mike', 'mike@company.com', 'hash14', '2026-02-03', 1, 14, 1),
('support_jen', 'jen@support.com', 'hash15', '2026-02-04', 1, 15, 3),
('vip_mark', 'mark@vip.com', 'hash16', '2026-02-05', 1, 16, 4),
('banned_user', 'bad@example.com', 'hash17', '2026-02-06', 0, 17, 4),
('sales_dave', 'dave@company.com', 'hash18', '2026-02-07', 1, 18, 2),
('casual_buyer', 'casual@example.com', 'hash19', '2026-02-08', 1, 19, 4),
('support_alex', 'alex@company.com', 'hash20', '2026-02-09', 1, 20, 3),
('etf_investor', 'etf@example.com', 'hash21', '2026-02-10', 1, 21, 4),
('protein_king', 'protein@example.com', 'hash22', '2026-02-11', 1, 22, 4),
('kakarot_99', 'goku@example.com', 'hash23', '2026-02-12', 1, 23, 4),
('thinkpad_fan', 't480@example.com', 'hash24', '2026-02-13', 1, 24, 4),
('sales_anna', 'anna@company.com', 'hash25', '2026-02-14', 1, 25, 2),
('support_ryan', 'ryan@company.com', 'hash26', '2026-02-15', 1, 26, 3),
('exchange_student', 'erasmus@example.com', 'hash27', '2026-02-16', 1, 27, 4),
('tech_buyer22', 'tech22@example.com', 'hash28', '2026-02-17', 1, 28, 4),
('dorm_chef', 'chef@example.com', 'hash29', '2026-02-18', 1, 29, 4),
('pm_chris', 'chris@company.com', 'hash30', '2026-02-19', 1, 30, 1),
('awffwawf', 'wfafaw@gmial.com', 'wf', '2026-03-31', 1, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_items`
--

CREATE TABLE `wishlist_items` (
  `added_at` date NOT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_Users` int(11) NOT NULL,
  `fk_Products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist_items`
--

INSERT INTO `wishlist_items` (`added_at`, `priority`, `note`, `id`, `fk_Users`, `fk_Products`) VALUES
('2026-01-20', 'High', 'Wait for sale', 1, 1, 14),
('2026-01-21', 'Medium', 'Need for new semester', 2, 5, 2),
('2026-01-22', 'Low', 'When current tub runs out', 3, 3, 8),
('2026-01-23', 'High', 'Complete the collection', 4, 4, 10),
('2026-01-24', 'Medium', 'Recommended by friend', 5, 2, 11),
('2026-01-25', 'High', 'Upgrade setup', 6, 12, 6),
('2026-01-26', 'Low', 'Backup mouse', 7, 8, 7),
('2026-01-27', 'Medium', 'For deadlifts', 8, 3, 9),
('2026-01-28', 'High', 'Study material', 9, 11, 18),
('2026-01-29', 'Medium', 'For streaming', 10, 16, 19),
('2026-01-30', 'Low', 'Desk organization', 11, 10, 16),
('2026-02-01', 'High', 'Commute essential', 12, 1, 13),
('2026-02-02', 'Medium', 'Home workouts', 13, 13, 15),
('2026-02-03', 'Low', 'Extra shaker', 14, 19, 17),
('2026-02-04', 'High', 'Display shelf', 15, 4, 20),
('2026-02-05', 'Medium', 'Port expansion', 16, 9, 12),
('2026-02-06', 'High', 'Financial literacy', 17, 2, 5),
('2026-02-07', 'Low', 'Next read', 18, 4, 4),
('2026-02-08', 'Medium', 'Post workout', 19, 3, 3),
('2026-02-09', 'High', 'Primary rig', 20, 1, 1),
('2026-02-15', 'High', 'For next semester', 21, 24, 2),
('2026-02-16', 'Medium', 'Good for post-workout', 22, 22, 3),
('2026-02-17', 'Low', 'Wait for a dip in price', 23, 21, 5),
('2026-02-18', 'High', 'Missing from my collection', 24, 23, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queued_in` (`fk_Products`),
  ADD KEY `reserves` (`fk_Users`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Places` (`fk_Users`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contains_element` (`fk_Orders`),
  ADD KEY `disputed_via` (`fk_Return_Requests`),
  ADD KEY `fulfilled_as` (`fk_Products`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorizes` (`fk_Categories`);

--
-- Indexes for table `return_requests`
--
ALTER TABLE `return_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submits` (`fk_Users`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receives` (`fk_Products`),
  ADD KEY `writes` (`fk_Users`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `defines_access_for` (`fk_Roles`);

--
-- Indexes for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saves` (`fk_Users`),
  ADD KEY `bookmarked_in` (`fk_Products`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `return_requests`
--
ALTER TABLE `return_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `queued_in` FOREIGN KEY (`fk_Products`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reserves` FOREIGN KEY (`fk_Users`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Places` FOREIGN KEY (`fk_Users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`fk_Users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `contains_element` FOREIGN KEY (`fk_Orders`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `disputed_via` FOREIGN KEY (`fk_Return_Requests`) REFERENCES `return_requests` (`id`),
  ADD CONSTRAINT `fk_items_orders` FOREIGN KEY (`fk_Orders`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_items_products` FOREIGN KEY (`fk_Products`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fulfilled_as` FOREIGN KEY (`fk_Products`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categorizes` FOREIGN KEY (`fk_Categories`) REFERENCES `categories` (`id`);

--
-- Constraints for table `return_requests`
--
ALTER TABLE `return_requests`
  ADD CONSTRAINT `submits` FOREIGN KEY (`fk_Users`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `receives` FOREIGN KEY (`fk_Products`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `writes` FOREIGN KEY (`fk_Users`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `defines_access_for` FOREIGN KEY (`fk_Roles`) REFERENCES `roles` (`id`);

--
-- Constraints for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD CONSTRAINT `bookmarked_in` FOREIGN KEY (`fk_Products`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `saves` FOREIGN KEY (`fk_Users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

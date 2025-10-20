-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 04:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_partners`
--

CREATE TABLE `delivery_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_kits`
--

CREATE TABLE `meal_kits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subscription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_kit_product`
--

CREATE TABLE `meal_kit_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `meal_kit_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_05_03_000001_create_customer_columns', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_12_14_084946_create_sessions_table', 1),
(8, '2024_01_20_094934_create_products_table', 1),
(9, '2024_05_10_043404_create_product_category', 1),
(10, '2024_05_11_201407_create_orders_table', 1),
(11, '2024_05_12_184152_create_subscriptions_table', 1),
(12, '2024_05_14_145208_create_delivery_partners_table', 1),
(13, '2024_05_14_145527_add_delivery_partner_id_to_orders_table', 1),
(14, '2024_05_16_123721_create_media_table', 1),
(15, '2024_05_27_021844_create_meal_kits_table', 1),
(16, '2024_05_27_163901_create_meal_kit_products_table', 1),
(17, '2024_05_30_194550_create_order_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_first_name` varchar(255) NOT NULL,
  `billing_last_name` varchar(255) NOT NULL,
  `billing_post_code` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `shipping_cost` double(8,2) DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'Online',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_partner_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `meta_keywords` longtext DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `slug`, `status`, `meta_title`, `meta_description`, `meta_keywords`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Family Feast Vegetarian Box', 'meat', 2000.00, 'A vegetarian meal kit perfect for a family of four. Includes fresh vegetables, grains, and spices.', 'family-feast-vegetarian-box', 1, 'Vegetarian Family Feast', 'Enjoy a hearty vegetarian meal with our specially curated meal kit. Perfect for family dinners!', 'meal kit, vegetarian, family box', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(2, 'Classic Chicken Dinner', 'keto', 1500.00, 'Everything you need to cook a delicious chicken dinner with sides. Feeds 2-3 people.', 'classic-chicken-dinner', 1, 'Easy Chicken Dinner Meal Kit', 'Whip up a quick and tasty chicken dinner with our easy-to-follow meal kit.', 'chicken, meal kit, easy dinner', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(3, 'Italian Pasta Night Kit', 'vegan', 1800.00, 'Create an authentic Italian pasta dish with high-quality ingredients sourced directly from Italy.', 'italian-pasta-night-kit', 1, 'Italian Pasta Night', 'Bring Italy to your table with our Italian Pasta Night Kit, complete with all ingredients and a recipe.', 'pasta, Italian, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(4, 'Keto-Friendly Avocado Bowl', 'meat', 2200.00, 'A low-carb, keto-friendly meal featuring fresh avocados, lean proteins, and healthy fats.', 'keto-friendly-avocado-bowl', 1, 'Keto Avocado Bowl', 'Stay on track with our delicious, keto-friendly avocado bowl meal kit.', 'keto, healthy, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(5, 'Sri Lankan Chicken Curry with Rice and Coconut Sambol', 'meat', 1900.00, 'A traditional Sri Lankan chicken curry served with steamed rice and a side of spicy coconut sambol.', 'sri-lankan-chicken-curry-with-rice-and-coconut-sambol', 1, 'Sri Lankan Chicken Curry Meal', 'Enjoy the rich and spicy flavors of our Sri Lankan chicken curry meal kit.', 'Sri Lankan, chicken, curry, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(6, 'Sri Lankan Beef Fry with Yellow Rice and Eggplant Moju', 'meat', 2300.00, 'Spicy Sri Lankan beef fry served with fragrant yellow rice and sweet and sour eggplant moju.', 'sri-lankan-beef-fry-with-yellow-rice-and-eggplant-moju', 1, 'Sri Lankan Beef Fry Meal', 'Experience the bold flavors of our Sri Lankan beef fry meal kit.', 'Sri Lankan, beef, fry, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(7, 'Sri Lankan Pork Black Curry with Pol Roti and Lunu Miris', 'meat', 2100.00, 'Rich and intense pork black curry served with pol roti (coconut roti) and spicy lunu miris.', 'sri-lankan-pork-black-curry-with-pol-roti-and-lunu-miris', 1, 'Sri Lankan Pork Black Curry Meal', 'Savor the deep flavors of our Sri Lankan pork black curry meal kit.', 'Sri Lankan, pork, black curry, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(8, 'Sri Lankan Mutton Curry with String Hoppers and Kiri Hodi', 'meat', 2400.00, 'Hearty mutton curry served with string hoppers (rice flour noodles) and coconut milk gravy (kiri hodi).', 'sri-lankan-mutton-curry-with-string-hoppers-and-kiri-hodi', 1, 'Sri Lankan Mutton Curry Meal', 'Indulge in the rich flavors of our Sri Lankan mutton curry meal kit.', 'Sri Lankan, mutton, curry, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(9, 'Sri Lankan Chicken Kottu with Raita and Seeni Sambol', 'meat', 1700.00, 'Popular street food dish made with shredded roti, chicken, vegetables, served with raita and caramelized onion relish (seeni sambol).', 'sri-lankan-chicken-kottu-with-raita-and-seeni-sambol', 1, 'Sri Lankan Chicken Kottu Meal', 'Taste the vibrant flavors of our Sri Lankan chicken kottu meal kit.', 'Sri Lankan, chicken, kottu, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(10, 'Keto-Friendly Avocado Bowl with Grilled Chicken and Coconut Chips', 'keto', 2100.00, 'A low-carb, keto-friendly meal featuring fresh avocados, grilled chicken, and crispy coconut chips.', 'keto-friendly-avocado-bowl-with-grilled-chicken-and-coconut-chips', 1, 'Keto Avocado Bowl', 'Stay on track with our delicious, keto-friendly avocado bowl meal kit.', 'keto, healthy, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(11, 'Keto Coconut Curry Shrimp with Cauliflower Rice and Spinach', 'keto', 2200.00, 'A flavorful keto-friendly coconut curry shrimp served with cauliflower rice and sautéed spinach.', 'keto-coconut-curry-shrimp-with-cauliflower-rice-and-spinach', 1, 'Keto Coconut Curry Shrimp Meal', 'Enjoy our keto-friendly coconut curry shrimp meal kit.', 'keto, shrimp, curry, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(12, 'Keto Chicken Skewers with Avocado Salad and Coconut Chutney', 'keto', 1800.00, 'Grilled chicken skewers served with a fresh avocado salad and coconut chutney.', 'keto-chicken-skewers-with-avocado-salad-and-coconut-chutney', 1, 'Keto Chicken Skewers Meal', 'Delight in our keto-friendly chicken skewers meal kit.', 'keto, chicken, skewers, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(13, 'Keto Beef Stir-Fry with Bell Peppers and Cashew Nuts', 'keto', 2200.00, 'A delicious beef stir-fry made with bell peppers, cashew nuts, and a blend of Sri Lankan spices.', 'keto-beef-stir-fry-with-bell-peppers-and-cashew-nuts', 1, 'Keto Beef Stir-Fry Meal', 'Indulge in our keto-friendly beef stir-fry meal kit.', 'keto, beef, stir-fry, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL),
(14, 'Keto Spicy Eggplant Curry with Zucchini Noodles', 'keto', 2000.00, 'A savory eggplant curry served over zucchini noodles for a low-carb meal.', 'keto-spicy-eggplant-curry-with-zucchini-noodles', 1, 'Keto Spicy Eggplant Curry Meal', 'Enjoy our keto-friendly spicy eggplant curry meal kit.', 'keto, eggplant, curry, meal kit', NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `slug`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Meat', 'meat', NULL, 1, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(2, 'Keto', 'keto', NULL, 1, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(3, 'Vegan', 'vegan', NULL, 1, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(4, 'Pescatarian', 'pescatarian', NULL, 1, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(5, 'Gluten-Free', 'gluten-free', NULL, 1, '2024-06-07 06:29:01', '2024-06-07 06:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('H9dJFYgF5IX1HHVs7Vz8qtKsY3nrGa41Dw6McH61', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXc2MnVhRkdIUmcxbzJqRnVXNllvS1FBdnJiaGtCSE14ZXlkYzZNdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9EYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMTt9', 1717761907);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_time` varchar(255) NOT NULL,
  `subscription_period` int(11) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `preference` varchar(255) DEFAULT NULL,
  `Number_of_meals` int(11) DEFAULT NULL,
  `Number_of_servings` int(11) DEFAULT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `status`, `delivery_time`, `subscription_period`, `delivery_date`, `price`, `preference`, `Number_of_meals`, `Number_of_servings`, `delivery_address`, `city`, `zip`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '09:00AM-10:00AM', 1, '2024-06-08', 5500, 'vegetarian', 2, 2, '123 Main St', 'Springfield', 12345, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(2, 2, 0, '11:00AM-12:00AM', 3, '2024-06-10', 2000, 'Meat', 2, 4, '456 Maple Ave', 'Riverdale', 23456, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(3, 3, 1, '01:00PM-02:00PM', 6, '2024-06-12', 150, 'Vegan', 4, 2, '789 Oak Dr', 'Hill Valley', 34567, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(4, 4, 0, '09:00AM-10:00AM', 12, '2024-06-14', 30000, 'Pescatarian', 2, 4, '321 Pine Ln', 'Smallville', 45678, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(5, 5, 1, '11:00AM-12:00AM', 12, '2024-06-16', 2500, 'Keto', 5, 2, '654 Elm St', 'Gotham', 56789, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(6, 6, 1, '01:00PM-02:00PM', 3, '2024-06-09', 12000, 'Vegan', 2, 4, '987 Cedar Ct', 'Metropolis', 67890, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(7, 7, 0, '09:00AM-10:00AM', 6, '2024-06-11', 180, 'Meat', 6, 2, '123 Main St', 'Springfield', 12345, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(8, 8, 1, '11:00AM-12:00AM', 9, '2024-06-13', 220, 'gluten-free', 4, 2, '456 Maple Ave', 'Riverdale', 23456, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(9, 9, 0, '01:00PM-02:00PM', 1, '2024-06-15', 90000, 'Meat', 5, 2, '789 Oak Dr', 'Hill Valley', 34567, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01'),
(10, 10, 1, '09:00AM-10:00AM', 12, '2024-06-17', 26000, 'pescatarian', 4, 4, '321 Pine Ln', 'Smallville', 45678, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 2, 'Kamryn Raynor', 'sgutkowski@example.com', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'v7JPXqPkGh', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(2, 2, 'Ms. Dasia Nitzsche', 'alejandra54@example.net', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'a4KcDm86tx', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(3, 2, 'Raegan Moore', 'landen.damore@example.net', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ZZwWFWW3CE', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(4, 2, 'Tillman Schinner', 'makayla67@example.org', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'FJSCCnRZ9T', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(5, 2, 'Bud Dietrich', 'rita.hill@example.org', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'nrMGgGKAuJ', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(6, 2, 'Prof. Carmine Blick III', 'theodore.wisozk@example.com', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'WfG66d5Gt7', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(7, 2, 'Kenyatta Bruen', 'porn@example.com', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'zKpWa5WUJy', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(8, 2, 'Kenyon Schneider', 'fadel.napoleon@example.org', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'JsXiuV5Uo3', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(9, 2, 'Dallas Sauer', 'juliana92@example.org', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '9dBRfWnwv9', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(10, 2, 'Jacques Schinner Jr.', 'macey.franecki@example.net', '2024-06-07 06:29:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'eUC5gTLvJh', NULL, NULL, '2024-06-07 06:29:00', '2024-06-07 06:29:00', NULL, NULL, NULL, NULL),
(11, 1, 'admin', 'Admin@admin.com', '2024-06-07 06:29:01', '$2y$12$19dee0uXx.01cm4npgL5k.RJdGlprpdVWKPwq/ACdMMfDO.AllJra', NULL, NULL, NULL, 'AjBB3LhyEy', NULL, NULL, '2024-06-07 06:29:01', '2024-06-07 06:29:01', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_partners`
--
ALTER TABLE `delivery_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `meal_kits`
--
ALTER TABLE `meal_kits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_kit_product`
--
ALTER TABLE `meal_kit_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_kit_product_product_id_foreign` (`product_id`),
  ADD KEY `meal_kit_product_meal_kit_id_foreign` (`meal_kit_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_delivery_partner_id_foreign` (`delivery_partner_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_category_name_unique` (`name`),
  ADD UNIQUE KEY `product_category_slug_unique` (`slug`),
  ADD KEY `product_category_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_partners`
--
ALTER TABLE `delivery_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_kits`
--
ALTER TABLE `meal_kits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_kit_product`
--
ALTER TABLE `meal_kit_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_kit_product`
--
ALTER TABLE `meal_kit_product`
  ADD CONSTRAINT `meal_kit_product_meal_kit_id_foreign` FOREIGN KEY (`meal_kit_id`) REFERENCES `meal_kits` (`id`),
  ADD CONSTRAINT `meal_kit_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_delivery_partner_id_foreign` FOREIGN KEY (`delivery_partner_id`) REFERENCES `delivery_partners` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_category` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

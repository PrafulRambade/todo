-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 09:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_20_102944_create_todos_table', 1),
(7, '2022_08_20_103753_create_todos_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'my-app-token', '746f725466689ab7ae96ae4e99856775942602d2629d05c27e2ada26fd124d2f', '[\"*\"]', '2022-08-22 00:44:02', '2022-08-22 00:39:07', '2022-08-22 00:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `detail`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mrs. Aniyah Collins DVM', 'Est distinctio consequuntur id non voluptas beatae velit. Eos explicabo vitae aliquam magnam amet iusto. Aut doloremque mollitia enim nisi eius est tenetur. Nisi modi molestiae non id distinctio quam dolorum non.', 0, NULL, '2022-08-22 00:06:34', '2022-08-22 00:06:34'),
(2, 'Maximillia Homenick', 'Consequatur dignissimos delectus nihil doloribus. Aut sint excepturi qui ut. Eum aut ipsum ullam explicabo.', 1, NULL, '2022-08-22 00:06:34', '2022-08-22 00:10:55'),
(3, 'Karlee Kub', 'Adipisci quam voluptatem expedita blanditiis. Consequatur dolor molestias magnam enim. Ad ex modi officiis. Et consectetur enim amet aut delectus deleniti.', 0, NULL, '2022-08-22 00:06:34', '2022-08-22 00:06:34'),
(4, 'Bill Will', 'Repellat aliquam molestiae est id nihil. Eos unde accusamus et explicabo sequi. Quia blanditiis eligendi explicabo voluptas. Excepturi et ex tempore libero sunt expedita possimus nam. Nesciunt sit consequuntur rerum earum.', 0, NULL, '2022-08-22 00:06:34', '2022-08-22 00:06:34'),
(5, 'Columbus Mann', 'Possimus illo voluptas nihil fugiat deleniti sit. Sit non ipsum neque cum sit sed laborum. Quo incidunt voluptas placeat veritatis exercitationem. Id atque suscipit ipsam natus quis nobis magni eligendi.', 0, NULL, '2022-08-22 00:06:34', '2022-08-22 00:06:34'),
(6, 'Dr. Pietro Halvorson', 'Nostrum deleniti omnis consequatur id aut. Quam autem quam sapiente est optio nam omnis. Beatae nobis id voluptate porro maxime temporibus. Omnis sed omnis non aut sunt ea soluta.', 1, NULL, '2022-08-22 00:06:34', '2022-08-22 00:11:05'),
(7, 'Brooklyn Rippin PhD', 'Et inventore voluptatem laborum magnam a ut vel. Illo fuga dolore et non vel earum. Non est officia et minima est. Aut ipsam qui sed velit accusantium sed.', 0, NULL, '2022-08-22 00:06:34', '2022-08-22 00:06:34'),
(8, 'Isai Smitham', 'Earum iste enim laudantium voluptates dolorem maxime. Omnis deleniti est voluptatem eum et. Quia nemo incidunt soluta neque.', 0, NULL, '2022-08-22 00:06:34', '2022-08-22 00:06:34'),
(9, 'Carol Feeney', 'Ratione maxime aut ducimus nemo est. Placeat reiciendis voluptatem culpa vel expedita est. Sapiente aut alias consequatur ratione omnis nisi explicabo. Et in eius debitis sint.', 0, NULL, '2022-08-22 00:06:34', '2022-08-22 00:06:34'),
(10, 'Laverna Kozey', 'Quos accusamus eos quam deserunt saepe. Omnis doloremque quaerat vitae.', 0, NULL, '2022-08-22 00:06:34', '2022-08-22 00:06:34'),
(11, 'My data name', 'My task desc', 0, NULL, '2022-08-22 00:43:01', '2022-08-22 00:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'praful', 'praful06.ra@gmail.com', NULL, '$2y$10$Htk/1ZLYuWd9HVc99Zu2P.4AIAX5DpNKA6sdFYpXA/r0zQnw42ivm', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

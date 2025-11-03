-- phpMyAdmin SQL Dump
-- Database: `car_rental`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- Table structure for table `users`
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('USER','ADMIN') DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `users`
INSERT INTO `users` (`user_id`, `name`, `email`, `password_hash`, `role`) VALUES
(1, 'Admin User', 'admin@example.com', 'somehash', 'ADMIN');

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --------------------------------------------------------
-- Table structure for table `categories`
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categories` (`category_id`, `name`, `description`) VALUES
(1, 'Economy', 'Affordable small cars');

ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --------------------------------------------------------
-- Table structure for table `listings`
CREATE TABLE `listings` (
  `listing_id` int(11) NOT NULL,
  `title` varchar(150),
  `description` text,
  `price` decimal(10,2),
  `location` varchar(100),
  `user_id` int(11),
  `category_id` int(11),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `listings`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `fk_listings_user` (`user_id`),
  ADD KEY `fk_listings_category` (`category_id`),
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------
-- Table structure for table `contacts`
CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100),
  `email` varchar(100),
  `subject` varchar(150),
  `message` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------
-- Table structure for table `testimonials`
CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `name` varchar(100),
  `message` text,
  `rating` int CHECK (rating BETWEEN 1 AND 5),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`),
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

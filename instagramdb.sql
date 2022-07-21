-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 12:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagramdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `photo_id`, `comment`, `deleted`) VALUES
(41, 13, 37, 'Let\'s play together sometime', 0),
(42, 13, 32, 'lol', 0),
(43, 15, 19, 'Such a cute little cat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `follow_id` int(11) UNSIGNED NOT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `following_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`follow_id`, `follower_id`, `following_id`) VALUES
(28, 11, 12),
(29, 14, 13),
(30, 14, 0),
(31, 15, 12),
(32, 16, 15),
(33, 16, 12),
(34, 17, 16),
(35, 11, 13),
(36, 11, 14),
(37, 11, 15),
(38, 11, 16),
(39, 11, 17),
(40, 13, 16),
(41, 13, 17);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photos_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `photos_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photos_id`, `user_id`, `caption`, `URL`, `photos_time`) VALUES
(15, 12, 'Such a cutie <3 <3', 'user_image/pexels-pixabay-45201.jpg', '2022-07-20 22:43:12.230740'),
(16, 12, 'Very sleepy baby', 'user_image/pexels-pixabay-416160.jpg', '2022-07-20 22:45:04.100217'),
(17, 12, 'Handsome boy', 'user_image/pexels-lina-kivaka-1741205.jpg', '2022-07-20 22:45:26.776120'),
(18, 12, 'Boo', 'user_image/pexels-henda-watani-320014.jpg', '2022-07-20 22:45:37.302049'),
(19, 12, 'Nap time', 'user_image/pexels-ihsan-adityawarman-1056251.jpg', '2022-07-20 22:45:51.955736'),
(20, 12, 'Orange Baby', 'user_image/pexels-wojciech-kumpicki-2071873.jpg', '2022-07-20 22:46:10.074761'),
(21, 13, 'Omg the new Java update is amazing', 'user_image/pexels-luis-gomes-546819.jpg', '2022-07-20 22:49:36.769619'),
(22, 13, 'After learning CSS I can finally start learning Python', 'user_image/pexels-christina-morillo-1181359.jpg', '2022-07-20 22:51:52.658386'),
(23, 13, 'HTML is so fun', 'user_image/pexels-pixabay-270366.jpg', '2022-07-20 22:52:04.773551'),
(24, 13, 'Today I got taught about Object Oriented PHP', 'user_image/pexels-christina-morillo-1181376.jpg', '2022-07-20 22:53:14.504923'),
(25, 14, 'Leg day', 'user_image/pexels-william-choquette-1954524.jpg', '2022-07-21 11:47:27.488789'),
(26, 14, 'New record 150kg', 'user_image/pexels-victor-freitas-841130.jpg', '2022-07-21 11:48:26.102989'),
(27, 14, 'New record 200kg', 'user_image/pexels-victor-freitas-791763.jpg', '2022-07-21 11:49:09.685549'),
(28, 15, 'Today I got to spend the whole day with my grandchildren', 'user_image/pexels-pixabay-302083.jpg', '2022-07-21 11:53:16.998247'),
(29, 15, 'Took my little grandson to the toy store today', 'user_image/pexels-min-an-1351751.jpg', '2022-07-21 11:53:55.048828'),
(30, 15, 'Today was a great day to spend gardening', 'user_image/pexels-edu-carvalho-2050994.jpg', '2022-07-21 11:54:12.012033'),
(31, 16, '', 'user_image/use0l18hvqc91.jpg', '2022-07-21 11:58:39.574543'),
(32, 16, '', 'user_image/b7cb7nhnarc91.jpg', '2022-07-21 11:58:46.660250'),
(33, 16, '', 'user_image/09ncmsnm9pc91.jpg', '2022-07-21 11:58:54.796943'),
(34, 16, '', 'user_image/mnssqloyavc91.jpg', '2022-07-21 11:59:52.025603'),
(35, 17, 'Hosting a Mario Kart party', 'user_image/pexels-pixabay-371924.jpg', '2022-07-21 12:02:49.757053'),
(36, 17, 'Finally finished my setup', 'user_image/pexels-josh-sorenson-1714208.jpg', '2022-07-21 12:03:10.338252'),
(37, 17, 'Minecraft is so relaxing', 'user_image/pexels-alexander-kovalev-3977908.jpg', '2022-07-21 12:03:21.736749'),
(38, 17, 'Playing so CSGO with the gang', 'user_image/pexels-yan-krukov-9072307.jpg', '2022-07-21 12:03:40.933233');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(11, 'MrStalker89', '$2y$12$uJrEsOdwcnV4gFIOl4XtGu00gDLwAhG4MPF473EFFIDCMAYApvXxS', 'mr.stalker@gmail.com'),
(12, 'catLady', '$2y$12$dEUpBgIVgDu9fzNciRNbTeiH2R2UELbRyq/no5PfcTXW4xkJWp6ny', 'cat.lady@gmail.com'),
(13, 'helloWorld', '$2y$12$6GQunL74NXIrZDZZMkJEE.ZUdyLVXzmrFkIteuoQ4sx0QT//wlc4a', 'hello.world@gmail.com'),
(14, 'beastMode', '$2y$12$tQtbuL4b4uIVdZm1GkKQy./L9nIfkCRYGpag10uQuryv.pMFFw4mK', 'beast.mode@gmail.com'),
(15, 'grandmaBoss', '$2y$12$IDwHzZEWyJV399SMu0qKcO.uzGqK3Wf5IblbXt1NKcBNY9GbpnR66', 'grandma.boss@gmail.com'),
(16, 'memester', '$2y$12$NkHoUJwr1rCJ/2W1d9KBg.d6ttg9tt0cHaDgucfPU60oVpjZKDmpC', 'memester@gmail.com'),
(17, 'gamer', '$2y$12$RIRHqC4EiUBv8pQSkHnoAueOXWqjKiZj9i81jg9lSBlVHQx.HiQR2', 'gamer@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photos_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follow_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

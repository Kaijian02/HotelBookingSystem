-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 04:29 PM
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
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `prebook`
--

CREATE TABLE `prebook` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `room_num` int(11) NOT NULL,
  `pax_num` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prebook`
--

INSERT INTO `prebook` (`id`, `name`, `check_in`, `check_out`, `room_num`, `pax_num`, `users_id`, `price`) VALUES
(110, 'Superior King', '2023-06-26 00:00:00', '2023-06-27 00:00:00', 1, 1, 20, 599.00),
(135, 'Superior Queen', '2023-07-07 00:00:00', '2023-07-09 00:00:00', 1, 2, 21, 280.00),
(145, 'Premier Deluxe King', '2023-07-08 00:00:00', '2023-07-10 00:00:00', 2, 2, 19, 400.00),
(146, 'Single Deluxe', '2023-07-08 00:00:00', '2023-07-09 00:00:00', 2, 2, 22, 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone_no` int(20) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `room_name` varchar(20) NOT NULL,
  `room_num` int(20) NOT NULL,
  `pax_num` int(20) NOT NULL,
  `total` double NOT NULL,
  `username` varchar(256) NOT NULL,
  `users_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `ic`, `email`, `phone_no`, `check_in`, `check_out`, `room_name`, `room_num`, `pax_num`, `total`, `username`, `users_id`) VALUES
(42, 'Law Kai Jian', '021109070399', 'lawkaijian@gmail.com', 194076897, '2023-07-08 00:00:00', '2023-07-09 00:00:00', 'Premier Deluxe King', 2, 2, 800, 'Kai', 19),
(44, 'Kai Jian', '021109070399', 'lawkaijian@gmail.com', 194076897, '2023-07-08 00:00:00', '2023-07-10 00:00:00', 'Premier Deluxe King', 2, 2, 1600, 'Kai Jian', 19),
(45, 'wen', '021109070399', 'wen@gmail.com', 194076897, '2023-07-08 00:00:00', '2023-07-09 00:00:00', 'Single Deluxe', 2, 2, 240, 'wen', 22);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `image_path` varchar(256) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `price`, `image_path`, `description`) VALUES
(2, 'Superior Queen', 320, 'superior_queen.jpg', 'The Superior rooms are tastefully furnished and provide iconic views of the Petronas Twin Towers in KLCC. These rooms feature a comfortable Queen-size bed.'),
(19, 'Superior King', 320, 'superior_king.jpg', 'The Superior rooms are tastefully furnished and provide iconic views of the Petronas Twin Towers in KLCC. These rooms feature a comfortable King-size bed.'),
(32, 'Single Deluxe', 120, 'deluxe_single.jpg', 'Deluxe single bed room with windows.'),
(36, 'Superior Twin', 320, 'superior_twin.jpg', 'The stylishly furnished Superior rooms offer iconic views of the Petronas Twin Towers in KLCC and come with Twin-size beds.'),
(37, 'Premier Deluxe King', 400, 'premier_king.jpg', 'The Exclusive Premier Deluxe rooms offer a spacious and stylishly furnished accommodation on the higher floors. These rooms feature a luxurious King-size bed and provide breathtaking views of the iconic Petronas Twin Towers in KLCC.'),
(38, 'Premier Deluxe Twin', 400, 'premier_twin.jpg', 'The Exclusive Premier Deluxe rooms provide a spacious and stylishly furnished environment on the higher floors. These rooms feature comfortable Twin-size beds and offer stunning views of the iconic Petronas Twin Towers in KLCC.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phoneno` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phoneno`) VALUES
(19, 'Jerry', 'lawkaijian@gmail.com', '25d55ad283aa400af464c76d713c07ad', 134082282),
(20, 'Jerry', 'jerry@gmail.com', '750664a5394b899dac8bf17d0a27bda4', 194076897),
(21, 'Law Kai Jian', 'lawkaijian123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 194076897),
(22, 'wen', 'wen@gmail.com', '732641a41d63610b2c6d92ea16ac6721', 194076897);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prebook`
--
ALTER TABLE `prebook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prebook`
--
ALTER TABLE `prebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prebook`
--
ALTER TABLE `prebook`
  ADD CONSTRAINT `prebook_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

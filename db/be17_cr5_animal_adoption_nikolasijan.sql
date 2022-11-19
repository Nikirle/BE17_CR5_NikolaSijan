-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 03:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be17_cr5_animal_adoption_nikolasijan`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `size` varchar(55) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `vaccinated` varchar(55) DEFAULT NULL,
  `breed` varchar(55) DEFAULT NULL,
  `status` varchar(55) DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `name`, `picture`, `address`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`) VALUES
(1, 'Aki', 'dog.webp', 'Linzerstrasse 12', 'Aki is an intelligent dog, which gets on well with children, and enjoys being outdoors.', 'big', 4, 'yes', 'dog', 'available'),
(3, 'Lord', '6377ee175515e.jpg', 'USA', 'Parrots are intelligent birds. They have relatively large brains, they can learn, and they can use simple tools', 'big', 10, 'yes', 'parrot', 'available'),
(5, 'Boby', 'cat1.jpg', 'Sterngasse 23', 'This cat is best pet ever', 'big', 9, 'yes', 'cat', 'available'),
(6, 'Eazy', 'dog1.jpg', 'Sterngasse 15', 'This dog is best pet ever', 'big', 10, 'yes', 'dog', 'available'),
(7, 'Rex', 'dog2.jpg', 'Sterngasse 23', 'This dog is best pet ever', 'small', 3, 'yes', 'dog', 'available'),
(8, 'Rory', 'cat2.webp', 'Sterngasse 23', 'This cat is best pet ever', 'big', 13, 'no', 'cat', 'available'),
(9, 'Soffia', 'cat3.jpg', 'Sterngasse 23', 'This cat is best pet ever', 'big', 2, 'no', 'cat', 'available'),
(10, 'Max', 'dog3.webp', 'Sterngasse 23', 'This dog is best pet ever', 'big', 5, 'no', 'dog', 'available'),
(11, 'Ramus', 'mouse.jpg', 'Sterngasse 23', 'This mouse is best pet ever', 'small', 2, 'no', 'mouse', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `fk_pet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`id`, `fk_user_id`, `fk_pet_id`) VALUES
(10, 6, 7),
(11, 6, 11),
(12, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `picture`, `password`, `status`) VALUES
(3, 'Irina', 'Sijan', 'irina@gmail.com', 2147483647, 'Heiligenstädterstr. 11-25/4/6', 'avatar.png', '0e269b7f3538647d533e46bb1aef14d4db0e5e315e3848048f7c5d36bde1264a', 'user'),
(4, 'Nikola', 'Sijan', 'nikola@gmail.com', 3144314, 'Heiligenstädterstr. 11-25/4/6', 'avatar.png', 'a108d6d354a18ab7b395f000a7f08d1dd26cd64666b396281d7b4df08ac5bdb6', 'adm'),
(5, 'Lea', 'Plavotic', 'lea@gmail.com', 2147483647, 'Heiligenstädterstraße 11-25. 4/6', 'avatar.png', '6a7d578e6e8ae6877d15fad4290bd5647ce6d4eb1435c4504bfe89d6b5b5722d', 'user'),
(6, 'Igor', 'Dabic', 'igor@gmail.com', 2147483647, 'linzerstrasse23', 'avatar.png', 'b25e98ce13b7f156a575e694deda71bfafc239f9bf089c2fc5bd5b168faa0c8c', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`fk_user_id`),
  ADD KEY `pet_id` (`fk_pet_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`fk_pet_id`) REFERENCES `animal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 09:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `chips`
--

CREATE TABLE `chips` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chips`
--

INSERT INTO `chips` (`id`, `name`, `description`, `price`, `image_url`) VALUES
(1, 'Classic Potato Chips', 'Classic potato chips with a crispy texture.', '2.99', '/202105756-main/ClassicPotatoChips.jpeg'),
(2, 'Sour Cream and Onion Chips', 'Sour cream and onion flavored chips.', '3.49', '/202105756-main/SourCreamandOnionChips.jpeg'),
(3, 'Barbecue Flavor Chips', 'Barbecue flavored chips with a smoky taste.', '2.79', '/202105756-main/BarbecueFlavorChips.jpeg'),
(4, 'Salt and Vinegar Chips', 'Salt and vinegar flavored chips for a tangy sensation.', '2.89', '/202105756-main/SaltandVinegarChips.jpeg'),
(5, 'Cheese and Onion Chips', 'Cheese and onion flavored chips with a savory taste.', '3.29', '/202105756-main/CheeseandOnionChips.jpeg'),
(6, 'Spicy Jalapeno Chips', 'Spicy jalapeno flavored chips for a fiery kick.', '3.99', '/202105756-main/SpicyJalapenoChips.jpeg'),
(7, 'Sweet Chili Chips', 'Sweet chili flavored chips with a hint of spice.', '2.69', '/202105756-main/SweetChiliChips.jpeg'),
(8, 'Ranch Flavor Chips', 'Ranch flavored chips with a creamy taste.', '3.19', '/202105756-main/RanchFlavorChips.jpeg'),
(9, 'Sea Salt Chips', 'Chips seasoned with sea salt for a simple yet delicious flavor.', '2.49', '/202105756-main/SeaSaltChips.jpeg'),
(10, 'Cheddar and Sour Cream Chips', 'Chips with cheddar and sour cream flavor for a rich taste.', '3.59', '/202105756-main/CheddarandSourCreamChips.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chips`
--
ALTER TABLE `chips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chips`
--
ALTER TABLE `chips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 10:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `id` int(11) NOT NULL,
  `menuName` varchar(255) NOT NULL,
  `menuURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`id`, `menuName`, `menuURL`) VALUES
(1, 'Rolex', '#'),
(2, 'Omega', '#'),
(3, 'Zenith', '#'),
(4, 'Test', '');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_items`
--

CREATE TABLE `shopping_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_items`
--

INSERT INTO `shopping_items` (`id`, `item_name`, `item_desc`, `item_id`, `item_image`, `item_price`, `category`) VALUES
(1, 'Omega Seamaster 600M ', 'Some Description here.....', 'item_id_1', 'omega_seamaster.jpg', '4500', 'Omega'),
(2, 'Omega Speedmaster ''57', 'Some Description here.....', 'item_id_2', 'omega_speedmaster.jpg', '9000', 'Omega'),
(3, 'Omega Hour Vision', 'Some Description here.....', 'item_id_3', 'omega_hourvision.jpg', '7500', 'Omega'),
(4, 'Omega Sea Master', 'Some Description here.....', 'item_id_4', 'omega_seamaster.jpg', '4250', 'Omega'),
(5, 'Omega Gents Collecion', 'Some Description here.....', 'item_id_5', 'omega_gents.jpg', '9000', 'Omega'),
(6, 'Omega Tourbillon', 'Some Description here.....', 'item_id_6', 'omega_tourbillon.jpg', '8560', 'Omega'),
(7, 'Rolex Submariner', 'Some Description here.....', 'item_id_7', 'rolex_deepSea.jpg', '10650', 'Rolex'),
(8, 'Rolex Cosmograph Daytona', 'Some Description here.....', 'item_id_8', 'rolex_cosmograph.jpg', '15850', 'Rolex'),
(9, 'Rolex Air-King', 'Some Description here.....', 'item_id_9', 'rolex_airking.jpg', '5850', 'Rolex'),
(10, 'Rolex Pearlmaster 39', 'Some Description here.....', 'item_id_10', 'rolex_pearmaster.jpg', '115000', 'Rolex'),
(11, 'Rolex Day-Date 36', 'Some Description here.....', 'item_id_11', 'rolex_daydate.jpg', '20750', 'Rolex'),
(12, 'Rolex Submariner', 'Some Description here.....', 'item_id_12', 'rolex_submariner.jpg', '7600', 'Rolex'),
(13, 'Zenith Defy', 'Some Description here.....', 'item_id_13', 'zenith_defy.jpg', '4523', 'Zenith'),
(14, 'Zenith Chronomaster', 'Some Description here.....', 'item_id_14', 'zenith_chronomaster.jpg', '7800', 'Zenith'),
(15, 'Zenith Academy', 'Some Description here.....', 'item_id_15', 'zenith_academy.jpg', '9999', 'Zenith'),
(16, 'Zenith Elite', 'Some Description here.....', 'item_id_16', 'zenith_elite.jpg', '15000', 'Zenith'),
(17, 'Zenith Pilot', 'Some Description here.....', 'item_id_17', 'zenith_pilot.jpg', '5600', 'Zenith'),
(18, 'Zenith Eternity', 'Some Description here.....', 'item_id_18', 'zenith_eternity.jpg', '20000', 'Zenith'),
(30, 'Test2', '', '', 'omega_Speedmaster.jpg', '321', 'Rolex');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_items`
--
ALTER TABLE `shopping_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shopping_items`
--
ALTER TABLE `shopping_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_ibfk_1` FOREIGN KEY (`id`) REFERENCES `shopping_items` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

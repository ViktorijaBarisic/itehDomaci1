-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 02:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knjizara`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(500) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `name`, `price`, `description`, `image`, `category`) VALUES
(1, 'Na Drini ćuprija', 1300, 'Na Drini ćuprija je roman srpskog književnika i nobelovca Ive Andrića. Roman pripoveda o građenju mosta preko reke Drine u bosanskom gradu Višegradu. Građenje mosta naručio je Mehmed paša Sokolović, čuveni zvaničnik Osmanskog carstva koji je bio rođeni Srbin iz Rudog. Još kao mali dečak, Bajica, odv', 'https://www.delfi.rs/_img/artikli/2016/04/na_drini_cuprija_vv.jpg', 1),
(3, 'Dete u tebi mora da pronađe svoj zavičaj', 1000, 'Ključ za rešavanje (skoro) svih problema. Svetski bestseler iz oblasti psihologije Svako čezne da bude prihvaćen i voljen.', 'https://www.google.ba/url?sa=i&url=https%3A%2F%2Fwww.laguna.rs%2Fn4291_knjiga_dete_u_tebi_mora_da_pronadje_svoj_zavicaj_laguna.html&psig=AOvVaw2hIsn5F9v9lHt3Czi8Hs7l&ust=1670073048156000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCODUt4uB2_sCFQAAAAAdAAAAA', 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'roman'),
(3, 'komedija'),
(4, 'poezija'),
(5, 'psihologija'),
(6, 'marketing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `mail`, `password`) VALUES
(1, 'Viktorija', 'viktorija@gmail.com', 'viktorija'),
(2, 'Nikola', 'nikola@gmail.com', 'nikola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `fkCategory` (`category`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fkCategory` FOREIGN KEY (`category`) REFERENCES `category` (`categoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

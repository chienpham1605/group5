-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 07:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onbookstore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(500) NOT NULL,
  `publisher_logo` varchar(100) NOT NULL,
  `publisher_web` varchar(500) NOT NULL,
  `publisher_phone` int(11) NOT NULL,
  `publisher_email` varchar(200) NOT NULL,
  `publisher_address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_logo`, `publisher_web`, `publisher_phone`, `publisher_email`, `publisher_address`) VALUES
(1, 'Kim Dong 111', '../../public/assets/img/publisher/Step03.jpg', 'https://tiki.vn/', 2147483647, 'gb@gmail.com', 'asdASasd 756jf '),
(2, 'ABC Publisher', '../../public/assets/img/publisher/Step04.jpg', 'https://tiki.vn/', 2147483647, 'ghd@gmail.com', 'adsfsadf 8678 hfghjgfh'),
(3, 'Nha xuat ban giao duc ', '../../public/assets/img/publisher/Step05.jpg', 'https://www.nxbgd.vn/', 2147483647, 'ghdg@gmail.com', ' hfg6ghn hf'),
(4, 'ih', '../../public/assets/img/publisher/UTF-8 Region.png', 'https://tiki.vn/', 2147483647, 'gdb@gmail.com', '6875 hfgjfj'),
(19, 'gdfg', '../../public/assets/img/publisher/Step03.jpg', 'http://shoppe.vn', 63745637, 'gdh@gmail.com', 'gdhfdf'),
(20, 'gdfg', '../../public/assets/img/publisher/Step04.jpg', 'http://google.vn', 27563676, 'hgd@gmail.com', 'gdfhdf'),
(21, 'hoa', '../../public/assets/img/publisher/', 'https://tiki.vn/', 123786789, 'hoa@gmail.com', 'gsdfhgdfh'),
(22, 'hoa', 'images/Step02.jpg', 'gd', 0, '', ''),
(23, 'h', 'images/UTF-8 Region.png', 'h', 0, '', ''),
(24, 'j', 'images/Step04.jpg', 'j', 0, '', ''),
(25, 'h', 'images/UTF-8 Region.png', 'h', 0, '', ''),
(26, '', '../../public/assets/img/publisher/', 'https://tiki.vn/', 2147483647, 'hd@gmail.com', 'hfghf'),
(27, '', 'Images/Step04.jpg', 'https://hasaki.vn/?gclid=Cj0KCQjwi46iBhDyARIsAE3nVrYjrADQKzQ41uEvlS9lOntLMfI_fVkOjdakDSKKhGxbDnBbCHtzFlsaAqv-EALw_wcB', 2147483647, 'hasaki@gmail.com', 'hf yhfghf'),
(28, '', 'Images/Step02.jpg', 'https://hasaki.vn/', 2147483647, 'hasaki@gmail.com', 'jhgf hfhjfg'),
(29, '', 'Images/Step01.jpg', 'https://shooppe.vn/', 63765835, 'ghdh@gmail.com', 'hjkd 6797 fhgdfhd'),
(30, '', '../../public/assets/img/publisher/Step03.jpg', 'https://tiki.vn/', 2147483647, 'gd@gmail.com', 'hfgjfgj'),
(31, 'sak', '../../public/assets/img/publisher/Step04.jpg', 'https://hasaki.vn/', 2147483647, 'ghd@gmail.com', 'hdh hyhrt75 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 08:38 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `title`) VALUES
(1, 'education', 'title for education'),
(2, 'games', 'title for games'),
(3, 'culture', 'title for culture'),
(4, 'festival', 'title for festival');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `cat`) VALUES
(1, 'This is the first post of mvc', '<p>This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...</p>\r\n\r\n<p>This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...This is the first post...</p>', 1),
(2, 'this is the second post of mvc', '<p>This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...</p>\r\n\r\n<p>This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...This is the second post...</p>', 2),
(3, 'this is the third post of mvc', '<p>This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...</p>\r\n\r\n<p>This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...This is the third post...</p>', 3),
(4, 'this is the fourth post', '<p>this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;this is the fourth post&nbsp;</p>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'anand', '90d788e31333195618c1ea10ad6aab36', 1),
(2, 'muskan', '90d788e31333195618c1ea10ad6aab36', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

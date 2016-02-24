-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2016 at 02:57 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_blog`
--
CREATE DATABASE IF NOT EXISTS `simple_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simple_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

DROP TABLE IF EXISTS `tb_comments`;
CREATE TABLE IF NOT EXISTS `tb_comments` (
  `cmt_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `post_comment` text NOT NULL,
  `comment_last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cmt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`cmt_id`, `post_id`, `name`, `email`, `post_comment`, `comment_last_date`) VALUES
(1, 27, 'nama', 'komentar', 'email', '2014-10-14 13:37:09'),
(2, 27, 'nama2', 'komentar2', 'email2', '2014-10-14 13:37:22'),
(3, 27, 'a', 'a', 'a', '2014-10-14 14:01:42'),
(4, 27, 'aa', 'aaa', 'aaaa', '2014-10-14 14:03:32'),
(5, 0, '', '', '', '2014-10-14 14:03:45'),
(6, 0, '', '', '', '2014-10-14 14:03:49'),
(7, 28, 'asdasd', 'sadasdasd', 'asdasdasd', '2014-10-14 14:10:50'),
(8, 28, 'asd', 'asd@asd.com', 'asd', '2014-10-14 14:13:44'),
(9, 29, 'asd', 'asd@123.ss', 'asd', '2016-02-21 10:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

DROP TABLE IF EXISTS `tb_post`;
CREATE TABLE IF NOT EXISTS `tb_post` (
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_date` date NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `is_featured` tinyint(20) NOT NULL,
  `post_last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_path` text,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`post_id`, `post_date`, `post_title`, `post_content`, `is_featured`, `post_last_date`, `image_path`, `username`) VALUES
(40, '2016-02-24', 'First Post', 'Quam quis recusandae reprehenderit soluta sunt. Asperiores ea unde ea autem culpa. Dicta est velit odio quia. Ut doloremque incidunt earum quae. Quam quis recusandae reprehenderit soluta sunt. Asperiores ea unde ea autem culpa. Dicta est velit odio quia. Ut doloremque incidunt earum quae. Quam quis recusandae reprehenderit soluta sunt. Asperiores ea unde ea autem culpa. Dicta est velit odio quia. Ut doloremque incidunt earum quae.', 0, '2016-02-24 13:43:52', 'img/aang.jpg', 'admin'),
(42, '2016-02-24', 'Second post', 'Iure rerum sed eum et dignissimos. Corporis aut cupiditate dolores nesciunt suscipit. Aut non esse velit corporis. Ea quo omnis suscipit quo et sed. Iure rerum sed eum et dignissimos. Corporis aut cupiditate dolores nesciunt suscipit. Aut non esse velit corporis. Ea quo omnis suscipit quo et sed. Iure rerum sed eum et dignissimos. Corporis aut cupiditate dolores nesciunt suscipit. Aut non esse velit corporis. Ea quo omnis suscipit quo et sed.', 0, '2016-02-24 13:46:29', 'img/aang.jpg', 'admin'),
(43, '2016-02-24', 'A post by tirta', ' Ipsa est quasi officia eum quas doloribus qui eaque. Deserunt reprehenderit sint recusandae. Ea cupiditate impedit consequatur esse sit. Ipsa est quasi officia eum quas doloribus qui eaque. Deserunt reprehenderit sint recusandae. Ea cupiditate impedit consequatur esse sit. Ipsa est quasi officia eum quas doloribus qui eaque. Deserunt reprehenderit sint recusandae. Ea cupiditate impedit consequatur esse sit.', 0, '2016-02-24 13:55:36', 'img/aang.jpg', 'tirtawr');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `email`) VALUES
('admin', 'cc2c31055f0b70727461a6692ff179ea12d1361b1e319f637bf12b618ba83771', 'admin@admin.ad'),
('tirtawr', 'c061563c9ccbdd5c09beeca2fc3ea0e5555c5f3f5ad3b3332c7b7b0fdfc4f008', 'tirta@asd.ss');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

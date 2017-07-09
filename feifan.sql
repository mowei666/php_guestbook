-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-09 10:34:45
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feifan`
--
CREATE DATABASE IF NOT EXISTS `feifan` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `feifan`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `regTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `pwd`, `regTime`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2017-07-09 04:23:31'),
(2, 'kong', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00'),
(3, 'tom', 'md5("123456")', '0000-00-00 00:00:00'),
(4, 'tom', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `email` varchar(150) NOT NULL,
  `regTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `username`, `pwd`, `email`, `regTime`) VALUES
(2, 'peter', '123456', 'peter@gmail.com', '2017-07-02 05:12:31'),
(3, 'pan', '123456', 'mary@mary.com', '2017-07-02 05:12:44'),
(4, 'mike', '123456', 'mike@mike.com', '2017-07-02 05:29:02'),
(5, 'panda', '123456', 'lee@lee.com', '2017-07-02 05:36:59'),
(7, 'peter', '123456', 'peter@gmail.com', '2017-07-02 08:50:17'),
(8, 'çŽ›ä¸½2', '123456', 'na@may.com', '2017-07-02 09:02:52'),
(9, 'zhangsan', '123456d', 'ddd', '2017-07-02 09:08:54'),
(10, 'lishi', '1232', 'asdfasdf', '2017-07-02 09:09:04'),
(11, 'wangwu', '333', '333', '2017-07-02 09:09:14'),
(13, '23423', '234', '23', '2017-07-02 09:09:25'),
(14, '23452345', '2345', '2345', '2017-07-02 09:09:31'),
(15, '24352345', '2345234', 'hello@hellol.com', '2017-07-02 09:09:35'),
(16, 'maryabcd', 'e10adc3949ba59abbe56e057f20f883e', '55', '2017-07-02 09:09:39'),
(17, 'tomlee', 'e10adc3949ba59abbe56e057f20f883e', 'tomlee@tomlee.com', '2017-07-09 08:11:44'),
(18, '新用户', '123456', 'new@new.com', '2017-07-09 08:15:51'),
(19, '非凡', '123456', 'feifan@feifan.com', '2017-07-09 14:25:35'),
(20, '机房', 'e10adc3949ba59abbe56e057f20f883e', 'room@room.com', '2017-07-09 15:01:06'),
(21, 'amanda88', 'e10adc3949ba59abbe56e057f20f883e', 'amanda@amanda.com', '2017-07-09 15:20:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

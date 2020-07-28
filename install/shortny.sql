-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2018 at 11:49 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shortny`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad1` text NOT NULL,
  `ad2` text NOT NULL,
  `ad3` text NOT NULL,
  `ad4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad1`, `ad2`, `ad3`, `ad4`) VALUES
('<h2>这是什么？</h2><p><h4>一个可添加任何所需内容的可用空间。描述，广告，公告。前往管理面板进行编辑</h4> </p>', '<h2>这是什么？</h2><p><h4>一个可添加任何所需内容的可用空间。描述，广告，公告。前往管理面板进行编辑</h4> </p>', '<h2>这是什么？</h2><p></p><h4>一个可添加任何所需内容的可用空间。描述，广告，公告。前往管理面板进行编辑</h4> <p></p><p>ads 300x250 recommended </p> ', '<h2>这是什么？</h2><p></p><h4>一个可添加任何所需内容的可用空间。描述，广告，公告。前往管理面板进行编辑</h4> <p></p><p>ads 300x250 recommended </p> ');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `link` varchar(16) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hits` int(16) NOT NULL DEFAULT '0',
  `pass` varchar(255) NOT NULL,
  `custom` int(1) NOT NULL DEFAULT '0',
  `last_visit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `name` varchar(64) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `redirect` int(1) NOT NULL DEFAULT '1',
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `logo_type` int(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `cstm-style` longtext NOT NULL,
  `wait` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `URL`, `redirect`, `admin_user`, `admin_pass`, `logo_url`, `logo_type`, `email`, `cstm-style`,`wait`) VALUES
('Shortny', 'http://localhost/shortny', 1, 'admin', '$2y$10$ZVz0jEQTGiYAjfO0bbhtt.QuLXeze6Q5E/DU7P8WAQ/FwepEeJ8fq', 'img/logo-light.png;img/logo-dark.png', 1, 'example@email.com', 'body {\r\n  background-color: #f1f1f1;\r\n}', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `URL` (`URL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

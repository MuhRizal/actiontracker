-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Nov 2017 pada 04.29
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `action_tracker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `at_actions`
--

CREATE TABLE `at_actions` (
  `action_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `action_name` varchar(200) NOT NULL,
  `action_category` varchar(200) DEFAULT NULL,
  `action_desc` text,
  `action_code` varchar(100) NOT NULL,
  `source_url` text,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `at_actions`
--

INSERT INTO `at_actions` (`action_id`, `application_id`, `action_name`, `action_category`, `action_desc`, `action_code`, `source_url`, `created_date`, `updated_date`, `created_by`, `update_by`) VALUES
(1, 1, 'Visit home page', NULL, 'Visit home page', 'xfa3141', 'https://sample.net/modules/', '2017-10-02 00:00:00', '0000-00-00 00:00:00', 1, 0),
(2, 2, 'Visit Module 1', NULL, 'Visit Module 1 (by ajax)', '3rf3232', NULL, '2017-10-02 00:00:00', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `at_applications`
--

CREATE TABLE `at_applications` (
  `application_id` int(11) NOT NULL,
  `application_name` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `at_applications`
--

INSERT INTO `at_applications` (`application_id`, `application_name`, `created_date`, `updated_date`, `created_by`, `update_by`) VALUES
(1, 'Assessment Module', '2017-10-02 00:00:00', '2017-10-02 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `at_tracks`
--

CREATE TABLE `at_tracks` (
  `track_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `platform` varchar(100) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(200) NOT NULL,
  `org` varchar(200) NOT NULL,
  `strings` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `at_tracks`
--

INSERT INTO `at_tracks` (`track_id`, `action_id`, `created_date`, `ip_address`, `platform`, `browser`, `country`, `city`, `org`, `strings`) VALUES
(1, 1, '2017-10-02 03:48:33', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(2, 1, '2017-10-02 07:06:09', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(3, 1, '2017-10-02 07:06:16', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(4, 1, '2017-10-02 07:06:32', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(5, 1, '2017-10-02 07:11:43', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(6, 1, '2017-10-02 07:19:43', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(7, 1, '2017-10-02 07:21:54', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(8, 1, '2017-10-02 07:22:21', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(9, 1, '2017-10-02 07:40:06', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(10, 1, '2017-10-02 07:40:16', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(11, 1, '2017-10-02 07:41:53', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(12, 1, '2017-10-02 07:42:01', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(13, 1, '2017-10-02 07:46:05', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(14, 1, '2017-10-02 08:05:55', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(15, 1, '2017-10-02 08:06:02', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(16, 1, '2017-10-02 08:06:07', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(17, 1, '2017-10-02 08:07:19', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(18, 1, '2017-10-02 08:07:30', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(19, 1, '2017-10-02 08:10:51', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(20, 1, '2017-10-02 08:13:03', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(21, 1, '2017-10-02 08:28:06', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(22, 1, '2017-10-02 08:28:41', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(23, 1, '2017-10-02 08:30:08', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(24, 1, '2017-10-02 08:35:45', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(25, 1, '2017-10-02 08:36:36', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(26, 1, '2017-10-02 08:36:51', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(27, 1, '2017-10-02 08:37:11', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(28, 1, '2017-10-02 08:37:13', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(29, 1, '2017-10-02 08:37:16', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(30, 1, '2017-10-02 08:41:16', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(31, 1, '2017-10-02 08:44:07', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(32, 1, '2017-10-02 08:44:17', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(33, 1, '2017-10-02 08:44:33', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(34, 1, '2017-10-02 08:47:06', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(35, 1, '2017-10-02 08:47:33', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(36, 1, '2017-10-02 08:51:33', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(37, 1, '2017-10-02 08:52:37', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(38, 1, '2017-10-02 08:53:23', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(39, 1, '2017-10-02 08:54:07', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(40, 1, '2017-10-02 08:55:50', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(41, 1, '2017-10-02 08:56:19', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(42, 1, '2017-10-02 08:59:05', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(43, 1, '2017-10-02 08:59:16', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(44, 1, '2017-10-02 09:01:01', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(45, 1, '2017-10-02 09:01:31', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(46, 1, '2017-10-02 09:02:09', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(47, 1, '2017-10-02 09:02:19', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(48, 1, '2017-10-02 09:02:41', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(49, 1, '2017-10-02 09:03:08', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(50, 1, '2017-10-02 09:03:29', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(51, 1, '2017-10-02 09:03:36', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(52, 1, '2017-10-02 09:04:31', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(53, 1, '2017-10-02 09:04:44', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(54, 1, '2017-10-02 09:05:28', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(55, 1, '2017-10-02 09:05:45', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(56, 1, '2017-10-02 09:05:56', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(57, 1, '2017-10-02 09:08:43', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(58, 1, '2017-10-02 09:09:09', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(59, 1, '2017-10-02 14:10:17', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(60, 1, '2017-10-02 14:11:10', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(61, 1, '2017-10-02 14:11:43', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(62, 1, '2017-10-02 14:12:00', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(63, 1, '2017-10-02 14:12:01', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(64, 1, '2017-10-02 14:12:46', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(65, 1, '2017-10-02 14:14:59', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(66, 1, '2017-10-02 14:15:28', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(67, 1, '2017-10-02 14:15:39', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(68, 1, '2017-10-02 14:36:15', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(69, 1, '2017-10-02 14:48:40', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(70, 1, '2017-10-02 14:49:16', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(71, 1, '2017-10-02 15:04:33', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(72, 1, '2017-10-02 15:06:31', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(73, 1, '2017-10-02 15:07:11', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(74, 1, '2017-10-02 15:07:55', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(75, 1, '2017-10-02 15:08:14', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(76, 1, '2017-10-02 15:08:21', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(77, 1, '2017-10-02 15:08:41', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(78, 1, '2017-10-02 15:08:55', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(79, 1, '2017-10-02 15:09:28', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(80, 1, '2017-10-02 15:09:33', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(81, 1, '2017-10-02 15:10:45', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(82, 1, '2017-10-02 15:11:13', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', ''),
(83, 1, '2017-10-02 15:11:32', '::1', 'Windows 10', 'Chrome 61.0.3163.100', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `at_users`
--

CREATE TABLE `at_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `craeted_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `at_users`
--

INSERT INTO `at_users` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`, `craeted_date`, `update_date`) VALUES
(1, 'master', 'admin', 'user@test.com', 'admin', '202cb962ac59075b964b07152d234b70', '2017-10-01 00:00:00', '2017-10-01 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `at_actions`
--
ALTER TABLE `at_actions`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `at_applications`
--
ALTER TABLE `at_applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `at_tracks`
--
ALTER TABLE `at_tracks`
  ADD PRIMARY KEY (`track_id`);

--
-- Indexes for table `at_users`
--
ALTER TABLE `at_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `at_actions`
--
ALTER TABLE `at_actions`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `at_applications`
--
ALTER TABLE `at_applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `at_tracks`
--
ALTER TABLE `at_tracks`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `at_users`
--
ALTER TABLE `at_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

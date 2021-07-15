-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 08:37 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scout-beyond-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(2, 'Albania', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(3, 'Algeria', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(4, 'American Samoa', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(5, 'Andorra', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(6, 'Angola', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(7, 'Anguilla', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(8, 'Antarctica', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(9, 'Antigua & Barbuda', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(10, 'Argentina', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(11, 'Armenia', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(12, 'Aruba', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(13, 'Australia', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(14, 'Austria', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(15, 'Azerbaijan', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(16, 'Bahamas', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(17, 'Bahrain', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(18, 'Bangladesh', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(19, 'Barbados', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(20, 'Belarus', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(21, 'Belgium', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(22, 'Belize', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(23, 'Benin', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(24, 'Bermuda', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(25, 'Bhutan', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(26, 'Bolivia', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(27, 'Bosnia & Herzegovina', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(28, 'Botswana', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(29, 'Bouvet Island', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(30, 'Brazil', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(31, 'British Indian Ocean Territory', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(32, 'British Virgin Islands', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(33, 'Brunei', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(34, 'Bulgaria', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(35, 'Burkina Faso', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(36, 'Burundi', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(37, 'Cambodia', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(38, 'Cameroon', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(39, 'Canada', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(40, 'Cape Verde', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(41, 'Caribbean Netherlands', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(42, 'Cayman Islands', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(43, 'Central African Republic', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(44, 'Chad', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(45, 'Chile', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(46, 'China', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(47, 'Christmas Island', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(48, 'Cocos (Keeling) Islands', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(49, 'Colombia', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(50, 'Comoros', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(51, 'Congo - Brazzaville', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(52, 'Congo - Kinshasa', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(53, 'Cook Islands', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(54, 'Costa Rica', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(55, 'Croatia', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(56, 'Cuba', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(57, 'Curaçao', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(58, 'Cyprus', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(59, 'Czechia', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(60, 'Côte d’Ivoire', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(61, 'Denmark', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(62, 'Djibouti', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(63, 'Dominica', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(64, 'Dominican Republic', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(65, 'Ecuador', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(66, 'Egypt', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(67, 'El Salvador', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(68, 'Equatorial Guinea', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(69, 'Eritrea', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(70, 'Estonia', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(71, 'Eswatini', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(72, 'Ethiopia', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(73, 'Falkland Islands', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(74, 'Faroe Islands', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(75, 'Fiji', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(76, 'Finland', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(77, 'France', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(78, 'French Guiana', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(79, 'French Polynesia', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(80, 'French Southern Territories', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(81, 'Gabon', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(82, 'Gambia', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(83, 'Georgia', 'Active', '2021-02-21 17:04:57', '2021-02-21 17:04:57'),
(84, 'Germany', 'Active', '2021-02-21 17:04:57', '2021-02-21 17:04:57'),
(85, 'Ghana', 'Active', '2021-02-21 17:04:57', '2021-02-21 17:04:57'),
(86, 'Gibraltar', 'Active', '2021-02-21 17:04:57', '2021-02-21 17:04:57'),
(87, 'Greece', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(88, 'Greenland', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(89, 'Grenada', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(90, 'Guadeloupe', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(91, 'Guam', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(92, 'Guatemala', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(93, 'Guernsey', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(94, 'Guinea', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(95, 'Guinea-Bissau', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(96, 'Guyana', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(97, 'Haiti', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(98, 'Heard & McDonald Islands', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(99, 'Honduras', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(100, 'Hong Kong SAR China', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(101, 'Hungary', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(102, 'Iceland', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(103, 'India', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(104, 'Indonesia', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(105, 'Iran', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(106, 'Iraq', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(107, 'Ireland', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(108, 'Isle of Man', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(109, 'Israel', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(110, 'Italy', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(111, 'Jamaica', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(112, 'Japan', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(113, 'Jersey', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(114, 'Jordan', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(115, 'Kazakhstan', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(116, 'Kenya', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(117, 'Kiribati', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(118, 'Kuwait', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(119, 'Kyrgyzstan', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(120, 'Laos', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(121, 'Latvia', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(122, 'Lebanon', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(123, 'Lesotho', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(124, 'Liberia', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(125, 'Libya', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(126, 'Liechtenstein', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(127, 'Lithuania', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(128, 'Luxembourg', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(129, 'Macao SAR China', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(130, 'Madagascar', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(131, 'Malawi', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(132, 'Malaysia', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(133, 'Maldives', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(134, 'Mali', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(135, 'Malta', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(136, 'Marshall Islands', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(137, 'Martinique', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(138, 'Mauritania', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(139, 'Mauritius', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(140, 'Mayotte', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(141, 'Mexico', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(142, 'Micronesia', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(143, 'Moldova', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(144, 'Monaco', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(145, 'Mongolia', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(146, 'Montenegro', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(147, 'Montserrat', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(148, 'Morocco', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(149, 'Mozambique', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(150, 'Myanmar (Burma)', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(151, 'Namibia', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(152, 'Nauru', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(153, 'Nepal', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(154, 'Netherlands', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(155, 'New Caledonia', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(156, 'New Zealand', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(157, 'Nicaragua', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(158, 'Niger', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(159, 'Nigeria', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(160, 'Niue', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(161, 'Norfolk Island', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(162, 'North Korea', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(163, 'North Macedonia', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(164, 'Northern Mariana Islands', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(165, 'Norway', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(166, 'Oman', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(167, 'Pakistan', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(168, 'Palau', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(169, 'Palestinian Territories', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(170, 'Panama', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(171, 'Papua New Guinea', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(172, 'Paraguay', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(173, 'Peru', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(174, 'Philippines', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(175, 'Pitcairn Islands', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(176, 'Poland', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(177, 'Portugal', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(178, 'Puerto Rico', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(179, 'Qatar', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(180, 'Romania', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(181, 'Russia', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(182, 'Rwanda', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(183, 'Réunion', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(184, 'Samoa', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(185, 'San Marino', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(186, 'Saudi Arabia', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(187, 'Senegal', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(188, 'Serbia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(189, 'Seychelles', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(190, 'Sierra Leone', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(191, 'Singapore', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(192, 'Sint Maarten', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(193, 'Slovakia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(194, 'Slovenia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(195, 'Solomon Islands', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(196, 'Somalia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(197, 'South Africa', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(198, 'South Georgia & South Sandwich Islands', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(199, 'South Korea', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(200, 'South Sudan', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(201, 'Spain', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(202, 'Sri Lanka', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(203, 'St. Barthélemy', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(204, 'St. Helena', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(205, 'St. Kitts & Nevis', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(206, 'St. Lucia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(207, 'St. Martin', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(208, 'St. Pierre & Miquelon', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(209, 'St. Vincent & Grenadines', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(210, 'Sudan', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(211, 'Suriname', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(212, 'Svalbard & Jan Mayen', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(213, 'Sweden', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(214, 'Switzerland', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(215, 'Syria', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(216, 'São Tomé & Príncipe', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(217, 'Taiwan', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(218, 'Tajikistan', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(219, 'Tanzania', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(220, 'Thailand', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(221, 'Timor-Leste', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(222, 'Togo', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(223, 'Tokelau', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(224, 'Tonga', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(225, 'Trinidad & Tobago', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(226, 'Tunisia', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(227, 'Turkey', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(228, 'Turkmenistan', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(229, 'Turks & Caicos Islands', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(230, 'Tuvalu', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(231, 'U.S. Outlying Islands', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(232, 'U.S. Virgin Islands', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(233, 'Uganda', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(234, 'Ukraine', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(235, 'United Arab Emirates', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(236, 'United Kingdom', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(237, 'United States', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(238, 'Uruguay', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(239, 'Uzbekistan', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(240, 'Vanuatu', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(241, 'Vatican City', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(242, 'Venezuela', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(243, 'Vietnam', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(244, 'Wallis & Futuna', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(245, 'Western Sahara', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(246, 'Yemen', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(247, 'Zambia', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(248, 'Zimbabwe', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(249, 'Åland Islands', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `item_id`, `item_type`, `created_at`, `updated_at`) VALUES
(16, 1, 3, 'Player', '2021-06-15 04:39:18', '2021-06-15 04:39:18'),
(17, 1, 4, 'Player', '2021-06-15 04:44:06', '2021-06-15 04:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `game_videos`
--

CREATE TABLE `game_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_thumbnail_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id1` int(10) UNSIGNED DEFAULT NULL,
  `team_id2` int(10) UNSIGNED DEFAULT NULL,
  `team1_formation_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team1_formation_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team2_formation_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team2_formation_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `formation_id1` int(10) UNSIGNED DEFAULT NULL,
  `formation_id2` int(10) UNSIGNED DEFAULT NULL,
  `top_player_id` int(10) UNSIGNED DEFAULT NULL,
  `man_of_the_match_id` int(10) UNSIGNED DEFAULT NULL,
  `report_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_view_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_videos`
--

INSERT INTO `game_videos` (`id`, `title`, `description`, `video_url`, `video_thumbnail_url`, `team_id1`, `team_id2`, `team1_formation_name`, `team1_formation_url`, `team2_formation_name`, `team2_formation_url`, `formation_id1`, `formation_id2`, `top_player_id`, `man_of_the_match_id`, `report_url`, `total_view_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Real Madrid vs Bercelona 2020-2021', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://player.vimeo.com/video/565239827?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=148357', 'https://player.vimeo.com/video/565239832?badge=0&autopause=0&player_id=0&app_id=148357', 1, 2, '4-4-2', 'images/game_video_formations/1_1622730637.png', '5-3-2', 'images/game_video_formations/2_1622730637.png', 1, 2, 0, 0, 'report/game_videos/1.pdf', 3, 'Active', '2021-05-03 09:04:32', '2021-06-29 10:55:23'),
(2, 'Liverpool vs Manchester United 2019-2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://player.vimeo.com/video/562307901?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=148357', 1, 2, '4-4-2', 'images/game_video_formations/1_1622730618.png', '5-3-2', 'images/game_video_formations/2_1622730618.png', 1, 2, 0, 0, 'report/game_videos/1.pdf', 3, 'Active', '2021-05-03 09:04:32', '2021-06-29 10:55:14'),
(3, 'Bayern München vs Manchester City 2018-2019', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://player.vimeo.com/video/562307901?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=148357', 1, 2, '4-4-2', 'images/game_video_formations/1_1622730594.png', '5-3-2', 'images/game_video_formations/2_1622730594.png', 1, 2, 0, 0, 'report/game_videos/1.pdf', 5, 'Active', '2021-05-03 09:04:32', '2021-06-29 10:55:18'),
(4, 'Paris Saint vs Chelsea FC 2017-2018', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://player.vimeo.com/video/562307901?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=148357', 1, 2, '5-3-2', 'images/game_video_formations/1_1622730570.png', '4-4-2', 'images/game_video_formations/2_1622730570.png', 1, 2, 0, 0, 'report/game_videos/1.pdf', 1, 'Inactive', '2021-05-03 09:04:32', '2021-06-29 10:55:42'),
(5, 'Legia Warsaw vs FC Zenit 202', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://player.vimeo.com/video/562307901?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=148357', 3, 4, '4-4-2', 'images/game_video_formations/3_1622730530.png', '5-3-2', 'images/game_video_formations/4_1622730530.png', 1, 2, 0, 0, 'report/game_videos/1623546723.pdf', 5, 'Inactive', '2021-05-26 09:42:57', '2021-06-29 10:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `game_video_preferences`
--

CREATE TABLE `game_video_preferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `game_video_id` int(10) UNSIGNED DEFAULT NULL,
  `preference_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_video_preferences`
--

INSERT INTO `game_video_preferences` (`id`, `user_id`, `game_video_id`, `preference_type`, `created_at`, `updated_at`) VALUES
(8, 1, 2, 'Like', '2021-06-29 10:54:40', '2021-06-29 10:54:40'),
(9, 1, 3, 'Like', '2021-06-29 10:55:10', '2021-06-29 10:55:10'),
(10, 1, 1, 'Dislike', '2021-06-29 10:55:25', '2021-06-29 10:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `last_paid_date` date DEFAULT NULL,
  `is_expired` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `start_date`, `end_date`, `last_paid_date`, `is_expired`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-24', '2022-08-24', '2021-06-13', 0, '2021-05-24 15:19:58', '2021-06-13 04:22:08'),
(2, 12, '2021-06-02', '2021-09-02', '2021-06-02', 0, '2021-06-02 12:48:18', '2021-06-02 12:48:18'),
(3, 13, '2021-06-03', '2021-06-30', '2021-06-13', 0, '2021-06-03 12:23:44', '2021-06-13 04:36:32'),
(4, 15, '2021-06-13', '2021-09-13', '2021-06-13', 0, '2021-06-13 04:55:05', '2021-06-13 04:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `notification` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_dismissed` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `notification`, `is_dismissed`, `created_at`, `updated_at`) VALUES
(1, 1, 'This is Test Notification', 0, '2021-05-31 10:39:19', '2021-05-31 10:39:19'),
(2, 1, 'Go and Take some Medicine', 0, '2021-05-31 10:39:19', '2021-05-31 10:39:19'),
(3, 1, 'Come and Discuss about Notification', 0, '2021-05-31 10:39:19', '2021-05-31 10:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `player_ids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `manager` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `logo`, `player_ids`, `description`, `manager`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Real Madrid', 'images/team_logos/1622649278.png', '2,3,4,5,14', 'Real Madrid Club de Fútbol, meaning Royal Madrid Football Club, commonly referred to as Real Madrid, is a Spanish professional football club based in Madrid.\r\n<br>\r\nFounded on 6 March 1902 as Madrid Football Club, the club has traditionally worn a white home kit since inception. The word real is Spanish for \"royal\" and was bestowed to the club by King Alfonso XIII in 1920 together with the royal crown in the emblem. The team has played its home matches in the 81,044-capacity Santiago Bernabéu Stadium in downtown Madrid since 1947. Unlike most European sporting entities, Real Madrid\'s members (socios) have owned and operated the club throughout its history.', 'Zinedine Zidane', 'Active', '2021-05-03 09:15:22', '2021-06-12 19:16:46'),
(2, 'FC Barcelona', 'images/team_logos/1622649133.png', '6,7,8,9', 'Futbol Club Barcelona, commonly referred to as Barcelona and colloquially known as Barça ([ˈbaɾsə]), is a Spanish professional football club based in Barcelona, that competes in La Liga, the top flight of Spanish football.\r\n<br>\r\nFounded in 1899 by a group of Swiss, Spanish, English, and Catalan footballers led by Joan Gamper, the club has become a symbol of Catalan culture and Catalanism, hence the motto \"Més que un club (More than a club). Unlike many other football clubs, the supporters own and operate Barcelona. It is the fourth-most valuable sports team in the world, worth $4.06 billion, and the worlds richest football club in terms of revenue, with an annual turnover of €840.8 million. The official Barcelona anthem is the \"Cant del Barça\", written by Jaume Picas and Josep Maria Espinàs. Barcelona traditionally play in dark shades of blue and red stripes, leading to the nickname Blaugrana.', 'Ronald Koeman', 'Active', '2021-05-03 09:15:22', '2021-06-02 09:52:13'),
(3, 'Legia Warsaw', 'images/team_logos/1622649077.png', '2,3,4,5', 'Legia Warszawa, known in English as Legia Warsaw, is a professional football club based in Warsaw, Poland. Legia is the most successful Polish football club in history winning record 15 Ekstraklasa Champions titles, a record 19 Polish Cup and four Polish SuperCup trophies.', 'Czesław Michniewicz', 'Active', '2021-05-26 15:39:48', '2021-06-02 09:51:17'),
(4, 'FC Zenit', 'images/team_logos/1622649006.png', '9', 'Football Club Zenit, also known as Zenit Saint Petersburg or simply Zenit, is a Russian professional football club based in the city of Saint Petersburg. Founded in 1925, the club plays in the Russian Premier League. Zenit are the reigning champions of the Russian Premier League.', 'Sergei Semak', 'Active', '2021-05-26 15:39:48', '2021-06-03 01:25:25'),
(5, 'Chelsea F.C.', 'images/team_logos/1622649387.png', NULL, 'Chelsea Football Club is an English professional football club based in Fulham, West London. Founded in 1905, the club competes in the Premier League, the top division of English football.', 'Thomas Tuchel', 'Inactive', '2021-06-02 09:56:27', '2021-06-26 11:05:03'),
(6, 'Manchester United F.C.', 'images/team_logos/1622649531.png', NULL, 'Manchester United Football Club is a professional football club based in Old Trafford, Greater Manchester, England, that competes in the Premier League, the top flight of English football.', 'Ole Gunnar Solskjær', 'Inactive', '2021-06-02 09:58:51', '2021-06-26 11:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_member` tinyint(1) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `avatar`, `password`, `remember_token`, `verification_code`, `password_reset_code`, `is_verified`, `type`, `is_member`, `status`, `created_at`, `updated_at`) VALUES
(1, 'info@scoutbeyond.com', 'images/players/1622546343.jpg', '$2y$10$hk628DvjAcBuXvWgWu8nhe/pD/2JP0QfTArfmVVsQKzXvIbOtNHKO', NULL, NULL, NULL, 1, 'Member', 1, 'Active', NULL, '2021-06-13 04:22:08'),
(2, 'seaud@gmail.com', 'images/players/2_square.png', '$2y$10$9SjyHZwJgpBMvSMLe/U2nuAevEyGLcCLxOH7gSfZHo7awHOBfP.im', NULL, NULL, NULL, 1, 'Player', 0, 'Active', '2021-04-27 20:46:16', '2021-05-27 10:35:41'),
(3, 'xyz@hotmail.com', 'images/players/3_square.png', '$2y$10$gaE3s2m6U0eoMXaNTTZVUOV3O0anBsRy20U43/7cosDxQ.hsnSX/.', NULL, NULL, NULL, 1, 'Player', 0, 'Active', '2021-05-02 21:31:13', '2021-05-02 21:31:13'),
(4, 'def@gmail.com', 'images/players/4_square.png', '$2y$10$gaE3s2m6U0eoMXaNTTZVUOV3O0anBsRy20U43/7cosDxQ.hsnSX/.', NULL, NULL, NULL, 1, 'Player', 0, 'Active', '2021-05-02 21:31:13', '2021-05-02 21:31:13'),
(5, 'ghi@gmail.com', 'images/players/5_square.png', '$2y$10$gaE3s2m6U0eoMXaNTTZVUOV3O0anBsRy20U43/7cosDxQ.hsnSX/.', NULL, NULL, NULL, 1, 'Player', 0, 'Active', '2021-05-02 21:31:13', '2021-05-02 21:31:13'),
(6, 'jkl@gmail.com', 'images/players/6_square.png', '$2y$10$gaE3s2m6U0eoMXaNTTZVUOV3O0anBsRy20U43/7cosDxQ.hsnSX/.', NULL, NULL, NULL, 1, 'Player', 0, 'Active', '2021-05-02 21:31:13', '2021-05-02 21:31:13'),
(7, 'mno@gmail.com', 'images/players/7_square.png', '$2y$10$gaE3s2m6U0eoMXaNTTZVUOV3O0anBsRy20U43/7cosDxQ.hsnSX/.', NULL, NULL, NULL, 1, 'Player', 0, 'Active', '2021-05-02 21:31:13', '2021-05-02 21:31:13'),
(8, 'pqr@gmail.com', 'images/players/8_square.png', '$2y$10$gaE3s2m6U0eoMXaNTTZVUOV3O0anBsRy20U43/7cosDxQ.hsnSX/.', NULL, NULL, NULL, 1, 'Player', 0, 'Active', '2021-05-02 21:31:13', '2021-05-02 21:31:13'),
(9, 'sijambaddu@gmail.com', 'images/players/9_square.png', '$2y$10$gaE3s2m6U0eoMXaNTTZVUOV3O0anBsRy20U43/7cosDxQ.hsnSX/.', NULL, NULL, NULL, 1, 'Player', 0, 'Active', '2021-05-02 21:31:13', '2021-05-30 14:01:16'),
(10, 'admin@scoutbeyond.com', 'images/application/admin_avatar.jpg', '$2y$10$bTxX1sWrNli3VqT5z9eGEeKhTwzQKUDB2woAElgnsutFYuRPzsU3K', NULL, NULL, NULL, 1, 'Admin', 0, 'Active', '2021-05-26 12:25:21', '2021-05-26 12:25:21'),
(11, 'hello@gmail.com', 'images/players/1622405374.jpg', NULL, NULL, NULL, NULL, 0, 'Player', 0, 'Inactive', '2021-05-30 14:09:34', '2021-06-26 11:21:40'),
(12, 'se@gmail.com', 'images/players/1622659698.jpg', '$2y$10$./LncYGH63BX5D4xpDZ4nuryrJChwZFYteBQpgxltsdE3tTAXqx9G', NULL, '576350', NULL, 1, 'Scout', 1, 'Active', '2021-06-02 12:48:18', '2021-06-02 12:49:48'),
(13, 'seaudbd@gmail.com', 'images/players/1622744624.jpg', '$2y$10$Aj54lw0k.FIy9dC0CBCRF.ajpO90k9rn8oMy9vDiXSm14jMiRxamW', NULL, '909387', NULL, 1, 'Scout', 1, 'Active', '2021-06-03 12:23:44', '2021-06-13 04:36:32'),
(14, 'abc@hotmail.com', 'images/players/1623547006.jpg', NULL, NULL, NULL, NULL, 0, 'Player', NULL, 'Inactive', '2021-06-12 19:16:46', '2021-06-12 19:16:46'),
(15, 'sad@gmail.com', NULL, '$2y$10$zzaFKfVx6cynEZE0lPMD6OFCwA5KDXja73EoiXkagepQ0pNv.0VEa', NULL, '545653', NULL, 1, NULL, 1, 'Active', '2021-06-13 04:55:05', '2021-06-13 04:55:05'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Player', NULL, 'Inactive', '2021-06-26 11:32:13', '2021-06-26 11:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_story` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spoken_language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `club_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `club_contact_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `club_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `club_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strong_leg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` double UNSIGNED DEFAULT NULL,
  `weight` double UNSIGNED DEFAULT NULL,
  `passport_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `national_experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `last_name`, `user_story`, `dob`, `gender`, `country`, `city`, `phone`, `spoken_language`, `club_name`, `club_contact_name`, `club_phone`, `club_email`, `strong_leg`, `position`, `height`, `weight`, `passport_country`, `passport_url`, `national_experience`, `created_at`, `updated_at`) VALUES
(1, 2, 'Abdullah Al', 'Gaffar', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '2011-04-01', 'Male', 'Bangladesh', 'Dhaka', '123456789', 'Bengali', 'Baba Doc', 'asraf', '0123456789', 'seaud@gmail.com', 'Left', 'Mid Fielder', 167, 50, 'Bangladesh', 'images/passport_files/2-1620048554.jpg', 'U19', '2021-04-27 20:46:16', '2021-05-30 14:06:33'),
(2, 3, 'Allon', 'Billi', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '2021-05-03', 'Male', 'United States', 'New York', '0123456789', 'English', 'Sisi Pura', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'Goalkeeper', 180, 90, 'United States', 'images/passport_files/10-1619990770.jpg', 'U17', '2021-05-02 21:36:26', '2021-05-02 21:36:26'),
(3, 4, 'Gibi', 'Lala', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '2021-05-03', 'Male', 'United States', 'New York', '0123456789', 'English', 'Bali Jhora', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'Goalkeeper', 180, 90, 'United States', 'images/passport_files/10-1619990770.jpg', 'U17', '2021-05-02 21:36:26', '2021-05-02 21:36:26'),
(4, 5, 'Sukul', 'Dada', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '2021-05-03', 'Male', 'United States', 'New York', '0123456789', 'English', 'Mint Kaka', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'Goalkeeper', 180, 90, 'United States', 'images/passport_files/10-1619990770.jpg', 'U17', '2021-05-02 21:36:26', '2021-05-02 21:36:26'),
(5, 6, 'Bakul', 'Mama', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '2021-05-03', 'Male', 'United States', 'New York', '0123456789', 'English', 'Ifra Boli', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'Goalkeeper', 180, 90, 'United States', 'images/passport_files/10-1619990770.jpg', 'U17', '2021-05-02 21:36:26', '2021-05-02 21:36:26'),
(6, 7, 'Makul', 'Chacha', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '2021-05-03', 'Male', 'United States', 'New York', '0123456789', 'English', 'Olom Gula', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'Goalkeeper', 180, 90, 'United States', 'images/passport_files/10-1619990770.jpg', 'U17', '2021-05-02 21:36:26', '2021-05-02 21:36:26'),
(7, 8, 'Piki', 'Nana', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '2021-05-03', 'Male', 'United States', 'New York', '0123456789', 'English', 'Paisu Bindu', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'Goalkeeper', 180, 90, 'United States', 'images/passport_files/10-1619990770.jpg', 'U17', '2021-05-02 21:36:26', '2021-05-02 21:36:26'),
(8, 9, 'Sijam', 'Baddu', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '1991-05-29', 'Male', 'United States', 'New York', '0123456789', 'English', 'Lifa Tual', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'Goalkeeper', 180, 90, 'United States', 'images/passport_files/10-1619990770.jpg', 'U17', '2021-05-02 21:36:26', '2021-05-30 14:05:19'),
(9, 1, 'Asraf', 'Duha', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', '2021-05-24', 'Male', 'Jordan', 'New York', '+123456789', 'English', 'Oslos Football Association', 'No Contact Name', '+123456789', 'no_email@scoutbeyond.com', 'No Leg', 'No Position', 169, 65, 'United States', NULL, 'No Experience', '2021-05-24 15:42:27', '2021-06-08 14:07:56'),
(10, 10, 'Scout', 'Beyond', 'The story tells about a boy who rips his new football shirt while playing football. The boy walks into a repair shop to have it mended. The man who repairs it turns out to be a professional ex-footballer. But who is he exactly? Why is he now repairing clothes for a living? Read the story to find out the answers.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11, 'Mr', 'Hello', 'Test Story', '2021-05-31', 'Male', 'Afghanistan', 'Gniyapok', '123456789', 'Urdu', 'Baba Doc', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'GK', 180, 90, 'Afghanistan', 'images/passport_files/1622405374.png', 'U19', '2021-05-30 14:09:34', '2021-06-08 08:53:52'),
(12, 12, 'Umid', 'Afsari', NULL, '2021-06-01', 'Male', 'Albania', NULL, '123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-02 12:48:18', '2021-06-02 12:48:18'),
(13, 13, 'Asraf', 'Duha', NULL, NULL, NULL, 'Jordan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-03 12:23:44', '2021-06-03 12:23:44'),
(14, 14, 'ax', 'bx', 'aaaa', '2021-06-13', 'Male', 'Afghanistan', 'Dhaka', '0123456789', 'English', 'Lifa Tual', 'Sisibu', '0123456789', 'sisipura@gmail.com', 'Right', 'RB', 180, 90, 'Albania', 'images/passport_files/1623547006.png', 'U17', '2021-06-12 19:16:46', '2021-06-12 19:17:38'),
(15, 15, 'Asraf', 'Duha', NULL, NULL, NULL, 'Jordan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-13 04:55:05', '2021-06-13 04:55:05'),
(16, 16, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-26 11:32:13', '2021-06-26 11:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_videos`
--
ALTER TABLE `game_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_video_preferences`
--
ALTER TABLE `game_video_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `game_videos`
--
ALTER TABLE `game_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `game_video_preferences`
--
ALTER TABLE `game_video_preferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

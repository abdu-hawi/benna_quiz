-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2022 at 12:57 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benaa_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--



INSERT INTO `questions` (`id`, `question`, `publish_date`, `week_number`, `correct_answer`) VALUES
(1, 'السؤال 1 | الإسبوع 1', '2022-04-15', 0, 1),
(2, 'السؤال 2 | الإسبوع 1', '2022-04-15', 0, 6),
(3, 'السؤال 3 | الإسبوع 1', '2022-04-15', 0, 11),
(4, 'السؤال 4 | الإسبوع 1', '2022-04-15', 0, 16),
(5, 'السؤال 5 | الإسبوع 1', '2022-04-15', 0, 17),
(6, 'السؤال 6 | الإسبوع 1', '2022-04-15', 0, 22),
(7, 'السؤال 7 | الإسبوع 1', '2022-04-15', 0, 27),
(8, 'السؤال 1 | الإسبوع 1', '2022-04-20', 0, 31),
(9, 'السؤال 2 | الإسبوع 2', '2022-04-20', 0, 36),
(10, 'السؤال 3 | الإسبوع 2', '2022-04-20', 0, 37),
(11, 'السؤال 4 | الإسبوع 2', '2022-04-20', 0, 42),
(12, 'السؤال 5 | الإسبوع 2', '2022-04-20', 0, 47),
(13, 'السؤال 6 | الإسبوع 2', '2022-04-20', 0, 52),
(14, 'السؤال 7 | الإسبوع 2', '2022-04-20', 0, 53),
(15, 'السؤال 1 | الإسبوع 3', '2022-04-22', 0, 58),
(16, 'السؤال 2 | الإسبوع 3', '2022-04-22', 0, 63),
(17, 'السؤال 3 | الإسبوع 3', '2022-04-22', 0, 68),
(18, 'السؤال 4 | الإسبوع 3', '2022-04-22', 0, 69),
(19, 'السؤال 5 | الإسبوع 3', '2022-04-22', 0, 74),
(20, 'السؤال 6 | الإسبوع 3', '2022-04-22', 0, 79),
(21, 'السؤال 7 | الإسبوع 3', '2022-04-22', 0, 84),
(22, 'السؤال 1 | الإسبوع 4', '2022-04-29', 0, 85),
(23, 'السؤال 2 | الإسبوع 4', '2022-04-29', 0, 90),
(24, 'السؤال 3 | الإسبوع 4', '2022-04-29', 0, 95),
(25, 'السؤال 4 | الإسبوع 4', '2022-04-29', 0, 100),
(26, 'السؤال 5 | الإسبوع 4', '2022-04-29', 0, 101),
(27, 'السؤال 6 | الإسبوع 4', '2022-04-29', 0, 106),
(28, 'السؤال 7 | الإسبوع 4', '2022-04-29', 0, 111);


INSERT INTO `answers` (`id`, `question_id`, `answer`) VALUES
(1, 1, 'السؤال 1 | الإسبوع 1 | الاجابة 1'),
(2, 1, 'السؤال 1 | الإسبوع 1 | الاجابة 2'),
(3, 1, 'السؤال 1 | الإسبوع 1 | الاجابة 3'),
(4, 1, 'السؤال 1 | الإسبوع 1 | الاجابة 4'),
(5, 2, 'السؤال 2 | الإسبوع 1 | الاجابة 1'),
(6, 2, 'السؤال 2 | الإسبوع 1 | الاجابة 2'),
(7, 2, 'السؤال 2 | الإسبوع 1 | الاجابة 3'),
(8, 2, 'السؤال 2 | الإسبوع 1 | الاجابة 4'),
(9, 3, 'السؤال 3 | الإسبوع 1 | الاجابة 1'),
(10, 3, 'السؤال 3 | الإسبوع 1 | الاجابة 2'),
(11, 3, 'السؤال 3 | الإسبوع 1 | الاجابة 3'),
(12, 3, 'السؤال 3 | الإسبوع 1 | الاجابة 4'),
(13, 4, 'السؤال 4 | الإسبوع 1 | الاجابة 1'),
(14, 4, 'السؤال 4 | الإسبوع 1 | الاجابة 2'),
(15, 4, 'السؤال 4 | الإسبوع 1 | الاجابة 3'),
(16, 4, 'السؤال 4 | الإسبوع 1 | الاجابة 4'),
(17, 5, 'السؤال 1 | الإسبوع 1 | الاجابة 1'),
(18, 5, 'السؤال 1 | الإسبوع 1 | الاجابة 2'),
(19, 5, 'السؤال 1 | الإسبوع 1 | الاجابة 3'),
(20, 5, 'السؤال 1 | الإسبوع 1 | الاجابة 4'),
(21, 6, 'السؤال 6 | الإسبوع 1 | الاجابة 1'),
(22, 6, 'السؤال 6 | الإسبوع 1 | الاجابة 2'),
(23, 6, 'السؤال 6 | الإسبوع 1 | الاجابة 3'),
(24, 6, 'السؤال 6 | الإسبوع 1 | الاجابة 4'),
(25, 7, 'السؤال 7 | الإسبوع 1 | الاجابة 1'),
(26, 7, 'السؤال 7 | الإسبوع 1 | الاجابة 2'),
(27, 7, 'السؤال 7 | الإسبوع 1 | الاجابة 3'),
(28, 7, 'السؤال 7 | الإسبوع 1 | الاجابة 4'),
(29, 8, 'السؤال 1 | الإسبوع 2 | الاجابة 1'),
(30, 8, 'السؤال 1 | الإسبوع 2 | الاجابة 2'),
(31, 8, 'السؤال 1 | الإسبوع 2 | الاجابة 3'),
(32, 8, 'السؤال 1 | الإسبوع 2 | الاجابة 4'),
(33, 9, 'السؤال 2 | الإسبوع 2 | الاجابة 1'),
(34, 9, 'السؤال 2 | الإسبوع 2 | الاجابة 2'),
(35, 9, 'السؤال 2 | الإسبوع 2 | الاجابة 3'),
(36, 9, 'السؤال 2 | الإسبوع 2 | الاجابة 4'),
(37, 10, 'السؤال 3 | الإسبوع 2 | الاجابة 1'),
(38, 10, 'السؤال 3 | الإسبوع 2 | الاجابة 2'),
(39, 10, 'السؤال 3 | الإسبوع 2 | الاجابة 3'),
(40, 10, 'السؤال 3 | الإسبوع 2 | الاجابة 4'),
(41, 11, 'السؤال 4 | الإسبوع 2 | الاجابة 1'),
(42, 11, 'السؤال 4 | الإسبوع 2 | الاجابة 2'),
(43, 11, 'السؤال 4 | الإسبوع 2 | الاجابة 3'),
(44, 11, 'السؤال 4 | الإسبوع 2 | الاجابة 4'),
(45, 12, 'السؤال 5 | الإسبوع 2 | الاجابة 1'),
(46, 12, 'السؤال 5 | الإسبوع 2 | الاجابة 2'),
(47, 12, 'السؤال 5 | الإسبوع 2 | الاجابة 3'),
(48, 12, 'السؤال 5 | الإسبوع 2 | الاجابة 4'),
(49, 13, 'السؤال 6 | الإسبوع 2 | الاجابة 1'),
(50, 13, 'السؤال 6 | الإسبوع 2 | الاجابة 2'),
(51, 13, 'السؤال 6 | الإسبوع 2 | الاجابة 3'),
(52, 13, 'السؤال 6 | الإسبوع 2 | الاجابة 4'),
(53, 14, 'السؤال 7 | الإسبوع 2 | الاجابة 1'),
(54, 14, 'السؤال 7 | الإسبوع 2 | الاجابة 2'),
(55, 14, 'السؤال 7 | الإسبوع 2 | الاجابة 3'),
(56, 14, 'السؤال 7 | الإسبوع 2 | الاجابة 4'),
(57, 15, 'السؤال 1 | الإسبوع 3 | الاجابة 1'),
(58, 15, 'السؤال 1 | الإسبوع 3 | الاجابة 2'),
(59, 15, 'السؤال 1 | الإسبوع 3 | الاجابة 3'),
(60, 15, 'السؤال 1 | الإسبوع 3 | الاجابة 4'),
(61, 16, 'السؤال 2 | الإسبوع 3 | الاجابة 1'),
(62, 16, 'السؤال 2 | الإسبوع 3 | الاجابة 2'),
(63, 16, 'السؤال 2 | الإسبوع 3 | الاجابة 3'),
(64, 16, 'السؤال 2 | الإسبوع 3 | الاجابة 4'),
(65, 17, 'السؤال 3 | الإسبوع 3 | الاجابة 1'),
(66, 17, 'السؤال 3 | الإسبوع 3 | الاجابة 2'),
(67, 17, 'السؤال 3 | الإسبوع 3 | الاجابة 3'),
(68, 17, 'السؤال 4 | الإسبوع 3 | الاجابة 4'),
(69, 18, 'السؤال 4 | الإسبوع 3 | الاجابة 1'),
(70, 18, 'السؤال 4 | الإسبوع 3 | الاجابة 2'),
(71, 18, 'السؤال 4 | الإسبوع 3 | الاجابة 3'),
(72, 18, 'السؤال 4 | الإسبوع 3 | الاجابة 4'),
(73, 19, 'السؤال 5 | الإسبوع 3 | الاجابة 1'),
(74, 19, 'السؤال 5 | الإسبوع 3 | الاجابة 2'),
(75, 19, 'السؤال 5 | الإسبوع 3 | الاجابة 3'),
(76, 19, 'السؤال 5 | الإسبوع 3 | الاجابة 4'),
(77, 20, 'السؤال 6 | الإسبوع 3 | الاجابة 1'),
(78, 20, 'السؤال 6 | الإسبوع 3 | الاجابة 2'),
(79, 20, 'السؤال 6 | الإسبوع 3 | الاجابة 3'),
(80, 20, 'السؤال 6 | الإسبوع 3 | الاجابة 4'),
(81, 21, 'السؤال 7 | الإسبوع 3 | الاجابة 1'),
(82, 21, 'السؤال 7 | الإسبوع 3 | الاجابة 2'),
(83, 21, 'السؤال 7 | الإسبوع 3 | الاجابة 3'),
(84, 21, 'السؤال 7 | الإسبوع 3 | الاجابة 4'),
(85, 22, 'السؤال 1 | الإسبوع 4 | الاجابة 1'),
(86, 22, 'السؤال 1 | الإسبوع 4 | الاجابة 2'),
(87, 22, 'السؤال 1 | الإسبوع 4 | الاجابة 3'),
(88, 22, 'السؤال 1 | الإسبوع 4 | الاجابة 4'),
(89, 23, 'السؤال 2 | الإسبوع 4 | الاجابة 1'),
(90, 23, 'السؤال 2 | الإسبوع 4 | الاجابة 2'),
(91, 23, 'السؤال 2 | الإسبوع 4 | الاجابة 3'),
(92, 23, 'السؤال 2 | الإسبوع 4 | الاجابة 4'),
(93, 24, 'السؤال 3 | الإسبوع 4 | الاجابة 1'),
(94, 24, 'السؤال 3 | الإسبوع 4 | الاجابة 2'),
(95, 24, 'السؤال 3 | الإسبوع 4 | الاجابة 3'),
(96, 24, 'السؤال 3 | الإسبوع 4 | الاجابة 4'),
(97, 25, 'السؤال 4 | الإسبوع 4 | الاجابة 1'),
(98, 25, 'السؤال 4 | الإسبوع 4 | الاجابة 2'),
(99, 25, 'السؤال 4 | الإسبوع 4 | الاجابة 3'),
(100, 25, 'السؤال 4 | الإسبوع 4 | الاجابة 4'),
(101, 26, 'السؤال 5 | الإسبوع 4 | الاجابة 1'),
(102, 26, 'السؤال 5 | الإسبوع 4 | الاجابة 2'),
(103, 26, 'السؤال 5 | الإسبوع 4 | الاجابة 3'),
(104, 26, 'السؤال 5 | الإسبوع 4 | الاجابة 4'),
(105, 27, 'السؤال 6 | الإسبوع 4 | الاجابة 1'),
(106, 27, 'السؤال 6 | الإسبوع 4 | الاجابة 2'),
(107, 27, 'السؤال 6 | الإسبوع 4 | الاجابة 3'),
(108, 27, 'السؤال 6 | الإسبوع 4 | الاجابة 4'),
(109, 28, 'السؤال 7 | الإسبوع 4 | الاجابة 1'),
(110, 28, 'السؤال 7 | الإسبوع 4 | الاجابة 2'),
(111, 28, 'السؤال 7 | الإسبوع 4 | الاجابة 3'),
(112, 28, 'السؤال 7 | الإسبوع 4 | الاجابة 4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

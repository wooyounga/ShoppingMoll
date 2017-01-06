-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 생성 시간: 16-12-15 14:57
-- 서버 버전: 10.1.16-MariaDB
-- PHP 버전: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `homepage`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `b_no` int(11) NOT NULL,
  `b_title` varchar(50) NOT NULL,
  `b_content` varchar(5000) NOT NULL,
  `b_writer` varchar(30) NOT NULL,
  `b_date` varchar(50) NOT NULL,
  `b_viewed` int(11) NOT NULL,
  `b_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`b_no`, `b_title`, `b_content`, `b_writer`, `b_date`, `b_viewed`, `b_file`) VALUES
(7, 'ã…Ž', 'ã…Žã…Ž', 'oa0328', '2016-12-15 (14:42)', 2, ''),
(8, 'ã„¹ã„¹', 'ã„¹ã„¹', 'oa0328', '2016-12-15 (14:43)', 0, ''),
(9, 'ã…”', 'ã…”', 'oa0328', '2016-12-15 (14:43)', 1, ''),
(10, 'ã…”', 'ã…”', 'oa0328', '2016-12-15 (14:43)', 1, ''),
(11, 'ã…‡ã…‡', 'ã…‡', 'oa0328', '2016-12-15 (14:43)', 1, ''),
(12, 'ã…‡ã…‡', 'ã…‡ã…‡', 'oa0328', '2016-12-15 (14:46)', 2, ''),
(14, 'ê¹€ë•¡ë•¡', 'ë•¡ë•¡ã„¸ëŒ•~~~!!', 'root', '2016-12-15 (14:50)', 1, '161215025027The-Maze-Runner-46.jpg');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`b_no`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `b_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

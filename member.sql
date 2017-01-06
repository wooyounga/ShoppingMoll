-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 생성 시간: 16-12-15 14:58
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
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `user_name` varchar(30) NOT NULL,
  `user_birth` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `user_pw` varchar(30) NOT NULL,
  `user_addr` varchar(30) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_joinDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`user_name`, `user_birth`, `user_id`, `user_pw`, `user_addr`, `user_phone`, `user_gender`, `user_email`, `user_joinDate`) VALUES
('ìš°ì˜ì•„', '197011', '11', 'aa', '11', '010ã…ã…1', 'ë‚¨', '21@45', '2016-12-12 (11:57)'),
('asdg', '197023', 'aaaaad', 'dd', 'aaa', '010aaa', 'ì—¬', 'aa@aa', '2016-12-12 (11:57)'),
('ã…ã…', '197122', 'ã…ã…', 'aa', 'ã…ã…', '010ã…ã…ã…ã…', 'ì—¬', 'ã…ã…@ã…ã…', '2016-12-12 (11:58)'),
('ã…ã„¶', '197122', 'ã…‡ã…‡', 'd', 'ã…‡ã…‡', '011ã…‡ã…‡ã…‡', 'ì—¬', 'ã…‡ã…‡@ã…‡ã…‡', '2016-12-12 (12:01)'),
('ã…ã…', '197024', 'ã…Žã…Ž', 'aa', 'ã…ã…', '010ã…ã…', 'ì—¬', 'ã…@ã…ã…', '2016-12-12 (11:59)'),
('dd', '197224', 'dd', 'dd', 'ddd', '010dddddd', 'ì—¬', 'dd@dd', '2016-12-12 (11:32)'),
('ã…‡ã…‡', '197122', 'dddd', 'd', 'ã…‡ã…‡', '011ã…‡ã…‡ã…‡', 'ì—¬', 'ã…‡@ã…‡', '2016-12-12 (12:04)'),
('ê¹€ë•¡ë•¡', '199012', 'kk123', '1234', 'kk', '010123123', 'ì—¬', '123@123', '2016-12-13 (03:36)'),
('ìš°ì˜ì•„', '1996627', 'oa0328', 'oa0629', 'ëŒ€êµ¬ ì„œêµ¬ ë¹„ì‚° 2,3 118-6', '01077135539', 'ì—¬', 'oa0328@naver.com', '2016-12-12 (08:40)'),
('root', '', 'root', '3696', '', '', '', '', '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

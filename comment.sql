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
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `c_no` int(11) NOT NULL,
  `c_user` varchar(20) NOT NULL,
  `c_comment` varchar(1000) NOT NULL,
  `c_date` varchar(50) NOT NULL,
  `b_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`c_no`, `c_user`, `c_comment`, `c_date`, `b_no`) VALUES
(2, 'oa0328', 'ã…‡ã…‡ã…Žã„´ã…', '2016-12-15 (02:32)', 453),
(3, 'oa0328', 'ã…ã„´ã…‡ã…Ž', '2016-12-15 (02:48)', 453),
(4, 'oa0328', 'ê¹€ë•¡ë•¡í•˜ë„¤ì—¬;;', '2016-12-15 (02:53)', 443),
(5, 'oa0328', 'ì›…ì—¥ì›…ì—¥', '2016-12-15 (02:55)', 452),
(6, 'oa0328', 'ì›…ã…‡ì—ìš°ì—¥', '2016-12-15 (02:56)', 455),
(7, 'oa0328', 'ì›…ã…‡ì—ìš°ì—¥ã„±ë€¨ì—¥', '2016-12-15 (02:56)', 455),
(8, 'oa0328', 'ì›…ã…‡ì—ìš°ì—¥ã„±ë€¨ì—¥ìœ¼ì—ìœ¼ã…”ã…Žã…Ž', '2016-12-15 (02:56)', 455),
(9, 'oa0328', 'ã…‡ã„´ã…ã…Ž', '2016-12-15 (03:00)', 455),
(10, 'oa0328', 'ê»­ì—ã…¡ì—¥', '2016-12-15 (03:01)', 455),
(11, 'oa0328', 'ìœ™ìœ™!', '2016-12-15 (13:50)', 442),
(12, 'oa0328', 'ìží­ ìŠ¤í€€ìŠ¤ ë°œë™!', '2016-12-15 (13:50)', 442);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_no`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `c_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

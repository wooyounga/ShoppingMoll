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
-- 테이블 구조 `goods`
--

CREATE TABLE `goods` (
  `g_name` varchar(50) NOT NULL,
  `g_art` varchar(50) NOT NULL,
  `g_price` int(11) NOT NULL,
  `g_sum` int(11) NOT NULL,
  `g_img` varchar(50) NOT NULL,
  `g_part` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `goods`
--

INSERT INTO `goods` (`g_name`, `g_art`, `g_price`, `g_sum`, `g_img`, `g_part`) VALUES
('Death Cure', 'James Dashner ', 15000, 70, 'death_cure.jpg', 'book'),
('Kill Order', 'James Dashner ', 15000, 50, 'kill_order.jpg', 'book'),
('Maze Runner', 'James Dashner ', 15000, 50, 'maze_runner.jpg', 'book'),
('Maze Runner Blu-ray', 'Wes Ball', 32000, 50, '161215024837maze_runner_bd.jpg', 'dvd_bd'),
('Maze Runner DVD', 'Wes Ball', 26000, 50, 'maze_runner_dvd.jpg', 'dvd_bd'),
('Maze Runner Post', 'James Dashner', 5000, 50, '161215124808The-Maze-Runner-46.jpg', 'book'),
('Scorch Trials', 'James Dashner ', 15000, 50, 'scorch_trials.jpg', 'book'),
('Scorch Trials Blu-ray', 'Wes Ball', 32000, 50, 'scorch_trials_bd.jpg', 'dvd_bd'),
('Scorch Trials DVD', 'Wes Ball', 26000, 50, 'scorch_trials_dvd.jpg', 'dvd_bd');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`g_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

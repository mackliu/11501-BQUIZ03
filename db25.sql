-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-07-07 03:36:24
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db25`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(2, '失速禁區', 3, 120, '2026-07-06', '院線片01發行商', '院線片01導演', '03B01v.mp4', '03B01.png', '院線片01劇情院線片01劇情院線片01劇情院線片01劇情院線片01劇情院線片01劇情院線片01劇情院線片01劇情院線片01劇情院線片01劇情院線片01劇情院線片01劇情', 0, 3),
(4, '小小兵-大集合', 4, 110, '2026-07-05', '院線片03發行商', '院線片03導演', '03B21v.mp4', '03B08.png', '院線片03劇情院線片03劇情院線片03劇情院線片03劇情院線片03劇情院線片03劇情院線片03劇情院線片03劇情院線片03劇情院線片03劇情院線片03劇情院線片03劇情', 1, 1),
(5, '院線片04', 2, 110, '2026-07-07', '院線片03發行商', '院線片03導演', '03B04v.mp4', '03B04.png', '院線片04劇情院線片04劇情院線片04劇情院線片04劇情院線片04劇情院線片04劇情院線片04劇情院線片04劇情院線片04劇情院線片04劇情', 1, 4),
(6, '院線片05', 3, 90, '2026-07-07', '院線片03發行商', '院線片03導演', '03B05v.mp4', '03B05.png', '院線片05劇情院線片05劇情院線片05劇情院線片05劇情院線片05劇情院線片05劇情院線片05劇情院線片05劇情院線片05劇情院線片05劇情', 1, 5),
(7, '院線片06', 2, 130, '2026-07-06', '院線片03發行商', '院線片03導演', '03B06v.mp4', '03B06.png', '院線片06劇情院線片06劇情院線片06劇情院線片06劇情院線片06劇情院線片06劇情院線片06劇情院線片06劇情院線片06劇情院線片06劇情', 1, 6),
(8, '院線片07', 3, 110, '2026-07-06', '院線片03發行商', '院線片03導演', '03B07v.mp4', '03B07.png', '院線片07劇情院線片07劇情院線片07劇情院線片07劇情院線片07劇情院線片07劇情院線片07劇情院線片07劇情院線片07劇情院線片07劇情', 1, 7),
(9, '院線片08', 2, 110, '2026-07-05', '院線片03發行商', '院線片03導演', '03B08v.mp4', '03B08.png', '院線片08劇情院線片08劇情院線片08劇情院線片08劇情院線片08劇情院線片08劇情院線片08劇情院線片08劇情院線片08劇情院線片08劇情', 1, 8),
(10, '院線片09', 2, 110, '2026-07-07', '院線片03發行商', '院線片03導演', '03B09v.mp4', '03B09.png', '院線片09劇情院線片09劇情院線片09劇情院線片09劇情院線片09劇情院線片09劇情院線片09劇情院線片09劇情院線片09劇情院線片09劇情', 1, 9),
(11, '院線片10', 2, 110, '2026-07-05', '院線片03發行商', '院線片03導演', '03B10v.mp4', '03B10.png', '院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情', 1, 10),
(12, '人夫總動員', 2, 110, '2026-07-05', '院線片03發行商', '院線片03導演', '03B11v.mp4', '03B11.png', '院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情院線片10劇情', 0, 11),
(13, '院線片12', 2, 110, '2026-07-06', '院線片03發行商', '院線片03導演', '03B12v.mp4', '03B12.png', '院線片12劇情院線片12劇情院線片12劇情院線片12劇情院線片12劇情院線片12劇情院線片12劇情院線片12劇情院線片12劇情院線片12劇情', 0, 12),
(14, '院線片13', 2, 110, '2026-07-05', '院線片03發行商', '院線片03導演', '03B13v.mp4', '03B13.png', '院線片13劇情院線片13劇情院線片13劇情院線片13劇情院線片13劇情院線片13劇情院線片13劇情院線片13劇情院線片13劇情院線片13劇情', 0, 13);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `movie` text NOT NULL,
  `day` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `movie`, `day`, `session`, `qt`, `seats`) VALUES
(3, '202607060003', '院線片03', '2026-07-07', '20:00~22:00', 1, 'a:1:{i:0;i:2;}'),
(12, '202607070002', '院線片02', '2026-07-06', '22:00~24:00', 4, 'a:4:{i:0;i:13;i:1;i:10;i:2;i:12;i:3;i:15;}'),
(15, '202607070005', '院線片02', '2026-07-06', '14:00~16:00', 2, 'a:2:{i:0;i:0;i:1;i:8;}'),
(16, '202607070006', '院線片02', '2026-07-06', '14:00~16:00', 3, 'a:3:{i:0;i:7;i:1;i:11;i:2;i:10;}'),
(17, '202607070007', '院線片02', '2026-07-07', '16:00~18:00', 1, 'a:1:{i:0;i:6;}'),
(18, '202607070008', '院線片03', '2026-07-06', '20:00~22:00', 3, 'a:3:{i:0;i:6;i:1;i:6;i:2;i:10;}'),
(20, '202607070010', '院線片02', '2026-07-07', '22:00~24:00', 3, 'a:3:{i:0;i:1;i:1;i:16;i:2;i:16;}');

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(1) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `sh`, `rank`, `ani`, `img`) VALUES
(1, '鐵拳教育', 1, 3, 1, '03A01.jpg'),
(2, '金部長:本色回歸', 0, 2, 1, '03A02.jpg'),
(3, '欠你的那場婚禮', 1, 4, 1, '03A03.jpg'),
(4, '預告片4', 0, 1, 1, '03A04.jpg'),
(5, '預告片5', 1, 6, 1, '03A05.jpg');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

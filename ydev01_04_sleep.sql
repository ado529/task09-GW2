-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-12-16 15:38:39
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ydev01_04_sleep`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `login_table`
--

CREATE TABLE `login_table` (
  `number` int(11) NOT NULL,
  `id` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `login_table`
--

INSERT INTO `login_table` (`number`, `id`, `password`) VALUES
(11, 'kenji', '$2y$10$7v4NhkusY5wB5ZThgwf5NO0jbGFS.lqgY1TIYZqLZRYOwbDS7eHZ2'),
(12, 'iroha', '$2y$10$Wk6AL4wZTldNQ5vEkr54NehuN2SF88h.2rEA5NtZEKhR84tqWYuuK'),
(14, 'koichi', '$2y$10$cBaGqKNrJQfsI5sKINMYx.PiF/4ftIbjUYSMJ0KqB5DV5qUFvT5bG'),
(15, 'yutaka', '$2y$10$RHzuOtShVk4WiIdQbzfs4eMjytXIkSw5rzgP1MLjH.CU3Ti/8/bgS'),
(16, 'masatoshi', '$2y$10$4Gb2mVOW8ge8IwAf.oErA.KbzJBo0jKy0TfxEOBoqqPU1IuuWzeHi'),
(17, 'masaharu', '$2y$10$ehHZ0j8Cvfwyg6Df/boImOJSKZkwAOPAoEj1EtDrvSIBEmBY.e6we'),
(18, 'nikoru', '$2y$10$7FjjJbXoLA/xGeoKdcNzJubkbqsizItroh4vh3ODHy8fV3OofT7T2'),
(19, 'tomochika', '$2y$10$nQnw7Gh875ZSpzp3/Jx5O.6tYhrXqil.j/X/ZbiVJR.9P56DktCHe');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`number`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `login_table`
--
ALTER TABLE `login_table`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

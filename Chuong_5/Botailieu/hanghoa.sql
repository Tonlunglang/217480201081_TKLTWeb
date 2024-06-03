-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2024 lúc 04:35 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahang` varchar(4) NOT NULL COMMENT 'Mã hàng',
  `tenhang` varchar(40) NOT NULL COMMENT 'Tên hàng',
  `mansx` varchar(2) NOT NULL COMMENT 'Mã nhà sản xuất',
  `namsx` int(11) NOT NULL COMMENT 'Năm sản xuất',
  `gia` int(11) NOT NULL COMMENT 'Giá bán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Danh dách hàng hóa';

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahang`, `tenhang`, `mansx`, `namsx`, `gia`) VALUES
('AS01', 'Asus TUF', 'AS', 2017, 520),
('AS02', 'Asus Vivobook', 'AS', 2017, 580),
('DE01', 'Dell Vostro', 'DE', 2015, 650),
('DE02', 'Del Inspiron', 'DE', 2015, 550),
('LE01', 'Lenovo Thinkpad', 'LE', 2019, 750),
('LE02', 'Lenovo Legion', 'LE', 2020, 540),
('LE03', 'Lenovo Yoga', 'LE', 2020, 600),
('TO01', 'Toshiba Satellite', 'TO', 2014, 630);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahang`),
  ADD KEY `HangHoa` (`mansx`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `HangHoa` FOREIGN KEY (`mansx`) REFERENCES `nhasanxuat` (`mansx`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

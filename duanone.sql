-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 05:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duanone`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `user` varchar(22) NOT NULL,
  `first_name` varchar(22) NOT NULL,
  `last_name` varchar(22) NOT NULL,
  `address` varchar(222) NOT NULL,
  `password` varchar(55) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone_number` int(22) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user`, `first_name`, `last_name`, `address`, `password`, `email`, `phone_number`, `role`) VALUES
(1, 'Hoang Anh', 'Hoàng', 'Dũng', 'Thành phố Hà Nội | Quận Đống Đa | Phường Nam Đồng', '12345', 'dunghaph19791@fpt.edu.vn', 355797746, 1),
(6, 'Ly Anh Tuan', 'Ly', 'Tuan', 'Ha Tinh', '123', 'Vunqph27938@fpt.edu.vn', 906028390, 0),
(8, 'Phan Van Luan', 'Phan', 'Luan', '114 HN', '1234', 'dung2@mail.com', 906028390, 0),
(10, 'HoangDung', '', '', '96 Hoe Thi', '', 'dung@gmail.com', 355797746, 0),
(11, 'AnhTuan', '', '', '12 Hoe Thi', '', 'dung@gmail.com', 355797746, 0),
(12, 'Tuan', '', '', 'Ha Tinh', '', 'dung@gmail.com', 906028390, 0),
(13, 'Anh Tuan', '', '', 'Ha Noi', '', 'Vunqph27938@fpt.edu.vn', 906028390, 0),
(14, 'Luan', '', '', 'HaNoi', '', 'Vunqph27938@fpt.edu.vn', 906028390, 0),
(15, 'Luan', '', '', 'Ha Tinh', '', 'dunghaph19791@fpt.edu.vn', 906028390, 0),
(16, 'Luan dz', '', '', 'Ha Tinh', '', 'dung@gmail.com', 906028390, 0),
(17, 'VanVo', '', '', 'Ha Tinh', '', 'Vo2@gmail.com', 906028390, 0),
(19, 'HoangAnhTu', '', '', 'HaNoi', '', 'tu@gmail.com', 355797746, 0),
(20, 'PhanVanLuan', '', '', 'Ha Noi', '', 'Luan@gmail.com', 906028390, 0),
(21, 'Van Vo', '', '', 'HN', '', 'dung@gmail.com', 906028390, 0),
(22, 'VuQuan', '', '', 'HN', '', 'dung2@gmail.com', 906028390, 0),
(23, 'Quan', '', '', 'HN', '', 'dung@gmail.com', 906028390, 0),
(24, 'vo', '', '', 'dê la thành', '', 'h@gmail.com', 988888888, 0),
(25, 'DinhQuan', '', '', 'HN', '', 'dung2@mail.com', 988888888, 0),
(26, 'HoangAnhDung', '', '', 'HN', '', 'dung2@gmail.com', 355797746, 0),
(27, 'HoangAnhThai', '', '', 'HN', '', 'thai@gmail.com', 988888888, 0),
(28, 'HoangAnhLuan', '', '', 'HN', '', 'dung@gmail.com', 988888888, 0),
(29, 'dung123', '', '', 'vn', '', 'hoanganh@gmail.com', 906028390, 0),
(30, 'dunganh', '', '', 'hn', '', 'dung@gmail.com', 906028390, 0),
(32, 'HoangVanTu', '', '', 'Tỉnh Hoà Bình | Huyện Mai Châu | Xã Nà Phòn', '', 'tu@gmail.com', 0, 0),
(33, 'HoangAnhVu', '', '', 'Tỉnh Sơn La | Huyện Mộc Châu | Xã Tà Lai', '', 'dung@gmail.com', 988888888, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `bill_name` varchar(225) NOT NULL,
  `bill_address` varchar(225) NOT NULL,
  `bill_phone` int(222) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_payment_methods` varchar(100) NOT NULL COMMENT '1.thanh toán trực tiếp\r\n2.chuyển khoản\r\n3.thanh toán online',
  `order_date` varchar(50) NOT NULL,
  `date_order` date NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '0.đơn hàng mới\r\n1.đang xử lý\r\n2.đang giao hàng\r\n3.đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `id_user`, `bill_name`, `bill_address`, `bill_phone`, `bill_email`, `bill_payment_methods`, `order_date`, `date_order`, `total`, `bill_status`) VALUES
(116, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '03:10:01am 22/11/2022', '2022-11-22', 408, 0),
(117, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:11:31am 22/11/2022', '2022-11-22', 354, 0),
(118, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Online payment', '03:12:23am 22/11/2022', '2022-11-22', 399, 1),
(119, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:39:41pm 22/11/2022', '2022-11-22', 130, 0),
(120, 7, 'LyAnhTuan', 'Ha Noi', 906028390, 'hoanganhdung@gmail.com', 'Pay on delivery', '03:43:58pm 22/11/2022', '2022-11-22', 74, 2),
(121, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '01:32:35am 23/11/2022', '2022-11-23', 241, 0),
(122, 1, 'Hoang Anh Dung', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '02:26:48am 23/11/2022', '2022-11-23', 140, 0),
(123, 8, 'Phan Van Luan', '114', 906028390, 'dung2@mail.com', 'Bank transfer upon receipt', '02:30:02am 23/11/2022', '2022-11-23', 74, 0),
(124, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:23:58am 23/11/2022', '2022-11-23', 130, 0),
(125, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:58:29am 23/11/2022', '2022-11-23', 85, 0),
(126, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '04:12:05am 23/11/2022', '2022-11-23', 85, 0),
(127, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '04:15:24am 23/11/2022', '2022-11-23', 130, 2),
(128, 1, 'Hoang Anh Dung', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '04:33:30am 23/11/2022', '2022-11-23', 85, 3),
(129, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '05:17:42am 23/11/2022', '2022-11-23', 85, 1),
(130, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:17:37am 25/11/2022', '2022-11-25', 130, 3),
(134, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '04:48:12am 04/12/2022', '2022-12-04', 29, 0),
(135, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '04:48:46am 04/12/2022', '2022-12-04', 29, 0),
(136, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '04:52:50am 04/12/2022', '2022-12-04', 29, 0),
(137, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '04:53:55am 04/12/2022', '2022-12-04', 29, 0),
(138, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '04:58:06am 04/12/2022', '2022-12-04', 29, 0),
(139, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '04:58:24am 04/12/2022', '2022-12-04', 29, 0),
(140, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '04:59:10am 04/12/2022', '2022-12-04', 29, 0),
(141, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '04:59:54am 04/12/2022', '2022-12-04', 29, 2),
(142, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:00:56am 04/12/2022', '2022-12-04', 29, 0),
(143, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:02:12am 04/12/2022', '2022-12-04', 29, 0),
(144, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:03:00am 04/12/2022', '2022-12-04', 29, 0),
(145, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:03:50am 04/12/2022', '2022-12-04', 29, 0),
(146, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:04:23am 04/12/2022', '2022-12-04', 29, 0),
(147, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:05:15am 04/12/2022', '2022-12-04', 29, 3),
(148, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:07:09am 04/12/2022', '2022-12-04', 29, 2),
(149, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:07:53am 04/12/2022', '2022-12-04', 29, 0),
(150, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:08:28am 04/12/2022', '2022-12-04', 29, 0),
(151, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:08:54am 04/12/2022', '2022-12-04', 29, 0),
(152, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:09:40am 04/12/2022', '2022-12-04', 29, 1),
(153, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:13:54am 04/12/2022', '2022-12-04', 29, 0),
(154, 10, 'HoangDung', '96 Hoe Thi', 355797746, 'dung@gmail.com', 'Bank transfer upon receipt', '05:14:19am 04/12/2022', '2022-12-04', 29, 3),
(155, 6, 'Ly Anh Tuan', 'Ha Tinh', 906028390, 'Vunqph27938@fpt.edu.vn', 'Bank transfer upon receipt', '05:55:19am 04/12/2022', '2022-12-04', 29, 0),
(156, 16, 'Luan dz', 'Ha Tinh', 906028390, 'dung@gmail.com', 'Pay on delivery', '06:03:05am 04/12/2022', '2022-12-04', 29, 2),
(157, 17, 'VanVo', 'Ha Tinh', 906028390, 'Vo2@gmail.com', 'Pay on delivery', '03:04:48pm 04/12/2022', '2022-12-04', 29, 2),
(158, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:09:21pm 04/12/2022', '2022-12-04', 85, 2),
(159, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '03:21:38pm 04/12/2022', '2022-12-04', 74, 0),
(160, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '03:28:00am 05/12/2022', '2022-12-05', 74, 2),
(161, 21, 'Van Vo', 'HN', 906028390, 'dung@gmail.com', 'Bank transfer upon receipt', '03:35:19am 05/12/2022', '2022-12-05', 298, 3),
(162, 22, 'VuQuan', 'HN', 906028390, 'dung2@gmail.com', 'Pay on delivery', '03:41:46am 05/12/2022', '2022-12-05', 231, 0),
(163, 23, 'Quan', 'HN', 906028390, 'dung@gmail.com', 'Pay on delivery', '03:45:37am 05/12/2022', '2022-12-05', 175, 0),
(164, 24, 'vo', 'dê la thành', 988888888, 'h@gmail.com', '', '03:47:17am 05/12/2022', '2022-12-05', 85, 0),
(165, 24, 'vo', 'dê la thành', 988888888, 'h@gmail.com', 'Online payment', '03:47:25am 05/12/2022', '2022-12-05', 85, 2),
(166, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '04:28:23am 05/12/2022', '2022-12-05', 84, 1),
(167, 25, 'DinhQuan', 'HN', 988888888, 'dung2@mail.com', 'Bank transfer upon receipt', '04:33:51am 05/12/2022', '2022-12-05', 186, 0),
(168, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Online payment', '03:27:28am 06/12/2022', '2022-12-06', 74, 0),
(169, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Online payment', '03:27:35am 06/12/2022', '2022-12-06', 74, 0),
(170, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Online payment', '03:31:00am 06/12/2022', '2022-12-06', 74, 0),
(171, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:31:22am 06/12/2022', '2022-12-06', 74, 0),
(172, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:32:00am 06/12/2022', '2022-12-06', 74, 0),
(173, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:32:05am 06/12/2022', '2022-12-06', 74, 0),
(174, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:33:06am 06/12/2022', '2022-12-06', 74, 0),
(175, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '03:33:11am 06/12/2022', '2022-12-06', 74, 0),
(176, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '03:33:43am 06/12/2022', '2022-12-06', 74, 0),
(177, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '03:34:21am 06/12/2022', '2022-12-06', 74, 0),
(178, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Bank transfer upon receipt', '03:53:51am 06/12/2022', '2022-12-06', 74, 0),
(179, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:53:56am 06/12/2022', '2022-12-06', 74, 0),
(180, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:55:19am 06/12/2022', '2022-12-06', 74, 0),
(181, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Pay on delivery', '03:55:26am 06/12/2022', '2022-12-06', 74, 0),
(263, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '02:30:46pm 08/12/2022', '2022-12-08', 85, 0),
(264, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '02:32:26pm 08/12/2022', '2022-12-08', 85, 0),
(265, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Online VnPay', '02:35:09pm 08/12/2022', '2022-12-08', 85, 0),
(266, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '02:39:44pm 08/12/2022', '2022-12-08', 85, 0),
(267, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '05:55:33pm 08/12/2022', '2022-12-08', 85, 0),
(268, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '05:56:30pm 08/12/2022', '2022-12-08', 85, 0),
(269, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '05:56:58pm 08/12/2022', '2022-12-08', 85, 0),
(270, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '07:19:29pm 08/12/2022', '2022-12-08', 74, 0),
(271, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '07:22:51pm 08/12/2022', '2022-12-08', 74, 0),
(272, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '07:23:12pm 08/12/2022', '2022-12-08', 74, 0),
(273, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '07:23:58pm 08/12/2022', '2022-12-08', 74, 0),
(274, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '07:24:27pm 08/12/2022', '2022-12-08', 74, 0),
(275, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '07:25:11pm 08/12/2022', '2022-12-08', 74, 0),
(276, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '07:29:26pm 08/12/2022', '2022-12-08', 74, 0),
(277, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '07:33:42pm 08/12/2022', '2022-12-08', 74, 0),
(278, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Receive goods before payment', '07:34:27pm 08/12/2022', '2022-12-08', 74, 0),
(279, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'momo', '07:35:48pm 08/12/2022', '2022-12-08', 74, 0),
(280, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'momo', '07:40:23pm 08/12/2022', '2022-12-08', 74, 0),
(281, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'Online VnPay', '07:40:35pm 08/12/2022', '2022-12-08', 74, 0),
(282, 1, 'Hoang Anh', 'Hà Nội', 355797746, 'dunghaph19791@fpt.edu.vn', 'momo', '07:42:16pm 08/12/2022', '2022-12-08', 74, 0),
(287, 1, 'Hoang Anh', 'Tỉnh Hà Giang | Huyện Mèo Vạc | Xã Tả Lủng', 355797746, 'dunghaph19791@fpt.edu.vn', 'Receive goods before payment', '04:20:21pm', '2022-12-09', 85, 2),
(288, 32, 'HoangVanTu', 'Tỉnh Hoà Bình | Huyện Mai Châu | Xã Nà Phòn', 906028390, 'tu@gmail.com', 'Bank transfer upon receipt', '11:00:52am', '2022-12-09', 141, 0),
(289, 32, 'HoangVanTu', 'Tỉnh Hoà Bình | Huyện Mai Châu | Xã Nà Phòn', 906028390, 'tu@gmail.com', 'Bank transfer upon receipt', '11:01:13am', '2022-12-09', 141, 1),
(290, 33, 'HoangAnhVu', 'Tỉnh Sơn La | Huyện Mộc Châu | Xã Tà Lai', 988888888, 'dung@gmail.com', 'Bank transfer upon receipt', '11:02:03am', '2022-12-09', 141, 2),
(291, 1, 'Hoang Anh', 'Thành phố Hà Nội | Quận Ba Đình | Phường Ngọc Hà', 355797746, 'dunghaph19791@fpt.edu.vn', 'Receive goods before payment', '09:03:10pm', '2022-12-09', 84, 0),
(292, 1, 'Hoang Anh', 'Thành phố Hà Nội | Quận Ba Đình | Phường Ngọc Hà', 355797746, 'dunghaph19791@fpt.edu.vn', 'Receive goods before payment', '09:03:47pm', '2022-12-09', 84, 0),
(293, 1, 'Hoang Anh', 'Tỉnh Phú Thọ | Huyện Thanh Ba | Xã Khải Xuân', 355797746, 'dunghaph19791@fpt.edu.vn', 'PayPal', '09:04:35pm', '2022-12-09', 85, 0),
(294, 1, 'Hoang Anh', 'Thành phố Hà Nội | Quận Ba Đình | Phường Nguyễn Trung Trực', 355797746, 'dunghaph19791@fpt.edu.vn', 'momo', '09:05:54pm', '2022-12-09', 85, 0),
(295, 1, 'Hoang Anh', '', 355797746, 'dunghaph19791@fpt.edu.vn', 'Online VnPay', '09:07:19pm', '2022-12-09', 85, 0),
(296, 1, 'Hoang Anh', 'Thành phố Hà Nội | Quận Ba Đình | Phường Ngọc Hà', 355797746, 'dunghaph19791@fpt.edu.vn', 'Online VnPay', '09:09:43pm', '2022-12-09', 85, 0),
(297, 1, 'Hoang Anh', '', 355797746, 'dunghaph19791@fpt.edu.vn', 'momo', '09:22:08pm', '2022-12-09', 84, 0),
(298, 1, 'Hoang Anh', '', 355797746, 'dunghaph19791@fpt.edu.vn', 'momo', '09:24:06pm', '2022-12-09', 84, 0),
(299, 1, 'Hoang Anh', 'Tỉnh Hà Giang | Huyện Đồng Văn | Xã Tả Phìn', 355797746, 'dunghaph19791@fpt.edu.vn', 'momo', '09:24:18pm', '2022-12-09', 84, 0),
(300, 1, 'Hoang Anh', 'Tỉnh Hà Giang | Huyện Đồng Văn | Xã Tả Phìn', 355797746, 'dunghaph19791@fpt.edu.vn', 'momo', '09:26:34pm', '2022-12-09', 84, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_momo`
--

CREATE TABLE `bill_momo` (
  `id_momo` int(10) NOT NULL,
  `partnercode` varchar(100) NOT NULL,
  `order_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `order_info` varchar(100) NOT NULL,
  `order_type` varchar(100) NOT NULL,
  `trans_id` int(10) NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `code_cart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_momo`
--

INSERT INTO `bill_momo` (`id_momo`, `partnercode`, `order_id`, `amount`, `order_info`, `order_type`, `trans_id`, `pay_type`, `code_cart`) VALUES
(1, 'MOMOBKUN20180529', 1670503339, '1035000', 'Thanh toán qua MoMo', ' momo_wallet', 2147483647, 'napas', '282'),
(2, 'MOMOBKUN20180529', 1670594757, '1288000', 'Thanh toán qua MoMo', ' momo_wallet', 2147483647, 'napas', '294');

-- --------------------------------------------------------

--
-- Table structure for table `bill_vnpay`
--

CREATE TABLE `bill_vnpay` (
  `id_vnpay` int(10) NOT NULL,
  `vnp_amount` varchar(50) NOT NULL,
  `vnp_bankcode` varchar(50) NOT NULL,
  `vnp_banktranno` varchar(50) NOT NULL,
  `vnp_cardtype` varchar(50) NOT NULL,
  `vnp_orderinfo` varchar(50) NOT NULL,
  `vnp_paydate` varchar(50) NOT NULL,
  `vnp_tmncode` varchar(50) NOT NULL,
  `vnp_transactionstatus` varchar(50) NOT NULL,
  `code_cart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_vnpay`
--

INSERT INTO `bill_vnpay` (`id_vnpay`, `vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionstatus`, `code_cart`) VALUES
(7, '7400000', ' NCB', 'VNP13896274', 'ATM', 'Thanh toán thành công', '20221206152255', 'ILLO4KB4', '13896274', '197'),
(8, '7400000', ' NCB', 'VNP13896548', 'ATM', 'Thanh toán thành công', '20221206170856', 'ILLO4KB4', '13896548', '205'),
(9, '7400000', ' NCB', 'VNP13896548', 'ATM', 'Thanh toán thành công', '20221206170856', 'ILLO4KB4', '13896548', '205'),
(10, '7400000', ' NCB', 'VNP13896548', 'ATM', 'Thanh toán thành công', '20221206170856', 'ILLO4KB4', '13896548', '205'),
(11, '11900000', ' VNPAY', '', 'QRCODE', 'Thanh toán thành công', '20221207112915', 'ILLO4KB4', '0', '221'),
(12, '8500000', ' NCB', 'VNP13897867', 'ATM', 'Thanh toán thành công', '20221207211122', 'ILLO4KB4', '13897867', '258'),
(13, '8500000', ' NCB', 'VNP13897887', 'ATM', 'Thanh toán thành công', '20221207213436', 'ILLO4KB4', '13897887', '261'),
(14, '8500000', ' NCB', 'VNP13898455', 'ATM', 'Thanh toán thành công', '20221208143627', 'ILLO4KB4', '13898455', '265'),
(15, '7400000', ' NCB', 'VNP13898851', 'ATM', 'Thanh toán thành công', '20221208194118', 'ILLO4KB4', '13898851', '281'),
(16, '8500000', ' NCB', 'VNP13899998', 'ATM', 'Thanh toán thành công', '20221209210853', 'ILLO4KB4', '13899998', '295'),
(17, '8500000', ' NCB', 'VNP13900000', 'ATM', 'Thanh toán thành công', '20221209211016', 'ILLO4KB4', '13900000', '296');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `id_products` int(10) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `number` int(3) NOT NULL,
  `into_money` int(10) NOT NULL,
  `id_bill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_products`, `image`, `name`, `price`, `number`, `into_money`, `id_bill`) VALUES
(254, 1, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 116),
(255, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 116),
(256, 1, 46, 'hitea-5.jpg', 'Hi Tea Đá Tuyết Yuzu Vải', 56, 1, 56, 116),
(257, 1, 46, 'hitea-5.jpg', 'Hi Tea Đá Tuyết Yuzu Vải', 56, 1, 56, 116),
(258, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 116),
(259, 1, 38, 'tea-1.jpg', 'Trà Long Nhãn Hạt Sen', 44, 1, 44, 116),
(260, 1, 37, 'cloudTea-4.jpg', 'CloudTea Oolong Nướng Kem Dừa Đá Xay', 55, 1, 55, 116),
(261, 1, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 117),
(262, 1, 43, 'hitea-2.jpg', 'Hi Tea Xoài Aloe Vera', 45, 1, 45, 117),
(263, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 117),
(264, 1, 43, 'hitea-2.jpg', 'Hi Tea Xoài Aloe Vera', 45, 1, 45, 117),
(265, 1, 30, 'cloudTea-1.jpg', 'CloudFee Hạnh Nhân Nướng', 34, 1, 34, 117),
(266, 1, 27, 'coffe-17.jpg', 'Cold Brew Phúc Bồn Tử', 45, 1, 45, 117),
(267, 1, 38, 'tea-1.jpg', 'Trà Long Nhãn Hạt Sen', 44, 1, 44, 117),
(268, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 118),
(269, 1, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 118),
(270, 1, 46, 'hitea-5.jpg', 'Hi Tea Đá Tuyết Yuzu Vải', 56, 1, 56, 118),
(271, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 118),
(272, 1, 43, 'hitea-2.jpg', 'Hi Tea Xoài Aloe Vera', 45, 1, 45, 118),
(273, 1, 32, 'cloudFee-3.jpg', 'CloudFee Classic', 56, 1, 56, 118),
(274, 1, 51, 'bread-5.jpg', 'Croissant trứng muối', 45, 1, 45, 118),
(275, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 119),
(276, 1, 51, 'bread-5.jpg', 'Croissant trứng muối', 45, 1, 45, 119),
(277, 7, 56, 'other-1.jpg', 'Chocolate Đá', 45, 1, 45, 120),
(278, 1, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 121),
(279, 1, 37, 'cloudTea-4.jpg', 'CloudTea Oolong Nướng Kem Dừa Đá Xay', 55, 1, 55, 121),
(280, 1, 49, 'bread-3.jpg', 'Bánh Mì Que Pate', 45, 1, 45, 121),
(281, 1, 36, 'cloudTea-3.jpg', 'CloudTea Hồng Trà Arabica', 56, 1, 56, 121),
(282, 1, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 122),
(283, 1, 37, 'cloudTea-4.jpg', 'CloudTea Oolong Nướng Kem Dừa Đá Xay', 55, 1, 55, 122),
(284, 8, 51, 'bread-5.jpg', 'Croissant trứng muối', 45, 1, 45, 123),
(285, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 124),
(286, 1, 46, 'hitea-5.jpg', 'Hi Tea Đá Tuyết Yuzu Vải', 56, 1, 56, 124),
(287, 1, 46, 'hitea-5.jpg', 'Hi Tea Đá Tuyết Yuzu Vải', 56, 1, 56, 125),
(288, 1, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 126),
(289, 1, 51, 'bread-5.jpg', 'Croissant trứng muối', 45, 1, 45, 127),
(290, 1, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 127),
(291, 1, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 128),
(292, 1, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 129),
(293, 1, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 130),
(294, 1, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 130),
(295, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 134),
(296, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 135),
(297, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 136),
(298, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 137),
(299, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 138),
(300, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 139),
(301, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 140),
(302, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 141),
(303, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 142),
(304, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 143),
(305, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 144),
(306, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 145),
(307, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 146),
(308, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 147),
(309, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 148),
(310, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 149),
(311, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 150),
(312, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 151),
(313, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 152),
(314, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 153),
(315, 10, 56, 'other-1.jpg', 'Chocolate Đá Đường', 45, 1, 45, 153),
(316, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 153),
(317, 10, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 153),
(318, 10, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 153),
(319, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 154),
(320, 10, 56, 'other-1.jpg', 'Chocolate Đá Đường', 45, 1, 45, 154),
(321, 10, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 154),
(322, 10, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 154),
(323, 10, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 154),
(324, 6, 56, 'other-1.jpg', 'Chocolate Đá Đường', 45, 1, 45, 155),
(325, 6, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 155),
(326, 6, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 155),
(327, 16, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 156),
(328, 16, 50, 'bread-4.jpg', 'Bánh Mì VN Thịt ', 45, 1, 45, 156),
(329, 16, 56, 'other-1.jpg', 'Chocolate Đá Đường', 45, 1, 45, 156),
(330, 17, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 157),
(331, 17, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 157),
(332, 17, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 157),
(333, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 158),
(334, 1, 56, 'other-1.jpg', 'Chocolate Đá Đường', 45, 1, 45, 159),
(335, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 160),
(336, 21, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 161),
(337, 21, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 161),
(338, 21, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 161),
(339, 21, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 161),
(340, 21, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 161),
(341, 22, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 162),
(342, 22, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 162),
(343, 22, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 162),
(344, 22, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 162),
(345, 23, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 163),
(346, 23, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 163),
(347, 23, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 163),
(348, 24, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 164),
(349, 24, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 165),
(350, 1, 37, 'cloudTea-4.jpg', 'CloudTea Oolong Nướng Kem Dừa Đá Xay', 55, 1, 55, 166),
(351, 25, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 167),
(352, 25, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 167),
(353, 25, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 167),
(354, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 171),
(355, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 172),
(356, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 173),
(357, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 174),
(358, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 175),
(359, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 176),
(360, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 177),
(361, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 178),
(362, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 179),
(363, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 180),
(364, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 181),
(365, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 182),
(366, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 183),
(367, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 184),
(368, 1, 39, 'tea-2.jpg', 'Trà Đào Cam Sả Đá', 45, 1, 45, 185),
(369, 1, 33, 'cloudFee-4.jpg', 'CloudFee Pandan Coconut', 45, 1, 45, 196),
(370, 1, 33, 'cloudFee-4.jpg', 'CloudFee Pandan Coconut', 45, 1, 45, 197),
(371, 1, 33, 'cloudFee-4.jpg', 'CloudFee Pandan Coconut', 45, 1, 45, 198),
(372, 1, 33, 'cloudFee-4.jpg', 'CloudFee Pandan Coconut', 45, 1, 45, 199),
(373, 1, 33, 'cloudFee-4.jpg', 'CloudFee Pandan Coconut', 45, 1, 45, 204),
(374, 1, 33, 'cloudFee-4.jpg', 'CloudFee Pandan Coconut', 45, 1, 45, 205),
(375, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 206),
(376, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 207),
(377, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 208),
(378, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 0),
(379, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 209),
(380, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 210),
(381, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 211),
(382, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 212),
(383, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 213),
(384, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 214),
(385, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 215),
(386, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 216),
(387, 1, 40, 'tea-3.jpg', 'Trà Đào Cam Sả Nóng', 56, 1, 56, 217),
(388, 1, 31, 'cloudTea-2.jpg', 'CloudFee Caramel', 45, 1, 45, 218),
(389, 1, 29, 'coffe-19.jpg', 'Cold Brew Truyền Thống', 45, 1, 45, 218),
(390, 1, 31, 'cloudTea-2.jpg', 'CloudFee Caramel', 45, 1, 45, 221),
(391, 1, 28, 'coffe-18.jpg', 'Cold Brew Sữa Tươi', 45, 1, 45, 221),
(392, 1, 20, 'coffe-10.jpg', 'Caramel Macchiato Nóng', 50, 1, 50, 0),
(393, 1, 20, 'coffe-10.jpg', 'Caramel Macchiato Nóng', 50, 1, 50, 241),
(394, 1, 20, 'coffe-10.jpg', 'Caramel Macchiato Nóng', 50, 1, 50, 241),
(395, 1, 20, 'coffe-10.jpg', 'Caramel Macchiato Nóng', 50, 1, 50, 242),
(396, 1, 36, 'cloudTea-3.jpg', 'CloudTea Hồng Trà Arabica', 56, 1, 56, 257),
(397, 1, 36, 'cloudTea-3.jpg', 'CloudTea Hồng Trà Arabica', 56, 1, 56, 258),
(398, 1, 36, 'cloudTea-3.jpg', 'CloudTea Hồng Trà Arabica', 56, 1, 56, 259),
(399, 1, 36, 'cloudTea-3.jpg', 'CloudTea Hồng Trà Arabica', 56, 1, 56, 261),
(400, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 263),
(401, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 265),
(402, 1, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 278),
(403, 1, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 281),
(404, 1, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 282),
(405, 1, 28, 'coffe-18.jpg', 'Cold Brew Sữa Tươi', 45, 1, 45, 283),
(406, 1, 36, 'cloudTea-3.jpg', 'CloudTea Hồng Trà Arabica', 56, 1, 56, 284),
(407, 1, 36, 'cloudTea-3.jpg', 'CloudTea Hồng Trà Arabica', 56, 1, 56, 285),
(408, 1, 42, 'hitea-1.jpg', 'Hi Tea Phúc Bồn Tử', 45, 1, 45, 286),
(409, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 287),
(410, 32, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 288),
(411, 32, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 288),
(412, 32, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 289),
(413, 32, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 289),
(414, 33, 45, 'hitea-4.jpg', 'Hi Tea Đá Tuyết Xoài Đào', 56, 1, 56, 290),
(415, 33, 44, 'hitea-3.jpg', 'Hi Tea Dâu Tây Mận Muối', 56, 1, 56, 290),
(416, 1, 37, 'cloudTea-4.jpg', 'CloudTea Oolong Nướng Kem Dừa Đá Xay', 55, 1, 55, 291),
(417, 1, 37, 'cloudTea-4.jpg', 'CloudTea Oolong Nướng Kem Dừa Đá Xay', 55, 1, 55, 292),
(418, 1, 32, 'cloudFee-3.jpg', 'CloudFee Classic', 56, 1, 56, 293),
(419, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 294),
(420, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 295),
(421, 1, 41, 'tea-4.jpg', 'Trà Hạt Sen Đá', 56, 1, 56, 296);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name_ct` varchar(222) NOT NULL,
  `image_ct` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ct`, `image_ct`) VALUES
(4, 'Coffee', 'caphe-list-1.jpg'),
(5, 'CloudFee', 'cloudFee-list-2.jpg'),
(6, 'CloudTea', 'cloudTea-list-3.jpg'),
(7, 'Tea', 'tra-list-4.jpg'),
(8, 'Hi-Tea-Healthy', 'hitea-list-5.jpg'),
(9, 'Bread-Snack', 'bread-list-6.jpg'),
(10, 'At-Home', 'athome-list-7.jpg'),
(11, 'Other-Drinks', 'otherdrink-list-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user` varchar(222) NOT NULL,
  `contents` varchar(225) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `comment_date` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user`, `contents`, `id_user`, `id_pro`, `comment_date`) VALUES
(54, 'Hoang Anh', 'good', 1, 36, '03:15:27am 05/12/2022'),
(55, 'Hoang Anh', 'good', 1, 45, '03:28:19am 05/12/2022');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name_pro` varchar(222) NOT NULL,
  `price` int(22) NOT NULL,
  `image` varchar(222) NOT NULL,
  `describe` varchar(222) NOT NULL,
  `view` int(10) NOT NULL,
  `id_ct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_pro`, `price`, `image`, `describe`, `view`, `id_ct`) VALUES
(13, 'Cà Phê Sữa Đá', 29, 'coffe-2.jpg', 'Cà phê Đắk Lắk nguyên chất được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', 20, 4),
(14, 'Cà Phê Sữa Nóng', 45, 'coffe-3.jpg', 'Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', 14, 4),
(15, 'Bạc Sỉu', 29, 'coffe-3.jpg', 'Bạc sỉu chính là \"Ly sữa trắng kèm một chút cà phê\". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.', 18, 4),
(16, 'Bạc Sỉu Nóng', 35, 'coffe-4.jpg', 'Bạc sỉu chính là \"Ly sữa trắng kèm một chút cà phê\". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.', 21, 4),
(17, 'Cà Phê Đen Đá', 29, 'coffe-6.jpg', 'Không ngọt ngào như Bạc sỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà ', 6, 4),
(19, 'Caramel Macchiato Đá', 49, 'coffe-9.jpg', 'Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê', 12, 4),
(20, 'Caramel Macchiato Nóng', 50, 'coffe-10.jpg', 'Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.', 11, 4),
(21, 'Latte Đá', 45, 'coffe-11.jpg', 'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', 2, 4),
(22, 'Latte Nóng', 34, 'coffe-12.jpg', 'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', 11, 4),
(23, 'Americano Đá', 34, 'coffe-13.jpg', 'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.', 13, 4),
(24, 'Cappuccino Đá', 45, 'coffe-14.jpg', 'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.', 16, 4),
(26, 'Espresso Đá', 46, 'coffe-16.jpg', 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.', 17, 4),
(27, 'Cold Brew Phúc Bồn Tử', 45, 'coffe-17.jpg', 'Vị chua ngọt của trái phúc bồn tử, làm dậy lên hương vị trái cây tự nhiên vốn sẵn có trong hạt cà phê, hòa quyện thêm vị đăng đắng, ngọt dịu nhẹ nhàng của Cold Brew 100% hạt Arabica Cầu Đất để mang đến một cách thưởng thức', 11, 4),
(28, 'Cold Brew Sữa Tươi', 45, 'coffe-18.jpg', 'Thanh mát và cân bằng với hương vị cà phê nguyên bản 100% Arabica Cầu Đất cùng sữa tươi thơm béo cho từng ngụm tròn vị, hấp dẫn.', 17, 4),
(29, 'Cold Brew Truyền Thống', 45, 'coffe-19.jpg', 'Tại The Coffee House, Cold Brew được ủ và phục vụ mỗi ngày từ 100% hạt Arabica Cầu Đất với hương gỗ thông, hạt dẻ, nốt sô-cô-la đặc trưng, thoang thoảng hương khói nhẹ giúp Cold Brew giữ nguyên vị tươi mới.', 18, 4),
(30, 'CloudFee Hạnh Nhân Nướng', 34, 'cloudTea-1.jpg', 'Vị đắng nhẹ từ cà phê phin truyền thống kết hợp Espresso Ý, lẫn chút ngọt ngào của kem sữa và lớp foam trứng cacao, nhấn thêm hạnh nhân nướng thơm bùi, kèm topping thạch cà phê dai giòn mê ly. Tất cả cùng quyện hoà tron', 5, 5),
(31, 'CloudFee Caramel', 45, 'cloudTea-2.jpg', 'Ngon khó cưỡng bởi xíu đắng nhẹ từ cà phê phin truyền thống pha trộn với Espresso lừng danh nước Ý, quyện vị kem sữa và caramel ngọt ngọt, thêm lớp foam trứng cacao bồng bềnh béo mịn, kèm topping thạch cà phê dai giòn ', 12, 5),
(32, 'CloudFee Classic', 56, 'cloudFee-3.jpg', 'Khiến bạn mê mẩn ngay ngụm đầu tiên bởi vị đắng nhẹ của cà phê phin truyền thống kết hợp Espresso Ý, quyện hòa cùng chút ngọt ngào của kem sữa, và thơm béo từ foam trứng cacao. Nhấp một ngụm rồi nhai cùng thạch cà ph', 25, 5),
(33, 'CloudFee Pandan Coconut', 45, 'cloudFee-4.jpg', 'Bắt đầu ngày mới với xíu đắng nhẹ của cà phê phin truyền thống kết hợp Espresso Ý, kèm chút ngọt ngào từ kem sữa, thêm ấn tượng bởi vị dừa lá dứa thơm béo đậm chất Việt Nam. Đặc biệt, nhân đôi độ ngon với topping thạch c', 12, 5),
(34, 'CloudTea Oolong Nướng Kem Cheese', 55, 'cloudTea-1.jpg', 'Hội mê cheese sao có thể bỏ lỡ chiếc trà sữa siêu mlem này. Món đậm vị Oolong nướng - nền trà được yêu thích nhất hiện nay, quyện thêm kem sữa thơm béo. Đặc biệt, chinh phục ngay fan ghiền cheese bởi lớp foam phô mai mềm t', 13, 6),
(35, 'CloudTea Oolong Nướng Caramel', 55, 'cloudTea-2.jpg', 'Chiếc trà sữa chân ái dành cho tín đồ hảo ngọt gọi tên CloudTea Oolong Nướng Caramel. Sự kết hợp của foam trứng béo mịn, caramel thơm lừng, trà Oolong nướng rõ vị quyện kem sữa ngọt ngào, làm tan chảy vị giác tựa khoảnh kh', 4, 6),
(36, 'CloudTea Hồng Trà Arabica', 56, 'cloudTea-3.jpg', 'Thức uống \"chân ái\" dành cho những ai vừa thích trà sữa ngọt ngào, êm dịu vừa mê cà phê đắng nhẹ, tỉnh táo. CloudTea Hồng Trà Arabica cực cuốn bởi lớp foam trứng bồng bềnh rắc thêm bột cacao thơm lừng. Vị thêm bùng nổ bởi ', 11, 6),
(37, 'CloudTea Oolong Nướng Kem Dừa Đá Xay', 55, 'cloudTea-4.jpg', 'Trà sữa đá xay - phiên bản nâng cấp đầy mới lạ của trà sữa truyền thống, lần đầu xuất hiện tại Nhà. Ngon khó cưỡng với lớp kem dừa béo ngậy nhưng không ngấy, thêm vụn bánh quy phô mai giòn tan vui miệng. Trà Oolong nướng r', 7, 6),
(39, 'Trà Đào Cam Sả Đá', 45, 'tea-2.jpg', 'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', 0, 7),
(40, 'Trà Đào Cam Sả Nóng', 56, 'tea-3.jpg', 'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', 0, 7),
(41, 'Trà Hạt Sen Đá', 56, 'tea-4.jpg', 'Nền trà oolong hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', 0, 7),
(42, 'Hi Tea Phúc Bồn Tử', 45, 'hitea-1.jpg', 'Nền trà Hibiscus thanh mát, quyện vị chua chua ngọt ngọt của phúc bồn tử 100% tự nhiên cùng quýt mọng nước mang đến cảm giác sảng khoái tức thì.', 0, 8),
(44, 'Hi Tea Dâu Tây Mận Muối', 56, 'hitea-3.jpg', 'Sự kết hợp độc đáo giữa 3 sắc thái hương vị khác nhau: trà hoa Hibiscus chua thanh, Mận muối mặn mặn và Dâu tây tươi Đà Lạt cô đặc ngọt dịu. Ngoài ra, topping Aloe Vera tươi mát, ngon ngất ngây, đẹp đắm say, hứa hẹn sẽ khu', 0, 8),
(45, 'Hi Tea Đá Tuyết Xoài Đào', 56, 'hitea-4.jpg', 'Những miếng đào vàng ươm kết hợp với đá tuyết vị xoài mát lành, cùng nền trà hoa Hibiscus chua dịu đem đến cảm giác lạ miệng, hấp dẫn đến tận ngụm cuối cùng.', 0, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_user_bill` (`id_user`);

--
-- Indexes for table `bill_momo`
--
ALTER TABLE `bill_momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Indexes for table `bill_vnpay`
--
ALTER TABLE `bill_vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_id_ct` (`id_ct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `bill_momo`
--
ALTER TABLE `bill_momo`
  MODIFY `id_momo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_vnpay`
--
ALTER TABLE `bill_vnpay`
  MODIFY `id_vnpay` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

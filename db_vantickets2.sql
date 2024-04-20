-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2024 at 03:09 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vantickets2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(50) NOT NULL,
  `admin_lname` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_tel` varchar(10) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_tel`, `admin_username`, `admin_password`, `admin_image`, `type_id`) VALUES
(21, 'จักรี', 'จินดาศักดิ์	', 'Chakkri@gmail.com', '0981031080', 'ohm', '1', '15022023195011_p1.jpg', 6),
(26, 'Tony', 'Tony', 'goto@gmail.com', '0952310692', 'goto1', '1', '16022023203258_p1.jpg', 6),
(27, 'go', 'to', 'goto123@gmail.com', '0827095329', 'goto', '1', '16022023205521_p1.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `bank_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `bank_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`bank_id`, `company_id`, `bank_name`, `bank_number`) VALUES
(1, 1, 'กรุงไทย', '5555511'),
(2, 1, 'กรุงเทพ', '111'),
(5, 5, 'กสิกรไทย', '0741621924'),
(6, 5, 'กรุงไทย', '4070721665');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cancel`
--

CREATE TABLE `tb_cancel` (
  `cancel_id` int(11) NOT NULL,
  `cancel_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_no` varchar(6) NOT NULL,
  `tickets_no` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_cancel`
--

INSERT INTO `tb_cancel` (`cancel_id`, `payment_no`, `tickets_no`) VALUES
(3, '', '599620'),
(4, '', '16401'),
(5, '', '603346'),
(6, '797644', '797644'),
(7, '', '948040'),
(8, '655983', '655983'),
(9, '', '599856'),
(10, '947063', '947063'),
(11, '', '917778'),
(12, '', '26523'),
(13, '', '502845'),
(14, '', '498827');

-- --------------------------------------------------------

--
-- Table structure for table `tb_carservice`
--

CREATE TABLE `tb_carservice` (
  `carservice_fname` varchar(50) NOT NULL,
  `carservice_lname` varchar(50) NOT NULL,
  `carservice_brand` varchar(30) NOT NULL,
  `carservice_number` varchar(5) NOT NULL,
  `company_id` int(11) NOT NULL,
  `carservice_vehicle` char(10) NOT NULL,
  `carservice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_carservice`
--

INSERT INTO `tb_carservice` (`carservice_fname`, `carservice_lname`, `carservice_brand`, `carservice_number`, `company_id`, `carservice_vehicle`, `carservice_id`) VALUES
('นายอิน', 'สาม', 'โตโยต้า', '17', 0, '888299', 0),
('หลงไหล', 'ขึ้นมาจริงๆ', 'โตโยต้า', '02', 5, 'กขค123', 2),
('กาโต้', 'เกรมเทล', 'โตโยต้า', '05', 5, 'กตต232', 5),
('กาย', 'ปอน', 'โตโยต้า', '10', 5, 'กยอ764', 10),
('องอาจ', 'อาจมีภัย', 'โตโยต้า', '01', 5, 'กสน442', 1),
('คุมะ', 'ม่อน', 'โตโยต้า', '07', 5, 'คมม542', 7),
('จาแรป', 'แจ๊ป', 'โตโยต้า', '04', 5, 'จจร112', 4),
('ทำลงกิต', 'พัคดีมาก', 'โตโยต้า', '12', 5, 'ทลพ223', 12),
('สมมุติ', 'งงมาก', 'โตโยต้า', '03', 5, 'พษ435', 3),
('ฟิน', 'กาย', 'โตโยต้า', '06', 5, 'ฟนก231', 6),
('สุขใจ', 'ใจเกินสุข', 'โตโยต้า', '13', 5, 'ลพล321', 13),
('วา', 'พันเทล้า', 'โตโยต้า', '09', 5, 'วพท856', 9),
('สมกิต', 'นาวา', 'โตโยต้า', '11', 5, 'สมน104', 11),
('หมอจิ๊บ', 'วิท', 'โตโยต้า', '08', 5, 'หมจ939', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `company_add` text NOT NULL,
  `company_tel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`company_id`, `company_name`, `company_add`, `company_tel`) VALUES
(5, 'บริษัทภูเขียวขนส่ง ', 'ภูเขียว,ชุมแพ,ขอนแก่น', '0981234587');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `employee_idcard` varchar(13) NOT NULL,
  `employee_user` varchar(50) NOT NULL,
  `employee_pass` varchar(50) NOT NULL,
  `employee_fname` varchar(100) NOT NULL,
  `employee_lname` varchar(100) NOT NULL,
  `employee_add` text NOT NULL,
  `employee_tel` char(10) NOT NULL,
  `employee_bird` date NOT NULL,
  `employee_age` varchar(3) NOT NULL,
  `employee_sex` varchar(10) NOT NULL,
  `type_id` int(11) NOT NULL,
  `employee_image` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`employee_idcard`, `employee_user`, `employee_pass`, `employee_fname`, `employee_lname`, `employee_add`, `employee_tel`, `employee_bird`, `employee_age`, `employee_sex`, `type_id`, `employee_image`, `company_id`, `employee_id`) VALUES
('1332221', 'goto1234', '123', 'โฟนครับ', 'สวัสดี', '390/8 บ.ขาม', '98999388', '2023-09-20', '23', 'ชาย', 3, '06092023101643_p1.jpg', 5, 9),
('1409902911031', 'phone12345', '1', 'k;ldgkl;d', 'k;fldk;', '321321', '12121', '2023-08-15', '23', 'หญิง', 3, '04082023135240_p1.png', 5, 1),
('1409902911032', 'Chakkri', '1234', 'จักรี', 'จินดาศักดิ์', '209 หมู่17 ต.หนองไผ่ อ.ชุมแพ จ.ขอนแก่น', '0981031080', '2000-04-06', '23', 'ชาย', 3, '15022023193317_p1.jpg', 5, 2),
('1409902911033', 'phone', '1', 'ธรรพ์กานต์', 'สามไพบูนย์', '44 หมู่2', '0621305015', '1999-06-16', '23', 'ชาย', 3, '16022023203511_p1.jpg', 5, 3),
('1409902911034', 'goto1', '1', 'tony', 'tony', '000000', '0952310692', '2023-04-27', '23', 'ชาย', 6, '19042023180944_p1.jpg', 5, 4),
('1409902911035', 'gato123', '1234', 'โฟน', 'ขอบตาดำ', '390/8 บ.ขาม', '0931934390', '2023-07-04', '23', 'หญิง', 3, '03072023142910_p1.jpg', 5, 5),
('1409902911045', 'gleamtale', '1234', 'tony', 'ไม่รู้เหมือนกัน', '390/8 บ.ขาม', '12334345', '2023-07-20', '23', 'หญิง', 3, '03072023145137_p1.png', 5, 6),
('1409902911333', 'goto2', '1', 'fdm,fd', 'jjj', 'opwoe[row[roew[', '38429482', '2023-08-07', '23', 'ชาย', 3, '04082023125138_p1.jpg', 5, 7),
('321312321312', 'phonezakup', '123', 'ดากดาสหดสห', 'ดกหวสดาหว', 'ดกหสดว', '312390213', '2023-09-04', '23', 'ชาย', 3, '04092023134433_p1.png', 5, 8),
('32132131231', 'phone5678', '1', 'gggto', 'sssaa2', '32kfsaflasflai', '0000233232', '2024-01-17', '25', 'ชาย', 3, '17012024115212_p1.jpg', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_incomecar`
--

CREATE TABLE `tb_incomecar` (
  `inc_id` int(11) NOT NULL,
  `inc_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inc_b` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inc_c` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_package`
--

CREATE TABLE `tb_package` (
  `package_id` int(11) NOT NULL,
  `package_no` varchar(10) NOT NULL,
  `package_fname` varchar(100) NOT NULL,
  `package_lname` varchar(100) NOT NULL,
  `package_date_time` datetime NOT NULL,
  `package_amount` varchar(3) NOT NULL,
  `package_weight` varchar(3) NOT NULL,
  `package_price` double NOT NULL,
  `package_tel` varchar(10) NOT NULL,
  `package_pic` varchar(255) NOT NULL,
  `user_idcard` varchar(13) NOT NULL,
  `station_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_package`
--

INSERT INTO `tb_package` (`package_id`, `package_no`, `package_fname`, `package_lname`, `package_date_time`, `package_amount`, `package_weight`, `package_price`, `package_tel`, `package_pic`, `user_idcard`, `station_id`, `company_id`) VALUES
(0, '495289', 'phonezakup333', 'mmm', '2023-11-23 15:39:00', '1', '1', 30, 'oooo', '23112023153954_p1.jpg', '1402361572316', 93, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `payment_fname` varchar(100) NOT NULL,
  `payment_lname` varchar(100) NOT NULL,
  `payment_no` varchar(6) NOT NULL,
  `payment_bank` int(11) NOT NULL,
  `payment_pay` double NOT NULL,
  `payment_tel` varchar(10) NOT NULL,
  `payment_date_time` datetime NOT NULL,
  `payment_pic` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `user_idcard` varchar(13) NOT NULL,
  `station_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tickets_id` int(11) NOT NULL,
  `carservice_vehicle` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`payment_id`, `payment_type`, `payment_fname`, `payment_lname`, `payment_no`, `payment_bank`, `payment_pay`, `payment_tel`, `payment_date_time`, `payment_pic`, `company_id`, `payment_status`, `user_idcard`, `station_id`, `status`, `tickets_id`, `carservice_vehicle`) VALUES
(24, 'จองตั๋ว', 'qwe', 'หมีเขียว', '462761', 5, 95, '123123', '2024-02-10 13:03:00', '10022024130336_p1.jpg', 5, 1, '1409600279042', 82, 1, 29, 'ทลพ223'),
(25, 'จองตั๋ว', 'asd', 'sss', '944632', 5, 95, '123123', '2024-02-09 13:07:00', '10022024130708_p1.jpg', 5, 1, '1409600279042', 88, 1, 30, 'กขค123'),
(26, 'จองตั๋ว', 'qwe', 'ผปแแ', '730384', 6, 87, '1144', '2024-02-11 16:45:00', '10022024164549_p1.jpg', 5, 1, '1409600279042', 103, 1, 31, 'กยอ764'),
(27, 'จองตั๋ว', 'aaa', 'หมีเขียว', '299590', 5, 190, '123123', '2024-02-12 10:20:00', '12022024102101_p1.jpg', 5, 1, '1409600279042', 82, 1, 32, 'ทลพ223'),
(28, 'จองตั๋ว', 'zzz', 'sss', '860719', 5, 95, '1144', '2024-02-12 13:26:00', '12022024132703_p1.jpg', 5, 1, '1409600279042', 82, 1, 33, 'ทลพ223'),
(29, 'จองตั๋ว', 'สมหมาย', 'zzz', '977871', 5, 285, '444', '2024-02-12 14:02:00', '12022024140227_p1.jpg', 5, 1, '1409600279042', 104, 1, 34, 'ทลพ223'),
(30, 'จองตั๋ว', 'สมหมาย', 'qwe', '239642', 6, 95, '1112', '2024-02-13 13:58:00', '13022024135906_p1.jpg', 5, 1, '1409600279042', 92, 1, 38, 'จจร112'),
(31, 'จองตั๋ว', 'มารวย', 'มากมั้ง', '882506', 6, 95, '123123', '2024-02-14 14:34:00', '14022024143426_p1.jpg', 5, 1, '1409600279042', 92, 1, 39, 'จจร112'),
(32, 'จองตั๋ว', 'qwe', 'qwe', '496037', 6, 190, '123', '2024-02-16 13:26:00', '16022024132616_p1.jpg', 5, 1, '1409600279042', 37, 1, 40, 'ฟนก231');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reserve`
--

CREATE TABLE `tb_reserve` (
  `reserve_id` int(11) NOT NULL,
  `reserve_date` datetime NOT NULL,
  `reserve_seat` int(2) NOT NULL,
  `reserve_status` varchar(1) NOT NULL,
  `reserve_payment` varchar(1) NOT NULL,
  `timeable_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_station`
--

CREATE TABLE `tb_station` (
  `station_id` int(11) NOT NULL,
  `station_origin_name` int(11) NOT NULL,
  `station_ortime` time NOT NULL,
  `station_terminal_name` int(11) NOT NULL,
  `station_destime` time NOT NULL,
  `station_departuretime` time NOT NULL,
  `station_price_tickets` double NOT NULL,
  `station_price_package` double NOT NULL,
  `station_registration` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `tickets_amount` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_station`
--

INSERT INTO `tb_station` (`station_id`, `station_origin_name`, `station_ortime`, `station_terminal_name`, `station_destime`, `station_departuretime`, `station_price_tickets`, `station_price_package`, `station_registration`, `company_id`, `tickets_amount`) VALUES
(1, 14, '05:30:00', 7, '08:00:00', '05:30:00', 95, 30, 1, 0, '13'),
(2, 13, '06:10:00', 7, '08:00:00', '06:30:00', 87, 30, 1, 0, '13'),
(3, 14, '06:00:00', 7, '08:30:00', '06:00:00', 95, 30, 2, 0, '13'),
(4, 13, '06:40:00', 7, '08:30:00', '07:00:00', 87, 30, 2, 0, '13'),
(6, 14, '06:30:00', 7, '09:00:00', '06:30:00', 95, 30, 3, 0, '13'),
(7, 13, '07:10:00', 7, '09:00:00', '07:30:00', 87, 30, 3, 0, '13'),
(8, 14, '07:00:00', 7, '09:30:00', '07:00:00', 95, 30, 4, 0, '13'),
(9, 13, '07:40:00', 7, '09:30:00', '08:00:00', 87, 30, 4, 0, '13'),
(10, 14, '07:30:00', 7, '10:00:00', '07:30:00', 95, 30, 5, 0, '13'),
(11, 13, '08:10:00', 7, '10:00:00', '08:30:00', 87, 30, 5, 0, '13'),
(12, 14, '08:00:00', 7, '10:30:00', '08:00:00', 95, 30, 6, 0, '13'),
(13, 13, '08:40:00', 7, '10:30:00', '09:00:00', 87, 30, 6, 0, '13'),
(14, 14, '08:30:00', 7, '11:10:00', '08:30:00', 95, 30, 7, 0, '13'),
(15, 13, '09:10:00', 7, '11:00:00', '09:30:00', 87, 30, 7, 0, '13'),
(17, 14, '09:00:00', 7, '11:30:00', '21:00:00', 95, 30, 8, 0, '13'),
(18, 13, '09:40:00', 7, '11:30:00', '10:00:00', 87, 30, 8, 0, '13'),
(19, 14, '09:30:00', 7, '12:00:00', '09:30:00', 95, 30, 9, 0, '13'),
(20, 13, '10:10:00', 7, '12:00:00', '10:30:00', 87, 30, 9, 0, '13'),
(21, 14, '10:00:00', 7, '12:30:00', '10:00:00', 95, 30, 10, 0, '13'),
(22, 13, '10:40:00', 7, '12:30:00', '11:00:00', 87, 30, 10, 0, '13'),
(23, 14, '10:30:00', 7, '13:00:00', '10:30:00', 95, 30, 12, 0, '13'),
(24, 13, '11:10:00', 7, '13:00:00', '11:30:00', 87, 30, 12, 0, '13'),
(25, 14, '11:00:00', 7, '13:30:00', '11:00:00', 95, 30, 11, 0, '13'),
(26, 13, '11:40:00', 7, '13:30:00', '12:00:00', 87, 30, 11, 0, '13'),
(27, 14, '11:30:00', 7, '14:00:00', '11:30:00', 95, 30, 1, 0, '13'),
(28, 13, '12:10:00', 7, '14:00:00', '12:30:00', 87, 30, 1, 0, '13'),
(29, 14, '12:00:00', 7, '14:30:00', '12:00:00', 95, 30, 2, 0, '13'),
(30, 13, '12:40:00', 7, '14:30:00', '13:00:00', 87, 30, 2, 0, '13'),
(31, 14, '12:30:00', 7, '15:00:00', '12:30:00', 95, 30, 3, 0, '13'),
(32, 13, '13:10:00', 7, '15:00:00', '13:30:00', 87, 30, 3, 0, '13'),
(33, 14, '13:00:00', 7, '15:30:00', '13:00:00', 95, 30, 4, 0, '13'),
(34, 13, '13:40:00', 7, '15:30:00', '14:00:00', 87, 87, 4, 0, '13'),
(35, 14, '13:10:00', 7, '16:00:00', '13:10:00', 95, 30, 5, 0, '13'),
(36, 13, '14:10:00', 7, '16:00:00', '14:30:00', 87, 30, 5, 0, '13'),
(37, 14, '14:00:00', 7, '16:30:00', '14:00:00', 95, 30, 6, 0, '11'),
(38, 13, '14:40:00', 7, '16:30:00', '15:00:00', 87, 30, 6, 0, '13'),
(39, 14, '14:30:00', 7, '17:00:00', '14:30:00', 95, 30, 7, 0, '13'),
(40, 13, '15:10:00', 7, '17:00:00', '15:30:00', 87, 30, 7, 0, '13'),
(41, 14, '15:00:00', 7, '17:30:00', '15:00:00', 95, 30, 8, 0, '13'),
(42, 13, '15:40:00', 7, '17:30:00', '16:00:00', 87, 30, 8, 0, '13'),
(43, 14, '15:30:00', 7, '18:00:00', '15:30:00', 95, 30, 9, 0, '12'),
(44, 13, '16:10:00', 7, '18:00:00', '16:30:00', 87, 30, 9, 0, '11'),
(45, 14, '16:00:00', 7, '18:30:00', '16:00:00', 95, 30, 10, 0, '10'),
(46, 13, '16:40:00', 7, '18:30:00', '17:00:00', 87, 30, 10, 0, '13'),
(47, 14, '16:30:00', 7, '19:00:00', '16:30:00', 95, 30, 12, 0, '13'),
(48, 13, '17:10:00', 7, '19:00:00', '17:30:00', 87, 30, 12, 0, '13'),
(49, 14, '17:00:00', 7, '19:30:00', '17:00:00', 95, 30, 1, 0, '13'),
(50, 13, '17:40:00', 7, '19:30:00', '18:00:00', 87, 30, 1, 0, '13'),
(51, 14, '17:30:00', 7, '20:00:00', '17:30:00', 95, 30, 2, 0, '13'),
(52, 13, '18:10:00', 7, '20:00:00', '18:30:00', 87, 30, 2, 0, '13'),
(54, 12, '06:30:00', 5, '09:00:00', '06:30:00', 95, 30, 9, 0, '13'),
(55, 12, '06:30:00', 4, '08:00:00', '06:30:00', 87, 30, 9, 0, '13'),
(56, 12, '07:00:00', 5, '09:30:00', '07:00:00', 95, 30, 10, 0, '13'),
(57, 12, '07:00:00', 4, '08:30:00', '07:00:00', 87, 30, 10, 0, '13'),
(58, 12, '07:30:00', 5, '10:00:00', '07:30:00', 95, 30, 12, 0, '13'),
(59, 12, '07:30:00', 4, '09:00:00', '07:30:00', 87, 30, 12, 0, '13'),
(60, 12, '08:00:00', 5, '10:30:00', '08:00:00', 95, 30, 11, 0, '13'),
(61, 12, '08:00:00', 4, '09:30:00', '08:00:00', 87, 30, 11, 0, '13'),
(62, 12, '08:30:00', 5, '10:00:00', '08:30:00', 95, 30, 1, 0, '13'),
(63, 12, '08:30:00', 4, '11:00:00', '08:30:00', 87, 30, 1, 0, '13'),
(64, 12, '09:00:00', 5, '11:30:00', '09:00:00', 95, 30, 2, 0, '13'),
(65, 12, '09:00:00', 4, '10:30:00', '09:00:00', 87, 30, 2, 0, '13'),
(66, 12, '09:30:00', 5, '12:00:00', '09:30:00', 95, 30, 3, 0, '13'),
(67, 12, '09:30:00', 4, '11:00:00', '09:30:00', 87, 30, 3, 0, '13'),
(68, 12, '10:00:00', 5, '12:30:00', '10:00:00', 95, 30, 4, 0, '13'),
(69, 12, '10:00:00', 4, '11:30:00', '10:00:00', 87, 30, 4, 0, '13'),
(70, 12, '00:00:00', 5, '00:00:00', '10:30:00', 95, 30, 5, 0, '12'),
(71, 12, '10:30:00', 4, '12:00:00', '10:30:00', 87, 30, 5, 0, '13'),
(72, 12, '00:00:00', 5, '00:00:00', '11:00:00', 95, 30, 6, 0, '13'),
(73, 12, '11:00:00', 4, '12:30:00', '11:00:00', 87, 30, 6, 0, '13'),
(74, 12, '11:30:00', 5, '14:00:00', '11:30:00', 95, 30, 7, 0, '8'),
(75, 12, '00:00:00', 4, '00:00:00', '11:30:00', 87, 30, 7, 0, '13'),
(76, 12, '12:00:00', 5, '14:30:00', '12:00:00', 95, 30, 8, 0, '11'),
(77, 12, '12:00:00', 4, '13:30:00', '12:00:00', 87, 30, 8, 0, '13'),
(78, 12, '12:30:00', 5, '15:00:00', '12:30:00', 95, 30, 9, 0, '5'),
(79, 12, '12:30:00', 4, '14:00:00', '12:30:00', 87, 30, 9, 0, '12'),
(80, 12, '13:00:00', 5, '15:30:00', '01:00:00', 95, 30, 10, 0, '9'),
(81, 12, '13:00:00', 4, '14:30:00', '01:00:00', 87, 30, 10, 0, '12'),
(82, 12, '00:00:00', 5, '00:00:00', '01:30:00', 95, 30, 12, 0, '10'),
(83, 12, '13:30:00', 4, '15:00:00', '01:30:00', 87, 30, 12, 0, '13'),
(84, 12, '14:00:00', 5, '16:30:00', '02:00:00', 95, 30, 11, 0, '12'),
(85, 12, '14:00:00', 4, '15:30:00', '02:00:00', 87, 30, 11, 0, '13'),
(86, 12, '14:30:00', 5, '17:00:00', '14:30:00', 95, 30, 1, 0, '11'),
(87, 12, '14:30:00', 4, '16:00:00', '14:30:00', 87, 30, 1, 0, '13'),
(88, 12, '15:00:00', 5, '17:30:00', '15:00:00', 95, 30, 2, 0, '12'),
(89, 12, '15:00:00', 4, '16:30:00', '15:00:00', 87, 30, 2, 0, '13'),
(90, 12, '15:30:00', 5, '18:00:00', '15:30:00', 95, 30, 3, 0, '13'),
(91, 12, '15:30:00', 4, '17:00:00', '15:30:00', 87, 30, 3, 0, '13'),
(92, 12, '16:00:00', 5, '18:30:00', '16:00:00', 95, 30, 4, 0, '8'),
(93, 12, '16:00:00', 4, '17:30:00', '16:00:00', 87, 30, 4, 0, '11'),
(94, 12, '16:30:00', 5, '19:00:00', '16:30:00', 95, 30, 5, 0, '10'),
(95, 12, '16:30:00', 4, '18:00:00', '16:30:00', 87, 30, 5, 0, '13'),
(96, 12, '17:30:00', 5, '19:30:00', '17:30:00', 95, 30, 7, 0, '13'),
(97, 12, '17:30:00', 4, '18:30:00', '17:30:00', 87, 30, 7, 0, '11'),
(98, 12, '18:00:00', 5, '20:00:00', '18:00:00', 95, 30, 8, 0, '4'),
(99, 12, '18:00:00', 4, '19:00:00', '18:00:00', 87, 30, 8, 0, '12'),
(100, 12, '18:30:00', 5, '20:30:00', '18:30:00', 95, 30, 9, 0, '10'),
(101, 12, '18:30:00', 4, '19:30:00', '06:30:00', 87, 30, 9, 0, '13'),
(102, 12, '19:00:00', 5, '21:00:00', '19:00:00', 95, 30, 10, 0, '12'),
(103, 12, '19:00:00', 4, '20:00:00', '19:00:00', 87, 30, 10, 0, '12'),
(104, 12, '19:30:00', 5, '21:30:00', '19:30:00', 95, 30, 12, 0, '9'),
(105, 12, '19:30:00', 4, '20:30:00', '19:30:00', 87, 30, 12, 0, '13'),
(106, 12, '20:00:00', 5, '22:00:00', '20:00:00', 95, 30, 1, 0, '10'),
(107, 12, '20:00:00', 4, '21:00:00', '20:00:00', 87, 30, 1, 0, '13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_station_origin`
--

CREATE TABLE `tb_station_origin` (
  `origin_id` int(11) NOT NULL,
  `origin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_station_origin`
--

INSERT INTO `tb_station_origin` (`origin_id`, `origin_name`) VALUES
(12, 'ขอนแก่น'),
(13, 'ชุมแพ'),
(14, 'ภูเขียว');

-- --------------------------------------------------------

--
-- Table structure for table `tb_station_terminal`
--

CREATE TABLE `tb_station_terminal` (
  `terminal_id` int(11) NOT NULL,
  `terminal_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_station_terminal`
--

INSERT INTO `tb_station_terminal` (`terminal_id`, `terminal_name`) VALUES
(4, 'ชุมแพ'),
(5, 'ภูเขียว'),
(7, 'ขอนแก่น');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `tickets_id` int(11) NOT NULL,
  `tickets_date_time` datetime NOT NULL,
  `amount` varchar(3) NOT NULL,
  `station_price_tickets` double NOT NULL,
  `tickets_no` varchar(10) NOT NULL,
  `user_idcard` varchar(13) DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tickets_type` varchar(50) NOT NULL,
  `carservice_vehicle` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tickets`
--

INSERT INTO `tb_tickets` (`tickets_id`, `tickets_date_time`, `amount`, `station_price_tickets`, `tickets_no`, `user_idcard`, `station_id`, `company_id`, `status`, `tickets_type`, `carservice_vehicle`) VALUES
(1, '2024-02-05 15:45:00', '1', 87, '293864', '1409600279042', 44, 0, 1, 'จองตั๋ว', 'วพท856'),
(2, '2024-02-05 15:47:00', '1', 95, '357472', '1409600279042', 45, 0, 1, 'จองตั๋ว', 'กยอ764'),
(3, '2024-02-05 16:05:00', '2', 190, '670693', '1409600279042', 94, 0, 1, 'จองตั๋ว', 'กตต232'),
(7, '2024-02-09 13:37:00', '3', 285, '119395', '1409600279042', 37, 0, 1, 'จองตั๋ว', 'ฟนก231'),
(8, '2024-02-09 13:47:00', '3', 285, '78794', '1409600279042', 37, 0, 1, 'จองตั๋ว', 'ฟนก231'),
(10, '2024-02-09 14:05:00', '1', 95, '969066', '1409600279042', 86, 0, 1, 'จองตั๋ว', 'กสน442'),
(11, '2024-02-09 14:16:00', '1', 95, '596594', '1409600279042', 86, 0, 1, 'จองตั๋ว', 'กสน442'),
(29, '2024-02-10 13:03:00', '1', 95, '462761', '1409600279042', 82, 0, 1, 'จองตั๋ว', 'ทลพ223'),
(30, '2024-02-09 13:06:00', '1', 95, '944632', '1409600279042', 88, 0, 1, 'จองตั๋ว', 'กขค123'),
(31, '2024-02-11 16:45:00', '1', 87, '730384', '1409600279042', 103, 0, 1, 'จองตั๋ว', 'กยอ764'),
(32, '2024-02-12 10:20:00', '2', 190, '299590', '1409600279042', 82, 0, 1, 'จองตั๋ว', 'ทลพ223'),
(33, '2024-02-11 13:26:00', '1', 95, '860719', '1409600279042', 82, 0, 1, 'จองตั๋ว', 'ทลพ223'),
(34, '2024-02-12 14:02:00', '3', 285, '977871', '1409600279042', 104, 0, 1, 'จองตั๋ว', 'ทลพ223'),
(38, '2024-02-14 13:57:00', '1', 95, '239642', '1409600279042', 92, 0, 1, 'จองตั๋ว', 'จจร112'),
(39, '2024-02-14 14:33:00', '1', 95, '882506', '1409600279042', 92, 0, 1, 'จองตั๋ว', 'จจร112'),
(40, '2024-02-16 13:25:00', '2', 190, '496037', '1409600279042', 37, 0, 1, 'จองตั๋ว', 'ฟนก231');

-- --------------------------------------------------------

--
-- Table structure for table `tb_timestation`
--

CREATE TABLE `tb_timestation` (
  `tb_timeid` int(100) NOT NULL,
  `tb_timeout` time NOT NULL,
  `tb_timewill` time NOT NULL,
  `carservice_vehicle` char(10) NOT NULL,
  `tb_timewill2` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_timestation`
--

INSERT INTO `tb_timestation` (`tb_timeid`, `tb_timeout`, `tb_timewill`, `carservice_vehicle`, `tb_timewill2`) VALUES
(1, '05:40:00', '06:10:00', 'กสน442', '08:00:00'),
(2, '06:00:00', '06:40:00', 'กขค123', '08:30:00'),
(3, '06:30:00', '07:10:00', 'พษ435', '09:00:00'),
(4, '07:00:00', '07:40:00', 'จจร112', '09:30:00'),
(5, '07:30:00', '08:10:00', 'กตต232', '10:00:00'),
(6, '08:00:00', '08:40:00', 'ฟนก231', '10:30:00'),
(7, '08:30:00', '09:10:00', 'คมม542', '11:00:00'),
(8, '09:00:00', '09:40:00', 'หมจ939', '11:30:00'),
(9, '09:30:00', '10:10:00', 'วพท856', '12:00:00'),
(10, '10:00:00', '10:40:00', 'กยอ764', '12:30:00'),
(11, '10:30:00', '11:10:00', 'ทลพ223', '13:00:00'),
(12, '11:00:00', '11:40:00', 'สมน104', '13:30:00'),
(13, '11:30:00', '12:10:00', 'กสน442', '14:00:00'),
(14, '12:00:00', '12:40:00', 'กขค123', '14:30:00'),
(15, '12:30:00', '13:10:00', 'พษ435', '15:00:00'),
(16, '13:00:00', '13:40:00', 'จจร112', '15:30:00'),
(17, '13:30:00', '14:10:00', 'กตต232', '16:00:00'),
(18, '14:00:00', '14:40:00', 'ฟนก231', '16:30:00'),
(19, '14:30:00', '15:10:00', 'คมม542', '17:00:00'),
(20, '15:00:00', '15:40:00', 'หมจ939', '17:30:00'),
(21, '15:30:00', '16:10:00', 'วพท856', '18:00:00'),
(22, '16:00:00', '16:40:00', 'กยอ764', '18:30:00'),
(23, '16:30:00', '17:10:00', 'ทลพ223', '19:00:00'),
(24, '17:00:00', '17:40:00', 'กสน442', '19:30:00'),
(25, '17:30:00', '18:10:00', 'กขค123', '20:00:00'),
(26, '06:30:00', '08:00:00', 'วพท856', '09:00:00'),
(27, '07:00:00', '08:30:00', 'กยอ764', '09:30:00'),
(28, '07:30:00', '09:00:00', 'ทลพ223', '10:00:00'),
(29, '08:00:00', '09:30:00', 'สมน104', '10:30:00'),
(30, '08:30:00', '10:00:00', 'กสน442', '11:00:00'),
(31, '09:00:00', '10:30:00', 'กขค123', '11:30:00'),
(32, '09:30:00', '11:00:00', 'พษ435', '12:00:00'),
(33, '10:00:00', '11:30:00', 'จจร112', '12:30:00'),
(34, '10:30:00', '12:00:00', 'กตต232', '13:00:00'),
(35, '11:00:00', '12:30:00', 'ฟนก231', '13:30:00'),
(36, '11:30:00', '13:00:00', 'คมม542', '14:00:00'),
(37, '12:00:00', '13:30:00', 'หมจ939', '14:30:00'),
(38, '12:30:00', '14:00:00', 'วพท856', '15:00:00'),
(39, '13:00:00', '14:30:00', 'กยอ764', '15:30:00'),
(40, '13:30:00', '15:00:00', 'ทลพ223', '16:00:00'),
(41, '14:00:00', '15:30:00', 'สมน104', '16:30:00'),
(42, '14:30:00', '16:00:00', 'กสน442', '17:00:00'),
(43, '15:00:00', '16:30:00', 'กขค123', '17:30:00'),
(44, '15:30:00', '17:00:00', 'พษ435', '18:00:00'),
(45, '16:00:00', '17:30:00', 'จจร112', '18:30:00'),
(46, '16:30:00', '18:00:00', 'กตต232', '19:00:00'),
(47, '17:30:00', '18:30:00', 'คมม542', '19:30:00'),
(48, '18:00:00', '19:00:00', 'หมจ939', '20:00:00'),
(49, '18:30:00', '19:30:00', 'วพท856', '20:30:00'),
(50, '19:00:00', '20:00:00', 'กยอ764', '21:00:00'),
(51, '19:30:00', '20:30:00', 'ทลพ223', '21:30:00'),
(52, '20:00:00', '21:00:00', 'กสน442', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`type_id`, `type_name`) VALUES
(3, 'พนักงาน'),
(5, 'ผู้'),
(6, 'ผู้จัดการ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_surname` varchar(100) NOT NULL,
  `user_line` varchar(50) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_sex` varchar(10) NOT NULL,
  `user_idcard` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_email`, `user_pass`, `user_fname`, `user_surname`, `user_line`, `user_tel`, `user_birthday`, `user_sex`, `user_idcard`) VALUES
(1, 'goto123@gmail.com', '123', 'นายกาโต้', 'เกรมเทล', 'goto123', '0931934390', '2024-01-07', 'ชาย', '140299388932'),
(2, 'Chakkri161@gmail.com', '0981031080a', 'จักรี ', 'จินดาศักดิ์', 'chakkri16', '0981031080', '2000-04-06', 'ชาย', '1409600279041'),
(2, 'gototo123@gmail.com', '123', 'gggg', 'ggtoo', 'tora', '0931934390', '2024-01-16', 'ชาย', '222331313123'),
(5, 'phone1@gmail.com', '123', 'ธรรพ์ธกานต', 'สามไพบูนย์', 'phone11', '0629423651', '1999-06-09', 'ชาย', '1402361572316'),
(6, 'goto@gmail.com', '1234', 'นรินทร์', 'อินปัญญา', '0982060142', '0982060142', '1997-06-04', 'ชาย', '1400625483256'),
(9, 'okgo1@gmail.com', '1', 'บุบผา', 'สามัน', 'ookk1', '0982019392', '2000-05-10', 'ชาย', '1403002981031'),
(10, 'po1@gmail.com', '1', 'po', 'op', '1231', '0621535620', '2023-03-08', 'ชาย', '1409600279042'),
(11, 'tanthakarn1@gmail.com', '1234', 'สมผง', 'งามชิบหาย', 'phone2222', '0931934390', '2023-07-15', 'ชาย', '1409902911083'),
(12, 'maregano@gmail.com', '123', 'รำไม่หยุด', 'แต่ชอบยุดที่คุณ', 'eo888', '0123456', '2023-07-10', 'ชาย', '12345678910'),
(13, 'phone2@gmail.com', '123', 'ธรรรพทททา', 'สสาสำสสำ', 'phonezakup', '00020002', '2023-09-04', 'ชาย', '14000022999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tb_cancel`
--
ALTER TABLE `tb_cancel`
  ADD PRIMARY KEY (`cancel_id`);

--
-- Indexes for table `tb_carservice`
--
ALTER TABLE `tb_carservice`
  ADD PRIMARY KEY (`carservice_vehicle`),
  ADD UNIQUE KEY `carservice_id_2` (`carservice_id`),
  ADD UNIQUE KEY `carservice_id_3` (`carservice_id`);

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`employee_idcard`),
  ADD KEY `index` (`employee_id`);

--
-- Indexes for table `tb_incomecar`
--
ALTER TABLE `tb_incomecar`
  ADD PRIMARY KEY (`inc_id`);

--
-- Indexes for table `tb_package`
--
ALTER TABLE `tb_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tb_reserve`
--
ALTER TABLE `tb_reserve`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `tb_station`
--
ALTER TABLE `tb_station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `tb_station_origin`
--
ALTER TABLE `tb_station_origin`
  ADD PRIMARY KEY (`origin_id`),
  ADD UNIQUE KEY `origin_name` (`origin_name`);

--
-- Indexes for table `tb_station_terminal`
--
ALTER TABLE `tb_station_terminal`
  ADD PRIMARY KEY (`terminal_id`);

--
-- Indexes for table `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`tickets_id`);

--
-- Indexes for table `tb_timestation`
--
ALTER TABLE `tb_timestation`
  ADD PRIMARY KEY (`tb_timeid`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`,`user_idcard`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cancel`
--
ALTER TABLE `tb_cancel`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_incomecar`
--
ALTER TABLE `tb_incomecar`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_reserve`
--
ALTER TABLE `tb_reserve`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_station`
--
ALTER TABLE `tb_station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `tickets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_timestation`
--
ALTER TABLE `tb_timestation`
  MODIFY `tb_timeid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

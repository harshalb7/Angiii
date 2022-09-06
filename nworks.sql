-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 04:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customerid` varchar(11) NOT NULL,
  `customertype` varchar(20) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customerid`, `customertype`, `customername`, `contactperson`, `contactnumber`, `emailaddress`, `address`, `shippingaddress`, `remarks`) VALUES
(22, 'NW-C-0001', 'Company', 'GINGERSNAPS', 'TIFFANY BANAYO', '86543602', 'CUSTOMERLOVE@GINGERSNAPS.COM.PH', 'SEVEN/NEO, 37TH FLR, 5TH AVE, TAGUIG', '223 BALIUAG, BULACAN', ''),
(23, 'NW-C-0002', 'Company', 'FRALIFIC', 'ROBERT SISON', '89827141', 'FRALIFIC_PH@GMAIL.COM', '3RD FLR, RCBC PLAZA, MAKATI CITY', '1A, BELLAMAJA TOWNHOMES, F. MANALO ST., SAN JUAN CITY', ''),
(24, 'NW-C-0003', 'Company', 'BAGS IN THE CITY', 'IRISH FLORES', '85346270', 'INFO.BAGSINTHECITYMANILA@GMAIL.COM', '1550 SAN FRANCISCO ST. MANDALUYONG CITY', '1550 SAN FRANCISCO ST. MANDALUYONG CITY', ''),
(25, 'NW-C-0004', 'Company', 'ENFANT PHILIPPINES', 'JANICE MAE YUSON', '09988921369', 'ENFANTPH@ENFANT.COM.PH', 'NET PARK BUILDING, MANILA CITY', '14F PARK CENTRALE BLDG., ARAGON STREET, PASIG CITY', ''),
(26, 'NW-C-0005', 'Company', 'USANA', 'EARL GIO DE CAMPO', '09178132549', 'INTERALSERVICEPH@USANAINC.COM', 'JERVOIS ST. 2902, 1213 MAKATI CITY', 'JERVOIS ST. 2902, 1213 MAKATI CITY', ''),
(27, 'NW-C-0006', 'Individual', 'JEN ALIPASTE', 'JEN ALIPASTE', '09524885012', 'JEN.ALIPASTE@YAHOO.COM', '35 SIKAP ST. MANDALUYONG CITY', '35 SIKAP ST. MANDALUYONG CITY', ''),
(28, 'NW-C-0007', 'Individual', 'ALEX ROQUE', 'JUDITH ROQUE', '09674255802', 'ALEX_ROQUE@GMAIL.COM', '1216 MARTINEZ ST. BRGY 210, STA. MESA, MANILA', '1216 MARTINEZ ST. BRGY 210, STA. MESA, MANILA', ''),
(29, 'NW-C-0008', 'Individual', 'GABRIELLE EVANGELISTA', 'GABRIELLE EVANGELISTA', '09548662112', 'GBRLEVGLST@YAHOO.COM.PH', 'UNIT 2-D ANAHEIM BLDG. CALIFORNIA GARDEN SQUARE, MANDALUYONG CITY', 'UNIT 2-D ANAHEIM BLDG. CALIFORNIA GARDEN SQUARE, MANDALUYONG CITY', ''),
(30, 'NW-C-0009', 'Individual', 'DIANA MARIE DELA CRUZ', 'DIANA MARIE DELA CRUZ', '09785411232', 'DIANAMARIEDLC@YAHOO.COM', 'BLK 57 LOT 2, CARISSA HOMES, SAN JOSE DEL MONTE, BULACAN', 'BLK 57 LOT 2, CARISSA HOMES, SAN JOSE DEL MONTE, BULACAN', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employeeid` varchar(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `emailaddress` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `hireddate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `workingstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employeeid`, `lastname`, `firstname`, `middlename`, `contactnumber`, `emailaddress`, `address`, `birthdate`, `hireddate`, `enddate`, `workingstatus`) VALUES
(1, 'NW-E-0001', 'Santos', 'Maria', 'Roxas', '09123456781', 'Mariasantos@yahoo.com', '123 Ibon St. Marikina City', '1980-07-29', '2020-01-05', '0000-00-00', 'Active'),
(2, 'NW-E-0002', 'Lopez', 'Anne', 'Cruz', '09559845655', 'Annelopez@gmail.com', '456 Aliw St. Marikina City', '1975-11-02', '2020-01-15', NULL, 'Active'),
(3, 'NW-E-0003', 'Bautista', 'Rose', 'Arellano', '09123675824', 'Rosebautista@gmail.com', '78 Ligaya St Mandaluyong City', '1985-09-16', '2021-05-30', NULL, 'Active'),
(4, 'NW-E-0004', 'Lequigan', 'Greanne', 'Jornadal', '09772546422', 'greanne.lequigan@gmail.com', '1800 Receiver St. CAA Brgy. BF International', '2001-04-12', '2022-08-09', '0000-00-00', 'Active'),
(5, 'NW-E-0005', 'Millamina', 'Charmane', 'Tello', '09884512475', 'charmanane1234@yahoo.com', 'Mandaluyong City', '2000-08-08', '2022-08-09', NULL, 'Active'),
(6, 'NW-E-0006', 'Ignacio', 'Francis', '', '09110214500', 'francis111@gmail.com', '45 JP Rizal St, Mandaluyong City', '2000-10-26', '2022-05-22', NULL, 'Active'),
(8, 'NW-E-0007', 'Millamina', 'Charmane', '', '9884512475', 'charmane1233@gmail.com', 'Mandaluyong City', '2000-08-08', '2022-09-05', NULL, 'Active'),
(9, 'NW-E-0008', 'Millamina', 'Charmane', '', '9884512475', 'charmane1233@gmail.com', 'Mandaluyong City', '2000-08-08', '2022-09-05', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `operationname` varchar(255) NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `operationname`, `cost`) VALUES
(1, 'oe prep strap', 1),
(2, 'oe s/close', 0.5),
(3, 'top 1/6 strap', 0.75),
(4, 's/close single', 0.75),
(5, 'hem armhole', 1),
(6, 'hem/att strap & x strap', 3.5),
(8, 'single s/close', 0.75),
(9, 'cut & att loops', 1.25),
(10, 'slit', 1),
(11, 'hemming', 1),
(12, 'prep loops pair', 0.65),
(13, 'att loops', 0.6),
(14, 'prep strap waist', 1.5),
(15, 'prep neck strap', 1),
(16, 'invert strap waist', 0.75),
(17, 'top strap waist', 1),
(18, 'invert neck strap', 0.75),
(19, 'top neck strap', 0.75),
(20, 'att buckle upper & lower', 0.6),
(21, 'att waist strap with tacking', 0.8),
(22, 'hem side', 1.25),
(23, 'hem bottom', 0.6),
(24, 'att neck strap w/ hem tacking', 0.8),
(25, 'att pocket', 2),
(26, 'hem pocket', 0.7),
(27, 'trim', 1.5),
(28, 'hem sleeve', 1),
(29, 'j/shoulder', 1),
(30, 'att sleeve', 1),
(31, 'att ribbing', 1.5),
(32, 's/close', 1),
(33, 'face mask sewing', 4),
(34, 'face mask cutting', 0.8),
(35, 'cut garter', 0.15),
(36, 'placket', 6),
(37, 'collar w/ label', 6),
(39, 'piping hem', 1.25),
(40, 'j/shoulder', 1),
(41, 'att cuffs', 1.75),
(42, 'att sleeve', 1),
(43, 's/close', 1),
(44, 'oe placket', 0.25),
(45, 'oe slit', 0.5),
(46, 'tastas collar', 1),
(47, 're-cut cuffs', 0.15),
(48, 'tacking sleeve', 1),
(55, 'collar cut', 2),
(56, 'tacking sleeve', 3);

-- --------------------------------------------------------

--
-- Table structure for table `projecttype`
--

CREATE TABLE `projecttype` (
  `id` int(11) NOT NULL,
  `projecttype` varchar(255) NOT NULL,
  `projectdescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projecttype`
--

INSERT INTO `projecttype` (`id`, `projecttype`, `projectdescription`) VALUES
(1, 'Drawstring Bag', 'Material: Canvas Offwhite,\r\nSize: 12x14 inches,\r\nFront Design: Rubberized Print Back Design: N/A'),
(2, 'Face Mask', 'NEOPRENE / Pro-tek+ Vibrant Full Color Sublimation 18.5cm x 12.5cm (Standard\r\nMedium; other size also available), Weight: 0.016kg/pc'),
(3, 'T-Shirt', 'Fabric Types: CVC Cotton / 100% Cotton / Drifit Material / Premade, \r\nLogo Execution: High Quality Rubberized Silkscreen Printing, \r\nUnisex Sizes: 2XS, XS, S, M, L, XL, 2XL, 3XL'),
(4, 'Apron', 'Fabric Types: Cotton Twill, \r\nLogo Execution: High Quality Silkscreen Printing and/or computerized embroidery'),
(5, 'Sublimated Polo Shirt', 'Fabric Options: SubliPro / Polylite, \r\nLogo Execution: Full Color Sublimation Printing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Armee Galvez', 'armeeph', '202cb962ac59075b964b07152d234b70', 'Admin'),
(2, 'Ashley Galvez', 'ashleynw', 'oti$2', 'Project Manager'),
(3, 'Maria Santos', 'NW-E-0001', 'A2111P&', 'Employee'),
(4, 'Anne Lopez', 'NW-E-0002', 'W9555$', 'Employee'),
(5, 'Rose Bautista', 'NW-E-0003', '8AAY$2', 'Employee'),
(18, 'admin testing', 'admin', '202cb962ac59075b964b07152d234b70', 'Admin'),
(23, 'PM testing', 'pm', '202cb962ac59075b964b07152d234b70', 'Project Manager'),
(24, 'employee testing', 'employee', '202cb962ac59075b964b07152d234b70', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projecttype`
--
ALTER TABLE `projecttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `projecttype`
--
ALTER TABLE `projecttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

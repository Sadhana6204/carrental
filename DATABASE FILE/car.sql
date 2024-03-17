-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 09:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`) VALUES
(1, 'Administrator', 'prince', '482c811da5d5b4bc6d497ffa98491e38');

-- --------------------------------------------------------

--
-- Table structure for table `kostumer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_sex` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_license` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kostumer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_sex`, `customer_phone`, `customer_license`) VALUES
(1, 'Ravi', '21 Banglore', 'Male', '7545554440', '11144569'),
(2, 'Priyanka ', '4016  Ridge Road', 'Female', '9547775412', '12345555'),
(3, 'Neha N', 'RR Nagar', 'Female', '7454445780', '11254470'),
(4, 'Rahul Kumar', 'Jogia Kenali', 'Male', '7531450024', '66587410'),
(5, 'Freddy', '270  Dogwood Road', 'Male', '8421114502', '32145850'),
(6, 'Radha Roy', '1084  Wildwood Street', 'Female', '9545874106', '33556970'),
(7, 'Nisha Roy', 'Boaring Road', 'Female', '9547896320', '11224650'),
(8, 'Jonathan ', '3883  Bar Avenue', 'Male', '9124578555', '22557860'),
(9, 'Mandy B', '2363  Lewis Street', 'Female', '7539510002', '64588880'),
(10, 'Raj Kumar', '1087 SND Road', 'Male', '6678541258', '11667850'),
(11, 'John ', '2542  Thompson Street', 'Male', '8450006580', '22669782'),
(12, 'Katrina Chopra', '394  Dhobi Lane', 'Female', '9521112450', '33668500'),
(13, 'Shalini Nag', 'Sahid gate', 'Female', '8125875550', '11225470'),
(14, 'Shreya Singh', '3652  Deoghar Street', 'Female', '8574111120', '22697850'),
(15, 'Supriya Mittal', 'Whitefield ', 'Female', '9345785450', '22447800'),
(16, 'Pooja Kumari', 'Electonic City', 'Female', '9124578500', '33258044'),
(17, 'Rahul Keshri', 'Brigade Road', 'Male', '8458545790', '33668521'),
(18, 'Arsalan', 'Isro Layout', 'Male', '9457856314', '33112450'),
(19, 'Puniket', 'Chandsandra', 'Male', '9545632180', '11114520'),
(20, 'Kartik P', '2508  River Road', 'Male', '8563217800', '11225690'),
(21, 'Ankit Singh', 'Mg Road', 'Male', '8547896400', '33225617'),
(22, 'Nashrat', 'Tagore Road', 'Female', '8697412580', '22668520'),
(23, 'Somya Chapra', '4427  Jessie Street', 'Female', '9745999996', '22335800'),
(25, 'Abhishek', 'Bank syndicate', 'Male', '6452513081', '22558609');


-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_brand` varchar(30) NOT NULL,
  `car_number` varchar(20) NOT NULL,
  `car_color` varchar(30) NOT NULL,
  `car_year` int(11) NOT NULL,
  `car_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `car` (`car_id`, `car_brand`, `car_number`, `car_color`, `car_year`, `car_status`) VALUES
(1, 'Hyundai Creta', '1000', 'Navy Blue', 2018, 1),
(2, 'MG Hector', '6965', 'Silver', 2020, 1),
(3, 'Renault ', '3355', 'Black', 2021, 1),
(4, 'Ford Freestyle', '5529', 'Maroon', 2019, 1),
(5, 'Nissan X-Trail', '2029', 'Silver', 2018, 1),
(6, 'MG RC-6', '1125', 'Red', 2021, 1),
(7, 'Hyundai Creta', '7530', 'Matte Black', 2018, 1),
(8, 'Toyota  Hybrid', '7409', 'Black', 2018, 0),
(9, 'Toyota Glanza', '2580', 'Sky Blue', 2017, 1),
(10, 'Chevrolet Spark', '8511', 'Maroon', 2017, 1),
(11, 'Audi Q7', '6969', 'Black', 2017, 1),
(12, 'Chevrolet Piaot', '3450', 'Red', 2020, 1),
(14, 'Lexus RX 350', '8520', 'Eminent White Pearl', 2018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_karyawan` int(11) NOT NULL,
  `booking_customer` int(11) NOT NULL,
  `booking_car` int(11) NOT NULL,
  `booking_borrow` date NOT NULL,
  `booking_return` date NOT NULL,
  `booking_price` int(11) NOT NULL,
  `booking_fine` int(11) NOT NULL,
  `booking_billd` date NOT NULL,
  `booking_totalfine` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL,
  `booking_returned` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `booking` (`booking_id`, `booking_karyawan`, `booking_customer`, `booking_car`, `booking_borrow`, `booking_return`, `booking_price`, `booking_fine`, `booking_billd`, `booking_totalfine`, `booking_status`, `booking_returned`) VALUES
(1, 1, 1, 1, '2019-05-13', '2019-05-29', 4000, 500, '2019-05-27', 0, 1, '2019-05-29'),
(2, 1, 2, 2, '2021-03-04', '2021-03-11', 13450, 710, '2021-04-17', 0, 1, '2021-03-11'),
(3, 1, 3, 7, '2021-03-20', '2021-03-22', 4100, 400, '2021-04-17', 800, 1, '2021-03-24'),
(4, 1, 5, 9, '2021-04-01', '2021-04-03', 2900, 400, '2021-04-17', 0, 1, '2021-04-03'),
(5, 1, 7, 9, '2021-04-01', '2021-04-02', 1650, 400, '2021-04-17', 0, 1, '2021-04-02'),
(6, 1, 6, 1, '2021-04-04', '2021-04-05', 2000, 600, '2021-04-17', 0, 1, '2021-04-05'),
(7, 1, 10, 11, '2021-04-07', '2021-04-09', 12560, 2000, '2021-04-17', 0, 1, '2021-04-09'),
(8, 1, 25, 14, '2021-04-16', '2021-04-18', 8000, 650, '2021-04-17', 650, 1, '2021-04-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

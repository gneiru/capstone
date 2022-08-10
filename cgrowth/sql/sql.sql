-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 03:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgs1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `name` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `childcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`name`, `municipality`, `id`, `childcount`) VALUES
('Amamperez', 'Bayambang', 2, 0),
('Amancosiling Norte', 'Bayambang', 3, 0),
('Amancosiling Sur', 'Bayambang', 4, 1),
('Ambayat I', 'Bayambang', 5, 0),
('Ambayat II', 'Bayambang', 6, 0),
('Apalen', 'Bayambang', 7, 0),
('Asin', 'Bayambang', 8, 0),
('Ataynan', 'Bayambang', 9, 0),
('Bacnono', 'Bayambang', 10, 0),
('Balaybuaya', 'Bayambang', 11, 0),
('Banaban', 'Bayambang', 12, 0),
('Bani', 'Bayambang', 13, 0),
('Batangcaoa', 'Bayambang', 14, 0),
('Beleng', 'Bayambang', 15, 0),
('Bical Norte', 'Bayambang', 16, 0),
('Bical Sur', 'Bayambang', 17, 0),
('Bongato East', 'Bayambang', 18, 0),
('Bongato West', 'Bayambang', 19, 0),
('Buayaen', 'Bayambang', 20, 0),
('Buenlag 1st', 'Bayambang', 21, 0),
('Buenlag 2nd', 'Bayambang', 22, 0),
('Cadre Site', 'Bayambang', 23, 0),
('Carungay', 'Bayambang', 24, 0),
('Caturay', 'Bayambang', 25, 0),
('Duera', 'Bayambang', 27, 0),
('Dusoc', 'Bayambang', 28, 0),
('Hermoza', 'Bayambang', 29, 0),
('Idong', 'Bayambang', 30, 0),
('Inanlorenza', 'Bayambang', 31, 0),
('Inirangan', 'Bayambang', 32, 0),
('Iton', 'Bayambang', 33, 0),
('Langiran', 'Bayambang', 34, 0),
('Ligue', 'Bayambang', 35, 0),
('M. H. del Pilar', 'Bayambang', 36, 0),
('Macayocayo', 'Bayambang', 37, 0),
('Magsaysay', 'Bayambang', 38, 0),
('Maigpa', 'Bayambang', 39, 0),
('Malimpec', 'Bayambang', 40, 0),
('Malioer', 'Bayambang', 41, 0),
('Managos', 'Bayambang', 42, 0),
('Manambong Norte', 'Bayambang', 43, 0),
('Manambong Parte', 'Bayambang', 44, 0),
('Manambong Sur', 'Bayambang', 45, 0),
('Mangayao', 'Bayambang', 46, 0),
('Nalsian Norte', 'Bayambang', 47, 0),
('Nalsian Sur', 'Bayambang', 48, 0),
('Pangdel', 'Bayambang', 49, 0),
('Pantol', 'Bayambang', 50, 0),
('Paragos', 'Bayambang', 51, 0),
('Poblacion Sur', 'Bayambang', 52, 1),
('Pugo', 'Bayambang', 53, 0),
('Reynado', 'Bayambang', 54, 0),
('San Gabriel 1st', 'Bayambang', 55, 0),
('San Gabriel 2nd', 'Bayambang', 56, 0),
('San Vicente', 'Bayambang', 57, 0),
('Sangcagulis', 'Bayambang', 58, 0),
('Sanlibo', 'Bayambang', 59, 0),
('Sapang', 'Bayambang', 60, 0),
('Tamaro', 'Bayambang', 61, 0),
('Tambac', 'Bayambang', 62, 2),
('Tampog', 'Bayambang', 63, 0),
('Tanolong', 'Bayambang', 64, 0),
('Tatarac', 'Bayambang', 65, 0),
('Telbang', 'Bayambang', 66, 0),
('Tococ East', 'Bayambang', 67, 0),
('Tococ West', 'Bayambang', 68, 0),
('Warding', 'Bayambang', 69, 0),
('Wawa', 'Bayambang', 70, 0),
('Zone I', 'Bayambang', 71, 0),
('Zone II', 'Bayambang', 72, 1),
('Zone III', 'Bayambang', 73, 0),
('Zone IV', 'Bayambang', 74, 0),
('Zone V', 'Bayambang', 75, 0),
('Zone VI', 'Bayambang', 76, 1),
('Zone VII', 'Bayambang', 77, 0),
('Anambongan', 'Basista', 85, 0),
('Cabeldatan', 'Basista', 86, 0),
('Bayoyong', 'Basista', 87, 0),
('Malimpec East', 'Basista', 88, 0),
('Dumpay', 'Basista', 89, 0),
('Mapolopolo', 'Basista', 90, 0),
('Nalneran', 'Basista', 91, 0),
('Navatat', 'Basista', 92, 1),
('Obong', 'Basista', 93, 0),
('Osmena, SR.', 'Basista', 94, 0),
('Palma', 'Basista', 95, 0),
('Patacbo', 'Basista', 96, 0),
('Poblacion', 'Basista', 97, 0),
('Alinggan', 'Bayambang', 109, 2),
('Darawey', 'Bayambang', 110, 1);

-- --------------------------------------------------------

--
-- Table structure for table `boystandards`
--

CREATE TABLE `boystandards` (
  `age` int(11) NOT NULL,
  `su` double NOT NULL,
  `fuw` double NOT NULL,
  `tuw` double NOT NULL,
  `fn` double NOT NULL,
  `tn` double NOT NULL,
  `o` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boystandards`
--

INSERT INTO `boystandards` (`age`, `su`, `fuw`, `tuw`, `fn`, `tn`, `o`) VALUES
(0, 2.1, 2.2, 2.4, 2.5, 4.4, 4.5),
(1, 2.9, 3, 3.3, 3.4, 5.8, 5.9),
(2, 3.8, 3.9, 4.2, 4.3, 7.1, 7.2),
(3, 4.4, 4.5, 4.9, 5, 8, 8.1),
(4, 4.9, 5, 5.5, 5.6, 8.7, 8.8),
(5, 5.3, 5.4, 5.9, 6, 9.3, 9.4),
(6, 5.7, 5.8, 6.3, 6.4, 9.8, 9.9),
(7, 5.9, 6, 6.6, 6.7, 10.3, 10.4),
(8, 6.2, 6.3, 6.8, 6.9, 10.7, 10.8),
(9, 6.4, 6.5, 7, 7.1, 11, 11.1),
(10, 6.6, 6.7, 7.3, 7.4, 11.4, 11.5),
(11, 6.8, 6.9, 7.5, 7.6, 11.7, 11.8),
(12, 6.9, 7, 7.6, 7.7, 12, 12.1),
(13, 7.1, 7.2, 7.8, 7.9, 12.3, 12.4),
(14, 7.2, 7.3, 8, 8.1, 12.6, 12.7),
(15, 7.4, 7.5, 8.2, 8.3, 12.8, 12.9),
(16, 7.5, 7.6, 8.3, 8.4, 13.1, 13.2),
(17, 7.7, 7.8, 8.5, 8.6, 13.4, 13.5),
(18, 7.8, 7.9, 8.7, 8.8, 13.7, 13.8),
(19, 8, 8.1, 8.8, 8.9, 13.9, 14),
(20, 8.1, 8.2, 9, 9.1, 14.2, 14.3),
(21, 8.2, 8.3, 9.1, 9.2, 14.5, 14.6),
(22, 8.4, 8.5, 9.3, 9.4, 14.7, 14.8),
(23, 8.5, 8.6, 9.4, 9.5, 15, 15.1),
(24, 8.6, 8.7, 9.6, 9.7, 15.3, 15.4),
(25, 8.8, 8.9, 9.7, 9.8, 15.5, 15.6),
(26, 8.9, 9, 9.9, 10, 15.8, 15.9),
(27, 9, 9.1, 10, 10.1, 16.1, 16.2),
(28, 9.1, 9.2, 10.1, 10.2, 16.3, 16.4),
(29, 9.2, 9.3, 10.3, 10.4, 16.6, 16.7),
(30, 9.4, 9.5, 10.4, 10.5, 16.9, 17),
(31, 9.5, 9.6, 10.6, 10.7, 17.1, 17.2),
(32, 9.6, 9.7, 10.7, 10.8, 17.4, 17.5),
(33, 9.7, 9.8, 10.8, 10.9, 17.6, 17.7),
(34, 9.8, 9.9, 10.9, 11, 17.8, 17.9),
(35, 9.9, 10, 11.1, 11.2, 18.1, 18.2),
(36, 10, 10.1, 11.2, 11.3, 18.3, 18.4),
(37, 10.1, 10.2, 11.3, 11.4, 18.6, 18.7),
(38, 10.2, 10.3, 11.4, 11.5, 18.8, 18.9),
(39, 10.3, 10.4, 11.5, 11.6, 19, 19.1),
(40, 10.4, 10.5, 11.7, 11.8, 19.3, 19.4),
(41, 10.5, 10.6, 11.8, 11.9, 19.5, 19.6),
(42, 10.6, 10.7, 11.9, 12, 19.7, 19.8),
(43, 10.7, 10.8, 12, 12.1, 20, 20.1),
(44, 10.8, 10.9, 12.1, 12.2, 20.2, 20.3),
(45, 10.9, 11, 12.3, 12.4, 20.5, 20.6),
(46, 11, 11.1, 12.4, 12.5, 20.7, 20.8),
(47, 11.1, 11.2, 12.5, 12.6, 20.9, 21),
(48, 11.2, 11.3, 12.6, 12.7, 21.2, 21.3),
(49, 11.3, 11.4, 12.7, 12.8, 21.4, 21.5),
(50, 11.4, 11.5, 12.8, 12.9, 21.7, 21.8),
(51, 11.5, 11.6, 13, 13.1, 21.9, 22),
(52, 11.6, 11.7, 13.1, 13.2, 22.2, 22.3),
(53, 11.7, 11.8, 13.2, 13.3, 22.4, 22.5),
(54, 11.8, 11.9, 13.3, 13.4, 22.7, 22.8),
(55, 11.9, 12, 13.4, 13.5, 22.9, 23),
(56, 12, 12.1, 13.5, 13.6, 23.2, 23.3),
(57, 12.1, 12.2, 13.6, 13.7, 23.4, 23.5),
(58, 12.2, 12.3, 13.7, 13.8, 23.7, 23.8),
(59, 12.3, 12.4, 13.9, 14, 23.9, 24),
(60, 12.4, 12.5, 14, 14.1, 24.2, 24.3),
(61, 12.7, 12.8, 14.3, 14.4, 24.3, 24.4),
(62, 12.8, 12.9, 14.4, 14.5, 24.4, 24.5),
(63, 13, 13.1, 14.5, 14.6, 24.7, 24.8),
(64, 13.1, 13.2, 14.7, 14.8, 24.9, 25),
(65, 13.2, 13.3, 14.8, 14.9, 25.2, 25.3),
(66, 13.3, 13.4, 14.9, 15, 25.5, 25.6),
(67, 13.4, 13.5, 15.1, 15.2, 25.7, 25.8),
(68, 13.6, 13.7, 15.2, 15.3, 26, 26.1),
(69, 13.7, 13.8, 15.3, 15.4, 26.3, 26.4),
(70, 13.8, 13.9, 15.5, 15.6, 26.6, 26.7),
(71, 13.9, 14, 15.6, 15.7, 26.8, 26.9);

-- --------------------------------------------------------

--
-- Table structure for table `category_intervention`
--

CREATE TABLE `category_intervention` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_intervention`
--

INSERT INTO `category_intervention` (`id`, `name`) VALUES
(1, 'Fortification'),
(2, 'Behavioural'),
(3, 'Situational Actions'),
(4, 'Supplementation');

-- --------------------------------------------------------

--
-- Table structure for table `childrecords`
--

CREATE TABLE `childrecords` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `svdate` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `age` int(11) NOT NULL,
  `heightstatus` varchar(255) NOT NULL,
  `weightstatus` varchar(255) NOT NULL,
  `w8_h8` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childrecords`
--

INSERT INTO `childrecords` (`id`, `child_id`, `svdate`, `weight`, `height`, `age`, `heightstatus`, `weightstatus`, `w8_h8`, `added_by`) VALUES
(4, 89, '2021-10-24', 8, 67, 241, 'tall', 'overweight', 'obese', ''),
(5, 90, '2021-10-24', 20, 105, 59, 'normal', 'normal', 'normal', ''),
(9, 85, '2021-11-11', 75, 10, 63, 'severely stunted', 'overweight', 'obese', ''),
(13, 83, '2021-10-26', 9, 80, 20, 'normal', 'underweight', 'wasted', ''),
(14, 86, '2021-10-24', 9, 88, 18, 'tall', 'normal', 'severely wasted', ''),
(15, 87, '2021-11-24', 18, 78, 31, 'severely stunted', 'overweight', 'obese', ''),
(16, 82, '2021-10-24', 8, 80, 21, 'normal', 'underweight', 'wasted', ''),
(17, 89, '2021-12-27', 10, 67, 65, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(18, 89, '2021-12-24', 8, 48, 65, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(20, 84, '2021-10-24', 12, 92, 19, 'tall', 'normal', 'wasted', ''),
(50, 109, '2022-01-19', 1, 1, -1, 'tall', 'overweight', 'obese', ''),
(57, 85, '2021-12-04', 12, 88, 47, 'severely stunted', 'underweight', 'wasted', ''),
(58, 84, '2021-11-11', 10, 90, 22, 'normal', 'normal', 'normal', ''),
(59, 83, '2021-11-14', 8, 86, 35, 'stunted', 'severely underweight', 'severely wasted', ''),
(62, 83, '2021-12-03', 15, 111, 35, 'tall', 'normal', 'severely wasted', ''),
(63, 84, '2021-12-03', 13, 99, 22, 'tall', 'normal', 'wasted', ''),
(64, 109, '2021-12-04', 1, 1, 71, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(65, 113, '2022-01-25', 11, 80, 11, 'tall', 'normal', 'normal', ''),
(74, 114, '2021-12-29', 1, 1, 70, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(75, 114, '2022-01-13', 3, 3, 70, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(79, 114, '2022-01-05', 5, 5, 70, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(86, 85, '2021-12-12', 12, 89, 47, 'severely stunted', 'underweight', 'wasted', ''),
(91, 115, '2022-01-01', 1, 1, 52, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(109, 85, '2022-01-26', 12, 100, 47, 'normal', 'underweight', 'severely wasted', ''),
(110, 115, '2022-01-03', 3, 3, 52, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(114, 115, '2022-01-04', 3, 3, 52, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(116, 115, '2022-01-06', 5, 5, 52, 'severely stunted', 'severely underweight', 'severely wasted', ''),
(117, 115, '2022-01-07', 3, 3, 52, 'severely stunted', 'severely underweight', 'severely wasted', 'admin'),
(119, 115, '2022-01-14', 14, 14, 52, 'severely stunted', 'normal', 'obese', 'admin'),
(120, 115, '2022-01-15', 12, 12, 52, 'severely stunted', 'underweight', 'obese', 'noel c rohi'),
(121, 85, '2022-01-02', 3, 3, 47, 'severely stunted', 'severely underweight', 'severely wasted', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `girlstandards`
--

CREATE TABLE `girlstandards` (
  `age` int(11) NOT NULL,
  `su` double NOT NULL,
  `fuw` double NOT NULL,
  `tuw` double NOT NULL,
  `fn` double NOT NULL,
  `tn` double NOT NULL,
  `o` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `girlstandards`
--

INSERT INTO `girlstandards` (`age`, `su`, `fuw`, `tuw`, `fn`, `tn`, `o`) VALUES
(0, 2, 2.1, 2.3, 2.4, 4.2, 4.3),
(1, 2.7, 2.8, 3.1, 3.2, 5.5, 5.6),
(2, 3.4, 3.5, 3.8, 3.9, 6.6, 6.7),
(3, 4, 4.1, 4.4, 4.5, 7.5, 7.6),
(4, 4.4, 4.5, 4.9, 5, 8.2, 8.3),
(5, 4.8, 4.9, 5.3, 5.4, 8.8, 8.9),
(6, 5.1, 5.2, 5.6, 5.7, 9.3, 9.4),
(7, 5.3, 5.4, 5.9, 6, 9.8, 9.9),
(8, 5.6, 5.7, 6.2, 6.3, 10.2, 10.3),
(9, 5.8, 5.9, 6.4, 6.5, 10.5, 10.6),
(10, 5.9, 6, 6.6, 6.7, 10.9, 11),
(11, 6.1, 6.2, 6.8, 6.9, 11.2, 11.3),
(12, 6.3, 6.4, 6.9, 7, 11.5, 11.6),
(13, 6.4, 6.5, 7.1, 7.2, 11.8, 11.9),
(14, 6.6, 6.7, 7.3, 7.4, 12.1, 12.2),
(15, 6.7, 6.8, 7.5, 7.6, 12.4, 12.5),
(16, 6.9, 7, 7.6, 7.7, 12.6, 12.7),
(17, 7, 7.1, 7.8, 7.9, 12.9, 13),
(18, 7.2, 7.3, 8, 8.1, 13.2, 13.3),
(19, 7.3, 7.4, 8.1, 8.2, 13.5, 13.6),
(20, 7.5, 7.6, 8.3, 8.4, 13.7, 13.8),
(21, 7.6, 7.7, 8.5, 8.6, 14, 14.1),
(22, 7.8, 7.9, 8.6, 8.7, 14.3, 14.4),
(23, 7.9, 8, 8.8, 8.9, 14.6, 14.7),
(24, 8.1, 8.2, 8.9, 9, 14.8, 14.9),
(25, 8.2, 8.3, 9.1, 9.2, 15.1, 15.2),
(26, 8.4, 8.5, 9.3, 9.4, 15.4, 15.5),
(27, 8.5, 8.6, 9.4, 9.5, 15.7, 15.8),
(28, 8.6, 8.7, 9.6, 9.7, 16, 16.1),
(29, 8.8, 8.9, 9.7, 9.8, 16.2, 16.3),
(30, 8.9, 9, 9.9, 10, 16.5, 16.6),
(31, 9, 9.1, 10, 10.1, 16.8, 16.9),
(32, 9.1, 9.2, 10.2, 10.3, 17.1, 17.2),
(33, 9.3, 9.4, 10.3, 10.4, 17.3, 17.4),
(34, 9.4, 9.5, 10.4, 10.5, 17.6, 17.7),
(35, 9.5, 9.6, 10.6, 10.7, 17.9, 18),
(36, 9.6, 9.7, 10.7, 10.8, 18.1, 18.2),
(37, 9.7, 9.8, 10.8, 10.9, 18.4, 18.5),
(38, 9.8, 9.9, 11, 11.1, 18.7, 18.8),
(39, 9.9, 10, 11.1, 11.2, 19, 19.1),
(40, 10.1, 10.2, 11.2, 11.3, 19.2, 19.3),
(41, 10.2, 10.3, 11.4, 11.5, 19.5, 19.6),
(42, 10.3, 10.4, 11.5, 11.6, 19.8, 19.9),
(43, 10.4, 10.5, 11.6, 11.7, 20.1, 20.2),
(44, 10.5, 10.6, 11.7, 11.8, 20.4, 20.5),
(45, 10.6, 10.7, 11.9, 12, 20.7, 20.8),
(46, 10.7, 10.8, 12, 12.1, 20.9, 21),
(47, 10.8, 10.9, 12.1, 12.2, 21.2, 21.3),
(48, 10.9, 11, 12.2, 12.3, 21.5, 21.6),
(49, 11, 11.1, 12.3, 12.4, 21.8, 21.9),
(50, 11.1, 11.2, 12.4, 12.5, 22.1, 22.2),
(51, 11.2, 11.3, 12.6, 12.7, 22.4, 22.5),
(52, 11.3, 11.4, 12.7, 12.8, 22.6, 22.7),
(53, 11.4, 11.5, 12.8, 12.9, 22.9, 23),
(54, 11.5, 11.6, 12.9, 13, 23.2, 23.3),
(55, 11.6, 11.7, 13.1, 13.2, 23.5, 23.6),
(56, 11.7, 11.8, 13.2, 13.3, 23.8, 23.9),
(57, 11.8, 11.9, 13.3, 13.4, 24.1, 24.2),
(58, 11.9, 12, 13.4, 13.5, 24.4, 24.5),
(59, 12, 12.1, 13.5, 13.6, 24.6, 24.7),
(60, 12.1, 12.2, 13.6, 13.7, 24.7, 24.8),
(61, 12.4, 12.5, 13.9, 14, 24.8, 24.9),
(62, 12.5, 12.6, 14, 14.1, 25.1, 25.2),
(63, 12.6, 12.7, 14.1, 14.2, 25.4, 25.5),
(64, 12.7, 12.8, 14.2, 14.3, 25.6, 25.7),
(65, 12.8, 12.9, 14.3, 14.4, 25.9, 26),
(66, 12.9, 13, 14.5, 14.6, 26.2, 26.3),
(67, 13, 13.1, 14.6, 14.7, 26.5, 26.6),
(68, 13.1, 13.2, 14.7, 14.8, 26.7, 26.8),
(69, 13.2, 13.3, 14.8, 14.9, 27, 27.1),
(70, 13.3, 13.4, 14.9, 15, 27.3, 27.4),
(71, 13.4, 13.5, 15.1, 15.2, 27.6, 27.7);

-- --------------------------------------------------------

--
-- Table structure for table `heightboy`
--

CREATE TABLE `heightboy` (
  `age` int(11) NOT NULL,
  `ss` double NOT NULL,
  `fs` double NOT NULL,
  `ts` double NOT NULL,
  `fn` double NOT NULL,
  `tn` double NOT NULL,
  `t` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heightboy`
--

INSERT INTO `heightboy` (`age`, `ss`, `fs`, `ts`, `fn`, `tn`, `t`) VALUES
(0, 44.1, 44.2, 46, 46.1, 53.7, 53.8),
(1, 48.8, 48.9, 50.7, 50.8, 58.6, 58.7),
(2, 52.3, 52.4, 54.3, 54.4, 62.4, 62.5),
(3, 55.2, 55.3, 57.2, 57.3, 65.5, 65.6),
(4, 57.5, 57.6, 59.6, 59.7, 68, 68.1),
(5, 59.5, 59.6, 61.6, 61.7, 70.1, 70.2),
(6, 61.1, 61.2, 63.2, 63.3, 71.9, 72),
(7, 62.6, 62.7, 64.7, 64.8, 73.5, 73.6),
(8, 63.9, 64, 66.1, 66.2, 75, 75.1),
(9, 65.1, 65.2, 67.4, 67.5, 76.5, 76.6),
(10, 66.3, 66.4, 68.6, 68.7, 77.9, 78),
(11, 67.5, 67.6, 69.8, 69.9, 79.2, 79.3),
(12, 68.5, 68.6, 70.9, 71, 80.5, 80.6),
(13, 69.5, 69.6, 72, 72.1, 81.8, 81.9),
(14, 70.5, 70.6, 73, 73.1, 83, 83.1),
(15, 71.5, 71.6, 74, 74.1, 84.2, 84.3),
(16, 72.4, 72.5, 74.9, 75, 85.4, 85.5),
(17, 73.2, 73.3, 75.9, 76, 86.5, 86.6),
(18, 74.1, 74.2, 76.8, 76.9, 87.7, 87.8),
(19, 74.9, 75, 77.6, 77.7, 88.8, 88.9),
(20, 75.7, 75.8, 78.5, 78.6, 89.8, 89.9),
(21, 76.4, 76.5, 79.3, 79.4, 90.9, 91),
(22, 77.1, 77.2, 80.1, 80.2, 91.9, 92),
(23, 77.9, 78, 80.9, 81, 92.9, 93),
(24, 77.9, 78, 80.9, 81, 93.2, 93.3),
(25, 78.5, 78.6, 81.6, 81.7, 94.2, 94.3),
(26, 79.2, 79.3, 82.4, 82.5, 95.2, 95.3),
(27, 79.8, 79.9, 83, 83.1, 96.1, 96.2),
(28, 80.4, 80.5, 83.7, 83.8, 97, 97.1),
(29, 81, 81.1, 84.4, 84.5, 97.9, 98),
(30, 81.6, 81.7, 85, 85.1, 98.7, 98.8),
(31, 82.2, 82.3, 85.6, 85.7, 99.6, 99.7),
(32, 82.7, 82.8, 86.3, 86.4, 100.4, 100.5),
(33, 83.3, 83.4, 86.8, 86.9, 101.2, 101.3),
(34, 83.8, 83.9, 87.4, 87.5, 102, 102.1),
(35, 84.3, 84.4, 88, 88.1, 102.7, 102.8),
(36, 84.9, 85, 88.6, 88.7, 103.5, 103.6),
(37, 85.4, 85.5, 89.1, 89.2, 104.2, 104.3),
(38, 85.9, 86, 89.7, 89.8, 105, 105.1),
(39, 86.4, 86.5, 90.2, 90.3, 105.7, 105.8),
(40, 86.9, 87, 90.8, 90.9, 106.4, 106.5),
(41, 87.4, 87.5, 91.3, 91.4, 107.1, 107.2),
(42, 87.9, 88, 91.8, 91.9, 107.8, 107.9),
(43, 88.3, 88.4, 92.3, 92.4, 108.5, 108.6),
(44, 88.8, 88.9, 92.9, 93, 109.1, 109.2),
(45, 89.3, 89.4, 93.4, 93.5, 109.8, 109.9),
(46, 89.7, 89.8, 93.9, 94, 110.4, 110.5),
(47, 90.2, 90.3, 94.3, 94.4, 111.1, 111.2),
(48, 90.6, 90.7, 94.8, 94.9, 111.7, 111.8),
(49, 91.1, 91.2, 95.3, 95.4, 112.4, 112.5),
(50, 91.5, 91.6, 95.8, 95.9, 113, 113.1),
(51, 92, 92.1, 96.3, 96.4, 113.6, 113.7),
(52, 92.4, 92.5, 96.8, 96.9, 114.2, 114.3),
(53, 92.9, 93, 97.3, 97.4, 114.9, 115),
(54, 93.3, 93.4, 97.7, 97.8, 115.5, 115.6),
(55, 93.8, 93.9, 98.2, 98.3, 116.1, 116.2),
(56, 94.2, 94.3, 98.7, 98.8, 116.7, 116.8),
(57, 94.6, 94.7, 99.2, 99.3, 117.4, 117.5),
(58, 95.1, 95.2, 99.6, 99.7, 118, 118.1),
(59, 95.5, 95.6, 100.1, 100.2, 118.6, 118.7),
(60, 96, 96.1, 100.6, 100.7, 119.2, 119.3),
(61, 96.4, 96.5, 101, 101.1, 119.4, 119.5),
(62, 96.8, 96.9, 101.5, 101.6, 120, 120.1),
(63, 97.3, 97.4, 101.9, 102, 120.6, 120.7),
(64, 97.7, 97.8, 102.4, 102.5, 121.2, 121.3),
(65, 98.1, 98.2, 102.9, 103, 121.8, 121.9),
(66, 98.6, 98.7, 103.3, 103.4, 122.4, 122.5),
(67, 99, 99.1, 103.8, 103.9, 123, 123.1),
(68, 99.4, 99.5, 104.2, 104.3, 123.6, 123.7),
(69, 99.8, 99.9, 104.7, 104.8, 124.1, 124.2),
(70, 100.3, 100.4, 105.1, 105.2, 124.7, 124.8),
(71, 100.7, 100.8, 105.6, 105.7, 125.2, 125.3);

-- --------------------------------------------------------

--
-- Table structure for table `heightgirls`
--

CREATE TABLE `heightgirls` (
  `age` int(11) NOT NULL,
  `ss` double NOT NULL,
  `fs` double NOT NULL,
  `ts` double NOT NULL,
  `fn` double NOT NULL,
  `tn` double NOT NULL,
  `t` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heightgirls`
--

INSERT INTO `heightgirls` (`age`, `ss`, `fs`, `ts`, `fn`, `tn`, `t`) VALUES
(0, 43.5, 43.6, 45.3, 45.4, 52.9, 53),
(1, 47.7, 47.8, 49.7, 49.8, 57.6, 57.7),
(2, 50.9, 51, 52.9, 53, 61.1, 61.2),
(3, 53.4, 53.5, 55.5, 55.6, 64, 64.1),
(4, 55.5, 55.6, 57.7, 57.8, 66.4, 66.5),
(5, 57.3, 57.4, 59.5, 59.6, 68.5, 68.6),
(6, 58.8, 58.9, 61.1, 61.2, 70.3, 70.4),
(7, 60.2, 60.3, 62.6, 62.7, 71.9, 72),
(8, 61.6, 61.7, 63.9, 64, 73.5, 73.6),
(9, 62.8, 62.9, 65.2, 65.3, 75, 75.1),
(10, 64, 64.1, 66.4, 66.5, 76.4, 76.5),
(11, 65.1, 65.2, 67.6, 67.7, 77.8, 77.9),
(12, 66.2, 66.3, 68.8, 68.9, 79.2, 79.3),
(13, 67.2, 67.3, 69.9, 70, 80.5, 80.6),
(14, 68.2, 68.3, 70.9, 71, 81.7, 81.8),
(15, 69.2, 69.3, 71.9, 72, 83, 83.1),
(16, 70.1, 70.2, 72.9, 73, 84.2, 84.3),
(17, 71, 71.1, 73.9, 74, 85.4, 85.5),
(18, 71.9, 72, 74.8, 74.9, 86.5, 86.6),
(19, 72.7, 72.8, 75.7, 75.8, 87.6, 87.7),
(20, 73.6, 73.7, 76.6, 76.7, 88.7, 88.8),
(21, 74.4, 74.5, 77.4, 77.5, 89.8, 89.9),
(22, 75.1, 75.2, 78.3, 78.4, 90.8, 90.9),
(23, 75.9, 76, 79.1, 79.2, 91.9, 92),
(24, 75.9, 76, 79.2, 79.3, 92.2, 92.3),
(25, 76.7, 76.8, 79.9, 80, 93.1, 93.2),
(26, 77.4, 77.5, 80.7, 80.8, 94.1, 94.2),
(27, 78, 78.1, 81.4, 81.5, 95, 95.1),
(28, 78.7, 78.8, 82.1, 82.2, 96, 96.1),
(29, 79.4, 79.5, 82.8, 82.9, 96.9, 97),
(30, 80, 80.1, 83.5, 83.6, 97.7, 97.8),
(31, 80.6, 80.7, 84.2, 84.3, 98.6, 98.7),
(32, 81.2, 81.3, 84.8, 84.9, 99.4, 99.5),
(33, 81.8, 81.9, 85.5, 85.6, 100.3, 100.4),
(34, 82.4, 82.5, 86.1, 86.2, 101.1, 101.2),
(35, 83, 83.1, 86.7, 86.8, 101.9, 102),
(36, 83.5, 83.6, 87.3, 87.4, 102.7, 102.8),
(37, 84.1, 84.2, 87.9, 88, 103.4, 103.5),
(38, 84.6, 84.7, 88.5, 88.6, 104.2, 104.3),
(39, 85.2, 85.3, 89.1, 89.2, 105, 105.1),
(40, 85.7, 85.8, 89.7, 89.8, 105.7, 105.8),
(41, 86.2, 86.3, 90.3, 90.4, 106.4, 106.5),
(42, 86.7, 86.8, 90.8, 90.9, 107.2, 107.3),
(43, 87.3, 87.4, 91.4, 91.5, 107.9, 108),
(44, 87.8, 87.9, 91.9, 92, 108.6, 108.7),
(45, 88.3, 88.4, 92.4, 92.5, 109.3, 109.4),
(46, 88.8, 88.9, 93, 93.1, 110, 110.1),
(47, 89.2, 89.3, 93.5, 93.6, 110.7, 110.8),
(48, 89.7, 89.8, 94, 94.1, 111.3, 111.4),
(49, 90.2, 90.3, 94.5, 94.6, 112, 112.1),
(50, 90.6, 90.7, 95, 95.1, 112.7, 112.8),
(51, 91.1, 91.2, 95.5, 95.6, 113.3, 113.4),
(52, 91.6, 91.7, 96, 96.1, 114, 114.1),
(53, 92, 92.1, 96.5, 96.6, 114.6, 114.7),
(54, 92.5, 92.6, 97, 97.1, 115.2, 115.3),
(55, 92.9, 93, 97.5, 97.6, 115.9, 116),
(56, 93.3, 93.4, 98, 98.1, 116.5, 116.6),
(57, 93.8, 93.9, 98.4, 98.5, 117.1, 117.2),
(58, 94.2, 94.3, 98.9, 99, 117.7, 117.8),
(59, 94.6, 94.7, 99.4, 99.5, 118.3, 118.4),
(60, 95.1, 95.2, 99.8, 99.9, 118.9, 119),
(61, 95.2, 95.3, 100, 100.1, 119.1, 119.2),
(62, 95.6, 95.7, 100.4, 100.5, 119.7, 119.8),
(63, 96, 96.1, 100.9, 101, 120.3, 120.4),
(64, 96.4, 96.5, 101.3, 101.4, 120.9, 121),
(65, 96.9, 97, 101.8, 101.9, 121.5, 121.6),
(66, 97.3, 97.4, 102.2, 102.3, 122, 122.1),
(67, 97.7, 97.8, 102.6, 102.7, 122.6, 122.7),
(68, 98.1, 98.2, 103.1, 103.2, 123.2, 123.3),
(69, 98.5, 98.6, 103.5, 103.6, 123.7, 123.8),
(70, 98.9, 99, 103.9, 104, 124.3, 124.4),
(71, 99.3, 99.4, 104.4, 104.5, 124.8, 124.9);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `survey_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `intcount`
--

CREATE TABLE `intcount` (
  `child_id` varchar(255) NOT NULL,
  `counts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intcount`
--

INSERT INTO `intcount` (`child_id`, `counts`) VALUES
('83', 1),
('84', 2),
('85', 3),
('86', 2);

-- --------------------------------------------------------

--
-- Table structure for table `intervention`
--

CREATE TABLE `intervention` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `svdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intervention`
--

INSERT INTO `intervention` (`id`, `child_id`, `program`, `svdate`) VALUES
(99, 86, 'Childhood obesity prevention', '2021-12-03'),
(100, 86, 'Fortified Rice', '2021-12-03'),
(106, 84, 'Childhood obesity prevention', '2021-12-27'),
(116, 85, 'Breastfeeding', '2022-01-21'),
(117, 85, 'Reducing sugar intake', '2022-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `mechanism`
--

CREATE TABLE `mechanism` (
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanism`
--

INSERT INTO `mechanism` (`category`, `name`, `id`) VALUES
('Behavioural', 'Breastfeeding', 28),
('Behavioural', 'Nutritional care of HIV-infected children', 29),
('Behavioural', 'Childhood obesity prevention', 30),
('Behavioural', 'Potassium intake to control blood pressure', 31),
('Behavioural', 'Reducing sodium intake', 32),
('Behavioural', 'Reducing sugar intake', 33),
('Situational Actions', 'Deworming', 34),
('Fortification', 'Fortified Rice', 39),
('Fortification', 'Fortified Wheat Flour ', 40),
('Fortification', 'Fortified corn meal', 41),
('Fortification', 'Vitamin A in staple food intake', 42),
('Situational Actions', 'Hygiene for diarrhea prevention', 43),
('Supplementation', 'Daily Iron Supplementation', 44),
('Supplementation', 'Daily Vitamin A Supplementation', 45),
('Supplementation', 'Vitamin D Supplementation', 46),
('Supplementation', 'Vitamin E Supplementation in preterm infants', 47),
('Supplementation', 'Supplementary foods for moderate acute malnutrition', 48);

-- --------------------------------------------------------

--
-- Table structure for table `newchild`
--

CREATE TABLE `newchild` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `p_lastname` varchar(255) NOT NULL,
  `p_firstname` varchar(255) NOT NULL,
  `p_middlename` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `weightstatus` varchar(255) NOT NULL,
  `heightstatus` varchar(255) NOT NULL,
  `w8_h8` varchar(255) NOT NULL,
  `svdate` date NOT NULL,
  `entrydate` varchar(255) NOT NULL,
  `archive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newchild`
--

INSERT INTO `newchild` (`id`, `lastname`, `firstname`, `middlename`, `birthdate`, `age`, `gender`, `street`, `barangay`, `municipality`, `p_lastname`, `p_firstname`, `p_middlename`, `weight`, `height`, `weightstatus`, `heightstatus`, `w8_h8`, `svdate`, `entrydate`, `archive`) VALUES
(82, 'Rosales', 'Joanna', 'A.', '2020-01-01', 24, 'Female', '556 Plaza De Conde 1000', 'Darawey', 'Bayambang', 'Rosales', 'Linda', 'A.', 8, 80, 'underweight', 'normal', 'wasted', '2021-10-24', 'October 24, 2021, 2:12 pm', 'December 28, 2021, 10:28 am'),
(83, 'Keith', 'Adrian', 'M.', '2019-02-05', 35, 'Male', '#202 Rizal Avenue', 'Poblacion Sur', 'Bayambang', 'Keith', 'Eliezer', 'C.', 15, 111, 'normal', 'tall', 'severely wasted', '2021-12-03', 'October 24, 2021, 2:13 pm', ''),
(84, 'Guzman', 'Bryson', 'K.', '2020-03-05', 22, 'Male', '73 Don Ramon Avenue 1100', 'Zone VI', 'Bayambang', 'Guzman', 'Jessa', 'K.', 13, 99, 'normal', 'tall', 'wasted', '2021-12-03', 'October 24, 2021, 2:27 pm', ''),
(85, 'Drake', 'Paisley', 'P.', '2018-02-12', 47, 'Male', '45 N. Escario Street', 'Zone II', 'Bayambang', 'Drake', 'Ais', 'P.', 12, 100, 'underweight', 'normal', 'severely wasted', '2022-01-26', 'October 24, 2021, 2:11 pm', 'January 21, 2022, 6:18 am'),
(86, 'Lee', 'Jaydon', 'R.', '2020-04-14', 21, 'Male', '22 Chino Roces Avenue', 'Tambac', 'Bayambang', 'Lee', 'James', 'N.', 9, 88, 'normal', 'tall', 'severely wasted', '2021-10-24', 'October 24, 2021, 3:24 pm', 'December 28, 2021, 10:28 am'),
(87, 'Lee', 'Lucy', 'R.', '2019-03-03', 34, 'Female', '22 Chino Roces Avenue', 'Tambac', 'Bayambang', 'Lee', 'James', 'N.', 18, 78, 'overweight', 'severely stunted', 'obese', '2021-11-24', 'October 24, 2021, 3:25 pm', 'December 28, 2021, 10:28 am'),
(90, 'Lozano', 'Marc', 'O.', '2016-10-26', 63, 'Male', 'B81 L10 Bernardo Carpio', 'Amancosiling Sur', 'Bayambang', 'Lozano', 'Jomar', 'U.', 20, 105, 'normal', 'normal', 'normal', '2021-10-24', 'October 24, 2021, 4:37 pm', 'December 28, 2021, 10:28 am'),
(105, 'Montero', 'Duke', 'C.', '2015-02-10', 83, 'Male', 'Nvm St North', 'Cadre Site', 'Bayambang', 'Montero', 'Diego', 'F.', 0, 0, '', '', '', '0000-00-00', 'November 6, 2021, 5:59 pm', 'January 20, 2022, 12:22 pm'),
(112, 'Garcia', 'Noel Rohi', 'C', '2016-01-02', 72, 'Male', '271 Padre Domingo St.', 'Navatat', 'Basista', 'Garcia', 'Zen', 'C.', 0, 0, '', '', '', '0000-00-00', 'January 20, 2022, 12:12 pm', 'January 20, 2022, 12:21 pm'),
(113, 'Garcia', 'Noel Rohi', '', '2021-02-20', 11, 'Male', '271', 'Navatat', 'Basista', 'Garcia', 'Zeny', '', 11, 80, 'normal', 'tall', 'normal', '2022-01-25', 'January 25, 2022, 9:30 am', ''),
(114, 'Panis', 'Novoe', '', '2016-03-03', 70, 'Male', '33', 'Alinggan', 'Bayambang', 'Panis', 'Marilou', '', 5, 5, 'severely underweight', 'severely stunted', 'severely wasted', '2022-01-05', 'January 25, 2022, 2:51 pm', ''),
(115, 'Garc', 'Roi', '', '2017-09-03', 52, 'Male', '271', 'Alinggan', 'Bayambang', 'Garc', 'Zen', '', 12, 12, 'underweight', 'severely stunted', 'obese', '2022-01-15', 'January 25, 2022, 9:19 pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `p_lastname` varchar(255) NOT NULL,
  `p_firstname` varchar(255) NOT NULL,
  `p_middlename` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `weightstatus` varchar(255) NOT NULL,
  `heightstatus` varchar(255) NOT NULL,
  `w8_h8` varchar(255) NOT NULL,
  `svdate` date NOT NULL,
  `entrydate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`id`, `lastname`, `firstname`, `middlename`, `birthdate`, `age`, `gender`, `street`, `barangay`, `municipality`, `p_lastname`, `p_firstname`, `p_middlename`, `weight`, `height`, `weightstatus`, `heightstatus`, `w8_h8`, `svdate`, `entrydate`) VALUES
(109, 'Garcia', 'Shekinah', 'Cagunot', '2016-02-02', 71, 'Female', '271 Padre', 'Obong', '', 'Garcia', 'Zen', 'C.', 1, 1, 'overweight', 'tall', 'obese', '2022-01-19', 'January 13, 2022, 6:37 pm');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `role` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `role`, `barangay`, `status`) VALUES
(99, 'Roii', 'leonihro@gmail.com', '$2y$10$Ix2XdWdTxU3Z.4kHMcvDA.W00WbzzbTbIf9R55EXTVepxRXheJw2i', 0, 'admin', '', 'verified'),
(101, 'Vlad Milize', 'milizehime@gmail.com', '$2y$10$uNBxpFdKqzfzWMP4Hy9TwOty52eYUlEx59BsjlewNXvVtMqrANccS', 0, 'coordinator', '', 'verified'),
(107, 'Roiroi', 'aicrag.ig0p@gmail.com', '$2y$10$ZC0XA7b0VJkMYBOgbilV..VpndKztCtl4oqrTPGdIF2hlsJUfXk.2', 0, 'enumerator', 'Bani', 'verified'),
(110, 'Rohi', 'noelrohi59@gmail.com', '$2y$10$DwdGlxL956GHIyexdJ1gIO3LTD.iauH/bvegDwqnvtqigasQ2xOXG', 0, 'admin', '', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_intervention`
--
ALTER TABLE `category_intervention`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childrecords`
--
ALTER TABLE `childrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intcount`
--
ALTER TABLE `intcount`
  ADD UNIQUE KEY `child_id` (`child_id`);

--
-- Indexes for table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mechanism`
--
ALTER TABLE `mechanism`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newchild`
--
ALTER TABLE `newchild`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `category_intervention`
--
ALTER TABLE `category_intervention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `childrecords`
--
ALTER TABLE `childrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `mechanism`
--
ALTER TABLE `mechanism`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `newchild`
--
ALTER TABLE `newchild`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

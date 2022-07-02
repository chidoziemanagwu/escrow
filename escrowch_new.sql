-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2022 at 11:38 AM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escrowch_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `escrowset` varchar(300) DEFAULT NULL,
  `escrowwallet` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `escrowset`, `escrowwallet`) VALUES
(1, '4%', 'bc1qtw58sxdaadcn9fmxy0hvg5l5yfw4p2qr0668ht');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `currency` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `transactiondate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `uid`, `amount`, `currency`, `status`, `transactiondate`) VALUES
(24, 'vladkhan033', '5000', 'BTC', 'APPROVED', '2021-12-04 07:25:26'),
(28, 'didier.jenni@ymail.com', '30.57', 'BTC', 'APPROVED', '2022-01-03 15:57:02'),
(29, 'dijeplo@gmail.com', '30.57', 'BTC', 'APPROVED', '2022-01-16 15:18:48'),
(31, 'bountyhunter1', '20', 'BTC', 'APPROVED', '2022-01-25 16:42:36'),
(33, 'vlad khan', '0.16', 'BTC', 'Pending', '2022-03-16 11:09:10'),
(50, 'marcoest', '5756', '$', 'APPROVED', '2022-05-14 08:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `escrow`
--

CREATE TABLE `escrow` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `escrowfee` varchar(255) NOT NULL,
  `buyername` varchar(255) NOT NULL,
  `buyeremail` varchar(255) NOT NULL,
  `sellername` varchar(255) NOT NULL,
  `selleremail` varchar(255) NOT NULL,
  `wallet` varchar(255) NOT NULL,
  `trans` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escrow`
--

INSERT INTO `escrow` (`id`, `uid`, `amount`, `currency`, `escrowfee`, `buyername`, `buyeremail`, `sellername`, `selleremail`, `wallet`, `trans`, `status`, `pin`) VALUES
(38, 73, '2.25', 'BTC', '50-50', 'Brenda ohene', 'ako.ohene@gmail.com', 'Herman ', 'forensicgeius@tuta.io', 'not known ', '2020-09-28 20:40:26', 'Received by Escrow', 839573),
(27, 65, '32.87', 'BTC', '82-18', 'Brian Paul', 'Brian.bungum@me.com', 'Albert Guzman', 'albertguzman@tutanota.com', '1Lg5VY4HgqmcuhrenXPmHYbxPXofX8Cfa9', '2020-07-21 06:24:29', 'processing payment', 706152),
(28, 65, '15.06', 'BTC', '100-0', 'Girlie Acero', 'gdoacero@yahoo.com', 'Albert Guzman', 'albertguzman@tutanota.com', '1Lg5VY4HgqmcuhrenXPmHYbxPXofX8Cfa9', '2020-07-21 18:56:55', 'Pending', 123199),
(29, 65, '13.88', 'BTC', '80-20', 'Becky English', 'robandbeckyenglish@gmail.com', 'Albert Guzman', 'albertguzman@tutanota.com', '13KfmDECp2WCQSA5MkCyTQFYfELFF1TNZs', '2020-07-27 13:40:56', 'Pending', 619484),
(39, 65, '0.36', 'BTC', '100-0', 'Ayda Aliyari', 'aidainmoon@yahoo.com', 'Albert Guzman', 'albertguzman@tutanota.com', 'nil', '2021-03-02 06:20:59', 'Pending', 806575),
(40, 65, '150,000', 'USDT', '0-100', 'June Chin', 'junechin3@gmail.com', 'Anonymous ', 'info@fiscalescrow.com', 'nil', '2021-06-11 02:07:50', 'Pending', 154862),
(41, 65, '3.45', 'BTC', '0-100', 'Olivera ', 'oliverasunny@gmail.com', 'Albert Guzman', 'albertguzman@tutanota.com', 'nil', '2021-06-11 02:08:51', 'Pending', 937272),
(42, 65, '150,000', 'USDT', '0-100', 'June Chin', 'junechin3@gmail.com', 'wilfried kauffmann', 'wilfriedkauffmann@tutanota.com', 'nil', '2021-06-17 05:18:47', 'Pending', 752234),
(43, 65, '22', 'BTC', '0-100', 's', 'andersonflies1964@gmail.com', 'Albert Guzman', 'albertguzman@tutanota.com', 'nil', '2021-07-24 15:23:14', 'Pending', 593790),
(44, 81, '0.00000000', 'BTC', '50-50', 'G', 'g@gmail.com', 'H', 'h@gmail.com', '12SnWdgszyiABKQWmJyT7s91vjFDfcdHN7', '2021-07-24 15:44:16', 'Pending', 782467),
(45, 65, '331,467.34', 'USDT', '0-100', 'Seno Ryan Jr', 'senoryanjr@gmail.com', 'Albert Guzman', 'albertguzman@tutanota.com', 'nil', '2021-07-24 22:13:38', 'Pending', 986838),
(46, 69, '0.00000000888888', 'BTC', '50-50', 'bernaldinobest https://wikipedia.org 9439030', 'juliagaskoin95@yandex.ru', 'bernaldinobest https://wikipedia.org 9439030', 'juliagaskoin95@yandex.ru', 'jjjj', '2021-07-24 23:00:03', 'Pending', 536610),
(47, 80, '0.19', 'BTC', '50-50', 'Joe Tablan ', 'Joseph.tablan@gmail.com', 'Finance recovery', 'hello@financerecovery.com', '1LMGLnm2FknGHhM5vf3zUGiJNvs3npCeeU', '2021-07-29 13:10:47', 'Pending', 471939),
(48, 80, '0.19', 'BTC', '50-50', 'Joseph Tablan', 'joseph.tablan@gmail.com', 'Finance Recovery', 'hello@financerecovery.org', '1LMGLnm2FknGHhM5vf3zUGiJNvs3npCeeU', '2021-07-29 16:09:35', 'Pending', 776106),
(49, 81, '0.003', 'BSV', '100-0', 'Saynt', 'csalvarenga@gmail.com', 'Flow', 'yoobla@pm.me', '1JCM7yBRL2dGi9KeVpVuzpeu5jgfnZF3B6', '2021-08-08 07:52:15', 'Pending', 410511),
(50, 81, '0.001', 'BSV', '100-0', 'Saynt', 'csalvarenga3@gmail.com', 'Flow', 'yoobla@pm.me', '1JCM7yBRL2dGi9KeVpVuzpeu5jgfnZF3B6', '2021-08-08 07:57:11', 'Pending', 479526),
(51, 83, '4500', 'USDT', '100-0', 'Gerald', 'krottandsonsllc@gmail.com', 'David', 'Atriumforensic5@gmail.com', 'bc1qj99ka2g88n6cjge42ac3qsg42580wjc2s2uq8q', '2021-08-11 13:11:25', 'Received ', 488667),
(52, 83, '150,000', 'USDT', '100-0', 'Gerald', 'krottandsonsllc@gmail.com', 'David', 'Atriumforensic5@gmail.com', 'bc1qj99ka2g88n6cjge42ac3qsg42580wjc2s2uq8q', '2021-08-11 16:51:36', 'Received ', 963660),
(53, 84, '7.4951', 'BTC', '100-0', 'Aquinda ', 'aquinda.woodrum@gmail.com', 'Herman', 'info@recoverfunds.org', '1F32AqrK2wzCJ8iePRpxtufWMGtKJqeRTE', '2021-08-17 16:31:51', 'Recovered funds available for coin mixing protocol', 781348),
(54, 84, '7.4951', 'BTC', '50-50', 'Aquinda', 'aquinda.woodrum@gmail.com', 'Herman', 'info@recoverfunds.org', '1F32AqrK2wzCJ8iePRpxtufWMGtKJqeRTE', '2021-08-18 18:00:44', 'Pending', 842389),
(55, 85, '11.11', 'BTC', '100-0', 'Aida Aliyari', 'aidainmoon@yahoo.com', 'Albert Guzman', 'albertguzman@tutanota.com', 'bc1qj99ka2g88n6cjge42ac3qsg42580wjc2s2uq8q', '2021-08-20 01:46:01', 'Pending', 555097);

-- --------------------------------------------------------

--
-- Table structure for table `escrow2`
--

CREATE TABLE `escrow2` (
  `id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `usertype` varchar(300) NOT NULL,
  `transactiontype` varchar(300) NOT NULL,
  `currency` varchar(300) NOT NULL,
  `price` varchar(300) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `address` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `transactiondate` date NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escrow2`
--

INSERT INTO `escrow2` (`id`, `uid`, `usertype`, `transactiontype`, `currency`, `price`, `description`, `address`, `status`, `transactiondate`, `deadline`) VALUES
(13, 'doxzy', 'seller', 'Online', 'BTC', '89', '', 'h', 'Pending', '2021-12-04', '0000-00-00'),
(14, 'doxzy', 'seller', 'Online', 'BTC', '89', '', 'h', 'APPROVED', '2021-12-04', '0000-00-00'),
(15, 'doxzy', 'seller', 'Online', 'BTC', '89', '', 'h', 'APPROVED', '2021-12-04', '0000-00-00'),
(16, 'doxzy', 'seller', 'Online', 'BTC', '89', '', 'h', 'APPROVED', '2021-12-04', '0000-00-00'),
(18, 'ethicalgeniius', 'Buyer', 'Online', 'BTC', '30.57', 'recovered funds', 'vladkhan033@gmail.com', 'APPROVED', '2022-12-01', '2022-01-05'),
(19, 'ethicalgeniius', 'buyer', 'Online', 'BTC', '30.57', 'recovered funds', 'vladkhan033@gmail.com', 'APPROVED', '2022-01-02', '2022-01-05'),
(20, 'ethicalgeniius', 'buyer', 'Online', 'BTC', '30.57', 'recovered funds', 'vladkhan033@gmail.com', 'APPROVED', '2022-01-02', '2022-01-05'),
(21, 'vladkhan033@gmail.com', 'seller', 'Online', 'BTC', '30.57', 'recovered funds', 'vladkhan033@gmail.com', 'APPROVED', '2022-01-03', '2022-01-05'),
(22, 'vladkhan033@gmail.com', 'seller', 'Online', 'BTC', '30.57', 'recovered funds', 'vladkhan033@gmail.com', 'APPROVED', '2022-01-03', '2022-01-05'),
(23, 'vladkhan033@gmail.com', 'seller', 'Online', 'BTC', '30.57', 'recovered funds', 'vladkhan033@gmail.com', 'APPROVED', '2022-01-03', '2022-01-05'),
(24, 'vladkhan033@gmail.com', 'seller', 'Online', 'BTC', '30.57', 'recovered funds', 'vladkhan033@gmail.com', 'APPROVED', '2022-01-03', '2022-01-05'),
(25, 'ethicalgeniius', 'Buyer', 'online', 'BTC', '0.16', 'payment for consultation', 'xexrr5ycxs1cdhjkkki808hbvdw3fdsffgbhjnkuytrxaqsAdfg', 'APPROVED', '2022-03-16', '2022-03-16'),
(26, 'vlad khan', 'seller', 'online', 'BTC', '0.16', 'payment for consultation', 'xexrr5ycxs1cdhjkkki808hbvdw3fdsffgbhjnkuytrxaqsAdfg', 'APPROVED', '2022-03-16', '2022-03-16'),
(27, 'vlad khan', 'seller', 'online', 'BTC', '0.16', 'payment for consultation', 'xexrr5ycxs1cdhjkkki808hbvdw3fdsffgbhjnkuytrxaqsAdfg', 'APPROVED', '2022-03-16', '2022-03-16'),
(28, 'PDH', 'Buyer', 'online', 'BTC', '0.159', 'INVESTMENT RECOVERY SERVICES', 'bc1q9e5ug9dz5ah5vu7wytrektyftzt3vyx47umk8e', 'APPROVED', '2022-03-22', '2022-03-26'),
(29, 'hbhatt81', 'Buyer', 'online', 'dollars', '3000', 'For recovery of my money lost to scammers ', '1HRh9WuhixKzmpoB3pt5bvT1DkK8ob9mLC', 'Declined', '2022-03-23', '1970-01-01'),
(30, 'hbhatt81', 'Buyer', 'online', 'dollars', '3000', 'Recovery of my investment from scammers', '1HRh9WuhixKzmpoB3pt5bvT1DkK8ob9mLC', 'Declined', '2022-03-23', '2022-03-23'),
(31, 'hbhatt81', 'Buyer', 'online', 'dollars', '3000', 'Recovery of funds ', '1HRh9WuhixKzmpoB3pt5bvT 1 DkK80b 9mLC ', 'APPROVED', '2022-03-24', '2022-03-26'),
(32, 'FINANCE RECOVERY LTD', 'seller', 'online', 'dollars', '3000', 'Recovery of funds ', '1HRh9WuhixKzmpoB3pt5bvT 1 DkK80b 9mLC ', 'APPROVED', '2022-03-24', '2022-03-26'),
(33, 'FINANCE RECOVERY LTD', 'seller', 'online', 'dollars', '3000', 'Recovery of funds ', '1HRh9WuhixKzmpoB3pt5bvT 1 DkK80b 9mLC ', 'APPROVED', '2022-03-25', '2022-03-26'),
(34, 'marcoest', 'Buyer', 'Online', 'BTC', '5756', 'Recovery of Funds Service', '1MAMFRZMLYLuEhRdfjrojJopHKyMxnZuTH', 'APPROVED', '2022-05-20', '2022-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `ftiinvest`
--

CREATE TABLE `ftiinvest` (
  `id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `totalamount` varchar(300) NOT NULL,
  `lastdate` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ftiuser`
--

CREATE TABLE `ftiuser` (
  `id` int(11) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `btcwallet` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ftiuser`
--

INSERT INTO `ftiuser` (`id`, `fname`, `lname`, `email`, `password`, `btcwallet`) VALUES
(5, 'Chidozie', 'Managwu', 'chidozie.managwu@gmail.com', 'doxzy', ''),
(6, 'Chidozie', 'Managwu', 'managwu@gmail.com', 'doxzy', 'elelenwo road, port harcopurt rivers state'),
(7, 'T', 'Managwu', 'chidozi.managwu@gmail.com', 'f', 'elelenwo road, port harcopurt rivers state');

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mixin`
--

CREATE TABLE `mixin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `datedone` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mixin2`
--

CREATE TABLE `mixin2` (
  `id` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `mixinstatus` varchar(300) NOT NULL,
  `datedone` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateelapse` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mixin2`
--

INSERT INTO `mixin2` (`id`, `fullname`, `amount`, `status`, `mixinstatus`, `datedone`, `dateelapse`) VALUES
(50, 'didier.jenni@ymail.com', '30.57', 'DECLINED', 'Completed', '2022-01-03 15:28:02', '2022-01-06'),
(51, 'dijeplo@gmail.com', '1', 'DECLINED', 'Completed', '2022-01-20 12:50:31', '2022-01-23'),
(52, 'bountyhunter1', '10', 'Pending', 'Pending', '2022-01-25 11:43:48', '2022-01-28'),
(54, 'Evertard', '33750', 'Pending', 'Pending', '2022-05-06 17:25:32', '2022-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `id` int(11) NOT NULL,
  `mixinwallet` varchar(500) NOT NULL,
  `mixinqr` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qr`
--

INSERT INTO `qr` (`id`, `mixinwallet`, `mixinqr`) VALUES
(1, '1MAMFRZMLYLuEhRdfjrojJopHKyMxnZuTH', '20220506_220757.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `qr2`
--

CREATE TABLE `qr2` (
  `id` int(11) NOT NULL,
  `mixinwallet` varchar(500) NOT NULL,
  `mixinqr` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qr2`
--

INSERT INTO `qr2` (`id`, `mixinwallet`, `mixinqr`) VALUES
(1, '1JgUpcwijEutahgV4QL3Dmmheve7jetuZR', 'WhatsApp Image 2022-03-24 at 4.48.43 AM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance` varchar(300) NOT NULL,
  `referal` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `location`, `trn_date`, `balance`, `referal`) VALUES
(115, 'vlad', 'Khan', 'famousbountyhunter', 'vladkhan033@gmail.com', 'Consultant1', 'United States of America', '2022-05-14 09:49:57', '34', 'escrow-chain'),
(117, 'Bou', 'smells', 'bounty hunter1', 'famousbountyhunter@tuta.io', 'Member1', 'Afganistan', '2022-05-14 09:49:36', '20', 'escrow-chain'),
(126, 'John', 'Konner', 'Doxzy', 'ghostfrancis2@gmail.com', 'doxzy123', 'United States of America', '2022-04-15 04:43:24', '', 'escrow-chain'),
(116, 'Didier', 'Jenni', 'dijeplo@gmail.com', 'dijeplo@gmail.com', 'Eiger2022$', 'Switzerland', '2022-01-16 15:19:17', '29.72', 'escrow-chain'),
(114, 'Albert', 'Espinoza', 'ethicalgeniius', 'ethicalgeniius@gmail.com', 'Member1', 'United States of America', '2022-01-02 20:37:13', '49', 'escrow-chain'),
(130, 'Marco', 'Estebanes', 'marcoest', 'marco@meconsultingllc.com', 'Member123', 'United States of America', '2022-05-14 04:55:00', '5756', 'escrow-chain');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `currency` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `transactiondate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `uid`, `amount`, `address`, `currency`, `status`, `transactiondate`) VALUES
(1, 'PDH', '0.159', '3NnA4KMcTzYM86TZX5fuFKKsFC2Rj6EWMr', 'BTC', 'Declined', '2022-03-26 23:03:42'),
(2, 'PDH', '0.159', '3NnA4KMcTzYM86TZX5fuFKKsFC2Rj6EWMr', 'BTC', 'Declined', '2022-03-26 23:10:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escrow`
--
ALTER TABLE `escrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escrow2`
--
ALTER TABLE `escrow2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ftiinvest`
--
ALTER TABLE `ftiinvest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ftiuser`
--
ALTER TABLE `ftiuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mixin`
--
ALTER TABLE `mixin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mixin2`
--
ALTER TABLE `mixin2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr2`
--
ALTER TABLE `qr2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `escrow`
--
ALTER TABLE `escrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `escrow2`
--
ALTER TABLE `escrow2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ftiinvest`
--
ALTER TABLE `ftiinvest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ftiuser`
--
ALTER TABLE `ftiuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mixin`
--
ALTER TABLE `mixin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mixin2`
--
ALTER TABLE `mixin2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `qr`
--
ALTER TABLE `qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qr2`
--
ALTER TABLE `qr2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

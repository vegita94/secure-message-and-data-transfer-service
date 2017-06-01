-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2017 at 06:25 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `des`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `msg_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `sender_u` varchar(15) NOT NULL,
  `receiver` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `msg` longtext NOT NULL,
  `msg_key` varchar(16) NOT NULL,
  `datetime` datetime NOT NULL,
  `r_uread` int(11) NOT NULL,
  `SC` int(11) NOT NULL,
  `RC` int(11) NOT NULL,
  `TC` int(11) NOT NULL,
  `refresh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`msg_id`, `sender`, `sender_u`, `receiver`, `subject`, `msg`, `msg_key`, `datetime`, `r_uread`, `SC`, `RC`, `TC`, `refresh`) VALUES
(22, 26, '', 21, 'Fw:Exam Notice 2', '18ACF3F01A5177DE3FDE958C4342C01F', 'F3506E3BCC5534A0', '2017-04-24 11:04:42', 0, 1, 2, 1, 0),
(27, 21, '', 26, 'Hhasdj', '1A46C3CDDBE9147D', '34D2801EAEAB5B55', '2017-04-24 20:28:33', 1, 2, 1, 0, 0),
(28, 21, '', 26, 'GHghsdh', '5B7731C75B31AEFF', 'FE8A32A09FECDA0C', '2017-04-24 20:29:04', 0, 2, 1, 0, 0),
(29, 21, '', 24, 'Hi', 'DDC8AF1DA8AFF1A4', '77E1E82C1B55F1DC', '2017-04-24 21:09:05', 1, 2, 1, 0, 1),
(30, 21, '', 24, 'Hello', '3273BBD3D09C3C2A', 'AE38FAD0BFCD1F22', '2017-04-24 21:09:24', 1, 2, 1, 0, 1),
(31, 21, '', 25, 'H', '7DE7551877D9FA09', 'A85C06BF06A2990D', '2017-04-24 21:10:33', 0, 2, 0, 0, 0),
(32, 21, '', 23, 'ad', '55FF27D7CEF82DCA', '185676AA85EAC76B', '2017-04-24 21:10:50', 1, 2, 1, 0, 1),
(33, 21, '', 25, 'asd', '398A90064051700E', '98523C9C3B7A83D7', '2017-04-24 21:11:02', 1, 2, 1, 0, 0),
(38, 21, '', 22, 'Hello ', '35E63906E98AA4CCB3E1EC2BD5399EBE6BE1FB9905DF0B38D137E4DAB3C103BF', 'A01BBB43C1EFBB40', '2017-04-24 21:43:11', 0, 2, 1, 0, 0),
(39, 21, '', 22, 'asdasda', 'F9F8B1DEA24D3B05', '8D68D5CDA2102E22', '2017-04-24 21:43:28', 0, 2, 1, 0, 0),
(40, 22, '', 21, 'Fw:asdasda', 'F9F8B1DEA24D3B05', '8D68D5CDA2102E22', '2017-04-24 21:43:53', 0, 1, 2, 1, 0),
(41, 22, '', 21, 'Hello', '92C58854C7AF3CF508E7524A90CEB1D07385CF5DDDF22866B7A90F572B874D2B', '1517787A3BD16DDE', '2017-04-26 15:44:18', 0, 1, 2, 1, 0),
(42, 22, '', 21, 'Hello', '92C58854C7AF3CF508E7524A90CEB1D07385CF5DDDF22866B7A90F572B874D2B', '1517787A3BD16DDE', '2017-04-26 15:44:18', 0, 1, 2, 1, 0),
(43, 22, '', 21, 'hello12345', '579E7EB15D23A9D1BC80ED18A5EAE7B7', 'C6471D9EE18DF5DB', '2017-04-26 15:54:27', 0, 1, 2, 1, 0),
(44, 22, '', 21, 'hello12345', '579E7EB15D23A9D1BC80ED18A5EAE7B7', 'C6471D9EE18DF5DB', '2017-04-26 15:54:27', 0, 1, 2, 1, 0),
(45, 22, '', 21, '123456', '5ECC8531508C0AF25531B59051E2C7C0', '8008E747DFA2C0E9', '2017-04-26 16:03:19', 0, 1, 2, 1, 0),
(46, 22, '', 21, '123456', '5ECC8531508C0AF25531B59051E2C7C0', '8008E747DFA2C0E9', '2017-04-26 16:05:25', 0, 1, 2, 1, 0),
(47, 22, '', 21, 'hj', 'A42B558E46C3C8D8', '8071D04AF553ECE0', '2017-04-26 16:05:51', 0, 1, 2, 1, 0),
(48, 22, '', 21, 'h123435', '4328C08CFDA0D2C9', '3F5B86C4FE8B5900', '2017-04-26 19:37:14', 0, 1, 2, 1, 0),
(49, 21, '', 26, 'Hello', '1E9AC3C58F5B645836DC84ADACB5E568', 'FAE0249BB3FE48A5', '2017-04-26 19:57:40', 0, 2, 0, 1, 0),
(52, 22, '', 25, 'Test Mail', 'EB56F90145D038486A878C08D211CB5CE63DD2DCBB159AEE5671977819E5AECAD6B2A7AFC122DF051E04AE87A5E71F69CAB9271F20F9800F', 'C2F4A6947368AD75', '2017-05-08 14:30:02', 0, 0, 1, 0, 0),
(53, 25, '', 21, 'test mail 2', 'DB75D88463B138C6', '258338329496EEFF', '2017-05-08 14:33:50', 0, 1, 0, 0, 0),
(54, 21, '', 25, 'test for delete', '5D2CD9009E954F49', '03048EBE93141EE2', '2017-05-08 14:37:20', 0, 2, 1, 0, 0),
(55, 21, '', 22, 'hj', 'E68BD536A0698EC2', '6089C9791BB6C286', '2017-05-20 02:04:35', 1, 0, 0, 0, 1),
(56, 21, '', 21, 'hello', 'B048A5E894221FA83DBB4C78EE612B60', '87897A4E5ADA4D0F', '2017-05-23 11:06:19', 0, 0, 1, 0, 0),
(57, 27, '', 21, 'HelloPritam', 'E12973C75298F96A9F0E110DE57EF644', '916EBF6A11D3EDA7', '2017-05-24 02:42:03', 0, 0, 0, 0, 0),
(58, 21, '', 27, 'Kire', '5C08D3336FDF369404C819CD9DB797EE', 'D197835BF655C8D2', '2017-05-24 02:44:21', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `msg_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `sender_u` varchar(15) NOT NULL,
  `receiver` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `msg` longtext NOT NULL,
  `msg_key` varchar(16) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`msg_id`, `sender`, `sender_u`, `receiver`, `subject`, `msg`, `msg_key`, `datetime`) VALUES
(8, 21, '', 22, 'Night Work', '8755171B19B410C96630192395FF870B', 'B7D4B773487384AB', '2017-04-22 04:16:41'),
(11, 22, '', 21, 'Hi', 'A5E1694A299BD4D2', 'A730F8352C02AC4D', '2017-04-23 20:35:35'),
(12, 22, '', 21, 'ji', '82F0E7667670D6E9', '355EA96A0BB64F9E', '2017-04-23 20:35:48'),
(13, 22, '', 21, 'hi', '7DB918A9D55718A1', '63A549E715BFBE9C', '2017-04-23 20:38:17'),
(14, 22, '', 21, 'qwqwqwq', '6FFF1E8D15EDD44D', '427949FC2D052546', '2017-04-23 20:55:28'),
(17, 21, '', 22, 'Hello', '57995465E17BE995', '811E20E94428C072', '2017-04-24 10:47:21'),
(19, 21, '', 26, 'Exam Notice', 'A1E01981E6D08CD6BDC05363F535ADC0EF61E29A5FBBC76A0F899B320AC43E2A1D05A33BC471B048FC8EECCEEFAD8A8B8DE7E1202BCD625C', '2B038D3C329670AD', '2017-04-24 10:49:45'),
(20, 21, '', 26, 'Exam Notice 1', '644144D942D14ADD2928CA62F8471076970398BCA238DE28', 'B3E04D7835123D36', '2017-04-24 11:02:13'),
(21, 21, '', 26, 'Exam Notice 2', '18ACF3F01A5177DE3FDE958C4342C01F', 'F3506E3BCC5534A0', '2017-04-24 11:03:56'),
(23, 21, '', 26, 'Auto refresh check', '7C82283CF1202BB7519BA63BD24B8649C5F2C2C45D40E1397240AB3DE7C21A47', 'A5E69B34C8B318A1', '2017-04-24 20:06:26'),
(24, 21, '', 26, 'Hi', 'F94D493B0A5B4C9F9F7D4CFC30A187A6', '6E44C078307B9E7B', '2017-04-24 20:24:22'),
(25, 21, '', 26, 'mar sb ko', 'C5791A6E0D09F9A8', '564599C998C8C60B', '2017-04-24 20:24:57'),
(26, 21, '', 26, 'Shibu', '17EC3B060AB27C9A', '5954C381E0B1E7C8', '2017-04-24 20:26:08'),
(35, 21, '', 22, 'asd', '06F81CE1CAAC748C', '91CC64CAF61B77E1', '2017-04-24 21:11:42'),
(36, 21, '', 22, 'hi', 'A0D7FD4E7EF3147C', '8C098BCB5A106169', '2017-04-24 21:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `ques` varchar(50) NOT NULL,
  `ans` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `sname`, `email`, `username`, `password`, `ques`, `ans`, `picture`) VALUES
(21, 'Pritam', 'Sadhu', 'pritam130@gmail.com', 'pritamsadhu', 'aaaa1234', 'What was the first company i ever worked for?', 'No', 'pritamsadhuhqdefault_live.jpg'),
(22, 'Faizan', 'Ahmed', 'faizan@gmail.com', 'faizanahmed', 'aaaa1234', 'What was the first company i ever worked for?', 'No', 'null'),
(23, 'Suvam', 'Roy', 'suvam@gmail.com', 'suvamroy', '12345', 'What is your father name?', 'Robb', 'null'),
(24, 'Rohit', 'Sharma', 'roghit@gmail.com', 'rohitsharma', '12345', 'What is your father name?', 'Bobb', 'null'),
(25, 'Sanjeet', 'Singh', 'sanjeet@outlook.com', 'sanjeetsingh', '12345', 'What is your father name?', 'Charly', 'sanjeetsinghchris_palmer_profile_11.jpeg'),
(26, 'Gopal', 'Sharma', 'gopal@rediffmail.com', 'gopalsharma', '12345', 'What is your father name?', 'Arijit', 'null'),
(27, 'Biswarup', 'Mondal', 'bmondalcse@gmail.com', 'biswarup', 'aaaa1234', 'What was the first book i ever read?', 'Windows', 'biswarup11037022_852179058236876_1817153970557519986_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

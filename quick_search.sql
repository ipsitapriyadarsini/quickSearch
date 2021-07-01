-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 12:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quick_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_registration`
--

CREATE TABLE `candidate_registration` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `candidate_name` varchar(60) NOT NULL,
  `father_name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `phno` bigint(11) NOT NULL,
  `qualifications` varchar(20) NOT NULL,
  `yr_exp` varchar(20) NOT NULL,
  `pre_comp` varchar(60) NOT NULL,
  `doj` date NOT NULL,
  `dol` date NOT NULL,
  `id_proof` varchar(60) NOT NULL,
  `add_proof` varchar(60) NOT NULL,
  `cv_upload` varchar(60) NOT NULL,
  `curent_date` date DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_registration`
--

INSERT INTO `candidate_registration` (`id`, `username`, `candidate_name`, `father_name`, `dob`, `email_id`, `phno`, `qualifications`, `yr_exp`, `pre_comp`, `doj`, `dol`, `id_proof`, `add_proof`, `cv_upload`, `curent_date`, `modified_date`) VALUES
(1, '$user', 'ranu', 'hhjjs', '2020-12-08', 'hkjkhgui@gmail.com', 905433756, 'b.tech', '1yr 3months', '$pre_compp', '2020-12-07', '2020-12-08', '$pathk', '$pathl', '$path9', '2020-12-29', '2020-12-31'),
(2, 'debiprasad23@gmail.com', 'Anshuman dash', 'janaki dash', '1995-08-21', 'anshuman44@gmail.com', 7400004581, 'BE/BTech', '7months', 'kipligth. pvt. ltd.', '2020-01-17', '2020-07-30', 'upload/download1.jpg', 'upload/download1.jpg', 'upload/download1.jpg', NULL, NULL),
(3, 'debiprasad23@gmail.com', 'ipsita', 'arabinda', '1999-07-11', 'ipsunnj@gmail.com', 6882580011, 'BE/BTech', '1yr 2months', 'mazunatech pvt. ltd.', '2018-09-14', '2019-11-20', 'upload/download.jpg', 'upload/download1.jpg', 'upload/kid.jpg', '2020-12-08', NULL),
(4, 'anshuman44@gmail.com', 'Anshuman dash', 'janaki dash', '1993-07-08', 'anshuman44@gmail.com', 7102240158, 'BE/BTech', '1yr', 'vertusa pvt. ltd.', '2018-12-15', '2019-11-30', 'upload/download1.jpg', 'upload/download1.jpg', 'upload/download1.jpg', NULL, '2020-12-08'),
(5, 'anshuman44@gmail.com', 'Anshuman dash', 'janaki dash', '1993-07-08', 'anshuman44@gmail.com', 7102240158, 'BE/BTech', '1yr', 'vertusa pvt. ltd.', '2018-12-15', '2019-11-30', 'upload/download1.jpg', 'upload/download1.jpg', 'upload/download1.jpg', NULL, NULL),
(6, 'anshuman44@gmail.com', 'Anshuman dash', 'janaki dash', '1993-07-08', 'anshuman44@gmail.com', 7102240158, 'BE/BTech', '1yr', 'vertusa pvt. ltd.', '2018-12-15', '2019-11-30', 'upload/download1.jpg', 'upload/download1.jpg', 'upload/download1.jpg', '2020-12-02', NULL),
(7, 'anshuman44@gmail.com', 'Anshuman dash', 'janaki dash', '1993-07-08', 'anshuman44@gmail.com', 7102240158, 'BE/BTech', '1yr', 'vertusa pvt. ltd.', '2018-12-15', '2019-11-30', 'upload/download1.jpg', 'upload/download1.jpg', 'upload/download1.jpg', NULL, NULL),
(8, 'rekha.bharti@gmail.com', 'Rekha Bharati', 'Anupam Bharti', '2000-08-19', 'rekha.bharti@gmail.com', 9902567710, 'Graduation', '', '', '0000-00-00', '0000-00-00', 'upload/download.jpg', 'upload/kid.jpg', 'upload/download.jpg', '2020-12-23', NULL),
(10, 'hkjkh@gmail.com', 'hjhjkkj', 'hgjdakjj', '2020-12-03', 'hjjkhhkjkj@gmail.com', 740004581, 'BE/BTech', '1yr 2months', 'prequitf pvt. ltd', '2018-09-20', '2020-10-14', 'upload/kid.jpg', 'upload/download.jpg', 'upload/download1.jpg', '2020-12-23', NULL),
(11, 'cs.srdc@gmail.com', 'chirasmita swain', 'rajesh swain', '1997-09-06', 'cs@gmail.com', 456789123, '10th', '', '', '0000-00-00', '0000-00-00', 'upload/', 'upload/', 'upload/', '2020-12-29', NULL),
(12, 'cs.srdc@gmail.com', 'chirasmita swain', 'rajesh swain', '1997-09-06', 'cs@gmail.com', 456789123, '10th', '', '', '0000-00-00', '0000-00-00', 'upload/', 'upload/', 'upload/', '2020-12-29', NULL),
(13, 'cs.srdc@gmail.com', 'chirasmita swain', 'rajesh swain', '1997-09-06', 'cs@gmail.com', 456789123, '10th', '', '', '0000-00-00', '0000-00-00', 'upload/', 'upload/', 'upload/', '2020-12-29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_registration`
--

CREATE TABLE `company_registration` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `industry` varchar(60) NOT NULL,
  `company_name` varchar(60) NOT NULL,
  `reg_no` varchar(60) NOT NULL,
  `company_type` varchar(60) NOT NULL,
  `reg_date` date NOT NULL,
  `director` varchar(60) NOT NULL,
  `head_office` varchar(60) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `curent_date` date DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_registration`
--

INSERT INTO `company_registration` (`id`, `username`, `industry`, `company_name`, `reg_no`, `company_type`, `reg_date`, `director`, `head_office`, `company_address`, `curent_date`, `modified_date`) VALUES
(1, 'lainetech@gmail.com', 'Information Technology (IT) industry', 'Laine pvt. ltd.', '78KI679', 'private', '2012-05-08', 'A.S. Dixit', 'Mumbai', 'Andheri ,mumbai 654230', '2020-12-26', '2020-12-30'),
(2, 'lainetech@gmail.com', 'Aerospace industry', 'Hindustan Aeronautics Limited', '67773T', 'govt', '1940-12-23', 'Shri R. Madhavan', 'Bengaluru', 'Barrackpore Post, Parganas (N), Dist. 24, Kolkata, West Bengal 700120', '2020-12-28', '2020-12-28'),
(3, 'agdjasdv@mgmail.com', 'Information Technology (IT) industry', 'unitouch pvt. ltd.', '78KL087', 'personal', '2018-03-08', 'Bimal Roy', 'Noida', 'Delhi,675729', '2020-12-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_table`
--

CREATE TABLE `company_table` (
  `id` int(11) NOT NULL,
  `company_type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_table`
--

INSERT INTO `company_table` (`id`, `company_type`) VALUES
(5, 'private'),
(6, 'govt'),
(8, 'personal'),
(16, 'foreign');

-- --------------------------------------------------------

--
-- Table structure for table `industry_table`
--

CREATE TABLE `industry_table` (
  `id` int(11) NOT NULL,
  `industry_type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry_table`
--

INSERT INTO `industry_table` (`id`, `industry_type`) VALUES
(1, 'Aerospace industry'),
(2, 'Information Technology (IT) industry'),
(3, 'cement industry'),
(6, 'Education Industry'),
(7, 'Entertainment Industry'),
(8, 'Health care Industry'),
(9, 'Hospitality Industry'),
(10, 'Transport  industry'),
(12, 'textile industry'),
(13, ' Construction Industry');

-- --------------------------------------------------------

--
-- Table structure for table `qualification_table`
--

CREATE TABLE `qualification_table` (
  `id` int(11) NOT NULL,
  `qualification` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification_table`
--

INSERT INTO `qualification_table` (`id`, `qualification`) VALUES
(6, 'Intermediate'),
(7, 'Graduation'),
(8, 'Master degree'),
(9, 'BE/Btech'),
(10, 'BE/Btech'),
(11, 'BE/Btech');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `pass_word` varchar(60) NOT NULL,
  `con_password` varchar(60) NOT NULL,
  `user_role` varchar(60) NOT NULL,
  `is_profile_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `pass_word`, `con_password`, `user_role`, `is_profile_update`) VALUES
(1, 'ipsitacet2015@gmail.com', 'Puja@456', 'Puja@456', 'Admin', 1),
(2, 'rishita876@gmail.com', 'Rishi@123', 'Rishi@123', 'candidate', 0),
(3, 'tech.solution@gh.co.in', 'Tech@12345', 'Tech@12345', 'company', 1),
(4, 'debiprasad23@gmail.com', 'Debi@45678', 'Debi@45678', 'candidate', 1),
(5, 'saitech23@co.in', 'Sai@1234#', 'Sai@1234#', 'company', 1),
(6, 'techyfighters.sol@gmail.com', 'Techice#11', 'Techice#11', 'company', 1),
(7, 'anshuman44@gmail.com', 'Anshu@456', 'Anshu@456', 'candidate', 1),
(8, 'agdjasdv@mgmail.com', 'Strong@123', 'Strong@123', 'company', 1),
(9, 'rekha.bharti@gmail.com', 'Rekha@123', 'Rekha@123', 'candidate', 1),
(10, 'hkjkh@gmail.com', 'Ipsita@123', 'Ipsita@123', 'candidate', 1),
(11, 'lainetech@gmail.com', 'Laine@1234', 'Laine@1234', 'company', 1),
(12, 'cs.srdc@gmail.com', 'Chirasmita@1234', 'Chirasmita@1234', 'candidate', 1),
(13, 'sulani.pat@gmail.com', 'Sulani@123', 'Sulani@123', 'candidate', 0),
(14, 'naren@gmail.com', 'Naren@123', 'Naren@123', 'candidate', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_registration`
--
ALTER TABLE `candidate_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_registration`
--
ALTER TABLE `company_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_table`
--
ALTER TABLE `company_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_table`
--
ALTER TABLE `industry_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification_table`
--
ALTER TABLE `qualification_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_registration`
--
ALTER TABLE `candidate_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company_registration`
--
ALTER TABLE `company_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_table`
--
ALTER TABLE `company_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `industry_table`
--
ALTER TABLE `industry_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `qualification_table`
--
ALTER TABLE `qualification_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

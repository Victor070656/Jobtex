-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2025 at 09:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobtex`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `jobid` varchar(11) NOT NULL,
  `employer_id` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `userid`, `jobid`, `employer_id`, `created_at`) VALUES
(1, '', '3', '1', '2025-12-09 02:34:24'),
(2, '1', '3', '1', '2025-12-09 02:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `years_of_exp` varchar(5) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `linkedin` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `fullname`, `email`, `password`, `phone`, `gender`, `years_of_exp`, `qualification`, `about`, `facebook`, `linkedin`, `address`, `country`, `image`, `dob`, `created_at`) VALUES
(1, 'Bernard Kelly', 'kelly@example.com', '00000000', '', 'Male', '7', 'OND', '', '', '', '', '', 'background for thumbnail.jpeg', '2000-08-21', '2025-11-24 14:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Web Dev', '2025-11-28 04:46:01'),
(2, 'Data analytics', '2025-11-28 04:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `founded` date DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `company_size` varchar(100) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `linkedin` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `company_name`, `email`, `password`, `phone`, `founded`, `website`, `company_size`, `about`, `facebook`, `linkedin`, `address`, `country`, `image`, `created_at`) VALUES
(1, 'Julius Berger', 'julius@example.com', '00000000', '09090909011', '2025-11-13', 'https://www.xulekasawufifec.org.au', '201 - 500', 'something here', 'https://www.mypiqaqoquhe.biz', 'https://www.fyl.org.au', 'United States street, Yobe', 'Nigeria', '1_m2Q3kRG9yl5WyNIyoe15XA.png', '2025-11-24 14:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `employer_id` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `apply_type` varchar(50) NOT NULL,
  `external_url` varchar(100) NOT NULL,
  `apply_email` varchar(150) NOT NULL,
  `salary_type` varchar(100) NOT NULL,
  `years_of_exp` int(11) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `min_salary` float NOT NULL,
  `max_salary` float NOT NULL,
  `deadline` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `employer_id`, `title`, `description`, `category_id`, `type`, `tags`, `gender`, `apply_type`, `external_url`, `apply_email`, `salary_type`, `years_of_exp`, `qualification`, `min_salary`, `max_salary`, `deadline`, `address`, `country`, `created_at`) VALUES
(1, '', 'Frontend Developer', 'Voluptas doloremque ', '1', 'On-site', 'Atque, vero eu, reicie', 'Female', 'Internship', 'https://www.nesazybyzojo.info', 'kyba@example.com', 'Year', 2007, 'PHD', 85, 33, '1998-08-09', '656 East Oak Street', 'Cum qui quidem error', '2025-11-28 05:35:07'),
(2, '1', 'Nostrum iusto aut mi', 'Cupiditate id tempo', '1', 'Remote', 'Non, error, culpa qui', 'Female', 'Senior', 'https://www.qiqe.ca', 'byregalory@example.com', 'Month', 2016, 'PHD', 87, 90, '1993-10-24', '29 Second Road', 'Fugit ullam eum et ', '2025-12-01 14:07:42'),
(3, '1', 'Libero sunt ex in v', 'Quisquam facilis non', '2', 'Remote', 'Atque, dignissimos, ac', 'Male', 'Junior', 'https://www.tebybyhynubuqe.me.uk', 'gadilaju@example.com', 'Month', 2008, 'PHD', 36, 82, '1975-07-10', '12 North Rocky New Avenue', 'Est iusto quo offici', '2025-12-01 14:19:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

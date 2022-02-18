-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2022 at 10:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imlancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `bid_price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`id`, `project_id`, `date`, `user_id`, `bid_price`, `status`) VALUES
(7, '1', '2022-02-18', '1', '164.93208086881702', 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_image`, `category_name`, `date`) VALUES
(1, 'https://cdn.icon-icons.com/icons2/1381/PNG/512/androidsdk_93575.png', 'Android Developer', '2022-02-14'),
(2, 'https://eupclick.com/assets/images/services/code.jpg', 'Web Development', '2022-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `pay_status` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `recieve_status` varchar(255) NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `freelancer_id` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `skill_id` varchar(255) NOT NULL,
  `profileimage_id` varchar(255) NOT NULL,
  `mydescription` varchar(255) NOT NULL,
  `myspeciality` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `socialmedia` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `notification_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_name`, `password`, `email_id`, `address`, `phone`, `date`, `rating`, `skill_id`, `profileimage_id`, `mydescription`, `myspeciality`, `document`, `socialmedia`, `gender`, `notification_id`) VALUES
(1, 'roshan', 'magic', 'crroshan7@gmail.com', 'Miyapatan, Pokhara 13', '9824194251', '2022/02/14', '3', '1,2,4', 'me.jpg', 'I am a Bit Student.', 'Flutter and Java', '1.png,2.png', '9824194251,https://www.facebook.com/iamroshanssanker/,https://www.instagram.com/iamroshan_s_sanker/', 'Male', '1'),
(2, 'ashok', 'ashok', 'ashok@gmail.com', 'Miyapatan', '9824194252', '2022-01-21', '1', '1,2,3', 'me.jpg', 'I am happy', 'Love', '1.png,2.png', 'https://www.facebook.com/Pokhara-online-delivery-110317424839170/', 'Male', '1,2,3');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `project_category` varchar(255) NOT NULL,
  `project_subcategory` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `freelancer_id` varchar(255) NOT NULL,
  `project_status` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `skill_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `budget`, `project_category`, `project_subcategory`, `project_name`, `duration`, `date`, `deadline`, `client_id`, `freelancer_id`, `project_status`, `file`, `description`, `skill_id`) VALUES
(1, '300', 'Android Developer', 'Flutter Development', 'flutter developer', '7', '2022-02-17 12:40:10.395603', '2022-02-25', '1', '', '', '', 'imlancer app', '[Flutter]');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `subcategory_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `subcategory_id`, `date`) VALUES
(1, 'Flutter', '1', '2022-01-17'),
(2, 'React Js', '2', '2022-01-17'),
(3, 'Java', '1', '2022-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `subcategory_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `subcategory_name`, `date`, `subcategory_image`) VALUES
(1, '1', 'Flutter Development', '2022-02-17', 'https://miro.medium.com/max/1400/1*ilC2Aqp5sZd1wi0CopD1Hw.png'),
(2, '2', 'React Developer', '2022-02-17', 'https://reactjs.org/logo-og.png');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `notificationid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

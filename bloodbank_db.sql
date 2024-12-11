-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 06:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `bloodbank_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `blood_group_id` int(11) NOT NULL,
  `availability` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`bloodbank_id`, `district_id`, `blood_group_id`, `availability`) VALUES
(2, 1, 1, 5),
(3, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `blood_group_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `blood_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`blood_group_id`, `state`, `city`, `blood_group`) VALUES
(1, '', '', 'A+'),
(2, '', '', 'A-'),
(3, '', '', 'B+'),
(4, '', '', 'B-'),
(5, '', '', 'AB+'),
(6, '', '', 'AB-'),
(7, '', '', 'O+'),
(8, '', '', 'O-'),
(9, 'Utter Pradesh', 'Basti', ''),
(10, 'Utter Pradesh', 'Basti', '');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `address`) VALUES
(1, 'Agra', '71, M. G. Road, Subhash Park, Agra\r\nAgra City Blood Bank Address: 71, M. G. Road, Subhash Park, Agra - 282 010'),
(2, 'Ghaziabad', 'LIFE LINE BLOOD BANK. Address. 3rd B2 Nehru Nagar, Near Holy Child School Chauraha, Nehru Nagar, Ghaziabad, UP 201001. Phone. +91-120-2793989 +91-99104-23110'),
(3, 'Ambedkar Nagar', 'Not available Sorry!😥');

-- --------------------------------------------------------

--
-- Table structure for table `donation_camps`
--

CREATE TABLE `donation_camps` (
  `id` int(11) NOT NULL,
  `hospital` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_camps`
--

INSERT INTO `donation_camps` (`id`, `hospital`, `town`, `district`) VALUES
(1, 'City Hospital', 'Agra', 'Agra'),
(2, 'LifeCare Hospital', 'Amroha', 'Moradabad'),
(3, 'Hope Clinic', 'Bareilly', 'Bareilly'),
(4, 'Metro Hospital', 'Lucknow', 'Lucknow'),
(5, 'Sunshine Hospital', 'Kanpur', 'Kanpur Nagar'),
(6, 'Green Valley Hospital', 'Varanasi', 'Varanasi'),
(7, 'Apollo Hospital', 'Noida', 'Gautam Buddha Nagar'),
(8, 'Fortis Hospital', 'Ghaziabad', 'Ghaziabad'),
(9, 'Rainbow Hospital', 'Meerut', 'Meerut'),
(10, 'CureWell Clinic', 'Ayodhya', 'Ayodhya'),
(11, 'Shanti Hospital', 'Mathura', 'Mathura'),
(12, 'Healthy Life Hospital', 'Gorakhpur', 'Gorakhpur'),
(13, 'Sacred Heart Hospital', 'Prayagraj', 'Prayagraj'),
(14, 'City Clinic', 'Jhansi', 'Jhansi'),
(15, 'New Horizon Hospital', 'Aligarh', 'Aligarh'),
(16, 'Global Health Clinic', 'Etawah', 'Etawah'),
(17, 'United Health Hospital', 'Basti', 'Basti'),
(18, 'Happy Care Hospital', 'Firozabad', 'Firozabad'),
(19, 'Healing Hands Clinic', 'Azamgarh', 'Azamgarh'),
(20, 'Wellness Hospital', 'Budaun', 'Budaun'),
(21, 'Lifeline Clinic', 'Ballia', 'Ballia'),
(22, 'CarePlus Hospital', 'Saharanpur', 'Saharanpur'),
(23, 'Bright Future Clinic', 'Moradabad', 'Moradabad'),
(24, 'Vital Care Hospital', 'Deoria', 'Deoria'),
(25, 'SmileCare Hospital', 'Muzaffarnagar', 'Muzaffarnagar'),
(26, 'Healing Touch Clinic', 'Sitapur', 'Sitapur'),
(27, 'Harmony Hospital', 'Unnao', 'Unnao'),
(28, 'Health First Hospital', 'Shamli', 'Shamli'),
(29, 'PrimeCare Hospital', 'Rampur', 'Rampur'),
(30, 'Noble Hospital', 'Pilibhit', 'Pilibhit'),
(31, 'Apex Hospital', 'Banda', 'Banda'),
(32, 'Family Health Clinic', 'Chitrakoot', 'Chitrakoot'),
(33, 'TrustCare Hospital', 'Ambedkar Nagar', 'Ambedkar Nagar'),
(34, 'Om Hospital', 'Hapur', 'Hapur'),
(35, 'Elite Hospital', 'Faizabad', 'Ayodhya'),
(36, 'Better Life Clinic', 'Barabanki', 'Barabanki'),
(37, 'Royal Care Hospital', 'Bijnor', 'Bijnor'),
(38, 'Faith Hospital', 'Kasganj', 'Kasganj'),
(39, 'Caring Hands Hospital', 'Bahraich', 'Bahraich'),
(40, 'Bliss Hospital', 'Hardoi', 'Hardoi'),
(41, 'TrueCare Hospital', 'Sant Kabir Nagar', 'Sant Kabir Nagar'),
(42, 'Advance Care Hospital', 'Shahjahanpur', 'Shahjahanpur'),
(43, 'Paradise Hospital', 'Sultanpur', 'Sultanpur'),
(44, 'Kindness Hospital', 'Balrampur', 'Balrampur'),
(45, 'Healing Path Hospital', 'Lakhimpur Kheri', 'Lakhimpur Kheri'),
(46, 'Better Tomorrow Clinic', 'Fatehpur', 'Fatehpur'),
(47, 'Smart Health Clinic', 'Amethi', 'Amethi'),
(48, 'Golden Hope Hospital', 'Mau', 'Mau'),
(49, 'Vision Care Clinic', 'Mirzapur', 'Mirzapur'),
(50, 'Trust Health Clinic', 'Jaunpur', 'Jaunpur'),
(51, 'Evergreen Hospital', 'Raebareli', 'Raebareli');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `age` int(150) NOT NULL,
  `bloodtyp` varchar(10) NOT NULL,
  `house` varchar(255) NOT NULL,
  `town` varchar(240) NOT NULL,
  `pin` varchar(40) NOT NULL,
  `district` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phoneno`, `email`, `pass`, `age`, `bloodtyp`, `house`, `town`, `pin`, `district`) VALUES
(6, 'Surya', 'Sekhar', '8888888888', 'surya@gmail.com', '$2y$10$XhbrGP6P8kp8SVFdcbEUmeck0uDF3gnNQ/c2OJ0aA20YdGTotIJVi', 21, 'B+', 'Ghaziabad', 'Ghaziabad', '888888', 'Ghaziabad'),
(8, 'Sameer', 'Kumar', '1234567890', 'sameer@gmail.com', '$2y$10$pVfNs4tFHGdOsks8ERHqNeB9PT5wVnjhfBZdeYmjR5XbwzOWEZT2a', 22, 'B+', 'Varanasi', 'Varanasi', '876543', 'Varanasi'),
(9, 'Aarav', 'Sharma', '9876543210', 'aarav.sharma@example.com', 'password123', 28, 'A+', '123/1', 'Lucknow', '226001', 'Lucknow'),
(10, 'Vivaan', 'Gupta', '9876543211', 'vivaan.gupta@example.com', 'password123', 25, 'B+', '45B', 'Kanpur', '208001', 'Kanpur'),
(11, 'Aditya', 'Verma', '9876543212', 'aditya.verma@example.com', 'password123', 30, 'O+', '78C', 'Varanasi', '221001', 'Varanasi'),
(12, 'Ishaan', 'Singh', '9876543213', 'ishaan.singh@example.com', 'password123', 22, 'AB+', '12D', 'Agra', '282001', 'Agra'),
(13, 'Aryan', 'Yadav', '9876543214', 'aryan.yadav@example.com', 'password123', 26, 'A-', '67E', 'Meerut', '250001', 'Meerut'),
(14, 'Ananya', 'Pandey', '9876543215', 'ananya.pandey@example.com', 'password123', 24, 'B-', '45F', 'Allahabad', '211001', 'Allahabad'),
(15, 'Aadhya', 'Tripathi', '9876543216', 'aadhya.tripathi@example.com', 'password123', 27, 'O-', '89G', 'Ghaziabad', '201001', 'Ghaziabad'),
(16, 'Isha', 'Dwivedi', '9876543217', 'isha.dwivedi@example.com', 'password123', 21, 'AB-', '34H', 'Noida', '201301', 'Noida'),
(17, 'Rohan', 'Agarwal', '9876543218', 'rohan.agarwal@example.com', 'password123', 29, 'A+', '56I', 'Aligarh', '202001', 'Aligarh'),
(18, 'Kavya', 'Chaturvedi', '9876543219', 'kavya.chaturvedi@example.com', 'password123', 23, 'B+', '23J', 'Jhansi', '284001', 'Jhansi'),
(19, 'Nikhil', 'Rai', '9876543250', 'nikhil.rai@example.com', 'password123', 28, 'AB+', '78Z', 'Firozabad', '283203', 'Firozabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`bloodbank_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `blood_group_id` (`blood_group_id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`blood_group_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `donation_camps`
--
ALTER TABLE `donation_camps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `bloodbank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `blood_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation_camps`
--
ALTER TABLE `donation_camps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD CONSTRAINT `blood_bank_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `districts` (`district_id`),
  ADD CONSTRAINT `blood_bank_ibfk_2` FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`blood_group_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

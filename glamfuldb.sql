-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2022 at 06:25 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glamfuldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `first_name`, `last_name`, `password`) VALUES
(1, 'hutoon', 'Hutoon', 'Alomran', '$2y$10$eE3o15EeTqcxDcjhVewgpOtVmzZl5PLE40Zc2olbVWYicAUTQlt0e'),
(2, 'rawan', 'Rawan', 'Alqarni', '$2y$10$cGf/fIPhmTWchAas7tC.5.yOd9kLF6k9IbWUnrO6cltVxmxVbZxkG');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `social_media` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `work_time` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`ID`, `name`, `location`, `phone_number`, `social_media`, `picture`, `region`, `work_time`, `admin_id`) VALUES
(1, 'Kaya', 'https://g.page/KayaOroubah?share.png', 541114273, '@Kaya', 'KayaLogo.png', 'North', '10:00AM-5:00PM', 1),
(2, 'maleen', 'https://g.page/maleenclinic?share', 920001155, '@maleen.com', 'maleen.jpg', 'North', '9:00AM-10:00PM', 1),
(3, 'HBR', 'https://g.page/hbrclinics?share', 920004686, '@HBR', 'HBRLogo2.png', 'North', '8:00AM-6:00PM', 1),
(4, 'Cosmo Doctor', 'https://g.page/CosmoDoctor?share', 920016131, '@Cosmo_Doctor', 'cosmoLogo.png', 'South', '9:30AM:8:45:PM', 1),
(5, 'Meras', 'https://goo.gl/maps/T3iqD5RdpN5pjxeJ6', 555077931, '@meras_kingFahad', 'meras.png', 'South', '12:00PM-10:30PM', 1),
(6, 'Jwel', 'https://g.page/Jwelclinics?share', 114883424, '@jwel.com', 'jwel.jpg', 'East', '10:00AM-1:30AM', 1),
(7, 'Almuhaidb', 'https://goo.gl/maps/iQjKmmc18qepTozw9', 553293931, '@Almuhaidb', 'almuhaidb.jpg', 'North', '2:30PM-10:30PM', 2),
(8, 'Doctor Health', 'https://goo.gl/maps/NtegdDwHUWHhUwwx7', 114001133, '@Doctor_Health', 'doctor health.jpg', 'West', '4:00PM:1:00AM', 2),
(9, 'Swan', 'https://goo.gl/maps/NtegdDwHUWHhUwwx7', 114001133, '@SwanClinic', 'Swan.jpg', 'East', '3:30PM-11:00PM', 2),
(10, 'Kadoon', 'https://goo.gl/maps/tZgzNfCSu6eStVQp8', 112168888, '@Kadoon', 'kadoon.png', 'West', '10:00AM-9:00PM', 2),
(11, 'Promiere', 'https://g.page/promiereclinic?share', 112344444, '@Promiere', 'Promiere.jpg', 'East', '9:30AM-7:00PM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `ID` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`ID`, `image`, `region`) VALUES
(1, 'north.png', 'North'),
(2, 'south.png', 'South'),
(3, 'east.png', 'East'),
(4, 'west.png', 'West');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `ID` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reply_text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`ID`, `review_id`, `name`, `reply_text`) VALUES
(1, 1, 'alanoud', 'Thanks for your review, excited to visit the KAYA clinic!'),
(2, 1, 'futoon', 'I tried visiting this clinic and liked it too..'),
(3, 1, 'reema', 'I definitely agree with you.'),
(4, 2, 'nouf', 'I loved it too, the level of cleanliness is very high, which motivates me to visit it again'),
(5, 2, 'shahad', 'According to my experience, the clinic is rather good, but it is not clean'),
(6, 3, 'amjad', 'I had such a session with Dr. Hanan and it was the most amazing ever, and the results so far are very satisfactory!'),
(7, 3, 'razan', 'I love Dr. Hanan very much, she is my favorite doctor'),
(8, 3, 'shatha', 'I have to try it too, thanks for sharing!'),
(9, 3, 'renad', 'Wow I think its amazing'),
(10, 4, 'layan', 'I tried it with Dr. Lamia and it was a nice experience'),
(11, 5, 'mona', 'I will try it tomorrow, I hope you get amazing results'),
(12, 5, 'ameera', 'I think it is bad for the skin, you should pay attention.'),
(13, 6, 'haneen', 'Wonderful!'),
(14, 7, 'jorry', 'Sad for you and I wish you Get well soon..'),
(15, 7, 'dana', 'take a good care of yourself.'),
(16, 9, 'leena', 'I think its a great session that I have to try!'),
(17, 10, 'samar', 'It is the best, do not worry, you will see beautiful results soon.'),
(18, 10, 'afnan', 'One of the most beautiful sessions that give noticeable results in a short period of time, you will be happy with its results'),
(19, 11, 'lama', 'I loved her too, and my next session is with Dr. Ghada soon.'),
(20, 14, 'fahad', 'totally agree!'),
(21, 13, 'anonyms', 'Strongly agree'),
(22, 13, 'ruba', 'loved it too!'),
(23, 15, 'aljoharah', 'Dr. Saud is the best in Meras Clinics.'),
(24, 16, 'Lolo', 'Yes, unfortunately the prices are high.'),
(25, 18, 'anonyms', 'I am sorry for you.'),
(26, 19, 'leen', 'True, I had the same experience.'),
(27, 21, 'anonyms', 'Yes, he is my favorite doctor.'),
(28, 24, 'anonyms', 'WOW!');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rating` int(5) NOT NULL,
  `review_text` varchar(300) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `clinic_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `name`, `rating`, `review_text`, `picture`, `clinic_ID`) VALUES
(1, 'joud', 5, 'Great clinic, I recommend it to everyone..', 'kaya_clinic1.jpg', 1),
(2, 'noura', 4, 'The clinic is very beautiful, and clean, I highly recommend it!', 'kaya_clinic4.webp', 1),
(3, 'sara', 3, 'I did a hydrafacial session with Dr. Hanan and it was good.', 'kaya_clinic2.webp', 1),
(4, 'ruba', 2, 'I had a facial laser session and I did not like the results unfortunately.', 'kaya_clinic3.jpg', 1),
(5, 'fatema', 4, 'A good facial laser session, waiting for the results!', 'maleen_clinic1.jpg', 2),
(6, 'rahaf', 5, 'love it, I will visit it again.', 'maleen_clinic2.jpg', 2),
(7, 'najla', 1, 'Worst experience ever!', 'HBR_clinic2.jpg', 3),
(8, 'sahar', 3, 'not bad.', 'HBR_clinic1.jpg', 3),
(9, 'manar', 4, 'It was a good experience.', 'HBR_clinic3.jpg', 3),
(10, 'faten', 4, 'I did a session for the freshness of the face and skin with Dr. Nabila, and I am looking forward to the results as soon as possible', 'almuhaidb_clinic1.jpg', 7),
(11, 'raghad', 5, 'I enjoyed the experience and I advise you to try it all with Dr. Ghada.', 'cosmoDoctor_clinic1.jpg', 4),
(12, 'kholoud', 4, 'I like their services. ', '', 4),
(13, 'razan', 3, 'Quite good services.', 'meras_clinic1.jpg', 5),
(14, 'saad', 5, 'The place is nice and clean, and the reception is great.', 'meras_clinic2.jpg', 5),
(15, 'hind', 3, 'Good, thank you dr. saud.', 'meras_clinic3.jpg', 5),
(16, 'nasser', 2, 'Very high prices, but good quality.', 'meras_clinic5.jpg', 5),
(17, 'bshayer', 5, 'I had Botox and liked the results.', 'meras_clinic4.jpg', 5),
(18, 'anonyms', 1, 'They did not accept my case.', 'jwel_clinic2.webp', 6),
(19, 'muneera', 2, 'There are no good nurses.', 'jwel_clinic1.jpg', 6),
(20, 'sultan', 4, 'Good prices and clean clinic.', 'swan_clinic1.jpg', 9),
(21, 'elham', 5, 'dr. khaled is the best!', 'swan_clinic2.png', 9),
(22, 'haifa', 5, 'Good', 'Promiere_clinic1.png', 11),
(23, 'anonyms', 2, 'There are no employees to serve me.', 'Promiere_clinic2.jpg', 8),
(24, 'noujod', 5, 'The location of the clinic is excellent and the clinic is very beautiful.', 'kdoon_clinic1.png', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `phone_number` (`phone_number`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `clinic_ID` (`clinic_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

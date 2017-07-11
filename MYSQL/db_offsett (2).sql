-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2017 at 02:11 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_offsett`
--

-- --------------------------------------------------------

--
-- Table structure for table `beats`
--

CREATE TABLE `beats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `bpm` int(3) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beats`
--

INSERT INTO `beats` (`id`, `name`, `filename`, `cover_image`, `bpm`, `tags`) VALUES
(1, 'Lovely Town', 'media/lovely_town.mp3', 'images/pexels3.jpeg', 100, 'Trap, Hip Hop, Dj Foreign, Migos'),
(2, 'Young Stream', 'media/stream1.mp3', 'images/pexels5.jpeg', 140, 'Trap, Hip Hop, Dj Foreign, Chris Brown'),
(3, 'Dreams', 'media/325788_808_mafia.mp3', 'images/2333128_fullsizerender.jpg', 140, 'Trap, 808 Mafia, Southside'),
(4, 'Lovely Lown', 'media/1598106_lovely_town_beat.mp3', 'images/2762341_lwscreenshot_2017-02-28_at_8.07.43_am.png', 93, 'Trap, Lil Yatchy, Metro Booming');

-- --------------------------------------------------------

--
-- Table structure for table `music_posts`
--

CREATE TABLE `music_posts` (
  `id` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `song_artist` varchar(255) NOT NULL,
  `song_url` varchar(255) NOT NULL,
  `song_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music_posts`
--

INSERT INTO `music_posts` (`id`, `song_name`, `song_artist`, `song_url`, `song_content`) VALUES
(1, 'To The Top', 'Young Mali', 'yaOlHQc1y1g', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum asperiores dolor eos aspernatur modi, consectetur inventore sit quo perferendis, nesciunt omnis libero similique quos perspiciatis impedit porro corrupti eum ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos provident aliquid nulla officiis quam recusandae nisi iure quod blanditiis. Dolorem possimus sint similique, ex vitae a reprehenderit unde aut!'),
(2, 'Solo money', 'Young Mali', 'YjynwBAf3SI', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi dolorem natus maiores asperiores dicta nemo alias eum, hic inventore tenetur! Molestias labore iste impedit laborum laboriosam at ipsam quis ab.');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `page`, `link`) VALUES
(1, 'Home', 'index.php'),
(2, 'Beat Licenses', 'licenses.php'),
(3, 'Music Releases', 'music.php'),
(4, 'Contact', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `beat_id` int(11) NOT NULL,
  `beat_name` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `payerId` varchar(255) NOT NULL,
  `paymentId` varchar(255) NOT NULL,
  `price` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `beat_id`, `beat_name`, `license`, `payerId`, `paymentId`, `price`) VALUES
(5, 1, 'Lovely Town', 'MP3 License', 'XVVCP7FVAACHJ', 'PAY-8SU36777AD893743PLFOWP2I', '24.99'),
(6, 2, 'Young Stream', 'Premium License', 'XVVCP7FVAACHJ', 'PAY-8SU36777AD893743PLFOWP2I', '80'),
(7, 2, 'Young Stream', 'MP3 License', 'XVVCP7FVAACHJ', 'PAY-83S773543P948174RLFOWTEA', '24.99'),
(8, 1, 'Lovely Town', 'MP3 License', 'XVVCP7FVAACHJ', 'PAY-83S773543P948174RLFOWTEA', '24.99'),
(9, 1, 'Lovely Town', 'MP3 License', 'XVVCP7FVAACHJ', 'PAY-1YE88583UE1599217LFOXACI', '24.99'),
(10, 1, 'Lovely Town', 'WAV License', 'XVVCP7FVAACHJ', 'PAY-6GM69101M7932434ELFOXUDY', '34.99'),
(11, 2, 'Young Stream', 'Exclusive License', 'XVVCP7FVAACHJ', 'PAY-6GM69101M7932434ELFOXUDY', '200'),
(12, 3, 'Dreams', 'Exclusive License', 'XVVCP7FVAACHJ', 'PAY-7WX06328CM808532LLFOX62I', '200');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `isAdmin`) VALUES
(1, 'isissa01', 'isissa01@gmail.com', '$2y$15$6kD1hl0rfc8ivK.IheBGeekmgQfN8XBf6/A03RpiL802EklrBy8IC', 1),
(4, 'musa01', 'musa01@gmail.com', '$2y$15$op7vUFRyTDlBp9pkg4wrDuX/fNGN4QGaK.Hjb.q0O0eINhmd58zcS', 0),
(5, 'admin', 'admin01@gmail.com', '$2y$15$0z5JRZpsuc82fSKS3BGLte7.1IZfIQujBYYkYmKV5uWlVV2QHH8Pq', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beats`
--
ALTER TABLE `beats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music_posts`
--
ALTER TABLE `music_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT for table `beats`
--
ALTER TABLE `beats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `music_posts`
--
ALTER TABLE `music_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

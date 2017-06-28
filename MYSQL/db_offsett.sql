-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2017 at 01:29 AM
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
(1, 'To The Top', 'Young Mali', 'yaOlHQc1y1g\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum asperiores dolor eos aspernatur modi, consectetur inventore sit quo perferendis, nesciunt omnis libero similique quos perspiciatis impedit porro corrupti eum ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos provident aliquid nulla officiis quam recusandae nisi iure quod blanditiis. Dolorem possimus sint similique, ex vitae a reprehenderit unde aut!'),
(2, 'Solo', 'Young Mali', 'YjynwBAf3SI', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi dolorem natus maiores asperiores dicta nemo alias eum, hic inventore tenetur! Molestias labore iste impedit laborum laboriosam at ipsam quis ab. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure officiis assumenda porro libero alias excepturi, sit ipsam ab laudantium maxime praesentium repellat velit corporis aut est repudiandae, quod. Sint, earum.');

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
(1, 'isissa01', 'isissa01@gmail.com', '$2y$15$6kD1hl0rfc8ivK.IheBGeekmgQfN8XBf6/A03RpiL802EklrBy8IC', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

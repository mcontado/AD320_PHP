-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2018 at 09:35 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `moviedb`
--
CREATE DATABASE IF NOT EXISTS `moviedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `moviedb`;

-- --------------------------------------------------------

--
-- Table structure for table `GENRE`
--

CREATE TABLE `GENRE` (
  `genreId` int(11) NOT NULL,
  `genreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `GENRE`
--

INSERT INTO `GENRE` (`genreId`, `genreName`) VALUES
  (12, 'Adventure'),
  (14, 'Fantasy'),
  (16, 'Animation'),
  (18, 'Drama'),
  (27, 'Horror'),
  (28, 'Action'),
  (35, 'Comedy'),
  (36, 'History'),
  (37, 'Western'),
  (53, 'Thriller'),
  (80, 'Crime'),
  (99, 'Documentary'),
  (878, 'Science Fiction'),
  (9648, 'Mystery'),
  (10402, 'Music'),
  (10749, 'Romance'),
  (10751, 'Family'),
  (10752, 'War'),
  (10770, 'TV Movie');

-- --------------------------------------------------------

--
-- Table structure for table `MOVIE`
--

CREATE TABLE `MOVIE` (
  `movieId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `genreId` int(11) DEFAULT NULL,
  `releaseYear` int(11) DEFAULT NULL,
  `imdbId` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MOVIE`
--

INSERT INTO `MOVIE` (`movieId`, `title`, `description`, `genreId`, `releaseYear`, `imdbId`) VALUES
  (104, 'Zootopia', 'Determined to prove herself, Officer Judy Hopps, the first bunny on Zootopia\'s police force, jumps at the chance to crack her first case - even if it means partnering with scam-artist fox Nick Wilde to solve the mystery.', NULL, 2016, 'tt2948356'),
  (107, 'Kingsman: The Golden Circle', 'When an attack on the Kingsman headquarters takes place and a new villain rises, Eggsy and Merlin are forced to work together with the American agency known as the Statesman to save the world.', NULL, 2017, 'tt4649466'),
  (108, 'Minions', 'Minions Stuart, Kevin and Bob are recruited by Scarlet Overkill, a super-villain who, alongside her inventor husband Herb, hatches a plot to take over the world.', NULL, 2015, 'tt2293640'),
  (109, 'Cult of Chucky', 'Confined to an asylum for the criminally insane for the past four years, Nica Pierce is erroneously convinced that she, not Chucky, murdered her entire family. But when her psychiatrist introduces a new therapeutic “tool” to facilitate his patients’ group sessions — an all-too-familiar “Good Guy” doll with an innocently smiling face — a string of grisly deaths begins to plague the asylum, and Nica starts to wonder if maybe she isn’t crazy after all. Meanwhile, Andy Barclay, Chucky’s now all-grown-up nemesis from the first three Child’s Plays, races to Nica’s aid. But to save her he’ll have to get past Tiffany, Chucky’s long-ago bride, who will do anything, no matter how deadly or depraved, to help her beloved evil devilish doll.', NULL, 2017, 'tt3280262'),
  (110, 'Annabelle: Creation', 'Several years after the tragic death of their little girl, a dollmaker and his wife welcome a nun and several girls from a shuttered orphanage into their home, soon becoming the target of the dollmaker\'s possessed creation, Annabelle.', NULL, 2017, 'tt5140878');

-- --------------------------------------------------------

--
-- Table structure for table `MOVIE_GENRE`
--

CREATE TABLE `MOVIE_GENRE` (
  `movieId` int(11) NOT NULL,
  `genreId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MOVIE_GENRE`
--

INSERT INTO `MOVIE_GENRE` (`movieId`, `genreId`) VALUES
  (104, 16),
  (104, 12),
  (104, 10751),
  (104, 35),
  (107, 28),
  (107, 12),
  (107, 35),
  (108, 10751),
  (108, 16),
  (108, 12),
  (108, 35),
  (109, 27),
  (109, 53),
  (110, 27),
  (110, 9648),
  (110, 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GENRE`
--
ALTER TABLE `GENRE`
  ADD PRIMARY KEY (`genreId`);

--
-- Indexes for table `MOVIE`
--
ALTER TABLE `MOVIE`
  ADD PRIMARY KEY (`movieId`);

--
-- Indexes for table `MOVIE_GENRE`
--
ALTER TABLE `MOVIE_GENRE`
  ADD KEY `fk_movieId_idx` (`movieId`),
  ADD KEY `fk_genreId_idx` (`genreId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MOVIE`
--
ALTER TABLE `MOVIE`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `MOVIE_GENRE`
--
ALTER TABLE `MOVIE_GENRE`
  ADD CONSTRAINT `fk_genreId` FOREIGN KEY (`genreId`) REFERENCES `GENRE` (`genreId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movieId` FOREIGN KEY (`movieId`) REFERENCES `MOVIE` (`movieId`) ON DELETE CASCADE ON UPDATE NO ACTION;

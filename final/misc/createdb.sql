-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2018 at 11:53 PM
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

DROP TABLE IF EXISTS `GENRE`;
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

DROP TABLE IF EXISTS `MOVIE`;
CREATE TABLE `MOVIE` (
  `movieId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `genreId` int(11) DEFAULT NULL,
  `releaseYear` int(11) DEFAULT NULL,
  `imdbId` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `MOVIE_GENRE`
--

DROP TABLE IF EXISTS `MOVIE_GENRE`;
CREATE TABLE `MOVIE_GENRE` (
  `movieId` int(11) NOT NULL,
  `genreId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MOVIE`
--
ALTER TABLE `MOVIE`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT;
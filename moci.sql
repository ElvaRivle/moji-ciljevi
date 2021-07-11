-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: moci
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

CREATE DATABASE IF NOT EXISTS moci;
USE moci
--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Table structure for table `daily_goals`
--
DROP TABLE IF EXISTS `daily_goals`;

CREATE TABLE `daily_goals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `daily_goals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

--
-- Dumping data for table `daily_goals`
--


--
-- Table structure for table `life_goals`
--

DROP TABLE IF EXISTS `life_goals`;
CREATE TABLE `life_goals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `life_goals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

--
-- Dumping data for table `life_goals`
--




-- Dump completed on 2020-08-10 22:52:32

CREATE DATABASE  IF NOT EXISTS `appartmentmanagement` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `appartmentmanagement`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: appartmentmanagement
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appartment`
--

DROP TABLE IF EXISTS `appartment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appartment` (
  `appartmentno` int NOT NULL,
  `floor` int NOT NULL,
  `appttype` enum('studio','2 1/2','31/2','41/2','51/2','61/2') NOT NULL,
  `status` enum('vacant','rented') NOT NULL,
  `floorplan` varchar(450) NOT NULL,
  `orginalrent` double NOT NULL,
  PRIMARY KEY (`appartmentno`),
  UNIQUE KEY `appartmentno_UNIQUE` (`appartmentno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appartment`
--

LOCK TABLES `appartment` WRITE;
/*!40000 ALTER TABLE `appartment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appartment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appartment_photos`
--

DROP TABLE IF EXISTS `appartment_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appartment_photos` (
  `photoid` int NOT NULL,
  `appartmentno` int DEFAULT NULL,
  `photo` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`photoid`),
  KEY `appartmentno_idx` (`appartmentno`),
  CONSTRAINT `appartmentno` FOREIGN KEY (`appartmentno`) REFERENCES `appartment` (`appartmentno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appartment_photos`
--

LOCK TABLES `appartment_photos` WRITE;
/*!40000 ALTER TABLE `appartment_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `appartment_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leasedetails`
--

DROP TABLE IF EXISTS `leasedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leasedetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appartmentno` int NOT NULL,
  `currentrent` double NOT NULL,
  `monthlyrenewalcharges` double DEFAULT NULL,
  `iselectricity_included` tinyint NOT NULL,
  `isheat_included` tinyint NOT NULL,
  `isairconditioner_included` tinyint NOT NULL,
  `signindate` date NOT NULL,
  `signoutdate` date NOT NULL,
  `scanoflease` varchar(450) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apptno` (`appartmentno`),
  CONSTRAINT `apptno` FOREIGN KEY (`appartmentno`) REFERENCES `appartment` (`appartmentno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leasedetails`
--

LOCK TABLES `leasedetails` WRITE;
/*!40000 ALTER TABLE `leasedetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `leasedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tennantdetails`
--

DROP TABLE IF EXISTS `tennantdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tennantdetails` (
  `userid` int NOT NULL,
  `sin` varchar(15) NOT NULL,
  `appartmentno` int NOT NULL,
  `isprincipaltenant` tinyint NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `appartmentid_idx` (`appartmentno`),
  CONSTRAINT `appartmentid` FOREIGN KEY (`appartmentno`) REFERENCES `appartment` (`appartmentno`),
  CONSTRAINT `user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tennantdetails`
--

LOCK TABLES `tennantdetails` WRITE;
/*!40000 ALTER TABLE `tennantdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `tennantdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userid` int NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `dob` int NOT NULL,
  `Phonenumber` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `usertype` tinyint NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'loveleen','minhas',12,'123','minhas;','123',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-09 22:46:49

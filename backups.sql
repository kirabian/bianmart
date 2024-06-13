-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: bianmart
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer_bianmart`
--

DROP TABLE IF EXISTS `customer_bianmart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_bianmart` (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomer_telepon` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `payment` enum('dana','gopay','bank','alfamart') NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_bianmart`
--

LOCK TABLES `customer_bianmart` WRITE;
/*!40000 ALTER TABLE `customer_bianmart` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_bianmart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_bianmart`
--

DROP TABLE IF EXISTS `produk_bianmart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produk_bianmart` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` varchar(255) NOT NULL,
  `detail_produk` text,
  `gambar_produk` varchar(255) DEFAULT NULL,
  `kategori` enum('Elektronik','Fashion','Gadget','Rumah Tangga') DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_bianmart`
--

LOCK TABLES `produk_bianmart` WRITE;
/*!40000 ALTER TABLE `produk_bianmart` DISABLE KEYS */;
/*!40000 ALTER TABLE `produk_bianmart` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-13 22:34:45

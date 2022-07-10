-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: cantasertao
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `user_musico`
--

DROP TABLE IF EXISTS `user_musico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8*/;
CREATE TABLE `user_musico` (
  `cpf_cnpj` bigint NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `genero_musical` varchar(35) NOT NULL,
  `data_entrada` date NOT NULL,
  `cache_show` float NOT NULL,
  `ativo` ENUM('s','n'),
  `senha` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`cpf_cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_musico`
--

LOCK TABLES `user_musico` WRITE;
/*!40000 ALTER TABLE `user_musico` DISABLE KEYS */;
INSERT INTO `user_musico` VALUES 
(82,'jospRock','joseneto@gmail.com','s/n Sítio Riacho do Meio','7845266','','2022-02-16',1,'s','124'),
(74589,'pi','pi@gmail.com','salgueiro','879455122','forró','2022-02-21',1256,'s','123'),
(7485656,'aza','aza@gmail.com','salgueiro','451236','Rock Roll','2022-02-16',126,'s','5264'),
(658784521,'Tartarugas','tartarugas@gmail.com','Terra de Oz','78456233','Rock','2022-02-16',125,'s','456'),
(70866882405,'ForróSI','josenetopereira380@gmail.com','Salgueiro-PE','99392054','forró','2022-02-03',1500,'s','1234');
/*!40000 ALTER TABLE `user_musico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-11 16:19:04

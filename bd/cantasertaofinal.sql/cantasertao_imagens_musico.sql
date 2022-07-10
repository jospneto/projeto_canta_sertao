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
-- Table structure for table `imagens_musico`
--

DROP TABLE IF EXISTS `imagens_musico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8*/;
CREATE TABLE `imagens_musico` (
  `idImagem` int NOT NULL AUTO_INCREMENT,
  `iMg` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data_entrada` date DEFAULT NULL,
  `cpf_cnpj` bigint(20) NOT NULL,
  PRIMARY KEY (`idImagem`),
   FOREIGN KEY (`cpf_cnpj`) REFERENCES `user_musico`(`cpf_cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens_musico`
--

LOCK TABLES `imagens_musico` WRITE;
/*!40000 ALTER TABLE `imagens_musico` DISABLE KEYS */;
/* INSERT INTO `imagens_musico` VALUES (1,'78bd39a3d9fa29e82ea06a05639a0dbd.jpg','2022-02-21'),(2,'7964c3d74c187dd2a122e453016e5b8c.jpg','2022-02-21'),(3,'4bb0585f8cc813813c0d6ce70e49e537.','2022-03-06'),(4,'fd5e30b857580a5059e3d767dd1ba2bb.','2022-03-06'),(5,'21044992796aefae583b828558bbfdf4.jpeg','2022-03-06'),(6,'fdba971705f9520d7baf9e317b7cf5ea.jpeg','2022-03-06'),(7,'7739d3d5b554ae9a03263325cf5eb9ec.jpeg','2022-03-06'),(8,'88d2a7ad86204177a7df5c40258c460f.jpeg','2022-03-06'),(9,'6baf176540a9f442dea0e2b790120b93.jpeg','2022-03-06'),(10,'b52331d8b301546029e0ce7661410f9a.jpeg','2022-03-07'); */;
/*!40000 ALTER TABLE `imagens_musico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-11 16:19:06

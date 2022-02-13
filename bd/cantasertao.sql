-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: cantasertao
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `albuns`
--

DROP TABLE IF EXISTS `albuns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `albuns` (
  `id_Album` int NOT NULL,
  `cpf_musico` bigint NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Album`),
  KEY `fk_cpf_musico_albun` (`cpf_musico`),
  CONSTRAINT `fk_cpf_musico_albun` FOREIGN KEY (`cpf_musico`) REFERENCES `user_musico` (`cpf_cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albuns`
--

LOCK TABLES `albuns` WRITE;
/*!40000 ALTER TABLE `albuns` DISABLE KEYS */;
/*!40000 ALTER TABLE `albuns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `id_Evento` int NOT NULL,
  `cpf_musico` bigint NOT NULL,
  `cpf_contratante` bigint NOT NULL,
  `local_show` varchar(50) NOT NULL,
  `data_show` date NOT NULL,
  PRIMARY KEY (`id_Evento`),
  KEY `fk_cpf_musico` (`cpf_musico`),
  KEY `fk_cpf_contratante` (`cpf_contratante`),
  CONSTRAINT `fk_cpf_contratante` FOREIGN KEY (`cpf_contratante`) REFERENCES `user_contratante` (`cpf_cnpj`),
  CONSTRAINT `fk_cpf_musico` FOREIGN KEY (`cpf_musico`) REFERENCES `user_musico` (`cpf_cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faixas`
--

DROP TABLE IF EXISTS `faixas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faixas` (
  `id_Faixa` int NOT NULL,
  `id_Album` int NOT NULL,
  `nome_albun` varchar(50) NOT NULL,
  `link` varchar(35) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `duracao` int NOT NULL,
  PRIMARY KEY (`id_Faixa`),
  KEY `fk_id_albun` (`id_Album`),
  CONSTRAINT `fk_id_albun` FOREIGN KEY (`id_Album`) REFERENCES `albuns` (`id_Album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faixas`
--

LOCK TABLES `faixas` WRITE;
/*!40000 ALTER TABLE `faixas` DISABLE KEYS */;
/*!40000 ALTER TABLE `faixas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `midias_contratante`
--

DROP TABLE IF EXISTS `midias_contratante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `midias_contratante` (
  `cpf_contratante` bigint NOT NULL,
  `imagem` tinyint(1) DEFAULT NULL,
  `link_midia` varchar(35) NOT NULL,
  `name_user` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`link_midia`),
  KEY `fk_cpf_contratante_midia` (`cpf_contratante`),
  CONSTRAINT `fk_cpf_contratante_midia` FOREIGN KEY (`cpf_contratante`) REFERENCES `user_contratante` (`cpf_cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midias_contratante`
--

LOCK TABLES `midias_contratante` WRITE;
/*!40000 ALTER TABLE `midias_contratante` DISABLE KEYS */;
/*!40000 ALTER TABLE `midias_contratante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `midias_musico`
--

DROP TABLE IF EXISTS `midias_musico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `midias_musico` (
  `cpf_musico` bigint NOT NULL,
  `imagem` tinyint(1) DEFAULT NULL,
  `link_midia` varchar(35) NOT NULL,
  `name_user` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`link_midia`),
  KEY `fk_cpf_musico_midia` (`cpf_musico`),
  CONSTRAINT `fk_cpf_musico_midia` FOREIGN KEY (`cpf_musico`) REFERENCES `user_musico` (`cpf_cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midias_musico`
--

LOCK TABLES `midias_musico` WRITE;
/*!40000 ALTER TABLE `midias_musico` DISABLE KEYS */;
/*!40000 ALTER TABLE `midias_musico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_contratante`
--

DROP TABLE IF EXISTS `user_contratante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_contratante` (
  `cpf_cnpj` bigint NOT NULL,
  `nome` varchar(35) NOT NULL,
  `nome_empresa` varchar(50) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_entrada` date NOT NULL,
  PRIMARY KEY (`cpf_cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_contratante`
--

LOCK TABLES `user_contratante` WRITE;
/*!40000 ALTER TABLE `user_contratante` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_contratante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_musico`
--

DROP TABLE IF EXISTS `user_musico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_musico` (
  `cpf_cnpj` bigint NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `genero_musical` varchar(35) NOT NULL,
  `data_entrada` date NOT NULL,
  `cache_show` float NOT NULL,
  PRIMARY KEY (`cpf_cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_musico`
--

LOCK TABLES `user_musico` WRITE;
/*!40000 ALTER TABLE `user_musico` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_musico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cantasertao'
--

--
-- Dumping routines for database 'cantasertao'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-13 12:00:46

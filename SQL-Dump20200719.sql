-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gardin
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postalcode` varchar(8) NOT NULL,
  `address` varchar(200) NOT NULL,
  `number` varchar(3) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `complement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (2,'19750','Lutécia','311','Centro','Lutécia','SP','CAS'),(3,'64006600','Rua Vinícius de Morais','621','Água Mineral','Teresina','PI',NULL),(4,'57010590','Rua Guarda-Civil Manoel Leandro','975','Trapiche da Barra','Maceió','AL',NULL),(5,'57010590','Rua Guarda-Civil Manoel Leandro','975','Trapiche da Barra','Maceió','AL',NULL),(6,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(7,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(8,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(9,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(10,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(11,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(12,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(13,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(14,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(15,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(16,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(17,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(18,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(19,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(20,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(21,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(22,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(23,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(24,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(25,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(26,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(27,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(28,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(29,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(30,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(31,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(32,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(33,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(34,'57017028','Rua Professora Maria José Loureiro Lima','713','Levada','Maceió','AL','até 51/52'),(35,'19750','Lutécia','311','Centro','Lutécia','SP','CAS'),(36,'19750','Lutécia','311','Centro','Lutécia','SP','CAS'),(37,'53270046','1ª Travessa São Francisco','509','Aguazinha','Olinda','PE',NULL),(38,'41197080','Rua 11 de Janeiro','138','Barreiras','Salvador','BA',NULL),(39,'59042012','Travessa Maria do Carmo Flor','239','Quintas','Natal','RN',NULL),(40,'77015712','407 Sul Alameda 12','103','Plano Diretor Sul','Palmas','TO',NULL),(41,'58038030','Rua Ubirajara Boto Targino','124','Manaíra','João Pessoa','PB',NULL),(42,'64015130','Rua Escrava Esperança Garcia','548','Piçarra','Teresina','PI',NULL),(43,'69310737','Rua Acarí','190','Said Salomão','Boa Vista','RR',NULL),(44,'29016220','Rua Medardo Cavalini','689','Centro','Vitória','ES',NULL);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `enable` tinyint(1) DEFAULT 1,
  `addressId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `U_Cpf` (`cpf`),
  UNIQUE KEY `U_Email` (`email`),
  KEY `addressId` (`addressId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,'Ian Edson Lucas Corte Real','lizb@engeco.com.br','8228996589','36874341766',0,37),(4,'Alícia Joana Betina Corte Real','aaliciajoanabetinacortereal@imobiliariamaciel.com.br','82925806336','96364903339',NULL,5),(5,'Rafael Augusto Enzo Drumond','rafaelaugustoenzodrumond_@texfuse.com.br','8228458992','11066584770',0,6),(6,'Severino Kevin Anthony Gomes','severinokevinanthonygomes_@monetto.com.br','7138167486','48254844925',NULL,38),(7,'Lavínia Laís Sophie Barros','lavinialaissophiebarros_@bluespropaganda.com','8426578236','49379839626',NULL,39),(8,'Emanuel Geraldo Paulo Nunes','eemanuelgeraldopaulonunes@jonhdeere.com','6338354774','75034204649',NULL,40),(9,'Samuel Bernardo Rafael Carvalho','samuelbernardorafaelcarvalho_@imagemeaudio.com.br','8335925843','87198544398',NULL,41),(10,'Eliane Valentina Maitê Carvalho','elianevalentinamaitecarvalho__elianevalentinamaitecarvalho@unicohost.com.br','8627384427','41351173847',NULL,42),(11,'Ryan Bryan Luan da Conceição','ryanbryanluandaconceicao_@care-br.com','9527024529','72979678589',NULL,43),(12,'Levi Anthony Souza','levianthonysouza..levianthonysouza@oralcamp.com.br','2726666007','02701523770',NULL,44);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-19 13:32:25

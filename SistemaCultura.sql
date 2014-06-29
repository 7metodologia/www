/*
SQLyog Community v11.4 (64 bit)
MySQL - 5.6.12-log : Database - sistema_cultura
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sistema_cultura` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sistema_cultura`;

/*Table structure for table `agrupaciones` */

DROP TABLE IF EXISTS `agrupaciones`;

CREATE TABLE `agrupaciones` (
  `Id_Agrupacion` bigint(20) NOT NULL,
  `Nombre_Agrupacion` varchar(30) NOT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id_Agrupacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `agrupaciones` */

/*Table structure for table `coordinadores` */

DROP TABLE IF EXISTS `coordinadores`;

CREATE TABLE `coordinadores` (
  `CI_Coordinador` bigint(20) NOT NULL,
  `Id_Agrupacion` bigint(20) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_Agrupacion`,`CI_Coordinador`),
  UNIQUE KEY `CI_Coordinador` (`CI_Coordinador`),
  CONSTRAINT `Coordina` FOREIGN KEY (`Id_Agrupacion`) REFERENCES `agrupaciones` (`Id_Agrupacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `coordinadores` */

/*Table structure for table `departamento_cultura` */

DROP TABLE IF EXISTS `departamento_cultura`;

CREATE TABLE `departamento_cultura` (
  `CI_Cultura` bigint(20) NOT NULL,
  `Nombre_Coordinador` varchar(30) NOT NULL,
  `Direccion_Correo` varchar(30) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`CI_Cultura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `departamento_cultura` */

/*Table structure for table `miembros` */

DROP TABLE IF EXISTS `miembros`;

CREATE TABLE `miembros` (
  `CI_miembro` bigint(20) NOT NULL,
  `Id_Agrupacion` bigint(20) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Carrera` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CI_miembro`,`Id_Agrupacion`),
  KEY `Pertenece` (`Id_Agrupacion`),
  CONSTRAINT `Pertenece` FOREIGN KEY (`Id_Agrupacion`) REFERENCES `agrupaciones` (`Id_Agrupacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `miembros` */

/*Table structure for table `reportes` */

DROP TABLE IF EXISTS `reportes`;

CREATE TABLE `reportes` (
  `Id_Reporte` bigint(20) NOT NULL,
  `Fecha_Reporte` date NOT NULL,
  `Id_Agrupacion` bigint(20) NOT NULL,
  `Archivo_Reporte` text,
  PRIMARY KEY (`Id_Reporte`,`Id_Agrupacion`),
  KEY `Llena_reporte` (`Id_Agrupacion`),
  CONSTRAINT `Llena_reporte` FOREIGN KEY (`Id_Agrupacion`) REFERENCES `agrupaciones` (`Id_Agrupacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reportes` */

/*Table structure for table `solicitudes` */

DROP TABLE IF EXISTS `solicitudes`;

CREATE TABLE `solicitudes` (
  `Id_Solicitud` bigint(20) NOT NULL,
  `Nombre_Solicitud` varchar(30) DEFAULT NULL,
  `Tipo_Solicitud` varchar(20) NOT NULL,
  `CI_Cultura` bigint(20) DEFAULT NULL,
  `Id_Agrupacion` bigint(20) DEFAULT NULL,
  `Estado` varchar(20) NOT NULL,
  `Archivo_Solicitud` text,
  PRIMARY KEY (`Id_Solicitud`),
  KEY `Responde_Solicitud` (`CI_Cultura`),
  KEY `Envia_Solicitud` (`Id_Agrupacion`),
  CONSTRAINT `Envia_Solicitud` FOREIGN KEY (`Id_Agrupacion`) REFERENCES `agrupaciones` (`Id_Agrupacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Responde_Solicitud` FOREIGN KEY (`CI_Cultura`) REFERENCES `departamento_cultura` (`CI_Cultura`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `solicitudes` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

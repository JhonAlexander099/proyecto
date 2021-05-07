-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Proyecto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Proyecto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Proyecto` DEFAULT CHARACTER SET utf8 ;
USE `Proyecto` ;

-- -----------------------------------------------------
-- Table `Proyecto`.`control`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`control` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `numDocPrueba` int(8) DEFAULT NULL,
  `tipoPrueba` varchar(45) DEFAULT NULL,
  `fechaPrueba` date DEFAULT NULL,
  `fecharRegistro` date DEFAULT NULL,
  `medioTransporte` varchar(45) DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  `estadiaPersona` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------------------------------
-- Table `Proyecto`.`cuarentena`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`cuarentena` (
  `id` int(11) NOT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  PRIMARY KEY (`id`))
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`historial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`historial` (
  `id` int(11) NOT NULL,
  `numeroHistorial` int(11) DEFAULT NULL,
  `RegistroPersonas_id` int(11) NOT NULL,
  `PruebaCovid_id` int(11) NOT NULL,
  PRIMARY KEY (`id`))
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`pcovid`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`pcovid` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `fechaReporte` date DEFAULT NULL,
  `respuestaPersona` varchar(45) DEFAULT NULL,
  `numeroDocumento` int(11) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`))
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`individuos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`individuos` (
  `id` int(11) NOT NULL,
  `tipoDocumento` varchar(20) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `numCelular` int(10) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `ocupacion` varchar(20) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `Usuario_id` int(11) NOT NULL,
  `Cuarentena_id` int(11) NOT NULL,
  PRIMARY KEY (`id`))
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`pnp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`pnp` (
  `id` int(11) NOT NULL,
  `tipoDocumento` varchar(45) DEFAULT NULL,
  `numDocumento` int(25) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `codPolicia` int(25) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `numCelular` int(10) DEFAULT NULL,
  `Usuario_id` int(11) NOT NULL,
  `RegistroControl_id` int(11) NOT NULL,
  PRIMARY KEY (`id`))
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`prueba`
-- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `Proyecto`.`prueba` (
  `id` int(11) NOT NULL,
  `fechaReporte` date DEFAULT NULL,
  `numeroDocumento` varchar(45) DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  `prueba` varchar(45) DEFAULT NULL,
  `RegistroPersonas_id` int(11) NOT NULL,
  `RegistroControl_id` int(11) NOT NULL,
  PRIMARY KEY (`id`))
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`usuario`
-- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `Proyecto`.`usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `tipoUsuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`))
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
  
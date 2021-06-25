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
-- Table `Proyecto`.`crontol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`control` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `docprueba` int(8) DEFAULT NULL,
  `tipoprueba` varchar(45) DEFAULT NULL,
  `fechaprueba` date DEFAULT NULL,
  `fechareg` date DEFAULT NULL,
  `mtransporte` varchar(45) DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  `estadiapersona` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------------------------------
-- Table `Proyecto`.`cuarentena`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`cuarentena` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `control_id` int(11) NOT NULL)
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`historial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`historial` (
  `id` int(11) NOT NULL,
  `control_id` int(11) DEFAULT NULL,
  `persona_id` int(11) NOT NULL)
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  

-- -----------------------------------------------------
-- Table `Proyecto`.`individuos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`persona` (
  `id` int(11) NOT NULL,
  `tipoDocumento` varchar(20) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL)
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`pnp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Proyecto`.`pnp` (
  `id` int(11) NOT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `cip` varchar(25) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL)
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`prueba`
-- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `Proyecto`.`seguimiento` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `control_id` int(11) NOT NULL)
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
-- -----------------------------------------------------
-- Table `Proyecto`.`usuario`
-- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS `Proyecto`.`usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `tipo` int(45) DEFAULT NULL)
  ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
  ALTER TABLE `control`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD KEY `fk_control_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `cuarentena`
--
ALTER TABLE `cuarentena`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuarentena_control1_idx` (`control_id`);

--
-- Indices de la tabla `historial`

--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historial_control1_idx` (`control_id`),
  ADD KEY `fk_historial_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`);

--
-- Indices de la tabla `policia`
--
ALTER TABLE `pnp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `fk_policia_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seguimiento_control1_idx` (`control_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `cuarentena`
--
ALTER TABLE `cuarentena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `policia`
--
ALTER TABLE `pnp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `fk_control_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuarentena`
--
ALTER TABLE `cuarentena`
  ADD CONSTRAINT `fk_cuarentena_control1` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_control1` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `policia`
--
ALTER TABLE `pnp`
  ADD CONSTRAINT `fk_policia_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `fk_seguimiento_control1` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
  
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
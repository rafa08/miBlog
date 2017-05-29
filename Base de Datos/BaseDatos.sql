-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Blog
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Blog` DEFAULT CHARACTER SET utf8 ;
USE `Blog` ;

-- -----------------------------------------------------
-- Table `Blog`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Blog`.`usuario` (
  `user` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Blog`.`mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Blog`.`mensajes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NULL,
  `mensaje` VARCHAR(100) NULL,
  `fecha` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `usuario_idx` (`usuario` ASC),
  CONSTRAINT `user`
    FOREIGN KEY (`usuario`)
    REFERENCES `Blog`.`usuario` (`user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

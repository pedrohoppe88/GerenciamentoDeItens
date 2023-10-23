-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema datastore
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema datastore
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `datastore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `datastore` ;

-- -----------------------------------------------------
-- Table `datastore`.`grupos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `datastore`.`grupos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `avatar` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `datastore`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `datastore`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `datastore`.`itens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `datastore`.`itens` (
  `id` INT NOT NULL,
  `nome` VARCHAR(75) NOT NULL,
  `Quantidade` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `datastore`.`grupos_has_itens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `datastore`.`grupos_has_itens` (
  `grupos_id` INT NOT NULL,
  `itens_id` INT NOT NULL,
  PRIMARY KEY (`grupos_id`, `itens_id`),
  INDEX `fk_grupos_has_itens_itens1_idx` (`itens_id` ASC) VISIBLE,
  INDEX `fk_grupos_has_itens_grupos1_idx` (`grupos_id` ASC) VISIBLE,
  CONSTRAINT `fk_grupos_has_itens_grupos1`
    FOREIGN KEY (`grupos_id`)
    REFERENCES `datastore`.`grupos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_has_itens_itens1`
    FOREIGN KEY (`itens_id`)
    REFERENCES `datastore`.`itens` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `datastore`.`grupos_has_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `datastore`.`grupos_has_usuarios` (
  `grupos_id` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`grupos_id`, `usuarios_id`),
  INDEX `fk_grupos_has_usuarios_usuarios1_idx` (`usuarios_id` ASC) VISIBLE,
  INDEX `fk_grupos_has_usuarios_grupos1_idx` (`grupos_id` ASC) VISIBLE,
  CONSTRAINT `fk_grupos_has_usuarios_grupos1`
    FOREIGN KEY (`grupos_id`)
    REFERENCES `datastore`.`grupos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_has_usuarios_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `datastore`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

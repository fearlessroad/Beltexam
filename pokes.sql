-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Pokes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Pokes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Pokes` DEFAULT CHARACTER SET utf8 ;
USE `Pokes` ;

-- -----------------------------------------------------
-- Table `Pokes`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pokes`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `alias` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `DOB` DATE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Pokes`.`pokes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pokes`.`pokes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `poker_id` INT NOT NULL,
  `pokee_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pokes_users_idx` (`poker_id` ASC),
  INDEX `fk_pokes_users1_idx` (`pokee_id` ASC),
  CONSTRAINT `fk_pokes_users`
    FOREIGN KEY (`poker_id`)
    REFERENCES `Pokes`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pokes_users1`
    FOREIGN KEY (`pokee_id`)
    REFERENCES `Pokes`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

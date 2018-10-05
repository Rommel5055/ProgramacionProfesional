-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product` (
  `id` INT NOT NULL COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `desc` VARCHAR(300) NULL COMMENT '',
  `price` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`admin` (
  `mail` VARCHAR(200) NOT NULL COMMENT '',
  `username` VARCHAR(20) NOT NULL COMMENT '',
  `password` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`mail`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT NOT NULL COMMENT '',
  `email` VARCHAR(200) NOT NULL COMMENT '',
  `username` VARCHAR(20) NOT NULL COMMENT '',
  `password` VARCHAR(32) NOT NULL COMMENT '',
  `address` VARCHAR(200) NULL COMMENT '',
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)  COMMENT '',
  UNIQUE INDEX `username_UNIQUE` (`username` ASC)  COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '');


-- -----------------------------------------------------
-- Table `mydb`.`shopping_cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`shopping_cart` (
  `id` INT NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `creation_time` DATETIME NOT NULL COMMENT '',
  `status` VARCHAR(10) NOT NULL DEFAULT 0 COMMENT '',
  `t_price` INT NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_cart_user_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_cart_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`shopped_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`shopped_product` (
  `shopping_cart_id` INT NOT NULL COMMENT '',
  `product_id` INT NOT NULL COMMENT '',
  `quantity` INT NOT NULL COMMENT '',
  `a_price` INT NOT NULL COMMENT '',
  PRIMARY KEY (`shopping_cart_id`, `product_id`)  COMMENT '',
  INDEX `fk_shopped_product_product1_idx` (`product_id` ASC)  COMMENT '',
  CONSTRAINT `fk_shopped_product_shopping_cart1`
    FOREIGN KEY (`shopping_cart_id`)
    REFERENCES `mydb`.`shopping_cart` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shopped_product_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `mydb`.`product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`table1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`table1` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Transaction` (
  `id` INT NOT NULL COMMENT '',
  `f_price` INT NOT NULL COMMENT '',
  `date` DATETIME NOT NULL COMMENT '',
  `shopping_cart_id` INT NOT NULL COMMENT '',
  `shopping_cart_user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `shopping_cart_id`, `shopping_cart_user_id`)  COMMENT '',
  INDEX `fk_Transaction_shopping_cart1_idx` (`shopping_cart_id` ASC, `shopping_cart_user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_Transaction_shopping_cart1`
    FOREIGN KEY (`shopping_cart_id` , `shopping_cart_user_id`)
    REFERENCES `mydb`.`shopping_cart` (`id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

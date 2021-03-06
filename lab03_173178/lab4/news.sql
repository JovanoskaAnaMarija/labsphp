-- -----------------------------------------------------
-- Table `news`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `news` ;

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `news_title` VARCHAR(45) NOT NULL,
  `full_text` TEXT NOT NULL,
  PRIMARY KEY (`news_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `news`.`comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comments` ;

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` INT NOT NULL AUTO_INCREMENT,
  `news_id` INT NOT NULL,
  `author` VARCHAR(45) NOT NULL,
  `comment` TINYTEXT NOT NULL,
  `approved` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`comment_id`),
  INDEX `nid_idx` (`news_id` ASC),
  CONSTRAINT `news_id`
    FOREIGN KEY (`news_id`)
    REFERENCES `news` (`news_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
insert  into comments(comment_id, news_id, author, comment, approved)
VALUES (1, 1, 'Author1', 'comment1', 0);

insert into  news(news_id, date, news_title, full_text)
VALUES (1, '2020-12-13', 'Title1', 'Text1');
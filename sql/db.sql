SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

SHOW WARNINGS;
DROP SCHEMA IF EXISTS `da_db` ;
CREATE SCHEMA IF NOT EXISTS `da_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
SHOW WARNINGS;
USE `da_db` ;

-- -----------------------------------------------------
-- Table `da_db`.`district`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`district` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`district` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '地区';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`role` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`role` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '系统中的角色';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`user` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `username` VARCHAR(15) NOT NULL COMMENT '用户名',
  `password` VARCHAR(512) NOT NULL COMMENT '密码',
  `nickname` VARCHAR(15) NULL DEFAULT NULL COMMENT '昵称/显示用户名',
  `address` VARCHAR(50) NULL DEFAULT NULL COMMENT '地址',
  `telephone` VARCHAR(20) NULL DEFAULT NULL COMMENT '固定电话',
  `mobile` VARCHAR(20) NULL DEFAULT NULL COMMENT '手机',
  `district` SMALLINT(5) UNSIGNED NOT NULL COMMENT '地区',
  `email` VARCHAR(50) NULL DEFAULT NULL COMMENT 'email',
  `role` SMALLINT(5) UNSIGNED NOT NULL COMMENT '角色',
  `register_date` DATETIME NOT NULL COMMENT '注册时间',
  `last_update` DATETIME NULL COMMENT '上次更新注册信息时间',
  PRIMARY KEY (`id`),
  CONSTRAINT `user_district_fk`
    FOREIGN KEY (`district`)
    REFERENCES `da_db`.`district` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `user_role_fk`
    FOREIGN KEY (`role`)
    REFERENCES `da_db`.`role` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '用户信息表';

SHOW WARNINGS;
CREATE UNIQUE INDEX `username` ON `da_db`.`user` (`username` ASC);

SHOW WARNINGS;
CREATE INDEX `user_district_index` ON `da_db`.`user` (`district` ASC);

SHOW WARNINGS;
CREATE INDEX `user_role_index` ON `da_db`.`user` (`role` ASC);

SHOW WARNINGS;
CREATE INDEX `user_username_index` ON `da_db`.`user` (`username`(10) ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `email_UNIQUE` ON `da_db`.`user` (`email` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`department`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`department` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`department` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '科室';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`level`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`level` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`level` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '虚拟等级';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`title`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`title` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`title` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '职称';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`doctor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`doctor` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`doctor` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(10) NOT NULL COMMENT '姓名',
  `age` TINYINT(3) UNSIGNED NOT NULL COMMENT '年龄',
  `phano` VARCHAR(30) NOT NULL COMMENT '医师资格证书编号',
  `department` SMALLINT(5) UNSIGNED NOT NULL COMMENT '科室',
  `hospital` VARCHAR(30) NOT NULL COMMENT '医院',
  `title` SMALLINT(5) UNSIGNED NOT NULL COMMENT '职称',
  `level` SMALLINT(5) UNSIGNED NOT NULL DEFAULT 1 COMMENT '虚拟等级',
  `birthday` DATE NOT NULL COMMENT '生日',
  `isVerified` TINYINT(1) NOT NULL COMMENT '是否已认证',
  PRIMARY KEY (`id`),
  CONSTRAINT `doctor_department_fk`
    FOREIGN KEY (`department`)
    REFERENCES `da_db`.`department` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `doctor_id_fk`
    FOREIGN KEY (`id`)
    REFERENCES `da_db`.`user` (`id`),
  CONSTRAINT `doctor_level_fk`
    FOREIGN KEY (`level`)
    REFERENCES `da_db`.`level` (`id`),
  CONSTRAINT `doctor_title_fk`
    FOREIGN KEY (`title`)
    REFERENCES `da_db`.`title` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

SHOW WARNINGS;
CREATE INDEX `doctor_department_index` ON `da_db`.`doctor` (`department` ASC);

SHOW WARNINGS;
CREATE INDEX `doctor_title_index` ON `da_db`.`doctor` (`title` ASC);

SHOW WARNINGS;
CREATE INDEX `doctor_level_index` ON `da_db`.`doctor` (`level` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`question`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`question` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`question` (
  `id` BIGINT(20) UNSIGNED NOT NULL COMMENT 'key',
  `title` VARCHAR(50) NOT NULL COMMENT '标题',
  `doctor_id` INT(11) NOT NULL,
  `content` TEXT NOT NULL COMMENT '问题内容',
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_question_doctor1`
    FOREIGN KEY (`doctor_id`)
    REFERENCES `da_db`.`doctor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '提问内容';

SHOW WARNINGS;
CREATE INDEX `fk_question_doctor1_idx` ON `da_db`.`question` (`doctor_id` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`answer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`answer` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`answer` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'key',
  `content` TEXT NOT NULL COMMENT '标题',
  `user_id` INT(11) NOT NULL,
  `question_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_answer_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `da_db`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_question1`
    FOREIGN KEY (`question_id`)
    REFERENCES `da_db`.`question` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '回答内容';

SHOW WARNINGS;
CREATE INDEX `fk_answer_user1_idx` ON `da_db`.`answer` (`user_id` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_answer_question1_idx` ON `da_db`.`answer` (`question_id` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`attachment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`attachment` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`attachment` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'key',
  `title` VARCHAR(50) NOT NULL COMMENT '标题',
  `question_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_attachment_question1`
    FOREIGN KEY (`question_id`)
    REFERENCES `da_db`.`question` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '附件';

SHOW WARNINGS;
CREATE INDEX `fk_attachment_question1_idx` ON `da_db`.`attachment` (`question_id` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`company`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`company` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`company` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(15) NOT NULL COMMENT '公司名称',
  `business_license` VARCHAR(50) NOT NULL COMMENT '营业执照',
  `tax_license` VARCHAR(50) NOT NULL COMMENT '税务注册证',
  `code_license` VARCHAR(50) NOT NULL COMMENT '代码证',
  `isVerified` TINYINT(1) NOT NULL COMMENT '是否已认证',
  PRIMARY KEY (`id`),
  CONSTRAINT `company_id_fk`
    FOREIGN KEY (`id`)
    REFERENCES `da_db`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`login_log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`login_log` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`login_log` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `uid` INT(11) NOT NULL,
  `ip` BIGINT(20) NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `login_log_id_fk`
    FOREIGN KEY (`uid`)
    REFERENCES `da_db`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

SHOW WARNINGS;
CREATE INDEX `login_log_id_idx` ON `da_db`.`login_log` (`uid` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`tag` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`tag` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'key',
  `title` VARCHAR(50) NOT NULL COMMENT '标题',
  `question_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tag_question1`
    FOREIGN KEY (`question_id`)
    REFERENCES `da_db`.`question` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '标签';

SHOW WARNINGS;
CREATE INDEX `fk_tag_question1_idx` ON `da_db`.`tag` (`question_id` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `da_db`.`ecase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `da_db`.`ecase` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `da_db`.`ecase` (
  `id` BIGINT(20) UNSIGNED NOT NULL COMMENT 'key',
  `age` MEDIUMINT(9) NOT NULL COMMENT '患者年龄',
  `mainsuit` TEXT NOT NULL COMMENT '主诉',
  `current` TEXT NULL COMMENT '现病史',
  `anamnesis` TEXT NULL COMMENT '既往病史',
  `infect` TEXT NULL COMMENT '传�' /* comment truncated */ /*�病史
*/,
  `operation` TEXT NULL COMMENT '外伤、手术及输血史',
  `descrption` TEXT NULL COMMENT '病例描述',
  `examine` TEXT NULL COMMENT '专科情况',
  `assistexamine` TEXT NULL COMMENT '辅助检查',
  `initresult` TEXT NULL COMMENT '初步诊断',
  `question_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_case_question1`
    FOREIGN KEY (`question_id`)
    REFERENCES `da_db`.`question` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '电子病例信息';

SHOW WARNINGS;
CREATE INDEX `fk_case_question1_idx` ON `da_db`.`ecase` (`question_id` ASC);

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
USE `da_db`;

DELIMITER $$

USE `da_db`$$
DROP TRIGGER IF EXISTS `da_db`.`user_BINS` $$
SHOW WARNINGS$$
USE `da_db`$$
CREATE TRIGGER `user_BINS` BEFORE INSERT ON `da_db`.`user` FOR EACH ROW
BEGIN
if new.register_date is null or new.register_date='0000-00-00 00:00:00' then
      set new.register_date = now();
END if;
END;$$

SHOW WARNINGS$$

DELIMITER ;

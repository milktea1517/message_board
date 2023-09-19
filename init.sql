CREATE TABLE `message_board`.`userdata` (`user_id` INT(11) NOT NULL AUTO_INCREMENT ,
`nickname` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`username` VARCHAR(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
`password` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`create_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`user_id`)) ENGINE = InnoDB;




CREATE TABLE `message_board`.`message_data` (`message_id` INT(11) NOT NULL AUTO_INCREMENT ,
`nickname` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`content` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`create_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`message_id`)) ENGINE = InnoDB;
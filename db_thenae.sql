CREATE DATABASE IF NOT EXISTS `thenae_creations` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;


USE `thenae_creations`;


DROP TABLE IF EXISTS `ROLES`;
CREATE TABLE 
IF NOT EXISTS `ROLES`(

    
    `rol_id` INT(11) NOT NULL AUTO_INCREMENT,
    `rol_name` VARCHAR(50) NOT NULL,
    `rol_power` INT(3) NOT NULL,
    PRIMARY KEY (`rol_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `GALLERY`;
CREATE TABLE
IF NOT EXISTS `GALLERY`(
    `gal_id` INT(11) NOT NULL AUTO_INCREMENT,
    `gal_title` VARCHAR(255) NOT NULL,
    `gal_image` VARCHAR(255) NOT NULL,
    `gal_data_lightbox` VARCHAR(150) NOT NULL,
    `gal_data_title` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`gal_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `SECTION`;
CREATE TABLE IF NOT EXISTS `SECTION`(
    `sec_id` INT(11) NOT NULL AUTO_INCREMENT,
    `sec_image` VARCHAR(255) NOT NULL,
    `sec_text` LONGTEXT NOT NULL,
    `sec_title` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`sec_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `LANDING`;
CREATE TABLE IF NOT EXISTS `LANDING`(
    `lan_id` INT(11) NOT NULL AUTO_INCREMENT,
    `lan_logo` VARCHAR(255) NOT NULL,
    `lan_title` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`lan_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `CUSTOMERS`;
CREATE TABLE IF NOT EXISTS `CUSTOMERS`(
    `cus_id` INT(11) NOT NULL AUTO_INCREMENT,
    `cus_name` VARCHAR(255) NOT NULL,
    `cus_email` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`cus_id`),  
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `ORDERS`;
CREATE TABLE IF NOT EXISTS `ORDERS`(
    `ord_id` INT(11) NOT NULL AUTO_INCREMENT,
    `ord_content` LONGTEXT NOT NULL,
    `ord_statut` INT(2) NOT NULL,
    `ord_customer_fk` INT(11) NOT NULL,
    PRIMARY KEY (`ord_id`),
    KEY(`ord_customer_fk`)
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `CAROUSEL`;
CREATE TABLE IF NOT EXISTS `CAROUSEL`(
    `car_id` INT(11) NOT NULL AUTO_INCREMENT,
    `car_title_carousel` VARCHAR(255) NOT NULL,
    `car_title` VARCHAR(255) NOT NULL,
    `car_location` VARCHAR(255) NOT NULL,
    `car_type_img` BOOL NOT NULL,
    `car_image` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`car_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `MEDIAS`;
CREATE TABLE IF NOT EXISTS `MEDIAS`(
    `med_id` INT(11) NOT NULL AUTO_INCREMENT,
    `med_title` VARCHAR(255) NOT NULL,
    `med_location` VARCHAR(255) NOT NULL,
    `med_description` VARCHAR(255) NOT NULL,
    `med_name` VARCHAR(255) NOT NULL,
    `med_type` VARCHAR(50) NOT NULL,
    `med_error` INT(2),
    `med_size` INT(10) NOT NULL,
    PRIMARY KEY (`med_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `USERS`;
CREATE TABLE IF NOT EXISTS `USERS`(
    `use_id` INT(11) NOT NULL AUTO_INCREMENT,
    `use_login` VARCHAR(155) NOT NULL,
    `use_pwd` VARCHAR(50) NOT NULL,
    `use_role` INT(3) NOT NULL,
    `use_picture` VARCHAR(255),
    `use_role_fk` INT(11) NOT NULL,
    `use_picture_fk` INT(11) NOT NULL,
    PRIMARY KEY (`use_id`),
    KEY(`use_role_fk`),    
    KEY(`use_picture_fk`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `EVENT`;
CREATE TABLE IF NOT EXISTS `EVENT`(
    `eve_id` INT(11) NOT NULL AUTO_INCREMENT,
    `eve_text` VARCHAR(255) NOT NULL,
    `eve_date` DATE NOT NULL,
    `eve_location_event` VARCHAR(255) NOT NULL,
    `eve_img_ban` VARCHAR(255) NOT NULL,
    `eve_user_fk` INT(11) NOT NULL,
    PRIMARY KEY (`eve_id`),
    KEY(`eve_user_fk`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `manage`;
CREATE TABLE IF NOT EXISTS `manage`(
    `man_ord_id` INT(11) NOT NULL,
    `man_use_id` INT(11) NOT NULL,
    PRIMARY KEY (`man_ord_id`,`man_use_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `create`;
CREATE TABLE IF NOT EXISTS `create`(
    `cre_sec_id` INT(11) NOT NULL,
    `cre_use_id` INT(11) NOT NULL,
    PRIMARY KEY (`cre_sec_id`,`cre_use_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `fill`;
CREATE TABLE IF NOT EXISTS `fill`(
    `fil_gal_id` INT(11) NOT NULL,
    `fil_use_id` INT(11) NOT NULL,
    PRIMARY KEY (`fil_gal_id`,`fil_use_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `change`;
CREATE TABLE IF NOT EXISTS `change`(
    `cha_lan_id` INT(11) NOT NULL,
    `cha_use_id` INT(11) NOT NULL,
    PRIMARY KEY (`cha_lan_id`,`cha_use_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `add`;
CREATE TABLE IF NOT EXISTS `add`(
    `add_car_id` INT(11) NOT NULL,
    `add_use_id` INT(11) NOT NULL,
    PRIMARY KEY (`add_car_id`,`add_use_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `call_sec`;
CREATE TABLE IF NOT EXISTS `call_sec`(
    `cls_med_id` INT(11) NOT NULL,
    `cls_sec_id` INT(11) NOT NULL,
    PRIMARY KEY (`cls_med_id`,`cls_sec_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `call_gal`;
CREATE TABLE IF NOT EXISTS `call_gal`(
    `clg_med_id` INT(11) NOT NULL,
    `clg_gal_id` INT(11) NOT NULL,
    PRIMARY KEY (`clg_med_id`,`clg_gal_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `call_car`;
CREATE TABLE IF NOT EXISTS `call_car`(
    `clc_med_id` INT(11) NOT NULL,
    `clc_car_id` INT(11) NOT NULL,
    PRIMARY KEY (`clc_med_id`,`clc_car_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `call_eve`;
CREATE TABLE IF NOT EXISTS `call_eve`(
    `cle_med_id` INT(11) NOT NULL,
    `cle_eve_id` INT(11) NOT NULL,
    PRIMARY KEY (`cle_med_id`,`cle_eve_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `call_lan`;
CREATE TABLE IF NOT EXISTS `call_lan`(
    `cll_med_id` INT(11) NOT NULL,
    `cll_lan_id` INT(11) NOT NULL,
    PRIMARY KEY (`cll_med_id`,`cll_lan_id`)    
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;



ALTER TABLE `ORDERS` ADD CONSTRAINT `orders_customers_fk` FOREIGN KEY (`ord_customer_fk`) REFERENCES `thenae_creations`.`CUSTOMERS`(`cus_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `USERS` ADD CONSTRAINT `users_roles_fk` FOREIGN KEY (`use_role_fk`) REFERENCES `thenae_creations`.`ROLES`(`rol_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `USERS` ADD CONSTRAINT `users_medias_fk` FOREIGN KEY (`use_picture_fk`) REFERENCES `thenae_creations`.`MEDIAS`(`med_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `EVENT` ADD CONSTRAINT  `event_users_fk`FOREIGN KEY (`eve_user_fk`) REFERENCES `thenae_creations`.`USERS`(`use_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `manage` ADD CONSTRAINT `manage_orders_fk` FOREIGN KEY (`man_ord_id`) REFERENCES `thenae_creations`.`ORDERS`(`ord_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `manage` ADD CONSTRAINT `manage_users_fk` FOREIGN KEY (`man_use_id`) REFERENCES `thenae_creations`.`USERS`(`use_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `create` ADD CONSTRAINT `create_section_fk` FOREIGN KEY (`cre_sec_id`) REFERENCES `thenae_creations`.`SECTION`(`sec_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `create` ADD CONSTRAINT `create_users_fk` FOREIGN KEY (`cre_use_id`) REFERENCES `thenae_creations`.`USERS`(`use_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `fill` ADD CONSTRAINT `fill_gallery_fk` FOREIGN KEY (`fil_gal_id`) REFERENCES `thenae_creations`.`GALLERY`(`gal_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `fill` ADD CONSTRAINT `fill_users_fk` FOREIGN KEY (`fil_use_id`) REFERENCES `thenae_creations`.`USERS`(`use_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `change` ADD CONSTRAINT `change_landing_fk` FOREIGN KEY (`cha_lan_id`) REFERENCES `thenae_creations`.`LANDING`(`lan_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `change` ADD CONSTRAINT `change_users_fk` FOREIGN KEY (`cha_use_id`) REFERENCES `thenae_creations`.`USERS`(`use_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `add` ADD CONSTRAINT  `add_carousel_fk`FOREIGN KEY (`add_car_id`) REFERENCES `thenae_creations`.`CAROUSEL`(`car_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `add` ADD CONSTRAINT `add_users_fk` FOREIGN KEY (`add_use_id`) REFERENCES `thenae_creations`.`USERS`(`use_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_sec` ADD CONSTRAINT `section_media_fk` FOREIGN KEY (`cls_med_id`) REFERENCES `thenae_creations`.`MEDIAS`(`med_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_sec` ADD CONSTRAINT `section_section_fk` FOREIGN KEY (`cls_sec_id`) REFERENCES `thenae_creations`.`SECTION`(`sec_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_gal` ADD CONSTRAINT `gallery_media_fk` FOREIGN KEY (`clg_med_id`) REFERENCES `thenae_creations`.`MEDIAS`(`med_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_gal` ADD CONSTRAINT `gallery_gallery_fk` FOREIGN KEY (`clg_gal_id`) REFERENCES `thenae_creations`.`GALLERY`(`gal_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_car` ADD CONSTRAINT `carousel_media_fk` FOREIGN KEY (`clc_med_id`) REFERENCES `thenae_creations`.`MEDIAS`(`med_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_car` ADD CONSTRAINT `carousel_carousel_fk` FOREIGN KEY (`clc_car_id`) REFERENCES `thenae_creations`.`CAROUSEL`(`car_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_eve` ADD CONSTRAINT `event_media_fk` FOREIGN KEY (`cle_med_id`) REFERENCES `thenae_creations`.`MEDIAS`(`med_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_eve` ADD CONSTRAINT `event_event_fk` FOREIGN KEY (`cle_eve_id`) REFERENCES `thenae_creations`.`EVENT`(`eve_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `call_lan` ADD CONSTRAINT `landing_media_fk` FOREIGN KEY (`cll_med_id`) REFERENCES `thenae_creations`.`MEDIAS`(`med_id`) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE `call_lan` ADD CONSTRAINT `landing_landing_fk` FOREIGN KEY (`cll_lan_id`) REFERENCES `thenae_creations`.`LANDING`(`lan_id`) ON UPDATE CASCADE ON DELETE RESTRICT;
 
 
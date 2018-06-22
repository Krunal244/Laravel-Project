CREATE TABLE `craneapp`.`cr_backgorund_images` ( `id` INT NOT NULL , `screen_name` VARCHAR(45) NOT NULL , `image` VARCHAR(100) NOT NULL ,
 `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `cr_telescopic_crane` ADD `brand_id` INT NOT NULL AFTER `id`;

ALTER TABLE `cr_tower_crane` ADD `brand_id` INT NOT NULL AFTER `id`;

ALTER TABLE `cr_telescopic_crane` CHANGE `stamp_basis` `stamp_base` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

ALTER TABLE `cr_tower_crane` CHANGE `stamp_basis` `stamp_base` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

ALTER TABLE `cr_telescopic_crane` CHANGE `arm_length` `mast_length` DOUBLE NOT NULL;

ALTER TABLE `cr_telescopic_crane` CHANGE `tonnage` `tonnage` VARCHAR(45) NOT NULL;

ALTER TABLE `cr_telescopic_crane` CHANGE `type` `model` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;



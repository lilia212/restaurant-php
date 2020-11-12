CREATE TABLE `restaurants`.`restaurant` ( `id_restaurant` INT(3) NOT NULL AUTO_INCREMENT , 
`nom` VARCHAR(100) NOT NULL ,
 `adresse` VARCHAR(100) NOT NULL ,
  `telephone` VARCHAR(10) NOT NULL , 
  `type` ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre') NOT NULL , 
  `note` INT(1) NOT NULL , `avis` TEXT NOT NULL , PRIMARY KEY (`id_restaurant`)) ENGINE = InnoDB; 
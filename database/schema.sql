CREATE DATABASE gardin CHARACTER SET utf8 COLLATE utf8_general_ci;

use gardin;

create table `address` (
	`id` int not null auto_increment,
    `postalcode` varchar(8) not null,
    `address` varchar(200) not null,
    `number` varchar(3) not null,
    `district` varchar(50) null,
    `city` varchar(50) not null,
    `uf` varchar(2) not null,
    `complement` varchar(50) null,
    PRIMARY KEY (`id`)
);

create table `customers` (
	`id` int not null auto_increment,
    `name` varchar(200) not null,
    `email` varchar(100) not null,
    `phone` varchar(200) not null,
    `cpf` varchar(200) not null,
    `enable` tinyint(1) default 1,
    `addressId` int not null,
	PRIMARY KEY (`id`),
    FOREIGN KEY (`addressId`) REFERENCES `address`(`id`)
);

ALTER TABLE `gardin`.`customers` 
CHANGE COLUMN `cpf` `cpf` VARCHAR(11) NOT NULL ,
ADD CONSTRAINT `U_Cpf` UNIQUE (`cpf`),
ADD CONSTRAINT `U_Email` UNIQUE (`email`)
;